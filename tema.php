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
<?php include("builder/buscador.php"); ?>
<!--fin buscador-->

<!--header-->
<?php include("builder/header.php"); ?>
<!--fin header-->

<!--contenido-->
<div class="container">
  <div style="padding-bottom:20px;">
    <span class="fa fa-book fa-2x" style="color:#fc9a00;"></span>
    <span style="font-size:24px; ">Nombre del Tema</span>
  </div>

  <div style="padding-bottom:30px;">
    <img src="img/foto_afilia.jpg" class="img-responsive" style="float:left; padding:0 15px 15px 0;">
    <span class="descFran">
      <p>EL PEZ ON es una cadena peruana de restaurantes especializada en comida marina, que cuenta con un concepto innovador al ofrecer una propuesta única.</p>
      <p>Este increíble concepto está basado en ofrecer un alto nivel gastronómico de manera casual y divertida, con un trato al cliente cercano en un ambiente alegre. Todo ello, sumado a una buena combinación calidad-precio, hace posible el éxito de su marca y asegura la fidelidad de sus clientes.</p>
      <p>Ofreciendo una experiencia que mezcla gastronomía, servicio y diversión, se sitúa como la cadena de restaurantes de comida marina más exitosa del Perú.</p>
      <p>Orem ipsum dolor sit amet, consectetur adipiscing elit. Quisque eleifend ornare odio sit amet tristique. Nulla quam nunc, scelerisque vel nisi vitae, rhoncus feugiat lacus. Nullam sed lorem vel est consectetur ultrices. Cras hendrerit blandit odio, sit amet maximus leo blandit eu. Aenean at placerat velit. Morbi enim massa, mollis at tempus nec, fermentum vitae ipsum. Praesent velit magna, rutrum sed accumsan ac, volutpat vitae turpis. Interdum et malesuada fames ac ante ipsum primis in faucibus. Suspendisse eu tristique erat, vitae mattis orci.</p>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque eleifend ornare odio sit amet tristique. Nulla quam nunc, scelerisque vel nisi vitae, rhoncus feugiat lacus. Nullam sed lorem vel est consectetur ultrices. Cras hendrerit blandit odio, sit amet maximus leo blandit eu. Aenean at placerat velit. Morbi enim massa, mollis at tempus nec, fermentum vitae ipsum. Praesent velit magna, rutrum sed accumsan ac, volutpat vitae turpis. Interdum et malesuada fames ac ante ipsum primis in faucibus. Suspendisse eu tristique erat, vitae mattis orci.</p>
    </span>
  </div>
  <hr>
        <!--banner promocional-->
        <div style="padding:0 0px 0px 15px;"><a href="#"><img src="img/banner-promocion1.jpg" class="img-responsive"></a></div>
        <!--fin banner promocional-->
  <hr>

</div>
<!--fin contenido-->

<!--footer-->
<?php include("builder/footer.php"); ?>
<!--fin footer-->

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript" src="menu/js/menuresponsive.js"></script>  
<script src="bootstrap/js/bootstrap.js"></script>

<script type="text/javascript">
$(function(){
  $('#menu3').addClass('active');
});
</script>



</html> 