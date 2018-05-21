{include file="header.html.tpl"}

<div class="container-fluid mt-5" xmlns="http://www.w3.org/1999/html">
    <!-- Zawartość kontenera -->
    <h2 class="text-center mb-5">Podsumowanie</h2>

    {if isset($error)}
        <div class="alert alert-danger" role="alert">{$error}</div>
    {/if}


    {if isset($smarty.session.numer)}
        <div class="alert alert-success" role="alert">
            Numer konfiguracji:{$smarty.session.numer}

        </div>



{else}
    <!-- Wyśrodkowanie -->
    <div class="d-flex justify-content-center">




        {foreach $samochody as $key => $samochod}

            {if {$samochod['IdModel']} == {$smarty.session.idmodel}}
            <div class="col-sm-6">
                    <center><img src="http://{$smarty.server.HTTP_HOST}/{$sciezka}{$samochod['Foto']}" class="img-fluid" alt="Responsive image"></center>


                    <h2 class="text-center">Model:{$samochod['nazwaModel']}</h2>
                    <br>
            {/if}
        {/foreach}



        {foreach $silniki as $key => $silnik}
            {if {$silnik['IdSilnik']} == {$smarty.session.idsilnik}}
                        <h4 class="text-center">Silnik: {$silnik['TypSilnika']}</h4>
            {/if}
        {/foreach}

        {foreach $skrzynie as $key => $skrzynia}
            {if {$skrzynia['IdSkrzynia']} == {$smarty.session.idskrzynia}}
                <h4 class="text-center">Skrzynia: {$skrzynia['TypSkrzyni']}</h4>
            {/if}
        {/foreach}

                {foreach $lakiery as $key => $lakier}
                    {if {$lakier['IdLakier']} == {$smarty.session.idlakier}}
                        <h4 class="text-center">Lakier: {$lakier['nazwaLakier']}</h4>
                    {/if}
                {/foreach}

                {foreach $napedy as $key => $naped}
                    {if {$naped['IdNaped']} == {$smarty.session.idnaped}}
                        <h4 class="text-center">Napęd: {$naped['nazwaNaped']}</h4>
                    {/if}
                {/foreach}

                {foreach $reflektory as $key => $reflektor}
                    {if {$reflektor['IdReflektory']} == {$smarty.session.idreflektory}}
                        <h4 class="text-center">Reflektory: {$reflektor['nazwaReflektory']}</h4>
                    {/if}
                {/foreach}

                {foreach $kola as $key => $kolo}
                    {if {$kolo['IdKola']} == {$smarty.session.idkola}}
                        <h4 class="text-center">Koła: {$kolo['Wartosc']}"</h4>
                    {/if}
                {/foreach}



                {if isset($opcje)}
                    <br>
                    <h4 class="text-center">Opcje:</h4>
                {foreach $opcje as $item}
                        <h4 class="text-center"> - {$item}</h4>
                {/foreach}
                {/if}



            </div>



    </div>
    {/if}

    <div class="d-flex justify-content-center">
        <a class="btn btn-success m-5 text-center" href="http://{$smarty.server.HTTP_HOST}{$subdir}Samochod">Nowa Konfiguracja</a>
        {if !isset($smarty.session.numer)}
        <a class="btn btn-success m-5 text-center" href="http://{$smarty.server.HTTP_HOST}{$subdir}Konfigurator/zapisz">Zapisz konfiguracje</a>
        {/if}
        {if isset($smarty.session.user)}
            <a class="btn btn-success m-5 text-center" href="http://{$smarty.server.HTTP_HOST}{$subdir}Zamowienie/add-form/">Zamów</a>
        {/if}
    </div>

</div>


{include file="footer.html.tpl"}