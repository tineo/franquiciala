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
<?php include("builder/buscador_.php"); ?>
<!--fin buscador-->

<!--header-->
<?php include("builder/header.php"); ?>
<!--fin header-->

<!--contenido-->
<div class="container">
  <hr>
  <div class="row">
	<? $grp1des = mysql_query("Select * From franquicias Where estado='1' Order by RAND() LIMIT 4",$conexion) or die("Problemas en el select:".mysql_error());
	while ($grp1dest=mysql_fetch_array($grp1des))
	{
		echo '<div class="col-md-3 col-sm-3 col-xs-6" align="center"><a href="franquicias.php?idf='.$grp1dest['idfranquicia'].'&nom='.$grp1dest['nombre'].'"><img src="img/logos-clientes/'.$grp1dest['logo'].'" alt="'.$grp1dest['nombre'].'" title="'.$grp1dest['nombre'].'" class="img-responsive clientes"></a></div>';
	} ?>
  </div>
  <hr>
  <div style="padding-bottom:20px;">
    <span class="fa-stack fa-2x" style="color:#fc9a00;">
      <i class="fa fa-circle fa-stack-2x"></i>
      <i class="fa fa-thumbs-o-up fa-stack-1x fa-inverse"></i>
    </span>
    <span style="font-size:24px; ">Afilia tu franquicia</span>
  </div>

  <div style="padding-bottom:30px;">
    <img src="img/foto_afilia.jpg" class="img-responsive" style="float:left; padding:0 15px 15px 0;">
    <span class="descFran">
      <p><strong>FRANQUICIALA</strong>, es una de las mejores plataformas del mercado en cuanto a difusi&oacute;n y promoci&oacute;n. Utilizamos t&eacute;cnicas de Marketing Digital para posicionar el nombre de su franquicia desde nuestra plataforma hacia el mundo abriendo un canal de comunicaci&oacute;n, difusi&oacute;n y promoci&oacute;n de su marca.</p>
      
<p><strong>FRANQUICIALA</strong> ofrecer&aacute; su marca y la presentara ante los ojos de emprendedores de todo el mundo con informaci&oacute;n ordenada y completa.</p>

<p>Nuestra plataforma de difusi&oacute;n y promoci&oacute;n es flexible, se adapta a los diversos dispositivos abriendo la posibilidad mostrando la informaci&oacute;n de tu franquicia clara y objetivamente ante cualquier dispositivo ya sea una PC o un equipo m&oacute;vil.</p>

<p>No somos intermediarios. Nuestro canal de comunicaci&oacute;n es directo de tal forma que usted es quien busca el trato con su <strong>franquiciante</strong>, cada contacto es enviado al correo que usted designa al momento de registrarse.</p>

<p>Nuestro proceso de registro es r&aacute;pido y confiable, usted nos env&iacute;a su informaci&oacute;n mediante nuestro formulario y nuestro equipo de registro se pondr&aacute; en contacto con usted para completar su registro.</p>

<p>Tienes muchas razones para ser parte de nuestra plataforma, inicia tu registro y desc&uacute;brelas con nuestro equipo de registro.</p>
    </span>
  </div>
<form id="form1" name="form1" method="post" action="sendregis.php">
  <div class="descFran">
    <div>
      <span class="fa-stack fa-1x" style="color:#fc9a00;">
        <i class="fa fa-circle fa-stack-2x"></i>
        <i class="fa fa-list-alt fa-stack-1x fa-inverse"></i>
      </span>
      <span style="font-size:18px; color:#fc9a00;">Pre-Registro</span>
      &nbsp;&nbsp;&nbsp;&nbsp;
      <span class="small">(*) Datos requeridos obligatoriamente.</span>
    </div>
    <div style="padding:15px 0; color:#000;">Datos de Contacto</div>
    <div class="row">
      <div class="col-md-4 col-sm-6" style="padding:5px;"><input title="Se necesita un nombre" type="text" pattern="^[_A-z0-9]{1,}$" name="nombre" class="form-control" placeholder="Nombre(s) (*)" required>    </div>
      <div class="col-md-4 col-sm-6" style="padding:5px;"><input type="text" pattern="^[_A-z0-9]{1,}$" name="apellido" class="form-control" placeholder="Apellidos (*)" required></div>
      <div class="col-md-4 col-sm-6" style="padding:5px;"><input type="text" name="cargo" class="form-control" placeholder="Cargo (*)" required></div>
      <div class="col-md-4 col-sm-6" style="padding:5px;"><input type="email" name="email" class="form-control" placeholder="Correo electr&oacute;nico (*)" required></div>
      <div class="col-md-4 col-sm-6" style="padding:5px;"><input type="number" name="telefono" class="form-control" placeholder="Tel&eacute;fono (*)" required></div>
      <div class="col-md-4 col-sm-6" style="padding:5px;"></div>
    </div>

    <div style="padding:15px 0; color:#000;">Datos de la Empresa</div>
    <div class="row">
      <div class="col-md-4 col-sm-6" style="padding:5px;"><input type="text" name="empresa" class="form-control" placeholder="Nombre de la Empresa(*)" required></div>
      <div class="col-md-4 col-sm-6" style="padding:5px;"><input type="text" name="marca" class="form-control" placeholder="Marca de la Franquicia (*)" required></div>
      <div class="col-md-4 col-sm-6" style="padding:5px;"><input type="web" name="web" class="form-control" placeholder="P&aacute;gina web"></div>
      <div class="col-md-12 col-sm-12" style="padding:5px;"><textarea name="activ" class="form-control" placeholder="Actividad comercial (*)" rows="3" required></textarea></div>
      <div style="padding:5px;"><a href="#" target="_blank" style="text-decoration:none"><button type="button" class="btn btn-danger">Ver terminos y condiciones</button></a></div>
    </div>

    <div style="clear:both;"></div>
    <div align="center" style="padding:20px;">
    	<input type="submit" name="envia" id="envia" class="btn btn-warning" value="Acepto los terminos y condiciones, registrarme">
    	<input type="reset" name="limpia" id="limpia" class="btn btn-default" value="Limpiar">
    </div>

  </div>
</form>
  </div>
<!--fin contenido-->

<!--footer-->
<?php include("builder/footer.php"); ?>
<!--fin footer-->

<!--Analitycs-->
<?php include_once("analyticstrackingfranqui.php") ?>
<!--fin Analitycs-->

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script src="bootstrap/js/bootstrap.js"></script>

<script type="text/javascript">
$(function(){
  $('#menu3').addClass('active');
});
</script>

        <!-- Javascript SIRVE PARA MODAL DE LOGIN -->
        <!-- <script src="assets/js/jquery-1.11.1.min.js"></script> CAUSA CONFLICTO CON DESTACADOS -->
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>

</html> 