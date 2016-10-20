<?php /* Smarty version Smarty-3.1.18, created on 2016-10-17 16:49:47
         compiled from ".\view\admin\admin-edit.html" */ ?>
<?php /*%%SmartyHeaderCode:32678580490ab7d8273-31617468%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fd21439ec339c9efe3619e781db50314c87a264a' => 
    array (
      0 => '.\\view\\admin\\admin-edit.html',
      1 => 1476691612,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '32678580490ab7d8273-31617468',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'arr' => 0,
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_580490ab9a1079_92432656',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_580490ab9a1079_92432656')) {function content_580490ab9a1079_92432656($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("view/index/_meta.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</head>
<body>
<article class="page-container">
	<form class="form form-horizontal" action="admin.php?c=admin&&a=adminUpdate" method="post" id="form-admin-add">
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['sns'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['sns']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['sns']['name'] = 'sns';
$_smarty_tpl->tpl_vars['smarty']->value['section']['sns']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['arr']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['sns']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['sns']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sns']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['sns']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['sns']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sns']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['sns']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['sns']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['sns']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sns']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['sns']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['sns']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['sns']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['sns']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['sns']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sns']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['sns']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['sns']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['sns']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['sns']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['sns']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['sns']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['sns']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sns']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['sns']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sns']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['sns']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['sns']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sns']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['sns']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['sns']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['sns']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['sns']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['sns']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['sns']['total']);
?>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>管理员：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="<?php echo $_smarty_tpl->tpl_vars['arr']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sns']['index']]['username'];?>
" placeholder="" id="adminName" name="username">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>初始密码：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="password" class="input-text" autocomplete="off" placeholder="密码" id="password" name="password">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>确认密码：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="password" class="input-text" autocomplete="off"  placeholder="确认新密码" id="password2" name="password2">
			<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['arr']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sns']['index']]['user_id'];?>
" name="user_id"/>
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>性别：</label>
		<div class="formControls col-xs-8 col-sm-9 skin-minimal">
		<?php if ($_smarty_tpl->tpl_vars['arr']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sns']['index']]['sex']==1) {?>
			<div class="radio-box">
				<input name="sex" type="radio" value="男" id="sex-1" checked>
				<label for="sex-1">男</label>
			</div>
			<div class="radio-box">
				<input type="radio" id="sex-2" value="女" name="sex">
				<label for="sex-2">女</label>
			</div>
		<?php } else { ?>
			<div class="radio-box">
				<input type="radio" id="sex-2" value="女" name="sex" checked>
				<label for="sex-2">女</label>
			</div>
			<div class="radio-box">
				<input name="sex" type="radio" value="男" id="sex-1" >
				<label for="sex-1">男</label>
			</div>
		<?php }?>
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>手机：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="<?php echo $_smarty_tpl->tpl_vars['arr']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sns']['index']]['phone'];?>
" placeholder="" id="phone" name="phone">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>邮箱：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" value="<?php echo $_smarty_tpl->tpl_vars['arr']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sns']['index']]['email'];?>
" class="input-text" placeholder="@" name="email" id="email">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">角色：</label>
		<div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:150px;">
			<select class="select" name="role_id" size="1">
			<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['sn'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['sn']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['sn']['name'] = 'sn';
$_smarty_tpl->tpl_vars['smarty']->value['section']['sn']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['sn']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['sn']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sn']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['sn']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['sn']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sn']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['sn']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['sn']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['sn']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sn']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['sn']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['sn']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['sn']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['sn']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['sn']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sn']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['sn']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['sn']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['sn']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['sn']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['sn']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['sn']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['sn']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sn']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['sn']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sn']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['sn']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['sn']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sn']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['sn']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['sn']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['sn']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['sn']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['sn']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['sn']['total']);
?>
				<option value="<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sn']['index']]['role_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sn']['index']]['role_name'];?>
</option>
			<?php endfor; endif; ?>
			</select>
			</span> </div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">备注：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<textarea name="remark"  cols="" rows="" class="textarea"  placeholder="说点什么...100个字符以内" dragonfly="true" onKeyUp="textarealength(this,100)"><?php echo $_smarty_tpl->tpl_vars['arr']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sns']['index']]['remark'];?>
</textarea>
			<p class="textarea-numberbar"><em class="textarea-length">0</em>/100</p>
		</div>
	</div>
	<div class="row cl">
		<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
			<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
		</div>
	</div>
	<?php endfor; endif; ?>
	</form>
</article>

<!--_footer 作为公共模版分离出去--> 
<?php echo $_smarty_tpl->getSubTemplate ("view/index/_footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
 
<!--/_footer /作为公共模版分离出去--> 

<!--请在下方写此页面业务相关的脚本--> 
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html><?php }} ?>
