{include file="header.html.tpl"}
<div class="container mb-5">
    <div class="page-header m-4">
        <h1>Dodaj Zamówienie</h1>
    </div>
    <form id="addModel"  action="http://{$smarty.server.HTTP_HOST}{$subdir}Zamowienie/wstaw" method="post" enctype="multipart/form-data">


        <div class="form-group">
            <label for="name">Klient</label>
            <select class="form-control" id="Id_Klient" name="Id_Klient">
                {foreach $klienci as $key => $klient}
                    <option value="{$klient['Id_Klient']}">{$klient['Imie']} {$klient['Nazwisko']}</option>
                {/foreach}
            </select>
        </div>

        <div class="form-group">
            <label for="name">Pracownik</label>
            <select class="form-control" id="Id_Pracownik" name="Id_Pracownik">
                {foreach $pracownicy as $key => $praconik}
                    <option value="{$praconik['Id_Pracownik']}">{$praconik['Imie']} {$praconik['Nazwisko']}</option>
                {/foreach}
            </select>
        </div>

        <div class="form-group">
            <label for="name">Model</label>
            <select class="form-control" id="IdModel" name="IdModel">
                {foreach $samochody as $key => $samochod}
                    <option value="{$samochod['IdModel']}">{$samochod['nazwaModel']} {$samochod['Cena']}</option>
                {/foreach}
            </select>
        </div>

        <div class="form-group">
            <label for="name">Data:</label> <input type="text" class="form-control" name="Data_Zamowienia" >
        </div>
        <div class="form-group">
            <label for="name">Statuszamowienia:</label><input type="text" class="form-control" name="Statuszamowienia" >
        </div>




        <button type="submit" name="submit" class="btn btn-default">Dodaj</button>
    </form>







    {if isset($error)}
        <strong>{$error}</strong>
    {/if}

</div>

{include file="footer.html.tpl"}