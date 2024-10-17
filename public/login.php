<?php
require_once "../common.php";

$error = null;

if($_SERVER['REQUEST_METHOD'] === 'POST'){
  $loginIsSuccesfull  = false;

  try{

    $loginIsSuccesfull = $autenticadedProvider->login($_POST['username'], $_POST['password']);

  }catch(Exception $e){
    $error = $e->getMessage();
  }

  if($loginIsSuccesfull === true){
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
          <h1 class="display-5">Accedi</h1>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6 mx-auto">

          <?php if($error != null): ?>
          <?php //if($loginIsSuccesfull !== true): ?>
            <div class="alert alert-danger">
              <?php echo $error; ?>
            </div>
          <?php endif; ?>

          <div class="card mt-3 mx-auto">
            <div class="card-body p-4">
              <form method="post" action="login.php">
                <div class="mb-3">
                  <label for="username" class="form-label">Nome utente</label>
                  <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                </div>
                <div class="mb-3">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>
                <div class="col-auto mb-3">
                  <button type="submit" class="btn btn-primary">Login</button>
                </div>
                <div class="">
                  <p><small>Password dimenticata?</small></p>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <div class="row mt-5">
        <div class="col-md-4 mx-auto text-center d-grid gap-2">
          <a href="register.php"><button type="button" class="btn btn-outline-primary">Non sei ancora registrato?</button></a>
        </div>
      </div>
      
    </div>
  </body>
</html>
