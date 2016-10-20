<?php
class codeLibrary{

	function __construct(){
		session_start();
	
	}
	function showCode(){
		
		$_SESSION["code"] = "abcd";
		return "验证码：abcd";	

	
	}

	function checkCode($code){
		if($code !== $_SESSION["code"]){
			return false;
		}
		return true;
	}
}