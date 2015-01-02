<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-01-02 13:45:02
         compiled from "D:\webserver\root\blauw\templates\begangster\ingame\kopofmunt.tpl" */ ?>
<?php /*%%SmartyHeaderCode:363154a692ce438382-07475978%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '36db57539d298279540c56bd3906c892e1de6473' => 
    array (
      0 => 'D:\\webserver\\root\\blauw\\templates\\begangster\\ingame\\kopofmunt.tpl',
      1 => 1420202687,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '363154a692ce438382-07475978',
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
  'unifunc' => 'content_54a692ce47a271_04394069',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54a692ce47a271_04394069')) {function content_54a692ce47a271_04394069($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('ingame/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <div id="centercontent" style="margin-top: 7px;">
			
	<div class="titel">
            <div class="titelicoon"> <img src="<?php echo $_smarty_tpl->tpl_vars['TEMPLATE_URL']->value;?>
images/icons/title-icon.png" alt="icoon" title="icoon"/> </div>
            <div class="titeltekst">Kop of munt</div>
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
            <p>Dit is kop of munt een makkelijk spelletje om geld te verdienen het werkt zo: als je wint krijg je 150% van je inzet erbij!</p>
            <form method="post">
                <fieldset>
                    <label>Kop of munt</label>
                    <select class="normal" name="kom" size="1">
                        <option value="0">Kop</option>
                        <option value="1">Munt</option>
                    </select>
                </fieldset>
                
                <fieldset>
                    <label>Inzet</label>
                    <select class="normal" name="gambleMoney" class="normal">
                        <option value="0">Select</option>
                        <option value="250">250,-</option>
                        <option value="500">500,-</option>
                        <option value="1000">1000,-</option>
                    </select>
                </fieldset>
                <input class="button good large" name="submit" type="submit" value="Gok">
            </form>
        </div>		
        <div class="titelfooter"></div>      
    </div>
<?php echo $_smarty_tpl->getSubTemplate ('ingame/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
