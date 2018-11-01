<?php
  require_once 'header.php';
  require_once 'DataSanitization.php';
  require_once 'DataUpload.php';
  if($auth->isLogged()){
    /*dbclass getUserbyEmail*/
    $theUser = getUserbyEmail($_SESSION['userEmail']);
  }
  ?>
  <br>
  <br>
  <div class="container">
    <div class="row">
      <div class="col-6">
        <h1 class="mainTitle">¡Superá tus metas jugando!</h1>
      </div>
    </div>
  </div>

<section class="container">

  <article>
    <div class="row">
      <div class="col-xs-12 col-sm-4">
        <div class="card background-card" style="width: 18rem;">
          <img class="card-img-top img-fluid porcentaje" src="images/cafe.png" alt="Card image cap">
          <div class="card-body">
            <p class="card-text">¡Decidite a tomar menos café!</p>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-sm-4">
        <div class="card background-card" style="width: 18rem;">
          <img class="card-img-top img-fluid porcentaje" src="images/cigarrillo.png" alt="Card image cap">
          <div class="card-body">
            <p class="card-text">¡Dejá de fumar y ganá puntos!</p>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-sm-4">
        <div class="card background-card" style="width: 18rem;">
          <img class="card-img-top img-fluid porcentaje" src="images/agua.png" alt="Card image cap">
          <div class="card-body">
            <p class="card-text">¡Tomá agua y convertite en héroe!</p>
          </div>
        </div>
      </div>
    </div>
  </article>
</section>
<br>
<br>
<section class="container">
  <div class="row">
    <div class="col-sm">
    </div>
    <div class="col-sm-8">
      <p>Cada vez que iniciás un desafío, empezás a competir contra vos mismo y con otros que tengan tu mismo propósito.
      Cada objetivo que logres para llegar a tu meta te da puntos que te hacen subir de nivel.
      ¡Preparate para lograr lo que quieras de la manera más divertida!</p>
    </div>
    <div class="col-sm">
    </div>
  </div>
</section>
  <br>
  <br>

<section class="container">
  <div class="row">
    <div class="col-2">
    </div>
    <div class="col-8">
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
    </div>

  </div>

</section>

  <br>
  <br>
  <div class="card">
    <div class="card-header header-quote-card">
      Mirá lo que opinan de nuestro juego:
    </div>
    <div class="card-body card-quote-color">
      <blockquote class="blockquote mb-0">
        <p>¡Logré todo lo que quise en la vida!</p>
        <footer class="blockquote-footer">Batman Roberto <cite title="Source Title">Digital House</cite></footer>
      </blockquote>
    </div>
  </div>
  <?php require_once 'footer.php';?>
