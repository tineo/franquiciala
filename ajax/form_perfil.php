<?
/**
 * Created by PhpStorm.
 * User: tineo
 * Date: 24/01/18
 * Time: 09:13 PM
 */

//descripcion
//correo
//web*
//video

//anoinicio
//nompais
//paises
//unidades
//expansion

//canon
//inversionini
//regalia
//cuotapublic
//capitalreq

//duracion
//experiencia
//localtam
//personalreq
//ubicacion

session_start();
if(
	(isset($_POST["descripcion"])   || array_key_exists("descripcion", $_POST)) &&
	(isset($_POST["correo"])  || array_key_exists("correo", $_POST)) &&
	(isset($_POST["video"])     || array_key_exists("video", $_POST)) /*&&

	(isset($_POST["anoinicio"])     || array_key_exists("anoinicio", $_POST)) &&
	(isset($_POST["nompais"])     || array_key_exists("nompais", $_POST)) &&
	(isset($_POST["paises"])  || array_key_exists("paises", $_POST)) &&
	(isset($_POST["unidades"])   || array_key_exists("unidades", $_POST)) &&
	(isset($_POST["expansion"])     || array_key_exists("expansion", $_POST)) &&

	(isset($_POST["canon"])     || array_key_exists("canon", $_POST)) &&
	(isset($_POST["inversionini"])  || array_key_exists("inversionini", $_POST)) &&
	(isset($_POST["regalia"])   || array_key_exists("regalia", $_POST)) &&
	(isset($_POST["cuotapublic"])     || array_key_exists("cuotapublic", $_POST)) &&
	(isset($_POST["capitalreq"])     || array_key_exists("capitalreq", $_POST)) &&

	(isset($_POST["duracion"])     || array_key_exists("duracion", $_POST)) &&
	(isset($_POST["experiencia"])  || array_key_exists("experiencia", $_POST)) &&
	(isset($_POST["localtam"])   || array_key_exists("localtam", $_POST)) &&
	(isset($_POST["personalreq"])     || array_key_exists("personalreq", $_POST)) &&
	(isset($_POST["ubicacion"]) || array_key_exists("ubicacion", $_POST))*/) {

	include "../rutadb.php";
	header('Content-Type: application/json');

	$query = "UPDATE `franquicias` SET descripcion = '%s', correo = '%s', video = '%s'  WHERE idfranquicia = '%s'";
	$query = sprintf($query,
		mysql_real_escape_string($_POST["descripcion"]),
		mysql_real_escape_string($_POST["correo"]),
		mysql_real_escape_string($_POST["video"]),
		mysql_real_escape_string($_SESSION['fid'])
	);

	if(mysql_query($query, $conexion)){
		http_response_code(200);
		echo json_encode(
			array(
				"msj" => "SE ACTUALIZO LOS DATOS"));
	}else{
		http_response_code(500);
		echo json_encode(
			array(
				"msj" => "Se produjo un error en su inscripcion"));
	}

}else{
	http_response_code(404);
}

?>