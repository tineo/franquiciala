<?php
/**
 * Created by PhpStorm.
 * User: tineo
 * Date: 25/02/18
 * Time: 11:38 PM
 */

$ds          = DIRECTORY_SEPARATOR;  //1

$storeFolder = '../img/galeria';

$method = $_SERVER['REQUEST_METHOD'];
session_start();
if('POST' === $method){
    //descripcionfoto
    $targetPath = dirname(__FILE__) . $ds . $storeFolder . $ds;
    $targetFile = $targetPath. $_POST["foto"];
    //echo $targetPath. $_POST["foto"]."<br />". $targetPath. "mini_". $_POST["foto"];
    include "../rutadb.php";
    $query = "UPDATE `franquicias` SET descripcionfoto = '%s' WHERE `idfranquicia` = '%s' ";
    $query = sprintf( $query,
        mysql_real_escape_string( $_POST["foto"] ),
        mysql_real_escape_string( $_SESSION['fid'] )
    );
    $resultado = mysql_query($query,$conexion);

    require '../vendor/autoload.php';

    list($width, $height) = getimagesize($targetFile);

    $x = 370;
    $y = 247;

    //$a = $width / $x;
    //$b = $height / $y;

    //if($a > $b) { $m = $a * $x; $n = $a * $y; } else { $m = $b * $x; $n = $b * $y; }

    try {
        //if (!copy($targetPath. $_POST["foto"], $targetPath."mini_". $_POST["foto"])) {

        $image = new \claviska\SimpleImage();
        $image
            ->fromFile($targetPath. $_POST["foto"])
            ->autoOrient()
            //->resize($x,$y)
            ->thumbnail($x,$y)
            ->toFile($targetPath."mini_". $_POST["foto"]);
        //}
    } catch(Exception $err) {

        echo $err->getMessage();
    }


}else if('GET' === $method){


    include "../rutadb.php";
    $query = "SELECT descripcionfoto as foto FROM `franquicias` WHERE `idfranquicia` = '%s' ";
    $query = sprintf( $query,
        //mysql_real_escape_string($_GET["idfranquicia"]),
        mysql_real_escape_string( $_SESSION['fid'] )
    );
    $resultado = mysql_query($query,$conexion);

    $data = array();
    if ($fila = mysql_fetch_array($resultado))
    {
        $data = array( "foto" => $fila["foto"]);
    }
    header('Content-Type: application/json');
    http_response_code(200);
    echo json_encode($data);

}