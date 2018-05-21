{include file="header.html.tpl"}

<div class="container-fluid mt-5" xmlns="http://www.w3.org/1999/html">

    {if isset($message)}
        <div class="alert alert-success" role="alert">{$message}</div>
    {/if}
    {if isset($error)}
        <div class="alert alert-danger" role="alert">{$error}</div>
    {/if}
    {if isset($napedy)}
        {if $napedy|@count === 0}
            <div class="alert alert-primary" role="alert">
                Brak typów napędów w bazie
            </div>
        {else}



        <div class="row">
            <div class="col-8">
                <h2 class="text-center mb-5">Dostępne typy napędu</h2>
                <div class="row">
                    {foreach $napedy as $key => $naped}

                        <div class="col-sm-6">
                            <a href="http://{$smarty.server.HTTP_HOST}{$subdir}Reflektory/{$naped['IdNaped']}">
                                <h2 class="text-center">{$naped['nazwaNaped']}</h2>
                            </a>
                        </div>
                    {/foreach}
                </div>


            </div>
            <div class="col-4">

                <h2 class="text-center mb-5">Postęp</h2>

                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>


                {foreach $samochody as $key => $samochod}
                    {if {$samochod['IdModel']} == {$smarty.session.idmodel}}
                        <center><img src="http://{$smarty.server.HTTP_HOST}/{$sciezka}{$samochod['Foto']}" class="img-fluid" alt="Responsive image"></center>
                        <h4>Model: {$samochod['nazwaModel']}</h4>
                    {/if}
                {/foreach}

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

            </div>
        </div>


        <div>
            <div class="text-left">
                <a class="btn btn-success ml-5" href="http://{$smarty.server.HTTP_HOST}{$subdir}Lakier/{$smarty.session.idskrzynia}">&#8592; Lakier</a>
            </div>
            {if isset($smarty.session.idnaped)}
                <div class="text-right">
                    <a class="btn btn-success mr-5" href="http://{$smarty.server.HTTP_HOST}{$subdir}Reflektory/{$smarty.session.idnaped}">Opcje &#8594;</a>
                </div>
            {/if}
        </div>


        {/if}
    {/if}

    <!-- Wyśrodkowanie -->
    <div class="d-flex justify-content-center">
        <a class="btn btn-success mb-3 text-center" href="http://{$smarty.server.HTTP_HOST}{$subdir}Samochod/add-form">+</a>
    </div>

</div>
</div>


{include file="footer.html.tpl"}