{include file="header.html.tpl"}
<div class="container mb-5">
    <div class="page-header m-4">
        <h1>Aktualizuj Usługe</h1>
    </div>
    <form id="addUslugi"  action="http://{$smarty.server.HTTP_HOST}{$subdir}Uslugi/update" method="post" enctype="multipart/form-data">

        <input type="hidden" name="id" value="{$id}">

        <div class="form-group">
            <label for="name">Nazwa:</label> <input type="text" class="form-control" name="nazwaUsluga" value="{$nazwaUsluga}">
        </div>
        <div class="form-group">
            <label for="name">Cena:</label><input type="text" class="form-control" name="Cena" value="{$Cena}" >
        </div>




        <button type="submit" name="submit" class="btn btn-default">Aktualizuj</button>
    </form>







    {if isset($error)}
        <strong>{$error}</strong>
    {/if}

</div>

{include file="footer.html.tpl"}