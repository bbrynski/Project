<!DOCTYPE html>
<html lang="pl">

<head>
    <title>Dominik Kowalski</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <link href="http://{$smarty.server.HTTP_HOST}{$subdir}css/bootstrap.min.css" rel="stylesheet">
    <link href="http://{$smarty.server.HTTP_HOST}{$subdir}css/jquery-ui.min.css" rel="stylesheet">
    <!-- DataTables Table plug-in for jQuery -->
    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <link href="http://{$smarty.server.HTTP_HOST}{$subdir}css/moje.css" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="#">
        <img src="http://{$smarty.server.HTTP_HOST}{$subdir}images/DHL_logo.png"  height="50"  alt="">
    </a>


    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto justify-content-center">

            <li class="nav-item">
                <a class="nav-link" href="http://{$smarty.server.HTTP_HOST}{$subdir}Klient">Klienci</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://{$smarty.server.HTTP_HOST}{$subdir}Przesylka">Przesyłki</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://{$smarty.server.HTTP_HOST}{$subdir}Historia">Historia</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Zarządzaj
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="http://{$smarty.server.HTTP_HOST}{$subdir}Status">Status</a>
                    <a class="dropdown-item" href="http://{$smarty.server.HTTP_HOST}{$subdir}Oddzial">Oddział</a>
                    <a class="dropdown-item" href="http://{$smarty.server.HTTP_HOST}{$subdir}Cennik">Cennik</a>
                </div>
            </li>


        </ul>

        <ul class="nav navbar-nav navbar-right">


            {if !isset($login)}

                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#exampleModal">Logowanie</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#exampleModal2">Rejestracja</a>
                </li>
            {else}
                <li class="nav-item">
                    <a class="nav-link" href="http://{$smarty.server.HTTP_HOST}{$subdir}access/logout">Wyloguj</a>
                </li>
            {/if}
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
                <form id="logform" action="http://{$smarty.server.HTTP_HOST}{$subdir}access/login" method="post">
                    <div class="form-group">
                        <label for="name">Login</label>
                        <input type="text" class="form-control" id="login" name="login" placeholder="Wprowadź login">
                    </div>
                    <div class="form-group">
                        <label for="name">Hasło</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Wprowadź hasło">
                    </div>
                    <div class="alert alert-danger collapse" role="alert"></div>
                    {if isset($message)}
                        <div class="alert alert-success" role="alert">{$message}</div>
                    {/if} {if isset($error)}
                        <div class="alert alert-danger" role="alert">{$error}</div>
                    {/if}
                    <button type="submit" class="btn btn-default">Zaloguj</button>
                </form>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Rejestracja</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="add_uzytkownik" action="http://{$smarty.server.HTTP_HOST}{$subdir}access/registration" method="post">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputImie">Imie</label>
                            <input type="text" class="form-control" id="inputImie" name="imie" placeholder="Imie">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputNazwisko">Nazwisko</label>
                            <input type="text" class="form-control" id="inputNazwisko" name="nazwisko" placeholder="Nazwisko">
                        </div>
                    </div>


                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail">Email</label>
                            <input type="text" class="form-control" id="inputEmail" name="email" placeholder="Email">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputImie">Hasło</label>
                            <input type="password" class="form-control" id="inputHaslo" name="haslo" placeholder="Hasło">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputNazwisko">Powtórz Hasło</label>
                            <input type="password" class="form-control" id="inputHaslo2" name="haslo2" placeholder="Powtórz Hasło">
                        </div>
                    </div>

                    <div class="alert alert-danger collapse" role="alert"></div>

                    <button type="submit" class="btn btn-primary">Stwórz Konto</button>
                </form>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>