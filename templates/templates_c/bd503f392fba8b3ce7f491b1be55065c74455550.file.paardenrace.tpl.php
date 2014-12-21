<?php /* Smarty version Smarty-3.1.21-dev, created on 2014-12-20 10:37:47
         compiled from "D:\webserver\root\blauw\templates\ingame\paardenrace.tpl" */ ?>
<?php /*%%SmartyHeaderCode:241055495436b476c41-93158720%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bd503f392fba8b3ce7f491b1be55065c74455550' => 
    array (
      0 => 'D:\\webserver\\root\\blauw\\templates\\ingame\\paardenrace.tpl',
      1 => 1418815612,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '241055495436b476c41-93158720',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'form_error' => 0,
    'success' => 0,
    'i' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5495436b4c6389_51357986',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5495436b4c6389_51357986')) {function content_5495436b4c6389_51357986($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="content">
    <p><h1>Paardenrace</h1></p>
<a href="paardenrace.tpl"></a>
    <?php if (isset($_smarty_tpl->tpl_vars['form_error']->value)) {?>
    <div class="error">
        <?php echo $_smarty_tpl->tpl_vars['form_error']->value;?>

    </div>
    <?php } elseif (isset($_smarty_tpl->tpl_vars['success']->value)) {?>
    <div class="success">
        <?php echo $_smarty_tpl->tpl_vars['success']->value;?>

    </div>
    <?php }?>

    <p> Uitleg </p>
	<p>Er zijn 50 paarden waar je op kan wedden, en per keer mag je maar op ��n paard wedden.<br>
	Er zijn drie soorten loten:<br><br>
		<table>
		<tr><td width=100>250</td>  <td>25% van het bedrag per winnaar</td></tr>
		<tr><td width=100>500</td>  <td>50% van het bedrag per winnaar</td></tr>
		<tr><td width=100>1,000</td>  <td>100% van het bedrag per winnaar</td></tr>
		</table><br>
	Stel er zit 200,000 in de pot en er zijn 4 winnaars, dus dan is de prijs per winnaar 50,000. Als je nu een lot
	van 250 hebt dan krijg je <i>50000*0.25=12500</i>, met een lot van \$500 krijg je <i>50000*0.5=25000</i> en met
	een lot van 1,000 krijg je gewoon het hele bedrag: 50,000.<br><br>
	Je kan het paard dat je hebt gekozen veranderen of een duurder lot kopen, maar niet je lot verkopen of een goedkoper
        lot kopen.</p>
        <form method="POST">
            <label>Paard (1-50):</label>
            <select name="betHorse" class="normal">
                <option vlaue="">Geen paard gekozen</option>
                <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(1, null, 0);?>
                <?php while ($_smarty_tpl->tpl_vars['i']->value<51) {?>
                    <option vlaue="<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</option>
                    <?php echo $_smarty_tpl->tpl_vars['i']->value++;?>

                <?php }?>
            </select>
            <label>Lot:</label>
                <select name="ticket" class="normal">
                    <option vlaue="0">Geen</option><br>
                    <option value="1"> 25%: 250</option><br>
                    <option value="2"> 50%: 500</option><br>
                    <option value="3">100%: 1,000</option>
		</select>
        <input class="button" name="submit" type="submit" value="Plaats weddenschap">
    </form>
</div>
<?php echo $_smarty_tpl->getSubTemplate ('../footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
