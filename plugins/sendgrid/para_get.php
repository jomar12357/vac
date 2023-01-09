<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

//El nombre de mi botón type="submit" es name="send_mail"
if (isset($_GET['send_mail'])) {
	$sunto = $_GET['sunto'];
	$correo = $_GET['correo'];
	$nombre = $_GET['nombre'];
	$mensaje_texto = $_GET['mensaje_texto'];
	$mensaje_html = $_GET['mensaje_html'];

	require 'vendor/autoload.php';
	require 'constant.php';

	$apy_key=SECRET_KEY;
	$email = new \SendGrid\Mail\Mail(); 

	//aquí va el correo y nombre del remitente // remitente creado en: app.sendgrid.com
	$email->setFrom("insert@remitente.com", "insert name remitente");
	//Asunto del correo
	$email->setSubject($asunto);
	//aquí va el correo y nombre del destinatario
	$email->addTo($correo, $nombre);
	//conteniado del correo / Solo texto plano
	$email->addContent("text/plain", $mensaje_texto);
	//conteniado del correo / Solo texto HTML
	$email->addContent(
	    "text/html", 
	    "
    		<link href='' rel='stylesheet'>
		    ".$mensaje_html."
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
}

?>
