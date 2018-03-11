{include file="header.html.tpl"}

<div class="container mt-4 mb-4">
    <div class="row justify-content-around">
        <div class="col-8 align-self-center">
            <h2>Dodaj Pracownika</h2>

            <!-- Zawartość zakładek -->
            <div class="tab-content">
                <div class="tab-pane active" id="1przyciskjust">
                    <form action="http://{$smarty.server.HTTP_HOST}{$subdir}Pracownik/add" method="post">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputImie">Imie</label>
                                <input type="text" class="form-control" id="inputImie" name="imie"  placeholder="Imie">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputNazwisko">Nazwisko</label>
                                <input type="text" class="form-control" id="inputNazwisko" name="nazwisko" placeholder="Nazwisko">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputNr">numer</label>
                                <input type="text" class="form-control" id="inputNr" name="numer" placeholder="numer">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputKodPocztowy">Kod Pocztowy</label>
                                <input type="text" class="form-control" id="inputKodPocztowy" name="kod" placeholder="Kod Pocztowy">
                            </div>
                            <div class="form-group col-md-8">
                                <label for="inputMiejscowosc">Miejscowosc</label>
                                <input type="text" class="form-control" id="inputCity" name="miejscowosc" placeholder="Miejscowość">
                            </div>
                            <div class="form-group col-md-8">
                                <label for="inputUlica">Ulica</label>
                                <input type="text" class="form-control" id="inputUlica" name="ulica" placeholder="Ulica">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputNr">Nr domu/lokalu</label>
                                <input type="text" class="form-control" id="inputNr" name="nr" placeholder="Nr domu/lokalu">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputTelefon">Telefon</label>
                                <input type="text" class="form-control" id="inputTelefon" name="telefon" placeholder="Telefon">
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