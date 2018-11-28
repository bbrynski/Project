{include file="header.html.tpl"}

<div class="container-fluid mt-5">

    {if isset($message)}
        <div class="alert alert-success" role="alert">{$message}</div>
    {/if}
    {if isset($error)}
        <div class="alert alert-danger" role="alert">{$error}</div>
    {/if}
    {if isset($Kola)}
        {if $Kola|@count === 0}
            <div class="alert alert-primary" role="alert">
                Brak felg w Bazie
            </div>
        {else}
            <div class="row m-5">
                <div class="col-8">
                    <h2 class="text-center mb-5">Wybierz felgi</h2>

                    <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th colspan="4" class="text-center">Felgi</th>
                        </tr>
                        <tr>
                            <th>Rozmiar</th>
                        </tr>
                        </thead>


                        <form action="http://{$smarty.server.HTTP_HOST}{$subdir}Felgi" method="post">

                            {foreach $Kola as $key => $Wartosc}

                                    <tr>
                                        <td>
                                            <div class="radio">
                                                <label><input type="radio" id='regular' name="id_SamochodParametry"
                                                              value="{$Wartosc['id_SamochodKolo']}" required> {$Wartosc['nazwa']}
                                                </label>
                                            </div>
                                        </td>

                                    </tr>

                            {/foreach}

                    </table>

                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Wybierz &#8594;</button>
                            </div>


                        </form>


                </div>


                <div class="col-4">

                    <h2 class="text-center mb-5">Postęp</h2>

                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 15%" aria-valuenow="25"
                             aria-valuemin="0" aria-valuemax="100"></div>
                    </div>


                    {foreach $ZbiorModeli as $key => $Wartosc}
                        {if {$Wartosc['id_ZbiorModeli']} == {$smarty.session.id_ZbiorModeli}}
                            <center><img src="http://{$smarty.server.HTTP_HOST}/{$sciezka}{$Wartosc['foto']}"
                                         class="img-fluid" alt="Responsive image"></center>
                            <h4>Model: {$Wartosc['nazwa']}</h4>
                            <h4>Wersja: {$Wartosc['wersja_nazwa']} </h4>
                        {/if}
                    {/foreach}

                    {foreach $SamochodParametry as $key => $Wartosc}
                        {if {$Wartosc['id_SamochodParametry']} == {$smarty.session.id_ZbiorModeli}}
                            <h4>Silnik: {$Wartosc['pojemnosc']}  {$Wartosc['moc']}KM {$Wartosc['silnik']} ({$Wartosc['skrzynia']})</h4>
                        {/if}
                    {/foreach}


                    <!--

                {foreach $silniki as $key => $silnik}
                    {if {$silnik['IdSilnik']} == {$smarty.session.idsilnik}}
                        <h4>Silnik: {$silnik['TypSilnika']}</h4>
                    {/if}
                {/foreach}

                {foreach $skrzynie as $key => $skrzynia}
                    {if {$skrzynia['IdSkrzynia']} == {$smarty.session.idskrzynia}}
                        <h4>Skrzynia: {$skrzynia['TypSkrzyni']}</h4>
                    {/if}
                {/foreach}

                {foreach $lakiery as $key => $lakier}
                    {if {$lakier['IdLakier']} == {$smarty.session.idlakier}}
                        <h4>Lakier: {$lakier['nazwaLakier']}</h4>
                    {/if}
                {/foreach}

                {foreach $napedy as $key => $naped}
                    {if {$naped['IdNaped']} == {$smarty.session.idnaped}}
                        <h4>{$naped['nazwaNaped']}</h4>
                    {/if}
                {/foreach}

                {foreach $reflektory as $key => $reflektor}
                    {if {$reflektor['IdReflektory']} == {$smarty.session.idreflektory}}
                        <h4>{$reflektor['nazwaReflektory']}</h4>
                    {/if}
                {/foreach}

                {foreach $kola as $key => $kolo}
                    {if {$kolo['IdKola']} == {$smarty.session.idkola}}
                        <h4>{$kolo['Wartosc']}"</h4>
                    {/if}
                {/foreach}

                {if isset($opcje)}
                    {foreach $opcje as $item}
                        <h4>{$item}</h4>
                    {/foreach}
                {/if}

                -->

                </div>
            </div>
            <div>
                <div class="text-left">
                    <a class="btn btn-success ml-5 mb-5" href="http://{$smarty.server.HTTP_HOST}{$subdir}Silnik">&#8592;
                        Silnik (do zrobienia)</a>
                </div>

                <!--

                {if isset($smarty.session.idsilnik)}
                    <div class="text-right">
                        <a class="btn btn-success mr-5"
                           href="http://{$smarty.server.HTTP_HOST}{$subdir}Skrzynia/{$smarty.session.idsilnik}">Skrzynia
                            &#8594;</a>
                    </div>
                {/if}

                -->

            </div>
        {/if}
    {/if}
</div>


{include file="footer.html.tpl"}