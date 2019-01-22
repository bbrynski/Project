{include file="header.html.tpl"}

<div class="container-fluid mt-5">
    <!-- Zawartość kontenera -->
    <h2 class="text-center">Parking</h2>
    {if isset($message)}
        <div class="alert alert-success" role="alert">{$message}</div>
    {/if}
    {if isset($error)}
        <div class="alert alert-danger" role="alert">{$error}</div>
    {/if}




    {if isset($parkingi)}
        {if $parkingi|@count === 0}
            <div class="alert alert-danger" role="alert">
    Brak dostępnych pojazdów
            </div>
        {else}



            <table id="data" class=" table table-hover">
                <thead>
                <tr>
                    <th>Nazwa Modelu</th>
                    <th>Dostepne Sztuki</th>
                    <th></th>
                    <th></th>
                    

                </tr>
                </thead>
                <tbody>
                {foreach $parkingi as $key => $parking}
                    <tr>
                        {foreach $samochody as $key => $samochod}
                            {if {$samochod['id_ZbiorModeli']}=={$parking['id_ZbiorModeli']}}
                                <td>{$samochod['nazwa']}, {$samochod['wersja_nazwa']}, {$samochod['cena']}zł </td>
                            {/if}
                        {/foreach}

                        <td>{$parking['DostepneSztuki']} </td>

                     <td><a class="btn btn-primary" href="http://{$smarty.server.HTTP_HOST}{$subdir}Parking/edit/{$parking['IdParking']}">Edytuj</a></td>
                     <td><a class="btn btn-danger" href="http://{$smarty.server.HTTP_HOST}{$subdir}Parking/delete/{$parking['IdParking']}">Usuń</a></td> </tr>



                         {/foreach}
                </tbody>
            </table>





        {/if}
    {/if}

    <!-- Wyśrodkowanie -->
    {if $smarty.session.prawo == 'admin'}

        <div class="text-center">
            <a class="btn btn-success m-3" href="http://{$smarty.server.HTTP_HOST}{$subdir}Parking/add-form">Dodaj</a>
        </div>

    {/if}


</div>
</div>
</div>



{include file="footer.html.tpl"}