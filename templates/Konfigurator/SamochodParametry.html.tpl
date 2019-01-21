{include file="header.html.tpl"}

<div class="container-fluid mt-5 pb-3">

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

            <style>
                .table-responsive tbody tr {
                    cursor: pointer;
                }
                .table-responsive .table thead tr th {
                    padding-top: 15px;
                    padding-bottom: 15px;
                }
                .table-responsive .table tbody tr td {
                    padding-top: 15px;
                    padding-bottom: 10px;
                }
            </style>



            <h2 class="text-center mb-5">Wybierz silnik</h2>

            <form class="needs-validation2" novalidate action="http://{$smarty.server.HTTP_HOST}{$subdir}Felgi" method="post">

            <div class="table-responsive">
            <table style="table-layout: fixed" class="table table-bordered">
                <thead class="thead-dark">
                <tr>
                    <th colspan="3" class="text-center">Benzyna bezołowiowa</th>
                </tr>
                <tr class="text-center">
                    <th>Pojemność</th>
                    <th>Moc</th>
                    <th>Skrzynia</th>
                </tr>
                </thead>
                <tbody>
                {foreach $silnik as $key => $Wartosc}
                    {if $Wartosc['silnik'] == "Benzynowy"}
                        <tr>
                            <td>
                                <div class="custom-control custom-radio">
                                    <input {if isset($smarty.session.id_SamochodParametry)} {if $Wartosc['id_SamochodParametry'] === $smarty.session.id_SamochodParametry}} checked="checked" {/if} {/if}
                                            type="radio" id="customRadio1{$Wartosc['id_SamochodParametry']}"
                                            name="id_SamochodParametry" class="custom-control-input"
                                            value="{$Wartosc['id_SamochodParametry']}"
                                            required>
                                    <label class="custom-control-label"
                                           for="customRadio1{$Wartosc['id_SamochodParametry']}">{$Wartosc['pojemnosc']}
                                        MPI</label>
                                </div>
                            </td>
                            <td>
                                {$Wartosc['moc']}
                            </td>
                            <td>
                                {$Wartosc['skrzynia']}
                                {if (isset($prawo) && ($prawo == 'admin'))}


                                    <a class="btn btn-danger ml-3"
                                       href="http://{$smarty.server.HTTP_HOST}{$subdir}Silnik/delete/{$Wartosc['id_SamochodParametry']}">Usuń</a>
                                {/if}
                            </td>

                        </tr>
                    {/if}
                {/foreach}
                </tbody>
            </table>

                <table style="table-layout: fixed" class="table table-bordered">

                    <thead class="thead-dark">
                    <tr>
                        <th colspan="3" class="text-center">Olej napędowy</th>
                    </tr>
                    <tr class="text-center">
                        <th>Pojemność</th>
                        <th>Moc</th>
                        <th>Skrzynia</th>
                    </tr>
                    </thead>

                    {foreach $silnik as $key => $Wartosc}
                        {if $Wartosc['silnik'] == "Diesel"}
                            <tr>
                                <td>
                                    <div class="custom-control custom-radio">
                                        <input {if isset($smarty.session.id_SamochodParametry)} {if $Wartosc['id_SamochodParametry'] === $smarty.session.id_SamochodParametry}} checked="checked" {/if} {/if}
                                                type="radio" id="customRadio1{$Wartosc['id_SamochodParametry']}"
                                                name="id_SamochodParametry" class="custom-control-input"
                                                value="{$Wartosc['id_SamochodParametry']}"
                                                required>
                                        <label class="custom-control-label"
                                               for="customRadio1{$Wartosc['id_SamochodParametry']}">{$Wartosc['pojemnosc']}
                                            TDI</label>
                                    </div>
                                </td>
                                <td>
                                    {$Wartosc['moc']}
                                </td>
                                <td>
                                    {$Wartosc['skrzynia']}
                                    {if (isset($prawo) && ($prawo == 'admin'))}


                                        <a class="btn btn-danger ml-3"
                                           href="http://{$smarty.server.HTTP_HOST}{$subdir}Silnik/delete/{$Wartosc['id_SamochodParametry']}">Usuń</a>
                                    {/if}
                                </td>

                            </tr>
                        {/if}
                    {/foreach}

            </table>

            <div class="text-right">
                <button type="submit" class="btn btn-primary">Wybierz &#8594;</button>
            </div>

            <div class="text-left">
                <a class="btn btn-success" href="http://{$smarty.server.HTTP_HOST}{$subdir}WersjeModelu">&#8592;
                    Wersja</a>
            </div>


            </form>
            </div>


        </div>


        <div class="col-4">

            <h2 class="text-center mb-5">Postęp</h2>

            <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: 30%" aria-valuenow="25"
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
                <form id="add_silnik" action="http://{$smarty.server.HTTP_HOST}{$subdir}Silnik/add-2" method="post">

                    <input type="hidden" name="id_zbior_modeli" value="{$smarty.session.id_ZbiorModeli}}">

                    <div class="form-group">
                        <label for="name">Silnik</label>
                        {html_options name=id_jednostka_napedowa options=$selectsilnik  class="form-control"}
                    </div>

                    <button type="submit" name="submit" class="btn btn-secondary">Dodaj silnik do modelu</button>
                </form>

                <div class="text-center mb-2">
                    <a class="btn btn-warning" href="http://{$smarty.server.HTTP_HOST}{$subdir}Silnik/add-form">Utwórz
                        nowy
                        silnik</a>
                </div>
            </div>
        {/if}

    </div>


{include file="footer.html.tpl"}