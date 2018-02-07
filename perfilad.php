<? include("rutadb.php"); ?>
<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();

	//var_dump($_SESSION);

	if(!isset($_SESSION["uid"])){
		header("Location: index.php"); exit;
    }else{

	    $queryf = " SELECT * FROM franquicias WHERE idfranquicia = ".$_SESSION['fid'];
		$qf = mysql_query($queryf, $conexion) or die("Problemas en el select:".mysql_error());
		if ($franqui = mysql_fetch_array($qf))
		{ }

    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>FranquiciaLA</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Philosopher:400,400italic,700,700italic' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" type="text/css" href="assets/css/cropper.css">
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

    
<style type="text/css">
    .icon-remove{
        height: 20px;
        width: 20px;
        position: absolute;
        margin: 3px;

        -webkit-filter: drop-shadow(1px 1px 0 black)
        drop-shadow(-1px -1px 0 black);
        filter: drop-shadow(1px 1px 0 black)
        drop-shadow(-1px -1px 0 black);

    }
    .icon-remove:hover{
        cursor: pointer;
    }
    .dz-remove{
        display: none;
    }
</style>
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
  <div style="padding-bottom:20px;">
    <span class="fa-stack fa-2x" style="color:#fc9a00;">
      <i class="fa fa-circle fa-stack-2x"></i>
      <i class="fa fa-thumbs-o-up fa-stack-1x fa-inverse"></i>
    </span>
    <span style="font-size:24px; ">Administracion del Perfil</span>
  </div>

  <div style="padding-bottom:30px;">
    <!--<img src="img/foto_afilia.jpg" class="img-responsive" style="float:left; padding:0 15px 15px 0;">-->
    <span class="descFran">
      <p><strong><?=$franqui["nombre"] ?></strong>,<br/>Bienvenido<br/><br/>Gracias por estar aqui, es hora de empezar.<br/>FRANQUICIALA pone a tu disposicion esta plataforma por la cual podras actualizar la informacion continuamente y asi no depender de un tercero.</p></span></div>
<form id="form1" name="form1">
  <div class="descFran">
    <div>
    </div>
    <div style="padding:18px 0; color:#fc9a00;"><strong>INFO. GENERAL</strong></div>

      <div class="row">
          <div class="col-sm-8">

              <div class="row">
                  <div class="col-md-8 col-sm-12" style="padding:5px;">Descripcion:<br><textarea class="form-control" id="descripcion" placeholder="Descripcion (*)" rows="4" required><?=$franqui["descripcion"]; ?></textarea></div>
                  <div class="col-md-4 col-sm-6" style="padding:5px;">Correo electronico:<br/><input type="email" name="correo" class="form-control" placeholder="Correo electronico @ (*)" value="<?=$franqui["correo"]; ?>" required  /></div>
                  <div class="col-md-4 col-sm-6" style="padding:5px;">Pagina web:<br/><input type="site" name="paweb" class="form-control" placeholder="www Pagina Web (*)" value="<?=$franqui["pagweb"]; ?>" required></div>
                  <div class="col-md-12 col-sm-6" style="padding:5px;">URL Video Institucional:<br/><input type="text" name="urlvideo" class="form-control" placeholder="URL Video institucional (*)" value="<?=$franqui["video"]; ?>" required></div>
                  <div class="col-md-4 col-sm-6" style="padding:5px;"></div>
              </div>

          </div>

          <div class="col-sm-4">

              <div class="row">
                  <div class="col-sm-12" style="padding:5px;">
                      <div class="col-sm-12" style="padding:5px;">
                          <button id="btn-logo" class="btn btn-warning">Subir Logo</button>
                      </div>
                  </div>
              </div>

              <div id="zona3" class="row"></div>

              <!--<div class="col-md-8 col-sm-12" style="padding:5px;">Logo de la Marca:<br><input id="input-2" name="input2[]" type="file" class="file" multiple data-show-upload="false" data-show-caption="true"></div>-->

              <div class="dz-preview dz-file-preview" id="template-preview2" style="display: none">
                  <div class="dz-details col-xs-3" style="padding:5px;">
                      <img class="img-thumbnail" data-dz-thumbnail />
                  </div>

                  <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>
                  <div class="dz-success-mark"><span>✔</span></div>
                  <div class="dz-error-mark"><span>✘</span></div>
                  <div class="dz-error-message"><span data-dz-errormessage></span></div>
              </div>
          </div>

      </div>

      <div class="row">

          <div class="col-sm-4">

              <div class="row">
                  <div style="padding:18px 0; color:#fc9a00;"><strong>INFO. DE FRANQUICIA</strong></div>
                  <div class="col-md-6" style="padding:5px;">
                      Inicio de Operaciones: </div>
                  <div class="col-md-6" style="padding:5px;">
                      <input type="number" name="iperacion" class="form-control" placeholder="A&nacute;o de inicio (*)" value="<?=$franqui["anoinicio"]; ?>" disabled />
                  </div>
                  <div class="col-md-6" style="padding:5px;">Pais de Origen:</div>
                  <div class="col-md-6" style="padding:5px;">
                      <select class="form-control" id="porigen" disabled>
                          <option>Peru</option>
                          <option>Brazil</option>
                          <option>Chile</option>
                          <option>Colombia</option>
                      </select>

                  </div>

                  <div class="col-md-6" style="padding:5px;">Paises en que Opera: </div>
                  <div class="col-md-6" style="padding:5px;">
                      <input type="number" name="popera" class="form-control" placeholder="Numero de Paises (*)" value="<?=$franqui["paises"]; ?>" disabled />
                  </div>
                  <div class="col-md-6" style="padding:5px;">Total de Unidades: </div>
                  <div class="col-md-6" style="padding:5px;">
                      <input type="number" name="unidades" class="form-control" placeholder="Numero de unidades (*)" value="<?=$franqui["unidades"]; ?>" disabled />
                  </div>
                  <div class="col-md-6" style="padding:5px;">Objetivos de Expansi&oacute;n: </div>
                  <div class="col-md-6" style="padding:5px;">
                      <input type="text" name="expansion" class="form-control" placeholder="Objetivo de Expansi&oacute;n (*)" value="<?=$franqui["expansion"]; ?>" disabled />
                  </div>

                  <div class="col-md-6" style="padding:5px;"></div>
              </div>

          </div>
          <div class="col-sm-4">

              <div class="row">
                  <div style="padding:18px 0; color:#fc9a00;"><strong>INFO. ECONOMICA</strong></div>
                  <div class="col-md-6" style="padding:5px;">Canon de entrada ($): </div>
                  <div class="col-md-6" style="padding:5px;">
                      <input type="number" name="canon" class="form-control" placeholder="Canon de entrada (*)" value="<?=$franqui["canon"]; ?>" disabled />
                  </div>
                  <div class="col-md-6" style="padding:5px;">Inversi&oacute;n inicial ($): </div>
                  <div class="col-md-6" style="padding:5px;">
                      <input type="number" name="iinicial" class="form-control" placeholder="Inversi&oacute;n inicial (*)" value="<?=$franqui["inversionini"]; ?>" disabled />
                  </div>
                  <div class="col-md-6" style="padding:5px;">Regalia ($): </div>
                  <div class="col-md-6" style="padding:5px;">
                      <input type="number" name="regalia" class="form-control" placeholder="Regalia (*)" value="<?=$franqui["regalia"]; ?>" disabled />
                  </div>
                  <div class="col-md-6" style="padding:5px;">Cuota de publicidad ($): </div>
                  <div class="col-md-6" style="padding:5px;">
                      <input type="number" name="cuota" class="form-control" placeholder="Cuota de publicidad (*)" value="<?=$franqui["cuotapublic"]; ?>" disabled />
                  </div>
                  <div class="col-md-6" style="padding:5px;">Capital requerido ($): </div>
                  <div class="col-md-6" style="padding:5px;">
                      <input type="number" name="capital" class="form-control" placeholder="Capital requerido (*)" value="<?=$franqui["capitalreq"]; ?>" disabled />
                  </div>
                  <div class="col-md-6" style="padding:5px;"></div>
              </div>

          </div>
          <div class="col-sm-4">

              <div class="row">
                  <div style="padding:18px 0; color:#fc9a00;"><strong>INFO. OPERATIVA</strong></div>
                  <div class="col-md-6" style="padding:5px;">Duraci&oacute;n del contrato: </div>
                  <div class="col-md-6" style="padding:5px;">
                      <input type="number" name="tcontrato" class="form-control" placeholder="Duraci&oacute;n del contrato (*)" value="<?=intval($franqui["duracion"]); ?>" disabled />
                  </div>
                  <div class="col-md-6" style="padding:5px;">Requiere experiencia:</div>
                  <div class="col-md-6" style="padding:5px;">
                      <select class="form-control" id="experiencia" disabled>
                          <option value="No" <?=($franqui["experiencia"]=="No"?"selected":"") ?>>No</option>
                          <option value="Si" <?=($franqui["experiencia"]=="Si"?"selected":"") ?>>Si</option>
                      </select>
                  </div>
                  <div class="col-md-6" style="padding:5px;">Tama&nacute;o de local (m2): </div>
                  <div class="col-md-6" style="padding:5px;">
                      <input type="number" name="tamanolo" class="form-control" placeholder="Tama&nacute;o de local (*)" value="<?=intval($franqui["localtam"]); ?>" disabled />
                  </div>
                  <div class="col-md-6" style="padding:5px;">Empleados por local: </div><div class="col-md-6" style="padding:5px;">
                      <input type="number" name="empleados" class="form-control" placeholder="Empleados por local (*)" value="<?=$franqui["personalreq"]; ?>" disabled />
                  </div>
                  <div class="col-md-6" style="padding:5px;">Ubicaci&oacute;n preferible: </div>
                  <div class="col-md-6" style="padding:5px;">
                      <input type="text" name="ubicacionpre" class="form-control" placeholder="Ubicaci&oacute;n preferible (*)" value="<?=$franqui["ubicacion"]; ?>" disabled />
                  </div>
                  <div class="col-md-6" style="padding:5px;"></div>
              </div>

          </div>

      </div>

      <div class="row">
          <div class="col-sm-6">
              <div style="padding:18px 0; color:#fc9a00;"><strong>GALERIA DE FOTOS</strong></div>
              <div class="row">
                  <div class="col-sm-12" style="padding:5px;">
                      <button id="btn-galeria" class="btn btn-warning">Subir imagen</button>
                  </div>
              </div>
              <div id="zona" class="row"></div>


              <div class="dz-preview dz-file-preview" id="template-preview" style="display: none">
                  <div class="dz-details col-xs-3" style="padding:5px;">
                      <img src="https://cdn2.iconfinder.com/data/icons/files-folders-1/130/Trash-512.png" alt="Click me to remove the file." class="icon-remove" data-dz-remove />
                      <img class="img-thumbnail" data-dz-thumbnail />
                  </div>

                  <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>
                  <div class="dz-success-mark"><span>✔</span></div>
                  <div class="dz-error-mark"><span>✘</span></div>
                  <div class="dz-error-message"><span data-dz-errormessage></span></div>
              </div>
          </div>


          <div class="col-sm-6">
              <div style="padding:18px 0; color:#fc9a00;"><strong>BANNERS</strong></div>
              <div class="row">
                  <div class="col-sm-12" style="padding:5px;">
                      <div class="col-sm-12" style="padding:5px;">
                          <button id="btn-banner" class="btn btn-warning">Subir imagen</button>
                      </div>
                  </div>
              </div>

              <div id="zona2" class="row"></div>

          </div>
      </div>



    <div align="center" style="padding:20px;">
        <button name="envia" id="envia" class="btn btn-warning" >Actualizar Informacion</button>
    	<input type="reset" name="limpia" id="limpia" class="btn btn-default" value="Cancelar">
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

        <script src="assets/js/dropzone.js"></script>
        <script src="assets/js/dropzone-cropper.js"></script>

<!-- Modal -->
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
    //descripcion
    //correo
    //web*
    //video

    //anoinicio
    //nompais
    //paises
    //unidades
    //expansion

    //canon
    //inversionini
    //regalia
    //cuotapublic
    //capitalreq

    //duracion
    //experiencia
    //localtam
    //personalreq
    //ubicacion

    var $myForm = $('#form1');

    var descripcion = $("#descripcion");

    var correo = $("input[name='correo']");
    var video = $("input[name='urlvideo']");
    var pagweb = $("input[name='paweb']");

    //var anoinicio = $("input[name='iperacion']");
    //var nompais = $("input[name='porigen']");
    //var paises = $("input[name='popera']");
    //var unidades = $("input[name='unidades']");
    //var expansion = $("input[name='expansion']");

    //var canon = $("input[name='canon']");
    //var inversionini = $("input[name='iinicial']");
    //var regalia = $("input[name='regalia']");
    //var cuotapublic = $("input[name='cuota']");
    //var capitalreq = $("input[name='capital']");

    //var duracion = $("input[name='tcontrato']");
    //var experiencia = $("input[name='experiencia']");
    //var localtam = $("input[name='tamanolo']");
    //var personalreq = $("input[name='empleados']");
    //var ubicacion = $("input[name='ubicacionpre']");


    $("#envia").on('click',function(event) {
      if ($myForm[0].checkValidity()) {
        event.preventDefault();
        $.ajax({
          method: "POST",
          url: "ajax/form_perfil.php",
          data: {

            descripcion: descripcion.val(),
            correo: correo.val(),
            video: video.val(),
            pagweb: pagweb.val(),

            fid: <?=$_SESSION["fid"]?>

            //anoinicio: anoinicio.val(),
            //nompais: nompais.val(),
            //paises: paises.val(),
            //unidades: unidades.val(),
            //expansion: expansion.val(),

            //canon: canon.val(),
            //inversionini: inversionini.val(),
            //regalia: regalia.val(),
            //cuotapublic: cuotapublic.val(),
            //capitalreq: capitalreq.val(),

            //duracion: duracion.val(),
            //experiencia: experiencia.val(),
            //localtam: localtam.val(),
            //personalreq: personalreq.val(),
            //ubicacion: ubicacion.val()

          }
        }).done(function( data ) {
          $("#myModalBody").text(data.msj);
          $('#myModal1').modal('show');
        });
      }
    });

  });
</script>

<script type="text/javascript" src="assets/js/galeria.js"></script>
<script type="text/javascript" src="assets/js/banner.js"></script>
<script type="text/javascript" src="assets/js/logo.js"></script>
<script>
    var $myForm = $('#form1');
    $("#btn-banner").on('click',function(event) {
        if ($myForm[0].checkValidity()) {
            event.preventDefault();}});
    $("#btn-galeria").on('click',function(event) {
        if ($myForm[0].checkValidity()) {
            event.preventDefault();}});
</script>

</html> 