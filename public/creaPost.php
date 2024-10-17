<?php
require_once "../common.php";

$error = null;

if($_SERVER['REQUEST_METHOD'] === 'POST'){
  $loginIsSuccesfull  = false;

  try{

    $insertPost = $postManager->addPost($_POST['titolo'], $_POST['newPost']);

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
          <h1 class="display-5">Nuovo post</h1>
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

          <form method="post" action="creaPost.php">
            <div class="mb-3">
              <label for="titolo" class="form-label">Titolo</label>
              <input type="text" class="form-control" id="titolo" name="titolo" placeholder="titolo">
            </div>
            <div class="mb-3">
              <label for="newPost" class="form-label">Post</label>
              <textarea class="form-control" id="newPost" name="newPost" rows="4" placeholder="insert your post"></textarea>
            </div>
            <div class="col-auto">
              <button type="submit" class="btn btn-primary mb-3">Crea post</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
