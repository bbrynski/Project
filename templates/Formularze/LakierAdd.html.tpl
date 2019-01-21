{include file="header.html.tpl"}
<div class="container">
    <div class="text-center mt-2">
        <h1>Dodaj nowy lakier</h1>
    </div>
    <form id="add_lakier" action="http://{$smarty.server.HTTP_HOST}{$subdir}Lakier/add" method="post">

        <div class="form-group">
            <label for="name">Nazwa:</label> <input type="text" class="form-control" name="nazwaLakier">
        </div>

        <div class="form-group">
            <label for="name">Foto:</label><input type="file" class="form-control" name="Foto">
        </div>

        <button type="submit" name="submit" class="btn btn-secondary">Dodaj</button>
    </form>

</div>

{include file="footer.html.tpl"}