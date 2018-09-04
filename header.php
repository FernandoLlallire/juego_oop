

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style-omar.css">
    <link rel="stylesheet" href="css/style-delfi.css">
    <link rel="stylesheet" href="css/style-fer.css">
    <link rel="stylesheet" href="css/style.css">
      <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
  </head>
  <body>
    <!-- <div class="container"> esto lo puse por el tema del footer? -->
<nav class="navbar navbar-light fixed-top navbar-expand-md"; style="background-color: #4D9DE0";>
   <a class="navbar-brand mr-auto m" href="index.php">
     <!-- <img src="images/if_sloth_3406421.png" width="30" height="30" alt=""> Aca tendria que ir el logo-->
     BrandName
   </a>
  </button>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav  ml-auto " >
      <?php
      $navBar = [
        "Home" => "index.php",
        "Registro" => "register.php",
        "Login" => "login.php",
        "Preguntas frecuentes" => "faq.php",
        "Perfil" => "profile.php",
      ];
      foreach ($navBar as $opcion => $url) {
        echo "<li class=\"nav-item active\" >";
        echo "<a class='nav-link' href=$url>$opcion</a>";
        echo "</li>";
      }
      ?>
    </ul>
  </div>
</nav>
