<?php 

require $_SERVER['DOCUMENT_ROOT']."/apiJokes/config/config.php";

class apiData {

    public $data;

    public function __construct()
    {
       $this->data = file_get_contents(DB_FILE);
    }

    public function getAllData()
    {
        return $this->data; 
    }

    // TODO: Create insert, update, delete ?


}
