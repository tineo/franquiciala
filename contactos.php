<? include("rutadb.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <title>FranquiciaLA</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Philosopher:400,400italic,700,700italic' rel='stylesheet' type='text/css'>


    <!-- Meta -->
	<?php include("metacod.php"); ?>

    <script src="bootstrap/js/jquery-1.7.min.js" type="text/javascript"></script>

    <script type="text/javascript">
      $(function(){
        $('#ctMostrarBuscador').click(function(){
          $('#ctBuscador').toggle('slow');
          $('#ctBtnBuscador').hide();
        });     
        $('#ctMostrarBtnBuscador').click(function(){
          $('#ctBtnBuscador').toggle('slow');
          $('#ctBuscador').hide();
        });
      });
    </script>


</head> 
<body>

<!--buscador-->
<?php include("builder/buscador.php"); ?>
<!--fin buscador-->

<!--header-->
<?php include("builder/header.php"); ?>
<!--fin header-->
<? $cont = mysql_query("Select * From infoweb Where idinfo='1'",$conexion) or die("Problemas en el select:".mysql_error());
	while ($contacto=mysql_fetch_array($cont))
	{ ?>
<!--mapa-->
  <div class="overlay" onClick="style.pointerEvents='none'"></div>
  <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m8!1m3!1d4640.322120347381!2d-77.08119596533143!3d-12.041439354376822!3m2!1i1024!2i768!4f13.1!4m6!3e6!4m0!4m3!3m2!1d-12.0418948!2d-77.0836839!5e0!3m2!1ses!2sus!4v1448482188576" width="100%" height="350" frameborder="0" style="border:0"></iframe>
<!--fin mapa-->
        <hr>
<!--contenido-->
<div class="container">
  
  <div style="padding-bottom:20px;">
    <span class="fa-stack fa-2x" style="color:#fc9a00;">
      <i class="fa fa-circle fa-stack-2x"></i>
      <i class="fa fa-map-marker fa-stack-1x fa-inverse"></i>
    </span>
    <span style="font-size:24px; ">Contactos</span>
  </div>
  <div class="descFran">
  <p><? echo $contacto['mmscontacto']; ?></p>
  <div class="row" style="padding-top:20px;">
    <div class="col-md-4 col-ms-6 col-xs-12">
      <p><strong>Informaci&oacute;n General</strong></p>
      <? echo $contacto['direccion']; ?>
      <br><br>
      <i class="fa fa-headphones"></i>&nbsp;&nbsp;<? echo $contacto['central']; ?><br>
      <i class="fa fa-envelope"></i>&nbsp;&nbsp;<? echo $contacto['mail1']; ?><br>
      <i class="fa fa-envelope"></i>&nbsp;&nbsp;<? echo $contacto['mail2']; ?><br>
      <i class="fa fa-globe"></i>&nbsp;&nbsp;<? echo $contacto['web1']; ?><br>
      <i class="fa fa-globe"></i>&nbsp;&nbsp;<? echo $contacto['web2']; ?><br>
      <br>
      <p><strong>Horario</strong></p>
      <i class="fa fa-clock-o"></i>&nbsp;&nbsp;<? echo $contacto['hora1']; ?><br>
      <i class="fa fa-clock-o"></i>&nbsp;&nbsp;<? echo $contacto['hora2']; ?><br><br><br>
    </div>
    <div class="col-md-8 col-ms-6 col-xs-12">
      <!--form-->
      <div style="padding-bottom:25px;">
        <span class="fa-stack fa-1x" style="color:#fc9a00;">
          <i class="fa fa-circle fa-stack-2x"></i>
          <i class="fa fa-list-alt fa-stack-1x fa-inverse"></i>
        </span>
        <span style="font-size:18px; color:#fc9a00;">Escribenos</span>
        &nbsp;&nbsp;&nbsp;&nbsp;
        <span class="small">(*) Datos requeridos obligatoriamente.</span>
      </div>
<form id="form1" name="form1" method="post" action="contactos.php">
      <div class="row">
        <div class="col-md-6 col-sm-6" style="padding:5px;"><input name="nom" type="text" class="form-control" placeholder="Nombre(s) (*)" required></div>
        <div class="col-md-6 col-sm-6" style="padding:5px;"><input name="ape" type="text" class="form-control" placeholder="Apellidos (*)" required></div>
        <div class="col-md-6 col-sm-6" style="padding:5px;"><input name="tel" type="text" class="form-control" placeholder="Tel&eacute;fono"></div>
        <div class="col-md-6 col-sm-6" style="padding:5px;"><input name="ema" type="text" class="form-control" placeholder="Correo electr&ouml;nico (*)" required></div>
        <div class="col-md-12 col-sm-12" style="padding:5px;"><textarea name="mms" class="form-control" placeholder="Comentarios" rows="3" required></textarea></div>
        <div style="clear:both;"></div>
        <div align="center" style="padding:20px;">
        	<input type="hidden" value="1" name="regmms">
        	<button class="btn btn-warning" type="submit">Enviar</button> <button class="btn btn-default" type="submit">Limpiar</button>
        </div>
      </div>
</form>
      <!--fin form-->
    </div>
  </div>
  </div>
</div>
<? } ?>
<!--fin contenido-->

<!--footer-->
<?php include("builder/footer.php"); ?>
<!--fin footer-->

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script src="bootstrap/js/bootstrap.js"></script>

<script type="text/javascript">
$(function(){
  $('#menu4').addClass('active');
});
</script>

        <!-- Javascript SIRVE PARA MODAL DE LOGIN -->
        <!-- <script src="assets/js/jquery-1.11.1.min.js"></script> CAUSA CONFLICTO CON DESTACADOS -->
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>

</html>
<?
//Insertar email boletin
if ($_POST['regmms']=='1') {
	mysql_query("INSERT INTO `mmcontacto` ( `nombre`, `apellido`, `telefono`, `correo`, `mensaje`)  VALUES ('$_POST[nom]', '$_POST[ape]', '$_POST[tel]', '$_POST[ema]', '$_POST[mms]')",	$conexion) or die("Problemas en el select".¿mysql_error());
}
?>