<?php
/* Smarty version 3.1.32, created on 2018-04-25 09:28:52
  from 'C:\wamp\www\Projet_TLI\src\view\bloc_identification_logedout.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5ae04a541231e9_31192418',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5b3adf5b24d3e862bf7b6f9850a78685eb89a5d7' => 
    array (
      0 => 'C:\\wamp\\www\\Projet_TLI\\src\\view\\bloc_identification_logedout.html',
      1 => 1524648440,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ae04a541231e9_31192418 (Smarty_Internal_Template $_smarty_tpl) {
?><form action="#" method="post">
    <div class="login">
        <label for="login">
								Identifiant
								<input type="text" id="login" name="login">
							</label>
    </div>
    <div class="password">
        <label for="password">
								Mot de passe
								<input type="password" id="password" name="password">
							</label>
    </div>
    <div class="submit">
        <input type="submit" value="Se connecter">
    </div>
</form>
<?php }
}
