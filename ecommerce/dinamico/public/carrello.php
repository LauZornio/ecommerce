<!-- e' una pagina che serve solo per far funzionare il carello, tutto si vedrà del checkout -->
<?php require_once ('../risorse/config.php');?>



<?php
//aggiungi +1 al session del carello
if(isset($_GET['add'])){
    $controllaQuantita = query ("SELECT * FROM prodotti WHERE id_prod={$_GET['add']}");

    conferma($controllaQuantita);

    while($row = fetch_array($controllaQuantita)) {
        if($row['qta_prod'] != $_SESSION['prodotto_'.$_GET['add']]) {
            $_SESSION['prodotto_'.$_GET['add']] +=1;
            header ('Location:checkout.php');
        } else {
            creaAvviso("Spiacenti,avevamo solo ".$row['qta_prod']." ".$row['nome_prod']);
            header ('Location:checkout.php');
        }
    }
}

//togli -1 al session del carello
if(isset($_GET['remove'])){
    $_SESSION['prodotto_'.$_GET['remove']] -=1;
    unset($_SESSION['totale']);
    unset($_SESSION['totArt']);
    header ('Location:checkout.php');
}

//elimina elemento dal carello, ovvero portandolo a 0
if(isset($_GET['delete'])){
    $_SESSION['prodotto_'.$_GET['delete']] = 0;
    unset($_SESSION['totale']);
    unset($_SESSION['totArt']);
    header ('Location:checkout.php');
}

?>


