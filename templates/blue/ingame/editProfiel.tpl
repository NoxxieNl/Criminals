{include '../header.tpl'}
<div class="content">
    <p><h1>Profiel wijzigen</h1></p>
    {if isset($form_error)}
    <div class="error">
        {$form_error}
    </div>
    {elseif isset($success)}
    <div class="success">
        {$success}
    </div>
    {/if}
    <form method="post">
        <label>E-Mail:</label>{$email}
        <label>Website:</label><input type="text" class="normal" name="website" value="{$website}"></td></tr>
	<label>Info:</label>
	<textarea name="info" cols=60 rows=10 class="large">{$info}</textarea>
    
	  <label>Wachtwoord nieuw:</label> <input type="password" name="pass" class="normal">
          <label>Wachtwoord Herhaal:</label> <input type="password" name="passVerify" class="normal">
          
          <input type="submit" name="submit" value="Verander gegevens" class="button">
    </form>
</div>
{include '../footer.tpl'}