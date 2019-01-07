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

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal2">&#8592;
        Modele
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Chcesz zmienić swoją konfigurację</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Ten wybór oznacza utratę obecnej konfiguracji. Czy chcesz kontynuować?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Anuluj</button>
                        <a class="btn btn-success" href="http://{$smarty.server.HTTP_HOST}{$subdir}KonfiguratorModelu">
                            Kontynuuj</a>
                    </div>
                </div>
            </div>
        </div>

    {/if}
    {/if}



</div>


{include file="footer.html.tpl"}