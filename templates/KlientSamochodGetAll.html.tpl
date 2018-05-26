{include file="header.html.tpl"}

<div class="container mt-4 mb-4">
    <div class="row justify-content-around">
        <div class="col-10 align-self-center">
            <div class="d-flex justify-content-center">
                <h2>Lista samochodów</h2>
            </div>

            {if isset($samochody)}
                {if $samochody|@count === 0}
                    <b>Brak powiązanych samochodów w bazie!</b><br/><br/>
                {else}
                    
                    <table id="data" class="display table table-hover">
                        <thead>
                        <tr>
                            <th>Model</th>
                            <th>Rok produkcji</th>
                            <th>Lakier</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        {foreach $samochody as $samochod}
                            <tr>
                                <td>{$samochod['Model']}</td>
                                <td>{$samochod['Rok_produkcji']} </td>
                                <td>{$samochod['Kolor_lakieru']}</td>
                                <td> <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample{$samochod['Id_KlientSamochod']}" role="button" aria-expanded="false" aria-controls="collapseExample">Szczegóły</a></td>
                                <div class="collapse" id="collapseExample{$samochod['Id_KlientSamochod']}">
                                    <div class="card card-body">
                                        {foreach $uslugi as $usluga}
                                            {$usluga['nazwaUsluga']}
                                            {$usluga['Cena']}zł
                                            {$usluga['Opis']}
                                        {/foreach}

                                    </div>
                                </div>
                            </tr>
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