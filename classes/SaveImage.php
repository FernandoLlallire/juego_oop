<?php
  class SaveImage {

    /*SaveImage nos permite guardar las fotos q subamos para el avatar. leer https://stackoverflow.com/questions/30358737/php-file-upload-error-tmp-name-is-empty por la limitacion del tamaño del archivo, por que si el archivo es muy grande no genera el tmp_name!!!*/
      //no sé si debería agregarle el static
      public static function save($file){
        $imgName = $file['name'];
        $ext = pathinfo($imgName, PATHINFO_EXTENSION);
        $temp_direction = $file['tmp_name'];
        $fileName = uniqid('img_') .  '.' . $ext;
        $finalDirectory = USER_IMAGE_PATH . $fileName;
        move_uploaded_file($temp_direction, $finalDirectory);
        return $fileName;
      }
  }






?>
