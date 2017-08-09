<?php

class Email_settings_model extends CORE_Model {
    protected  $table="email_settings";
    protected  $pk_id="email_id";


    function __construct() {
        parent::__construct();
    }



        function create_default_email_setting(){

        //return;
        $sql="INSERT INTO
                  email_settings(email_id,email_address,password,email_from,name_from,default_message) VALUES (1,'manaloraf03@gmail.com','xxseunghyunk216','rafael','rafael','message')
              ON DUPLICATE KEY UPDATE
                email_settings.email_id=VALUES(email_settings.email_id),
                email_settings.email_address=VALUES(email_settings.email_address),
                email_settings.password=VALUES(email_settings.password),
                email_settings.email_from=VALUES(email_settings.email_from),
                email_settings.name_from=VALUES(email_settings.name_from),
                email_settings.default_message=VALUES(email_settings.default_message)



                ;
        ";
        $this->db->query($sql);

    }

}



?>