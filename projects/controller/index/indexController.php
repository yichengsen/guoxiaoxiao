<?php

class indexController extends baseController {
	
	public function index(){
		//var_dump($_COOKIE);die;
		if(@$_COOKIE["username"] == '' && @$_COOKIE["password"] == ''){
			$this->assign('username','');
			$this->assign('password','');
		}else{
			$this->assign('username',$_COOKIE["username"]);
			$this->assign('password',$_COOKIE["password"]);
		}
        $this->display('login.html');
	}

	//登录操作
	public function logins(){
		//接收用户名、密码、验证码
		@$username = trim($_POST['username']);
		@$password = trim($_POST['password']);
		@$remember = $_POST['remember'];
		@$vcode = trim($_POST['vcode']);
		$model = new IndexModel();
		//查询所属用户名是否存在
		$data = $model->login($username);
		session_start();
		@$ses_vcode = $_SESSION["ses_vcode"];
		//判断验证码是否正确
		if(@$data[0]['is_lock'] == 1){
			echo "<script>alert('您的账号处于锁定状态');location.href='index.php?c=index&&a=index'</script>";
		}else{
			if(strtolower($vcode)==strtolower($ses_vcode)){
				if(empty($data)){
					echo "<script>alert('请重新输入用户名');location.href='index.php?c=index&&a=index'</script>";
				}else{
					//$pwd = md5($password);
					//$salt = $data[0]['salt'];
					//$passwords = md5($pwd.$salt);
					$passwords = $model->authcode($password);
					//echo $passwords;echo "</br>";
					$passwords = $data[0]['password'];
					$pwd = $model->authcode2($passwords);
					//echo $password;echo "</br>";echo $pwd;die;
					if($pwd==$password){
							//session_destroy();
							if(!empty($remember)){
								setcookie('username',$username,time()+3600);
								setcookie('password',$password,time()+3600);
							}
							$_SESSION["username"] = $username;
							$_SESSION["user_id"] = $data[0]['user_id'];
							$_SESSION["role_id"] = $data[0]['role_id'];
						    echo "<script>location.href='index.php?c=index&&a=indexes'</script>";
					}
					else{
						echo "<script>alert('请重新输入密码');location.href='index.php?c=index&&a=index'</script>";
					}
				}
			}else{
				echo "<script>alert('请重新输入验证码');location.href='index.php?c=index&&a=index'</script>";
				$_SESSION["error"]=1;
			}
		}
	}
	
	//详情页面
	public function indexes(){
        $model = new indexModel();
		session_start();
		@$username = $_SESSION["username"];
        //echo $_SESSION["user_id"];die;
        @$role_id = $_SESSION['role_id'];
        //判断是否登录
        if(empty($username)){
            echo "<script>alert('对不起，您请先登录');location.href='index.php?c=index&&a=index'</script>";
        }else{
            $power = $model->selectAdminPower($role_id);
            $power_id = @$power[0]['power_id'];
            //通过权限ID查询权限
            $arr = $model->selectAdminPowers($power_id);
            $data = $this->digui($arr,0,0);
            //查询出来登陆者的权限
            for($i=0;$i<count($arr);$i++){
                $controller_name[]= $arr[$i]['controller_name'];
                $controller_way[] = $arr[$i]['controller_way'];
            }
            $_SESSION["controller_name"] = $controller_name;
            $_SESSION["controller_way"] = $controller_way;
            $username = $_SESSION["username"];
            $this->assign('data',$data);
            $this->assign('username',$username);
			$this->display('_header.html');
            $this->display('index.html');
        }
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

	//退出
	public function quit(){
		//session_start();
		//session_unset();
		//session_destroy();
		setcookie('username', '');
		setcookie('password', ''); 
		echo "<script>alert('退出成功');location.href='index.php?c=index&&a=index'</script>";
	}

	//记住密码操作
	public function rememberName(){
		$username = $_POST['username'];
		@$usernames = $_COOKIE["username"];
		//echo $username;echo "</br>";
		//echo $usernames;
		if($usernames == $username){
			$model = new indexModel();
			$arr = $model->login($username);
			$passwords = $arr[0]['password'];
			$pwd = $model->authcode2($passwords);
			echo json_encode($pwd);
		}else{
			echo "4423";
		}
	}

}