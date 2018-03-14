{include file="header.html.tpl"}
<div class="container">
    <div class="page-header">
        <h1>Dodaj Model</h1>
    </div>
    <form id="addModel"  action="http://{$smarty.server.HTTP_HOST}{$subdir}Samochod/wstaw" method="post" enctype="multipart/form-data">


        <div class="form-group">
            <label for="name">Nazwa modelu:</label> <input type="text" class="form-control" name="nazwaModel" >
        </div>
        <div class="form-group">
            <label for="name">Cena:</label><input type="text" class="form-control" name="cena" >
        </div>
        <div class="form-group">
            <label for="name">Silnik</label>
            {html_options name=Id_Silnik options=$Silnik class="form-control"}
        </div>
        <div class="form-group">
            <label for="name">Skrzynia</label>
            {html_options name=Id_Skrzynia options=$Skrzynia  class="form-control"}
        </div>
        <div class="form-group">
            <label for="name">Naped</label>
            {html_options name=Id_Naped options=$Naped  class="form-control"}
        </div>
        <div class="form-group">
            <label for="name">pojemnosc:</label><input type="text" class="form-control" name="pojemnosc" >
        </div>
        <div class="form-group">
            <label for="name">Maksymalna Moc:</label><input type="text" class="form-control" name="MaxMoc" >
        </div>
        <div class="form-group">
            <label for="name">Foto:</label><input type="file" class="form-control" name="Foto" >
        </div>
        <div class="form-group">
            <label for="name">Lakier</label>
            {html_options name=Id_Lakier options=$Lakier  class="form-control"}
        </div>
        <div class="form-group">
            <label for="name">LakierNadwozia:</label><input type="text" class="form-control" name="LakierNadwozia" >
        </div>



        <button type="submit" name="submit" class="btn btn-default">Dodaj</button>
    </form>







    {if isset($error)}
        <strong>{$error}</strong>
    {/if}

</div>

{include file="footer.html.tpl"}