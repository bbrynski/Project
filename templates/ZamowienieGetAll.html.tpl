{include file="header.html.tpl"}

<div class="container-fluid mt-5">
    <!-- Zawartość kontenera -->
    <h2 class="text-center">Zamówienia</h2>
    {if isset($message)}
        <div class="alert alert-success" role="alert">{$message}</div>
    {/if}
    {if isset($error)}
        <div class="alert alert-danger" role="alert">{$error}</div>
    {/if}
    {if isset($zamowienia)}
    {if $zamowienia|@count === 0}
    <div class="alert alert-primary" role="alert">
        Brak zamowień
    </div>
    {else}

            <table id="data" class=" table table-hover">
                <thead>
                <tr>
                    <th>IdZamowienia</th>
                    <th>Id_Klient</th>
                    <th>Id_Pracownik</th>
                    <th>Id_Model</th>
                    <th>DataZamow</th>
                    <th>NumerZamowienia</th>
                    <th>Status</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                {foreach $zamowienia as $key => $zamowienie}
                    <tr>
                        <td>{$zamowienie['IdZamowienie']} </td>
                        <td>{$zamowienie['Id_Klient']}</td>
                        <td>{$zamowienie['Id_Pracownik']} </td>
                        <td>{$zamowienie['IdModel']} </td>
                        <td>{$zamowienie['Data_Zamowienia']} </td>
                        <td>{$zamowienie['NumerZamowienia']} </td>
                        <td>{$zamowienie['Statuszamowienia']} </td>

                        <td><a class="btn btn-primary" href="http://{$smarty.server.HTTP_HOST}{$subdir}Zamowienie/edit-form/{$zamowienie['IdZamowienie']}">Edytuj</a></td>
                        <td><a class="btn btn-danger" href="http://{$smarty.server.HTTP_HOST}{$subdir}Zamowienie/delete/{$zamowienie['IdZamowienie']}">Usuń</a></td> </tr>
                {/foreach}
                </tbody>
            </table>


            <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="col-md-6">
                                <h4 id="szczegoly"></h4>
                                <ul class="list-group"></ul>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                </div>
            </div>
        {/if}
    {/if}

    <!-- Wyśrodkowanie -->
    <div class="d-flex justify-content-center">
        <a class="btn btn-success mb-3" href="http://{$smarty.server.HTTP_HOST}{$subdir}Zamowienie/add-form/">Dodaj Zamowienie</a>
    </div>

        </div>
    </div>
</div>



{include file="footer.html.tpl"}