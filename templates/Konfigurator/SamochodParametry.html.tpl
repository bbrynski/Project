{include file="header.html.tpl"}

<div class="container-fluid mt-5">

    {if isset($message)}
        <div class="alert alert-success" role="alert">{$message}</div>
    {/if}
    {if isset($error)}
        <div class="alert alert-danger" role="alert">{$error}</div>
    {/if}

    {if isset($silnik)}
        {if $silnik|@count === 0}
            <div class="alert alert-primary" role="alert">
                Brak Silników w Bazie
            </div>
        {else}
            <div class="row m-5">
                <div class="col-8">
                    <h2 class="text-center mb-5">Wybierz silnik</h2>

                    <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th colspan="4" class="text-center">Benzyna bezołowiowa</th>
                        </tr>
                        <tr>
                            <th>Pojemność</th>
                            <th>Moc</th>
                            <th>Skrzynia</th>
                            <th>Cena</th>
                        </tr>
                        </thead>


                        <form action="http://{$smarty.server.HTTP_HOST}{$subdir}Felgi" method="post">

                            {foreach $silnik as $key => $Wartosc}
                                {if $Wartosc['silnik'] == "Benzynowy"}
                                    <tr>
                                        <td>
                                            <div class="radio">
                                                <label><input type="radio" id='regular' name="id_SamochodParametry"
                                                              value="{$Wartosc['id_SamochodParametry']}" required> {$Wartosc['pojemnosc']}
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="radiotext">
                                                <label for='regular'>{$Wartosc['moc']}</label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="radiotext">
                                                <label for='regular'>{$Wartosc['skrzynia']}</label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="radiotext">
                                                <label for='regular'> </label>
                                            </div>
                                        </td>
                                    </tr>
                                {/if}
                            {/foreach}

                            <thead class="thead-dark">
                            <tr>
                                <th colspan="4" class="text-center">Olej napędowy</th>
                            </tr>
                            <tr>
                                <th>Pojemność</th>
                                <th>Moc</th>
                                <th>Skrzynia</th>
                                <th>Cena</th>
                            </tr>
                            </thead>

                            {foreach $silnik as $key => $Wartosc}
                                {if $Wartosc['silnik'] == "Diesel"}
                                    <tr>
                                        <td>
                                            <div class="radio">
                                                <label><input type="radio" id='regular' name="id_SamochodParametry"
                                                              value="{$Wartosc['id_SamochodParametry']}" required> {$Wartosc['pojemnosc']}
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="radiotext">
                                                <label for='regular'>{$Wartosc['moc']}</label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="radiotext">
                                                <label for='regular'>{$Wartosc['skrzynia']}</label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="radiotext">
                                                <label for='regular'></label>
                                            </div>
                                        </td>
                                    </tr>
                                {/if}
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
                        <div class="progress-bar" role="progressbar" style="width: 30%" aria-valuenow="25"
                             aria-valuemin="0" aria-valuemax="100"></div>
                    </div>

                    {foreach $ZbiorModeli as $key => $wartosc1}
                        {if {$wartosc1['id_ZbiorModeli']} == {$smarty.session.id_ZbiorModeli}}
                            <img src="http://{$smarty.server.HTTP_HOST}/{$sciezka}{$wartosc1['foto']}" class="img-fluid" alt="Responsive image">
                            <h4>Model: {$wartosc1['nazwa']}</h4>
                            <h4>Wersja: {$wartosc1['wersja_nazwa']} </h4>
                        {/if}
                    {/foreach}

                    {foreach $silnik as $key => $wartosc2}
                        {if {$wartosc2['id_SamochodParametry']} == {$smarty.session.id_SamochodParametry}}
                            <h4>Silnik: {$wartosc2['pojemnosc']} l {$wartosc2['moc']} KM {$wartosc2['silnik']} ({$wartosc2['skrzynia']})</h4>
                        {/if}
                    {/foreach}

                    {foreach $felgi as $key => $wartosc3}
                        {if {$wartosc3['id_SamochodKola']} == {$smarty.session.id_SamochodKola}}
                            <h4>Felgi: {$wartosc3['nazwa']}</h4>
                            <img src="http://{$smarty.server.HTTP_HOST}/{$sciezka}/Felgi/{$wartosc3['foto']}" class="img-fluid" alt="Responsive image">
                        {/if}
                    {/foreach}

                    {foreach $swiatla as $key => $wartosc4}
                        {if {$wartosc4['id_SamochodSwiatla']} == {$smarty.session.id_SamochodSwiatla}}
                            <h4>Światła: {$wartosc4['nazwa']}</h4>
                        {/if}
                    {/foreach}

                    {foreach $wyposazenie as $key => $wartosc5}
                        {if {$wartosc5['id_SamochodWyposazenie']} == {$smarty.session.id_SamochodWyposazenie}}
                            <h4>Wyposażenie dodatkowe: {$wartosc5['nazwa']}</h4>
                        {/if}
                    {/foreach}

                    {foreach $lakier as $key => $wartosc6}
                        {if {$wartosc6['IdLakier']} == {$smarty.session.IdLakier}}
                            <h4>Lakier: {$wartosc6['nazwaLakier']}</h4>
                            <img src="http://{$smarty.server.HTTP_HOST}/{$sciezka}/Lakier/{$wartosc6['Foto']}" class="img-fluid" alt="Responsive image">
                        {/if}
                    {/foreach}


                </div>
            </div>
            <div>
                <div class="text-left">
                    <a class="btn btn-success ml-5 mb-5" href="http://{$smarty.server.HTTP_HOST}{$subdir}WersjeModelu">&#8592;
                        Wersja</a>
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

{if (isset($prawo) && ($prawo == 'admin'))}

<div class="container">
    <form id="add_silnik" action="http://{$smarty.server.HTTP_HOST}{$subdir}Silnik/add-2" method="post">

        <input type="hidden" name="id_zbior_modeli" value="{$smarty.session.id_ZbiorModeli}}">

        <div class="form-group">
            <label for="name">Wersja</label>
            {html_options name=id_jednostka_napedowa options=$selectsilnik  class="form-control"}
        </div>

        <button type="submit" name="submit" class="btn btn-default">Dodaj silnik do modelu</button>
    </form>
</div>



    <div class="text-center mb-2">
        <a class="btn btn-warning" href="http://{$smarty.server.HTTP_HOST}{$subdir}Silnik/add-form">Dodaj silnik</a>
    </div>
{/if}


{include file="footer.html.tpl"}