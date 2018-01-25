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
  <div>
    <span class="fa-stack fa-2x" style="color:#fc9a00;">
      <i class="fa fa-circle fa-stack-2x"></i>
      <i class="fa fa-newspaper-o fa-stack-1x fa-inverse"></i>
    </span>
    <span style="font-size:24px; ">Noticias</span>
  </div>

  <!--NOTICIAS 1-->
  <div class="row">
    <!--noticia principal-->
	<? $not = mysql_query("Select * From noticias Where estado='1' Order by fecha DESC, idnot DESC LIMIT 1",$conexion) or die("Problemas en el select:".mysql_error());
	while ($noti=mysql_fetch_array($not))
	{ ?>
    <div class="col-md-7 col-sm-12 col-xs-12" style="padding:15px;">
      <div style="background:#fed799; padding:8px;">
        <div class="bajadaNoticia">
          <a href="<? echo $noti['link']; ?>" target="_blank">
            <div style="font-size:18px;"><? echo $noti['titulo']; ?></div>
            <div style="font-size:14px;"><? echo substr ($noti['resumen'], 0, 100); ?> ...</div>
          </a>
        </div>
        <div><a href="<? echo $noti['link']; ?>" target="_blank"><img src="img/noticias/<? echo $noti['foto']; ?>" class="img-responsive"></a></div>
      </div>
    </div>
	<? } ?>
    <!--fin noticia principal-->
<?
$registros = 12;
$seccion1 = 4;
$seccion2 = 8;

if (!isset($_REQUEST['pagina']) || $_REQUEST['pagina'] == '') {
    $inicio = 1;
	$inicio1 = 5;
    $pagina = 1;
} else {
    $inicio = (($registros * $_REQUEST['pagina']) - $registros)+1;
	$inicio1 = (($registros * $_REQUEST['pagina']) + 5) - $registros;
    $pagina = $_REQUEST['pagina'];
}

    $not = mysql_query("Select * From noticias Where estado='1'".$vabc.$vbusca.$vcat.$vinv,$conexion) or die("Problemas en el select:".mysql_error());
		
	$total_registros = mysql_num_rows($not );
	$total_paginas = ceil($total_registros / $registros);
?>
    <!--más noticias-->
    <div class="col-md-5 col-sm-12 col-xs-12 descFran" style="padding:15px;">
      <div style="font-size:18px; color:#fc9a00; padding-bottom:20px;"><i class="fa fa-angle-down"></i> M&aacute;s noticias</div>
        <div class="row">
	<? $not = mysql_query("Select * From noticias Where estado='1' Order by fecha DESC, idnot DESC LIMIT $inicio, $seccion1",$conexion) or die("Problemas en el select:".mysql_error());
	while ($noti=mysql_fetch_array($not))
	{ ?>
          <div class="col-md-6 col-sm-6 col-xs-6">
            <div class="thumbnail">
              <div><a class="linkNoti" href="<? echo $noti['link']; ?>" target="_blank"><? echo substr ($noti['titulo'], 0, 20); ?> ...</a></div>
              <div style="padding-top:10px; height:130px;"><a class="linkNoti" href="<? echo $noti['link']; ?>" target="_blank"><img src="img/noticias/<? echo $noti['foto']; ?>" class="img-responsive" style="max-height:130px;"></a></div>
            </div>
          </div>
	<? } ?>  
        </div>
    </div>
    <!--fin más noticias-->
  </div>
  <!--FIN NOTICIAS 1-->

  <!--banner promocional-->
	<? $bann = mysql_query("Select * From publiciad Where fecharegvence >= '$dia' and estado='1' Order by RAND() LIMIT 1",$conexion) or die("Problemas en el select:".mysql_error());
	while ($banne=mysql_fetch_array($bann))
	{ ?>
  <div style="padding:20px 0;" align="center"><a href="<? echo $banne['link']; ?>" target="_blank"><img src="img/<? echo $banne['imagen']; ?>" title="<? echo $banne['nombre']; ?>" class="img-responsive"></a></div>
	<? } ?>
  <!--fin banner promocional-->
  <!--NOTICIAS 2-->
  <div class="row">
	<? $not1 = mysql_query("Select * From noticias Where estado='1' Order by fecha DESC, idnot DESC LIMIT $inicio1, $seccion2",$conexion) or die("Problemas en el select:".mysql_error());
	while ($noti1=mysql_fetch_array($not1))
	{ ?>
    <div class="col-md-3 col-sm-3 col-xs-6">
      <div class="thumbnail">
        <div><a class="linkNoti" href="<? echo $noti1['link']; ?>"><? echo substr ($noti1['titulo'], 0, 20); ?> ...</a></div>
        <div style="padding-top:10px;"><a href="<? echo $noti1['link']; ?>" target="_blank"><img src="img/noticias/<? echo $noti1['foto']; ?>" class="img-responsive"></a></div>
      </div>
    </div>
	<? } ?>
  </div>
  <!--FIN NOTICIAS 2-->  

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
		echo '<li><a href="noticias.php?pagina=' . ($pagina - 1) . '" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
//        echo "<a href='franquicias_lista.php?pagina=" . ($pagina - 1) . $pabc . $pcat . $pinv . $pbus . "' aria-label='Previous'><< </a>";
    }

    for ($i = 1; $i <= $total_paginas; $i++) {
        if ($pagina == $i) {
			echo '<li><a href="#"><strong>' . $pagina . '</strong></a></li>';
//            echo "<b>" . $pagina . "x</b> ";
        } else {
			echo '<li><a href="noticias.php?pagina='.$i.'">'.$i.'</a></li>';
//            echo " <a href='franquicias_lista.php?pagina=$i".$pabc.$pcat.$pinv.$pbus."' class='link-plomo1'>".$i."</a> ";
        }
    }
    if (($pagina + 1) <= $total_paginas) {
			echo '<li><a href="noticias.php?pagina=' . ($pagina + 1) . '" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>';
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
  $('#menu8').addClass('menuSecOn');
});
</script>

        <!-- Javascript SIRVE PARA MODAL DE LOGIN -->
        <!-- <script src="assets/js/jquery-1.11.1.min.js"></script> CAUSA CONFLICTO CON DESTACADOS -->
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>

</html> 