{include file="header.html.tpl"}

<div class="container-fluid mt-5">
    <!-- Zawartość kontenera -->
    <h2 class="text-center mb-5">Status Zamówienia Samochodów</h2>
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

    <div class="container">

            {foreach $Zamowienie as $key => $zam}
                <div class="col-sm-6">
                        <h1 class="text-center">{$zam['Statuszamowienia']}</h1>
                </div>
            {/foreach}



        {/if}
        {/if}


    </div>
</div>


{include file="footer.html.tpl"}