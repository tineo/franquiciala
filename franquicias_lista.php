<? include("rutadb.php");
$dia = date("Y-m-d");
$rest=mysql_query("update franquicias set destacado = '0' Where destacafecha < '$dia'",$conexion) or die("Problemas en el select:1".mysql_error());
$rest=mysql_query("update franquicias set destacado = '1' Where destacafecha >= '$dia'",$conexion) or die("Problemas en el select:1".mysql_error());

	$cadena = strtoupper($_GET['busca']); //Convierte cadena en MAYUSCULA

	$buslog = mysql_query("Select * From buscalog Where palabra='$cadena'") or die("Problemas en el select:".mysql_error());
	$total_buslog = mysql_num_rows($buslog);
	
	if ($total_buslog=='0') {
		mysql_query("INSERT INTO `buscalog` ( `palabra` )  VALUES ( '$cadena' )",$conexion) or die("Problemas en el select".mysql_error());
	} else {
		$rest=mysql_query("update buscalog set conteo = conteo+1 Where palabra='$cadena'",$conexion) or die("Problemas en el select:1".mysql_error());
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
  <hr>
    <div class="abc"><a href="franquicias_lista.php?abc=A">A</a></div>
    <div class="abc"><a href="franquicias_lista.php?abc=B">B</a></div>
    <div class="abc"><a href="franquicias_lista.php?abc=C">C</a></div>
    <div class="abc"><a href="franquicias_lista.php?abc=D">D</a></div>
    <div class="abc"><a href="franquicias_lista.php?abc=E">E</a></div>
    <div class="abc"><a href="franquicias_lista.php?abc=F">F</a></div>
    <div class="abc"><a href="franquicias_lista.php?abc=G">G</a></div>
    <div class="abc"><a href="franquicias_lista.php?abc=H">H</a></div>
    <div class="abc"><a href="franquicias_lista.php?abc=I">I</a></div>
    <div class="abc"><a href="franquicias_lista.php?abc=J">J</a></div>
    <div class="abc"><a href="franquicias_lista.php?abc=K">K</a></div>
    <div class="abc"><a href="franquicias_lista.php?abc=L">L</a></div>
    <div class="abc"><a href="franquicias_lista.php?abc=M">M</a></div>
    <div class="abc"><a href="franquicias_lista.php?abc=N">N</a></div>
    <div class="abc"><a href="franquicias_lista.php?abc=Ñ">&Ntilde;</a></div>
    <div class="abc"><a href="franquicias_lista.php?abc=O">O</a></div>
    <div class="abc"><a href="franquicias_lista.php?abc=P">P</a></div>
    <div class="abc"><a href="franquicias_lista.php?abc=Q">Q</a></div>
    <div class="abc"><a href="franquicias_lista.php?abc=R">R</a></div>
    <div class="abc"><a href="franquicias_lista.php?abc=S">S</a></div>
    <div class="abc"><a href="franquicias_lista.php?abc=T">T</a></div>
    <div class="abc"><a href="franquicias_lista.php?abc=U">U</a></div>
    <div class="abc"><a href="franquicias_lista.php?abc=V">V</a></div>
    <div class="abc"><a href="franquicias_lista.php?abc=W">W</a></div>
    <div class="abc"><a href="franquicias_lista.php?abc=X">X</a></div>
    <div class="abc"><a href="franquicias_lista.php?abc=Y">Y</a></div>
    <div class="abc"><a href="franquicias_lista.php?abc=Z">Z</a></div>
    <div class="abc"><a href="franquicias_lista.php?abc=1">1</a></div>
    <div class="abc"><a href="franquicias_lista.php?abc=2">2</a></div>
    <div class="abc"><a href="franquicias_lista.php?abc=3">3</a></div>
    <div class="abc"><a href="franquicias_lista.php?abc=4">4</a></div>
    <div class="abc"><a href="franquicias_lista.php?abc=5">5</a></div>
    <div class="abc"><a href="franquicias_lista.php?abc=6">6</a></div>
    <div class="abc"><a href="franquicias_lista.php?abc=7">7</a></div>
    <div class="abc"><a href="franquicias_lista.php?abc=8">8</a></div>
    <div class="abc"><a href="franquicias_lista.php?abc=9">9</a></div>
    <div class="abc"><a href="franquicias_lista.php?abc=0">0</a></div>
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

if ($_GET['abc']!='') {
	$vabc =" and f.nombre like '".$_GET['abc']."%'";
}
if ($_GET['busca']!='') {
	$vbusca =" and concat_ws(' ', f.nombre, f.resumen, f.palabrasclave, f.descripcion, c.nombre, p.nombre) like '%".$_GET['busca']."%'";
}
if ($_GET['cat']!='') {
	$vcat =" and f.idcat=".$_GET['cat'];
}
if ($_GET['inv']!='') {
	$vinv =" and f.inversionini<=".$_GET['inv'];
}

    $fran = mysql_query("Select f.idcat, f.nombre, f.logo, f.resumen, f.palabrasclave, f.descripcion, f.inversionini, f.destacado, (c.nombre) nomcat, (p.nombre) nompais
		From franquicias f, categorias c, paises p
		Where f.estado='1' and f.idpais=p.idpais and f.idcat=c.idcat".$vabc.$vbusca.$vcat.$vinv,$conexion) or die("Problemas en el select:".mysql_error());
		
	$total_registros = mysql_num_rows($fran);
	$total_paginas = ceil($total_registros / $registros);
if ($total_registros!='0') {
    $fran = mysql_query("Select f.idfranquicia, f.idcat, f.nombre, f.logo, f.resumen, f.palabrasclave, f.descripcion, f.inversionini, f.destacado, (c.nombre) nomcat, (p.nombre) nompais
		From franquicias f, categorias c, paises p
		Where f.estado='1' and f.idpais=p.idpais and f.idcat=c.idcat ".$vabc.$vbusca.$vcat.$vinv." Order by destacado DESC LIMIT $inicio, $seccion1",$conexion) or die("Problemas en el select:".mysql_error());
		
	while ($franqui=mysql_fetch_array($fran))
	{
		if ($franqui['destacado']=='1') { ?>
        <div class="col-md-4 col-sm-6 col-xs-12 thumbnail" style="padding:0 15px;">
          <div class="boxFranquiciasDes1">
            <div style="background:#fff; height:100px;" align="center"><img src="img/logos-clientes/<? echo $franqui['logo'];?>" style="max-height:100px;"></div>
            <div style="color:#fc9a00; font-size:16px; padding-top:5px;"><strong><? echo $franqui['nombre'];?></strong></div>
            <div style="font-size:12px;">
              <? echo substr ($franqui['resumen'], 0, 110);?> ...
              <br>
              <strong>Categor&iacute;a:</strong> <? echo $franqui['nomcat'];?><br>
              <strong>Pa&iacute;s:</strong> <? echo $franqui['nompais'];?><br>
              <strong>Monto de Inversi&oacute;n:</strong> US$ <? echo number_format($franqui['inversionini'], 0, ',', ' '); ?>
            </div>
            <div class="btnPerfil"><a href="franquicias.php?idf=<? echo $franqui['idfranquicia'];?>&nom=<? echo $franqui['nombre'];?>">VER PERFIL</a></div>
          </div>
        </div>
	<? } else { ?>
        <div class="col-md-4 col-sm-6 col-xs-12 thumbnail" style="padding:0 15px;">
          <div class="boxFranquicias">
            <div style="background:#fff; height:100px;" align="center"><img src="img/logos-clientes/<? echo $franqui['logo'];?>" style="max-height:100px;"></div>
            <div style="color:#fc9a00; font-size:16px; padding-top:5px;"><strong><? echo $franqui['nombre'];?></strong></div>
            <div style="font-size:12px;">
              <? echo substr ($franqui['resumen'], 0, 110);?> ...
              <br>
              <strong>Categor&iacute;a:</strong> <? echo $franqui['nomcat'];?><br>
              <strong>Pa&iacute;s:</strong> <? echo $franqui['nompais'];?><br>
              <strong>Monto de Inversi&oacute;n:</strong> US$ <? echo number_format($franqui['inversionini'], 0, ',', ' '); ?>
            </div>
            <div class="btnPerfil"><a href="franquicias.php?idf=<? echo $franqui['idfranquicia'];?>&nom=<? echo $franqui['nombre'];?>">VER PERFIL</a></div>
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
    $fran = mysql_query("Select f.idfranquicia, f.idcat, f.nombre, f.logo, f.resumen, f.palabrasclave, f.descripcion, f.inversionini, f.destacado, (c.nombre) nomcat, (p.nombre) nompais
		From franquicias f, categorias c, paises p
		Where f.estado='1' and f.idpais=p.idpais and f.idcat=c.idcat ".$vabc.$vbusca.$vcat.$vinv." Order by destacado DESC LIMIT $inicio1, $seccion2",$conexion) or die("Problemas en el select:".mysql_error());
		
	while ($franqui=mysql_fetch_array($fran))
	{
		if ($franqui['destacado']=='1') { ?>
        <div class="col-md-4 col-sm-6 col-xs-12 thumbnail" style="padding:0 15px;">
          <div class="boxFranquiciasDes1">
            <div style="background:#fff; height:100px;" align="center"><img src="img/logos-clientes/<? echo $franqui['logo'];?>" style="max-height:100px;"></div>
            <div style="color:#fc9a00; font-size:16px; padding-top:5px;"><strong><? echo $franqui['nombre'];?></strong></div>
            <div style="font-size:12px;">
              <? echo substr ($franqui['resumen'], 0, 110);?> ...
              <br>
              <strong>Categor&iacute;a:</strong> <? echo $franqui['nomcat'];?><br>
              <strong>Pa&iacute;s:</strong> <? echo $franqui['nompais'];?><br>
              <strong>Monto de Inversi&oacute;n:</strong> US$ <? echo number_format($franqui['inversionini'], 0, ',', ' '); ?>
            </div>
            <div class="btnPerfil"><a href="franquicias.php?idf=<? echo $franqui['idfranquicia'];?>&nom=<? echo $franqui['nombre'];?>">VER PERFIL</a></div>
          </div>
        </div>
	<? } else { ?>
        <div class="col-md-4 col-sm-6 col-xs-12 thumbnail" style="padding:0 15px;">
          <div class="boxFranquicias">
            <div style="background:#fff; height:100px;" align="center"><img src="img/logos-clientes/<? echo $franqui['logo'];?>" style="max-height:100px;"></div>
            <div style="color:#fc9a00; font-size:16px; padding-top:5px;"><strong><? echo $franqui['nombre'];?></strong></div>
            <div style="font-size:12px;">
              <? echo substr ($franqui['resumen'], 0, 110);?> ...
              <br>
              <strong>Categor&iacute;a:</strong> <? echo $franqui['nomcat'];?><br>
              <strong>Pa&iacute;s:</strong> <? echo $franqui['nompais'];?><br>
              <strong>Monto de Inversi&oacute;n:</strong> US$ <? echo number_format($franqui['inversionini'], 0, ',', ' '); ?>
            </div>
            <div class="btnPerfil"><a href="franquicias.php?idf=<? echo $franqui['idfranquicia'];?>&nom=<? echo $franqui['nombre'];?>">VER PERFIL</a></div>
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

$frana = mysql_query("Select f.idfranquicia, f.idcat, f.nombre, f.logo, f.resumen, f.palabrasclave, f.descripcion, f.anoinicio, f.unidades, f.ubicacion, f.inversionini, f.destacado, (c.nombre) nomcat, (p.nombre) nompais
		From franquicias f, categorias c, paises p
		Where f.estado='1' and f.idpais=p.idpais and f.idcat=c.idcat and anuncio > '$dia' Order by RAND() LIMIT $limite",$conexion) or die("Problemas en el select:".mysql_error());
		
	while ($frananun=mysql_fetch_array($frana))
	{ ?>
    <div class="col-md-3 col-sm-6 col-xs-12 thumbnail" style="padding:0 15px;">
      <div class="boxProveedoresDes2">
        <div style="background:#fff; height:100px;" align="center"><img src="img/logos-clientes/<? echo $frananun['logo'];?>" style="max-height:100px;"></div>
        <div style="color:#fc9a00; font-size:16px; padding-top:5px;"><strong><? echo $frananun['nombre'];?></strong></div>
        <div style="font-size:12px;">
              <? echo substr ($frananun['resumen'], 0, 95);?> ...
              <br>
              <strong>Categor&iacute;a:</strong> <? echo $frananun['nomcat'];?><br>
              <strong>Inicio de Operaciones:</strong> <? echo $frananun['anoinicio'];?><br>
              <strong>Pa&iacute;s:</strong> <? echo $frananun['nompais'];?><br>
              <strong>Total de Unidades:</strong> <? echo $frananun['unidades'];?><br>
              <strong>Monto de Inversi&oacute;n:</strong> US$ <? echo number_format($frananun['inversionini'], 0, ',', ' '); ?>
              <strong>Ubicaci&oacute;n Preferible:</strong> <? echo $frananun['ubicacion'];?>
        </div>
        <div class="btnPerfil"><a href="franquicias.php?idf=<? echo $frananun['idfranquicia'];?>&nom=<? echo $frananun['nombre'];?>">VER PERFIL</a></div>
      </div>
    </div>
<? } ?>
    </div>
  <!--paginación-->
  <div style="padding:15px;" align="center">
    <nav>
      <ul class="pagination">
<?
if ($_GET['vabc']!='') { $pabc="&cat=".$_GET['vabc']; }
if ($_GET['cat']!='') { $pcat="&cat=".$_GET['cat']; }
if ($_GET['inv']!='') { $pinv="&inv=".$_GET['inv']; }
if ($_GET['busca']!='') { $pbus="&busca=".$_GET['busca']; }
//echo "<center>";
    if (($pagina - 1) > 0) {
		echo '<li><a href="franquicias_lista.php?pagina=' . ($pagina - 1) . $pabc . $pcat . $pinv . $pbus . '" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
//        echo "<a href='franquicias_lista.php?pagina=" . ($pagina - 1) . $pabc . $pcat . $pinv . $pbus . "' aria-label='Previous'><< </a>";
    }

    for ($i = 1; $i <= $total_paginas; $i++) {
        if ($pagina == $i) {
			echo '<li><a href="#"><strong>' . $pagina . '</strong></a></li>';
//            echo "<b>" . $pagina . "x</b> ";
        } else {
			echo '<li><a href="franquicias_lista.php?pagina='.$i.$pabc.$pcat.$pinv.$pbus.'">'.$i.'</a></li>';
//            echo " <a href='franquicias_lista.php?pagina=$i".$pabc.$pcat.$pinv.$pbus."' class='link-plomo1'>".$i."</a> ";
        }
    }
    if (($pagina + 1) <= $total_paginas) {
			echo '<li><a href="franquicias_lista.php?pagina=' . ($pagina + 1) . $pabc . $pcat . $pinv . $pbus . '" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>';
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

<!--Analitycs-->
<?php include_once("analyticstrackingfranqui.php") ?>
<!--fin Analitycs-->

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script src="bootstrap/js/bootstrap.js"></script>

<script type="text/javascript">
$(function(){
  $('#menu6').addClass('menuSecOn');
});
</script>

        <!-- Javascript SIRVE PARA MODAL DE LOGIN -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>

</html> 