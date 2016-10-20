<?php

class adminController extends baseController {
	static $operationTrue = "<div id='div_test' style='display:block;color:white;line-height:25px;position:absolute;z-index:100;left:50%;top:2%;margin-left:-75px;text-align:center;width:150px;height:25px;background-color:green;font-size:12px;'>恭喜你，操作成功!</div>";
	static $operationFalse = "<div id='div_test' style='display:block;color:white;line-height:25px;position:absolute;z-index:100;left:50%;top:2%;margin-left:-75px;text-align:center;width:150px;height:25px;background-color:green;font-size:12px;'>对不起,操作失败!</div>";


	//管理员添加页面
	public function adminAdd(){
		$model = new adminModel();
		$data = $model->selectRole();
		$this->assign('data',$data);
		$this->display('admin-add.html');
	}

	//管理员添加
	public function adminAdds(){
		$data['username'] = $_POST['username'];
		$password = $_POST['password'];
		$model = new adminModel();
		$pwd = $model->authcode($password);
		/*$password2 = md5($password);
        salt的截取
		$salt = substr($password2,28);
		//此密码值入库
		$data['password'] = md5($password2.$salt);*/
		$data['password'] = $pwd;
		$data['register_time'] = date('Y-m-d H:i:s',time());
		$data['sex'] = $_POST['sex'];
		$data['phone'] = $_POST['phone'];
		$data['email'] = $_POST['email'];
		$data['role_id'] = $_POST['role_id'];
		$data['remark'] = $_POST['remark'];
		//$data['salt'] = $salt;
		$flag = $model->adminAdds($data);
		if($flag){
            $datas = $model->all();
            $remark = $datas['adminAdds'];
            session_start();
            $user_id = $_SESSION["user_id"];
            $model->log($remark,$user_id);
			echo self :: $operationTrue;
			echo "<script>location.href='admin.php?c=admin&a=adminList';</script>";
		}else{
			echo self :: $operationFalse;
			echo "<script>location.href='admin.php?c=admin&a=adminAdd';</script>";
		}
	}

	//管理员列表
	public function adminList(){
		if(isset($_GET["page"])){
			$page = intval($_GET['page']);
		}else{
			$page = 1;
		}
		$model = new adminModel();
		@$username = $_POST['username'];
		if($username!=''){
			$list = $model->getLists($username,$page);
			$total = $model->getTotals($username);
		}else{
			$list = $model->getList($page);
			$total = $model->getTotal();
		}	
		foreach($list as $key => $val)
		{
			$role_id = $val['role_id'];
			$role_name = $model ->selectRoleName($role_id);
			
			$role_names = '';
			foreach($role_name as $kk => $vv)
			{
				$role_names .= ','.$vv['role_name']; 
			}
			$role_names = substr($role_names,1);
			$list[$key]['role_names'] = $role_names;
		}
		$page = new pageLibrary($total,$model->pagesize);
		$this->assign("data",$list);
		$this->assign("total",$total);
		$this->assign("page",$page->showpage());
		$this->display("admin-list.html");
	}

	//管理员删除
	public function adminDelete(){
		$return = array(
			"code"=>1,
			"message"=>"",
			"data"=>""
		);
		$id = $_POST['id'];
		$model = new adminModel();
		$flag = $model->adminDelete($id);
		if($flag){
			$arr = $model->all();
            $remark = $arr['adminDelete'];
            session_start();
            $user_id = $_SESSION["user_id"];
			$handle_id = $id;
            $model->admin($remark,$user_id,$handle_id);

			$return["code"] = 1;
		}else{
			
			$return["code"] = -1;
			$return["message"] = "删除失败";
		}
		echo json_encode($return);
	}
	
	//管理员名称即点即改
	public function changeName(){
		$return = array(
			"code"=>1,
			"message"=>"",
			"data"=>""
		);
		$username = $_POST['keys'];
		$user_id = $_POST['id'];
		$u_id = $user_id;
		$model = new adminModel();
		$flag = $model->changeName($username,$user_id);
		if($flag){
			$arr = $model->all();
            $remark = $arr['changeName'];
            session_start();
            $user_id = $_SESSION["user_id"];
			$handle_id = $u_id;
            $model->admin($remark,$user_id,$handle_id);

			$return["code"] = 1;
		}else{
			
			$return["code"] = -1;
			$return["message"] = "修改失败";
		}
		echo json_encode($return);
	}
	
	//管理员批量删除
	public function adminDelall(){
		$return = array(
			"code"=>1,
			"message"=>"",
			"data"=>""
		);
		$id = $_POST['id'];
		$model = new adminModel();
		$flag = $model->adminDelall($id);
		if(!$flag){
			$arr = $model->all();
            $remark = $arr['adminDelall'];
            session_start();
            $user_id = $_SESSION["user_id"];
			$handle_id = $id;
            $model->admin($remark,$user_id,$handle_id);
			$return["code"] = 1;
		}else{
			$return["code"] = -1;
			$return["message"] = "删除失败";
		}
		echo json_encode($return);
	}

	//管理员停用
	public function adminStops(){
		$id = $_POST['id'];
		$model = new adminModel();
		$data = $model->selectStatus($id);
		$is_lock = $data[0]['is_lock'];
		//1为启用状态
		if($is_lock==1){
			$flag = $model->changeStop($id);
			if($flag){
				$arr = $model->all();
				$remark = $arr['adminStops'];
				session_start();
				$user_id = $_SESSION["user_id"];
				$handle_id = $id;
				$model->admin($remark,$user_id,$handle_id);
				echo "1";
			}else{
				echo "-1";
			}
		}else{
			$flags = $model->changeStart($id);
			if($flags){
				$arr = $model->all();
				$remark = $arr['adminStops'];
				session_start();
				$user_id = $_SESSION["user_id"];
				$handle_id = $id;
				$model->admin($remark,$user_id,$handle_id);
				echo "2";
			}else{
				echo "-1";
			}
		}
	}

	//管理员编辑
	public function adminEdit(){
		$id = $_GET['id'];
		$model = new adminModel();
		$arr = $model->adminEdit($id);
		$data = $model->selectRole();
		$this->assign('data',$data);
		$this->assign('arr',$arr);
		$this->display('admin-edit.html');
	}

	//管理员编辑修改
	public function adminUpdate(){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$password2 = md5($password);
		$salt = substr($password2,28);
		//此密码值入库
		$password = md5($password2.$salt);
		$register_time = date('Y-m-d H:i:s',time());
		$sex = $_POST['sex'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$role_id = $_POST['role_id'];
		$remark = $_POST['remark'];
		$salt = $salt;
		$user_id = $_POST['user_id'];
		$model = new adminModel();
		$flag = $model->adminUpdate($username,$password,$salt,$register_time,$sex,$phone,$email,$role_id,$remark,$user_id);
		if($flag){
			echo self :: $operationTrue;
			echo "<script>location.href='admin.php?c=admin&a=adminList';</script>";
		}else{
			echo self :: $operationFalse;
			echo "<script>location.href='admin.php?c=admin&a=adminList';</script>";
		}
	}
}