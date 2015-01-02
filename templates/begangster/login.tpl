{include 'header.tpl'}
			    <div class="tabs_paginas" data-persist="true">
				{if isset($LOGIN)}
                                <div class="melding good small icon">
                                    {$LOGIN}
                                    <script language="javascript">
                                        setTimeout("location.href = 'ingame/index.php';",1500);
                                    </script>
                                </div>
                                {else}
                                    {if isset($form_error)}
                                        <div class="melding bad small icon"><i class="seperator"></i>
                                            {$form_error}
                                        </div>
                                    {/if}
                                {/if}
				<div id="inloggen">
				    <form method="POST">
				       <fieldset>
					<label>Gebruikersnaam</label>
					<input type="text" placeholder="Gebruikersnaam" name="login" value="{if isset($login)}{$login}{/if}" /> 
				       </fieldset>
				       
				       <fieldset>
					<label>Wachtwoord</label>
					<input type="password" placeholder="Wachtwoord" name="password" value="{if isset($password)}{$password}{/if}"/> 
				       </fieldset>
					<input type="submit" value="Login" name="submit" class="button good small" />
				    </form>

				</div>
			    </div>
{include 'footer.tpl'}