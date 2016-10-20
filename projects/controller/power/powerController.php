<?php
class powerController extends baseController {
	static $operationTrue = "<div id='div_test' style='display:block;color:white;line-height:25px;position:absolute;z-index:100;left:50%;top:2%;margin-left:-75px;text-align:center;width:150px;height:25px;background-color:green;font-size:12px;'>恭喜你，操作成功!</div>";
	static $operationFalse = "<div id='div_test' style='display:block;color:white;line-height:25px;position:absolute;z-index:100;left:50%;top:2%;margin-left:-75px;text-align:center;width:150px;height:25px;background-color:green;font-size:12px;'>对不起,操作失败!</div>";
	        

	//权限添加
	public function addPower(){
		$model = new powerModel();
		//递归查询出权限
		$power = $model->adminPower();
		$data = $this->digui($power,0,0);
		$this->assign('data',$data);
		$this->display('admin-power-add.html');
	}

	//添加父级权限
	public function fatherPower(){
		$data['power_name'] = $_POST['power_name'];
		$data['controller_name'] = $_POST['controller_name'];
		$model = new powerModel();
		$flag = $model->fatherPower($data);
		if($flag){
			$arr = $model->all();
            $remark = $arr['fatherPower'];
            session_start();
            $user_id = $_SESSION["user_id"];
            $model->addOperation($remark,$user_id);

			echo self :: $operationTrue;
	        echo "<script>location.href='power.php?c=power&a=adminPower';</script>";
		}else{
			echo self :: $operationFalse;
			echo "<script>location.href='power.php?c=power&a=addPower';</script>";
		}
	}

	//添加子级权限
	public function sunPower(){
		$data['power_name'] = $_POST['power_name'];
		$data['controller_way'] = $_POST['controller_way'];
		$data['controller_name'] = $_POST['controller_name'];
		$data['parent_id'] = $_POST['parent_id'];
		$model = new powerModel();
		$flag = $model->sunPower($data);
		if($flag){
			$arr = $model->all();
            $remark = $arr['sunPower'];
            session_start();
            $user_id = $_SESSION["user_id"];
            $model->addOperation($remark,$user_id);

			echo self :: $operationTrue;
	        echo "<script>location.href='power.php?c=power&a=adminPower';</script>";
		}else{
			echo self :: $operationFalse;
	        echo "<script>location.href='power.php?c=power&a=addPower';</script>";
		}
	}

	//权限管理
	public  function adminPower(){
		$model = new powerModel();
		@$power_name = $_POST['power_name'];
		if($power_name!=''){
			$power = $model->selectPowerName($power_name);
			$data = $this->digui($power,0,0);
		}else{
			$power = $model->adminPower();
			$data = $this->digui($power,0,0);
		}
		$this->assign("data",$data);
		$this->display("admin-power.html");
	}

	//删除权限
	public function powerDelete(){
		$power_id = $_POST['power_id'];
		$model = new powerModel();
		$data = $model->selectDeletePower($power_id);
		if(empty($data)){
			$flag = $model->powerDelete($power_id);
			if(empty($flag)){
				$arr = $model->all();
				$remark = $arr['powerDelete'];
				$handle_id = $power_id;
				session_start();
				$user_id = $_SESSION["user_id"];
				$model->deleteOperation($remark,$user_id,$handle_id);

				echo "1";
			}else{
				echo "0";
			}
		}else{
			echo "2";
		}
	}

	//修改权限
	public function editPower(){
		$power_id = $_GET['power_id'];
		$model = new powerModel();
		$data = $model->editPower($power_id);
		$parent_id = $data[0]['parent_id'];
		if($parent_id==0){
			$arr = $model->editPower($power_id);
			$this->assign('arr',$arr);
			$this->display('edit-father-power.html');
		}else{
			$arr = $model->editPower($power_id);
			$data = $model->selectFatherPower();
			$this->assign('data',$data);
			$this->assign('arr',$arr);
			$this->display('edit-sun-power.html');
		}
	}

	//修改父级权限
	public function editFatherPower(){
		$power_id = $_POST['power_id'];
		$power_name = $_POST['power_name'];
		$model = new powerModel();
		$flag = $model->editFatherPower($power_id,$power_name);
		if($flag){
			$arr = $model->all();
			$remark = $arr['editFatherPower'];
			$handle_id = $power_id;
			session_start();
			$user_id = $_SESSION["user_id"];
			$model->deleteOperation($remark,$user_id,$handle_id);


			echo self :: $operationTrue;
	        echo "<script>location.href='power.php?c=power&a=adminPower';</script>";
		}else{
			echo self :: $operationFalse;
	        echo "<script>location.href='power.php?c=power&a=editFatherPower';</script>";
		}
	}

	//修改子级权限
	public function editSunPower(){
		$power_name = $_POST['power_name'];
		$controller_way = $_POST['controller_way'];
		$controller_name = $_POST['controller_name'];
		$parent_id = $_POST['parent_id'];
		$power_id = $_POST['power_id'];
		$model = new powerModel();
		$flag = $model->editSunpower($power_name,$controller_way,$controller_name,$parent_id,$power_id);
		if($flag){
			$arr = $model->all();
			$remark = $arr['editFatherPower'];
			$handle_id = $power_id;
			session_start();
			$user_id = $_SESSION["user_id"];
			$model->deleteOperation($remark,$user_id,$handle_id);

			echo self :: $operationTrue;
			echo "<script>location.href='power.php?c=power&a=adminPower';</script>";
		}else{
			echo self :: $operationFalse;
			echo "<script>location.href='power.php?c=power&a=addPower';</script>";
		}
	}


	//添加角色页面
	public function adminRoleAdd(){
        $model = new powerModel();
        $role = $model->selectRole();
        $power = $model->adminPower();
        $data = $this->digui($power,0,0);
        $arr = array();$arr2 = array();$arr3 = array();
        foreach($data as $k=>$v){
            if($v['flage']==0){
                $arr[] = $data[$k];
            }
            if($v['flage']==1){
                $arr1[] = $data[$k];
            }
            if($v['flage']==2){
                $arr2[] = $data[$k];
            }
        }
        $this->assign('role',$role);
        $this->assign('arr',$arr);
        $this->assign('arr1',$arr1);
        $this->assign('arr2',$arr2);
        $this->display('admin-role-adds.html');
	}

    //添加角色名称
    public function rolenameAdd(){
        $this->display('role-name-add.html');
    }

	//添加角色名称
	public function roleAdd(){
		$data['role_name'] = $_POST['role_name'];
		$data['role_remark'] = $_POST['role_remark'];
        $model = new powerModel();
        $flag = $model->roleAdd($data);
        if($flag){
			$arr = $model->all();
            $remark = $arr['roleAdd'];
            session_start();
            $user_id = $_SESSION["user_id"];
            $model->roleAddOperation($remark,$user_id);
			echo self :: $operationTrue;
	        echo "<script>location.href='power.php?c=power&a=adminRoleList';</script>";
		}else{
			echo self :: $operationFalse;
	        echo "<script>location.href='power.php?c=power&a=adminRoleList';</script>";
		}
	}

	//角色列表
	public function adminRoleList(){
		$model = new powerModel();
        //查询出角色列表
		$data = $model->adminRoleList();
		foreach($data as $key => $val)
		{
			$role_id = $val['role_id'];
			$username = $model ->selectName($role_id);
			$usernames = '';
			foreach($username as $kk => $vv)
			{
				$usernames .= ','.$vv['username']; 
			}
			$usernames = substr($usernames,1);
			$data[$key]['usernames'] = $usernames;
		}

		$this->assign('data',$data);
		$this->display('admin-role-list.html');
	}

	//角色删除
	public function adminRoleDelete(){
		$return = array(
			"code"=>1,
			"message"=>"",
			"data"=>""
		);
		$id = $_POST['id'];
		$model = new powerModel();
		$flag = $model->adminRoleDelete($id);
		if($flag){
			$arr = $model->all();
			$remark = $arr['adminRoleDelete'];
			$handle_id = $id;
			session_start();
			$user_id = $_SESSION["user_id"];
			$model->deleteOperation($remark,$user_id,$handle_id);

			$return["code"] = 1;
		}else{

			$return["code"] = -1;
			$return["message"] = "删除失败";
		}
		echo json_encode($return);
	}

	//角色批量删除
	public function adminRoleDelall(){
		$return = array(
			"code"=>1,
			"message"=>"",
			"data"=>""
		);
		$role_id = $_POST['role_id'];
		$model = new powerModel();
		$flag = $model->adminRoleDelall($role_id);
		if(!$flag){
			$arr = $model->all();
			$remark = $arr['adminRoleDelall'];
			$handle_id = $role_id;
			session_start();
			$user_id = $_SESSION["user_id"];
			$model->deleteOperation($remark,$user_id,$handle_id);

			$return["code"] = 1;
		}else{
			$return["code"] = -1;
			$return["message"] = "删除失败";
		}
		echo json_encode($return);
	}

    //给角色分配权限
    public function allotPower(){
        $role_id = $_POST['role_id'];
        $power_ids = $_POST['p_id'];
        $power_id = implode(',',$power_ids);
        $model = new powerModel();
        $flag = $model->allotPower($role_id,$power_id);
        if($flag){
			$arr = $model->all();
			$remark = $arr['allotPower'];
			$handle_id = $role_id;
			session_start();
			$user_id = $_SESSION["user_id"];
			$model->deleteOperation($remark,$user_id,$handle_id);

			echo self :: $operationTrue;
	        echo "<script>location.href='power.php?c=power&a=adminRoleList';</script>";
        }else{
           echo self :: $operationFalse;
	        echo "<script>location.href='power.php?c=power&a=adminRoleList';</script>";
        }
    }

    //父级选子级默认选中
    public function checkedPower(){
        $p_id = $_POST['p_id'];
        $obj= new powerModel();
        $arr = $obj->checkedPower($p_id);
        for($i=0;$i<count($arr);$i++){
            $p_name[]=$arr[$i]['power_id'];
        }
        $ids = implode(',',$p_name);
        $data = $obj->selectSunPowers($ids);
        if(empty($data)){
            $power_ids = $ids;
            $ids2 = explode(',',$power_ids);
        }else{
            for($i=0;$i<count($data);$i++){
                $p_ids[]=$data[$i]['power_id'];
            }
            $power_id =implode(',',$p_ids);
            $power_ids = $ids.','.$power_id;
            $ids2 = explode(',',$power_ids);
        }
        echo json_encode($ids2);
    }

    //默认选中
    public function selectPowers(){
        $role_id = $_POST['role_id'];
        $obj = new powerModel();
        $arr = $obj->selectPowers($role_id);
        $p_id = $arr[0]['power_id'];
        $ids = explode(',',$p_id);
        echo json_encode($ids);
    }

	 //递归引用
    public function digui($data,$path,$flage){
        //定义一个静态数组，为了存放递归后的数据
        static $arr=array();
        foreach($data as $key=>$val){
            if($val['parent_id']==$path){
                $val['flage']=$flage;
                $arr[]=$val;
                $this->digui($data,$val['power_id'],$flage+1);
            }
        }
        return $arr;die;
    }
}