<?
include('rutadb.php');

	$consult = mysql_query("Select correo, nombre From franquicias Where idfranquicia='$_POST[idfran]'",$conexion) or die("Problemas en el select:".mysql_error());
	while ($consulta=mysql_fetch_array($consult))

	{

		$var1 = $consulta['correo'];
		$var2 = $consulta['nombre'];

//$destinatario = yoel.velasquez@gmai.com;

$destinatario = $var1;

$asunto = "AVISO DE CONTACTO";

$cuerpo = '

<link rel="stylesheet" type="text/css" href="http://www.helptech.org/kpanelx/estilos.css"/>

<link rel="stylesheet" type="text/css" href="http://www.helptech.org/kpanelx/estilos.css"/>

<html>

<head>
</head>

<body>

<h1><img src="http://franquiciala.com/es/img/logo.png" width="302" height="54"></h1>

<p><span class="textopeque">Saludos <strong>'.$var2.'</strong></span><br>
  '.$_POST[nom].' '.$_POST[ape].' ha enviado esta solicitud de contacto, a continuacion te brindamos su informacion:
  <br><br>
  CORREO: '.$_POST[ema].'<br>
  PAIS / CIUDAD: '.$_POST[pai].' / '.$_POST[ciu].'<br>
  TELEFONO : '.$_POST[tel].'<br>
  EDAD : '.$_POST[eda].' años<br>
  MONTO DE INVERSION: '.$_POST[inv].'<br>
  MENSAJE:<br>'.$_POST[det].'
  <br><br>
      <span class="textopeque">No responda a este mensaje, este mensaje es enviado por nuestro sistema automatico de avisos.<br><br>
      Somos FRANQUICIALA, estamos para impulsar la expansion de tu franquicia.
</p>
</body>
</html>

'; }



//para el envío en formato HTML

$headers = "MIME-Version: 1.0\r\n";

$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";



//dirección del remitente

$headers .= "From: Franquiciala - CONTACTO <robot@franquiciala.com>\r\n";



//dirección de respuesta, si queremos que sea distinta que la del remitente

$headers .= "Reply-To: robot@franquiciala.com\r\n";



//ruta del mensaje desde origen a destino

//$headers .= "Return-path: holahola@desarrolloweb.com\r\n";



//direcciones que recibián copia

//$headers .= "Cc: maria@desarrolloweb.com\r\n";



//direcciones que recibirán copia oculta

//$headers .= "Bcc: yvelasquez@ks.comp.pe,juan@juan.com\r\n";



mail($destinatario,$asunto,$cuerpo,$headers)



?>

<META HTTP-EQUIV="Refresh" CONTENT="0; URL=franquicias.php?idf=<? echo $_POST['idfran']; ?>&nom=<? echo $_POST['nfran']; ?>">