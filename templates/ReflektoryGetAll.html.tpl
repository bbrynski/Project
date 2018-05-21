{include file="header.html.tpl"}

<div class="container-fluid mt-5">

    {if isset($message)}
        <div class="alert alert-success" role="alert">{$message}</div>
    {/if}
    {if isset($error)}
        <div class="alert alert-danger" role="alert">{$error}</div>
    {/if}
    {if isset($reflektory)}
        {if $reflektory|@count === 0}
            <div class="alert alert-primary" role="alert">
                Brak Silników w Bazie
            </div>
        {else}


    <div class="row">
        <div class="col-8">
            <h2 class="text-center mb-5">Dostępne Opcje</h2>
            <form id="wyposazenie" action="http://{$smarty.server.HTTP_HOST}{$subdir}Podsumowanie" method="post">




                            Reflektory:
                            {html_options class="form-control input" name=reflektory id=reflektory options=$reflektory}



                            Rozmiar kół:
                            {html_options class="form-control input" name=kola id=kola options=$kola}




                    <input class="mt-4" type="checkbox" name="opcje[]" value="PodgrzewaneSiedzenia"><label>Podgrzewane siedzenia</label><br/>
                    <input type="checkbox" name="opcje[]" value="PodgrzewanaSzybaPrzod"><label>Podgrzewana szyba przednia</label><br/>
                    <input type="checkbox" name="opcje[]" value="DodatkowyKompletOpon"><label>Dodatkowy komplet opon</label><br/>
                    <input type="checkbox" name="opcje[]" value="SkorzanaTapicerka"><label>Skórzana tapicerka</label><br/>

                    {/if}
                    {/if}




        </div>
        <div class="col-4">

            <h2 class="text-center mb-5">Postęp</h2>

            <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
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
                    <h4>Napęd: {$naped['nazwaNaped']}</h4>
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
                    <h2>test</h2>
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
            <a class="btn btn-success ml-5" href="http://{$smarty.server.HTTP_HOST}{$subdir}Naped/{$smarty.session.idlakier}">&#8592; Naped</a>
        </div>
        {if isset($smarty.session.idnaped)}
            <div class="text-right">
                <input class="btn btn-success mr-5" type="submit" value="Podsumowanie" />
            </div>
        {/if}
    </div>







    </div>
    </form>
</div>


{include file="footer.html.tpl"}