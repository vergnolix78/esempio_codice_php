<?php
require_once "../common.php";

$error  = false;
// if ($autenticadedProvider->userIsAutenticaded() === true){
//
//     header("location: index.php");
// }

if($_SERVER['REQUEST_METHOD'] === 'POST'){
  $registerIsSuccesfull = false;

  try{

    $registerIsSuccesfull = $autenticadedProvider->register($_POST['username'], $_POST['password']);

  }catch(Exception $e){
    $error = $e->getMessage();
  }

  if($registerIsSuccesfull === true){
    $autenticadedProvider->login($_POST['username'], $_POST['password']);
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
          <h1 class="display-5">Registrati</h1>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6 mx-auto">

          <?php if($error != null): ?>
          <?php //if($registerIsSuccesfull !== true): ?>
            <div class="alert alert-danger">
              <?php echo $error; ?>
            </div>
          <?php endif; ?>

          <div class="card mt-3 mx-auto">
            <div class="card-body p-4">
              <form method="post" action="register.php">
                <div class="mb-3">
                  <label for="username" class="form-label">Nome utente</label>
                  <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                </div>
                <div class="mb-3">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>
                <div class="mb-3">
                  <label for="repeatPassword" class="form-label">Repeat password</label>
                  <input type="repeatPassword" class="form-control" id="repeatPassword" name="repeatPassword" placeholder="Repeat password">
                </div>
                <div class="col-auto mb-3">
                  <button type="submit" class="btn btn-primary">registrati</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
