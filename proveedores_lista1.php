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
  <hr>
    <form class="form-inline">
      <div class="form-group">
        <select class="form-control">
          <option selected>--Buscar por categor&iacute;a--</option>
	<? $categ = mysql_query("Select * From categorias Where tipo='p' and estado='1'",$conexion) or die("Problemas en el select:".mysql_error());
	while ($catego=mysql_fetch_array($categ))
	{
		echo "<option value=".$catego['idcat'].">".$catego['nombre']."</option>";
	}?>
        </select>
      </div>
      <div class="form-group">
        <select class="form-control">
          <option selected>--Buscar por pa&iacute;s--</option>
	<? $pai = mysql_query("Select * From paises Where estado='1'",$conexion) or die("Problemas en el select:".mysql_error());
	while ($pais=mysql_fetch_array($pai))
	{
		echo "<option value=".$pais['idpais'].">".$pais['nombre']."</option>";
	}?>
        </select>
      </div>
      <button type="submit" class="btn btn-warning">Buscar</button>
    </form>
    <div style="clear:both;"></div>
  <hr>

  <!--visible sólo para móviles-->
  <div class="visible-xs thumbnail" style="padding:0 15px;">
      <!--destacados 1-->
      <div class="boxFranquiciasDes1">
        <div style="background:#fff; height:100px;" align="center"><img src="img/logos-clientes/11.jpg" style="max-height:100px;"></div>
        <div style="color:#fc9a00; font-size:16px; padding-top:5px;">CRAFT DESIGNERS 1M</div>
        <div style="font-size:12px;">
          Academias oficiales de fútbol del Club Alianza Lima, el primer club de fútbol peruano, para niños de 4 a 17 años.
          <br>
          <strong>Categoría:</strong> Alimentación y Bebidas<br>
          <strong>País:</strong> Estados Unidos<br>
          <strong>Monto de Inversión:</strong> US$ 1,075,000
        </div>
        <div class="btnPerfil"><a href="proveedores_detalle.php">VER PERFIL</a></div>
      </div>

      <div class="boxFranquiciasDes1">
        <div style="background:#fff; height:100px;" align="center"><img src="img/logos-clientes/12.jpg" style="max-height:100px;"></div>
        <div style="color:#fc9a00; font-size:16px; padding-top:5px;">IN OUT STUDIO</div>
        <div style="font-size:12px;">
          Academias oficiales de fútbol del Club Alianza Lima, el primer club de fútbol peruano, para niños de 4 a 17 años.
          <br>
          <strong>Categoría:</strong> Alimentación y Bebidas<br>
          <strong>País:</strong> Estados Unidos<br>
          <strong>Monto de Inversión:</strong> US$ 1,075,000
        </div>
        <div class="btnPerfil"><a href="proveedores_detalle.php">VER PERFIL</a></div>
      </div>
      <!--fin destacados 1-->

      <!--destacados 2-->
      <div class="boxFranquiciasDes2">
        <div style="background:#fff; height:100px;" align="center"><img src="img/logos-clientes/13.jpg" style="max-height:100px;"></div>
        <div style="color:#fc9a00; font-size:16px; padding-top:5px;">BENNIGAN´S</div>
        <div style="font-size:12px;">
          Academias oficiales de fútbol del Club Alianza Lima, el primer club de fútbol peruano, para niños de 4 a 17 años.
          <br>
          <strong>Categoría:</strong> Alimentación y Bebidas<br>
          <strong>País:</strong> Estados Unidos<br>
          <strong>Monto de Inversión:</strong> US$ 1,075,000
        </div>
        <div class="btnPerfil"><a href="proveedores_detalle.php">VER PERFIL</a></div>
      </div>

      <div class="boxFranquiciasDes2">
        <div style="background:#fff; height:100px;" align="center"><img src="img/logos-clientes/11.jpg" style="max-height:100px;"></div>
        <div style="color:#fc9a00; font-size:16px; padding-top:5px;">BENNIGAN´S</div>
        <div style="font-size:12px;">
          Academias oficiales de fútbol del Club Alianza Lima, el primer club de fútbol peruano, para niños de 4 a 17 años.
          <br>
          <strong>Categoría:</strong> Alimentación y Bebidas<br>
          <strong>País:</strong> Estados Unidos<br>
          <strong>Monto de Inversión:</strong> US$ 1,075,000
        </div>
        <div class="btnPerfil"><a href="proveedores_detalle.php">VER PERFIL</a></div>
      </div>
      <!--fin destacados 2-->
    </div>
  <!--fin visible sólo para móviles-->

  <div class="row descFran">
    <div class="col-md-9 col-sm-8 col-xs-12">
      <div class="row">
        <div class="col-md-4 col-sm-6 col-xs-12 thumbnail" style="padding:0 15px;">
          <div class="boxProveedores">
            <div style="background:#fff; height:100px;" align="center"><img src="img/logos-clientes/11.jpg" style="max-height:100px;"></div>
            <div style="color:#fc9a00; font-size:16px; padding-top:5px;">CRAFT DESIGNERS 1</div>
            <div style="font-size:12px;">
              <strong>Categoria:</strong> Inmobiliarias y Constructoras<br>
              <strong>Presidente:</strong> Fernando Peña<br>
              <strong>Correo:</strong> fpena@craft.com.pe<br>
              <strong>Teléfono:</strong> 016540468 / 987768828<br>
              <strong>Dirección:</strong> Av. Conquistadores 944 oficina 201-202, San Isidro<br>
              <strong>Ciudad:</strong> Lima<br>
              <strong>País:</strong> Perú
            </div>
            <div class="btnPerfil"><a href="proveedores_detalle.php">VER PERFIL</a></div>
          </div>
        </div>

        <div class="col-md-4 col-sm-6 col-xs-12 thumbnail" style="padding:0 15px;">
          <div class="boxProveedores">
            <div style="background:#fff; height:100px;" align="center"><img src="img/logos-clientes/12.jpg" style="max-height:100px;"></div>
            <div style="color:#fc9a00; font-size:16px; padding-top:5px;">IN OUT STUDIO 2</div>
            <div style="font-size:12px;">
              Categoria: Inmobiliarias y Constructoras<br>
              Presidente: Nayra Iglesias Sánchez<br>
              Correo: nayra.iglesias@inoutstudio.com<br>
              Teléfono: +34 670 333 276 - 928 260 153<br>
              Dirección: C/ Doctor Castelo 26,1º 1ª<br>
              Ciudad: Madrid<br>
              País: España
            </div>
            <div class="btnPerfil"><a href="proveedores_detalle.php">VER PERFIL</a></div>
          </div>
        </div>

        <div class="col-md-4 col-sm-6 col-xs-12 thumbnail" style="padding:0 15px;">
          <div class="boxProveedores">
            <div style="background:#fff; height:100px;" align="center"><img src="img/logos-clientes/13.jpg" style="max-height:100px;"></div>
            <div style="color:#fc9a00; font-size:16px; padding-top:5px;">NOON 3</div>
            <div style="font-size:12px;">
              Categoria: Inmobiliarias y Constructoras<br>
              Presidente: Brenda Del Pilar Gallegos Castellano<br>
              Correo: noon@noon.com.pe<br>
              Teléfono: 979 340 875 / 637 6646<br>
              Dirección: Calle Ventura Calamaqui 133 – Int. 301 San Miguel<br>
              Ciudad: Lima<br>
              País: Perú
            </div>
            <div class="btnPerfil"><a href="proveedores_detalle.php">VER PERFIL</a></div>
          </div>
        </div>

        <div class="col-md-4 col-sm-6 col-xs-12 thumbnail" style="padding:0 15px;">
          <div class="boxProveedores">
            <div style="background:#fff; height:100px;" align="center"><img src="img/logos-clientes/11.jpg" style="max-height:100px;"></div>
            <div style="color:#fc9a00; font-size:16px; padding-top:5px;">CRAFT DESIGNERS 4</div>
            <div style="font-size:12px;">
              Categoria: Inmobiliarias y Constructoras<br>
              Presidente: Fernando Peña<br>
              Correo: fpena@craft.com.pe<br>
              Teléfono: RPC: 941526329 / 987768828 /Fijo: 016540468<br>
              Dirección: Av. Conquistadores 944 oficina 201-202, San Isidro<br>
              Ciudad: Lima<br>
              País: Perú
            </div>
            <div class="btnPerfil"><a href="proveedores_detalle.php">VER PERFIL</a></div>
          </div>
        </div>

        <div class="col-md-4 col-sm-6 col-xs-12 thumbnail" style="padding:0 15px;">
          <div class="boxProveedores">
            <div style="background:#fff; height:100px;" align="center"><img src="img/logos-clientes/12.jpg" style="max-height:100px;"></div>
            <div style="color:#fc9a00; font-size:16px; padding-top:5px;">IN OUT STUDIO</div>
            <div style="font-size:12px;">
              Categoria: Inmobiliarias y Constructoras<br>
              Presidente: Nayra Iglesias Sánchez<br>
              Correo: nayra.iglesias@inoutstudio.com<br>
              Teléfono: +34 670 333 276 - 928 260 153<br>
              Dirección: C/ Doctor Castelo 26,1º 1ª<br>
              Ciudad: Madrid<br>
              País: España
            </div>
            <div class="btnPerfil"><a href="proveedores_detalle.php">VER PERFIL</a></div>
          </div>
        </div>

        <div class="col-md-4 col-sm-6 col-xs-12 thumbnail" style="padding:0 15px;">
          <div class="boxProveedores">
            <div style="background:#fff; height:100px;" align="center"><img src="img/logos-clientes/13.jpg" style="max-height:100px;"></div>
            <div style="color:#fc9a00; font-size:16px; padding-top:5px;">NOON</div>
            <div style="font-size:12px;">
              Categoria: Inmobiliarias y Constructoras<br>
              Presidente: Brenda Del Pilar Gallegos Castellano<br>
              Correo: noon@noon.com.pe<br>
              Teléfono: 979 340 875 / 637 6646<br>
              Dirección: Calle Ventura Calamaqui 133 – Int. 301 San Miguel<br>
              Ciudad: Lima<br>
              País: Perú
            </div>
            <div class="btnPerfil"><a href="proveedores_detalle.php">VER PERFIL</a></div>
          </div>
        </div>

        <!--banner promocional-->
        <div style="padding:0 15px 15px 15px;"><img src="img/banner-promocion1.jpg" class="img-responsive"></div>
        <!--fin banner promocional-->

        <div class="col-md-4 col-sm-6 col-xs-12 thumbnail" style="padding:0 15px;">
          <div class="boxProveedores">
            <div style="background:#fff; height:100px;" align="center"><img src="img/logos-clientes/11.jpg" style="max-height:100px;"></div>
            <div style="color:#fc9a00; font-size:16px; padding-top:5px;">CRAFT DESIGNERS ddede</div>
            <div style="font-size:12px;">
              Categoria: Inmobiliarias y Constructoras<br>
              Presidente: Fernando Peña<br>
              Correo: fpena@craft.com.pe<br>
              Teléfono: RPC: 941526329 / 987768828 /Fijo: 016540468<br>
              Dirección: Av. Conquistadores 944 oficina 201-202, San Isidro<br>
              Ciudad: Lima<br>
              País: Perú
            </div>
            <div class="btnPerfil"><a href="proveedores_detalle.php">VER PERFIL</a></div>
          </div>
        </div>

        <div class="col-md-4 col-sm-6 col-xs-12 thumbnail" style="padding:0 15px;">
          <div class="boxProveedores">
            <div style="background:#fff; height:100px;" align="center"><img src="img/logos-clientes/12.jpg" style="max-height:100px;"></div>
            <div style="color:#fc9a00; font-size:16px; padding-top:5px;">IN OUT STUDIO</div>
            <div style="font-size:12px;">
              Categoria: Inmobiliarias y Constructoras<br>
              Presidente: Nayra Iglesias Sánchez<br>
              Correo: nayra.iglesias@inoutstudio.com<br>
              Teléfono: +34 670 333 276 - 928 260 153<br>
              Dirección: C/ Doctor Castelo 26,1º 1ª<br>
              Ciudad: Madrid<br>
              País: España
            </div>
            <div class="btnPerfil"><a href="proveedores_detalle.php">VER PERFIL</a></div>
          </div>
        </div>

        <div class="col-md-4 col-sm-6 col-xs-12 thumbnail" style="padding:0 15px;">
          <div class="boxProveedores">
            <div style="background:#fff; height:100px;" align="center"><img src="img/logos-clientes/13.jpg" style="max-height:100px;"></div>
            <div style="color:#fc9a00; font-size:16px; padding-top:5px;">NOON xyz</div>
            <div style="font-size:12px;">
              Categoria: Inmobiliarias y Constructoras<br>
              Presidente: Brenda Del Pilar Gallegos Castellano<br>
              Correo: noon@noon.com.pe<br>
              Teléfono: 979 340 875 / 637 6646<br>
              Dirección: Calle Ventura Calamaqui 133 – Int. 301 San Miguel<br>
              Ciudad: Lima<br>
              País: Perú
            </div>
            <div class="btnPerfil"><a href="proveedores_detalle.php">VER PERFIL</a></div>
          </div>
        </div>

        <div class="col-md-4 col-sm-6 col-xs-12 thumbnail" style="padding:0 15px;">
          <div class="boxProveedores">
            <div style="background:#fff; height:100px;" align="center"><img src="img/logos-clientes/11.jpg" style="max-height:100px;"></div>
            <div style="color:#fc9a00; font-size:16px; padding-top:5px;">CRAFT DESIGNERS</div>
            <div style="font-size:12px;">
              Categoria: Inmobiliarias y Constructoras<br>
              Presidente: Fernando Peña<br>
              Correo: fpena@craft.com.pe<br>
              Teléfono: RPC: 941526329 / 987768828 /Fijo: 016540468<br>
              Dirección: Av. Conquistadores 944 oficina 201-202, San Isidro<br>
              Ciudad: Lima<br>
              País: Perú
            </div>
            <div class="btnPerfil"><a href="proveedores_detalle.php">VER PERFIL</a></div>
          </div>
        </div>

        <div class="col-md-4 col-sm-6 col-xs-12 thumbnail" style="padding:0 15px;">
          <div class="boxProveedores">
            <div style="background:#fff; height:100px;" align="center"><img src="img/logos-clientes/12.jpg" style="max-height:100px;"></div>
            <div style="color:#fc9a00; font-size:16px; padding-top:5px;">IN OUT STUDIO</div>
            <div style="font-size:12px;">
              Categoria: Inmobiliarias y Constructoras<br>
              Presidente: Nayra Iglesias Sánchez<br>
              Correo: nayra.iglesias@inoutstudio.com<br>
              Teléfono: +34 670 333 276 - 928 260 153<br>
              Dirección: C/ Doctor Castelo 26,1º 1ª<br>
              Ciudad: Madrid<br>
              País: España
            </div>
            <div class="btnPerfil"><a href="proveedores_detalle.php">VER PERFIL</a></div>
          </div>
        </div>

        <div class="col-md-4 col-sm-6 col-xs-12 thumbnail" style="padding:0 15px;">
          <div class="boxProveedores">
            <div style="background:#fff; height:100px;" align="center"><img src="img/logos-clientes/13.jpg" style="max-height:100px;"></div>
            <div style="color:#fc9a00; font-size:16px; padding-top:5px;">NOON mmm</div>
            <div style="font-size:12px;">
              Categoria: Inmobiliarias y Constructoras<br>
              Presidente: Brenda Del Pilar Gallegos Castellano<br>
              Correo: noon@noon.com.pe<br>
              Teléfono: 979 340 875 / 637 6646<br>
              Dirección: Calle Ventura Calamaqui 133 – Int. 301 San Miguel<br>
              Ciudad: Lima<br>
              País: Perú
            </div>
            <div class="btnPerfil"><a href="proveedores_detalle.php">VER PERFIL</a></div>
          </div>
        </div>

      </div>
    </div>

    <div class="col-md-3 col-sm-4 hidden-xs thumbnail" style="padding:0 15px;">
      <!--destacados 1-->
      <div class="boxProveedoresDes1">
        <div style="background:#fff; height:100px;" align="center"><img src="img/logos-clientes/11.jpg" style="max-height:100px;"></div>
        <div style="color:#fc9a00; font-size:16px; padding-top:5px;">CRAFT DESIGNERS dede</div>
        <div style="font-size:12px;">
          Categoria: Inmobiliarias y Constructoras<br>
          Presidente: Fernando Peña<br>
          Correo: fpena@craft.com.pe<br>
          Teléfono: RPC: 941526329 / 987768828 /Fijo: 016540468<br>
          Dirección: Av. Conquistadores 944 oficina 201-202, San Isidro<br>
          Ciudad: Lima<br>
          País: Perú
        </div>
        <div class="btnPerfil"><a href="proveedores_detalle.php">VER PERFIL</a></div>
      </div>

      <div class="boxProveedoresDes1">
        <div style="background:#fff; height:100px;" align="center"><img src="img/logos-clientes/12.jpg" style="max-height:100px;"></div>
        <div style="color:#fc9a00; font-size:16px; padding-top:5px;">IN OUT STUDIO</div>
        <div style="font-size:12px;">
          Categoria: Inmobiliarias y Constructoras<br>
          Presidente: Nayra Iglesias Sánchez<br>
          Correo: nayra.iglesias@inoutstudio.com<br>
          Teléfono: +34 670 333 276 - 928 260 153<br>
          Dirección: C/ Doctor Castelo 26,1º 1ª<br>
          Ciudad: Madrid<br>
          País: España
        </div>
        <div class="btnPerfil"><a href="proveedores_detalle.php">VER PERFIL</a></div>
      </div>
      <!--fin destacados 1-->

      <!--destacados 2-->
      <div class="boxProveedoresDes2">
        <div style="background:#fff; height:100px;" align="center"><img src="img/logos-clientes/13.jpg" style="max-height:100px;"></div>
        <div style="color:#fc9a00; font-size:16px; padding-top:5px;">NOON 123</div>
        <div style="font-size:12px;">
          Categoria: Inmobiliarias y Constructoras<br>
          Presidente: Brenda Del Pilar Gallegos Castellano<br>
          Correo: noon@noon.com.pe<br>
          Teléfono: 979 340 875 / 637 6646<br>
          Dirección: Calle Ventura Calamaqui 133 – Int. 301 San Miguel<br>
          Ciudad: Lima<br>
          País: Perú
        </div>
        <div class="btnPerfil"><a href="proveedores_detalle.php">VER PERFIL</a></div>
      </div>

      <div class="boxProveedoresDes2">
        <div style="background:#fff; height:100px;" align="center"><img src="img/logos-clientes/11.jpg" style="max-height:100px;"></div>
        <div style="color:#fc9a00; font-size:16px; padding-top:5px;">CRAFT DESIGNERS</div>
        <div style="font-size:12px;">
          Categoria: Inmobiliarias y Constructoras<br>
          Presidente: Fernando Peña<br>
          Correo: fpena@craft.com.pe<br>
          Teléfono: RPC: 941526329 / 987768828 /Fijo: 016540468<br>
          Dirección: Av. Conquistadores 944 oficina 201-202, San Isidro<br>
          Ciudad: Lima<br>
          País: Perú
        </div>
        <div class="btnPerfil"><a href="proveedores_detalle.php">VER PERFIL</a></div>
      </div>
      <!--fin destacados 2-->
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

<script type="text/javascript">
$(function(){
  $('#menu5').addClass('menuSecOn');
});
</script>



</html> 