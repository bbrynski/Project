{include file="header.html.tpl"}

<div class="container-fluid mt-5" xmlns="http://www.w3.org/1999/html">
    <!-- Zawartość kontenera -->
    <h2 class="text-center mb-5">Wczytaj konfiguracje samochodu</h2>


    <!-- Wyśrodkowanie -->
    <div class="d-flex justify-content-center">

        <form id="konfiguratorWczytaj" action="http://{$smarty.server.HTTP_HOST}{$subdir}Konfigurator/wczytaj" method="post" >
            <input id="numer" name="numer" type="text" placeholder="Numer">

            <input class="btn btn-primary" type="submit" value="Wyślij">
        </form>




    </div>



    </div>


    <div class="d-flex justify-content-center">
        <a class="btn btn-success m-5 text-center" href="http://{$smarty.server.HTTP_HOST}{$subdir}Samochod">Nowa Konfiguracja</a>
    </div>

</div>
</div>


{include file="footer.html.tpl"}