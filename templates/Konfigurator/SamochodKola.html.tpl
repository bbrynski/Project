{include file="header.html.tpl"}

<div class="container-fluid mt-5 pb-3">

    {if isset($message)}
        <div class="alert alert-success" role="alert">{$message}</div>
    {/if}
    {if isset($error)}
        <div class="alert alert-danger" role="alert">{$error}</div>
    {/if}
    {if isset($felgi)}
        {if $felgi|@count === 0}
            <div class="alert alert-primary" role="alert">
                Brak felg w Bazie
            </div>
        {else}
            <div class="row m-5">
                <div class="col-8">
                    <h2 class="text-center mb-5">Wybierz felgi</h2>


                    <form class="needs-validation2" novalidate
                          action="http://{$smarty.server.HTTP_HOST}{$subdir}Swiatla" method="post">

                        <h4 class="">Obręcze kół - standardowe</h4>
                        {foreach $felgi as $key => $Wartosc}

                            {if {$Wartosc['id_Opcja']} == 1}
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input {if isset($smarty.session.id_SamochodKola)} {if $Wartosc['id_SamochodKola'] === $smarty.session.id_SamochodKola}} checked="checked" {/if} {/if}
                                            class="custom-control-input" type="radio" name="id_SamochodKola"
                                            id="inlineRadio{$Wartosc['id_SamochodKola']}"
                                            value="{$Wartosc['id_SamochodKola']}" required>

                                    <label class="custom-control-label" for="inlineRadio{$Wartosc['id_SamochodKola']}">
                                        <div>
                                            <img src="http://{$smarty.server.HTTP_HOST}/{$sciezka}/Felgi/{$Wartosc['foto']}"
                                                 class="img-fluid" alt="Responsive image">
                                            <p>{$Wartosc['nazwa']}</p>

                                            {if (isset($prawo) && ($prawo == 'admin'))}
                                                <div class="text-center">
                                                    <a class="btn btn-danger"
                                                       href="http://{$smarty.server.HTTP_HOST}{$subdir}Felgi/delete/{$Wartosc['id_SamochodKola']}">Usuń</a>
                                                </div>
                                            {/if}
                                        </div>


                                    </label>
                                </div>
                            {/if}

                        {/foreach}

                        <h4>Obręcze kół - opcjonalne</h4>

                        {foreach $felgi as $key => $Wartosc}

                            {if {$Wartosc['id_Opcja']} == 2}
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input {if isset($smarty.session.id_SamochodKola)} {if $Wartosc['id_SamochodKola'] === $smarty.session.id_SamochodKola}} checked="checked" {/if} {/if}
                                            class="custom-control-input" type="radio" name="id_SamochodKola"
                                            id="inlineRadio{$Wartosc['id_SamochodKola']}"
                                            value="{$Wartosc['id_SamochodKola']}" required>

                                    <label class="custom-control-label" for="inlineRadio{$Wartosc['id_SamochodKola']}">
                                        <div>
                                            <img src="http://{$smarty.server.HTTP_HOST}/{$sciezka}/Felgi/{$Wartosc['foto']}"
                                                 class="img-fluid" alt="Responsive image">
                                            <p>{$Wartosc['nazwa']}</p>


                                            {if (isset($prawo) && ($prawo == 'admin'))}
                                                <div class="text-center">
                                                    <a class="btn btn-danger"
                                                       href="http://{$smarty.server.HTTP_HOST}{$subdir}Felgi/delete/{$Wartosc['id_SamochodKola']}">Usuń</a>
                                                </div>
                                            {/if}

                                        </div>
                                    </label>
                                </div>
                            {/if}


                        {/foreach}


                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Wybierz &#8594;</button>
                        </div>

                        <div class="text-left">
                            <a class="btn btn-success" href="http://{$smarty.server.HTTP_HOST}{$subdir}Silnik">&#8592;
                                Silnik</a>
                        </div>
                    </form>


                </div>


                <div class="col-4">

                    <h2 class="text-center mb-5">Postęp</h2>

                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 45%" aria-valuenow="25"
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
            </div>
        {/if}
    {/if}


    {if (isset($prawo) && ($prawo == 'admin'))}
        <div class="container">
            <form id="add_silnik" action="http://{$smarty.server.HTTP_HOST}{$subdir}Felgi/add" method="post">

                <input type="hidden" name="id_zbior_modeli" value="{$smarty.session.id_ZbiorModeli}}">

                <div class="form-group">
                    <label for="name">Felga</label>
                    {html_options name=id_SamochodKola options=$selectkola  class="form-control"}
                </div>


                <div class="form-group">
                    <label>Wersja</label>
                    <select class="form-control" name="id_opcja">
                        <option value="1">Standardowa</option>
                        <option value="2">Opcjonalna</option>
                    </select>
                </div>

                <button type="submit" name="submit" class="btn btn-secondary">Dodaj felge do modelu</button>
            </form>

            <div class="text-center">
                <a class="btn btn-warning" href="http://{$smarty.server.HTTP_HOST}{$subdir}">Utwórz nową felgę</a>
            </div>
        </div>
    {/if}


</div>


{include file="footer.html.tpl"}