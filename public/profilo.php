<?php
require_once "../common.php";

$error = null;

if($_SERVER['REQUEST_METHOD'] === 'POST'){
  $changePasswordIsSuccesfull  = false;

  try{

    $changePasswordIsSuccesfull = $autenticadedProvider->changePassword( $_POST['password']);

  }catch(Exception $e){
    $error = $e->getMessage();
  }

  if($changePasswordIsSuccesfull  === true){
    header("location: index.php");
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
    <?php require_once "../menu.php"; ?>
    <div class="container">

      <div class="row">
        <div class="col-md-6 mx-auto mt-5">
          <h1 class="display-5">Profilo</h1>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6 mx-auto mt-3">

          <?php if($error != null): ?>
          <?php //if($loginIsSuccesfull !== true): ?>
            <div class="alert alert-danger">
              <?php echo $error; ?>
            </div>
          <?php endif; ?>
          <form method="post" action="changePassword.php">
            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input type="text" class="form-control" id="username" name="username" placeholder="Username">
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Nuova password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>
            <div class="mb-3">
              <label for="repeatPassword" class="form-label">Conferma password</label>
              <input type="password" class="form-control" id="repeatPassword" name="repeatPassword" placeholder="Repeat password">
            </div>
            <div class="col-auto">
              <button type="submit" class="btn btn-primary mb-3">Modifica</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
