{include 'header.tpl'}
			    
			    <div class="tabs_paginas" data-persist="true">
                                {if isset($REGISTERD)}
                                <div class="melding good small icon">
                                    {$REGISTERD}
                                </div>
                                {else}
                                    {if isset($form_error)}
                                        <div class="melding bad small icon">
                                            {$form_error}
                                        </div>
                                    {/if}
                                {/if}
				<div id="aanmelden">
                                    <form method="post">
                                        <fieldset>
                                            <label>Gebruikersnaam:</label> 
                                            <input class="normal" type="text" name="login" maxlength=16 value="{if isset($login)}{$login}{/if}">
                                        </fieldset>
                                        <fieldset>
                                            <label>Wachtwoord:</label> 
                                            <input class="normal" type="password" name="password" maxlength=16 value="{if isset($password)}{$password}{/if}">
                                        </fieldset>
                                        <fieldset>
                                            <label>Herhaal:</label> 
                                            <input class="normal" type="password" name="passconfirm" maxlength=64 value="{if isset($passconfirm)}{$passconfirm}{/if}">
                                        </fieldset>
                                        <fieldset>
                                            <label>e-Mail:</label> 
                                            <input class="normal" type="text" name="emailCheck" maxlength=64 value="{if isset($emailCheck)}{$emailCheck}{/if}">
                                        </fieldset>
                                        <fieldset>
                                            <label>Type:</label> 
                                            <select class="normal" name="type">
                                                <option value="1" {if isset($type) and $type == 1}selected="true"{/if}>Drugsdealer</option>
                                                <option value="2" {if isset($type) and $type == 2}selected="true"{/if}>Wetenschapper</option>
                                                <option value="3" {if isset($type) and $type == 3}selected="true"{/if}>Politie</option>
                                            </select>
                                        </fieldset>
                                        <input class="button good small" type="submit" name="submit" value="Aanmelden">
                                    </form>
				</div>
			    </div>
{include 'footer.tpl'}