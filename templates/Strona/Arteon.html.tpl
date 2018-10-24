{include file="header.html.tpl"}

<h1 class="display-3 text-center">Volkswagen Arteon</h1>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item tmp active">
            <img class="first-slide"   src="http://{$smarty.server.HTTP_HOST}{$subdir}images/Arteon/1.jpg" width="100%">
        </div>
        <div class="carousel-item tmp">
            <img class="second-slide" src="http://{$smarty.server.HTTP_HOST}{$subdir}images/Arteon/2.jpg"  width="100%">
        </div>
        <div class="carousel-item tmp">
            <img class="third-slide" src="http://{$smarty.server.HTTP_HOST}{$subdir}images/Arteon/3.jpg"  width="100%">
        </div>
        <div class="carousel-item tmp">
            <img class="fourth-slide" src="http://{$smarty.server.HTTP_HOST}{$subdir}images/Arteon/4.jpg"  width="100%">
        </div>
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>


<div class="p-5">
    <div class="row">
        <div class="col-md-4 text-center">
            <img src="http://{$smarty.server.HTTP_HOST}{$subdir}images/Inne/1.jpg" width="100%">
            <h6 class="mt-3">Zakup</h6>
            <h3>Rabat do 16 000 zł</h3>
            <p>Kupując Golfa z rocznika 2018 na dzień dobry otrzymujesz rabat do 16 000 zł.</p>
        </div>
        <div class="col-md-4 text-center">
            <img src="http://{$smarty.server.HTTP_HOST}{$subdir}images/Inne/2.jpg" width="100%">
            <h6 class="mt-3">Eksploatacja</h6>
            <h3>Oszczędność czasu i pieniędzy</h3>
            <p>Podczas użytkowania oszczędzasz na paliwie. Oszczędzasz też czas i pieniądze, bo przeglądy robisz nawet co 30000km.</p>
        </div>
        <div class="col-md-4 text-center">
            <img src="http://{$smarty.server.HTTP_HOST}{$subdir}images/Inne/3.jpg" width="100%">
            <h6 class="mt-3">Sprzedaż</h6>
            <h3>Wysoka wartość odsprzedaży</h3>
            <p>Na koniec sprzedasz go korzystnie, bo dobrze trzyma swoją wartość.</p>
        </div>
    </div>

    <hr>

</div>


<div class="carousel-inner pl-5 pr-5">
    <div class="carousel-item active">
        <img  src="http://{$smarty.server.HTTP_HOST}{$subdir}images/Golf/img2.jpg" width="100%" alt="Nowy Volkswagen T-Cross">
        <div class="container">
            <div class="carousel-caption text-left">
                <h1> Już od 548 zł/mc</h1>
                <h3>Skorzystaj z kalkulatora i oblicz ratę.</h3>
                <p><a class="btn btn-lg btn-success" href="http://{$smarty.server.HTTP_HOST}{$subdir}Golf" role="button">Kalkulator</a></p>
            </div>
        </div>
    </div>
</div>


<div class="row p-5">
    <div class="col-md-6">
       <img src="http://{$smarty.server.HTTP_HOST}{$subdir}images/Golf/img3.jpg" width="100%">
    </div>
    <div class="col-md-6">
        <div class="pt-5 m-5">
            <h6>Wygląd zewnętrzny.</h6>
            <h3>Elegancki towarzysz.</h3>
            <p>Golf już od pierwszego spojrzenia zachwyca wyglądem - wrażenie robią zarówno nowo zaprojektowane reflektory i zderzaki, dynamiczny grill chłodnicy, jak i tylny dyfuzor oraz wyjątkowy panel LED-owych świateł tylnych. </p>
        </div>
    </div>
</div>

{include file="footer.html.tpl"}
