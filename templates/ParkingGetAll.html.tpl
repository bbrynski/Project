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
            <div class="alert alert-primary" role="alert">

            </div>
        {else}

            <table id="data" class=" table table-hover">
                <thead>
                <tr>
                    <th>Id_Model</th>
                    <th>Dostepne Sztuki</th>
                    <th></th>
                    <th></th>

                </tr>
                </thead>
                <tbody>
                {foreach $parking as $key => $parkingi}
                    <tr>
                        <td>{$parkingi['Id_Model']} </td>
                        <td>{$parkingi['DostepneSztuki']} </td>


                        <td><a class="btn btn-primary" href="http://{$smarty.server.HTTP_HOST}{$subdir}Parking/edit/{$uslug['IdUslugi']}">Edytuj</a></td>
                        <td><a class="btn btn-danger" href="http://{$smarty.server.HTTP_HOST}{$subdir}Parking/delete/{$usluga['IdUslugi']}">Usuń</a></td> </tr>
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