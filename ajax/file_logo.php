<?php
/**
 * Created by PhpStorm.
 * User: tineo
 * Date: 30/01/18
 * Time: 11:24 PM
 */

$ds          = DIRECTORY_SEPARATOR;  //1

$storeFolder = '../img/logos-clientes';   //2

$method = $_SERVER['REQUEST_METHOD'];
session_start();
if ('GET' === $method) {

	include "../rutadb.php";
	$query = "SELECT logo FROM `franquicias` WHERE `idfranquicia` = '%s' ";
	$query = sprintf( $query,
		//mysql_real_escape_string($_GET["idfranquicia"]),
		mysql_real_escape_string( $_SESSION['fid'] )
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
		$path_parts = pathinfo(dirname( __FILE__ ) . $ds. $storeFolder . $ds. $fila["logo"]);

		$data[] = array( "base" => $path_parts['basename'], "uuid" => $path_parts['filename'], "query" => $query);

	}
	header('Content-Type: application/json');
	http_response_code(200);
	echo json_encode($data);


}else if ('DELETE' === $method) {
	parse_str(file_get_contents('php://input'), $_DELETE);
	//var_dump($_DELETE);
	include "../rutadb.php";

	$query = "UPDATE `franquicias` SET logo = '' WHERE foto LIKE '%s' ";
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
        $newfilename = $_POST['uuid'] . "." . $ext;
        $targetPath = dirname(__FILE__) . $ds . $storeFolder . $ds;  //4

        //$targetFile =  $targetPath. $_FILES['file']['name'];  //5
        $targetFile = $targetPath . $newfilename;  //5

        move_uploaded_file($tempFile, $targetFile); //6

        require '../vendor/autoload.php';

        list($width, $height) = getimagesize($targetFile);

        $x = 230;
        $y = 100;

        $a = $width / $x;
        $b = $height / $y;

        if($a > $b) { $m = $a * $x; $n = $a * $y; } else { $m = $b * $x; $n = $b * $y; }

		try {


            /*list($width, $height, $type, $attr) = getimagesize($targetFile);

            //set dimensions
            if($width> $height) {
                $width_t=$square_size;
                //respect the ratio
                $height_t=round($height/$width*$square_size);
                //set the offset
                $off_y=ceil(($width_t - $height_t)/2);
                        $off_x=0;
                } elseif($height> $width) {
                $height_t=$square_size;
                $width_t=round($width/$height*$square_size);
                $off_x=ceil(($height_t - $width_t)/2);
                        $off_y=0;
                }
            else {
                $width_t=$height_t=$square_size;
                $off_x=$off_y=0;
            }

            $thumb=imagecreatefromjpeg($targetFile);
            $thumb_p = imagecreatetruecolor($square_size, $square_size);
            //default background is black
            $bg = imagecolorallocate ( $thumb_p, 255, 255, 255 );
            imagefill ( $thumb_p, 0, 0, $bg );
            imagecopyresampled($thumb_p, $thumb, $off_x, $off_y, 0, 0, $width_t, $height_t, $width, $height);
            imagejpeg($thumb_p,$targetFile,$quality);*/




			$image = new \claviska\SimpleImage();
			$image
				->fromFile($targetFile)
				->autoOrient()
                #->resize($x,$y)
				#->thumbnail(intval($m), intval($n))
				->toFile($targetFile);
		} catch(Exception $err) {

			echo $err->getMessage();
		}
		//echo "<pre>";
		//var_dump($_POST['uuid']);
		//exit();
		include "../rutadb.php";
		$query = "UPDATE `franquicias` SET logo = '%s' WHERE idfranquicia = '%s'";

		$query = sprintf($query,
			//mysql_real_escape_string($_POST["idfranquicia"]),
			mysql_real_escape_string($newfilename),//imagen
			mysql_real_escape_string($_SESSION['fid'])//imagen

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
		}else{
		    var_dump($query);
        }





	}
}


?>