{include file="header.html.tpl"}

<div class="container-fluid mt-5">
    <!-- Zawartość kontenera -->
    <h2 class="text-center mb-5">Skonfiguruj swojego Volkswagena</h2>
    {if isset($message)}
        <div class="alert alert-success" role="alert">{$message}</div>
    {/if}
    {if isset($error)}
        <div class="alert alert-danger" role="alert">{$error}</div>
    {/if}
    {if isset($ZbiorModeli)}
        {if $ZbiorModeli|@count === 0}
            <div class="alert alert-primary" role="alert">
                Brak Modeli Samochodów w Bazie
            </div>
        {else}

    <div class="container">
        <div id="szczegoly">

        </div>

            <div class="row">
                {foreach $ZbiorModeli as $key => $Wartosc}
                    <div class="col-sm-6">
                        <a href="http://{$smarty.server.HTTP_HOST}{$subdir}Silnik/{$Wartosc['id_ZbiorModeli']}">
                        <img src="http://{$smarty.server.HTTP_HOST}/{$sciezka}{$Wartosc['foto']}" class="img-fluid" alt="Responsive image">
                        <h1 class="text-center">{$Wartosc['nazwa']}</h1>
                        </a>

                        <!-- dodać jeszcze wersje wyposażenia -->

                    </div>
                {/foreach}
            </div>


        {/if}
    {/if}
</div>
</div>


{include file="footer.html.tpl"}