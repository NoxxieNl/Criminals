<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-01-02 14:54:05
         compiled from "D:\webserver\root\blauw\templates\begangster\ingame\hogerlager.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3185254a6a2fd58ce53-90756850%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b007d7d15632fdc52437febe6542c5c47f68dc03' => 
    array (
      0 => 'D:\\webserver\\root\\blauw\\templates\\begangster\\ingame\\hogerlager.tpl',
      1 => 1420206840,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3185254a6a2fd58ce53-90756850',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'TEMPLATE_URL' => 0,
    'form_error' => 0,
    'success' => 0,
    'costMoney' => 0,
    'hlround' => 0,
    'winMoney' => 0,
    'hlNumber' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54a6a2fd5d7031_55872157',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54a6a2fd5d7031_55872157')) {function content_54a6a2fd5d7031_55872157($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('ingame/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <div id="centercontent" style="margin-top: 7px;">
			
	<div class="titel">
            <div class="titelicoon"> <img src="<?php echo $_smarty_tpl->tpl_vars['TEMPLATE_URL']->value;?>
images/icons/title-icon.png" alt="icoon" title="icoon"/> </div>
            <div class="titeltekst">Hoger & lager</div>
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
           <p>Meedoen aan hoger of lager kost <?php echo $_smarty_tpl->tpl_vars['costMoney']->value;?>
. Er wordt een random getal t/m de 100 aangemaakt. Je kan het spel tussendoor stoppen en later verder gaan.</p>
            <p>Je zit in ronde: <?php echo $_smarty_tpl->tpl_vars['hlround']->value;?>
, met een prijzenpot van <?php echo $_smarty_tpl->tpl_vars['winMoney']->value;?>
!</p>
                 <form method="post" action="hogerlager.php?number=<?php echo $_smarty_tpl->tpl_vars['hlNumber']->value;?>
">
                    <fieldset>
                        <label>Ik gok:</label>
                         <select name="hl" class="normal">
                             <option value="1">Hoger</option>
                             <option value="2">Lager</option>
                         </select>
                   </fieldset>
                    <input class="button small good" name="submit" type="submit" value="Gok">
                 </form> 
        </div>		
        <div class="titelfooter"></div>      
    </div>
<?php echo $_smarty_tpl->getSubTemplate ('ingame/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
