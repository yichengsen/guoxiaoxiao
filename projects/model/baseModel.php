<?php
class baseModel {
	public $db = false;
    function __construct(){
		$this->db = new dbLibrary(HOST,DBUSER,DBPWD,DBNAME);
	}
}