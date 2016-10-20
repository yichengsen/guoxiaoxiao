<?php /* Smarty version Smarty-3.1.18, created on 2016-10-18 12:01:50
         compiled from ".\view\position\position-add.html" */ ?>
<?php /*%%SmartyHeaderCode:20765804920fbb7976-21785985%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3ceaf53b6efd09d82a90a126997de553c10f443e' => 
    array (
      0 => '.\\view\\position\\position-add.html',
      1 => 1476763307,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20765804920fbb7976-21785985',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5804920fc95f77_62229190',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5804920fc95f77_62229190')) {function content_5804920fc95f77_62229190($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("view/index/_meta.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</head>
<body>
<article class="page-container">
	<form class="form form-horizontal" action="position.php?c=position&&a=positionAdds" method="post" onsubmit="return checkall()">
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>职位名称：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" id="position_name" name="position_name" onblur="check_name()">
			<span id="s_position_name"></span>
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>职位性别：</label>
		<div class="formControls col-xs-8 col-sm-9 skin-minimal">
			<div class="radio-box">
				<input name="position_sex" type="radio" value="男" id="sex-1" >
				<label for="sex-1">男</label>
			</div>
			<div class="radio-box">
				<input type="radio" id="sex-2" value="女" name="position_sex">
				<label for="sex-2">女</label>
			</div>
			<div class="radio-box">
				<input type="radio" id="sex-2" value="不限" name="position_sex" checked>
				<label for="sex-2">不限</label>
			</div>
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>工作年限：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" placeholder="" name="position_work_age" id="position_work_age" onblur="check_age()">
			<span id="s_position_work_age"></span>
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>职位薪资：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" id="position_salary" name="position_salary" onblur="check_salary()">
			<span id="s_position_salary"></span>
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>职位学历：</label>
		<div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:150px;">
			<select class="select" name="position_degree" size="1">
				<option value="专科">专科</option>
				<option value="本科">本科</option>
				<option value="不限">不限</option>
				<option value="硕士">硕士</option>
				<option value="博士">博士</option>
			</select>
			</span> </div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>职位福利：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" id="position_welfare" name="position_welfare" onblur="check_welfare()">
			<span id="s_position_welfare"></span>
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>职位描述：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" id="position_describe" name="position_describe" onblur="check_describe()">
			<span id="s_position_describe"></span>
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">任职条件：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<textarea name="position_condition" cols="" rows="" class="textarea"  placeholder="说点什么...100个字符以内" dragonfly="true" onKeyUp="textarealength(this,100)"></textarea>
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
<?php echo $_smarty_tpl->getSubTemplate ("view/index/_footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<!--/_footer /作为公共模版分离出去--> 
<script src="static/H-ui/js/position/position-add.js"></script>
</body>
</html><?php }} ?>
