<?php /* Smarty version Smarty-3.1.21-dev, created on 2014-12-21 16:15:10
         compiled from "D:\webserver\root\blauw\templates\admin\adminMaak.tpl" */ ?>
<?php /*%%SmartyHeaderCode:226775496e3d10def34-22767422%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c338cd6da24ad0961e5f42f040812afbba7f4509' => 
    array (
      0 => 'D:\\webserver\\root\\blauw\\templates\\admin\\adminMaak.tpl',
      1 => 1419174907,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '226775496e3d10def34-22767422',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5496e3d1186869_95696825',
  'variables' => 
  array (
    'form_error' => 0,
    'success' => 0,
    'i' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5496e3d1186869_95696825')) {function content_5496e3d1186869_95696825($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="content">
    <p><h1>Admin - maak</h1></p>
    <?php if (isset($_smarty_tpl->tpl_vars['form_error']->value)) {?>
    <div class="error">
        <?php echo $_smarty_tpl->tpl_vars['form_error']->value;?>

    </div>
    <?php } elseif (isset($_smarty_tpl->tpl_vars['success']->value)) {?>
    <div class="success">
        <?php echo $_smarty_tpl->tpl_vars['success']->value;?>

    </div>
    <?php }?>

    <p>Als hoofd admin zijnde kan je hier nieuwe admins aanwijzen</p>
    <form method="post">
        <label>Speler</label><input class="normal" name="user" type="text">
        <label>Toegangs niveau</label>
        <select name="level" class="normal">
            <option value="-1">Geen niveau gekozen</option>
            <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(0, null, 0);?>
            <?php while ($_smarty_tpl->tpl_vars['i']->value<11) {?>
                <option value="<?php if (($_smarty_tpl->tpl_vars['i']->value==0)) {?>cnul<?php } else {
echo $_smarty_tpl->tpl_vars['i']->value;
}?>"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</option>
                <?php echo $_smarty_tpl->tpl_vars['i']->value++;?>

            <?php }?>
        </select>
        <input class="button" name="submit" type="submit" value="Verander toegang">
    </form>
</div>
<?php echo $_smarty_tpl->getSubTemplate ('../footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
