{include file="header.html.tpl"}
<div class="container">
    <div class="page-header">
        <h1>Dodaj nową usługę</h1>
    </div>
    <form id="addModel"  action="http://{$smarty.server.HTTP_HOST}{$subdir}UslugiKlient/add" method="post" enctype="multipart/form-data">



        <div class="form-group">
            <label for="name">Klient</label>
            {html_options name=Id_Klient options=$Samochody  class="form-control"}
        </div>

        <div class="form-group">
            <label for="name">Naped</label>
            {html_options name=Id_Uslugi options=$Uslugi  class="form-control"}
        </div>


        <div class="form-group">
            <label for="name">Opis:</label> <input type="text" class="form-control" name="Opis" >
        </div>

        <button type="submit" name="submit" class="btn btn-default">Dodaj</button>
    </form>







    {if isset($error)}
        <strong>{$error}</strong>
    {/if}

</div>

{include file="footer.html.tpl"}