<?php
class commenController extends baseController {
function __construct(){
        parent::__construct();
            //获取登录的用户名
			session_start();
            @$username = $_SESSION['username'];
           //获取URL地址栏名称
            $url = "http://".$_SERVER["HTTP_HOST"].(($_SERVER["SERVER_PORT"]==="80")?"":$_SERVER["SERVER_PORT"]).$_SERVER["REQUEST_URI"];
            $location = strstr($url, 'c=', false);
            //控制器名称
            $c_name = substr($location,2,5);
            //方法名称
            $c_way = substr($location,11);
            $controller_name = $_SESSION["controller_name"];
            $controller_way = $_SESSION["controller_way"];
			var_dump($controller_name);
            if(!empty($username)){
                if(in_array("power",$controller_name)){
                    if(in_array("adminAdds",$controller_way)){
                        echo "成功";
                    }else{
                        echo "<script>alert('对不起，您没有子级权限')";die;
                    }
                }else{
					echo "<script>alert('对不起，您没有父级权限');</script>";die;
				}
            }else{
                echo "<script>alert('请您fds先登录');location.href='index.php?c=index&&a=index'</script>";die;
            }
    }

}