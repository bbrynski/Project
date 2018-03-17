{include file="header.html.tpl"}

<div class="container mt-4 mb-4">
    <div class="row justify-content-around">
        <div class="col-8 align-self-center">
            <h2>Edytuj Pracownika</h2>

            <!-- Zawartość zakładek -->
            <div class="tab-content">
                <div class="tab-pane active" id="1przyciskjust">
                    <form id="edit_pracownik" action="http://{$smarty.server.HTTP_HOST}{$subdir}Pracownik/update" method="post">
                        <div class="form-row">
                            <input type="hidden" id="id" name="id" value="{$id}">
                            <div class="form-group col-md-6">
                                <label for="inputImie">Imie</label>
                                <input type="text" class="form-control" id="inputImie" name="imie"  placeholder="Imie" value="{$imie}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputNazwisko">Nazwisko</label>
                                <input type="text" class="form-control" id="inputNazwisko" name="nazwisko" placeholder="Nazwisko" value="{$nazwisko}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputNr">numer</label>
                                <input type="text" class="form-control" id="inputNr" name="numer" placeholder="numer" value="{$numer}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputKodPocztowy">Kod Pocztowy</label>
                                <input type="text" class="form-control" id="inputKodPocztowy" name="kod" placeholder="Kod Pocztowy" value="{$kod}">
                            </div>
                            <div class="form-group col-md-8">
                                <label for="inputMiejscowosc">Miejscowosc</label>
                                <input type="text" class="form-control" id="inputCity" name="miejscowosc" placeholder="Miejscowość" value="{$miejscowosc}">
                            </div>
                            <div class="form-group col-md-8">
                                <label for="inputUlica">Ulica</label>
                                <input type="text" class="form-control" id="inputUlica" name="ulica" placeholder="Ulica" value="{$ulica}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputNr">Nr domu/lokalu</label>
                                <input type="text" class="form-control" id="inputNr" name="nr" placeholder="Nr domu/lokalu" value="{$nr}">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputTelefon">Telefon</label>
                                <input type="text" class="form-control" id="inputTelefon" name="telefon" placeholder="Telefon" value="{$telefon}">
                            </div>
                        </div>

                        <div class="alert alert-danger collapse" role="alert"></div>

                        <button type="submit" class="btn btn-primary">Dodaj</button>
                    </form>
                
                </div>

            </div>



        </div>
    </div>
</div>

{include file="footer.html.tpl"}