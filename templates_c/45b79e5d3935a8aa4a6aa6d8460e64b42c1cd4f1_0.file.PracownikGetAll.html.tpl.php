<?php
/* Smarty version 3.1.31, created on 2018-04-07 10:01:00
  from "C:\xampp\htdocs\Projekt_Zespolowy\templates\PracownikGetAll.html.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5ac87abc91e5a1_66430997',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '45b79e5d3935a8aa4a6aa6d8460e64b42c1cd4f1' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Projekt_Zespolowy\\templates\\PracownikGetAll.html.tpl',
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
function content_5ac87abc91e5a1_66430997 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.html.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<div class="container-fluid mt-5">
<!-- Zawartość kontenera -->
<h2 class="text-center">Lista Pracowników</h2>
<?php if (isset($_smarty_tpl->tpl_vars['message']->value)) {?>
    <div class="alert alert-success" role="alert"><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</div>
<?php }
if (isset($_smarty_tpl->tpl_vars['error']->value)) {?>
    <div class="alert alert-danger" role="alert"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</div>
<?php }
if (isset($_smarty_tpl->tpl_vars['pracownicy']->value)) {?>
    <?php if (count($_smarty_tpl->tpl_vars['pracownicy']->value) === 0) {?>
        <div class="alert alert-primary" role="alert">
            Brak Pracowników w Bazie
        </div>
    <?php } else { ?>

        <table id="data" class="display table table-hover">
            <thead>
            <tr>
                <th>Imie</th>
                <th>Nazwisko</th>
                <th>Numer</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pracownicy']->value, 'pracownik', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['pracownik']->value) {
?>
                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['pracownik']->value['Imie'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['pracownik']->value['Nazwisko'];?>
 </td>
                    <td><?php echo $_smarty_tpl->tpl_vars['pracownik']->value['numer'];?>
 </td>
                    <td><a class="btn btn-primary" href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Pracownik/edit/<?php echo $_smarty_tpl->tpl_vars['pracownik']->value['Id_Pracownik'];?>
">Edytuj</a></td>
                    <td><a class="btn btn-danger" href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Pracownik/delete/<?php echo $_smarty_tpl->tpl_vars['pracownik']->value['Id_Pracownik'];?>
">Usuń</a></td>
                </tr>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

            </tbody>
        </table>


    <?php }
}?>


<!-- Wyśrodkowanie -->
<div class="d-flex justify-content-center">
    <a class="btn btn-success mb-3 text-center" href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Pracownik/add-form">+</a>
</div>

</div>
</div>


<?php $_smarty_tpl->_subTemplateRender("file:footer.html.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
