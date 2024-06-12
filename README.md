# 🛒 Sviluppo e-commerce con PHP

## 📖 Descrizione
Questo progetto riguarda la creazione di un e-commerce utilizzando il linguaggio di scripting PHP. L'obiettivo è fornire un esempio pratico di come funziona PHP nella realizzazione di un negozio online.

## ✨ Funzionalità principali
- 🛍️ Visualizzazione dei prodotti presenti in magazzino
- 🔍 Filtraggio dei prodotti in base alle categorie di appartenenza
- 🛒 Aggiunta di prodotti al carrello senza necessità di login
- 🔄 Gestione del checkout per completare gli acquisti

## ⚙️ Installazione
1. Clonare il repository:
    ```bash
    git clone https://github.com/tuo-username/tuo-repo.git
    ```
2. Creare un database:
    - Utilizzare uno strumento come phpMyAdmin o la riga di comando MySQL per creare un nuovo database.
    - Importare il file SQL presente nella cartella `db` per configurare le tabelle necessarie.
3. Configurare il file `config.php` con le informazioni del database:
    ```php
    <?php
    define('DB_HOST', 'localhost');
    define('DB_USER', 'tuo-username');
    define('DB_PASS', 'tua-password');
    define('DB_NAME', 'nome-database');
    ?>
    ```
4. Assicurarsi che il server web sia configurato correttamente per eseguire PHP.

## 🚀 Utilizzo
Una volta completata l'installazione, aprire il browser e navigare all'indirizzo del progetto per visualizzare e utilizzare l'e-commerce.
Questo progetto serve come esempio pratico di come utilizzare PHP per creare un negozio online.

### File principali
- `index.php`: Pagina principale del negozio, dove vengono mostrati i prodotti.
- `categorie.php`: Permette di filtrare i prodotti in base alle categorie.
- `prodotto.php`: Visualizza i dettagli di un singolo prodotto.
- `carrello.php`: Gestisce l'aggiunta e la visualizzazione dei prodotti nel carrello.
- `checkout.php`: Gestisce il processo di checkout.
- `negozio.php`: Funzioni comuni per la gestione del negozio.

## 📜 Licenza
Questo progetto è distribuito sotto la licenza MIT. Vedi il file [LICENSE](LICENSE) per maggiori dettagli.

## 👩‍💻 Autori
https://github.com/LauZornio
