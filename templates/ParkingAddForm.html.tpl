{include file="header.html.tpl"}
<div class="container">
    <div class="text-center mt-5">
        <h1>Dodaj nowy samochód na parking</h1>
    </div>
    <form id="form_parking" action="http://{$smarty.server.HTTP_HOST}{$subdir}Parking/add" method="post">


        <div class="form-group">
            <label for="name">Model</label>
            {html_options name=IdModel options=$Samochody  class="form-control"}
        </div>

        <div class="form-group">
            <label for="name">Ilość:</label> <input type="text" class="form-control" name="Sztuki" required="required">
        </div>

        <button type="submit" name="submit" class="btn btn-success">Dodaj</button>
    </form>


    {if isset($error)}
        <strong>{$error}</strong>
    {/if}

</div>

{include file="footer.html.tpl"}