{include file="header.html.tpl"}

<div class="container mt-4 mb-4">

    <div class="d-flex justify-content-center">
        <h2>Wydawanie samochodow</h2>
    </div>


    {if isset($message)}
        <div class="alert alert-success" role="alert">{$message}</div>
    {/if}

    {if isset($error)}
        <div class="alert alert-danger" role="alert">{$error}</div>
    {/if}

    {if isset($odbiory)}
        {if $odbiory|@count === 0}
            <b>Brak samochodów do przygotowania!</b>
            <br/>
            <br/>
        {else}
            <div class="container col-md-8">
            <div class="form-group">
                    <form id="add_odbior" action="http://{$smarty.server.HTTP_HOST}{$subdir}Odbior/add" method="post">

                        {if (!isset($prawo) && !isset($idUzytkownik))  || (isset($prawo) && ($prawo == 'admin'))}
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputImie">Imie</label>
                                <input type="text" class="form-control" id="inputImie" name="imie" placeholder="Imie">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputNazwisko">Nazwisko</label>
                                <input type="text" class="form-control" id="inputNazwisko" name="nazwisko"
                                       placeholder="Nazwisko">
                            </div>
                            {/if}
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputNumerZamowienia">Numer zamówienia</label>
                                <input type="text" class="form-control" id="inputNumerZamowienia" name="numer"
                                       placeholder="Numer zamówienia">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputData">Data odbioru</label>
                                <input type="date" class="form-control" id="inputData" name="data" placeholder="Data">
                            </div>
                        </div>


                            <button type="submit" class="btn btn-primary">Dodaj</button>
                    </form>
            </div>
            </div>
            {if (isset($prawo) && ($prawo == 'admin' || $prawo == 'pracownik'))}
                <table id="data" class="display table table-hover">
                    <thead>
                    <tr>
                        <th>Klient</th>
                        <th>Telefon</th>
                        <th>Data odbioru</th>
                        <th>Numer zamówienia</th>

                        <th></th>
                    </tr>
                    </thead>
                    <tbody>


                    {foreach $odbiory as $key => $odbior}
                    {if ($odbior['Odebrano']==0)}
                    <tr>
                        {else}
                    <tr id="odebrano">
                        {/if}
                        <td>{$odbior['Nazwisko']} {$odbior['Imie']} </td>
                        <td>{$odbior['Telefon']}</td>
                        <td>{$odbior['Data']}</td>
                        <td>{$odbior['Numer_Zamowienia']}</td>
                        {if ($odbior['Odebrano']==0)}
                            <td><a class="btn btn-secondary"
                                   href="http://{$smarty.server.HTTP_HOST}{$subdir}Odbior/edytuj/{$odbior['Id_Odbior']}">Ukończ</a>
                            </td>
                        {else}
                            <td> odebrano</td>
                        {/if}
                        {/foreach}
                    </tbody>
                </table>
            {/if}
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

    {if isset($error)}
        <strong>{$error}</strong>
    {/if}

</div>
{include file="footer.html.tpl"}