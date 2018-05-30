{include file="header.html.tpl"}
<div class="container">
    <div class="text-center mt-5">
        <h2>Sprawdź Zamówienie</h2>
    </div>
    <form id="myform" action="http://{$smarty.server.HTTP_HOST}{$subdir}Zamowienie/sprawdz" method="post" enctype="multipart/form-data">


        <div class="form-group">
            <label for="name">Numer zamówienia:</label>
            <input type="text" class="form-control" id="NumerZamowienia" name="NumerZamowienia" required="required">
        </div>

        <button type="submit" name="submit" class="btn btn-success">Sprawdź</button>
    </form>

    <div class="col-md-3" id="szczegoly">

    </div>





    {if isset($error)}
        <strong>{$error}</strong>
    {/if}

</div>

{include file="footer.html.tpl"}