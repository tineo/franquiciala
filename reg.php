<?php
/**
 * Created by PhpStorm.
 * User: tineo
 * Date: 25/01/18
 * Time: 10:06 PM
 */

if($_SERVER["REQUEST_METHOD"] == "POST"){
	if(
		(isset($_POST["username"])   || array_key_exists("username", $_POST)) &&
		(isset($_POST["password"])  || array_key_exists("password", $_POST)) &&
		(isset($_POST["email"]) || array_key_exists("email", $_POST))) {

		include "rutadb.php";

		$query = "INSERT INTO `usuario` ( `username`, `password`, `email`, `idfranqui`) 
 					VALUES ('%s','%s','%s','%s')";
		$query = sprintf($query,
			mysql_real_escape_string($_POST["username"]),
			password_hash(mysql_real_escape_string($_POST["password"]),PASSWORD_DEFAULT),
			mysql_real_escape_string($_POST["email"]),
			mysql_real_escape_string($_POST["fid"])
		);

		if(mysql_query($query, $conexion)){
			$id = mysql_insert_id();
			http_response_code(200);
			echo "<h2>Usuario registrado {$id}</h2>";
		}
	}

}

?>

<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Registro</title>
</head>
<body>
<h6>Registrar</h6>
<form method="post">
	<input name="username" placeholder="username" required />
	<input name="password" type="password" placeholder="password" required />
	<input name="email" type="email" placeholder="email" required />
	<input name="fid" type="number" placeholder="franquicia id" required />
	<input type="submit" value="Registrar" />
</form>
</body>
</html>
