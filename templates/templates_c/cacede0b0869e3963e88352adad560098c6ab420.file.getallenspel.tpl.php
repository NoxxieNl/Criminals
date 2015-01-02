<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-01-02 13:43:08
         compiled from "D:\webserver\root\blauw\templates\begangster\ingame\getallenspel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1187954a6925c6ff5f3-14438496%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cacede0b0869e3963e88352adad560098c6ab420' => 
    array (
      0 => 'D:\\webserver\\root\\blauw\\templates\\begangster\\ingame\\getallenspel.tpl',
      1 => 1420202585,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1187954a6925c6ff5f3-14438496',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'TEMPLATE_URL' => 0,
    'form_error' => 0,
    'success' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54a6925c73bcb8_44432907',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54a6925c73bcb8_44432907')) {function content_54a6925c73bcb8_44432907($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('ingame/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <div id="centercontent" style="margin-top: 7px;">
			
	<div class="titel">
            <div class="titelicoon"> <img src="<?php echo $_smarty_tpl->tpl_vars['TEMPLATE_URL']->value;?>
images/icons/title-icon.png" alt="icoon" title="icoon"/> </div>
            <div class="titeltekst">Getallenspel</div>
        </div>
        
        <?php if (isset($_smarty_tpl->tpl_vars['form_error']->value)) {?>
        <div class="melding bad small icon">
            <?php echo $_smarty_tpl->tpl_vars['form_error']->value;?>

        </div>
        <?php } elseif (isset($_smarty_tpl->tpl_vars['success']->value)) {?>
        <div class="melding good small icon">
            <?php echo $_smarty_tpl->tpl_vars['success']->value;?>

        </div>
        <?php }?>
        
        <div class="tekstvak">
            <p>Bij dit getallenspel, word er een getal van tussen 1 en 10 gemaakt, en als jij het getal goed raad, win je 8x je inzet!</p>
            <form method="post">
                <fieldset>
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
                </fieldset>
                
                <fieldset>
                    <label>Inzet</label>
                    <input class="normal" name="gambleMoney" type="text" maxlength="10" value="100">
                </fieldset>
                <input class="button good large" name="submit" type="submit" value="Gok">
            </form>
        </div>		
        <div class="titelfooter"></div>      
    </div>
<?php echo $_smarty_tpl->getSubTemplate ('ingame/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
