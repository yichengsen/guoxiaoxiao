<?php /* Smarty version Smarty-3.1.18, created on 2016-10-18 10:06:38
         compiled from ".\view\power\edit-father-power.html" */ ?>
<?php /*%%SmartyHeaderCode:15398580583aef268a8-63427098%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c866919770ebc3d8f79dda53d50a0cfc090d24b1' => 
    array (
      0 => '.\\view\\power\\edit-father-power.html',
      1 => 1476692586,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15398580583aef268a8-63427098',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'arr' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_580583af194cd9_14869571',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_580583af194cd9_14869571')) {function content_580583af194cd9_14869571($_smarty_tpl) {?><link rel="stylesheet" type="text/css" href="static/h-ui/css/erweima-style.css" />
<body>
<div class="chuda_co" id="container">
    <div class="co-box">
        <div class="fill-info">
            <div class="right">
                <div class="info-box">
                    <ul>
                        <li>
                            <label>权限类型：</label>
                            <input type="radio" name="name" checked  value="1" onclick="dis_parent()">&nbsp;&nbsp;顶级权限
                        </li>
                        <!--  父类的权限填写表单 -->
                        <form action="power.php?c=power&&a=editFatherPower" method="post" onsubmit="return check_all()">
                            <div id="parent">
                                <li>
                                    <label>权限名称：</label>
									<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['sn'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['sn']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['sn']['name'] = 'sn';
$_smarty_tpl->tpl_vars['smarty']->value['section']['sn']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['arr']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
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
                                    <input type="text" name="power_name" id="power_name" class="w200 name" value="<?php echo $_smarty_tpl->tpl_vars['arr']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sn']['index']]['power_name'];?>
" onblur="check_powername()" >
									<span id="s_powername"></span>
									<input type="hidden" name="power_id" value="<?php echo $_smarty_tpl->tpl_vars['arr']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sn']['index']]['power_id'];?>
"/>
									<?php endfor; endif; ?>
                                </li>
                               <!-- <li>
                                    <label>控制器名称：</label>
                                    <input type="text" name="controller_name" onblur="check_controllername()" id="controller_name" class="w200 name">
									<span id="s_controllername"></span>
                                </li>-->
                                <div class="preview"><input type="submit" value="保存" class="preview-btn btn01"/>
                                    <input type="reset" value="取消" class="cancel-btn btn01"/> </div>
                            </div>
                        </form>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<script type="text/javascript" src="static/h-ui/js/power/edit-father-power.js"></script>
<?php }} ?>
