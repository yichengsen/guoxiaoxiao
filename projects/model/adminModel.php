<?php
class adminModel extends baseModel {
	public $pagesize = 5; 

    function __construct(){
		parent:: __construct(); 
	}

	//测试
	public function powers(){
		$arr = $this->db->select("power");
        return $arr;
	}

	//通过角色ID查询角色名称
	public function selectRoleName($role_id){
		$arr = $this->db->select("role", array('role_id' => $role_id));
        return $arr;
	}

	//查询角色
	public function selectRole(){
		$arr = $this->db->select("role");
        return $arr;
	}

	//管理员添加
	public function adminAdds($data){
		$arr = $this->db->insert("admin", $data);
        return $arr;
	}

	//管理员列表
	public function adminList(){
		$arr = $this->db->select("admin");
        return $arr;
	}
	
	//管理员用户名即点即改
	public function changeName($username,$user_id){
		$arr = $this->db->update("admin", array('username' => $username), $condition =array('user_id'=>$user_id));
        return $arr;
	}

	//管理员删除
	public function adminDelete($id){
		$arr = $this->db->deletes("admin", array('user_id' => $id));
        return $arr;
	}

	//管理员批量删除
	public function adminDelall($id){
		$where="user_id in ($id)";
		$arr=$this->db->delete('admin',$where);
	}

	//查看管理员的状态
	public function selectStatus($id){
		$arr = $this->db->select("admin", array('user_id' => $id));
        return $arr;
	}
	
	//修改管理员为停用状态
	public function changeStop($id){
		$arr = $this->db->update("admin", array('is_lock' => 0), $condition =array('user_id'=>$id));
        return $arr;
	}

	//修改管理员为启用状态
	public function changeStart($id){
		$arr = $this->db->update("admin", array('is_lock' => 1), $condition =array('user_id'=>$id));
        return $arr;
	}

	//管理员列表分页
	function getList($page){
		$start = ($page-1)*$this->pagesize;
		$sql = "select * from admin where 1=1 limit ".$start.",".$this->pagesize;
		$list = $this->db->getAll($sql);
		return $list;
	}
	
	//获得管理员条数
	function getTotal(){
		$sql = "select count(*) from admin where 1=1 ";
		return $this->db->getOne($sql);
	}

	//搜索管理员列表分页
	function getLists($username,$page){
		$start = ($page-1)*$this->pagesize;
		$sql = "select * from admin where username like '%$username%'  limit ".$start.",".$this->pagesize;
		$list = $this->db->getAll($sql);
		return $list;
	}

	//获得管理员条数
	function getTotals($username){
		$sql = "select count(*) from admin where username like '%$username%' ";
		return $this->db->getOne($sql);
	}

	//管理员编辑
	public function adminEdit($id){
		$arr = $this->db->select("admin", array('user_id' => $id));
        return $arr;
	}
	
	//管理员编辑修改
	public function adminUpdate($username,$password,$salt,$register_time,$sex,$phone,$email,$role_id,$remark,$user_id){
		 $arr = $this->db->update("admin", array('username' => $username, 'password' => $password, 'salt' => $salt, 'register_time' => $register_time, 'sex' => $sex, 'phone' => $phone, 'email' => $email, 'role_id' => $role_id, 'remark' => $remark), $condition =array('user_id'=>$user_id));
         return $arr;
	}

	//修改用户信息
    public function updateGoods($id, $goods_name, $goods_price)
    {
        $arr = $this->db->update("ecs_goods", array('goods_name' => $goods_name, 'goods_price' => $goods_price), $condition =array('goods_id'=>$id));
        return $arr;
    }

	//模块名称处理
    public function all(){
        $remark = array(
            'adminAdds' => '管理员添加',
            'adminDelete' => '管理员删除',
			'changeName' => '管理员名称即点即改',
			'adminDelall' => '管理员批量删除',
			'adminStops' => '管理员状态修改',
			'adminUpdate' => '管理员编辑',
        );
        return $remark;
    }
	
	//添加管理员的日志管理
    public function log($remark,$user_id){
        $data =  array();
        $data['handle_type'] = $remark;
        $data['user_id'] = $user_id;
        $data['handle_ip'] = $_SERVER['REMOTE_ADDR'];
        $data['handle_time'] = date('Y-m-d H:i:s',time());
        $sql = "select * from admin order by user_id desc limit 1";
        $result = $this->db->getAll($sql);
        $data['handle_id'] = $result[0]['user_id'];
        $arr = $this->db->insert("log", $data);
        return $arr;
    }

	//删除管理员的日志管理
	public function admin($remark,$user_id,$handle_id){
		$data =  array();
        $data['handle_type'] = $remark;
        $data['user_id'] = $user_id;
        $data['handle_ip'] = $_SERVER['REMOTE_ADDR'];
        $data['handle_time'] = date('Y-m-d H:i:s',time());
		$data['handle_id'] = $handle_id;
		$arr = $this->db->insert("log", $data);
        return $arr;
	}
	
	//用户密码加解密
	public function authcode($password){
		$str = $password; 
		$key = 'www.fyunw.com'; 
		$authcode =  $this->db->authcode($str,'ENCODE',$key,0);
		return $authcode;
	}
	public function authcode2($pwd2){
		$key = 'www.fyunw.com'; 
		$authcode =  $this->db->authcode($pwd2,'DECODE',$key,0);
		return $authcode;
	}
   





	//demo
	/*function getList($page){
		
		$start = ($page-1)*$this->pagesize; 

		$sql = "select goods_name from ecs_goods where 1=1 limit ".$start.",".$this->pagesize;
		$list = $this->db->getAll($sql);
		return $list;
	}
	function getTotal(){
		$sql = "select count(*) from ecs_goods where 1=1 ";
		return $this->db->getOne($sql);
	}*/

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
				$str.="���⣺".$key."\r\n";
				$str.="--------------------------------\r\n";
				$str.= "���⣺".$val['subject']."\r\n";
				//[align=left]
				$val['message'] = preg_replace('|\[(\S\s)+\]|U','',$val['message']);
				$str.= "��ϸ��".$val['message']."\r\n"; 
				$str.= "\r\n\r\n";
				$key++;
			}
			header("Content-type:text/html;charset=utf-8");
			file_put_contents($k.".txt",$str);
			$k++;
		}
	}
}
