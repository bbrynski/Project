{include file="header.html.tpl"}

<div class="container-fluid mt-5 pb-3">

    <h2 class="text-center mb-5">Wybierz wersje</h2>
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

    <div class="container-fluid text-center">

        {foreach $WyborWersji as $key => $Wartosc}

        <form action="http://{$smarty.server.HTTP_HOST}{$subdir}Silnik" method="post">

        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="customRadioInline1{$Wartosc['id_ZbiorModeli']}" name="id_ZbiorModeli" value="{$Wartosc['id_ZbiorModeli']}" class="custom-control-input" required>
            <label class="custom-control-label" for="customRadioInline1{$Wartosc['id_ZbiorModeli']}">
                <div style="max-width:850px">
                <img src="http://{$smarty.server.HTTP_HOST}/{$sciezka}{$Wartosc['foto']}" class="img-fluid"
                     alt="Responsive image">
                <h1 class="text-center">{$Wartosc['wersja_nazwa']}</h1>
                <h4>Cena: {$Wartosc['cena']} zł</h4>

                    {if (isset($prawo) && ($prawo == 'admin'))}
                        <div class="text-center">
                            <a class="btn btn-danger" href="http://{$smarty.server.HTTP_HOST}{$subdir}WersjeModelu/delete/{$Wartosc['id_ZbiorModeli']}">Usuń</a>
                        </div>
                    {/if}

                </div>
            </label>
        </div>

        {/foreach}

            <div class="text-right">
                <button type="submit" class="btn btn-primary">Wybierz &#8594;</button>
            </div>


        </form>

    </div>

        <div class="text-left">
            <a class="btn btn-success" href="http://{$smarty.server.HTTP_HOST}{$subdir}KonfiguratorModelu">&#8592;
                Modele</a>
        </div>

    {/if}
    {/if}



</div>


{include file="footer.html.tpl"}