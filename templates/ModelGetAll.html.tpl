{include file="header.html.tpl"}

<div class="container-fluid mt-5">
    <!-- Zawartość kontenera -->
    <h2 class="text-center mb-5">Dostępne Modele Samochodów</h2>
    {if isset($message)}
        <div class="alert alert-success" role="alert">{$message}</div>
    {/if}
    {if isset($error)}
        <div class="alert alert-danger" role="alert">{$error}</div>
    {/if}
    {if isset($samochody)}
        {if $samochody|@count === 0}
            <div class="alert alert-primary" role="alert">
                Brak Modeli Samochodów w Bazie
            </div>
        {else}

    <div class="container">
            <div class="row">
                {foreach $samochody as $key => $samochod}
                    <div class="col-sm-6">
                        <a href="http://{$smarty.server.HTTP_HOST}{$subdir}Silnik/{$samochod['IdModel']}">
                        <img src="http://{$smarty.server.HTTP_HOST}/{$sciezka}{$samochod['Foto']}" class="img-fluid" alt="Responsive image">
                        <h1 class="text-center">{$samochod['nazwaModel']}</h1>
                        </a>
                        <a type="button" class="btn btn-info DostepnoscModelu" href="http://{$smarty.server.HTTP_HOST}{$subdir}Samochod/Dostepnosc/{$samochod['IdModel']}">Dostepnosc</a>
                    </div>
                {/foreach}
            </div>
        <div class="col-md-3" id="szczegoly">

        </div>

        {/if}
    {/if}

    <!-- Wyśrodkowanie -->
    <div class="d-flex justify-content-center">
        <a class="btn btn-success mb-3 text-center" href="http://{$smarty.server.HTTP_HOST}{$subdir}Samochod/add-form">+</a>
    </div>

</div>
</div>


{include file="footer.html.tpl"}