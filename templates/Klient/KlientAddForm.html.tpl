{include file="header.html.tpl"}

<div class="container mt-4 mb-4">
    <div class="row justify-content-around">
        <div class="col-8 align-self-center">
            <h2>Dodaj Klienta</h2>

            <div class="row justify-content-around">
                <!-- Zakładki -->
                <ul class="nav nav-pills nav-justified " role="tablist">
                    <li class="active"><a class="btn btn-primary active " href="#1przyciskjust" role="tab" data-toggle="tab">Osoba Prywatna</a></li>
                    <li><a class="btn btn-primary ml-3" href="#2przyciskjust" role="tab" data-toggle="tab">Firma</a></li>
                </ul>
            </div>

            <!-- Zawartość zakładek -->
            <div class="tab-content">
                <div class="tab-pane active" id="1przyciskjust">
                    <form id="add_klient" action="http://{$smarty.server.HTTP_HOST}{$subdir}Klient/add" method="post">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputImie">Imie</label>
                                <input type="text" class="form-control" id="inputImie" name="imie"  placeholder="Imie">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputNazwisko">Nazwisko</label>
                                <input type="text" class="form-control" id="inputNazwisko" name="nazwisko" placeholder="Nazwisko">
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
                                <label for="inputEmail">Email</label>
                                <input type="text" class="form-control" id="inputEmail" name="email"  placeholder="Telefon">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputTelefon">Telefon</label>
                                <input type="text" class="form-control" id="inputTelefon" name="telefon" placeholder="Telefon">
                            </div>
                        </div>

                        <div class="alert alert-danger collapse" role="alert"></div>

                        <button type="submit" class="btn btn-primary">Dodaj</button>
                    </form>
                </div>
                <div class="tab-pane" id="2przyciskjust">
                    <form id="add_klient2" action="http://{$smarty.server.HTTP_HOST}{$subdir}Klient/add" method="post">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputImie">Imie</label>
                                <input type="text" class="form-control" id="inputImie" name="imie"  placeholder="Imie">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputNazwisko">Nazwisko</label>
                                <input type="text" class="form-control" id="inputNazwisko" name="nazwisko" placeholder="Nazwisko">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputFirma">Firma</label>
                                <input type="text" class="form-control" id="inputFirma" name="firma"  placeholder="Firma">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputNip">Nip</label>
                                <input type="text" class="form-control" id="inputNip" name="nip" placeholder="Nip">
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
                                <label for="inputEmail">Email</label>
                                <input type="text" class="form-control" id="inputEmail" name="email"  placeholder="Telefon">
                            </div>
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