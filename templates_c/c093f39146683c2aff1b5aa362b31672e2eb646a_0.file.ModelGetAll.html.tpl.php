<?php
/* Smarty version 3.1.31, created on 2018-04-07 10:01:02
  from "C:\xampp\htdocs\Projekt_Zespolowy\templates\ModelGetAll.html.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5ac87abe2a28c2_79477936',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c093f39146683c2aff1b5aa362b31672e2eb646a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Projekt_Zespolowy\\templates\\ModelGetAll.html.tpl',
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
function content_5ac87abe2a28c2_79477936 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.html.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<div class="container-fluid mt-5">
    <!-- Zawartość kontenera -->
    <h2 class="text-center mb-5">Dostępne Modele Samochodów</h2>
    <?php if (isset($_smarty_tpl->tpl_vars['message']->value)) {?>
        <div class="alert alert-success" role="alert"><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</div>
    <?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['error']->value)) {?>
        <div class="alert alert-danger" role="alert"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</div>
    <?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['samochody']->value)) {?>
        <?php if (count($_smarty_tpl->tpl_vars['samochody']->value) === 0) {?>
            <div class="alert alert-primary" role="alert">
                Brak Modeli Samochodów w Bazie
            </div>
        <?php } else { ?>

    <div class="container">
        <div id="szczegoly">

        </div>

            <div class="row">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['samochody']->value, 'samochod', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['samochod']->value) {
?>
                    <div class="col-sm-6">
                        <a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Silnik/<?php echo $_smarty_tpl->tpl_vars['samochod']->value['IdModel'];?>
">
                        <img src="http://<?php echo $_SERVER['HTTP_HOST'];?>
/<?php echo $_smarty_tpl->tpl_vars['sciezka']->value;
echo $_smarty_tpl->tpl_vars['samochod']->value['Foto'];?>
" class="img-fluid" alt="Responsive image">
                        <h1 class="text-center"><?php echo $_smarty_tpl->tpl_vars['samochod']->value['nazwaModel'];?>
</h1>
                        </a>
                        <center><a type="button" class="btn btn-info DostepnoscModelu" href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Samochod/Dostepnosc/<?php echo $_smarty_tpl->tpl_vars['samochod']->value['IdModel'];?>
">Dostępność</a></center>


                    </div>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

            </div>


        <?php }?>
    <?php }?>

    <!-- Wyśrodkowanie -->
    <div class="d-flex justify-content-center">
        <a class="btn btn-success mb-3 text-center" href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Samochod/add-form">+</a>
    </div>

</div>
</div>


<?php $_smarty_tpl->_subTemplateRender("file:footer.html.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
