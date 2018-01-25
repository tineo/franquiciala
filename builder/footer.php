<div style="padding:30px 0; background:#2a2a2a;">
  <div class="container">
    <div class="row">
    
	<? $cont = mysql_query("Select * From infoweb Where idinfo='1'",$conexion) or die("Problemas en el select:".mysql_error());
	while ($contacto=mysql_fetch_array($cont))
	{ ?>
      <div class="col-md-8" style="padding-bottom:10px;">
        <div style="color:#fff; font-size:18px; padding-bottom:8px;">CONT&Aacute;CTANOS</div>
        <div style="background:#fc9a00; height:1px; width:100%;"></div>
        <p style="color:#8d8d8d; padding-top:8px;"><? echo $contacto['mmspie']; ?></p>
        <span style="color:#d9d9d9;"><i class="fa fa-phone"></i> <? echo $contacto['central']; ?></span>
        <br>
        <span style="color:#d9d9d9;"><i class="fa fa-envelope"></i> <? echo $contacto['mail1']; ?></span>
      </div>
    <? } ?> 
    
      <div class="col-md-4" style="padding-bottom:10px;">
        <div style="color:#fff; font-size:18px; padding-bottom:8px;">TAGS</div>
        <div style="background:#fc9a00; height:1px; width:100%;"></div>
        <div style="padding-top:8px;">
	<? $pal = mysql_query("Select * From palabras",$conexion) or die("Problemas en el select:".mysql_error());
	while ($pala=mysql_fetch_array($pal))
	{
		echo '<div class="tag"><a href="#">'.$pala['palabra'].'</a></div>';
	}?>
        </div>
      </div>
      
    </div>
  </div>
</div>