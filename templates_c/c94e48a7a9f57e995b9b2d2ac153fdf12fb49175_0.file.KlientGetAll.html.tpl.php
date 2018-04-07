<?php
/* Smarty version 3.1.31, created on 2018-04-07 10:00:56
  from "C:\xampp\htdocs\Projekt_Zespolowy\templates\KlientGetAll.html.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5ac87ab8116a72_67499246',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c94e48a7a9f57e995b9b2d2ac153fdf12fb49175' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Projekt_Zespolowy\\templates\\KlientGetAll.html.tpl',
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
function content_5ac87ab8116a72_67499246 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.html.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<div class="container mt-4 mb-4">
    <div class="row justify-content-around">
        <div class="col-10 align-self-center">
            <div class="d-flex justify-content-center">
                <h2>Lista Klientów</h2>
            </div>

            <?php if ($_SESSION['prawo'] == 'admin') {?>

            <a class="btn btn-success mb-3" href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Klient/add-form">Dodaj Klienta</a>

            <?php }?>

            <?php if (isset($_smarty_tpl->tpl_vars['message']->value)) {?>
                <div class="alert alert-success" role="alert"><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</div>
            <?php }?>
            <?php if (isset($_smarty_tpl->tpl_vars['error']->value)) {?>
                <div class="alert alert-danger" role="alert"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</div>
            <?php }?>
            <?php if (isset($_smarty_tpl->tpl_vars['klienci']->value)) {?>
                <?php if (count($_smarty_tpl->tpl_vars['klienci']->value) === 0) {?>
                    <b>Brak klientów w bazie!</b><br/><br/>
                <?php } else { ?>
                    
                    <table id="data" class="display table table-hover">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Imie</th>
                            <th>Nazwisko</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['klienci']->value, 'klient', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['klient']->value) {
?>
                            <tr>
                                <td><?php echo $_smarty_tpl->tpl_vars['klient']->value['Id_Klient'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['klient']->value['Imie'];?>
 </td>
                                <td><?php echo $_smarty_tpl->tpl_vars['klient']->value['Nazwisko'];?>
</td>


                                <td><a class="btn btn-primary" href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Klient/edit/<?php echo $_smarty_tpl->tpl_vars['klient']->value['Id_Klient'];?>
">Edytuj</a></td>
                                <td><a class="btn btn-danger" href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Klient/delete/<?php echo $_smarty_tpl->tpl_vars['klient']->value['Id_Klient'];?>
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
            <?php if (isset($_smarty_tpl->tpl_vars['error']->value)) {?>
                <strong><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</strong>
            <?php }?>

        </div>
    </div>
</div>



<?php $_smarty_tpl->_subTemplateRender("file:footer.html.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
