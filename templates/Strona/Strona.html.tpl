{include file="header.html.tpl"}



<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="first-slide"   src="http://{$smarty.server.HTTP_HOST}{$subdir}images/Golf/img.jpg" alt="Golf" width="100%">
            <div class="container">
              <div class="carousel-caption text-left">
                  <h1>Volkswagen Golf</h1>
                  <p>Intrygujący – pod każdym kątem</p>
                  <p><a class="btn btn-lg btn-secondary" href="http://{$smarty.server.HTTP_HOST}{$subdir}Golf" role="button">Dowiedz się więcej</a></p>
              </div>
            </div>
        </div>
        <div class="carousel-item">
            <img class="second-slide" src="http://{$smarty.server.HTTP_HOST}{$subdir}images/Arteon/img.jpg" alt="Arteon" width="100%">
            <div class="container">
                <div class="carousel-caption">
                    <h1>Volkswagen Arteon</h1>
                    <p>Zmysłowy – pod każdym kątem</p>
                    <p><a class="btn btn-lg btn-warning" href="http://{$smarty.server.HTTP_HOST}{$subdir}Arteon" role="button">Dowiedz się więcej</a></p>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img class="third-slide" src="http://{$smarty.server.HTTP_HOST}{$subdir}images/Tiguan/img.jpg" alt="Tiguan" width="100%">
            <div class="container">
                <div class="carousel-caption text-right">
                    <h1>Volkswagen Tiguan</h1>
                    <p>Wszechstronny – pod każdym kątem</p>
                    <p><a class="btn btn-lg btn-dark" href="#" role="button">Dowiedz się więcej</a></p>
                </div>
            </div>
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

<div class="div1 p-5">
    <img src="http://{$smarty.server.HTTP_HOST}{$subdir}images/img.png" alt="Notebook" style="width:100%;">
    <div class="div2">
        <h1>Nowy Volkswagen T-Cross</h1>
        <p>Premiera już 25.01.2019</p>
    </div>
</div>

<div class="div1 p-5">
    <img  src="http://{$smarty.server.HTTP_HOST}{$subdir}images/img(2).png" width="100%" alt="Auto takie jak Ty">
    <div class="div3">
        <h1>Auto takie jak Ty</h1>
        <p></p>
    </div>
</div>









<div class="text-center">
    <img src="http://{$smarty.server.HTTP_HOST}{$subdir}images/Konfigurator.png" alt="Konfigurator">
    <h2>Nie czekaj dłużej</h2>
    <p>Skorzystaj z konfiguratora i zaprojektuj
        swojego wymarzonego Volkswagena.<p><a class="btn btn-secondary" href="http://{$smarty.server.HTTP_HOST}{$subdir}Samochod" role="button">Przejdź do konfiguratora</a></p>
</div>

{include file="footer.html.tpl"}
