<? include("rutadb.php");
$dia = date("Y-m-d"); ?>
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

<!--contenido-->
<div class="container">
  <hr>
    <form class="form-inline" action="proveedores_lista.php" method="get">
      <div class="form-group">
        <select class="form-control" name="cat">
          <option value="" selected>--Buscar por categor&iacute;a--</option>
	<? $categ = mysql_query("Select * From categorias Where tipo='p' and estado='1'",$conexion) or die("Problemas en el select:".mysql_error());
	while ($catego=mysql_fetch_array($categ))
	{
		echo "<option value=".$catego['idcat'].">".$catego['nombre']."</option>";
	}?>
        </select>
      </div>
      <div class="form-group">
        <select class="form-control" name="idpais">
          <option value="" selected>--Buscar por pa&iacute;s--</option>
	<? $pai = mysql_query("Select * From paises Where estado='1'",$conexion) or die("Problemas en el select:".mysql_error());
	while ($pais=mysql_fetch_array($pai))
	{
		echo "<option value=".$pais['idpais'].">".$pais['nombre']."</option>";
	}?>
        </select>
      </div>
      <input type="submit" name="button" id="button" class="btn btn-warning" value="Buscar">
  </form>
    <div style="clear:both;"></div>
  <hr>

  <div class="row descFran">
    <div class="col-md-9 col-sm-8 col-xs-12">
      <div class="row">
	<?
$registros = 9;
$seccion1 = 3;
$seccion2 = 6;
$columnas = 3; // Definición cantidad de columnas en las que se mostraran los productos de determinada categoría
if (!isset($_REQUEST['pagina']) || $_REQUEST['pagina'] == '') {
    $inicio = 0;
	$inicio1 = 3;
    $pagina = 1;
} else {
    $inicio = ($registros * $_REQUEST['pagina']) - $registros;
	$inicio1 = (($registros * $_REQUEST['pagina']) + 3) - $registros;
    $pagina = $_REQUEST['pagina'];
}

if ($_GET['cat']!='') {
	$vcat =" and pr.idcat=".$_GET['cat'];
}
if ($_GET['idpais']!='') {
	$pais =" and pr.idpais=".$_GET['idpais'];
}

    $fran = mysql_query("Select pr.idcat, pr.nombre, pr.logo, pr.descripcion, pr.correo, pr.telefono, pr.ciudad
		From proveedores pr, categorias c, paises p
		Where pr.estado='1' and pr.idpais=p.idpais and pr.idcat=c.idcat".$vcat.$pais,$conexion) or die("Problemas en el select:".mysql_error());
		
	$total_registros = mysql_num_rows($fran);
	$total_paginas = ceil($total_registros / $registros);
if ($total_registros!='0') {
    $fran = mysql_query("Select pr.idpro, pr.idcat, (pr.nombre) nomprov, pr.logo, pr.resumen, pr.descripcion, pr.correo, pr.telefono, pr.ciudad, pr.destacado, (c.nombre) nomcat, p.nombre
		From proveedores pr, categorias c, paises p
		Where pr.estado='1' and pr.idpais=p.idpais and pr.idcat=c.idcat ".$vcat.$pais." Order by destacado DESC LIMIT $inicio, $seccion1",$conexion) or die("Problemas en el select:".mysql_error());
		
	while ($franqui=mysql_fetch_array($fran))
	{
		if ($franqui['destacado']=='1') { ?>
        <div class="col-md-4 col-sm-6 col-xs-12 thumbnail" style="padding:0 15px;">
          <div class="boxProveedoresDes1">
            <div style="background:#fff; height:100px;" align="center"><img src="img/logos-proveedores/<? echo $franqui['logo'];?>" style="max-height:100px;"></div>
            <div style="color:#fc9a00; font-size:16px; padding-top:5px;"><strong>kl-<? echo $franqui['nomprov'];?></strong></div>
            <div style="font-size:12px;">
              <? echo $franqui['resumen'];?>
              <br>
              <strong>Categor&iacute;a:</strong> <? echo $franqui['nomcat'];?><br>
              <strong>Correo</strong> <? echo $franqui['correo']; ?><br>
              <strong>Telefono</strong> <? echo $franqui['telefono']; ?><br>
              <strong>Ciudad</strong> <? echo $franqui['ciudad']; ?><br>
              <strong>Pa&iacute;s:</strong> <? echo $franqui['nombre'];?>
            </div>
            <div class="btnPerfil"><a href="proveedores_detalle.php?idp=<? echo $franqui['idpro'];?>">VER PERFIL</a></div>
          </div>
        </div>
	<? } else { ?>
        <div class="col-md-4 col-sm-6 col-xs-12 thumbnail" style="padding:0 15px;">
          <div class="boxProveedores">
            <div style="background:#fff; height:100px;" align="center"><img src="img/logos-proveedores/<? echo $franqui['logo'];?>" style="max-height:100px;"></div>
            <div style="color:#fc9a00; font-size:16px; padding-top:5px;"><strong>kl-<? echo $franqui['nomprov'];?></strong></div>
            <div style="font-size:12px;">
              <? echo $franqui['resumen'];?>
              <br>
              <strong>Categor&iacute;a:</strong> <? echo $franqui['nomcat'];?><br>
              <strong>Correo</strong> <? echo $franqui['correo']; ?><br>
              <strong>Telefono</strong> <? echo $franqui['telefono']; ?><br>
              <strong>Ciudad</strong> <? echo $franqui['ciudad']; ?><br>
              <strong>Pa&iacute;s:</strong> <? echo $franqui['nombre'];?>
            </div>
            <div class="btnPerfil"><a href="proveedores_detalle.php?idp=<? echo $franqui['idpro'];?>">VER PERFIL</a></div>
          </div>
        </div>
	<?
		}
	} ?>
        <!--banner promocional-->
	<? $bann = mysql_query("Select * From publiciad Where fecharegvence >= '$dia' and estado='1' Order by RAND() LIMIT 1",$conexion) or die("Problemas en el select:".mysql_error());
	while ($banne=mysql_fetch_array($bann))
	{ ?>
        <div style="padding:0 15px 15px 15px;"><a href="<? echo $banne['link']; ?>" target="_blank"><img src="img/<? echo $banne['imagen']; ?>" title="<? echo $banne['nombre']; ?>" class="img-responsive"></a></div>
	<? } ?>
        <!--fin banner promocional-->
<? } else {
	echo "<div align='center'><span><br><br><br>No se encontraron franquicias relacionadas con la busqueda</span><br><br><br><br><br></div>";
}?>

<? if ($total_registros>$inicio1) {
    $fran = mysql_query("Select pr.idpro, pr.idcat, (pr.nombre) nomprov, pr.logo, pr.resumen, pr.descripcion, pr.correo, pr.telefono, pr.ciudad, pr.destacado,(c.nombre) nomcat, p.nombre
		From proveedores pr, categorias c, paises p
		Where pr.estado='1' and pr.idpais=p.idpais and pr.idcat=c.idcat ".$vcat.$pais." Order by destacado DESC LIMIT $inicio1, $seccion2",$conexion) or die("Problemas en el select:".mysql_error());
		
	while ($franqui=mysql_fetch_array($fran))
	{
		if ($franqui['destacado']=='1') { ?>
        <div class="col-md-4 col-sm-6 col-xs-12 thumbnail" style="padding:0 15px;">
          <div class="boxProveedoresDes1">
            <div style="background:#fff; height:100px;" align="center"><img src="img/logos-proveedores/<? echo $franqui['logo'];?>" style="max-height:100px;"></div>
            <div style="color:#fc9a00; font-size:16px; padding-top:5px;"><strong>hj-<? echo $franqui['nomprov'];?></strong></div>
            <div style="font-size:12px;">
              <? echo $franqui['resumen'];?>
              <br>
              <strong>Categor&iacute;a:</strong> <? echo $franqui['nomcat'];?><br>
              <strong>Correo</strong> <? echo $franqui['correo']; ?><br>
              <strong>Telefono</strong> <? echo $franqui['telefono']; ?><br>
              <strong>Ciudad</strong> <? echo $franqui['ciudad']; ?><br>
              <strong>Pa&iacute;s:</strong> <? echo $franqui['nombre'];?>
            </div>
            <div class="btnPerfil"><a href="proveedores_detalle.php?idp=<? echo $franqui['idpro'];?>">VER PERFIL</a></div>
          </div>
        </div>
	<? } else { ?>
        <div class="col-md-4 col-sm-6 col-xs-12 thumbnail" style="padding:0 15px;">
          <div class="boxProveedores">
            <div style="background:#fff; height:100px;" align="center"><img src="img/logos-proveedores/<? echo $franqui['logo'];?>" style="max-height:100px;"></div>
            <div style="color:#fc9a00; font-size:16px; padding-top:5px;"><strong>hj-<? echo $franqui['nomprov'];?></strong></div>
            <div style="font-size:12px;">
              <? echo $franqui['resumen'];?>
              <br>
              <strong>Categor&iacute;a:</strong> <? echo $franqui['nomcat'];?><br>
              <strong>Correo</strong> <? echo $franqui['correo']; ?><br>
              <strong>Telefono</strong> <? echo $franqui['telefono']; ?><br>
              <strong>Ciudad</strong> <? echo $franqui['ciudad']; ?><br>
              <strong>Pa&iacute;s:</strong> <? echo $franqui['nombre'];?>
            </div>
            <div class="btnPerfil"><a href="proveedores_detalle.php?idp=<? echo $franqui['idpro'];?>">VER PERFIL</a></div>
          </div>
        </div>
	<?
		}
	} ?>
        <!--banner promocional-->
	<? $bann = mysql_query("Select * From publiciad Where fecharegvence >= '$dia' and estado='1' Order by RAND() LIMIT 1",$conexion) or die("Problemas en el select:".mysql_error());
	while ($banne=mysql_fetch_array($bann))
	{ ?>
        <div style="padding:0 15px 15px 15px;"><a href="<? echo $banne['link']; ?>" target="_blank"><img src="img/<? echo $banne['imagen']; ?>" title="<? echo $banne['nombre']; ?>" class="img-responsive"></a></div>
	<? } ?>
        <!--fin banner promocional-->
<? } ?>
      </div>
    </div>
<?
if ($total_registros!='') {
	if ($total_registros>$inicio1) {
		if (($total_registros-$inicio1)<3) {
			$limite = 2;
		} else {
			$limite = 3;
		}
		//echo $total_registros."-".$inicio."-".$inicio1;
	} else {
		$limite = 1;
		//echo $total_registros."-".$inicio."-".$inicio1;
	}
} else {
	$limite = 0;
}

$frana = mysql_query("Select pr.idpro, pr.idcat, (pr.nombre) nomprov, pr.logo, pr.resumen, pr.descripcion, pr.correo, pr.telefono, pr.ciudad, (c.nombre) nomcat, p.nombre
		From proveedores pr, categorias c, paises p
		Where pr.estado='1' and pr.idpais=p.idpais and pr.idcat=c.idcat and anuncio > '$dia' Order by RAND() LIMIT $limite",$conexion) or die("Problemas en el select:".mysql_error());
		
	while ($frananun=mysql_fetch_array($frana))
	{ ?>
    <div class="col-md-3 col-sm-6 col-xs-12 thumbnail" style="padding:0 15px;">
      <div class="boxProveedoresDes2">
        <div style="background:#fff; height:100px;" align="center"><img src="img/logos-proveedores/<? echo $frananun['logo'];?>" style="max-height:100px;"></div>
        <div style="color:#fc9a00; font-size:16px; padding-top:5px;"><strong>pb-<? echo $frananun['nomprov'];?></strong></div>
        <div style="font-size:12px;">
              <? echo $frananun['resumen'];?>
              <br>
              <strong>Categor&iacute;a:</strong> <? echo $frananun['nomcat'];?><br>
              <strong>Correo</strong> <? echo $frananun['correo']; ?><br>
              <strong>Telefono</strong> <? echo $frananun['telefono']; ?><br>
              <strong>Ciudad</strong> <? echo $frananun['ciudad']; ?><br>
              <strong>Pa&iacute;s:</strong> <? echo $frananun['nombre'];?>
        </div>
        <div class="btnPerfil"><a href="proveedores_detalle.php?idp=<? echo $frananun['idpro'];?>">VER PERFIL</a></div>
      </div>
    </div>
<? } ?>
    </div>
  <!--paginación-->
  <div style="padding:15px;" align="center">
    <nav>
      <ul class="pagination">
<?
if ($_GET['cat']!='') { $pcat="&cat=".$_GET['cat']; }
if ($_GET['pais']!='') { $ppais="&pais=".$_GET['pais']; }
//echo "<center>";
    if (($pagina - 1) > 0) {
		echo '<li><a href="franquicias_lista.php?pagina=' . ($pagina - 1) . $pcat . $ppais . '" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
//        echo "<a href='franquicias_lista.php?pagina=" . ($pagina - 1) . $pabc . $pcat . $pinv . $pbus . "' aria-label='Previous'><< </a>";
    }

    for ($i = 1; $i <= $total_paginas; $i++) {
        if ($pagina == $i) {
			echo '<li><a href="#"><strong>' . $pagina . '</strong></a></li>';
//            echo "<b>" . $pagina . "x</b> ";
        } else {
			echo '<li><a href="franquicias_lista.php?pagina='.$i.$pcat.$ppais.'">'.$i.'</a></li>';
//            echo " <a href='franquicias_lista.php?pagina=$i".$pabc.$pcat.$pinv.$pbus."' class='link-plomo1'>".$i."</a> ";
        }
    }
    if (($pagina + 1) <= $total_paginas) {
			echo '<li><a href="franquicias_lista.php?pagina=' . ($pagina + 1) . $pcat . $ppais . '" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>';
//        echo " <a href='franquicias_lista.php?pagina=" . ($pagina + 1) . $pabc . $pcat . $pinv . $pbus . "' aria-label='Next'> >></a>";
    }
//echo "</center><hr>";
?>
      </ul>
    </nav>
  </div>
  <!--fin paginacion-->  
</div>
<!--fin contenido-->

<!--footer-->
<?php include("builder/footer.php"); ?>
<!--fin footer-->

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script src="bootstrap/js/bootstrap.js"></script>

<script type="text/javascript">
$(function(){
  $('#menu5').addClass('menuSecOn');
});
</script>

        <!-- Javascript SIRVE PARA MODAL DE LOGIN -->
        <!-- <script src="assets/js/jquery-1.11.1.min.js"></script> CAUSA CONFLICTO CON DESTACADOS -->
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>

</html> 