<?
	require ("bache.php");

	$var1 = $_SESSION["NOMBRE"];
	$var2 = $_POST['emaili'];
//$destinatario = yoel.velasquez@gmai.com;
$destinatario = $var2;
$asunto = "dtodoaqui.com - Invitación";
$cuerpo = '
<link rel="stylesheet" type="text/css" href="http://www.dtodoaqui.com/site/css/estilos.css"/>
<body>
<p><img src="http://www.dtodoaqui.com/site/images/Logo.png" width="220" height="70"></p>
<p><span class="textopeque">Que tal, <a href="mailto:'.$var2.'" class="SubTitulo">'.$var2.'</a><br><br>
Soy <strong class="SubTitulo">'.$var1.'</strong>, Te envío esta invitación a través de dtodoaqui.com<br>
Más que una invitación es una recomendación.<br><br>
<strong class="SubTitulo">¿Qué es dtodoaqui.com?</strong><br>
dtodoaqui.com es servicio consumible a través de su página web dtodoaqui.com y pronto también desde tu celular.<br>
<br>
En dtodoaqui.com puedes realizar búsqueda de lugares y establecimientos por tu preferencia si buscas un hotel, un cine, un restaurant, ceviche, un gustito o simplemente una playa ya sea de estacionamiento o de arena la encontraras aqui.<br>
<br>
Nuestro objetivo es brindarte información según tu preferencia de búsqueda ya que en dtodoaqui.com podrás encontrar el lugar o establecimiento que tenga lo que necesitas.<br>
<br>
dtodoaqui.com es colaborativo ya nuestros usuarios registrados, nuestro equipo de registro y verificación y los dueños de los propios establecimientos alimentan de información al buscador para obtener búsquedas con mejores resultados.<br>
<br>
En dtodoaqui.com no solo registras lugares y establecimientos si no que interactúas con estos, brindando comentarios, calificaciones de esta forma al ver los resultados de búsqueda sabrás que lugar o establecimiento es más recomendado o brinda el mejor servicio.<br>
<br>
Podrás divertirte conversando con tus amigos y conociendo personas que tengan el mismo interés mediante nuestra plataforma de conversación en linea y de amigos.<br>
<br>
dtodoaqui.com para ti y nuestros usuarios colaboran para mejorar constantemente el servicio.<br>
<br>
Esta invitación fue enviada voluntariamente por '.$var1.', dtodoaqui solo está disponible para registro bajo invitaciones.<br>
<br>
Te invitamos a registrarte haciendo clic <a href="http://www.dtodoaqui.com/site/" class="SubTitulo">AQUI</a>.<br>
<br>
  Atte.<br>
  <br>
  Equipo dtodoaqui<br>
  Latinoamérica<br>
  <a href="http://www.dtodoaqui.com" class="SubTitulo">www.dtodoaqui.com</a><br>
  <br>
  Para mayor información puedes escribirnos a <a href="mailto:info@dtodoaqui.com" class="SubTitulo">info@dtodoaqui.com</a> o también a <a href="mailto:soporte@dtodoaqui.com" class="SubTitulo">soporte@dtodoaqui.com</a>
</span></p>
</body>
';

//para el envío en formato HTML
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=utf-8\r\n";

//dirección del remitente
$headers .= "From: dtodoaqui.com <robot@dtodoaqui.com>\r\n";

//dirección de respuesta, si queremos que sea distinta que la del remitente
$headers .= "Reply-To: robot@dtodoaqui.com\r\n";

//ruta del mensaje desde origen a destino
//$headers .= "Return-path: holahola@desarrolloweb.com\r\n";

//direcciones que recibián copia
//$headers .= "Cc: maria@desarrolloweb.com\r\n";

//direcciones que recibirán copia oculta
//$headers .= "Bcc: yvelasquez@ks.comp.pe,juan@juan.com\r\n";

mail($destinatario,$asunto,$cuerpo,$headers)
?> 
<div class="textopeque">Tu invitacion fue enviada a <? echo $_POST['emaili']; ?>, sigue contibuyendo con dtodoaqui pronto habran novedades para nuestros colaboradores.</div>