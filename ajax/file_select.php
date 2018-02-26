<?php
/**
 * Created by PhpStorm.
 * User: tineo
 * Date: 25/02/18
 * Time: 11:38 PM
 */
$method = $_SERVER['REQUEST_METHOD'];
session_start();
if('POST' === $method){
//descripcionfoto

    include "../rutadb.php";
    $query = "UPDATE `franquicias` SET descripcionfoto = '%s' WHERE `idfranquicia` = '%s' ";
    $query = sprintf( $query,
        mysql_real_escape_string( $_POST["foto"] ),
        mysql_real_escape_string( $_SESSION['fid'] )
    );
    $resultado = mysql_query($query,$conexion);


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