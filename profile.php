<?php

require_once "autoload.php";
// dbug($_SESSION);dbug($_COOKIE);exit;
if(isset($_COOKIE["user"])){
  $user=$auth->getUserFromCookie($userModel);
  $_SESSION["user"]=$user->email;
}

if(!isset($_SESSION["user"])){
    header('location: index.php');
    exit;
}else {
  if(!$auth->isSessionValid($userModel)){
    header('location: logout.php');
    exit;
  }
}
  $user = $userModel->getUserByEmail($_SESSION['user']);
	$theUser = new User($user);

 ?>
  <link rel="stylesheet" href="css/css-delfi.css">
  <div class="container">
  	<div class="row">
  		<div class="col-lg-3 col-sm-6">
        <br><br><br>
        <h2>¡Hola, <?= $theUser->getName()?></h2>
              <div class="card hovercard">
                  <div class="cardheader">

                  </div>
                  <div class="avatar">
                      <img alt="" src="userimg/<?= $theUser->getImage()?>">
                  </div>
                  <div class="info">
                      <div class="title">
                          <a target="_blank"><?= $theUser->getName()?></a>
                      </div>
                      <div class="desc">Diseñador gráfico</div>
                      <div class="desc">Futbolista amateur</div>
                      <div class="desc">Carpintero por hobbie</div>
                  </div>
                  <div class="bottom">
                      <a class="btn btn-primary btn-twitter btn-sm" href="">
                          <i class="fa fa-twitter"></i>
                      </a>
                      <a class="btn btn-danger btn-sm" rel="publisher"
                         href="">
                          <i class="fa fa-google-plus"></i>
                      </a>
                      <a class="btn btn-primary btn-sm" rel="publisher"
                         href="">
                          <i class="fa fa-facebook"></i>
                      </a>
                      <a class="btn btn-warning btn-sm" rel="publisher" href="">
                          <i class="fa fa-behance"></i>
                      </a>
                  </div>
              </div>

          </div>

  	</div>
  </div>
  <div class="container">
  	<div class="row">
  		<div class="col-md-4">
  			<div class="dash-box dash-box-color-1">
  				<div class="dash-box-icon">
  					<i class="glyphicon glyphicon-cloud"></i>
  				</div>
  				<div class="dash-box-body">
  					<span class="dash-box-count">1500</span>
  					<span class="dash-box-title">Puntos</span>
  				</div>

  				<div class="dash-box-action">
  					<button>Más info</button>
  				</div>
  			</div>
  		</div>
  		<div class="col-md-4">
  			<div class="dash-box dash-box-color-2">
  				<div class="dash-box-icon">
  					<i class="glyphicon glyphicon-download"></i>
  				</div>
  				<div class="dash-box-body">
  					<span class="dash-box-count">3</span>
  					<span class="dash-box-title">Challenge actuales</span>
  				</div>

  				<div class="dash-box-action">
  					<button>Más info</button>
  				</div>
  			</div>
  		</div>
  		<div class="col-md-4">
  			<div class="dash-box dash-box-color-3">
  				<div class="dash-box-icon">
  					<i class="glyphicon glyphicon-heart"></i>
  				</div>
  				<div class="dash-box-body">
  					<span class="dash-box-count">30 días sin fumar</span>
  					<span class="dash-box-title">¡Mayor logro de tu mes!</span>
  				</div>

  				<div class="dash-box-action">
  					<button>Más info</button>
  				</div>
  			</div>
  		</div>
  	</div>
  </div>
<br>
<br>
<div class="container">
    <h2>Tus challenges</h2>
	<div class="row">
		<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
						<div class="card-profile-wrapper mb-60">
							<div class="card-profile-inner">
								<div class="card-challenge-img">
                  <img src="images/agua.png" width="68px" alt="agua">
								</div>
								<div class="profile-card-text">
									<h4>Tomar agua</h4>
									<p>Tomar 2 litros de agua por día</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
						<div class="card-profile-wrapper mb-60">
							<div class="card-profile-inner">
								<div class="card-challenge-img">
								<img src="images/cigarrillo.png" width="68px" alt="">
								</div>
								<div class="profile-card-text">
									<h4>Dejar de fumar</h4>
									<p>30 días sin fumar</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
						<div class="card-profile-wrapper mb-60">
							<div class="card-profile-inner">
								<div class="card-challenge-img">
								<img src="images/manzana.png" width="68px" alt="">
								</div>
								<div class="profile-card-text">
									<h4>Comer sano</h4>
									<p>15 días de comidas sanas</p>
								</div>
							</div>
						</div>
					</div>
	</div>
</div>


  <?php require_once 'includes/footer.php';?>
