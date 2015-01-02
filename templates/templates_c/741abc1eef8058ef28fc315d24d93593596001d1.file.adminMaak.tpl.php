<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-01-02 14:23:33
         compiled from "D:\webserver\root\blauw\templates\begangster\admin\adminMaak.tpl" */ ?>
<?php /*%%SmartyHeaderCode:291954a69bc8cedcf8-40597110%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '741abc1eef8058ef28fc315d24d93593596001d1' => 
    array (
      0 => 'D:\\webserver\\root\\blauw\\templates\\begangster\\admin\\adminMaak.tpl',
      1 => 1420205013,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '291954a69bc8cedcf8-40597110',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54a69bc8d3f747_12074976',
  'variables' => 
  array (
    'TEMPLATE_URL' => 0,
    'form_error' => 0,
    'success' => 0,
    'info' => 0,
    'i' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54a69bc8d3f747_12074976')) {function content_54a69bc8d3f747_12074976($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../ingame/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <div id="centercontent" style="margin-top: 7px;">
			
	<div class="titel">
            <div class="titelicoon"> <img src="<?php echo $_smarty_tpl->tpl_vars['TEMPLATE_URL']->value;?>
images/icons/title-icon.png" alt="icoon" title="icoon"/> </div>
            <div class="titeltekst">Admin maken</div>
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
            <p>Als hoofd admin zijnde kan je hier nieuwe admins aanwijzen</p>
            <form method="post">
                <fieldset>
                    <label>Speler</label>
                    <input class="normal" name="user" type="text">
                </fieldset>
                    
                <fieldset>
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
                </fieldset>
                <input class="button small good" name="submit" type="submit" value="Verander toegang">
            </form>
        </div>		
        <div class="titelfooter"></div>      
    </div>
<?php echo $_smarty_tpl->getSubTemplate ('../ingame/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
