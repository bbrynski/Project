<?php
/**
 * Created by PhpStorm.
 * User: Dominik
 * Date: 12.03.2018
 * Time: 16:46
 */


{include file="header.html.tpl"}

<div class="container-fluid mt-5">
<!-- Zawartość kontenera -->
<h2 class="text-center">Lista Pracowników</h2>
{if isset($message)}
    <div class="alert alert-success" role="alert">{$message}</div>
{/if}
{if isset($error)}
    <div class="alert alert-danger" role="alert">{$error}</div>
{/if}
{if isset($pracownicy)}
    {if $pracownicy|@count === 0}
        <div class="alert alert-primary" role="alert">
            Brak Pracowników w Bazie
        </div>
    {else}

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
            {foreach $pracownicy as $key => $pracownik}
                <tr>
                    <td>{$pracownik['Imie']}</td>
                    <td>{$pracownik['Nazwisko']} </td>
                    <td>{$pracownik['numer']} </td>
                    <td><a class="btn btn-primary" href="http://{$smarty.server.HTTP_HOST}{$subdir}Pracownik/edit/{$pracownik['Id_Pracownik']}">Edytuj</a></td>
                    <td><a class="btn btn-danger" href="http://{$smarty.server.HTTP_HOST}{$subdir}Pracownik/delete/{$pracownik['Id_Pracownik']}">Usuń</a></td>
                </tr>
            {/foreach}
            </tbody>
        </table>


    {/if}
{/if}


<!-- Wyśrodkowanie -->
<div class="d-flex justify-content-center">
    <a class="btn btn-success mb-3 text-center" href="http://{$smarty.server.HTTP_HOST}{$subdir}Pracownik/add-form">+</a>
</div>

</div>
</div>


{include file="footer.html.tpl"}