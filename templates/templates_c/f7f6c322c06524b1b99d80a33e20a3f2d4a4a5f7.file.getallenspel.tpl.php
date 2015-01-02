<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-01-02 15:10:48
         compiled from "D:\webserver\root\blauw\templates\blue\ingame\getallenspel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:293654a6a6e88015b4-93185056%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f7f6c322c06524b1b99d80a33e20a3f2d4a4a5f7' => 
    array (
      0 => 'D:\\webserver\\root\\blauw\\templates\\blue\\ingame\\getallenspel.tpl',
      1 => 1418560888,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '293654a6a6e88015b4-93185056',
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
  'unifunc' => 'content_54a6a6e883f8a6_16700219',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54a6a6e883f8a6_16700219')) {function content_54a6a6e883f8a6_16700219($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="content">
    <p><h1>Getallenspel</h1></p>
    <?php if (isset($_smarty_tpl->tpl_vars['form_error']->value)) {?>
    <div class="error">
        <?php echo $_smarty_tpl->tpl_vars['form_error']->value;?>

    </div>
    <?php } elseif (isset($_smarty_tpl->tpl_vars['success']->value)) {?>
    <div class="success">
        <?php echo $_smarty_tpl->tpl_vars['success']->value;?>

    </div>
    <?php }?>

    <p>Bij dit getallenspel, word er een getal van tussen 1 en 10 gemaakt, en als jij het getal goed raad, win je 8x je inzet!</p>
    <form method="post">
        <label>Getal</label>
        <select name="number" class="normal">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
        </select>
        <label>Inzet</label><input class="normal" name="gambleMoney" type="text" maxlength="10" value="100">
        <input class="button" name="submit" type="submit" value="Gok">
    </form>
</div>
<?php echo $_smarty_tpl->getSubTemplate ('../footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
