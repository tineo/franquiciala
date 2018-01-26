<?php
/**
 * Created by PhpStorm.
 * User: tineo
 * Date: 24/01/18
 * Time: 02:21 PM
 */

if(
  (isset($_POST["nombre"])   || array_key_exists("nombre", $_POST)) &&
  (isset($_POST["apellido"])  || array_key_exists("apellido", $_POST)) &&
  (isset($_POST["email"])     || array_key_exists("email", $_POST)) &&
  (isset($_POST["comentarios"]) || array_key_exists("comentarios", $_POST))) {


	include "../rutadb.php";
	header('Content-Type: application/json');

	$query = "INSERT INTO `mmcontacto` ( `nombre`, `apellido`, `telefono`, `correo`, `mensaje`)  VALUES ('%s', '%s', '%s', '%s', '%s')";
	$query = sprintf($query,
		mysql_real_escape_string($_POST["nombre"]),
		mysql_real_escape_string($_POST["apellido"]),
		mysql_real_escape_string($_POST["telefono"]),
		mysql_real_escape_string($_POST["email"]),
		mysql_real_escape_string($_POST["comentarios"])
	);

	if(mysql_query($query, $conexion)){
		http_response_code(200);
		echo json_encode(
			array(
				"msj" => "GRACIAS POR CONTACTARNOS, ".
				         "EN BREVE UN REPRESENTANTE LO CONTACTARA."));
	}else{
		http_response_code(500);
		echo json_encode(
			array(
				"msj" => "ERROR"));
	}

}else{
  http_response_code(200);
}