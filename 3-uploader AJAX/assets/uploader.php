<?php

//echo "Hola desde el servidor";
//var_dump($_FILES);

if (isset($_FILES["file"])) {
  $name = $_FILES["file"]["name"];
  $file = $_FILES["file"]["tmp_name"];
  $error = $_FILES["file"]["error"];
  $destination = "../file/$name";
  $upload = move_uploaded_file($file, $destination);

  if ($upload) {
    $res = array('error' => false, 'status' => http_response_code(200), 'statusText' => "Archivo $name cargado con exito", 'files' => $_FILES["file"]);
  } else {
    $res = array('error' => true, 'status' => http_response_code(400), 'statusText' => "Ocurrio un error en el archivo $name", 'files' => $_FILES["file"]);
  }

  echo json_encode($res);
}
