<?php require_once ('../risorse/config.php'); //in questo modo viene incluso una volta sola?>

<?php include (FRONT_END.DS.'header.php'); ?>

<!--per pagamento Paypal, mettere il Client-ID (venditore) che poi è da modificare-->
<script src="https://www.paypal.com/sdk/js?client-id=AYW1CnrlUx0UgOri_vUJbdggqVlI0L8ijQYW8kY0ZbQOLMRgruWZKfX3XTKjhoNkCrtlm8SpPNJDRgOC"></script>

<!--intestazione pagina prodotto-->
<section class="page-intest">
    <div class="title-page">
        <h1>NEGOZIO - CATALOGO</h1>
    </div>
</section>


<!--questo Button è deprecato, quindi seguire procedura corretta di integrazione -->



<!--nella sezione developer di paypal account business, Docs, Docs Archive, Button Manager, Integration -->
<!-- https://developer.paypal.com/sdk/js/configuration/ 
 https://developer.paypal.com/sdk/js/reference/ -->
<!--video youtube PAGAMENTI AUTOMATICI SUL SITO WEB di Vita da Founder -->
<!--da aggiungere SDK (poi con WP si integra meglio e più velocemente) -->




<main>
    <section class="checkout content">
        
        <div class="flex-column">
            <!-- intestazione -->
            <div class="col-10"> 
                <div class="col-2">
                    <h2>Product</h2>
                </div>
                
                <div class="col-2">
                    <h2>Price</h2>
                </div>

                <div class="col-2">
                    <h2>Quantity</h2>
                </div>
                
                <div class="col-2">
                    <h2>Sub-total</h2>
                </div>

                <div class="col-4 titolo-tab">
                    <h2>MODIFICA</h2>
                </div>
            </div>
            <!-- contenuto della tabella carrello -->
            <?php carrello(); ?>

            <!-- somma totale -->
            <div class="col-4">
                <h2>Cart Total</h2>

                <div class="flex-row">
                    <div class="row">
                        <h3>Item</h3>
                        <p><?php echo isset($_SESSION['totArt']) ? $_SESSION['totArt'] : $_SESSION['totArt'] = ''; ?></p>
                    </div>    
                
                    <div class="row">
                        <h3>spedizione gratuita</h3>
                        <p>ciao</p>
                    </div>
                    
                    <div class="row">
                        <h3>Order Total</h3>
                        <p>€ <?php echo isset($_SESSION['totale']) ? $_SESSION['totale'] : $_SESSION['totale'] = ''; ?></p>
                    </div>

                </div>
            </div>
        </div>

        <div class="spacer"></div>

        <!--button paypal sono già funzionanti-->
        <div id="paypal-button-container"></div>

        <script>
        
            //per il layout
            paypal.Buttons({
            style: {
                layout: 'vertical',
                color:  'gold',
                shape:  'pill',
                label:  'paypal'
            },

            

            }).render('#paypal-button-container');


        </script>
        
        <div class="spacer"></div>
    </section>
</main>

<?php 
echo $_SESSION['prodotto_3'];
?>
<?php mostraAvviso(); ?>

<?php include (FRONT_END.DS.'footer.php'); ?>
