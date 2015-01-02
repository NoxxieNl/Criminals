<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-01-02 15:21:43
         compiled from "D:\webserver\root\blauw\templates\begangster\admin\adminTheme.tpl" */ ?>
<?php /*%%SmartyHeaderCode:166954a6a977f06c26-81314988%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '47d65287178942a49982e0803cbd8d6beaa5912c' => 
    array (
      0 => 'D:\\webserver\\root\\blauw\\templates\\begangster\\admin\\adminTheme.tpl',
      1 => 1420208372,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '166954a6a977f06c26-81314988',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'TEMPLATE_URL' => 0,
    'form_error' => 0,
    'success' => 0,
    'info' => 0,
    'themes' => 0,
    'theme' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54a6a9780161f4_15111171',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54a6a9780161f4_15111171')) {function content_54a6a9780161f4_15111171($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../ingame/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <div id="centercontent" style="margin-top: 7px;">
			
	<div class="titel">
            <div class="titelicoon"> <img src="<?php echo $_smarty_tpl->tpl_vars['TEMPLATE_URL']->value;?>
images/icons/title-icon.png" alt="icoon" title="icoon"/> </div>
            <div class="titeltekst">Admin basis</div>
        </div>
        
        <?php if (isset($_smarty_tpl->tpl_vars['form_error']->value)) {?>
        <div class="melding bad small icon">
            <?php echo $_smarty_tpl->tpl_vars['form_error']->value;?>

        </div>
        <?php } elseif (isset($_smarty_tpl->tpl_vars['success']->value)) {?>
        <div class="melding good small icon">
            <?php echo $_smarty_tpl->tpl_vars['success']->value;?>

        </div>
        <?php } elseif (isset($_smarty_tpl->tpl_vars['info']->value)&&preg_match_all('/[^\s]/u',$_smarty_tpl->tpl_vars['info']->value, $tmp)>0) {?>
        <div class="melding info small icon">
            <?php echo $_smarty_tpl->tpl_vars['info']->value;?>

        </div>
        <?php }?>
        
        <div class="tekstvak">
            <p>Hier kan je het thema van de website wijzigen!</p>
            <form method="post" action="">
                <fieldset>
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
                </fieldset>
                <input class="button small good" name="submit" type="submit" value="Verander thema!">
            </form>
        </div>		
        <div class="titelfooter"></div>      
    </div>
<?php echo $_smarty_tpl->getSubTemplate ('../ingame/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
