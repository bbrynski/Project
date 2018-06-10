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

    {if $smarty.session.prawo == 'admin'}

        <div class="text-center">
            <a class="btn btn-success m-3" href="http://{$smarty.server.HTTP_HOST}{$subdir}Parking/add-form">Dodaj</a>
        </div>

    {/if}


    {if isset($parkingi)}
        {if $parkingi|@count === 0}
            <div class="alert alert-primary" role="alert">

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
                            {if {$samochod['IdModel']}=={$parking['IdModel']}}
                                <td>{$samochod['nazwaModel']}  </td>
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



</div>
</div>
</div>



{include file="footer.html.tpl"}