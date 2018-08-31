<div class="container">
  <nav class="row ">
    <?php
    $navBar = [
      "Home" => "index.php",
      "Registro" => "registro.php",
      "Login" => "login.php",
      "Preguntas frecuentes" => "faq.php",
      "Perfil" => "perfil.php",
    ];
    foreach ($navBar as $opcion => $url) {
      echo "<a class='navbar navbar-expand-lg nav-pills nav-justified myColorNav' href=$url>$opcion</a>";
    }
    ?>
  </nav>
</div>
