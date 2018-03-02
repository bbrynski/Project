{include file="header.html.tpl"}

<div class="container mt-4 mb-4">
    <div class="row justify-content-around">
        <div class="col-10 align-self-center">
            <div class="d-flex justify-content-center">
                <h2>Lista Klientów</h2>
            </div>
            <a class="btn btn-success mb-3" href="http://{$smarty.server.HTTP_HOST}{$subdir}Klient/add-form">Dodaj Klienta</a>
            {if isset($message)}
                <div class="alert alert-success" role="alert">{$message}</div>
            {/if}
            {if isset($error)}
                <div class="alert alert-danger" role="alert">{$error}</div>
            {/if}
            {if isset($klienci)}
                {if $klienci|@count === 0}
                    <b>Brak klientów w bazie!</b><br/><br/>
                {else}

                    <table id="data" class="display table table-hover">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Imie</th>
                            <th>Nazwisko</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        {foreach $klienci as $key => $klient}
                            <tr>
                                <td>{$klient['Id_Klient']}</td>
                                <td>{$klient['Imie']} </td>
                                <td>{$klient['Nazwisko']}</td>


                                <td><a class="btn btn-primary" href="http://{$smarty.server.HTTP_HOST}{$subdir}Klient/edit/{$klient['Id_Klient']}">Edytuj</a></td>
                                <td><a class="btn btn-danger" href="http://{$smarty.server.HTTP_HOST}{$subdir}Klient/delete/{$klient['Id_Klient']}">Usuń</a></td> </tr>
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
            {if isset($error)}
                <strong>{$error}</strong>
            {/if}

        </div>
    </div>
</div>



{include file="footer.html.tpl"}