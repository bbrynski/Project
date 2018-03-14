{include file="header.html.tpl"}

<div class="container">
<div class="row">
    <div class="col-sm-6">
        <img src="http://{$smarty.server.HTTP_HOST}{$subdir}images/polo.png" class="img-fluid" alt="Responsive image">
        <h1 class="text-center">Polo</h1>
    </div>
    <div class="col-sm-6">
        <img src="http://{$smarty.server.HTTP_HOST}{$subdir}images/arteon.png" class="img-fluid" alt="Responsive image">
        <h1 class="text-center">Arteon</h1>
    </div>

    <div class="col-sm-6">
        <img src="http://{$smarty.server.HTTP_HOST}{$subdir}images/golf.png" class="img-fluid" alt="Responsive image">
        <h1 class="text-center">Golf</h1>
    </div>
    <div class="col-sm-6">
        <img src="http://{$smarty.server.HTTP_HOST}{$subdir}images/passat.png" class="img-fluid" alt="Responsive image">
        <h1 class="text-center">Passat</h1>
    </div>
</div>

    <div class="d-flex justify-content-center">
        <a class="btn btn-success mb-3 text-center" href="http://{$smarty.server.HTTP_HOST}{$subdir}Samochod/add-form">+</a>
    </div>

</div>


{include file="footer.html.tpl"}