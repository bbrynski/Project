<?php
/* Smarty version 3.1.31, created on 2018-04-07 10:02:32
  from "C:\xampp\htdocs\Projekt_Zespolowy\templates\ZamowienieAddForm.html.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5ac87b180f5694_12478575',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5bf5dc622f72c2f3e23530396e05961a1bdddbaf' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Projekt_Zespolowy\\templates\\ZamowienieAddForm.html.tpl',
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
function content_5ac87b180f5694_12478575 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.html.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="container mb-5">
    <div class="page-header m-4">
        <h1>Dodaj Zamówienie</h1>
    </div>
    <form id="addModel"  action="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Zamowienie/wstaw" method="post" enctype="multipart/form-data">


        <div class="form-group">
            <label for="name">Klient</label>
            <select class="form-control" id="Id_Klient" name="Id_Klient">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['klienci']->value, 'klient', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['klient']->value) {
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['klient']->value['Id_Klient'];?>
"><?php echo $_smarty_tpl->tpl_vars['klient']->value['Imie'];?>
 <?php echo $_smarty_tpl->tpl_vars['klient']->value['Nazwisko'];?>
</option>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

            </select>
        </div>

        <div class="form-group">
            <label for="name">Pracownik</label>
            <select class="form-control" id="Id_Pracownik" name="Id_Pracownik">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pracownicy']->value, 'praconik', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['praconik']->value) {
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['praconik']->value['Id_Pracownik'];?>
"><?php echo $_smarty_tpl->tpl_vars['praconik']->value['Imie'];?>
 <?php echo $_smarty_tpl->tpl_vars['praconik']->value['Nazwisko'];?>
</option>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

            </select>
        </div>

        <div class="form-group">
            <label for="name">Model</label>
            <select class="form-control" id="IdModel" name="IdModel">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['samochody']->value, 'samochod', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['samochod']->value) {
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['samochod']->value['IdModel'];?>
"><?php echo $_smarty_tpl->tpl_vars['samochod']->value['nazwaModel'];?>
 <?php echo $_smarty_tpl->tpl_vars['samochod']->value['Cena'];?>
</option>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

            </select>
        </div>

        <div class="form-group">
            <label for="name">Data:</label> <input type="text" class="form-control" name="Data_Zamowienia" >
        </div>
        <div class="form-group">
            <label for="name">Status zamowienia:</label><input type="text" class="form-control" name="Statuszamowienia" >
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
