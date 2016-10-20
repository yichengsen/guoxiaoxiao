<?php /* Smarty version Smarty-3.1.18, created on 2016-10-18 10:46:58
         compiled from ".\view\power\role-name-add.html" */ ?>
<?php /*%%SmartyHeaderCode:32677580492f8850187-57187868%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2821eec4753cc0892069c903a8f163ca9d89478a' => 
    array (
      0 => '.\\view\\power\\role-name-add.html',
      1 => 1476758813,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '32677580492f8850187-57187868',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_580492f89334e2_75596595',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_580492f89334e2_75596595')) {function content_580492f89334e2_75596595($_smarty_tpl) {?><!--_meta 作为公共模版分离出去-->
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<LINK rel="Bookmark" href="/favicon.ico" >
<LINK rel="Shortcut Icon" href="/favicon.ico" />
<!--[if lt IE 9]>
<script type="text/javascript" src="http://lib.h-ui.net/html5.js"></script>
<script type="text/javascript" src="http://lib.h-ui.net/respond.min.js"></script>
<script type="text/javascript" src="http://lib.h-ui.net/PIE_IE678.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="http://static.h-ui.net/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="http://static.h-ui.net/h-ui/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="http://lib.h-ui.net/Hui-iconfont/1.0.7/iconfont.css" />
<link rel="stylesheet" type="text/css" href="http://lib.h-ui.net/icheck/icheck.css" />
<link rel="stylesheet" type="text/css" href="http://static.h-ui.net/h-ui/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="http://static.h-ui.net/h-ui/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<!--/meta 作为公共模版分离出去-->

<title>添加管理员 - 管理员管理 - H-ui.admin v2.4</title>
<meta name="keywords" content="H-ui.admin v2.3,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
<meta name="description" content="H-ui.admin v2.3，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<body>
<article class="page-container">
	<form class="form form-horizontal" action="power.php?c=power&&a=roleAdd" method="post" id="form-admin-add">
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>角色名称：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="" placeholder="" id="adminName" name="role_name">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">备注：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<textarea name="role_remark" cols="" rows="" class="textarea"  placeholder="说点什么...100个字符以内" dragonfly="true" onKeyUp="textarealength(this,100)"></textarea>
			<p class="textarea-numberbar"><em class="textarea-length">0</em>/100</p>
		</div>
	</div>
	<div class="row cl">
		<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
			<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
		</div>
	</div>
	</form>
</article>

<!--_footer 作为公共模版分离出去--> 
<script type="text/javascript" src="http://lib.h-ui.net/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="http://lib.h-ui.net/layer/2.1/layer.js"></script> 
<script type="text/javascript" src="http://lib.h-ui.net/icheck/jquery.icheck.min.js"></script> 
<script type="text/javascript" src="http://lib.h-ui.net/jquery.validation/1.14.0/jquery.validate.min.js"></script> 
<script type="text/javascript" src="http://lib.h-ui.net/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="http://lib.h-ui.net/jquery.validation/1.14.0/messages_zh.min.js"></script> 
<script type="text/javascript" src="static/h-ui/js/H-ui.js"></script> 
<script type="text/javascript" src="static/h-ui.admin/js/H-ui.admin.js"></script> 
<!--/_footer /作为公共模版分离出去--> 

<!--请在下方写此页面业务相关的脚本--> 
<script type="text/javascript">
$(function(){
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
	
	$("#form-admin-add").validate({
		rules:{
			role_name:{
				required:true,
				minlength:1,
				maxlength:16
			},
			adminRole:{
				required:true,
			},
		},
		onkeyup:false,
		focusCleanup:true,
		success:"valid",
		submitHandler:function(form){
			$(form).ajaxSubmit();
			var index = parent.layer.getFrameIndex(window.name);
			parent.$('.btn-refresh').click();
			parent.layer.close(index);
		}
	});
});
</script> 
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html><?php }} ?>
