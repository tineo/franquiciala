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

<script type="text/javascript">

  $(function(){
      const element = document.querySelector('form');
      element.addEventListener('submit', event => {
          event.preventDefault();
      // actual logic, e.g. validate the form
      console.log('Form submission cancelled.');
        });


    var u = $("#form-username");
    var p = $("#form-password");

    var $myForm = $('#login-frm');

    $("#logenvia").on("click",function(event){
            event.preventDefault();
            //alert($myForm[0].checkValidity())

            if(u.val() == "" && p.val() == ""){
                $("#login-alerta").text("Usuario y contraseñas no pueden estar vacios");
                $("#login-alerta").fadeIn();
            }else if(u.val() != "" && p.val() == ""){
                $("#login-alerta").text("Ingresa una contraseña");
                $("#login-alerta").fadeIn();
            }

          if ($myForm[0].checkValidity()) {
            $.ajax({
              method: "POST",
              url: "ajax/login.php",
              data: { uname: u.val(), pswd: p.val() }
              ,statusCode: {
                    200: function(data) {
                        //alert( "page not found 200" );
                        window.location.replace("http://"+window.location.host+"/perfilad.php");
                    },403: function(data) {
                        //alert( "page not found 403" );
                        $("#login-alerta").text("Usuario y/o contraseña incorrecta");
                        $("#login-alerta").fadeIn();
                    },404: function(data) {
                        //alert( "page not found 404" );
                    }
                }
            })
                /*.done(function (data) {
                console.log("done")
                console.log(data)
              //
            }).error(function (data) {
                console.log("error")
                console.log(data)
            })*/;
            //alert("ajax sent");
            //console.log(u.val());
            //console.log(p.val());
          }

      return false;
    });
  });
</script>

<style>

    .foto-selected{
        border-color: #c1984e;
    }
</style>