{include file="header.html.tpl"}

<div class="container-fluid mt-5">

    <h2 class="text-center mb-5">Skonfiguruj swojego Volkswagena</h2>
    {if isset($message)}
        <div class="alert alert-success" role="alert">{$message}</div>
    {/if}
    {if isset($error)}
        <div class="alert alert-danger" role="alert">{$error}</div>
    {/if}
    {if isset($WyborWersji)}
    {if $WyborWersji|@count === 0}
    <div class="alert alert-primary" role="alert">
        Brak Modeli Samochodów w Bazie
    </div>
    {else}

    <div class="container">

        <div class="row">
            {foreach $WyborWersji as $key => $Wartosc}
                <div class="col-sm-6">
                    <a href="http://{$smarty.server.HTTP_HOST}{$subdir}Silnik/{$Wartosc['id_ZbiorModeli']}">
                        <img src="http://{$smarty.server.HTTP_HOST}/{$sciezka}{$Wartosc['foto']}" class="img-fluid"
                             alt="Responsive image">
                        <h1 class="text-center">{$Wartosc['wersja_nazwa']}</h1>
                        <h4>Cena: {$Wartosc['cena']} zł</h4>
                    </a>
                </div>
            {/foreach}
        </div>


    </div>

    {/if}
    {/if}

    <div class="text-left">
        <a class="btn btn-success ml-5" href="http://{$smarty.server.HTTP_HOST}{$subdir}KonfiguratorModelu">&#8592;
            Modele</a>
    </div>

</div>


{include file="footer.html.tpl"}