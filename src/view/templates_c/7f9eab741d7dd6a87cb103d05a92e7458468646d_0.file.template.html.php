<?php
/* Smarty version 3.1.32, created on 2018-05-02 13:04:29
  from 'C:\wamp\www\Projet_TLI\src\view\template.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5ae9b75dd3f525_70816530',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7f9eab741d7dd6a87cb103d05a92e7458468646d' => 
    array (
      0 => 'C:\\wamp\\www\\Projet_TLI\\src\\view\\template.html',
      1 => 1525266150,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ae9b75dd3f525_70816530 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Acupuncture - </title>
    <link rel="stylesheet" href="../../public/css/styles.css">
    <!--<?php echo '<script'; ?>
 src="script.js"><?php echo '</script'; ?>
>-->
</head>

<body>
    <header>
        <div id="header_banner">
            879X108
        </div>
    </header>
    <main>
        <div id="left_column">
            <nav id="navigation_menu">
                <ul>
                    <li class="active">
                        <a href="accueil.php">Accueil</a>
                    </li>
                    <li>
                        <a href="criteres.php">Recherche par critère</a>
                    </li>
                    <li>
                        <a href="pathologie.php">Recherche par pathologie</a>
                    </li>
                    <li>
                        <a href="informations.php">Informations</a>
                    </li>
                </ul>
            </nav>
            <div id="login_form">
                <?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['bloc_indentification']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
            </div>
        </div>
        <div id="right_column">
            <div>
                <h1><?php echo $_smarty_tpl->tpl_vars['titre_page']->value;?>
</h1>
                <?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['bloc_central']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
            </div>
        </div>
    </main>
    <footer>
        <nav id="footer_menu">
            <ul>
                <li>
                    <a href="#">Plan du site</a>
                </li>
                <li>
                    <a href="#">Mentions légales</a>
                </li>
                <li>
                    <a href="#">Contacts</a>
                </li>
            </ul>
        </nav>
    </footer>
</body>

</html>
<?php }
}
