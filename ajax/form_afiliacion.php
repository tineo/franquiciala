<?
/**
 * Created by PhpStorm.
 * User: tineo
 * Date: 24/01/18
 * Time: 09:13 PM
 */

//nombre
//apellido
//cargo
//email
//telefono
//empresa
//marca
//web
//actividad (activ)

if(
	(isset($_POST["nombre"])   || array_key_exists("nombre", $_POST)) &&
	(isset($_POST["apellido"])  || array_key_exists("apellido", $_POST)) &&
	(isset($_POST["cargo"])     || array_key_exists("cargo", $_POST)) &&
	(isset($_POST["email"])     || array_key_exists("email", $_POST)) &&
	(isset($_POST["telefono"])  || array_key_exists("telefono", $_POST)) &&
	(isset($_POST["empresa"])   || array_key_exists("empresa", $_POST)) &&
	(isset($_POST["marca"])     || array_key_exists("marca", $_POST)) &&
	(isset($_POST["activ"]) || array_key_exists("activ", $_POST))) {

	// usar tu plantilla :v
	include_once ('../sendregis.php');
	$sent = false; //estado del envio

	//usare meowler para no usar mailserver
	//Es para poder enviar mails sin mail() sobre smtp
	//La magia
	try{
		if(!mail($destinatario,$asunto,$cuerpo,$headers)){
			include_once ('meowler.php');
			if(empty($destinatario)) $destinatario = "itsudatte01@gmail.com";
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
				"msj" => "GRACIAS POR CONFIRAR NOSOTROS, ".
				         "PRONTO NOS PONDREMOS EN CONTACTO ;-)"));
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

?>