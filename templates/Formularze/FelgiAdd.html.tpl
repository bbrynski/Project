{include file="header.html.tpl"}
<div class="container">
    <div class="text-center mt-2">
        <h1>Dodaj silnik</h1>
    </div>
    <form id="add_silnik" action="http://{$smarty.server.HTTP_HOST}{$subdir}Silnik/add" method="post">

        <div class="form-group">
            <label for="name">Pojemnosc:</label> <input type="text" class="form-control" name="pojemnosc">
        </div>
        <div class="form-group">
            <label>Rodzaj:</label>
            <select class="form-control" name="rodzaj">
                <option value="Benzynowy">Benzynowy</option>
                <option value="Diesel">Diesel</option>
            </select>
        </div>
        <div class="form-group">
            <label for="name">Moc:</label><input type="text" class="form-control" name="moc">
        </div>
        <div class="form-group">
            <label>Skrzynia:</label>
            <select class="form-control" name="skrzynia">
                <option value="manualna">manualna</option>
                <option value="automatyczna">automatyczna</option>
            </select>
        </div>
        <div class="form-group">
            <label for="name">Cena:</label><input type="text" class="form-control" name="cena">
        </div>

        <button type="submit" name="submit" class="btn btn-secondary">Dodaj</button>
    </form>

</div>

{include file="footer.html.tpl"}