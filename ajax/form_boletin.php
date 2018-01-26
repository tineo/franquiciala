<?php
/**
 * Created by PhpStorm.
 * User: tineo
 * Date: 24/01/18
 * Time: 02:21 PM
 */

if(
(isset($_POST["corr"])     || array_key_exists("corr", $_POST))
) {

	include "../rutadb.php";
	header('Content-Type: application/json');

	$query = "INSERT INTO `boletin` ( `correo`)  VALUES ('%s')";
	$query = sprintf($query,
		mysql_real_escape_string($_POST["corr"])
	);

	if(mysql_query($query, $conexion)){
		http_response_code(200);
		echo json_encode(
			array(
				"msj" => "TE HAS REGISTRADO EN NUESTRO BOLETIN, ".
				         "PRONTO RECIBIRAS MAS INFORMACION."));
	}else{
		http_response_code(500);
		echo json_encode(
			array(
				"msj" => "Se produjo un error en su inscripcion"));
	}

}else{
	http_response_code(404);
}