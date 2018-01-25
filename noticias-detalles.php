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
<?php include("builder/buscador.php"); ?>
<!--fin buscador-->

<!--header-->
<?php include("builder/header.php"); ?>
<!--fin header-->

<!--contenido-->
<div class="container">
  <hr>
  <div style="padding-bottom:20px;">
    <span class="fa-stack fa-2x" style="color:#fc9a00;">
      <i class="fa fa-circle fa-stack-2x"></i>
      <i class="fa fa-newspaper-o fa-stack-1x fa-inverse"></i>
    </span>
    <span style="font-size:24px; ">Noticias</span>
  </div>

  <div class="row descFran">
    
    <div class="col-md-9">
      <div class="small"><i class="fa fa-clock-o"></i> 24/09/2015</div>
      <span class="titDestacado">Lorem ipsum dolor sit amet, consectetur adipiscing elit</span>
      <br><br>
      <div>
        <img src="img/foto-noticia-gr.jpg" style="float:left; padding:0 15px 15px 0; max-width:400px;">
        <span class="descFran" style="text-align: justify;">
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam fermentum, metus vel consequat finibus, arcu velit elementum diam, et lobortis erat elit at arcu. In sed iaculis lectus, sit amet cursus erat. Vivamus ut varius libero. Donec accumsan at felis id aliquam. Ut aliquet ipsum eu magna vehicula, dapibus venenatis metus molestie. Vestibulum sollicitudin auctor felis eu aliquet. Aliquam sed eros in ante aliquet semper. Curabitur consequat eros quam, vel luctus mauris volutpat sit amet. Ut bibendum nunc erat. Sed vel ligula luctus, pharetra nisi at, porta sapien. Aliquam suscipit purus vitae neque dapibus sodales. Vivamus tortor erat, iaculis tincidunt magna sit amet, laoreet lacinia tortor. </p>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam fermentum, metus vel consequat finibus, arcu velit elementum diam, et lobortis erat elit at arcu. In sed iaculis lectus, sit amet cursus erat. Vivamus ut varius libero. Donec accumsan at felis id aliquam. Ut aliquet ipsum eu magna vehicula, dapibus venenatis metus molestie. Vestibulum sollicitudin auctor felis eu aliquet. Aliquam sed eros in ante aliquet semper. Curabitur consequat eros quam, vel luctus mauris volutpat sit amet. Ut bibendum nunc erat. Sed vel ligula luctus, pharetra nisi at, porta sapien. Aliquam suscipit purus vitae neque dapibus sodales. Vivamus tortor erat, iaculis tincidunt magna sit amet, laoreet lacinia tortor. Fusce vehicula nunc augue, suscipit scelerisque turpis pharetra vel.</p>
          <p>Morbi aliquam quam faucibus eros congue, varius suscipit ex dictum. Fusce pharetra velit vel sapien vestibulum viverra. Quisque faucibus, arcu vel tempus scelerisque, metus lorem faucibus massa, ac gravida magna nulla nec ipsum.</p>
          <p>Quisque quis commodo felis. Curabitur eu odio massa. Maecenas finibus nunc dui, a ornare velit laoreet sed. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
        </span>
      </div>
      <!--galeria-->
      <div>
        <div style="font-size:18px; color:#fc9a00; padding-bottom:20px;"><i class="fa fa-angle-down"></i> GALERÍA</div>
        <div>
          <ul class="row">
              <li class="col-md-3 col-sm-6 col-xs-12" style="padding:10px;">
                  <img class="img-responsive" src="img/galeria/lima01.jpg">
              </li>
              <li class="col-md-3 col-sm-6 col-xs-12" style="padding:10px;">
                  <img class="img-responsive" src="img/galeria/lima02.jpg">
              </li>
              <li class="col-md-3 col-sm-6 col-xs-12" style="padding:10px;">
                  <img class="img-responsive" src="img/galeria/lima03.jpg">
              </li>
              <li class="col-md-3 col-sm-6 col-xs-12" style="padding:10px;">
                  <img class="img-responsive" src="img/galeria/lima04.jpg">
              </li>
          </ul>             
        </div> <!-- /container -->

 
        <div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">         
              <div class="modal-body">                
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
      </div>
      <!--fin galeria-->
      <!--banner promocional-->
      <div style="padding:20px 0;" align="center"><img src="img/banner-promocion1.jpg" class="img-responsive"></div>
      <!--fin banner promocional-->
      <br><br><br>
    </div>

    <div class="col-md-3">
      <div style="font-size:18px; color:#fc9a00; padding-bottom:20px;"><i class="fa fa-angle-down"></i> Noticias Relacionadas</div>
      <div class="thumbnail">
        <div>
          <a class="linkNoti" href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a>
        </div>
        <div style="padding-top:10px;"><img src="img/foto-noticia-ch1.jpg" class="img-responsive"></div>
      </div>
      <hr>
      <div class="thumbnail">
        <div>
          <a class="linkNoti" href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a>
        </div>
        <div style="padding-top:10px;"><img src="img/foto-noticia-ch2.jpg" class="img-responsive"></div>
      </div>
      <hr>
      
    </div>

  </div>
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
  $('#menu8').addClass('menuSecOn');
});
</script>
</html> 