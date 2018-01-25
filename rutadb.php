<?PHP

/* Config Heroku cleardb*/
if(!empty(getenv("CLEARDB_DATABASE_URL"))){
  $url = parse_url(getenv("CLEARDB_DATABASE_URL"));

  $server = $url["host"];
  $username = $url["user"];
  $password = $url["pass"];
  $db = substr($url["path"], 1);

  $conexion = mysql_connect($server, $username, $password) or die("Problemas en la conexion");
  mysql_select_db($db, $conexion) or die("Problemas en la selecci&oacute;n de la base de datos");
  /* Config Heroku cleardb*/
} else {

  $conexion = mysql_connect("localhost", "root", "megamisama") or die("Problemas en la conexion");
  mysql_select_db("franquiciala", $conexion) or die("Problemas en la selecci&oacute;n de la base de datos");
}
?>