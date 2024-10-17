<?php
require_once "../common.php";
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

      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src= "https://mdbootstrap.com/img/Photos/Slides/img%20(130).jpg" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(129).jpg" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(70).jpg" alt="Third slide">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>


      <div class="row">
        <div class="col-md-12">

          <div class="row">
            <div class="col-md-4 mt-5 mb-3">
              <h1 class="display-5">Notizie</h1>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <?php foreach ($postManager->requestAllPost() as $value): ?>

                <div class="card my-3">
                  <h5 class="card-header">Pubblicato da <?php echo $value->getAutore(); ?></h5>
                  <div class="card-body">
                    <h5 class="card-title"><?php echo $value->getTitolo(); ?></h5>
                    <p class="card-text"><?php echo $value->getPost(); ?></p>
                    <small class=""><?php echo $value->getData()->format('Y-m-d H:i:s'); ?></small>
                  </div>
                </div>

              <?php endforeach; ?>

            </div>
          </div>
         
        </div>
      </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
  </body>
</html>
