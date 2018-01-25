<script LANGUAGE="JavaScript">
function abreSitio(){
var URL = "";
var web = document.formmnu.sitio.options[document.formmnu.sitio.selectedIndex].value;
window.open(URL+web, '_parent', '');
}
// CODIGO DE NOTIFICACIONES
function myFunction() {
  if (Notification) {
	if (Notification.permission !== "granted") {
		Notification.requestPermission()
	}
	var title = "FRANQUICIALA.COM"
	var extra = {
		body: 'Pagina en construccion.\n\nFRANQUICIALA es operado por Keines Corp\nwww.keinescorp.com',
		dir: 'ltr',
		icon: 'notiicon.jpg'
	}
    var noti = new Notification( title, extra)
	noti.onclick = {
	// Al hacer click
	}
	noti.onclose = {
	// Al cerrar
	}
	setTimeout( function() { noti.close() }, 10000)
  }
}
</script>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">


<!--header1-->
<div style="background:#fc9a00; padding:3px;">
    <div class="container">
      <div class="row">
        <div class="col-md-5">
          <!--redes-->
          <div style="float:left; padding-top:2px;" class="hidden-xs hidden-sm">

	<? $red = mysql_query("Select * From redes Where estado='1'",$conexion) or die("Problemas en el select:".mysql_error());
	while ($redes=mysql_fetch_array($red))
	{
		echo '<div class="link-RedesSup"><a href="'.$redes['enlace'].'" target="blank_"><img src="img/'.$redes['logo'].'" style="border:0" title="'.$redes['nombre'].'"></a></div>';
	}?>
          </div>
          <!--fin redes-->

          <!--idioma-->
          <div style="float:left; padding:2px 0px 0 0px; z-index:2000; position:relative;" class="link-RedesSup"><a class="idiomaOff launch-modal" href="#" target="blank_" data-modal-id="modal-login"><img src="img/ico-login.png" style="border:0" title="Login"></a></div>
          
          <div style="float:left; padding:6px 20px 0 20px; z-index:2000; position:relative;">
            <span class="idiomaOn">ES</span>
            &nbsp;
            <a href="#" class="idiomaOff">| EN</a>
          </div>
        <!-- MODAL -->
        <div class="modal fade" id="modal-login" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true">
        	<div class="modal-dialog">
        		<div class="modal-content">
        			
        			<div class="modal-header">
        				<button type="button" class="close" data-dismiss="modal">
        					<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        				</button>
        				<h3 class="modal-title" id="modal-login-label">Bienvenido a FRANQUICIALA</h3>
        				<p>Ingresa tu usuario y contrase&ntilde;a:</p>
        			</div>
        			
        			<div class="modal-body">
        				
	                    <form role="form" action="perfilad.php" method="post" class="login-form">
	                    	<div class="form-group">
	                    		<label class="sr-only" for="form-username">Usuario</label>
	                        	<input type="text" name="form-username" placeholder="Usuario..." class="form-username form-control" id="form-username">
	                        </div>
	                        <div class="form-group">
	                        	<label class="sr-only" for="form-password">Contraseña</label>
	                        	<input type="password" name="form-password" placeholder="Contrase&ntilde;a..." class="form-password form-control" id="form-password">
	                        </div>
	                        <button type="submit" class="btn btn-danger">Ingresar Ahora ;)</button>
	                    </form>
	                    
        			</div>			
        		</div>
        	</div>
        </div>

          <!--fin idioma-->

          <!--ico App-->
          <div style="float:left;" class="hidden-xs hidden-sm"><a href="#"><img src="img/ico-app.png"></a></div>
          <!--fin ico App-->
        </div>
        <div class="col-md-7">
          <nav class="navbar navbar-default">
          <!-- We use the fluid option here to avoid overriding the fixed width of a normal container within the narrow content columns. -->
          <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-6" aria-expanded="true">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-6" style="font-size:15px;">
              <ul class="nav navbar-nav">
                <li id="menu1"><a href="index.php">INICIO</a></li>
                <li id="menu2"><a href="#" onclick="myFunction()">QUIENES SOMOS</a></li>
                <li id="menu3"><a href="afiliacion.php">AFILIA TU FRANQUICIA</a></li>
                <li id="menu4"><a href="contactos.php">CONTACTO</a></li>
                <li class="visible-xs"><div style="width:100%; height: 1px; background:#ffbb51;"></div></li>
                <li class="visible-xs">
                <a href="">BUSCADOR DE FRANQUICIAS</a>
<form id="formbus" name="formbus1" method="get" action="franquicias_lista.php">
    <div>
      <div style="padding-bottom:4px;">
        <select name="cat" class="form-control" id="cat">
          <option value="" selected>-Buscar por Categor&iacute;a-</option>
	<? $categ = mysql_query("Select * From categorias Where tipo='f' and estado='1'",$conexion) or die("Problemas en el select:".mysql_error());
	while ($catego=mysql_fetch_array($categ))
	{
		echo "<option value=".$catego['idcat'].">".$catego['nombre']."</option>";
	}?>
        </select>
      </div>
      <div style="padding-bottom:4px;">
        <select name="inv" class="form-control" id="inv">
          <option value="" selected>-Buscar por Rango de inversi&oacute;n-</option>
	<? $ran = mysql_query("Select * From rangos",$conexion) or die("Problemas en el select:".mysql_error());
	while ($rango=mysql_fetch_array($ran))
	{
		echo "<option value=".$rango['rango']."> hasta $ ".number_format($rango['rango'], 0, ',', ' ')."</option>";
	}?>
        </select>
      </div>
      <div style="padding-bottom:4px;">
        <input name="busca" type="text" class="form-control" id="busca" placeholder="Buscar por Nombre">
      </div>
      <div>
        <input type="submit" class="btn btn-danger" value="Buscar" />
      </div>
    </div>
</form>
                </li>
              </ul>
            </div><!-- /.navbar-collapse -->
          </div>
        </nav>
        </div>
      </div>
    </div>
</div>
<!--fin header1-->

<!--header2-->
<div class="container">
  <div class="row">
    <div class="col-md-5 col-sm-6 col-xs-12" style="padding:15px">
      <div style="float:left;"><a href="index.php"><img src="img/logo.png" class="img-responsive"></a></div>
    </div>
    <!--menu secundario visible sólo en versión desktop-->
    <div class="col-md-7 hidden-xs hidden-sm" style="padding:15px 15px 15px 45px;">
      <a href="proveedores_lista.php" class="menuSec" id="menu5">PROVEEDORES</a>
      <a href="franquicias_lista.php" class="menuSec" id="menu6">FRANQUICIAS</a>
      <a href="como_hacer.php" class="menuSec" id="menu7">&iquest;C&Oacute;MO HACER?</a>
      <a href="noticias.php" class="menuSec" id="menu8">NOTICIAS</a>
    </div>
    <!--fin menu secundario visible sólo en versión desktop-->

    <!--menu secundario visible sólo en versión movil-->
    <div class="col-sm-6 col-xs-12 visible-xs visible-sm" style="float:right;">
      <div style="padding:15px;" class="hidden-xs"></div>
      <form name="formmnu">
      <select class="form-control" name="sitio" onChange="javascript:abreSitio()">
        <option selected>--M&Aacute;S--</option>
        <option>----------------</option>
        <option value="proveedores_lista.php">PROVEEDORES</option>
        <option value="franquicias_lista.php">FRANQUICIAS</option>
        <option value="como_hacer.php">&iquest;C&Oacute;MO HACER?</option>
        <option value="noticias.php">NOTICIAS</option>
      </select>
      </form>
      <div style="padding:5px;" class="visible-xs"></div>
    </div>
    <!--fin menu secundario visible sólo en versión movil-->
  </div>
</div>

<!--fin header2-->