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

        </ul>

        <ul class="nav navbar-nav navbar-right">


            {if !isset($login)}

                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#exampleModal">Logowanie</a>
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