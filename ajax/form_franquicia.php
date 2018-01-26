<?php
/**
 * Created by PhpStorm.
 * User: tineo
 * Date: 24/01/18
 * Time: 03:13 PM
 */

if((isset($_POST["nom"])   || array_key_exists("nom", $_POST)) &&
   (isset($_POST["ape"])  || array_key_exists("ape", $_POST)) &&
   (isset($_POST["ema"])     || array_key_exists("ema", $_POST)) &&
   (isset($_POST["tel"])  || array_key_exists("tel", $_POST)) &&
   (isset($_POST["pai"])   || array_key_exists("pai", $_POST)) &&
   (isset($_POST["ciu"])     || array_key_exists("ciu", $_POST)) &&
   (isset($_POST["eda"])     || array_key_exists("eda", $_POST)) &&
   (isset($_POST["inv"])     || array_key_exists("inv", $_POST)) &&
   (isset($_POST["idfran"])     || array_key_exists("idfran", $_POST)) &&
   (isset($_POST["nfran"])     || array_key_exists("nfran", $_POST)) &&
   (isset($_POST["det"]) || array_key_exists("det", $_POST))) {

	global $destinatario;
	// usar tu plantilla :v
	include_once ('../sendmail.php');
	$sent = false; //estado del envio

	//usare meowler para no usar mailserver
	//Es para poder enviar mails sin mail() sobre smtp
	//La magia
	try{
		if(!empty(getenv("SENDGRID_API_KEY")) || !mail($destinatario,$asunto,$cuerpo,$headers)){
			include_once ('meowler.php');
			if(empty($destinatario)) {$destinatario = "itsudatte01@gmail.com";}
			if(meow($destinatario,$asunto,$cuerpo,$headers)){
				$sent = true;
			}
		}else{
			$sent = true;
		}
	}catch (Exception $e){

	}
	//en caso de no usar meowler :D borrar el include y demas y descomentar
	//la siguiente linea
	//if(mail($destinatario,$asunto,$cuerpo,$headers)){ $sent = true; }

	if($sent){
		header('Content-Type: application/json');
		http_response_code(200);
		echo json_encode(
			array(
				"msj" => "GRACIAS POR CONTACTAR CON {$var2} A TRAVEZ".
				         "DE FRANQUICIALA, PRONTO SE PONDRAN EN CONTACTO"));
	}else{
		header('Content-Type: application/json');
		http_response_code(500);
		echo json_encode(
			array(
				"msj" => "ALGO SALIO MAIL CON SU EMAIL. VERIFIQUE SU CUENTA"));
	}


}else{
	http_response_code(404);
}