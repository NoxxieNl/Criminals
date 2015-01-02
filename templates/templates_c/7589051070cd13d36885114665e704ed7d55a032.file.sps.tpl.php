<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-01-02 13:50:57
         compiled from "D:\webserver\root\blauw\templates\begangster\ingame\sps.tpl" */ ?>
<?php /*%%SmartyHeaderCode:313254a69431963ed5-55991274%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7589051070cd13d36885114665e704ed7d55a032' => 
    array (
      0 => 'D:\\webserver\\root\\blauw\\templates\\begangster\\ingame\\sps.tpl',
      1 => 1420203054,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '313254a69431963ed5-55991274',
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
  'unifunc' => 'content_54a694319a3267_11716855',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54a694319a3267_11716855')) {function content_54a694319a3267_11716855($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('ingame/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <div id="centercontent" style="margin-top: 7px;">
			
	<div class="titel">
            <div class="titelicoon"> <img src="<?php echo $_smarty_tpl->tpl_vars['TEMPLATE_URL']->value;?>
images/icons/title-icon.png" alt="icoon" title="icoon"/> </div>
            <div class="titeltekst">Steen, papier & schaar</div>
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
             <p>Het allom bekende steen, papier & schaar! Gok jij goed? Als je wint win je 500 verlies je, verlies je 500!</p>
            <form method="post">
                <fieldset>
                    <label>Type</label>
                    <select name="choice" class="normal">

                        <option value="0"></option>
                        <option value="1">Steen</option>
                        <option value="2">Papier</option>
                        <option value="3">Schaar</option>
                    </select>
                </fieldset>
                <fieldset>
                    <input class="button good large" name="submit" type="submit" value="Speel">
                </fieldset>
            </form>
        </div>		
        <div class="titelfooter"></div>      
    </div>
<?php echo $_smarty_tpl->getSubTemplate ('ingame/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
