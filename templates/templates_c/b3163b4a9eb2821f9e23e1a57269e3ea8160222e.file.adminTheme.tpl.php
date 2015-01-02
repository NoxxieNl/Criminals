<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-01-02 15:21:51
         compiled from "D:\webserver\root\blauw\templates\blue\admin\adminTheme.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1767554a6a97fd10f65-51919874%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b3163b4a9eb2821f9e23e1a57269e3ea8160222e' => 
    array (
      0 => 'D:\\webserver\\root\\blauw\\templates\\blue\\admin\\adminTheme.tpl',
      1 => 1420208426,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1767554a6a97fd10f65-51919874',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'error' => 0,
    'success' => 0,
    'info' => 0,
    'themes' => 0,
    'theme' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54a6a97fd5da94_62983535',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54a6a97fd5da94_62983535')) {function content_54a6a97fd5da94_62983535($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="content">
    <p><h1>Admin - basis</h1></p>
    <?php if (isset($_smarty_tpl->tpl_vars['error']->value)) {?>
    <div class="error">
        <?php echo $_smarty_tpl->tpl_vars['error']->value;?>

    </div>
    <?php } elseif (isset($_smarty_tpl->tpl_vars['success']->value)) {?>
    <div class="success">
        <?php echo $_smarty_tpl->tpl_vars['success']->value;?>

    </div>
    <?php } elseif (isset($_smarty_tpl->tpl_vars['info']->value)) {?>
    <div class="info">
        <?php echo $_smarty_tpl->tpl_vars['info']->value;?>

    </div>
    <?php }?>

     <p>Hier kan je het thema van de website wijzigen!</p>
     <form method="post" action="">
        <label>Thema:</label>
            <select name="theme" class="normal">
                <?php  $_smarty_tpl->tpl_vars['theme'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['theme']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['themes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['theme']->key => $_smarty_tpl->tpl_vars['theme']->value) {
$_smarty_tpl->tpl_vars['theme']->_loop = true;
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
</option>
                <?php } ?>
            </select>
            <input class="button small good" name="submit" type="submit" value="Verander thema!">
        </form>
</div>
<?php echo $_smarty_tpl->getSubTemplate ('../footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
