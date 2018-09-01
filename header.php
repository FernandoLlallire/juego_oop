

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/bootstrap.min.css">
      <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
  </head>
  <body>
    <div class="navbar-wrapper">
      <nav class="container-fluid">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <!-- <a class="navbar-brand" href="#">Proyect</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button> A definir cuando tengamos el icono y nombre-->
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <?php
      $navBar = [
        "Home" => "index.php",
        "Registro" => "registro.php",
        "Login" => "login.php",
        "Preguntas frecuentes" => "faq.php",
        "Perfil" => "perfil.php",
      ];
      foreach ($navBar as $opcion => $url) {
        echo "<li class=\"nav-item active\">";
        echo "<a class='navbar navbar-expand-lg nav-pills nav-justified myColorNav' href=$url>$opcion</a>";
        echo "</li>";
      }
      ?>
    </ul>
  </div>
</nav>
      </nav>
    </div>
