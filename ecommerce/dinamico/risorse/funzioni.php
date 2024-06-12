<?php

//funzione per eseuguire una query $sql è il parametro, ovvero la query che passo alla funzione
function query($sql) {
    global $connessione;
    return mysqli_query($connessione , $sql);
}

//funzione per verificare che la query sia andata a buon fine
function conferma($risultato) {
    global $connessione;

    if(!$risultato) {
        die('Richiesta Fallita').mysqli_error($connessione);
    }
}

//Questa funzione nativa di PHP (mysqli_fetch_array($risultato)) prende il risultato di una query come parametro e restituisce una riga del risultato come un array associativo, numerico, o entrambi.
function fetch_array($risultato) {
    return mysqli_fetch_array($risultato);
}

// Creare l'Avviso
function creaAvviso($msg) {
    if (!empty($msg)) {
        $_SESSION['messaggio'] = $msg;
    } else {
        $msg = "";
    }
}

function mostraAvviso() {
    if (isset($_SESSION['messaggio'])) {
        echo $_SESSION['messaggio'];
        unset($_SESSION['messaggio']);
    }
}





//mostra tutti i prodotti nella index, prendere la funzione conferma e fetch_array
function mostraProdotti() {
    $ricercaProdotti = query('SELECT * FROM prodotti limit 3');

    // LIMIT è importante per evitare di caricare tutti i prodotti (se sono tanti)
    //$ricercaProdotti = query('SELECT * FROM prodotti LIMIT 1');

    conferma($ricercaProdotti);

    while ($row = fetch_array($ricercaProdotti)) {
        
        //Eredoc Sintassi per Assegnazione di Stringa $prodotti = <<<STRINGA_PDT
        //<<<STRINGA_PDT: Questa è una sintassi heredoc in PHP, usata per definire stringhe multilinea. Il nome STRINGA_PDT è un identificatore arbitrario che deve essere lo stesso all'inizio e alla fine della stringa.
        //Caratteristiche Principali
        //Multilinea: Consente di scrivere stringhe su più linee senza dover usare concatenazioni.
        //Interpolazione delle variabili: Le variabili PHP all'interno del blocco vengono valutate e interpolate.
        //Nessun bisogno di escape: Non è necessario usare i caratteri di escape per le virgolette doppie o singole all'interno del blocco heredoc.
        //Facilità di lettura: Rende il codice più leggibile, specialmente quando si lavora con blocchi di testo estesi o codice HTML.
        $prodotti = <<<STRINGA_PDT
        
        <div class="product-card">
            
            <figure>
                <img src="../risorse/{$row['immagine']}" alt="immagine di prova" width="200px" height="210">
            </figure>

            <a href="prodotto.php?id={$row['id_prod']}"><h3>{$row['nome_prod']}</h3></a>
            
            <p>{$row['prezzo']}</p>
            <p>{$row['descr_prod']}</p>
        

            <div class="center divider">
                <a href="carrello.php?add={$row['id_prod']}"><button id="dett">Acquista</button></a>
            </div>
        </div>


        STRINGA_PDT;

        echo $prodotti;
    }
}

//funzione per mostrare le categorie nella sidebar
//<a href='categorie.php?id={$row['id_cat']}'>{$row['nome_cat']}</a>
//attenzione agli apici singoli
function mostraCategorie() {

    $ricercaCategorie = query("SELECT * FROM categorie");

    conferma($ricercaCategorie);
    
    while ($row=fetch_array($ricercaCategorie)){
        $categorie = <<<STRINGA_CAT

        <li><a href='categorie.php?id={$row['id_cat']}'>{$row['nome_cat']}</a></li>

        STRINGA_CAT;

        echo $categorie;
    }
}

//funzione per mostrare il Singolo prodotto nella pagina prodotto, la scheda informativa
function mostraSingoloProdotto() {
    $pdt = query("SELECT * FROM prodotti WHERE id_prod = {$_GET['id']}");

    conferma($pdt);

    while ($row=fetch_array($pdt)){
        $pdtSingolo = <<<STRINGA_SING

        <figure>
            <img src="../risorse/{$row['immagine']}" alt="Immagine del prodotto" width="300" height="300">
        </figure>

        <h2>{$row['nome_prod']}</h2>
        <p>{$row['prezzo']}</p>
        <p>{$row['descr_prod']}</p>
        <p>{$row['info_dett']}</p>


        STRINGA_SING;

        echo $pdtSingolo;
    }

}

//funzione per visualizzare l'elenco dei prodotti di quella categoria specifica, nella pagina categoria
function paginaCategorie() {
    $pdtCategoria = query("SELECT * FROM prodotti WHERE cat_prodotto = {$_GET['id']}");

    conferma($pdtCategoria);

    while ($row=fetch_array($pdtCategoria)){
        $catSingola = <<<STRINGA_CAT

        <div class="category-card">
            <figure>
                <img src="../risorse/{$row['immagine']}" alt="Immagine del prodotto" width="300" height="300">
            </figure>

            <h3>{$row['nome_prod']}</h3>
            <div class="color">
                <p>{$row['prezzo']}</p>
                <p>{$row['descr_prod']}</p>

                <div class="center divider">
                    <button id="acquisto">Acquista</button>
                    <button id="dett" onclick="window.location.href='prodotto.php?id={$row['id_prod']}'">dettagli</button>
                </div>
            </div> <!--color-->
                
        </div> <!--end category-card-->


        STRINGA_CAT;

        echo $catSingola;
    }
}


function catalogoProd() {
    $catalogo = query("SELECT * FROM prodotti");

    conferma($catalogo);

    while ($row=fetch_array($catalogo)){
        $shopCat = <<<STRINGA_SHOP

        <div class="category-card">
            <figure>
                <img src="../risorse/{$row['immagine']}" alt="Immagine del prodotto" width="300" height="300">
            </figure>

            <h3>{$row['nome_prod']}</h3>
            <div class="color">
                <p>{$row['prezzo']}</p>
                <p>{$row['descr_prod']}</p>

                <div class="center divider">
                    <button id="acquisto">Acquista</button>
                    <button id="dett" onclick="window.location.href='prodotto.php?id={$row['id_prod']}'">dettagli</button>
                </div>
            </div> <!--color-->
                
        </div> <!--end category-card-->


        STRINGA_SHOP;

        echo $shopCat;
    }
}

function carrello() {
    $totOrdine = 0;
    $totArticolo = 0;

    //$value è il contatore del prodotto: quante volte l'utente ha scelto quel prodotto
    foreach ($_SESSION as $name => $value) {
        if ($value > 0) {
            // mi serve per estrarre la lunghezza della parola
            if (substr($name, 0, 9) == 'prodotto_') {
                //così trovo la lunghezza dell'id prodotto
                //importante intval perchè trasformo in numero
                $lunghezza = strlen(intval($name) - 9);
                $id = substr($name, 9, $lunghezza); //seleziono solo l'id prodotto

                //così posso stampare a video nella pagina checkout i prodotti che ho selezionato
                $prodotti = query("SELECT * FROM prodotti WHERE id_prod = {$id}");
                conferma($prodotti);

                while ($row = fetch_array($prodotti)){
                    
                    $importo = $row['prezzo'] * $value;
                    $prodottiCarello = <<<STRINGA_CAR
                    <div class="col-10">
                        <div class="col-2">
                            <p>{$row['nome_prod']}</p>
                        </div>

                        <div class="col-2">
                            <p>{$row['prezzo']}</p>
                        </div>

                        <div class="col-2">
                            <p>{$value}</p>
                        </div>
                        
                        <div class="col-2">
                            <p>{$importo}</p>
                        </div>

                        <div class="col-4 this-down">
                            <a href="carrello.php?add={$row['id_prod']}">Aggiungi</a>
                            <a href="carrello.php?remove={$row['id_prod']}">Rimuovi</a>
                            <a href="carrello.php?delete={$row['id_prod']}">Cancella</a>
                        </div>

                    </div>

                    STRINGA_CAR;

                    echo $prodottiCarello;
                }

                $_SESSION['totale'] = $totOrdine += $importo;
                $_SESSION['totArt'] = $totArticolo += $value;

            }
        }
    }

}