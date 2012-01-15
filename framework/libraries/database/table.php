<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * table.php
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
 * @link       http://stonyhillshq/documents/index/carbon4/libraries/database/table
 * @since      Class available since Release 1.0.0 Jan 14, 2012 4:54:37 PM
 * 
 */

namespace Library\Database;

use Library;
use Library\Database\Drivers\MySQL as MySQL;
use Library\Database\Drivers\MySQLi as MySQLi;
use Library\Database\Drivers\SQLite3 as SQLite3;
use Library\Database\Drivers\PostgreSQL as PostgreSQL;

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
 * @link       http://stonyhillshq/documents/index/carbon4/libraries/database/table
 * @since      Class available since Release 1.0.0 Jan 14, 2012 4:54:37 PM
 */
abstract class Table extends \Library\Object {

    /**
     * @var Object Driver 
     */
    protected $driver;

    /**
     * Defines the table name;
     * 
     * @param type $name
     * @return type 
     */
    final public function setTableName($name) {

        $this->name = preg_replace('/[^A-Z0-9_\.-]/i', '', $name);

        return true;
    }

    /**
     * Returns the table name
     *
     * @return type 
     */
    final public function getTableName() {

        return $this->name;
    }

    /**
     * Sets a dynamique field value
     * 
     * @param type $field
     * @param type $value
     * @return Table 
     */
    final public function __set($field, $value) {
        $this->fields[$field] = $value;
        return $this;
    }

    /**
     * Gets a field value
     * 
     * @param type $field
     * @return type 
     */
    final public function __get($field) {
        if (isset($this->fields[$field])) {
            return $this->fields[$field];
        }
        return null;
    }

    /**
     * Magic call method for table.
     * 
     * This method can help with calling active record type methods in tables directly
     * for instance, $this->select('*')->prepare(); or $this->delete();
     * 
     * @param type $method
     * @param type $argument 
     */
    final public function __call($method, $arguments) {

        $dbo = \Library\Database::getInstance();


        //$dbo = $dbo->table( $this->getTableName() );
        //print_R($dbo);
        //Get the AR class;
        $options = array(
            "dbo" => $dbo,
            "driver" => $dbo->getDriver()
        );
        $AR = \Library\Database\ActiveRecord::getInstance($options);


        if (!\method_exists($AR, $method)) {
            throw new \Library\Exception('Table accessory method does not exists');
            return false;
        }

        //Call the Method;
        return @\call_user_func_array(array($dbo->from($this->getTableName()), $method), $arguments);
    }

    /**
     * Gets an instance of the database table class
     * 
     * @staticvar type $instance
     * @param type $options
     * @return type 
     */
    public static function getInstance($options = array()) {

        static $instance;


        //@TODO check the statement is set in the dbo. before continue
        if (!isset($options) || !is_array($options) || !isset($options['driver']) || !isset($options['table'])) {

            exit('we need to know what driver and have a dbo passed');
            //@TODO show some form of error; Or attempt to get it from the dbo passed;
            return false;
        }

        if (!isset($instance[$options['driver']])) {
            $instance[$options['table']] = \call_user_func("Library\Database\Drivers\\" . $options['driver'] . "\Table::getInstance", array("dbo" => $options['dbo']));
            $instance[$options['table']]->setTableName($options['dbo']->replacePrefix($options['table']));

            //Get Table definiion, with describe!
            $instance[$options['table']]->describe();
        }

        //If the class was already instantiated, just return it
        return $instance[$options['table']];
    }

    /**
     * Binds user data to the table;
     *
     * @param type $data
     * @param type $ignore
     * @param type $strict
     * @param type $filter
     * @return type 
     */
    final public function bindData($data, $ignore = array(), $strict=true, $filter=array()) {

        $validate = \Library\Validate::getInstance();

        if (!is_object($data) && !is_array($data)) {
            $this->setError(_("Data must be either an object or array"));
            return false;
        }

        $dataArray = is_array($data);
        $dataObject = is_object($data);


        foreach ($this->schema as $k => $v) {

            // internal attributes of an object are ignored
            if (!in_array($k, $ignore)) {
                if ($dataArray && isset($data[$k])) {
                    $this->schema[$k]->Value = $data[$k];
                } else if ($dataObject && isset($data->$k)) {
                    $this->schema[$k]->Value = $data->$k;
                }
            }

            //validate. if only just 1 fails, break and throw an error;
            if (isset($this->schema[$k]->Validate) && isset($this->schema[$k]->Value)) {
                $datatype = $this->schema[$k]->Validate;

                $datavalue = $this->schema[$k]->Value;

                if (method_exists($validate, $datatype)) {
                    if (!\call_user_func_array(array($validate, $datatype), array($datavalue))) {
                        //unpair the value
                        unset($this->schema[$k]->Value);

                        //set the error
                        $this->setError(sprintf(_("%s is not a valid %2s"), $k, $datatype));

                        //throw an exception if in strict mode
                        if ($strict) {
                            break;
                        }
                    }
                }
            }
        }

        //did we have any validation errors
        return (count($this->getErrors()) > 0) ? false : true;
    }

    /**
     * Determines if theh currently bound row will be saved as new
     * 
     * @return boolean true if primary key has a value 
     */
    final public function isNewRow() {

        $primary = $this->keys("primary", 1);

        //If the value of the primary key is empty, then we are adding a new row
        return (empty($primary->Value)) ? true : false;
    }

    final public function getRow() {
        
    }

    final public function getRowValues() {
        
    }

    final public function getRowField() {
        
    }

    /**
     * Gets the value of a field in the current ROW
     * 
     * @param type $field 
     */
    final public function getRowFieldValue($field) {

        //If value exists;
        if (array_key_exists($field, $this->schema)) {
            return $this->schema[$field]->Value;
        }
        return null;
    }

    /**
     * Sets a field value in the current row
     * 
     * @param type $field 
     */
    final public function setRowFieldValue($field, $value) {

        //If value exists;
        if (array_key_exists($field, $this->schema)) {
            $this->schema[$field]->Value = $value;
            return true;
        }
        return false;
    }

    abstract public function load($keyid=null);

    abstract public function save($data=null);

    abstract public function create();

    abstract public function dump();

    abstract public function keys($type);

    abstract public function describe();

    abstract public function insert($data=null);

    abstract public function update($key, $data=null);

    abstract public function truncate();
}
