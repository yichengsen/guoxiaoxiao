<?php
class base {

    private $c = "index"; //默认控制器
    private $a = "index"; //默认方法

    function __construct(){

        //网站基本配置
        include "./common/config.php";

        //公共函数库
        include "./common/function.php";

        //处理特殊字符 G = GET  P = POST
        $G = $P = "";
        $this->requestSafe($G,$P);

        //通过路由规则来获取路由里参数控制器和方法的值。
        $this->route();

        //判断模块是否存在，不存在创建，主要是控制器（实现）和 view （实现） ，需要有开关控制。
        $this->initModule();

        //执行主体
        $this->runApp();

    }
    private function runApp(){
        $classname = $this->c."Controller";
        $obj = new $classname;
        $functionname = $this->a;

        $obj->$functionname();
    }
    /**
     * 安全处理get和post参数
     */
    private function requestSafe(&$G,&$P){
        //安全处理
        if (get_magic_quotes_gpc()) {
            $G = stripslashes_array($_GET);
            $P = stripslashes_array($_POST);
        }else{
            $G = $_GET;
            $P = $_POST;
        }
    }
    /**
     *  初始化模块 ，根据入口文件,生成控制器目录和模板目录。
     */
    private function initModule(){
        //模块目录初始化
        $pos1 = strrpos($_SERVER['SCRIPT_NAME'],"/");
        $pos2 = strrpos($_SERVER['SCRIPT_NAME'],".php");
        $moduleDirName = substr($_SERVER['SCRIPT_NAME'],$pos1+1,$pos2-$pos1-1);
        //模板目录里模块路径
        $tplDir = "./view/".$moduleDirName."/";
        //echo $tplDir;die;
        if(!is_dir($tplDir)){
            mkdir($tplDir,0777,true);
        }
        //控制器目录里模块路径
        $controllerdir = "./controller/".$moduleDirName."/";
        if(!is_dir($controllerdir)){
            mkdir($controllerdir,0777,true);
        }
        define("MODULEDIR",$moduleDirName."/");

    }
    /**
     * 传统路由接收参数
     */
    private function defaultRoute(){
        global $G,$P ;

        //传统方式接收参数
        if(isset($_GET["c"]) && !empty($_GET["c"])){
            $c = trim($_GET["c"]);
        }else{
            $c = "index";
        }

        if(isset($_GET["a"]) && !empty($_GET["a"])){
            $a = trim($_GET["a"]);
        }else{
            $a = "index";
        }

        $this->c = $c;
        $this->a = $a;

    }
    /**
     * pathinfo路由
     */
    private function pathInfoRoute(){
        # 定义application路径
        define("APPPATH", trim(__DIR__,'/'));
        # 获得请求地址
        $root = $_SERVER['SCRIPT_NAME'];
        $request = $_SERVER['REQUEST_URI'];

        $URI = array();

        # 获得index.php 后面的地址
        $url = trim(str_replace($root,'', $request), '/');

        # 如果为空，则是访问根地址
        if (empty($url))
        {
            # 默认控制器和默认方法
            $class = 'index';
            $func = 'index';
        }
        else
        {
            $URI = explode('/', $url);

            # 如果function为空 则默认访问index
            if (count($URI) < 2)
            {
                $class = $URI[0];
                $func = 'index';
            }
            else
            {
                $class = $URI[0];
                $func = $URI[1];
            }
        }
        $this->c = $class;
        $this->a = $func;
    }
    /**
     * 路由选择，在配置文件里配置为pathinfo方式的提取数据。
     */
    private function route(){
        if(ROUTE){
            $this->pathInfoRoute();
        }else{
            $this->defaultRoute();
        }
    }
}

function __autoload($class_name) {
    if(strpos($class_name,"Model")){
        include_once("./model/".$class_name.".php");
    }elseif(strpos($class_name,"Controller")){
        if(strpos($class_name,"base")!==false){
            $path = $class_name;
        }else{
            $path = MODULEDIR.$class_name ;
        }
        include_once("./controller/"."commenController".".php");
        include_once("./controller/".$path.".php");

    }elseif(strpos($class_name,"Library")){
        include_once("./controller/"."commenController".".php");
        include_once("./libs/".$class_name.".class.php");
    }else{
        echo $class_name,"<br>";
        exit("error");
    }
} 