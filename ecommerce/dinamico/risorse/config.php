<?php 
ob_start();
session_start();
//session_destroy();

//costante predefinita "DIRECTORY_SEPARATOR"
//Se non è stata definita, definisce DS come DIRECTORY_SEPARATOR, che è una costante predefinita di PHP che restituisce il separatore di directory corretto per il sistema operativo in uso (es. / su UNIX-like, \ su Windows).
defined('DS')? null:define('DS', DIRECTORY_SEPARATOR);

//definiamo la costante solo se non è già stata definita:
//letteralmente: è stata definita la costante FRONT_END? si, allora null, altrimenti definiamo la costante con il percorso templates __DIR__
// __DIR__ è una costante di sistema e restituisce il percorso della cartella in cui viene utilizzata
defined('FRONT_END')? null:define('FRONT_END', __DIR__.DS.'templates/front');

defined('BACK_END')? null:define('BACK_END', __DIR__.DS.'templates/back');


//
// configurazione DB
//

define ('DB_HOST', 'localhost');
define ('DB_UTENTE', 'root');
define ('DB_PASSWORD', 'root');
define ('DB_NOME', 'negozio');

$connessione = mysqli_connect(DB_HOST,DB_UTENTE, DB_PASSWORD, DB_NOME);

/*
if (!$connessione) {
    echo "non sei connesso";
} else {
    echo 'sei connesso';
}*/


//
// Importante dare al config il file function! 
//

require_once ('funzioni.php');


?>