{include file="header.html.tpl"}

<div class="container-fluid mt-5">
    <!-- Zawartość kontenera -->
    <h2 class="text-center">Usługi Klientów</h2>
    {if isset($message)}
        <div class="alert alert-success" role="alert">{$message}</div>
    {/if}
    {if isset($error)}
        <div class="alert alert-danger" role="alert">{$error}</div>
    {/if}
    {if isset($uslugiKlient)}
        {if $uslugiKlient|@count === 0}
            <div class="alert alert-primary" role="alert">
                Brak usług Klientów
            </div>
        {else}

            <table id="data" class=" table table-hover">
                <thead>
                <tr>
                    <th>Model</th>
                    <th>Usługa</th>
                    <th>Klient</th>
                    <th>Opis</th>
                    <th></th>
                    <th></th>

                </tr>
                </thead>
                <tbody>
                {foreach $uslugiKlient as $key => $uslugaKlient}
                    <tr>

                        {foreach $samochody as $key => $samochod}
                            {if {$uslugaKlient['IdModel']}=={$samochod['IdModel']}}
                                <td>{$samochod['nazwaModel']}  </td>
                            {/if}
                        {/foreach}

                        {foreach $uslugi as $key => $usluga}
                            {if {$uslugaKlient['IdUslugi']}=={$usluga['IdUslugi']}}
                                <td>{$usluga['nazwaUsluga']}  </td>
                            {/if}
                        {/foreach}

                        {foreach $klienci as $key => $klient}
                            {if {$uslugaKlient['IdKlient']}=={$klient['Id_Klient']}}
                                <td>{$klient['Imie']}  {$klient['Nazwisko']} </td>
                            {/if}
                        {/foreach}

                        <td>{$uslugaKlient['Opis']} </td>

                        <td><a class="btn btn-primary" href="http://{$smarty.server.HTTP_HOST}{$subdir}UslugiKlient/edit/{$uslugaKlient['IdUslugaKlient']}">Edytuj</a></td>
                        <td><a class="btn btn-danger" href="http://{$smarty.server.HTTP_HOST}{$subdir}UslugiKlient/delete/{$uslugaKlient['IdUslugaKlient']}">Usuń</a></td> </tr>
                {/foreach}
                </tbody>
            </table>


        {/if}
    {/if}

    <!-- Wyśrodkowanie -->
    <div class="d-flex justify-content-center">
        <a class="btn btn-success mb-3" href="http://{$smarty.server.HTTP_HOST}{$subdir}UslugiKlient/add-form/">Dodaj</a>
    </div>


</div>
</div>
</div>



{include file="footer.html.tpl"}