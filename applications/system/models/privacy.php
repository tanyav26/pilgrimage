<?php

namespace Application\System\Models;

use Platform;
use Library;

class Privacy extends Platform\Model {

    //put your code here

    public function display() {
        
    }
    
    public function storePermissions($params = array()){
        
        //1. Load Helpers
        $encrypt = \Library\Encrypt::getInstance();
        
        //2. Saniitize the data
        $authorityAreaTitle         = $this->input->getString("area-title");
        $authorityAreaURI           = $this->input->getString("area-uri");
        $authorityAreaAction        = $this->input->getString("area-action");
        $authorityAreaPermission    = $this->input->getString("area-permission");
        $authorityId                = $this->input->getInt("area-authority");
        
        //3. Synchronize and bind to table object
        $table = $this->load->table("?authority_permissions");
        
        $aData = array(
            "authority_id"          => $authorityId,
            "permission_area_uri"   => strtolower($authorityAreaURI),
            "permission"            => strtolower($authorityAreaPermission),
            "permission_type"       => strtolower($authorityAreaAction),
            "permission_title"      => $authorityAreaTitle
        );
        
        //All fields required;
        foreach($aData as $k=>$item){
            if(empty($item)){
                $this->setError( _("Please complete all permission fields; Provide a title and uri defining the area, a permission type and value") );
                return false;
            }
        }
        
        if (!$table->bindData($aData)) {
            //print_R($table->getErrors());
            throw new \Platform\Exception( $table->getError() );
            return false;
        }
        
        //Check the Permission Area URI, make sure its not a route id,
        //We need exact URI paths, Throw an error is it does not make sense
        print_R($aData);
        
        if ($table->isNewRow()) {
            
        }
        
        //5. Save the table modifications
        if (!$table->save()) {
            return false;
        }
        
        return true;
        
    }

    /**
     * Stores Authority Data to the database
     * 
     * @param array $data
     * @return type 
     */
    public function store($data = "", $params = array()) {
        
        if(!empty($params)){
            if(isset($params[0])&&  strtolower($params[0])=="permissions"){
                return $this->storePermissions( $params );
            }
        }
        
        //1. Load Helpers
        $encrypt = \Library\Encrypt::getInstance();


        //2. Saniitize the data
        $authorityTitle = $this->input->getString("authority-title");
        $authorityParent = $this->input->getInt("authority-parent");
        $authorityId = $this->input->getInt("authority-id");

        $authorityDescription = $this->input->getString("authority-description");

        $authorityName = strtoupper(str_replace(array(" ", "(", ")", "-", "&", "%", ",", "#"), "", $authorityTitle));

//        $authorityAreaTitle         = $this->input->getArray("area-title", array() );
//        $authorityAreaURI           = $this->input->getArray("area-uri", array() );
//        $authorityAreaAction        = $this->input->getArray("area-action", array() );
//        $authorityAreaPermission    = $this->input->getArray("area-permission", array() );
//        
//        $authorityAreaName          = strtoupper(str_replace(array(" ", "(", ")", "-", "&", "%", ",", "#"), "", $authorityAreaTitle));
//        

        $aData = array(
            "authority_id" => $authorityId,
            "authority_name" => $authorityName,
            "authority_title" => $authorityTitle,
            "authority_parent_id" => empty($authorityParent) ? 1 : (int) $authorityParent,
            "authority_description" => $authorityDescription
        );

        //3. Load and prepare the Authority Table
        $table = $this->load->table("?authority");

        if (!$table->bindData($aData)) {
            //print_R($table->getErrors());
            throw new \Platform\Exception($table->getError());
            return false;
        }

        //4. Are we adding a new row
        if ($table->isNewRow()) {
            
            if (empty($authorityName) || empty($authorityParent) || empty($authorityTitle)) {
                $this->setError(_('Every new authority must have a defined Title, and must be a subset of the public authority'));
                return false;
            }

            //Get the parent left and right value, to make space
            $parent = $this->database->select("lft, rgt")->from("?authority")->where("authority_id", (int) $table->getRowFieldValue('authority_parent_id'))->prepare()->execute()->fetchObject();

            $update = array(
                "lft" => "lft+2",
                "rgt" => "rgt+2"
            );

            //echo $parent->rgt;

            $this->database->update("?authority", array("lft" => "lft+2"), array("lft >" => ($parent->rgt - 1)));
            $this->database->update("?authority", array("rgt" => "rgt+2"), array("rgt >" => ($parent->rgt - 1)));

            $table->setRowFieldValue("lft", $parent->rgt);
            $table->setRowFieldValue("rgt", $parent->rgt + 1);
        }

        //5. Save the table modifications
        if (!$table->save()) {
            return false;
        }
        
        return true;
    }

    public function load() {
        
    }

    public function delete() {
        
    }

    public function validate() {
        
    }

    public function getToken() {
        
    }

    public function getAuthorities() {


        //Get All authorities from the database
        $statement = $this->database->select("a.*, count(p.permission) AS permissions")->from("?authority a")->join("?authority_permissions p", "a.authority_id=p.authority_id", "LEFT")->groupBy("a.authority_name")->orderBy("a.lft", "ASC")->prepare();
        $results = $statement->execute();

        //Authorities Obbject
        $rows        = $results->fetchAll();
        $authorities = array();
        $right = array();
        
        //print_R($rows);
        
        //die;

        foreach ($rows as $authority) {
        //while($authority = $results->fetchAssoc()){
            if (count($right) > 0) {
                while ($right[count($right) - 1] < $authority['rgt']) {
                    array_pop($right);
                }
            }
            //Authority Indent
            $authority["indent"] = count($right);
            
            //Authority Permissions;
            if((int)$authority['permissions']>0){
                
                $authority['permissions'] = $this->database->select('p.*')->from("?authority_permissions p")->where("p.authority_id =", $authority['authority_id'])->run()->fetchAll();
                
                //print_R($authority['permissions']);
            }

            $node = array(
                "authority" => $authority,
            );
            $authorities[] = $node;
            $right[] = $authority['rgt'];
        }

        return $authorities;
    }

    public static function getInstance() {

        static $instance;

        //If the class was already instantiated, just return it
        if (isset($instance))
            return $instance;

        $instance = new self;

        return $instance;
    }

}

