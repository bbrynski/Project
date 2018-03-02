{include file="header.html.tpl"}

<div class="container mt-4 mb-4">
    <div class="row justify-content-around">
        <div class="col-10 align-self-center">
            <h2>Edytuj klienta nr {$id} </h2>
            <form id="edit_klient" action="http://{$smarty.server.HTTP_HOST}{$subdir}Klient/update" method="post">
                <div class="form-row">
                    <input type="hidden" id="id" name="id" value="{$id}">
                    <div class="form-group col-md-6">
                        <label for="inputImie">Imie</label>
                        <input type="text" class="form-control" id="inputImie" name="imie" value="{$imie}" placeholder="Imie">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputNazwisko">Nazwisko</label>
                        <input type="text" class="form-control" id="inputNazwisko" name="nazwisko" value="{$nazwisko}" placeholder="Nazwisko">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputFirma">Firma*</label>
                        <input type="text" class="form-control" id="inputFirma" name="firma" value="{$firma}" placeholder="Firma*">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputNip">Nip*</label>
                        <input type="text" class="form-control" id="inputNip" name="nip" value="{$nip}" placeholder="Nip*">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputKodPocztowy">Kod Pocztowy</label>
                        <input type="text" class="form-control" id="inputKodPocztowy" name="kod" value="{$kod}" placeholder="Kod Pocztowy">
                    </div>
                    <div class="form-group col-md-8">
                        <label for="inputMiejscowosc">Miejscowosc</label>
                        <input type="text" class="form-control" id="inputCity" name="miejscowosc" value="{$miejscowosc}" placeholder="Miejscowość">
                    </div>
                    <div class="form-group col-md-8">
                        <label for="inputUlica">Ulica</label>
                        <input type="text" class="form-control" id="inputUlica" name="ulica" value="{$ulica}" placeholder="Ulica">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputNr">Nr domu/lokalu</label>
                        <input type="text" class="form-control" id="inputNr" name="nr" value="{$nr}" placeholder="Nr domu/lokalu">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail">Email</label>
                        <input type="text" class="form-control" id="inputEmail" name="email" value="{$email}" placeholder="Telefon">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputTelefon">Telefon</label>
                        <input type="text" class="form-control" id="inputTelefon" name="telefon" value="{$telefon}" placeholder="Telefon">
                    </div>
                </div>


                <button type="submit" class="btn btn-primary">Aktualizuj</button>
            </form>
        </div>
    </div>
</div>

{include file="footer.html.tpl"}
