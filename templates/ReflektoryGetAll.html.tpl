{include file="header.html.tpl"}

<div class="container-fluid mt-5" xmlns="http://www.w3.org/1999/html">
    <!-- Zawartość kontenera -->
    <h2 class="text-center mb-5">Dodatkowe opcje</h2>
    {if isset($message)}
        <div class="alert alert-success" role="alert">{$message}</div>
    {/if}
    {if isset($error)}
        <div class="alert alert-danger" role="alert">{$error}</div>
    {/if}
    {if isset($reflektory)}
        {if $reflektory|@count === 0}
            <div class="alert alert-primary" role="alert">
                Brak Silników w Bazie
            </div>
        {else}

    <form id="wyposazenie" action="http://{$smarty.server.HTTP_HOST}{$subdir}Podsumowanie" method="post">
    <div class="container">
            <div class="row">


                    <div class="col-sm-6">
                        Reflektory:
                        {html_options class="form-control input" name=reflektory id=reflektory options=$reflektory}
                    </div>

                <div class="col-sm-6">
                    Rozmiar kół:
                    {html_options class="form-control input" name=kola id=kola options=$kola}
                </div>
            </div>


        <input type="checkbox" name="opcje[]" value="PodgrzewaneSiedzenia"><label>Podgrzewane siedzenia</label><br/>
        <input type="checkbox" name="opcje[]" value="PodgrzewanaSzybaPrzod"><label>Podgrzewana szyba przednia</label><br/>
        <input type="checkbox" name="opcje[]" value="DodatkowyKompletOpon"><label>Dodatkowy komplet opon</label><br/>
        <input type="checkbox" name="opcje[]" value="SkorzanaTapicerka"><label>Skórzana tapicerka</label><br/>
        {$smarty.server.HTTP_HOST}{$subdir}Podsumowanie/
        {/if}
    {/if}

    <!-- Wyśrodkowanie -->
    <div class="d-flex justify-content-center">
       <input class="btn btn-success m-5 text-center" type="submit" value="Dalej" />
    </div>


    </div>
    </form>
</div>


{include file="footer.html.tpl"}