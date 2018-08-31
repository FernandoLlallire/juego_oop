<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/style.css">
  <title>Juego</title>
</head>
<body>
  <?php require_once 'header.php'; ?>
  <br>
  <br>
<h1 class="mainTitle">¡Superá tus metas jugando!</h1>
  <article class="container">
    <div class="row">
      <div class="col-sm">
        <div class="card" style="width: 18rem;">
          <img class="card-img-top img-fluid porcentaje" src="images/correr.jpg" alt="Card image cap">
          <div class="card-body">
            <p class="card-text">¡Decidite a hacer ejercicio!</p>
          </div>
        </div>
      </div>
      <div class="col-sm">
        <div class="card" style="width: 18rem;">
          <img class="card-img-top img-fluid porcentaje" src="images/dejar-de-fumar.jpg" alt="Card image cap">
          <div class="card-body">
            <p class="card-text">¡Dejá de fumar y ganá puntos!</p>
          </div>
        </div>
      </div>
      <div class="col-sm">
        <div class="card" style="width: 18rem;">
          <img class="card-img-top img-fluid porcentaje" src="images/tomar-agua.jpg" alt="Card image cap">
          <div class="card-body">
            <p class="card-text">¡Tomá agua y convertite en héroe!</p>
          </div>
        </div>
      </div>
    </div>
  </article>
  <br>
  <br>
  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100 imgCarrousel" src="images/dejar-de-fumar.jpg" alt="First slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100 imgCarrousel" src="images/correr.jpg" alt="Second slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100 imgCarrousel" src="images/tomar-agua.jpg" alt="Third slide">
      </div><script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
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
  <br>
  <br>
  <div class="card">
    <div class="card-header">
      Mirá lo que opinan de nuestro juego:
    </div>
    <div class="card-body">
      <blockquote class="blockquote mb-0">
        <p>¡Logré todo lo que quise en la vida!</p>
        <footer class="blockquote-footer">Batman Roberto <cite title="Source Title">Digital House</cite></footer>
      </blockquote>
    </div>
  </div>
  <?php require_once 'footer.php';?>
  <!-- Librería de jQuery -->
   <script src="js/jquery-3.3.1.min.js"></script>
   <!-- Librería de JS de Bootstrap -->
   <script src="js/bootstrap.min.js"></script>
</body>
</html>
