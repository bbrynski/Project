{include file="header.html.tpl"}
<div class="container mb-5">
    <div class="page-header m-4">
        <h1>Edytuj status zamówienia</h1>
    </div>
    <form id="addModel"  action="http://{$smarty.server.HTTP_HOST}{$subdir}Zamowienie/update" method="post" enctype="multipart/form-data">

        <input type="hidden" name="id" value="{$id}">
<input type="hidden" name="Id_Klient" value="{$Id_Klient}">
        <input type="hidden" name="Id_Klient" value="{$Id_Klient}">
        <input type="hidden" name="Id_Pracownik" value="{$Id_Pracownik}">
        <input type="hidden" name="IdModel" value="{$Id_Model}">
        <input type="hidden" name="Data_Zamowienia" value="{$DataZamow}">
        <input type="hidden" name="NumerZamowienia" value="{$NumerZamowienia}">




        <div class="form-group">
            <label for="name">Status zamowienia:</label><input type="text" class="form-control" name="Statuszamowienia" >
        </div>




        <button type="submit" name="submit" class="btn btn-success">Zmień</button>
    </form>







    {if isset($error)}
        <strong>{$error}</strong>
    {/if}

</div>

{include file="footer.html.tpl"}