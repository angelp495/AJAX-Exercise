<?php

if (isset($_POST)) {
  //Evita que se muestren los warning o errors
  error_reporting(0);

  $name = $_POST["name"];
  $email = $_POST["email"];
  $subject = $_POST["suubject"];
  $comments = $_POST["comments"];

  $domain = $_SERVER["HTTP_HOST"];
  $to = "angeljpa95@gmail.com";
  $subject_mail = "Contacto desde el sitio $domain";
  $message = "
    <p>
    Datos enviados desde el formulario en $domain
    </p>
    <ul>
      <li>Nombre: <b>$name</b></li>
      <li>Correo: <b>$email</b></li>
      <li>Asunto: <b>$subject_mail</b></li>
      <li>Comentarios: <b>$comments</b></li>
    </ul>
  ";

  $headers = "MIME-Version: 1.0\r\n" . "Content-Type: text/html; charset=utf-8\r\n" . "From: Envio Automatico No Responder <no-reply@$domain>";

  $send_mail = mail($to, $subject_mail, $message, $headers);

  if ($send_mail) {
    $res = [
      "err" => false,
      "message" => "Tus datos han sido enviados"
    ];
  } else {
    $res = [
      "err" => true,
      "message" => "Error al enviar tus datos. Intenta nuevamente"
    ];
  }

  //CORS
  //headers("Access-Control-Allow-Origin: https://angelpineda.com");
  header("Access-Control-Allow-Origin: *");
  header("Content-type: application/json");
  echo json_encode($res);
  exit;
}
