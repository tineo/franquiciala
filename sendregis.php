<?
$destinatario = $_POST['email'];

$asunto = "PRE-REGISTRO FRANQUICIA";

$cuerpo = '

<html>

<head>
</head>

<body>

<h1><img src="http://franquiciala.com/es/img/logo.png" width="302" height="54"></h1>

<p><span class="textopeque">Saludos, ha realizado el pre-registro como franquicia, a continuacion la iformacion:</span><br>
  <br>
  <br>DATOS DEL CONTACTO<br>
  NOMBRE: '.$_POST[nombre].' '.$_POST[apellido].'<br>
  CARGO : '.$_POST[pai].' / '.$_POST[ciu].'<br>
  CORREO : '.$_POST[cargo].'<br>
  TELEFONO : '.$_POST[telefono].' años<br>
  <br>DATOS DE LA EMPRESA<br>
  NOMBRE : '.$_POST[empresa].'<br>
  MARCA :<br>'.$_POST[marca].'<br>
  WEB :<br>'.$_POST[web].'<br>
  ACTIVIDAD COMERCIAL :<br>'.$_POST[activ].'
  <br><br>
      <span class="textopeque">Pronto nos pondremos en contacto para procesar el roceso de registro, agradecemos su preferencia.<br>
	  No responda a este mensaje, este mensaje es enviado por nuestro sistema automatico de avisos.<br><br>
      Somos FRANQUICIALA, estamos para impulsar la expansion de tu franquicia.
</p>
</body>
</html>

';

//para el envío en formato HTML

$headers = "MIME-Version: 1.0\r\n";

$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";



//dirección del remitente

$headers .= "From: Franquiciala - PRE-REGISTRO <robot@franquiciala.com>\r\n";



//dirección de respuesta, si queremos que sea distinta que la del remitente

$headers .= "Reply-To: robot@franquiciala.com\r\n";



//ruta del mensaje desde origen a destino

//$headers .= "Return-path: holahola@desarrolloweb.com\r\n";



//direcciones que recibián copia

//$headers .= "Cc: maria@desarrolloweb.com\r\n";



//direcciones que recibirán copia oculta

$headers .= "Bcc: yvelasquezq@gmaiL.com\r\n";



mail($destinatario,$asunto,$cuerpo,$headers)



?>

<META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">