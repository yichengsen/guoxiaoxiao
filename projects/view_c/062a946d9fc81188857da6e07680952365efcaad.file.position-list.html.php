<?php /* Smarty version Smarty-3.1.18, created on 2016-10-17 16:55:46
         compiled from ".\view\position\position-list.html" */ ?>
<?php /*%%SmartyHeaderCode:11215804921237b0a3-25668159%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '062a946d9fc81188857da6e07680952365efcaad' => 
    array (
      0 => '.\\view\\position\\position-list.html',
      1 => 1476693190,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11215804921237b0a3-25668159',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'total' => 0,
    'data' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_58049212597240_60209898',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58049212597240_60209898')) {function content_58049212597240_60209898($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("view/index/_meta.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 职位管理 <span class="c-gray en">&gt;</span> 职位列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="text-c">
	<form action="position.php?c=position&&a=positionList" method="post">
		<input type="text" class="input-text" style="width:250px" placeholder="输入职位名称" id="" name="position_name">
		<button type="submit" class="btn btn-success" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜职位</button>
	</form>
	</div>
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l">
	<input type="button" onclick="positionDelall()" class="btn btn-danger radius" value="批量删除">
	<a href="position.php?c=position&&a=positionAdd" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加职位</a></span> <span class="r">共有数据：<strong><?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</strong> 条</span> </div>
	<table class="table table-border table-bordered table-bg">
		<thead>
			<tr>
				<th scope="col" colspan="12">职位列表</th>
			</tr>
			<tr class="text-c">
				<th width="25"><input type="checkbox"></th>
				<th width="40">ID</th>
				<th width="100">职位名称</th>
				<th width="90">工作年限</th>
				<th width="70">薪资</th>
				<th width="40">性别</th>
				<th width="80">学历</th>
				<th width="90">福利</th>
				<th width="150">职位描述</th>
				<th width="150">任职条件</th>
				<th width="80">操作</th>
			</tr>
		</thead>
		<tbody>
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
			<tr class="text-c">
				<td><input type="checkbox" name="ids"  value="<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sn']['index']]['p_id'];?>
"></td>
				<td><?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sn']['index']]['p_id'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sn']['index']]['position_name'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sn']['index']]['position_work_age'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sn']['index']]['position_salary'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sn']['index']]['position_sex'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sn']['index']]['position_degree'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sn']['index']]['position_welfare'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sn']['index']]['position_describe'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sn']['index']]['position_condition'];?>
</td>
				<td class="td-manage">
				<a title="编辑" href="position.php?c=position&&a=positionEdit&&p_id=<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sn']['index']]['p_id'];?>
" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>
				<a title="删除" href="javascript:;" onclick="admin_del(this,<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sn']['index']]['p_id'];?>
)" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
			</tr>
		<?php endfor; endif; ?>
		</tbody>
	</table>
	<center>
	<span class="Hui-iconfont"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</span>
	</center>
</div>
<script type="text/javascript" src="lib/jquery/1.9.1/jquery.min.js"></script>  
<script type="text/javascript" src="lib/layer/2.1/layer.js"></script> 
<script type="text/javascript" src="lib/laypage/1.2/laypage.js"></script> 
<script type="text/javascript" src="lib/My97DatePicker/WdatePicker.js"></script> 
<script type="text/javascript" src="static/h-ui/js/H-ui.js"></script> 
<script type="text/javascript" src="static/h-ui.admin/js/H-ui.admin.js"></script> 
<script type="text/javascript" src="static/h-ui/js/position/position-list.js"></script>
</body>
</html><?php }} ?>
