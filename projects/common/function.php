<?php
//ͨ��get��ʽ��ֵ����ȡ
function get($key,$default=""){
	
	$root = $_SERVER['SCRIPT_NAME'];  
	$request = $_SERVER['REQUEST_URI']; 
	//print_r($_SERVER["PATH_INFO"]);die; 
    if(ROUTE){ //pathinfo ʱ����ʾ index.php/1/2/3/4/5/
		 //$_SERVER["PATH_INFO"]) 

	}else{ //pathinfo ʱ����ʾindex.php?a=1&b=&
		 //[QUERY_STRING] => c=index&c=index
		 $keyval_arr  = explode("&",$_SERVER['QUERY_STRING']);
		 if(is_array($keyval_arr)==false){
			 $keyval_arr = array($keyval_arr);
		 }
		 foreach ($keyval_arr as $val){
			 echo $val;
			 preg_match_all('|(.*)=(.*)|U',$val,$arr);
			 print_r($arr);
		 }
	}
}
//���������ֶ�
function stripslashes_array(&$array) {
	while(list($key,$var) = each($array)) {
		if ($key != 'argc' && $key != 'argv' && (strtoupper($key) != $key || ''.intval($key) == "$key")) {
			if (is_string($var)) {
				$array[$key] = stripslashes($var);
			}
			if (is_array($var))  {
				$array[$key] = stripslashes_array($var);
			}
		}
	}
	return $array;
}
//--------------------------
// �滻HTMLβ��ǩ,Ϊ���˷���
//--------------------------
function lib_replace_end_tag($str){
	if (empty($str)) return false;
	$str = htmlspecialchars($str);
	$str = str_replace( '/', "", $str);
	$str = str_replace("\\", "", $str);
	$str = str_replace("&gt", "", $str);
	$str = str_replace("&lt", "", $str);
	$str = str_replace("<SCRIPT>", "", $str);
	$str = str_replace("</SCRIPT>", "", $str);
	$str = str_replace("<script>", "", $str);
	$str = str_replace("</script>", "", $str);
	$str=str_replace("select","select",$str);
	$str=str_replace("join","join",$str);
	$str=str_replace("union","union",$str);
	$str=str_replace("where","where",$str);
	$str=str_replace("insert","insert",$str);
	$str=str_replace("delete","delete",$str);
	$str=str_replace("update","update",$str);
	$str=str_replace("like","like",$str);
	$str=str_replace("drop","drop",$str);
	$str=str_replace("create","create",$str);
	$str=str_replace("modify","modify",$str);
	$str=str_replace("rename","rename",$str);
	$str=str_replace("alter","alter",$str);
	$str=str_replace("cas","cast",$str);
	$str=str_replace("&","&",$str);
	$str=str_replace(">",">",$str);
	$str=str_replace("<","<",$str);
	$str=str_replace(" ",chr(32),$str);
	$str=str_replace(" ",chr(9),$str);
	$str=str_replace("    ",chr(9),$str);
	$str=str_replace("&",chr(34),$str);
	$str=str_replace("'",chr(39),$str);
	$str=str_replace("<br />",chr(13),$str);
	$str=str_replace("''","'",$str);
	$str=str_replace("css","'",$str);
	$str=str_replace("CSS","'",$str);
	
	return $str;
	
}