{include file="header.html.tpl"}

<div class="container-fluid mt-5">
    <!-- Zawartość kontenera -->
    <h2 class="text-center mb-5">Status Zamówienia Samochodu</h2>
    {if isset($message)}
        <div class="alert alert-success" role="alert">{$message}</div>
    {/if}
    {if isset($error)}
        <div class="alert alert-danger" role="alert">{$error}</div>
    {/if}
    {if isset($Zamowienie)}
    {if $Zamowienie|@count === 0}
    <div class="alert alert-primary" role="alert">
        Brak danych w Bazie
    </div>
    {else}

        <!-- Wyśrodkowanie -->
        <div class="d-flex justify-content-center">
            {foreach $Zamowienie as $key => $zam}
                <div class="col-sm-6">
                    <center><h2>Numer: {$numer}</h2></center>
                    <h2 class="text-center">{$zam['Statuszamowienia']}</h2>
                </div>
            {/foreach}
        </div>







        {/if}
        {/if}



</div>


{include file="footer.html.tpl"}