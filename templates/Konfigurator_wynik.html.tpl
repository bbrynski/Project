{include file="header.html.tpl"}

<div class="container-fluid mt-5 pb-3">

    <h2 class="text-center">Sprawdzenie konfiguracji</h2>

    {if isset($error)}
        <div class="alert alert-danger" role="alert">{$error}</div>
    {/if}

    {if isset($message)}
        <div class="alert alert-success" role="alert">{$message}</div>
    {/if}
    {if isset($error)}
        <div class="alert alert-danger" role="alert">{$error}</div>
    {/if}



    <div class="alert alert-success" role="alert">
        Numer konfiguracji: <strong>{$smarty.session.numer}</strong>

    </div>




    <div class="container-fluid text-center">


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

        <div class="container-fluid pt-2">
            <div class="row">
                <div class="col">
                    <ul class="list-group mb-5">
                        <li class="list-group-item active"><h4>Felgi</h4></li>
                    </ul>

                    {foreach $felgi as $key => $wartosc3}
                        {if {$wartosc3['id_SamochodKola']} == {$smarty.session.id_SamochodKola}}

                            <img src="http://{$smarty.server.HTTP_HOST}/{$sciezka}/Felgi/{$wartosc3['foto']}" class="img-fluid" alt="Responsive image">
                            <h5>{$wartosc3['nazwa']}</h5>


                        {/if}
                    {/foreach}

                </div>
                <div class="col">

                    <ul class="list-group mb-5">
                        <li class="list-group-item active"><h4>Swiatła</h4></li>
                    </ul>

                    {foreach $swiatla as $key => $wartosc4}
                        {if {$wartosc4['id_SamochodSwiatla']} == {$smarty.session.id_SamochodSwiatla}}

                            <img src="http://{$smarty.server.HTTP_HOST}/{$sciezka}/Swiatla/{$wartosc4['foto']}" class="img-fluid" alt="Responsive image">
                            <h5>{$wartosc4['nazwa']}</h5>

                        {/if}
                    {/foreach}


                </div>
                <div class="col">

                    <ul class="list-group mb-5">
                        <li class="list-group-item active"><h4>Tapicerka</h4></li>
                    </ul>

                    {foreach $wyposazenie as $key => $wartosc5}
                        {if {$wartosc5['id_SamochodWyposazenie']} == {$smarty.session.id_SamochodWyposazenie}}

                            <img src="http://{$smarty.server.HTTP_HOST}/{$sciezka}/Tapicerka/{$wartosc5['foto']}" class="img-fluid" alt="Responsive image">

                        {/if}
                    {/foreach}

                </div>
                <div class="col">

                    <ul class="list-group mb-5">
                        <li class="list-group-item active"><h4>Lakier</h4></li>
                    </ul>

                    {foreach $lakier as $key => $wartosc6}
                        {if {$wartosc6['IdLakier']} == {$smarty.session.IdLakier}}

                            <img src="http://{$smarty.server.HTTP_HOST}/{$sciezka}/Lakier/{$wartosc6['Foto']}" class="img-fluid" alt="Responsive image">
                            <h5>{$wartosc6['nazwaLakier']}</h5>
                        {/if}
                    {/foreach}

                </div>
            </div>

        </div>








    </div>


</div>


    </div>

{if isset($smarty.session.user)}
    <a class="btn btn-success m-5 text-center"
       href="http://{$smarty.server.HTTP_HOST}{$subdir}Zamowienie/add-form/">Zamów</a>
{/if}


</div>

{include file="footer.html.tpl"}