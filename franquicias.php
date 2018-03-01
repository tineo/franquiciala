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
<?php include("builder/buscador_.php"); ?>
<!--fin buscador-->

<!--header-->
<?php include("builder/header.php"); ?>
<!--fin header-->

<!--slider-->
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" align="center">
  <!-- Indicators -->
  <ol class="carousel-indicators">
<? $bann = mysql_query("Select * From banner Where tipo='f' and id='$_GET[idf]' and estado='1'",$conexion) or die("Problemas en el select:".mysql_error());
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
	$prim = mysql_query("Select * From banner Where tipo='f' and id='$_GET[idf]' and estado='1' LIMIT 1",$conexion) or die("Problemas en el select:".mysql_error());
	while ($prime=mysql_fetch_array($prim))
	{
		$vprim = $prime['idbanner'];
	}
	$bann = mysql_query("Select * From banner Where tipo='f' and id='$_GET[idf]' and estado='1'",$conexion) or die("Problemas en el select:".mysql_error());
	while ($banne=mysql_fetch_array($bann))
	{
		if ($banne['idbanner']==$vprim) {	
			echo '<div class="item active"><img src="img/banners/'.$banne['imagen'].'" alt="" title=""></div>';
		} else {
			echo '<div class="item"><img src="img/banners/'.$banne['imagen'].'" alt="" title=""></div>';
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

<? $perf = mysql_query("Select f.descripcionfoto, f.nombre, f.descripcion, f.razones, f.perfil, f.perfil, f.anoinicio, f.paises, f.unidades, f.expansion, f.canon, f.inversionini, f.regalia, f.cuotapublic, f.capitalreq, f.duracion, f.experiencia, f.localtam, f.personalreq, f.ubicacion, f.video, (p.nombre) nompais From franquicias f, paises p Where idfranquicia='$_GET[idf]' and f.idpais=p.idpais",$conexion) or die("Problemas en el select:".mysql_error());
	while ($perfil=mysql_fetch_array($perf))
	{ ?>
<!--contenido-->
<div class="container">
  <div class="row"  class="row" style="padding-left:25px;">
    <span class="fa-stack fa-2x" style="color:#fc9a00;">
      <i class="fa fa-circle fa-stack-2x"></i>
      <i class="fa fa-info fa-stack-1x fa-inverse"></i>
    </span>
    <span style="font-size:24px; ">Descripci&oacute;n</span>
  </div>

  <div class="row" style="padding:25px;">
    <img src="img/galeria/mini_<? echo $perfil['descripcionfoto']; ?>" class="img-responsive" style="float:left; padding:0 15px 15px 0;">
    <span class="titFran"><? echo $perfil['nombre']; ?></span>
    <br><br>
    <span class="descFran"><? echo $perfil['descripcion']; ?></span>
  </div>

  <hr>
  
<div style="padding-bottom:15px;" class="descFran row">
        <span class="fa-stack fa-1x" style="color:#fc9a00;">
          <i class="fa fa-circle fa-stack-2x"></i>
          <i class="fa fa-camera-retro fa-stack-1x fa-inverse"></i>
        </span>
        <span style="font-size:18px; color:#fc9a00;">Galeria de Fotos</span>
</div>

      <div id="demo">
        <div class="container">
          <div class="row">
            <div class="span12">

              <div id="owl-demo" class="owl-carousel">
	<? $fotga = mysql_query("Select * From fotosgal Where idfranquicia='$_GET[idf]'",$conexion) or die("Problemas en el select:".mysql_error());
	while ($fotgal=mysql_fetch_array($fotga))
	{
		echo '<div class="item"><img src="img/galeria/'.$fotgal['enlace'].'" title="'.$fotgal['nombre'].'" alt="'.$fotgal['nombre'].'"></div>';
	}?>
              </div>
              
            </div>
          </div>
        </div>
      </div>
  <hr>

  <div class="row">
    <!--acordeon-->
    <div class="col-md-6 col-sm-6 col-xs-12 descFran">
      <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
	<?
	if ($perfil['razones']!='') {
		$valex1 = ' in';
		$valex2 = '';
		$valex3 = '';
	} else {
		if ($perfil['perfil']!='') {
			$valex1 = '';
			$valex2 = ' in';
			$valex3 = '';
		} else  {
			$valex1 = '';
			$valex2 = '';
			$valex3 = ' in';
		}
	}
    if ($perfil['razones']!='') { ?>
          <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingOne">
              <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  Razones para unirse
                </a>
              </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse<? echo $valex1; ?>" role="tabpanel" aria-labelledby="headingOne">
              <div class="panel-body">
			   <p><? echo $perfil['razones']; ?></p>
              </div>
            </div>
          </div>
	<? }
	if ($perfil['perfil']!='') { ?>
          <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingTwo">
              <h4 class="panel-title">
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  Perfil del candidato
                </a>
              </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse<? echo $valex2; ?>" role="tabpanel" aria-labelledby="headingTwo">
              <div class="panel-body">
               <p><? echo $perfil['perfil']; ?></p>
              </div>
            </div>
          </div>
	<? }
	$preg = mysql_query("Select * From preguntas Where tipo='f' and id='$_GET[idf]'",$conexion) or die("Problemas en el select:".mysql_error());
	$totalpreg = mysql_num_rows($preg);
	if ($totalpreg!='') {
	?>
          <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingFour">
              <h4 class="panel-title">
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                  Preguntas frecuentes
                </a>
              </h4>
            </div>
            <div id="collapseFour" class="panel-collapse collapse<? echo $valex3; ?>" role="tabpanel" aria-labelledby="headingFour">
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
    <!--fin acordeon-->

    
    <div class="col-md-6 col-sm-6 col-xs-12 descFran">
      <!--tabs-->
        <ul class="nav nav-tabs" role="tablist">
          <li role="presentation" class="active"><a href="#info1"  role="tab" data-toggle="tab">Info Franquicia</a></li>
          <li role="presentation"><a href="#info2" role="tab" data-toggle="tab">Info. Econ&oacute;mica</a></li>
          <li role="presentation"><a href="#info3" role="tab" data-toggle="tab">Info. Operativa</a></li>
        </ul>

        <div class="tab-content">
          <div role="tabpanel" class="tab-pane active" id="info1">
            <div style="padding:15px;">
            <? if ($perfil['anoinicio']!=''){ ?>
              <p><strong>Inicio de operaciones:</strong> <? echo $perfil['anoinicio']; ?></p>
            <? } if ($perfil['nompais']!=''){ ?>
              <p><strong>Pa&iacute;s de origen:</strong> <? echo $perfil['nompais'];?></p>
            <? } if ($perfil['paises']!=''){ ?>
              <p><strong>Pa&iacute;ses en que opera:</strong> <? echo $perfil['paises']; ?></p>
            <? } if ($perfil['unidades']!=''){ ?>
              <p><strong>Total de unidades:</strong> <? echo $perfil['unidades']; ?></p>
            <? } if ($perfil['expansion']!=''){ ?>
              <p><strong>Objetivos de Expansi&oacute;n:</strong> <? echo $perfil['expansion']; ?></p>
            <? } ?>
            </div>
          </div>

          <div role="tabpanel" class="tab-pane" id="info2">
            <div style="padding:15px;">
            <? if ($perfil['canon']!='0'){ ?>
              <p><strong>Canon de entrada:</strong> US$ <? echo number_format($perfil['canon'], 2, ',', ' '); ?></p>
            <? } if ($perfil['inversionini']!='0'){ ?>
              <p><strong>Inversi&oacute;n inicial:</strong> US$ <? echo number_format($perfil['inversionini'], 2, ',', ' '); ?></p>
            <? } if ($perfil['regalia']!='0'){ ?>
              <p><strong>Regalia:</strong> US$ <? echo number_format($perfil['regalia'], 2, ',', ' '); ?></p>
            <? } if ($perfil['cuotapublic']!='0'){ ?>
              <p><strong>Cuota de publicidad:</strong> US$ <? echo number_format($perfil['cuotapublic'], 2, ',', ' '); ?></p>
            <? } if ($perfil['capitalreq']!='0'){ ?>
              <p><strong>Capital requerido:</strong> US$ <? echo number_format($perfil['capitalreq'], 2, ',', ' '); ?></p>
            <? } ?>
            </div>
          </div>

          <div role="tabpanel" class="tab-pane" id="info3">
            <div style="padding:15px;">
            <? if ($perfil['duracion']!=''){ ?>
              <p><strong>Duraci&oacute;n del contrato:</strong> <? echo $perfil['duracion']; ?></p>
            <? } if ($perfil['experiencia']!=''){ ?>
              <p><strong>Requiere experiencia:</strong> <? echo $perfil['experiencia']; ?></p>
            <? } if ($perfil['localtam']!=''){ ?>
              <p><strong>Tama&ntilde;o de local:</strong> <? echo $perfil['localtam']; ?></p>
            <? } if ($perfil['personalreq']!=''){ ?>
              <p><strong>Empleados por local:</strong> <? echo $perfil['personalreq']; ?></p>
            <? } if ($perfil['ubicacion']!=''){ ?>
              <p><strong>Ubicaci&oacute;n preferible:</strong> <? echo $perfil['ubicacion']; ?></p>
            <? } ?>
            </div>            
          </div>
        </div>
      <!--fin tabs-->
      <hr>
      <!--video-->
      <div style="padding-bottom:15px;">
        <span class="fa-stack fa-1x" style="color:#fc9a00;">
          <i class="fa fa-circle fa-stack-2x"></i>
          <i class="fa fa-play fa-stack-1x fa-inverse"></i>
        </span>
        <span style="font-size:18px; color:#fc9a00;">Video Institucional</span>
      </div>
      <!-- 16:9 aspect ratio -->
      <div class="embed-responsive embed-responsive-16by9">
        <div style="padding:15px;">
            <?php


            $url = preg_replace(
                "/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
                "www.youtube.com/embed/$2",
                $perfil["video"]);
            ?>
          <iframe class="embed-responsive-item" src="//<?=$url ?>?rel=0" allowfullscreen="" style="height:280px;"></iframe>

        </div>
        
      </div>
      <!--fin video-->
    </div>
  </div>

  <div class="descFran">
    <div style="padding-bottom:25px;">
      <span class="fa-stack fa-1x" style="color:#fc9a00;">
        <i class="fa fa-circle fa-stack-2x"></i>
        <i class="fa fa-list-alt fa-stack-1x fa-inverse"></i>
      </span>
      <span style="font-size:18px; color:#fc9a00;">Formulario de Contacto</span>
      &nbsp;&nbsp;&nbsp;&nbsp;
      <span class="small">(*) Datos requeridos obligatoriamente.</span>
    </div>
<form role="form" data-toggle="validator" id="form1">
    <div class="row">
      <div class="col-md-4 col-sm-6" style="padding:5px;"><input name="nom" type="text" pattern="^[_A-z0-9]{1,}$" class="form-control" placeholder="Nombre(s) (*)" required></div>
      <div class="col-md-4 col-sm-6" style="padding:5px;"><input name="ape" type="text" pattern="^[_A-z0-9]{1,}$" class="form-control" placeholder="Apellidos (*)" required></div>
      <div class="col-md-4 col-sm-6" style="padding:5px;"><input name="ema" type="email" class="form-control" placeholder="Correo electr?nico (*)" data-pattern-error="123456 Hola como estas" required></div>
      <div class="col-md-4 col-sm-6" style="padding:5px;"><input name="pai" type="text" pattern="^[_A-z0-9]{1,}$" class="form-control" placeholder="Pa&iacute;s (*)" required></div>
      <div class="col-md-4 col-sm-6" style="padding:5px;"><input name="ciu" type="text" pattern="^[_A-z0-9]{1,}$" class="form-control" placeholder="Ciudad (*)" required></div>
      <div class="col-md-4 col-sm-6" style="padding:5px;"><input name="tel" type="number" min="7" class="form-control" placeholder="Tel&eacute;fono (*)" required></div>
      <div class="col-md-4 col-sm-6" style="padding:5px;"><input name="eda" type="number" class="form-control" placeholder="Edad"></div>
      <div class="col-md-4 col-sm-6" style="padding:5px;"><input name="inv" type="number" class="form-control" placeholder="Monto de inversi&iacute;n disponible (*)" required></div>
      <div class="col-md-4 col-sm-6" style="padding:5px;"></div>
      <div class="col-md-12 col-sm-12" style="padding:5px;"><textarea name="det" id="det" class="form-control" placeholder="Comentarios y/o preguntas (*)" rows="3"></textarea></div>
      <div style="clear:both;"></div>
      <div align="center" style="padding:20px;">
      	<input type="hidden" value="<? echo $_GET['idf']; ?>" name="idfran">
        <input type="hidden" value="<? echo $_GET['nom']; ?>" name="nfran">
      	<button class="btn btn-warning" type="submit" id="envia">Enviar</button> <button class="btn btn-default" type="submit">Limpiar</button>
      </div>
    </div>
</form>
  </div>

</div>
<!--fin contenido-->
<? } ?>
<!--footer-->
<?php include("builder/footer.php"); ?>
<!--fin footer-->

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript" src="menu/js/menuresponsive.js"></script>  
<script src="bootstrap/js/bootstrap.js"></script>
<script src="bootstrap/js/photo-gallery.js"></script>

<script type="text/javascript">
$(function(){
  $('#menu6').addClass('menuSecOn');
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
    //nombre
    //apellido
    //cargo
    //email
    //telefono
    //empresa
    //marca
    //web
    //actividad

    var $myForm = $('#form1');

    var nombre = $("input[name='nom']");
    var apellido = $("input[name='ape']");
    var email = $("input[name='ema']");
    var ciudad = $("input[name='ciu']");
    var pais = $("input[name='pai']");
    var telefono = $("input[name='tel']");

    var edad = $("input[name='eda']");
    var monto = $("input[name='inv']");

    var idfran = $("input[name='idfran']");
    var nfran = $("input[name='nfran']");

    var cometarios = $("#det");

    $("#envia").on('click',function(event) {
      if ($myForm[0].checkValidity()) {
        event.preventDefault();
        $.ajax({
          method: "POST",
          url: "ajax/form_franquicia.php",
          data: {
            nom: nombre.val(),
            ape: apellido.val(),

            ema: email.val(),
            pai: pais.val(),
            ciu: ciudad.val(),
            tel: telefono.val(),
            eda: edad.val(),
            inv: monto.val(),
            idfran: idfran.val(),
            nfran: nfran.val(),
            det: cometarios.val()
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