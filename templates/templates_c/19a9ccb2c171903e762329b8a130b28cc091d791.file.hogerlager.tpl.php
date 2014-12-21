<?php /* Smarty version Smarty-3.1.21-dev, created on 2014-12-20 10:37:47
         compiled from "D:\webserver\root\blauw\templates\ingame\hogerlager.tpl" */ ?>
<?php /*%%SmartyHeaderCode:243995495436bb12508-14553597%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '19a9ccb2c171903e762329b8a130b28cc091d791' => 
    array (
      0 => 'D:\\webserver\\root\\blauw\\templates\\ingame\\hogerlager.tpl',
      1 => 1418819835,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '243995495436bb12508-14553597',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'form_error' => 0,
    'success' => 0,
    'costMoney' => 0,
    'hlround' => 0,
    'winMoney' => 0,
    'hlNumber' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5495436bbf44f3_28560265',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5495436bbf44f3_28560265')) {function content_5495436bbf44f3_28560265($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="content">
    <p><h1>Hoger of lager</h1></p>
    <?php if (isset($_smarty_tpl->tpl_vars['form_error']->value)) {?>
    <div class="error">
        <?php echo $_smarty_tpl->tpl_vars['form_error']->value;?>

    </div>
    <?php } elseif (isset($_smarty_tpl->tpl_vars['success']->value)) {?>
    <div class="success">
        <?php echo $_smarty_tpl->tpl_vars['success']->value;?>

    </div>
    <?php }?>

<p>Meedoen aan hoger of lager kost <?php echo $_smarty_tpl->tpl_vars['costMoney']->value;?>
. Er wordt een random getal t/m de 100 aangemaakt. Je kan het spel tussendoor stoppen en later verder gaan.</p>
<p>Je zit in ronde: <?php echo $_smarty_tpl->tpl_vars['hlround']->value;?>
, met een prijzenpot van <?php echo $_smarty_tpl->tpl_vars['winMoney']->value;?>
!</p>
     <form method="post" action="hogerlager.php?number=<?php echo $_smarty_tpl->tpl_vars['hlNumber']->value;?>
"> 
       <label>Ik gok:</label>
        <select name="hl" class="normal">
            <option value="1">Hoger</option>
            <option value="2">Lager</option>
        </select>
        <input class="button" name="submit" type="submit" value="Gok">
     </form> 
</div>
<?php echo $_smarty_tpl->getSubTemplate ('../footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
