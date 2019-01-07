{include file="header.html.tpl"}
<div class="container">
    <div class="text-center mt-2">
        <h1>Dodaj Model</h1>
    </div>
    <form id="add_model" action="http://{$smarty.server.HTTP_HOST}{$subdir}KonfiguratorModelu/add" method="post" enctype="multipart/form-data">


        <div class="form-group">
            <label for="name">Nazwa modelu:</label> <input type="text" class="form-control" name="nazwa_model">
        </div>
        <div class="form-group">
            <label for="name">Wersja</label>
            {html_options name=id_wersja options=$wersje  class="form-control"}
        </div>
        <div class="form-group">
            <label for="name">Cena:</label><input type="text" class="form-control" name="cena">
        </div>

        <div class="form-group">
            <label for="name">Foto:</label><input type="file" class="form-control" name="foto">
        </div>

        <button type="submit" name="submit" class="btn btn-secondary">Dodaj</button>
    </form>

</div>

{include file="footer.html.tpl"}