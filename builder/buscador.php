<form id="formbus" name="formbus" method="get" action="franquicias_lista.php">
<div class="hidden-xs">
  <div id="ctBuscador" class="buscadorFijo">
    <div class="buscadorHeader">
      <div style="float:left;">Encuentre su Franquicia</div>
      <div class="salir" id="ctMostrarBtnBuscador"><a href="javascript:;"><i class="fa fa-times-circle"></i></a></div>
      <div style="clear:both;"></div>
    </div>
    <div class="buscadorBody">
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
        <input name="busca" type="text" class="form-control" id="busca" pattern="^[_A-z0-9]{1,}$" placeholder="Buscar por Palabra">
      </div>
      <div>
        <input type="submit" class="btn btn-danger" value="Buscar" />
      </div>
    </div>
  </div>

  <div id="ctBtnBuscador" style="display:none;" class="buscadorFijo">
    <div id="ctMostrarBuscador"><a href="javascript:;"><img src="img/btn-buscador-off.png" style="border:0;"></a></div>
  </div>
 
</div>
</form>
