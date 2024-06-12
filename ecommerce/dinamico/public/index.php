<?php require_once ('../risorse/config.php'); //in questo modo viene incluso una volta sola?>

<?php 
// corrisponde a : include ('../risorse/templates/front/header.php'); 
// meglio usare le costanti in modo che sia più modulare
//FRONT_END è definito nel config.php e DS è il separatore di directory corretto
include (FRONT_END.DS.'header.php'); 
?>


    <!--herosection-->
    <section class="hero">
      <div class="text-hero">  
        <h1>Benvenuti nella nostra pagina</h1>
        <p>Scopri i nostri prodotti digitali</p>
      </div> <!--end text-hero-->
    </section>

    <div class="divider"></div>

    <!--card spazio prodotti e con il ciclo si creano le card-->
    <section class="products">

    <!--richiamare la funzione per mostrare i dati del prodotto-->
    <?php mostraProdotti(); ?>

      
    </section>
    

    <div class="divider"></div>



<?php include (FRONT_END.DS.'footer.php'); ?>
