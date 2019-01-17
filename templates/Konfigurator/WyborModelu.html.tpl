{include file="header.html.tpl"}

<div class="container-fluid mt-5 pb-3">

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


    <div class="container- text-center">


            {foreach $ZbiorModeli as $key => $Wartosc}

                    <form class="needs-validation2" novalidate action="http://{$smarty.server.HTTP_HOST}{$subdir}WersjeModelu" method="post">

                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline1{$Wartosc['id_ZbiorModeli']}" name="wersja_nazwa" value="{$Wartosc['nazwa']}" class="custom-control-input" required>
                            <label class="custom-control-label" for="customRadioInline1{$Wartosc['id_ZbiorModeli']}">
                                <div style="max-width:850px">
                                    <img src="http://{$smarty.server.HTTP_HOST}/{$sciezka}{$Wartosc['foto']}" class="img-fluid"
                                         alt="Responsive image">
                                    <h1 class="text-center">{$Wartosc['nazwa']}</h1>
                                </div>
                            </label>
                        </div>

                        {/foreach}

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Wybierz &#8594;</button>
                        </div>

                    </form>

    </div>
        {/if}
        {/if}

    {if (isset($prawo) && ($prawo == 'admin'))}
        <div class="text-center">
            <a class="btn btn-warning" href="http://{$smarty.server.HTTP_HOST}{$subdir}KonfiguratorModelu/add-form">Dodaj nowy model</a>
        </div>
    {/if}

</div>


{include file="footer.html.tpl"}