<?php require_once ('../risorse/config.php');?>

<?php include (FRONT_END.DS.'header.php'); ?>

    <!--intestazione pagina prodotto-->
    <section class="page-intest">
        <div class="title-page">
            <h1>Nome Prodotto</h1>
        </div>
    </section>

    <main class="content">
        <div class="page-product">

            <section class="product">
            
                <?php
                    mostraSingoloProdotto();
                ?>
               
            <div class="divider"></div>

            <!--recensioni-->
            <div class="reviews">
                <h2>Recensioni</h2>
                <div class="review">
                    <p>Recensione 1: Ottimo prodotto!</p>
                </div> <!--end review-->
                <div class="review">
                    <p>Recensione 2: Molto utile.</p>
            </div><!--end review-->

            <div class="divider"></div>

            <button id="leave-review">Lascia una recensione</button>
        </div>
            </section>

            <aside class="sidebar">
                
            <?php include (FRONT_END.DS.'sidebar.php'); ?>

            </aside> <!--end sidebar-->
        </div>  <!--end page-product-->  
    </main> <!--end main content-->

    <div class="spacer"></div>

    
<?php include (FRONT_END.DS.'footer.php'); ?>
