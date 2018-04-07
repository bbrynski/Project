<?php
/* Smarty version 3.1.31, created on 2018-04-07 10:01:05
  from "C:\xampp\htdocs\Projekt_Zespolowy\templates\ZamowienieStatus.html.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5ac87ac14879f3_18750498',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9e87c73107399a8b1e0ffe08e96a479851c2493f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Projekt_Zespolowy\\templates\\ZamowienieStatus.html.tpl',
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
function content_5ac87ac14879f3_18750498 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.html.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="container">
    <div class="page-header m-5">
        <h1>Sprawdź Zamówienie</h1>
    </div>
    <form id="myform" action="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Zamowienie/sprawdz" method="post" enctype="multipart/form-data">


        <div class="form-group">
            <label for="name">Numer zamówienia:</label>
            <input type="text" class="form-control" id="NumerZamowienia" name="NumerZamowienia" >
        </div>

        <button type="submit" name="submit" class="btn btn-default">Sprawdź</button>
    </form>

    <div class="col-md-3" id="szczegoly">

    </div>





    <?php if (isset($_smarty_tpl->tpl_vars['error']->value)) {?>
        <strong><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</strong>
    <?php }?>

</div>

<?php $_smarty_tpl->_subTemplateRender("file:footer.html.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
