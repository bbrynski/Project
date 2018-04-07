<?php
/* Smarty version 3.1.31, created on 2018-04-07 10:01:02
  from "C:\xampp\htdocs\Projekt_Zespolowy\templates\ZamowienieGetAll.html.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5ac87abed1e4b2_59285633',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5e6d943edba535942dcc0ef0072ed89694a2d8de' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Projekt_Zespolowy\\templates\\ZamowienieGetAll.html.tpl',
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
function content_5ac87abed1e4b2_59285633 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.html.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<div class="container-fluid mt-5">
    <!-- Zawartość kontenera -->
    <h2 class="text-center">Zamówienia</h2>
    <?php if (isset($_smarty_tpl->tpl_vars['message']->value)) {?>
        <div class="alert alert-success" role="alert"><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</div>
    <?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['error']->value)) {?>
        <div class="alert alert-danger" role="alert"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</div>
    <?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['zamowienia']->value)) {?>
        <?php if (count($_smarty_tpl->tpl_vars['zamowienia']->value) === 0) {?>
            <div class="alert alert-primary" role="alert">
                Brak zamowień
            </div>
        <?php } else { ?>
                    
                    <table id="data" class=" table table-hover">
                        <thead>
                        <tr>
                            <th>IdZamowienia</th>
                            <th>Id_Klient</th>
                            <th>Id_Pracownik</th>
                            <th>Id_Model</th>
                            <th>DataZamow</th>
                            <th>NumerZamowienia</th>
                            <th>Status</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['zamowienia']->value, 'zamowienie', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['zamowienie']->value) {
?>
                            <tr>
                                <td><?php echo $_smarty_tpl->tpl_vars['zamowienie']->value['IdZamowienie'];?>
 </td>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['klienci']->value, 'klient', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['klient']->value) {
?>
                                <?php ob_start();
echo $_smarty_tpl->tpl_vars['zamowienie']->value['Id_Klient'];
$_prefixVariable1=ob_get_clean();
ob_start();
echo $_smarty_tpl->tpl_vars['klient']->value['Id_Klient'];
$_prefixVariable2=ob_get_clean();
if ($_prefixVariable1 == $_prefixVariable2) {?>
                                <td><?php echo $_smarty_tpl->tpl_vars['klient']->value['Imie'];?>
 <?php echo $_smarty_tpl->tpl_vars['klient']->value['Nazwisko'];?>
 </td>
                                <?php }?>
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

                                 <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pracownicy']->value, 'pracownik', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['pracownik']->value) {
?>
                                <?php ob_start();
echo $_smarty_tpl->tpl_vars['zamowienie']->value['Id_Pracownik'];
$_prefixVariable3=ob_get_clean();
ob_start();
echo $_smarty_tpl->tpl_vars['pracownik']->value['Id_Pracownik'];
$_prefixVariable4=ob_get_clean();
if ($_prefixVariable3 == $_prefixVariable4) {?>
                                <td><?php echo $_smarty_tpl->tpl_vars['pracownik']->value['Imie'];?>
 <?php echo $_smarty_tpl->tpl_vars['pracownik']->value['Nazwisko'];?>
 </td>
                                <?php }?>
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

                                 <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['samochody']->value, 'samochod', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['samochod']->value) {
?>
                                <?php ob_start();
echo $_smarty_tpl->tpl_vars['zamowienie']->value['IdModel'];
$_prefixVariable5=ob_get_clean();
ob_start();
echo $_smarty_tpl->tpl_vars['samochod']->value['IdModel'];
$_prefixVariable6=ob_get_clean();
if ($_prefixVariable5 == $_prefixVariable6) {?>
                                <td><?php echo $_smarty_tpl->tpl_vars['samochod']->value['nazwaModel'];?>
  </td>
                                <?php }?>
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

                                
                               
                                <td><?php echo $_smarty_tpl->tpl_vars['zamowienie']->value['Data_Zamowienia'];?>
 </td>
                                <td><?php echo $_smarty_tpl->tpl_vars['zamowienie']->value['NumerZamowienia'];?>
 </td>
                                <td><?php echo $_smarty_tpl->tpl_vars['zamowienie']->value['Statuszamowienia'];?>
 </td>

                                <td><a class="btn btn-primary" href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Zamowienie/edit-form/<?php echo $_smarty_tpl->tpl_vars['zamowienie']->value['IdZamowienie'];?>
">Edytuj</a></td>
                                <td><a class="btn btn-danger" href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Zamowienie/delete/<?php echo $_smarty_tpl->tpl_vars['zamowienie']->value['IdZamowienie'];?>
">Usuń</a></td> </tr>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

                        </tbody>
                    </table>


                    <div id="myModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <div class="col-md-6">
                                        <h4 id="szczegoly"></h4>
                                        <ul class="list-group"></ul>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>

                        </div>
                    </div>
                <?php }?>
            <?php }?>

    <!-- Wyśrodkowanie -->
    <div class="d-flex justify-content-center">
        <a class="btn btn-success mb-3" href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Zamowienie/add-form/">Dodaj Zamowienie</a>
    </div>


        </div>
    </div>
</div>



<?php $_smarty_tpl->_subTemplateRender("file:footer.html.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
