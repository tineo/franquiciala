<? include("rutadb.php"); ?>
<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();

	//var_dump($_SESSION);

	if(!isset($_SESSION["uid"])){
		header("Location: index.php"); exit;
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
      <p><strong>#NOMBRE DE EMPRESA#</strong>,<br/>Bienvenido<br/><br/>Gracias por estar aqui, es hora de empezar.<br/>FRANQUICIALA pone a tu disposicion esta plataforma por la cual podras actualizar la informacion continuamente y asi no depender de un tercero.</p></span></div>
<form id="form1" name="form1" method="post" action="#">
  <div class="descFran">
    <div>
    </div>
    <div style="padding:18px 0; color:#fc9a00;"><strong>INFO. GENERAL</strong></div>

      <div class="row">
          <div class="col-sm-8">

              <div class="row">
                  <div class="col-md-8 col-sm-12" style="padding:5px;">Descripcion:<br><textarea class="form-control" placeholder="Descripcion (*)" rows="4" required></textarea></div>
                  <div class="col-md-4 col-sm-6" style="padding:5px;">Correo electronico:<br/><input type="email" name="correo" class="form-control" placeholder="Correo electronico @ (*)" required></div>
                  <div class="col-md-4 col-sm-6" style="padding:5px;">Pagina web:<br/><input type="site" name="paweb" class="form-control" placeholder="www Pagina Web (*)" required></div>
                  <div class="col-md-12 col-sm-6" style="padding:5px;">URL Video Institucional:<br/><input type="text" name="urlvideo" class="form-control" placeholder="URL Video institucional (*)" required></div>
                  <div class="col-md-4 col-sm-6" style="padding:5px;"></div>
              </div>

          </div>

          <div class="col-sm-4">

              <div class="col-md-8 col-sm-12" style="padding:5px;">Logo de la Marca:<br><input id="input-2" name="input2[]" type="file" class="file" multiple data-show-upload="false" data-show-caption="true"></div>

          </div>

      </div>

      <div class="row">

          <div class="col-sm-4">

              <div class="row">
                  <div style="padding:18px 0; color:#fc9a00;"><strong>INFO. DE FRANQUICIA</strong></div>
                  <div class="col-md-6" style="padding:5px;">
                      Inicio de Operaciones: </div>
                  <div class="col-md-6" style="padding:5px;">
                      <input type="number" name="iperacion" class="form-control" placeholder="A&nacute;o de inicio (*)" required />
                  </div>
                  <div class="col-md-6" style="padding:5px;">Pais de Origen:</div>
                  <div class="col-md-6" style="padding:5px;">
                      <select class="form-control" id="porigen" required>
                          <option>Peru</option>
                          <option>Brazil</option>
                          <option>Chile</option>
                          <option>Colombia</option>
                      </select>
                  </div>

                  <div class="col-md-6" style="padding:5px;">Paises en que Opera: </div>
                  <div class="col-md-6" style="padding:5px;">
                      <input type="number" name="popera" class="form-control" placeholder="Numero de Paises (*)" required />
                  </div>
                  <div class="col-md-6" style="padding:5px;">Total de Unidades: </div>
                  <div class="col-md-6" style="padding:5px;">
                      <input type="number" name="unidades" class="form-control" placeholder="Numero de unidades (*)" required />
                  </div>
                  <div class="col-md-6" style="padding:5px;">Objetivos de Expansi&oacute;n: </div>
                  <div class="col-md-6" style="padding:5px;">
                      <input type="text" name="expansion" class="form-control" placeholder="Objetivo de Expansi&oacute;n (*)" required />
                  </div>

                  <div class="col-md-6" style="padding:5px;"></div>
              </div>

          </div>
          <div class="col-sm-4">

              <div class="row">
                  <div style="padding:18px 0; color:#fc9a00;"><strong>INFO. ECONOMICA</strong></div>
                  <div class="col-md-6" style="padding:5px;">Canon de entrada ($): </div>
                  <div class="col-md-6" style="padding:5px;">
                      <input type="number" name="canon" class="form-control" placeholder="Canon de entrada (*)" required />
                  </div>
                  <div class="col-md-6" style="padding:5px;">Inversi&oacute;n inicial ($): </div>
                  <div class="col-md-6" style="padding:5px;">
                      <input type="number" name="iinicial" class="form-control" placeholder="Inversi&oacute;n inicial (*)" required />
                  </div>
                  <div class="col-md-6" style="padding:5px;">Regalia ($): </div>
                  <div class="col-md-6" style="padding:5px;">
                      <input type="number" name="regalia" class="form-control" placeholder="Regalia (*)" required />
                  </div>
                  <div class="col-md-6" style="padding:5px;">Cuota de publicidad ($): </div>
                  <div class="col-md-6" style="padding:5px;">
                      <input type="number" name="cuota" class="form-control" placeholder="Cuota de publicidad (*)" required />
                  </div>
                  <div class="col-md-6" style="padding:5px;">Capital requerido ($): </div>
                  <div class="col-md-6" style="padding:5px;">
                      <input type="number" name="capital" class="form-control" placeholder="Capital requerido (*)" required />
                  </div>
                  <div class="col-md-6" style="padding:5px;"></div>
              </div>

          </div>
          <div class="col-sm-4">

              <div class="row">
                  <div style="padding:18px 0; color:#fc9a00;"><strong>INFO. OPERATIVA</strong></div>
                  <div class="col-md-6" style="padding:5px;">Duraci&oacute;n del contrato: </div>
                  <div class="col-md-6" style="padding:5px;">
                      <input type="number" name="tcontrato" class="form-control" placeholder="Duraci&oacute;n del contrato (*)" required/>
                  </div>
                  <div class="col-md-6" style="padding:5px;">Requiere experiencia:</div>
                  <div class="col-md-6" style="padding:5px;">
                      <select class="form-control" id="experiencia" required>
                          <option>No</option>
                          <option>Si</option>
                      </select>
                  </div>
                  <div class="col-md-6" style="padding:5px;">Tama&nacute;o de local (m2): </div>
                  <div class="col-md-6" style="padding:5px;">
                      <input type="number" name="tamanolo" class="form-control" placeholder="Tama&nacute;o de local (*)" required />
                  </div>
                  <div class="col-md-6" style="padding:5px;">Empleados por local: </div><div class="col-md-6" style="padding:5px;">
                      <input type="number" name="empleados" class="form-control" placeholder="Empleados por local (*)" required />
                  </div>
                  <div class="col-md-6" style="padding:5px;">Ubicaci&oacute;n preferible: </div>
                  <div class="col-md-6" style="padding:5px;">
                      <input type="text" name="ubicacionpre" class="form-control" placeholder="Ubicaci&oacute;n preferible (*)" required />
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
                      <input id="input-2" name="input2[]"
                             type="file" class="file" multiple
                             data-show-upload="false" data-show-caption="true">
                  </div>
              </div>
              <div class="row">
                  <div class="col-sm-3" style="padding:5px;">
                      <img src="img/dump.jpg" class="img-thumbnail" />
                  </div>
                  <div class="col-sm-3" style="padding:5px;">
                      <img src="img/dump.jpg" class="img-thumbnail" />
                  </div>

                  <div class="col-sm-3" style="padding:5px;">
                      <img src="img/dump.jpg" class="img-thumbnail" />
                  </div>

                  <div class="col-sm-3" style="padding:5px;">
                      <img src="img/dump.jpg" class="img-thumbnail" />
                  </div>

                  <div class="col-sm-3" style="padding:5px;">
                      <img src="img/dump.jpg" class="img-thumbnail" />
                  </div>

                  <div class="col-sm-3" style="padding:5px;">
                      <img src="img/dump.jpg" class="img-thumbnail" />
                  </div>

                  <div class="col-sm-3" style="padding:5px;">
                      <img src="img/dump.jpg" class="img-thumbnail" />
                  </div>

                  <div class="col-sm-3" style="padding:5px;">
                      <img src="img/dump.jpg" class="img-thumbnail" />
                  </div>



              </div>
          </div>
          <div class="col-sm-6">
              <div style="padding:18px 0; color:#fc9a00;"><strong>BANNERS</strong></div>
              <div class="row">
                  <div class="col-sm-12" style="padding:5px;">
                      <input id="input-2" name="input2[]"
                             type="file" class="file" multiple
                             data-show-upload="false" data-show-caption="true">
                  </div>
              </div>
              <div class="row">
                  <div class="col-sm-3" style="padding:5px;">
                      <img src="img/dump.jpg" class="img-thumbnail" />
                  </div>
                  <div class="col-sm-3" style="padding:5px;">
                      <img src="img/dump.jpg" class="img-thumbnail" />
                  </div>

                  <div class="col-sm-3" style="padding:5px;">
                      <img src="img/dump.jpg" class="img-thumbnail" />
                  </div>

                  <div class="col-sm-3" style="padding:5px;">
                      <img src="img/dump.jpg" class="img-thumbnail" />
                  </div>

                  <div class="col-sm-3" style="padding:5px;">
                      <img src="img/dump.jpg" class="img-thumbnail" />
                  </div>

                  <div class="col-sm-3" style="padding:5px;">
                      <img src="img/dump.jpg" class="img-thumbnail" />
                  </div>

                  <div class="col-sm-3" style="padding:5px;">
                      <img src="img/dump.jpg" class="img-thumbnail" />
                  </div>

                  <div class="col-sm-3" style="padding:5px;">
                      <img src="img/dump.jpg" class="img-thumbnail" />
                  </div>



              </div>
          </div>
      </div>

    <div align="center" style="padding:20px;">
    	<input type="submit" name="envia" id="envia" class="btn btn-warning" value="Actualizar Informacion">
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

</html> 