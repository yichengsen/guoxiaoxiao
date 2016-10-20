<?php /* Smarty version Smarty-3.1.18, created on 2016-10-17 16:59:34
         compiled from ".\view\power\admin-role-adds.html" */ ?>
<?php /*%%SmartyHeaderCode:3620580492f66e5901-67789940%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1b7fa1599de1c268ab681cf9e68778457e77cb22' => 
    array (
      0 => '.\\view\\power\\admin-role-adds.html',
      1 => 1476692325,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3620580492f66e5901-67789940',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'role' => 0,
    'arr' => 0,
    'arr1' => 0,
    'arr2' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_580492f69d51f3_34384897',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_580492f69d51f3_34384897')) {function content_580492f69d51f3_34384897($_smarty_tpl) {?><html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>新增班级</title>
    <link rel="stylesheet" type="text/css" href="static/h-ui/css/erweima-style.css" />
</head>
<body>
<div class="chuda_co" id="container">
    <div class="co-box">
        <div class="title"><h4>角色管理>>分配权限>><a href="power.php?c=power&&a=rolenameAdd"><h4>+添加角色</a>
	</div>
        <div class="fill-info">
            <form action="power.php?c=power&&a=allotPower" method="post">
                <div class="info-box">
                    <table >
                        <tr>
                            <td><b>&nbsp;&nbsp;分配角色 :  &nbsp;&nbsp;</b></td>
                            <td>
                                <select name="role_id" id="r_id" onchange="selectRole()">
                                    <option value="请选择">请选择</option>
                                    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['sn'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['sn']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['sn']['name'] = 'sn';
$_smarty_tpl->tpl_vars['smarty']->value['section']['sn']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['role']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
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
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['role']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sn']['index']]['role_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['role']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sn']['index']]['role_name'];?>
</option>
                                    <?php endfor; endif; ?>
                                </select>
                            </td>
                        </tr>
                    </table>
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
                    <hr>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <!--一级权限-->
                    <input type="checkbox" name="p_id[]" id="<?php echo $_smarty_tpl->tpl_vars['arr']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sns']['index']]['power_id'];?>
" onclick="checkedPower(this)" value="<?php echo $_smarty_tpl->tpl_vars['arr']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sns']['index']]['power_id'];?>
"/><b style="color: black">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['arr']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sns']['index']]['power_name'];?>
</h7>
                        <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['sno'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['sno']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['sno']['name'] = 'sno';
$_smarty_tpl->tpl_vars['smarty']->value['section']['sno']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['arr1']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['sno']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['sno']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sno']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['sno']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['sno']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sno']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['sno']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['sno']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['sno']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sno']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['sno']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['sno']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['sno']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['sno']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['sno']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sno']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['sno']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['sno']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['sno']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['sno']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['sno']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['sno']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['sno']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sno']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['sno']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sno']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['sno']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['sno']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sno']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['sno']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['sno']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['sno']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['sno']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['sno']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['sno']['total']);
?>
                    <!--二级权限-->
                    <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['arr']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sns']['index']]['power_id'];?>
<?php $_tmp1=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['arr1']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sno']['index']]['parent_id'];?>
<?php $_tmp2=ob_get_clean();?><?php if ($_tmp1==$_tmp2) {?>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                          <input type="checkbox" name="p_id[]" onclick="checkedPower(this)" id="<?php echo $_smarty_tpl->tpl_vars['arr1']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sno']['index']]['power_id'];?>
"  value="<?php echo $_smarty_tpl->tpl_vars['arr1']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sno']['index']]['power_id'];?>
"/>
                    <b style="color: black">&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['arr1']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sno']['index']]['power_name'];?>
</b>
                    <!--三级权限-->
                        <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['snq'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['snq']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['snq']['name'] = 'snq';
$_smarty_tpl->tpl_vars['smarty']->value['section']['snq']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['arr2']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['snq']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['snq']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['snq']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['snq']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['snq']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['snq']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['snq']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['snq']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['snq']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['snq']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['snq']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['snq']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['snq']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['snq']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['snq']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['snq']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['snq']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['snq']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['snq']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['snq']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['snq']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['snq']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['snq']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['snq']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['snq']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['snq']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['snq']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['snq']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['snq']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['snq']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['snq']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['snq']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['snq']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['snq']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['snq']['total']);
?>
                            <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['arr1']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sno']['index']]['power_id'];?>
<?php $_tmp3=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['arr2']->value[$_smarty_tpl->getVariable('smarty')->value['section']['snq']['index']]['parent_id'];?>
<?php $_tmp4=ob_get_clean();?><?php if ($_tmp3==$_tmp4) {?>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                          <input type="checkbox" name="p_id[]" id="<?php echo $_smarty_tpl->tpl_vars['arr2']->value[$_smarty_tpl->getVariable('smarty')->value['section']['snq']['index']]['power_id'];?>
"  value="<?php echo $_smarty_tpl->tpl_vars['arr2']->value[$_smarty_tpl->getVariable('smarty')->value['section']['snq']['index']]['power_id'];?>
"/>
                        <b style="color: black">&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['arr2']->value[$_smarty_tpl->getVariable('smarty')->value['section']['snq']['index']]['power_name'];?>
</b>
                            <?php }?>
                        <?php endfor; endif; ?>
                    <?php }?>
                        <?php endfor; endif; ?>
                    <?php endfor; endif; ?>
                        <div class="preview">
                            <input type="submit" class="preview-btn btn01" value="保存"/>
                            <input type="reset" class="preview-btn btn01" value="取消"/>
                        </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
<script type="text/javascript" src="lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="static/h-ui/js/power/admin-role-adds.js"></script>
<?php }} ?>
