<?php
class indexModel extends baseModel { 

    function __construct(){
		parent:: __construct(); 
	}

	//查询登录用户
	public function login($username){
		$arr = $this->db->select("admin", array('username' => $username));
        return $arr;
	}

    //查询登录用户的角色
    public function selectAdminPower($role_id){
       $arr = $this->db->select("role", array('role_id' => $role_id));
        return $arr;
    }

    //通过查询用户的权限ID查询权限
    public function selectAdminPowers($power_id){
        $sql ="select * from power where power_id in ($power_id)";
        return $this->db->getAll($sql);
    }

	//用户密码加解密
	public function authcode($password){
		$str = $password; 
		$key = 'www.fyunw.com'; 
		$authcode =  $this->db->authcode($str,'ENCODE',$key,0);
		return $authcode;
	}
	public function authcode2($passwords){
		$key = 'www.fyunw.com'; 
		$authcode =  $this->db->authcode($passwords,'DECODE',$key,0);
		return $authcode;
	}

	//demo示例
	function text(){

        $sql = "select typeid,name from pre_forum_threadclass where fid = 2 ";
		$typeids = $this->db->getAll($sql);
		$k = 1;
		foreach( $typeids as $value){
			$sql = 'select a.typeid, a.subject , b.message from pre_forum_thread a, pre_forum_post b 
where a.tid = b.tid and b.first = 1  and a.typeid = '.$value['typeid'];
			$list = $this->db->getAll($sql);
			$key =1; 
			$str = '';
			foreach ($list as $val){
				$str.="\r\n";
				$str.="问题：".$key."\r\n";
				$str.="--------------------------------\r\n";
				$str.= "标题：".$val['subject']."\r\n";
				//[align=left]
				$val['message'] = preg_replace('|\[(\S\s)+\]|U','',$val['message']);
				$str.= "详细：".$val['message']."\r\n"; 
				$str.= "\r\n\r\n";
				$key++;
			}
			header("Content-type:text/html;charset=utf-8");
			file_put_contents($k.".txt",$str);
			$k++;
		}
	}
}
