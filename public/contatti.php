<?php
require_once "../common.php";

$mailStarted = false;
/* Todo
if($autenticadedProvider->userIsAutenticaded() === false){
  header("location: index.php");
}
*/

if($_SERVER['REQUEST_METHOD'] === 'POST'){

  $message = $_POST['richiesta'];

  if(!empty($message)){

    //costruisco ed invio una mail
    $mail = "vergnani.marco@gmail.com";
    $oggetto = "Richiesta da sito";

    $mailStarted = mail($mail, $oggetto, $message);

    //Creo ed inserisco un messaggio in un file log.txt
    $message = sprintf("L' utente %s ha inviato un messaggio", $_SESSION['username']);
    printLog($message);

  }

}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <?php require_once "../head.php"; ?>
    <title>Esempio blog</title>
  </head>
  <body>
    <?php require_once "../menu.php"?>
    <div class="container">

      <div class="row">
        <div class="col-md-6 mx-auto mt-5">
          <h1 class="display-5">Inviaci un messaggio!</h1>
        </div>
      </div>
      <div class="rows">
        <div class="col-md-6 mx-auto mt-3">
          <?php if($mailStarted === true): ?>
            <p>Messaggio inviato correttamente.</p>
            <a href="contatti.php"><p>Clicca qui per inviare un altro messaggio!</p></a>
          <?php else: ?>
          <form action="contatti.php" method="post">
            <div class="mb-3">
              <label for="mail" class="form-label">Inserisci la tua mail</label>
              <input type="email" class="form-control" id="mail" name="mail" placeholder="example@example.com">
            </div>
            <div class="mb-3">
              <label for="titolo" class="form-label">Titolo</label>
              <input type="text" class="form-control" id="titolo" name="titolo" placeholder="Inserisci il titolo">
            </div>
            
            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">Invia richiesta</label>
              <textarea class="form-control" name="richiesta" id="exampleFormControlTextarea1" rows="3" placeholder="Inserisci il messaggio..."></textarea>
            </div>
            <div class="col-auto">
              <button type="submit" name= "invia" class="btn btn-primary mb-3">Invia richiesta</button>
            </div>
          </form>
        <?php endif ?>
        </div>
      </div>
    </div>
  </body>
</html>
