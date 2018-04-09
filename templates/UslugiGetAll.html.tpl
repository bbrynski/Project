{include file="header.html.tpl"}

<div class="container-fluid mt-5">
    <!-- Zawartość kontenera -->
    <h2 class="text-center">Usługi</h2>
    {if isset($message)}
        <div class="alert alert-success" role="alert">{$message}</div>
    {/if}
    {if isset($error)}
        <div class="alert alert-danger" role="alert">{$error}</div>
    {/if}
    {if isset($uslugi)}
        {if $uslugi|@count === 0}
            <div class="alert alert-primary" role="alert">
                Brak usług
            </div>
        {else}
                    
                    <table id="data" class=" table table-hover">
                        <thead>
                        <tr>
                            <th>Nazwa Usługi</th>
                            <th>Cena</th>
                            <th></th>
                            <th></th>

                        </tr>
                        </thead>
                        <tbody>
                        {foreach $uslugi as $key => $usluga}
                            <tr>
                                <td>{$usluga['nazwaUsluga']} </td>
                                <td>{$usluga['Cena']} </td>


                                <td><a class="btn btn-primary" href="http://{$smarty.server.HTTP_HOST}{$subdir}Uslugi/edit/{$usluga['IdUslugi']}">Edytuj</a></td>
                                <td><a class="btn btn-danger" href="http://{$smarty.server.HTTP_HOST}{$subdir}Uslugi/delete/{$usluga['IdUslugi']}">Usuń</a></td> </tr>
                        {/foreach}
                        </tbody>
                    </table>



                {/if}
            {/if}

    <!-- Wyśrodkowanie -->
    <div class="d-flex justify-content-center">
        <a class="btn btn-success mb-3" href="http://{$smarty.server.HTTP_HOST}{$subdir}Uslugi/add-form/">Dodaj Usługe</a>
    </div>


        </div>
    </div>
</div>



{include file="footer.html.tpl"}