<?php /* Smarty version Smarty-3.1.18, created on 2016-10-19 09:31:38
         compiled from ".\view\index\login.html" */ ?>
<?php /*%%SmartyHeaderCode:668758049affe5ec38-72751427%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2f8ee096bfd3787603128a46f37ed1b215465931' => 
    array (
      0 => '.\\view\\index\\login.html',
      1 => 1476838475,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '668758049affe5ec38-72751427',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_58049afff400a3_26667771',
  'variables' => 
  array (
    'username' => 0,
    'password' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58049afff400a3_26667771')) {function content_58049afff400a3_26667771($_smarty_tpl) {?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>智慧教育云平台・管理后台</title>
		<link rel="stylesheet" href="css/style.css" />
	</head>
	<body>
		<div class="containter">
			<div class="header">
				<span>智慧教育云平台・管理后台</span>
			</div>
			<div class="section">
				<div class="span1">
					<span>用亿万诚心培育万亩森林</span>
				</div>
				<div class="sec">
				<form action="index.php?c=index&&a=logins" method="post">
				            <span id="span1">登录名</span><br/>
				            <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['username']->value;?>
" name="username" id="user" />
				            <br/>
				            <span id="span2">密码</span><br/>
				            <input type="password" value="<?php echo $_smarty_tpl->tpl_vars['password']->value;?>
" name="password" id="pd"/>
				            <br/>
				            <span id="span3">验证码</span><br/>
				            <input type="text" name="vcode" placeholder="请输入验证码" id="input1" /> 		<img src='../image.php' width='130' height='27' onclick="this.src='../image.php?'+new Date().getTime()"; />
<br /><br />
				            <input type="checkbox" name="remember" id="input2"/>记住密码<br />
				            <input id="Button1" onclick="validate();" type="submit" value="确&nbsp;&nbsp;定" />
		         </form>
				</div>
			</div>
		</div>
	</body>
</html>
<script type="text/javascript" src="lib/jquery/1.9.1/jquery.min.js"></script>
<script>
/*function remember_name(){
	//alert("fdsfds");
	var username = $("#user").val();
		$.ajax({
		   type: "POST",
		   url: "index.php?c=index&&a=rememberName",
		   data: "username="+username,
		   dataType:"json",
		   success: function(msg){
			  //alert(msg);	  
			  $("#pd").html("<input type='password' name='password' id='pd' value='"+msg+"'/>");
		   }
	});
}*/
</script>
<?php }} ?>
