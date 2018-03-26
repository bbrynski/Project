{include file="header.html.tpl"}
<div class="container">
    <div class="page-header m-5">
        <h1>Sprawdź Zamówienie</h1>
    </div>
    <form id="myform" action="http://{$smarty.server.HTTP_HOST}{$subdir}Zamowienie/sprawdz" method="post" enctype="multipart/form-data">

        <div class="form-group">
            <label for="name">Imie:</label><input type="text" class="form-control" name="S_Imie" >
        </div>

        <div class="form-group">
            <label for="name">Nazwisko:</label><input type="text" class="form-control" name="S_Nazwisko" >
        </div>

        <div class="form-group">
            <label for="name">Numer zamówienia:</label> <input type="text" class="form-control" name="NumerZamowienia" >
        </div>




        <button type="submit" name="submit" class="btn btn-default">Sprawdź</button>
    </form>

    <div class="col-md-3" id="szczegoly">

    </div>





    {if isset($error)}
        <strong>{$error}</strong>
    {/if}

</div>

{include file="footer.html.tpl"}