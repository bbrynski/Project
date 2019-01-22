{include file="header.html.tpl"}

<div class="container mt-4 mb-4">
    <div class="row justify-content-around">
        <div class="col-8 align-self-center">
            <h2>Kalkulator raty za twojego nowego Volkswagena</h2>




        <form class="pt-5" action="http://{$smarty.server.HTTP_HOST}{$subdir}Kalkulator/oblicz" method="post">
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Cena Brutto</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control" placeholder="Cena Brutto" name="CenaBrutto" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Liczba rat</label>
                <div class="col-sm-8">
                    <select class="form-control" name="LiczbaRat">
                        <option value="24">24 rat</option>
                        <option value="36">36 rat</option>
                        <option value="48">48 rat</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Wkład własny</label>
                <div class="col-sm-8">
                    <select class="form-control" name="WkladWlasny">
                        <option value="0">0 %</option>
                        <option value="0.05">5 %</option>
                        <option value="0.10">10 %</option>
                        <option value="0.15">15 %</option>
                        <option value="0.20">20 %</option>
                        <option value="0.25">25 %</option>
                        <option value="0.30">30 %</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Roczny limit kilometrów</label>
                <div class="col-sm-8">
                    <select class="form-control" name="Limit">
                        <option value="0.20">20 tysięcy</option>
                        <option value="0.30">30 tysięcy</option>
                        <option value="0.40">40 tysięcy</option>
                    </select>
                </div>
            </div>


            <div class="form-group row">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-success">Oblicz</button>
                </div>
            </div>
        </form>


<h3>Samochód o wartości {$cena} zł możesz mieć już od {$wynik} zł miesięcznie</h3>




        </div>
    </div>
</div>

{include file="footer.html.tpl"}