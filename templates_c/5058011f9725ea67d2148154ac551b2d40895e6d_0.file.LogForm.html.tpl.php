<?php
/* Smarty version 3.1.31, created on 2018-04-07 10:00:45
  from "C:\xampp\htdocs\Projekt_Zespolowy\templates\LogForm.html.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5ac87aada7e7d8_70964575',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5058011f9725ea67d2148154ac551b2d40895e6d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Projekt_Zespolowy\\templates\\LogForm.html.tpl',
      1 => 1522941291,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html.tpl' => 1,
    'file:footer.html.tpl' => 1,
  ),
),false)) {
function content_5ac87aada7e7d8_70964575 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.html.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<div class="container mt-4 mb-4">
    <div class="row justify-content-around">
        <div class="col-8 align-self-center">
            <div class="page-header">
                <h1>Zaloguj się do systemu</h1>
            </div>

            <?php if (isset($_smarty_tpl->tpl_vars['message']->value)) {?>
                <div class="alert alert-success" role="alert"><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</div>
            <?php }?>
            <?php if (isset($_smarty_tpl->tpl_vars['error']->value)) {?>
                <div class="alert alert-danger" role="alert"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</div>
            <?php }?>

            <form id="logform" action="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
access/login" method="post">
                <div class="form-group">
                    <label for="name">Login</label>
                    <input type="text" class="form-control" id="login" name="login" placeholder="Wprowadź login">
                </div>
                <div class="form-group">
                    <label for="name">Hasło</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Wprowadź hasło">
                </div>
                <div class="alert alert-danger collapse" role="alert"></div>

                <button type="submit" class="btn btn-default">Zaloguj</button>
            </form>
        </div>
    </div>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:footer.html.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
