<? include("rutadb.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <title>FranquiciaLA</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Philosopher:400,400italic,700,700italic' rel='stylesheet' type='text/css'>

    <!--IMAGEN-->
	<link href="js/owl.carousel.css" rel="stylesheet">

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

    <!--estilos galería-->
    <style>
      ul {         
          padding:0 0 0 0;
          margin:0 0 0 0;
      }
      ul li {     
          list-style:none;           
      }
      ul li img {
          cursor: pointer;
      }
      .modal-dialog img {
          text-align:center;
          margin:0 auto;
      }
    .controls{          
        width:50px;
        display:block;
        font-size:11px;
        padding-top:8px;
        font-weight:bold;          
      }
      .next {
          float:right;
          text-align:right;
      }
        /*override modal for demo only*/
        .modal-dialog {
            max-width:500px;
            padding-top: 90px;
        }
        @media screen and (min-width: 768px){
            .modal-dialog {
                width:500px;
                padding-top: 90px;
            }          
        }
        @media screen and (max-width:1500px){
            #ads {
                display:none;
            }
        }
    </style>
    <!--fin estilos galería-->

</head> 

<body>

<!--buscador-->
<?php include("builder/buscador_.php"); ?>
<!--fin buscador-->

<!--header-->
<?php include("builder/header.php"); ?>
<!--fin header-->

<!--contenido-->
<? $provee = mysql_query("Select pr.nombre, pr.logo, pr.descripcion, pr.presidente, pr.correo, pr.telefono, pr.direccion, pr.ciudad, (p.nombre) nompais, (c.nombre) nomcate From proveedores pr, paises p, categorias c Where idpro='$_GET[idp]' and pr.idpais=p.idpais and pr.idcat=c.idcat",$conexion) or die("Problemas en el select:".mysql_error());
	while ($proveed=mysql_fetch_array($provee))
	{ ?>
<div class="container">
  <hr>
  <div style="padding-bottom:20px;">
    <span class="fa-stack fa-2x" style="color:#fc9a00;">
      <i class="fa fa-circle fa-stack-2x"></i>
      <i class="fa fa-thumbs-o-up fa-stack-1x fa-inverse"></i>
    </span>
    <span style="font-size:24px;"><? echo $proveed['nombre']; ?></span>
  </div>
  <div>
    <img src="img/logos-proveedores/<? echo $proveed['logo']; ?>" style="float:left; padding:0 15px 15px 0; max-width:350px;">
    <span class="descFran" style="text-align: justify;">
      <p><strong><? echo $proveed['idcat']; ?></strong></p>
      <br>
      <p><? echo $proveed['descripcion']; ?></p>
    </span>
  </div>
</div>

<div class="container">
	<!--Titulo Referencias-->
	<div style="padding-bottom:15px;" class="descFran" align="left">
        <span class="fa-stack fa-1x" style="color:#fc9a00;">
          <i class="fa fa-circle fa-stack-2x"></i>
          <i class="fa fa-camera-retro fa-stack-1x fa-inverse"></i>
        </span>
        <span style="font-size:18px; color:#fc9a00;">Referencias</span>
	</div>
    <!--Fin de Titulo Referencias-->
	<!--Galeria-->
      <div id="demo">
        <div class="container">
          <div class="row">
            <div class="span12">

              <div id="owl-demo" class="owl-carousel">
	<? $fotga = mysql_query("Select * From fotosgal Where tipo='p' and idfranquicia='$_GET[idp]'",$conexion) or die("Problemas en el select:".mysql_error());
	while ($fotgal=mysql_fetch_array($fotga))
	{
		echo '<div class="item"><img src="img/galeria/'.$fotgal['enlace'].'" title="'.$fotgal['nombre'].'" alt="'.$fotgal['nombre'].'"></div>';
	}?>
              </div>
              
            </div>
          </div>
        </div>
      </div>
	<!--Fin Galeria-->
<hr>    
  <div style="clear:both;"></div>
  <!--Acordeon-->
  <div class="col-md-6 col-sm-6 col-xs-12 descFran">
  <div class="panel-group descFran" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="panel panel-default">
      <div class="panel-heading" role="tab" id="headingOne">
        <h4 class="panel-title">
          <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Servicios
          </a>
        </h4>
      </div>
<? 	$ser = mysql_query("Select * From servicios Where id='$_GET[idp]'",$conexion) or die("Problemas en el select:".mysql_error());
	$totalserv = mysql_num_rows($ser);
	if ($totalserv!='') { ?>      
      <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
        <div class="panel-body">
        <ul class="fa-ul">
          <p>
				<? while ($serv=mysql_fetch_array($ser))
				{
					echo '<li><i class="fa-li fa fa-check-square"></i>'.$serv['servicio'].'</li><br>';
				}?>
          </p>
		</ul>
        </div>
      </div>
    </div>
	<? }
	$preg = mysql_query("Select * From preguntas Where tipo='p' and id='$_GET[idp]'",$conexion) or die("Problemas en el select:".mysql_error());
	$totalpreg = mysql_num_rows($preg);
	if ($totalpreg!='') {
	?>

    <div class="panel panel-default">
      <div class="panel-heading" role="tab" id="headingTwo">
        <h4 class="panel-title">
          <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            Preguntas Frecuentes
          </a>
        </h4>
      </div>
      <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
        <div class="panel-body">
        <ul class="fa-ul">
          <p>
				<? while ($pregun=mysql_fetch_array($preg))
				{
					echo '<li><i class="fa-li fa fa-check-square"></i><strong>'.$pregun['preg'].'</strong><br>'.$pregun['resp'].'</li><br>';
				}?>
          </p>
		</ul>
        </div>
      </div>
    </div>
    <? } ?>
    
  </div>
  </div>
  <!--fin Acordeon-->
  <!--Acordeon-->
  <div class="col-md-6 col-sm-6 col-xs-12 descFran">
  <div class="panel-group descFran" id="accordion1" role="tablist" aria-multiselectable="true">
    <div class="panel panel-default">
      <div class="panel-heading" role="tab" id="headingThree">
        <h4 class="panel-title">
          <a role="button" data-toggle="collapse" data-parent="#accordion1" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
            Informaci&ouml;n
          </a>
        </h4>
      </div>
      <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
        <div class="panel-body">
              <p><strong>Categoria:</strong> <? echo $proveed['nomcate']; ?></p>
              <p><strong>Presidente:</strong> <? echo $proveed['presidente']; ?></p>
              <p><strong>Correo:</strong> <? echo $proveed['correo']; ?></p>
              <p><strong>Tel&eacute;fono:</strong> <? echo $proveed['telefono']; ?></p>
              <p><strong>Direcci&ouml;n:</strong> <? echo $proveed['direccion']; ?></p>
              <p><strong>Ciudad:</strong> <? echo $proveed['ciudad']; ?></p>
              <p><strong>Pais:</strong> <? echo $proveed['nompais']; ?></p>
        </div>
      </div>
    </div>

  </div>
  </div>
<? } ?>
  <!--fin Acordeon-->
</div>
<!--fin contenido-->

<!--footer-->
<?php include("builder/footer.php"); ?>
<!--fin footer-->

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script src="bootstrap/js/bootstrap.js"></script>
<script src="bootstrap/js/photo-gallery.js"></script>

<script type="text/javascript">
$(function(){
  $('#menu5').addClass('menuSecOn');
});
</script>

<!--ARCHIVOS DE GALERIA-->
    <script src="js/jquery-1.9.1.min.js"></script> 
    <script src="js/owl.carousel.js"></script>
    
    <style>
    #owl-demo .item{
        margin: 3px;
    }
    #owl-demo .item img{
        display: block;
        width: 100%;
        height: auto;
    }
    </style>

    <script>
    $(document).ready(function() {
      $("#owl-demo").owlCarousel({
        autoPlay: 3000,
        items : 5,
        itemsDesktop : [1199,3],
        itemsDesktopSmall : [979,3]
      });
    });
    </script>
<!--FIN DE ARCHIVOS-->

        <!-- Javascript SIRVE PARA MODAL DE LOGIN -->
        <!-- <script src="assets/js/jquery-1.11.1.min.js"></script> CAUSA CONFLICTO CON DESTACADOS -->
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>

</html> 