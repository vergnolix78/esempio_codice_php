<?php
require_once "../common.php";

//Creo ed inserisco un messaggio in un file log.txt
$message = sprintf("L' utente %s ha effettuato il logout", $_SESSION['username']);
printLog($message);

//Distruggo la sessione
session_destroy();
header("location: index.php");
