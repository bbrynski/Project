{include file="header.html.tpl"}
<div class="container">
    <div class="page-header">
        <h1>Edytuj odbiór</h1>
    </div>


    <form id="edit_odbior" action="http://{$smarty.server.HTTP_HOST}{$subdir}Odbiory/update" method="post">

         <input type="hidden" name="Id_Odbior" value="{$Id_Odbior}">


        <div class="form-group">
            <label>Klient</label>
            {html_options class="form-control" name=Id_Klient  selected="{$Id_Klient}" options=$klienci}
        </div>

        <div class="form-group">
            <label>Data</label>
            <input type="date" class="form-control"  name="data" value="{$Data}">
        </div>
        <div class="form-group">
            <label>Numer Zamówienia</label>
            <input type="text" class="form-control"  name="numer" value="{$Numer_Zamowienia}">
        </div>

        <input type="hidden"  name="Odebrano" value="{$Odebrano}">

        <button type="submit" class="btn btn-primary mt-3">Aktualizuj</button>
    </form>


    {if isset($error)}
        <strong>{$error}</strong>
    {/if}

</div>

{include file="footer.html.tpl"}