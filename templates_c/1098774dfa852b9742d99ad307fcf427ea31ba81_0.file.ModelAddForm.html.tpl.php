<?php
/* Smarty version 3.1.31, created on 2018-04-07 10:02:24
  from "C:\xampp\htdocs\Projekt_Zespolowy\templates\ModelAddForm.html.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5ac87b10eea0c8_77139177',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1098774dfa852b9742d99ad307fcf427ea31ba81' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Projekt_Zespolowy\\templates\\ModelAddForm.html.tpl',
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
function content_5ac87b10eea0c8_77139177 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_html_options')) require_once 'C:\\xampp\\htdocs\\Projekt_Zespolowy\\vendor\\smarty\\smarty\\libs\\plugins\\function.html_options.php';
$_smarty_tpl->_subTemplateRender("file:header.html.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="container">
    <div class="page-header">
        <h1>Dodaj Model</h1>
    </div>
    <form id="addModel"  action="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Samochod/wstaw" method="post" enctype="multipart/form-data">


        <div class="form-group">
            <label for="name">Nazwa modelu:</label> <input type="text" class="form-control" name="nazwaModel" >
        </div>
        <div class="form-group">
            <label for="name">Cena:</label><input type="text" class="form-control" name="cena" >
        </div>
        <div class="form-group">
            <label for="name">Silnik</label>
            <?php echo smarty_function_html_options(array('name'=>'Id_Silnik','options'=>$_smarty_tpl->tpl_vars['Silnik']->value,'class'=>"form-control"),$_smarty_tpl);?>

        </div>
        <div class="form-group">
            <label for="name">Skrzynia</label>
            <?php echo smarty_function_html_options(array('name'=>'Id_Skrzynia','options'=>$_smarty_tpl->tpl_vars['Skrzynia']->value,'class'=>"form-control"),$_smarty_tpl);?>

        </div>
        <div class="form-group">
            <label for="name">Naped</label>
            <?php echo smarty_function_html_options(array('name'=>'Id_Naped','options'=>$_smarty_tpl->tpl_vars['Naped']->value,'class'=>"form-control"),$_smarty_tpl);?>

        </div>
        <div class="form-group">
            <label for="name">Foto:</label><input type="file" class="form-control" name="Foto" >
        </div>
        <div class="form-group">
            <label for="name">Lakier</label>
            <?php echo smarty_function_html_options(array('name'=>'Id_Lakier','options'=>$_smarty_tpl->tpl_vars['Lakier']->value,'class'=>"form-control"),$_smarty_tpl);?>

        </div>
        <button type="submit" name="submit" class="btn btn-default">Dodaj</button>
    </form>







    <?php if (isset($_smarty_tpl->tpl_vars['error']->value)) {?>
        <strong><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</strong>
    <?php }?>

</div>

<?php $_smarty_tpl->_subTemplateRender("file:footer.html.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
