{include file="header.html.tpl"}
<div class="container">
    <div class="text-center mt-2">
        <h1>Dodaj reflektory</h1>
    </div>
    <form id="add_reflektory" action="http://{$smarty.server.HTTP_HOST}{$subdir}Swiatla/add-2" method="post">

        <div class="form-group">
            <label for="name">Nazwa:</label> <input type="text" class="form-control" name="nazwa">
        </div>

        <div class="form-group">
            <label for="name">Foto:</label><input type="file" class="form-control" name="foto">
        </div>

        <button type="submit" name="submit" class="btn btn-secondary">Dodaj</button>
    </form>

</div>

{include file="footer.html.tpl"}