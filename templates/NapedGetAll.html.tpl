{include file="header.html.tpl"}

<div class="container-fluid mt-5" xmlns="http://www.w3.org/1999/html">
    <!-- Zawartość kontenera -->
    <h2 class="text-center mb-5">Typy napędu</h2>
    {if isset($message)}
        <div class="alert alert-success" role="alert">{$message}</div>
    {/if}
    {if isset($error)}
        <div class="alert alert-danger" role="alert">{$error}</div>
    {/if}
    {if isset($napedy)}
        {if $napedy|@count === 0}
            <div class="alert alert-primary" role="alert">
                Brak typów napędów w bazie
            </div>
        {else}

    <div class="container">

            <div class="row">
                {foreach $napedy as $key => $naped}

                    <div class="col-sm-6">
                        <a href="http://{$smarty.server.HTTP_HOST}{$subdir}Reflektory/{$naped['IdNaped']}">
                            <h2 class="text-center">{$naped['nazwaNaped']}</h2>
                        </a>
                    </div>
                {/foreach}
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