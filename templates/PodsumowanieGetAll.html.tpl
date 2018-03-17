{include file="header.html.tpl"}

<div class="container-fluid mt-5" xmlns="http://www.w3.org/1999/html">
    <!-- Zawartość kontenera -->
    <h2 class="text-center mb-5">Podsumowanie</h2>
    {if isset($message)}
        <div class="alert alert-success" role="alert">{$message}</div>
    {/if}
    {if isset($error)}
        <div class="alert alert-danger" role="alert">{$error}</div>
    {/if}


    <!-- Wyśrodkowanie -->
    <div class="d-flex justify-content-center">

        {foreach $samochody as $key => $samochod}

            {if {$samochod['IdModel']} == {$smarty.session.idmodel}}
            <div class="col-sm-6">
                    <img src="data:image;base64,{$samochod['Foto']}" class="img-fluid" alt="Responsive image">
                    <h1 class="text-center">{$samochod['nazwaModel']}</h1>

            {/if}
        {/foreach}

        {foreach $silniki as $key => $silnik}
            {if {$silnik['IdSilnik']} == {$smarty.session.idsilnik}}
                        <h2 class="text-center">{$silnik['TypSilnika']}</h2>
            {/if}
        {/foreach}

        {foreach $skrzynie as $key => $skrzynia}
            {if {$skrzynia['IdSkrzynia']} == {$smarty.session.idskrzynia}}
                <h2 class="text-center">{$skrzynia['TypSkrzyni']}</h2>
            {/if}
        {/foreach}




            </div>



    </div>


    <div class="d-flex justify-content-center">
        <a class="btn btn-success m-5 text-center" href="http://{$smarty.server.HTTP_HOST}{$subdir}Samochod">Nowa Konfiguracja</a>
    </div>

</div>
</div>


{include file="footer.html.tpl"}