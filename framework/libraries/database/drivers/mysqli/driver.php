<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * driver.php
 *
 * Requires PHP version 5.3
 *
 * LICENSE: This source file is subject to version 3.01 of the GNU/GPL License
 * that is available through the world-wide-web at the following URI:
 * http://www.gnu.org/licenses/gpl.txt  If you did not receive a copy of
 * the GPL License and are unable to obtain it through the web, please
 * send a note to support@stonyhillshq.com so we can mail you a copy immediately.
 *
 * @category   Library
 * @author     Livingstone Fultang <livingstone.fultang@stonyhillshq.com>
 * @copyright  1997-2012 Stonyhills HQ
 * @license    http://www.gnu.org/licenses/gpl.txt.  GNU GPL License 3.01
 * @version    Release: 1.0.0
 * @link       http://stonyhillshq/documents/index/carbon4/libraries/database/drivers/mysql/driver
 * @since      Class available since Release 1.0.0 Jan 14, 2012 4:54:37 PM
 *
 */

namespace Library\Database\Drivers\MySQLi;

use Library;
use Platform;
/**
 * What is the purpose of this class, in one sentence?
 *
 * How does this class achieve the desired purpose?
 *
 * @category   Library
 * @author     Livingstone Fultang <livingstone.fultang@stonyhillshq.com>
 * @copyright  1997-2012 Stonyhills HQ
 * @license    http://www.gnu.org/licenses/gpl.txt.  GNU GPL License 3.01
 * @version    Release: 1.0.0
 * @link       http://stonyhillshq/documents/index/carbon4/libraries/database/drivers/mysql/driver
 * @since      Class available since Release 1.0.0 Jan 14, 2012 4:54:37 PM
 */
final class Driver extends Library\Database{

    /**
     * The database driver name
     *
     * @var string
     */
    var $name = 'mysqli';
    /**
     *  The null/zero date string
     *
     * @var string
     */
    var $nullDate = '0000-00-00 00:00:00';
    /**
     * Quote for named objects
     *
     * @var string
     */
    var $nameQuote = '`';

    /**
     * Connects to the databse using the default DBMS
     *
     * @param string $name database name
     * @param string $server default is localhost
     * @param string $username if not provided default is used
     * @param string $password not stored in the class
     * @return bool TRUE on success and FALSE on failure
     */
    public function __construct( $options = null){

        $host       = array_key_exists('host', $options) ? $options['host'] : 'localhost';
        $user       = array_key_exists('user', $options) ? $options['user'] : '';
        $password   = array_key_exists('password', $options) ? $options['password'] : '';
        $database   = array_key_exists('name', $options) ? $options['name'] : '';
        $prefix     = array_key_exists('prefix', $options) ? $options['prefix'] : 'dd_';
        $select     = array_key_exists('select', $options) ? $options['select'] : true;
        
        if(!$this->connect($host, $user, $password, $database, $prefix, $select )){
            return false;
        }

        // Determine utf-8 support
        $this->utf = $this->hasUTF();

        //Set charactersets (needed for MySQL 4.1.2+)
        if ($this->utf) {
            $this->setUTF();
        }
        
        $this->prefix = $prefix;
        $this->ticker = 0;
        $this->errorNum = 0;
        $this->log = array();
        $this->quoted = array();
        $this->hasQuoted = false;
        $this->debug    = true;

        // select the database
        if ($select) {
            $this->database($database);
        }
    }
    
    /**
     * Connects to the databse using the default DBMS
     *
     * @param string $name database name
     * @param string $server default is localhost
     * @param string $username if not provided default is used
     * @param string $password not stored in the class
     * @return bool TRUE on success and FALSE on failure
     */
    public function connect($server = 'localhost', $username = '', $password = '', $database = '' , $prefix='dd_' , $select = true) {
        
        if($this->isConnected()){
            return true;
        }
        
        // mysql driver exists?
        if (!function_exists('mysqli_real_connect')) {
            $this->errorNum = 1;
            $this->errorMsg = 'The MySQLi extension "mysqli" is not available.';
            $this->setError( "[{$this->name}:{$this->errorNum}] {$this->errorMsg}");
            return false;
        }
        
        $this->resourceId = mysqli_init();
        
        if (!$this->resourceId) {
            $this->setError('mysqli_init failed');
        }

        if (!$this->resourceId->options(MYSQLI_INIT_COMMAND, 'SET AUTOCOMMIT = 0')) {
            $this->setError('Setting MYSQLI_INIT_COMMAND failed');
        }

        if (!$this->resourceId->options(MYSQLI_OPT_CONNECT_TIMEOUT, 5)) {
            $this->setError('Setting MYSQLI_OPT_CONNECT_TIMEOUT failed');
        }
        
        // connect to the server
        if (!$this->resourceId->real_connect($server, $username, $password, $database)) {
            $this->errorNum =  mysqli_connect_errno();
            $this->errorMsg =  mysqli_connect_error();
            
            $this->setError( "[{$this->name}:{$this->errorNum}] {$this->errorMsg}");
            return false;
        }
        
        // select the database
        if ($select) {
            if(!$this->database($database)){
                $this->close();
                return false;
            }
        }
        
        $this->prefix = $prefix;
        
        return true;
        
    }

   /**
    * Chooses the database to connect to
    * @param string $database
    * @return boolean
    */
   protected function database( $database ) {
        //Make sure its not empty
        if (!$database) {
            return false;
        }
        
        //Chooses the database to connect to
        if (!mysqli_select_db($this->resourceId, $database)) {
            $this->errorNum = 3;
            $this->errorMsg = 'Could not connect to database';
            $this->setError( "[{$this->name}:{$this->errorNum}] {$this->errorMsg}");
            return false;
        }

        return true;
    }

    /**
     * Reports on the status of the established Object
     *
     * @return boolean
     */
    public function isConnected(){

        if (is_a($this->resourceId,"mysqli")) {
            return mysqli_ping($this->resourceId);
        }
        return false;
    }

    /**
     * Determines the version of the DBMS being used
     *
     * @return
     */
    public function getVersion(){
        return mysqli_get_server_info( $this->resourceId );
    }



    /**
     * Database object destructor
     *
     * @return boolean
     */
    final public function __destruct() {}
    
    
    
    
    final public function close(){
        $return = false;
        if (is_a($this->resourceId,"mysqli")) {
            $return = mysqli_close($this->resourceId);
        }
        $this->resourceId = NULL;
        return $return;
    }

    /**
     * Test to see if the MySQL connector is available
     *
     * @static
     * @access public
     * @return boolean  True on success, false otherwise.
     */
    final public function test() {
        return (function_exists('mysqli_connect'));
    }

    /**
     * Determines if the connection to the server is active.
     *
     * @access	public
     * @return	boolean
     */
    final public function connected() {
        if (is_a($this->resourceId,"mysqli")) {
            return mysqli_ping($this->resourceId);
        }
        return false;
    }

    /**
     * Determines UTF support
     *
     * @access	public
     * @return boolean True - UTF is supported
     */
    final public function hasUTF() {
        $verParts = explode('.', $this->getVersion());
        return ($verParts[0] == 5 || ($verParts[0] == 4 && $verParts[1] == 1 && (int) $verParts[2] >= 2));
    }

    /**
     * Custom settings for UTF support
     *
     * @access	public
     */
    final public function setUTF() {
        mysqli_query($this->resourceId,"SET NAMES 'utf8'");
    }

    /**
     * Get a database escaped string
     *
     * @param	string	The string to be escaped
     * @param	boolean	Optional parameter to provide extra escaping
     * @return	string
     * @access	public
     * @abstract
     */
    final public function getEscaped($text, $extra = false) {
        $result = mysqli_real_escape_string($this->resourceId, $text);
        if ($extra) {
            $result = addcslashes($result, '%_');
        }
        return $result;
    }


    /**
     * Execute the query
     *
     * @access	public
     * @return mixed A database resource if successful, FALSE if not.
     */
    final public function exec( $query ='') {

        //@TODO how to verify the resource Id
        if (!is_a($this->resourceId, "mysqli")) {
            $this->setError( _("No valid connection resource found") );
            return false;
        }

        // Take a local copy so that we don't modify the original query and cause issues later
        $sql = (empty($query)) ?  $this->query :  $query ;
        $this->query = $sql = $this->replacePrefix( $sql ); //just for reference

        if ($this->limit > 0 || $this->offset > 0) {
            $sql .= ' LIMIT ' . max($this->offset, 0) . ', ' . max($this->limit, 0);
        }

        if ($this->debug) {
            $this->ticker++;
            $this->log[] = $sql;
            $log = htmlentities($sql); //Does not play nice with the parser!
            \Platform\Debugger::log( $log, "DB Query {$this->ticker}" , "notice" );
        }

        $this->errorNum = 0;
        $this->errorMsg = '';
        $this->cursor = mysqli_query( $this->resourceId, $sql);

        if (!$this->cursor) {
            $this->errorNum = mysqli_errno($this->resourceId);
            $this->errorMsg = mysqli_error($this->resourceId) . " SQL=$sql";

            if ($this->debug) {
                //Debug the error
            }
            $this->setError( "[{$this->name}:{$this->errorNum}] {$this->errorMsg}");
            return false;
        }
        $this->resetRun();

        //echo $this->cursor;

        return $this->cursor;
    }

    /**
     * Gets an instance of the driver
     *
     * @staticvar self $instance
     * @param array $options
     * @return selfss
     */
    public static function getInstance( $options = array() ){
        

        static $instance;
        //If the class was already instantiated, just return it
        if (isset($instance) && is_a($instance, "Library\Database\Drivers\MySQLi\Driver") ) return $instance ;

        $instance =  new self($options);
        
        return $instance;
    }
}