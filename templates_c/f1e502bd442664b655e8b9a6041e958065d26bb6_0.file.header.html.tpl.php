<?php
/* Smarty version 3.1.31, created on 2018-04-07 10:00:45
  from "C:\xampp\htdocs\Projekt_Zespolowy\templates\header.html.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5ac87aadab52e4_13864208',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f1e502bd442664b655e8b9a6041e958065d26bb6' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Projekt_Zespolowy\\templates\\header.html.tpl',
      1 => 1522941291,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ac87aadab52e4_13864208 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <title>Volkswagen</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <link href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
css/bootstrap.min.css" rel="stylesheet">
    <link href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
css/jquery-ui.min.css" rel="stylesheet">
    <!-- DataTables Table plug-in for jQuery -->
    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <link href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
css/style.css" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="#">
        <img src="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
images/Logo_Volkswagen.png" height="70" alt="">
    </a>


    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto justify-content-center">

            <li class="nav-item">
                <a class="nav-link" href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Klient">Klienci</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Pracownik">Pracownicy</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Samochod">Model</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Zamowienie">Zamowienie</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Zamowienie/status">Sprawdź Zamówienie</a>
            </li>

        </ul>

        <ul class="nav navbar-nav navbar-right">


            <?php if (!isset($_smarty_tpl->tpl_vars['login']->value)) {?>

                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#exampleModal">Logowanie</a>
                </li>
            <?php } else { ?>
                <li class="nav-item">
                    <a class="nav-link" href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
access/logout">Wyloguj</a>
                </li>
            <?php }?>
        </ul>

    </div>
</nav>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Logowanie</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
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
                    <?php if (isset($_smarty_tpl->tpl_vars['message']->value)) {?>
                        <div class="alert alert-success" role="alert"><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</div>
                    <?php }?> <?php if (isset($_smarty_tpl->tpl_vars['error']->value)) {?>
                        <div class="alert alert-danger" role="alert"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</div>
                    <?php }?>
                    <button type="submit" class="btn btn-default">Zaloguj</button>
                </form>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div><?php }
}
