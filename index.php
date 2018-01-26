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

    <!--estilos galer?a-->
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
    <!--fin estilos galer?a-->

</head> 

<body>

<!--buscador-->
<?php include("builder/buscador.php"); ?>
<!--fin buscador-->

<!--header-->
<?php include("builder/header.php"); ?>
<!--fin header-->

<!--slider-->
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" align="center">
  <!-- Indicators -->
  <ol class="carousel-indicators">
<? $bann = mysql_query("Select * From banner Where tipo='w' and id='1' and estado='1'",$conexion) or die("Problemas en el select:".mysql_error());
	$totbann = mysql_num_rows($bann);
	$total = $totbann-1;
	for ($i = 0; $i <= $total; $i++) {
		if  ($i==0) {
    		echo '<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>';
		} else {
			echo '<li data-target="#carousel-example-generic" data-slide-to="'.$i.'"></li>';
		}
	}
?>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">

	<?
	$prim = mysql_query("Select * From banner Where tipo='w' and id='1' and estado='1' LIMIT 1",$conexion) or die("Problemas en el select:".mysql_error());
	while ($prime=mysql_fetch_array($prim))
	{
		$vprim = $prime['idbanner'];
	}
	$bann = mysql_query("Select * From banner Where tipo='w' and id='1' and estado='1'",$conexion) or die("Problemas en el select:".mysql_error());
	while ($banne=mysql_fetch_array($bann))
	{
		if ($banne['idbanner']==$vprim) {	
			echo '<div class="item active"><a href="'.$banne['link'].'"><img src="img/banners/'.$banne['imagen'].'" alt="'.$banne['nombre'].'" title=""></a></div>';
		} else {
			echo '<div class="item"><a href="'.$banne['link'].'"><img src="img/banners/'.$banne['imagen'].'" alt="'.$banne['nombre'].'" title=""></a></div>';
		}
	} ?>

  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" style="color: #fff;"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" style="color: #fff;"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<!--fin slider-->

<!--franquicias destacadas-->
<div class="container" style="padding:15px 0;">
  <div align="center">
    <span class="fa-stack fa-2x" style="color:#fc9a00;">
      <i class="fa fa-circle fa-stack-2x"></i>
      <i class="fa fa-thumbs-o-up fa-stack-1x fa-inverse"></i>    </span>
    <span style="font-size:24px; ">Franquicias Destacadas</span>  </div>
  <!--logos destacados-->
  
  <!-- GALERIA DE FOTOS -->
      <div id="demo">
        <div class="container">
          <div class="row">
            <div class="span12">

              <div id="owl-demo" class="owl-carousel">
	<? $fotga = mysql_query("Select DISTINCT * From franquicias Where destacado='1' and estado='1'",$conexion) or die("Problemas en el select:".mysql_error());
	while ($grp1dest=mysql_fetch_array($fotga))
	{
		echo '<div class="col-md-12 col-sm-12 col-xs-12" align="center"><a href="franquicias.php?idf='.$grp1dest['idfranquicia'].'&nom='.$grp1dest['nombre'].'"><img src="img/logos-clientes/'.$grp1dest['logo'].'" alt="'.$grp1dest['nombre'].'" title="'.$grp1dest['nombre'].'" class="img-responsive clientes"></a></div>';
	}?>
              </div>
              
            </div>
          </div>
        </div>
      </div>

  </div>
  <!--fin logos destacados-->
</div>
<!--fin franquicias destacadas-->


<!--Noticias y variedades-->
<div style="background:#eaeaea; padding:20px 0;">
  <div class="container">
    <div class="row">
      <!--Noticias-->
      <div class="col-md-6 col-sm-12 col-xs-12">
        <div style="padding-bottom:20px;">
          <span class="fa-stack fa-2x" style="color:#fc9a00;">
            <i class="fa fa-circle fa-stack-2x"></i>
            <i class="fa fa-newspaper-o fa-stack-1x fa-inverse"></i>          </span>
          <span style="font-size:24px; ">Art&iacute;culos y Noticias</span>        </div>
        <div class="row">
	<? $not = mysql_query("Select * From noticias Where estado='1' Order by fecha DESC LIMIT 2",$conexion) or die("Problemas en el select:".mysql_error());
	while ($noti=mysql_fetch_array($not))
	{ ?>
          <div class="col-md-6 col-sm-6 col-xs-6">
            <div class="thumbnail" style="padding:10px;">
              <div><img src="img/noticias/<? echo $noti['foto']; ?>" class="img-responsive"></div>
              <div style="padding-top:10px;">
                <span class="tit_noticia"><? echo $noti['titulo']; ?></span><br>
                <p class="textoP"><? echo substr ($noti['resumen'], 0, 100); ?> ...</p>
                <a href="<? echo $noti['link']; ?>" class="linkMas" target="_blank">VER M&Aacute;S</a>
              </div>
            </div>
          </div>
	<? } ?>

          
        </div>
      </div>
      <!--fin Noticias-->

      <!--Variedades-->
      <div class="col-md-6 col-sm-12 col-xs-12">
        <div style="padding-bottom:20px;">
          <span class="fa-stack fa-2x" style="color:#fc9a00;">
            <i class="fa fa-circle fa-stack-2x"></i>
            <i class="fa fa-desktop fa-stack-1x fa-inverse"></i>          </span>
          <span style="font-size:24px; ">Variedades</span>        </div>
        <div>
          <div style="margin-bottom:30px;">
            <img src="img/variedades01.jpg" style="width:120px; float:left; padding-right:10px;">
            <span style="color:#999999;">Entrevista:</span><br>
            <span class="tit_nov">Lorem ipsum dolor sit amet<span>
            <p class="textoP">Integer sagittis nunc non nibh mattis vulputate. Nulla facilisi. Etiam quis lectus id urna euismod interdum at non lacus...</p>
          </div>
          <div style="margin-bottom:30px;">
            <img src="img/variedades02.jpg" style="width:120px; float:left; padding-right:10px;">
            <span style="color:#999999;">Entrevista:</span><br>
            <span class="tit_nov">Lorem ipsum dolor sit amet<span>
            <p class="textoP">Integer sagittis nunc non nibh mattis vulputate. Nulla facilisi. Etiam quis lectus id urna euismod interdum at non lacus...</p>
          </div>
          <div style="margin-bottom:30px;">
            <img src="img/variedades02.jpg" style="width:120px; float:left; padding-right:10px;">
            <span style="color:#999999;">Entrevista:</span><br>
            <span class="tit_nov">Lorem ipsum dolor sit amet<span>
            <p class="textoP">Integer sagittis nunc non nibh mattis vulputate. Nulla facilisi. Etiam quis lectus id urna euismod interdum at non lacus...</p>
          </div>
        </div>
      </div>
      <!--fin Variedades-->
    </div>
  </div>
</div>
<!--fin Noticias y variedades-->

<!--comentarios-->
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel"x| align="center">
  <div style="padding:20px;">
    <i class="fa fa-commenting-o fa-3x" style="color:#fc9a00;"></i>
  </div>
    <div id="myCarousel" class="carousel slide" style="padding:20px;">
      <ol class="carousel-indicators">
<? $opi = mysql_query("Select * From opiniones",$conexion) or die("Problemas en el select:".mysql_error());
	$opina = mysql_num_rows($opi);
	$total = $opina-1;
	for ($i = 0; $i <= $total; $i++) {
		if  ($i==0) {
    		echo '<li data-target="#myCarousel" data-slide-to="0" class="active"></li>';
		} else {
			echo '<li data-target="#myCarousel" data-slide-to="'.$i.'"></li>';
		}
	}
?>
      </ol>
      <!-- Carousel items -->
      <div class="carousel-inner">
	<?
	$opi = mysql_query("Select * From opiniones LIMIT 1",$conexion) or die("Problemas en el select:".mysql_error());
	while ($opina=mysql_fetch_array($opi))
	{
		$vprim = $opina['idopinion'];
	}
	$opi = mysql_query("Select * From opiniones",$conexion) or die("Problemas en el select:".mysql_error());
	while ($opina=mysql_fetch_array($opi))
	{
		if ($opina['idopinion']==$vprim) {	
			echo '<div class="active item">
        	<div class="comentarios">'.$opina['opinion'].'</div><br>
            <div class="comentariosNombre">'.$opina['contacto'].'</div>
            <div class="comentariosCargo">'.$opina['cargo'].'<br>'.$opina['franquicia'].'</div>
        </div>';
		} else {
			echo '<div class="item">
        	<div class="comentarios">'.$opina['opinion'].'</div><br>
            <div class="comentariosNombre">'.$opina['contacto'].'</div>
            <div class="comentariosCargo">'.$opina['cargo'].'<br>'.$opina['franquicia'].'</div>
        </div>';
		}
	} ?>
      </div>
    </div>
</div>
<!--fin comentarios-->

<!--neswletter-->
<div style="padding:30px 0; background:#fc9a00; color:#fff;" align="center">
  <span style="font-size:24px;">Reg&iacute;strate en nuestro Boletin</span><br>
  <p style="color:#fedbb9">Proximamente recibiras las &uacute;ltimas novedades y ent&eacute;rate primero de las empresas que est&aacute;n interesadas en franquiciar. Inscr&iacute;bete ahora!</p>
<form id="form1" name="form1">
  <div class="container" align="center">
    <div class="row" style="width:70%;">
      <div class="col-md-10 col-sm-10 col-xs-9"><input name="corr" type="email" class="form-control" placeholder="Ingresa tu correo electr&oacute;nico" required></div>
      <div class="col-md-2 col-sm-2 col-xs-3" align="left">
      <input type="hidden" value="1" name="regbol">
      <input type="submit" name="button" id="envia" value="Registrarme" class="btn btn-danger"></div>
    </div>
  </div>
</form>
</div>
<!--fin newsletter-->

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
  $('#menu1').addClass('active');
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



<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"></h4>
            </div>
            <div class="modal-body" id="myModalBody">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">OK</button>

            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
  // AJAX
  $(function(){
    //corr (email)

    var $myForm = $('#form1');

    var email = $("input[name='corr']");

    $("#envia").on('click',function(event) {
      if ($myForm[0].checkValidity()) {
        event.preventDefault();
        $.ajax({
          method: "POST",
          url: "ajax/form_boletin.php",
          data: {
            corr: email.val(),
          }
        }).done(function( data ) {

          $("#myModalBody").text(data.msj);
          $('#myModal').modal('show');

        });
      }
    });

  });
</script>

</html>
<?
//Insertar email boletin
// Se valida antes de usar $_POST
// Reemplazado por form_boletin.php
//if ($_POST['regbol']=='1') {
//	mysql_query("INSERT INTO `boletin` ( `correo`)  VALUES ('$_POST[corr]')",	$conexion) or die("Problemas en el select".mysql_error());
//}
?>