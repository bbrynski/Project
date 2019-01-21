{include file="header.html.tpl"}
<div class="container">
    <div class="text-center mt-5">
        <h2>Wczytaj konfiguracje samochodu</h2>
    </div>

    {if isset($error)}
        <div class="alert alert-danger" role="alert">{$error}</div>
    {/if}

    <form id="konfiguratorWczytaj" action="http://{$smarty.server.HTTP_HOST}{$subdir}Konfigurator/wczytaj" method="post" >

        <div class="form-group">
            <label for="name">Numer konfiguracji:</label>
            <input type="text" class="form-control" id="numer" name="numer" required="required">
        </div>

        <input class="btn btn-primary" type="submit" value="Wyślij">
    </form>

    <div class="d-flex justify-content-center">
        <a class="btn btn-success m-5 text-center" href="http://{$smarty.server.HTTP_HOST}{$subdir}KonfiguratorModelu">Nowa Konfiguracja</a>
    </div>

    </div>





</div>

{include file="footer.html.tpl"}