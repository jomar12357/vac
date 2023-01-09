<?php
//si tienes certificado SSL: HTTPS:// | deja tal cual las siguientes 4 lineas
//Si no tienes SSL: HTTP:// | comenta las siguientes 4 lineas
if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === "off") {
	$location = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	header('Location: '.$location);
}

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

require 'vendor/autoload.php';
require 'constant.php';

$apy_key=SECRET_KEY;
$email = new \SendGrid\Mail\Mail(); 

//aquí va el correo y nombre del remitente // remitente creado en: app.sendgrid.com
$email->setFrom("insert@remitente.com", "insert name remitente");
//Asunto del correo
$email->setSubject("Esta es una prueba");
//aquí va el correo y nombre del destinatario
$email->addTo("insert@destinatario.com", "insert name destinatario");
//conteniado del correo / Solo texto plano
$email->addContent("text/plain", "insert text here");
//conteniado del correo / Solo texto HTML
$email->addContent(
    "text/html", 
    "
    	<link href='' rel='stylesheet'>
	    <strong>
	    	insert text here
	    </strong>
	    <br>
	    <strong>Dirección IP: </strong>".$_SERVER['REMOTE_ADDR']."
	    <strong>Raíz: </strong>".$_SERVER['DOCUMENT_ROOT']."
	    <strong>URL: </strong>".$_SERVER['HTTP_HOST']."/".$_SERVER['REQUEST_URI']."
    "
);
$sendgrid = new \SendGrid($apy_key);
try {
    $response = $sendgrid->send($email);
    //print $response->statusCode() . "\n";
    //print_r($response->headers());
    //print $response->body() . "\n";
    echo json_encode($response->statusCode());
} catch (Exception $e) {
    echo 'Caught exception: '. $e->getMessage() ."\n";
}

?>
