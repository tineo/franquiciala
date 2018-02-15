<?php
/**
 * Created by PhpStorm.
 * User: tineo
 * Date: 23/01/18
 * Time: 08:16 PM
 */
//echo password_hash("pass",PASSWORD_DEFAULT);
//exit();
if(isset($_POST["uname"])&&isset($_POST["pswd"])){
  //session_start();
  include '../rutadb.php';

  $query = sprintf("SELECT * FROM usuario WHERE username='%s' ",
    mysql_real_escape_string($_POST["uname"]));

  $q = mysql_query($query, $conexion) or die("Problemas en el select:".mysql_error());
  if ($rs = mysql_fetch_array($q))
  {
    if(password_verify ( $_POST["pswd"] , $rs["password"])){
      session_start();
      //json_encode($rs);
      $_SESSION['uid']  = $rs["id"];
      $_SESSION['fid']  = $rs["idfranqui"];
      http_response_code(200);
    }else{
    	http_response_code(403);
    }

  }else{
      http_response_code(403);
  }
}else{
	http_response_code(404);
}


