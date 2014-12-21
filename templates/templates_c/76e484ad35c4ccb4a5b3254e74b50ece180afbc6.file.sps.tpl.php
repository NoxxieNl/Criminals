<?php /* Smarty version Smarty-3.1.21-dev, created on 2014-12-20 10:37:46
         compiled from "D:\webserver\root\blauw\templates\ingame\sps.tpl" */ ?>
<?php /*%%SmartyHeaderCode:285925495436ad3d867-76933252%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '76e484ad35c4ccb4a5b3254e74b50ece180afbc6' => 
    array (
      0 => 'D:\\webserver\\root\\blauw\\templates\\ingame\\sps.tpl',
      1 => 1418673034,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '285925495436ad3d867-76933252',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'form_error' => 0,
    'success' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5495436ad7db58_93717107',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5495436ad7db58_93717107')) {function content_5495436ad7db58_93717107($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="content">
    <p><h1>Steen, papier & schaar</h1></p>
    <?php if (isset($_smarty_tpl->tpl_vars['form_error']->value)) {?>
    <div class="error">
        <?php echo $_smarty_tpl->tpl_vars['form_error']->value;?>

    </div>
    <?php } elseif (isset($_smarty_tpl->tpl_vars['success']->value)) {?>
    <div class="success">
        <?php echo $_smarty_tpl->tpl_vars['success']->value;?>

    </div>
    <?php }?>

    <p>Het allom bekende steen, papier & schaar! Gok jij goed? Als je wint win je 500 verlies je, verlies je 500!</p>
    <form method="post">
        <label>Type</label>
        <select name="choice" class="normal">
            
            <option value="0"></option>
            <option value="1">Steen</option>
            <option value="2">Papier</option>
            <option value="3">Schaar</option>
            
            <input class="button" name="submit" type="submit" value="Speel">
        </select>
    </form>
</div>
<?php echo $_smarty_tpl->getSubTemplate ('../footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
