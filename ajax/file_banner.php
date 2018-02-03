<?php
/**
 * Created by PhpStorm.
 * User: tineo
 * Date: 30/01/18
 * Time: 11:24 PM
 */

$ds          = DIRECTORY_SEPARATOR;  //1

$storeFolder = '../img/banners';   //2

$method = $_SERVER['REQUEST_METHOD'];

if ('GET' === $method) {

	include "../rutadb.php";
	$query = "SELECT * FROM `banner` WHERE `id` = '%s' ";
	$query = sprintf( $query,
		//mysql_real_escape_string($_GET["idfranquicia"]),
		mysql_real_escape_string( "2" )
	);
	$resultado = mysql_query($query,$conexion);

	if (!$resultado) {
		$mensaje  = 'Consulta no válida: ' . mysql_error() . "\n";
		$mensaje .= 'Consulta completa: ' . $query;
		die($mensaje);
	}

	$data = array();
	while ($fila = mysql_fetch_array($resultado))
	{
		$path_parts = pathinfo(dirname( __FILE__ ) . $ds. $storeFolder . $ds. $fila["imagen"]);

		$data[] = array( "base" => $path_parts['basename'], "uuid" => $path_parts['filename']);

	}
	header('Content-Type: application/json');
	http_response_code(200);
	echo json_encode($data);


}else if ('DELETE' === $method) {
	parse_str(file_get_contents('php://input'), $_DELETE);
	var_dump($_DELETE);
	include "../rutadb.php";

	$query = "DELETE FROM `banner` WHERE imagen LIKE '%s' ";
	$query = sprintf($query,
		//mysql_real_escape_string($_POST["idfranquicia"]),
		mysql_real_escape_string($_DELETE["uuid"])."%" //tipo
	);
	if(mysql_query($query, $conexion)){

		$targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;
		//$targetFile =  $targetPath. $_FILES['file']['name'];  //5
		$targetFile =  $targetPath. $_DELETE['uuid'];

		array_map('unlink', glob($targetFile.".*"));

		header('Content-Type: application/json');
		http_response_code(200);
		echo json_encode(
			array("uuid" => $_DELETE['uuid'])
		);
	}

}else if('POST' === $method){

	if (!empty($_FILES)) {

		$tempFile = $_FILES['file']['tmp_name'];
		$path = $_FILES['file']['name'];//3
		$ext = pathinfo($path, PATHINFO_EXTENSION);
		$newfilename = $_POST['uuid']. ".".$ext;
		$targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;  //4

		//$targetFile =  $targetPath. $_FILES['file']['name'];  //5
		$targetFile =  $targetPath. $newfilename;  //5

		move_uploaded_file($tempFile,$targetFile); //6

		require '../vendor/autoload.php';

		try {
			$image = new \claviska\SimpleImage();
			$image
				->fromFile($targetFile)
				->autoOrient()
				->thumbnail(1920, 500)
				->toFile($targetFile);
		} catch(Exception $err) {

			echo $err->getMessage();
		}
		//echo "<pre>";
		//var_dump($_POST['uuid']);
		//exit();
		include "../rutadb.php";
		$query = "INSERT INTO `banner` ( `tipo`, `id`, `nombre`, `imagen`,`link`,`estado`,`proveedores`,`franquicias`,`noticias`)  VALUES ('%s', '%s', '%s', '%s','%s',1,0,0,0)";
		$query = sprintf($query,
			//mysql_real_escape_string($_POST["idfranquicia"]),
			mysql_real_escape_string("f"), //tipo
			mysql_real_escape_string("2"), //id fq
			mysql_real_escape_string(""), // nombre
			mysql_real_escape_string($newfilename), //imagen
			mysql_real_escape_string("") //link

		);

		if(mysql_query($query, $conexion)){
			header('Content-Type: application/json');
			http_response_code(200);
			echo json_encode(
				array(
					"uuid" => $_POST['uuid'],
					"ext" => $ext,
					"filename" => $newfilename
					//"filename" => $_FILES['file']['name'],
				));
		}





	}
}


?>