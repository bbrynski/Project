{include file="header.html.tpl"}

<div class="container-fluid mt-5 pb-3">

    {if isset($message)}
        <div class="alert alert-success" role="alert">{$message}</div>
    {/if}
    {if isset($error)}
        <div class="alert alert-danger" role="alert">{$error}</div>
    {/if}
    {if isset($lakier)}
        {if $lakier|@count === 0}
            <div class="alert alert-primary" role="alert">
                Brak lakieru w Bazie
            </div>
        {else}
            <div class="row m-5">
                <div class="col-8 text-center">
                    <h2 class="text-center mb-5">Wybierz lakier</h2>


                    <form action="http://{$smarty.server.HTTP_HOST}{$subdir}Podsumowanie" method="post">


                        {foreach $lakier as $key => $Wartosc}
                            <div class="custom-control custom-radio custom-control-inline">
                                <input class="custom-control-input" type="radio" name="IdLakier"
                                       id="inlineRadio{$Wartosc['IdLakier']}" value="{$Wartosc['IdLakier']}" required>

                                <label class="custom-control-label" for="inlineRadio{$Wartosc['IdLakier']}">
                                    <div>
                                        <img src="http://{$smarty.server.HTTP_HOST}/{$sciezka}/Lakier/{$Wartosc['Foto']}"
                                             class="img-fluid" alt="Responsive image">
                                        <p>{$Wartosc['nazwaLakier']}</p>
                                    </div>
                                </label>
                            </div>
                        {/foreach}


                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Wybierz &#8594;</button>
                        </div>

                        <div class="text-left">
                            <a class="btn btn-success" href="http://{$smarty.server.HTTP_HOST}{$subdir}Wyposazenie">&#8592;
                                Wyposażenie</a>
                        </div>


                    </form>


                </div>


                <div class="col-4">

                    <h2 class="text-center mb-5">Postęp</h2>

                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 90%" aria-valuenow="25"
                             aria-valuemin="0" aria-valuemax="100"></div>
                    </div>


                    {foreach $ZbiorModeli as $key => $wartosc1}
                        {if {$wartosc1['id_ZbiorModeli']} == {$smarty.session.id_ZbiorModeli}}
                            <img src="http://{$smarty.server.HTTP_HOST}/{$sciezka}{$wartosc1['foto']}" class="img-fluid"
                                 alt="Responsive image">
                            <h4>Model: {$wartosc1['nazwa']}</h4>
                            <h4>Wersja: {$wartosc1['wersja_nazwa']} </h4>
                        {/if}
                    {/foreach}

                    {foreach $silnik as $key => $wartosc2}
                        {if {$wartosc2['id_SamochodParametry']} == {$smarty.session.id_SamochodParametry}}
                            <h4>Silnik: {$wartosc2['pojemnosc']} l {$wartosc2['moc']} KM {$wartosc2['silnik']}
                                ({$wartosc2['skrzynia']})</h4>
                        {/if}
                    {/foreach}

                    <div class="container-fluid pt-2">
                        <div class="row">
                            <div class="col text-center">



                                {foreach $felgi as $key => $wartosc3}
                                    {if {$wartosc3['id_SamochodKola']} == {$smarty.session.id_SamochodKola}}
                                        <ul class="list-group mb-5">
                                            <li class="list-group-item active"><h4>Felgi</h4></li>
                                        </ul>
                                        <img src="http://{$smarty.server.HTTP_HOST}/{$sciezka}/Felgi/{$wartosc3['foto']}"
                                             class="img-fluid" alt="Responsive image">
                                        <h6>{$wartosc3['nazwa']}</h6>
                                    {/if}
                                {/foreach}

                            </div>
                            <div class="col text-center">



                                {foreach $swiatla as $key => $wartosc4}
                                    {if {$wartosc4['id_SamochodSwiatla']} == {$smarty.session.id_SamochodSwiatla}}
                                        <ul class="list-group mb-5">
                                            <li class="list-group-item active"><h4>Swiatła</h4></li>
                                        </ul>
                                        <img src="http://{$smarty.server.HTTP_HOST}/{$sciezka}/Swiatla/{$wartosc4['foto']}"
                                             class="img-fluid" alt="Responsive image">
                                        <h6>{$wartosc4['nazwa']}</h6>
                                    {/if}
                                {/foreach}
                            </div>






                            <div class="col text-center">



                                {foreach $wyposazenie as $key => $wartosc5}
                                    {if {$wartosc5['id_SamochodWyposazenie']} == {$smarty.session.id_SamochodWyposazenie}}
                                        <ul class="list-group mb-5">
                                            <li class="list-group-item active"><h4>Tapicerka</h4></li>
                                        </ul>
                                        <img src="http://{$smarty.server.HTTP_HOST}/{$sciezka}/Tapicerka/{$wartosc5['foto']}"
                                             class="img-fluid" alt="Responsive image">
                                    {/if}
                                {/foreach}

                            </div>

                        </div>

                </div>
            </div>
            <div>


            </div>
        {/if}
    {/if}
</div>


{include file="footer.html.tpl"}