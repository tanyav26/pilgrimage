<?php

namespace Library\Folder\Files\Xml;

use Library\Folder;
use Library\Folder\Files as Files;

/**
 * Do Framework
 *
 * for PHP version 5
 *
 * LICENSE: This source file is subject to version 3.01 of the GPL license
 * that is available through the world-wide-web at the following URI:
 * http://www.gnu.org/licenses/gpl.txt.  If you did not receive a copy of
 * the GPLv3 License and are unable to obtain it through the web, please
 * send a note to license@tuiyo.co.uk so we can mail you a copy immediately.
 *
 * @category   Do
 * @package    DoVersion
 * @author     Original Author <livingstonefultang@gmail.com>
 * @copyright  2011 Stonyhills LLC
 * @license    http://www.gnu.org/licenses/gpl.txt.  GNU GPL License 3.01
 * @version    SVN: $Id$
 * 
 */
final class Tag extends Document {
    
    /**
     *
     * @var type 
     */
    public $CHILDREN = array();
    
    /**
     * Adds a child tag
     * 
     * @param Tag $tag
     * @return type 
     */
    public function addChild( Tag $tag ) {
        
        $this->CHILDREN[] = $tag ;
        
        return $this->CHILDREN;
    }

    public function removeChildren() {
        //Removes all the children from within a tag
    }
    
    public function removeChild($name=''){
        
        //Deletes a tag with $name
        
    }
    
    /**
     * 
     * 
     * @param type $tag
     * @return Tag 
     */
    public function __get( $tag ){
        
        $children = $this->CHILDREN;
        $element  = strtolower( $tag );
        $search   = array();
        
        foreach($children as $e=>$_tag){
            if($_tag['ELEMENT'] === $element ){
                 $search[] = $_tag;
            }
        }
        
        if(!empty($search)&&isset($search[0])){            
            $element = new Tag ($search[0] );       
        }       
        //The requested element
        return $element;
        
    }

    public function data() {
        //Returns the data value of non empty tags,
        //Returns false if the tag is empty
    }

    /**
     * 
     */
    public function firstChild() {
        //Returns the first child in the tag
        return $this->getChild(1);
    }

    /**
     * Returns the last child element
     * 
     * @return type 
     */
    public function lastChild() {
        //Returns the last child in the tag
        
        $children = $this->CHILDREN;
        $last     = 0;
        
        if(sizeof($children)>0){
            
            $last = sizeof($children);
            
            return $this->getChild( (int)$last );
        }
        
        return false;
    }
    
    /**
     * Returns the nth child in the children array;
     * 
     * @param type $n
     * @return Tag 
     */
    public function getChild( $n = 1) {
        //Get's the n'th child in the tag 
        $children = $this->CHILDREN;
        $n = intval($n-1);
        
        if(isset($children[$n])){
            return new Tag( $children[$n]);
        }
        
        return false;
    }
    
    /**
     * Returns all children in an element;
     * 
     * @return Tag 
     */
    public function getChildren(){
        
        $children = $this->CHILDREN ;
        
        //Convert each child object to an array
        foreach ($children as $i=>$element){
            $children[$i] = new Tag( $element );
        }
        
        return $children;
    }

    /**
     * Checks if the tag has any defined attributes
     * 
     */
    public function hasAttribute( $name='') {
        //Checks if the tag has any defined attributes
        $name = strtoupper($name);
        
        //Isset
        if(isset($this->$name)){
            return true;
        }
        
        return false;
    }

    /**
     * Adds an attribute to the current tag
     * 
     * @param type $key
     * @param type $value
     * @return type 
     */
    public function addAttribute($key, $value ='') {
       
        
        //Adds an attribute to the tag
        $key = strtoupper( $key );      
        $this->$key = $value;
      
        return true;
    }

    /**
     * Removes a named attribute from the tag
     * 
     */
    public function removeAttribute() {
        //Removes a named attribute from the tag
    }

    /**
     * Reutns the value of a named attribute
     * 
     * @param type $name 
     */
    public function getAttribute( $name ) {
        //Returns the value of a named attribute
        $name = strtoupper( $name );
        if($this->hasAttribute($name)){
           return $this->$name; 
        }
        return false;
    }

    /**
     * Returns a Tag as an Object
     *
     * @param type $name
     * @param type $attributes
     * @param type $children
     * @param type $parents 
     */
    public function __construct( $properties = array() ) {
        //Do not reconstruct parent;
        
        if(!is_array($properties)){
            //@TODO cannot add tag tot he document
            return false;
        }
        
        if(!isset($properties['ELEMENT'])){
            //@TODO tag must have at least a name;
           return false;
        }
        
        foreach($properties as $key =>$value){
            $this->$key = $value; 
        } 
        
    }
    
    /**
     * Returns the current element name;
     * 
     * @return type 
     */
    public function getName(){
        
        if(isset($this->ELEMENT)){
            return $this->ELEMENT;
        }
        
    }

    /**
     * Gets an Instance of the XML parser
     * 
     * @staticvar self $instance
     * @return self 
     */
    public static function getInstance() {

        static $instance;
        //If the class was already instantiated, just return it
        if (isset($instance))
            return $instance;

        $instance = new self();

        return $instance;
    }

}