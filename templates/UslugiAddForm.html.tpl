{include file="header.html.tpl"}
<div class="container mb-5">
    <div class="page-header m-4">
        <h1>Dodaj Usługe</h1>
    </div>
    <form id="addUslugi"  action="http://{$smarty.server.HTTP_HOST}{$subdir}Uslugi/add" method="post" enctype="multipart/form-data">



        <div class="form-group">
            <label for="name">Nazwa:</label> <input type="text" class="form-control" name="nazwaUsluga" >
        </div>
        <div class="form-group">
            <label for="name">Cena:</label><input type="text" class="form-control" name="Cena" >
        </div>




        <button type="submit" name="submit" class="btn btn-default">Dodaj</button>
    </form>







    {if isset($error)}
        <strong>{$error}</strong>
    {/if}

</div>

{include file="footer.html.tpl"}