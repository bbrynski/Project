{include file="header.html.tpl"}
<div class="container">
    <div class="text-center mt-5">
        <h1>Edytuj pozycje parkingu</h1>
    </div>
    <form action="http://{$smarty.server.HTTP_HOST}{$subdir}Parking/add" method="post">

        <input type="hidden" name="id" value="{$id}">

        <div class="form-group">
            <label for="name">Model</label>
            {html_options name=IdModel options=$Samochody selected="{$Id_Model}" class="form-control"}
        </div>

        <div class="form-group">
            <label for="name">Ilość:</label> <input type="text" class="form-control" name="Sztuki" required="required" value="{$Sztuki}">
        </div>

        <button type="submit" name="submit" class="btn btn-success">Aktualizuj</button>
    </form>


    {if isset($error)}
        <strong>{$error}</strong>
    {/if}

</div>

{include file="footer.html.tpl"}