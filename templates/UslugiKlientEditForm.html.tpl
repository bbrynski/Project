{include file="header.html.tpl"}
<div class="container">
    <div class="page-header">
        <h1>Edytuj usługę</h1>
    </div>
    <form id="addModel"  action="http://{$smarty.server.HTTP_HOST}{$subdir}UslugiKlient/update" method="post" enctype="multipart/form-data">

        <input type="hidden" id="id" name="id" value="{$id}">

        <div class="form-group">
            <label for="name">Klient</label>
            {html_options name=Id_Klient options=$Klient class="form-control" selected="{$Id_Klient}"}
        </div>

        <div class="form-group">
            <label for="name">Model</label>
            {html_options name=Id_Model options=$Samochody  class="form-control" selected="{$Id_Model}"}
        </div>

        <div class="form-group">
            <label for="name">Naped</label>
            {html_options name=Id_Uslugi options=$Uslugi  class="form-control" selected="{$Id_Uslugi}"}
        </div>


        <div class="form-group">
            <label for="name">Opis:</label> <input type="text" class="form-control" name="Opis" value="{$Opis}" >
        </div>

        <button type="submit" name="submit" class="btn btn-default">Dodaj</button>
    </form>







    {if isset($error)}
        <strong>{$error}</strong>
    {/if}

</div>

{include file="footer.html.tpl"}