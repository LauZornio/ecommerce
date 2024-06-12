<?php require_once ('../risorse/config.php');?>

<?php include (FRONT_END.DS.'header.php'); ?>

    <!--intestazione pagina prodotto-->
    <section class="page-intest">
        <div class="title-page">
            <h1>Elenco Categorie</h1>
        </div>
    </section>


    <main>
        <section class="categories content">

        <?php paginaCategorie(); ?>    
        
        </section>
    </main>

    

<?php include (FRONT_END.DS.'footer.php'); ?>
