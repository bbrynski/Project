{include file="header.html.tpl"}

<div class="container-fluid mt-5">
    <!-- Zawartość kontenera -->
    <h2 class="text-center">Dostępne Modele Samochodów</h2>
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
                        <img src="data:image;base64,{$samochod['Foto']}" class="img-fluid" alt="Responsive image">
                        <h1 class="text-center">{$samochod['nazwaModel']}</h1>


                    </div>


                {/foreach}
        </div>
                </tbody>
            </table>


        {/if}
    {/if}


    <!-- Wyśrodkowanie -->
    <div class="d-flex justify-content-center">
        <a class="btn btn-success mb-3 text-center" href="http://{$smarty.server.HTTP_HOST}{$subdir}Samochod/add-form">+</a>
    </div>

</div>
</div>


{include file="footer.html.tpl"}

<!--



<div class="container">
<div class="row">
    <div class="col-sm-6">
        <img src="http://images/polo.png" class="img-fluid" alt="Responsive image">
        <h1 class="text-center">Polo</h1>
    </div>
    <div class="col-sm-6">
        <img src="http://images/arteon.png" class="img-fluid" alt="Responsive image">
        <h1 class="text-center">Arteon</h1>
    </div>

    <div class="col-sm-6">
        <img src="http://images/golf.png" class="img-fluid" alt="Responsive image">
        <h1 class="text-center">Golf</h1>
    </div>
    <div class="col-sm-6">
        <img src="http://images/passat.png" class="img-fluid" alt="Responsive image">
        <h1 class="text-center">Passat</h1>
    </div>
</div>

    <div class="d-flex justify-content-center">
        <a class="btn btn-success mb-3 text-center" href="http://{$smarty.server.HTTP_HOST}{$subdir}Samochod/add-form">+</a>
    </div>

</div>




-->