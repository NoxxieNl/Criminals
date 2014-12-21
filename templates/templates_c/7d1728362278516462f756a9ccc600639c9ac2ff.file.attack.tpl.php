<?php /* Smarty version Smarty-3.1.21-dev, created on 2014-12-21 16:01:05
         compiled from "D:\webserver\root\blauw\templates\ingame\attack.tpl" */ ?>
<?php /*%%SmartyHeaderCode:217845496e0b1619573-46842664%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7d1728362278516462f756a9ccc600639c9ac2ff' => 
    array (
      0 => 'D:\\webserver\\root\\blauw\\templates\\ingame\\attack.tpl',
      1 => 1418575632,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '217845496e0b1619573-46842664',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'error' => 0,
    'success' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5496e0b16d5d78_41663903',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5496e0b16d5d78_41663903')) {function content_5496e0b16d5d78_41663903($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="content">
    <p><h1>Aanvallen</h1></p>
    <?php if (isset($_smarty_tpl->tpl_vars['error']->value)) {?>
    <div class="error">
        <?php echo $_smarty_tpl->tpl_vars['error']->value;?>

    </div>
    <?php } elseif (isset($_smarty_tpl->tpl_vars['success']->value)) {?>
    <div class="success">
        <?php echo $_smarty_tpl->tpl_vars['success']->value;?>

    </div>
    <?php }?>
</div>
<?php echo $_smarty_tpl->getSubTemplate ('../footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
