<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'conexion.php';

$id_cuestionario = null;
$id_pregunta = null;
$pregunta = "";

// El id_cuestionario y id_pregunta puede venir por POST o por GET, se consideran ambos casos.
if( isset($_GET['id_cuestionario']) ) {
    $id_cuestionario = $_GET['id_cuestionario'];
}

if( isset($_POST['id_cuestionario']) ) {
    $id_cuestionario = $_POST['id_cuestionario'];
}

if( isset($_GET['id_pregunta']) ) {
    $id_pregunta = $_GET['id_pregunta'];
}

if( isset($_POST['id_pregunta']) ) {
    $id_pregunta = $_POST['id_pregunta'];
}

if( isset($id_pregunta) ) {
    $q = "select pregunta from equipo01_preguntascuestionario where id_pregunta = $id_pregunta";
    $rs = ejecutar($q);
    if($r = mysqli_fetch_array($rs)) {
        $pregunta = $r['pregunta'];
    }
}

if( isset($_POST['eliminar']) ) {
    $id_opcion = $_POST['id_opcion'];
    $q = "delete from equipo01_opciones_preguntacues where id_opcion = $id_opcion";
    $rs = ejecutar($q);
}

if( isset($_POST['insertopcion']) ) {
    $opcion = $_POST['opcion'];
    $id_pregunta = $_POST['id_pregunta'];
	$q = "insert into equipo01_opciones_preguntacues(opcion, id_pregunta) values ('$opcion','$id_pregunta')";
	$rs = ejecutar($q);
}

function crea_lista_opciones($id_pregunta, $id_cuestionario) {
    $q = "select * from equipo01_opciones_preguntacues where id_pregunta = $id_pregunta";
	$rs = ejecutar($q);
	$contenido = "";
	while($r = mysqli_fetch_array($rs)) {
	    $id_opcion = $r['id_opcion'];
        $opcion = $r['opcion'];
        $id_pregunta = $r['id_pregunta'];
		$contenido .= "
            <tr>
                <td>$opcion</td>
                <td>
                    <form action='admin_opciones.php' method='post'>
                        <input type='hidden' name='id_cuestionario' value='$id_cuestionario'>
                        <input type='hidden' name='id_pregunta' value='$id_pregunta'>
                        <input type='hidden' name='id_opcion' value='$id_opcion'>
                        <input type='submit' name='eliminar' value='Eliminar'>
                    </form>
                </td>
            </tr>
        ";
	}
	
	echo "
        <table class='existentes' style='color:black !important;'>
            <tr>
             <th >Opción</th> <th>Eliminar</th>
            </tr>
            $contenido    
        </table>
    ";
}

?>
<!DOCTYPE html>
<html lang="es" >
<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1" name="viewport">
	<meta content="IE=edge" http-equiv="X-UA-Compatible">
	<title>Observatorio de Género y Juventud</title>
<link rel="shortcut icon" href="images/logo_h1.png" />
	<link href="css/estilos.css" rel="stylesheet">
	<link href="cms.css" rel="stylesheet">
	<link href="css/bootstrap-grid.min.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js">
	</script>
	<link href="css/maxcdn.bootstrapcdn.css" rel="stylesheet">
	<link href="aprender_estilo.css" rel="stylesheet">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js">
	</script>
	<script src="css/bootstrap-grid.css">
	</script>
	<style>
        .enviar {
    background-color: #00A99D !important;
    color: white !important;
}
        a:link{color: white !important;}
		.form-control{color: black !important;}
		input{border:1px solid black;}
		input.invalid {
  background-color: #ffdddd;
}
        a{color: white !important;}
/* Hide all steps by default: */
.tab {
  display: none;
}


button:hover {
  opacity: 0.8;
}

#prevBtn , #nextBtn {
  background-color: #00AB9E  !important;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: dimgray;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #4CAF50;
}
		
		
		.form-control{background-color: white!important;}
		form{color: black !important;}
		td{color: black !important;text-align: left;}
		.botone{background-color: #2E2E2C !important;color: white!important; }
		.tablad{background-color:#00AB9E !important;color: white !important;}
		.modal-body > td,th,tr {border:1px solid black; text-align: center;}
		.modal-body > tr { border:1px solid black;padding: 2px;}
	h2 {
	   font-weight: 600;
	   position: relative;
	   top: 46px;
	       left: -13%;
	}
	body {
	  
	background-color: #2E2E2C;
	}
	*{font-family: 'Barlow Semi Condensed', sans-serif; }
	.sidenav {
	   height: 100%;
	   width: 268px;
	   position: fixed;
	   z-index: 1;
	   top: 0;
	   left: 72px;
	   background:url(images/texture_nav_backend.png) 100%/ 100% repeat-y;
	   overflow-x: hidden;
	   padding-top: 20px;
	}
	#observatorio {
	   height: 200px;
	   /* display: block; */
	   background: url(images/logo_h1.png) 280px 56% /30% no-repeat;
	   width: 30%;
	   z-index: 3;
	   position: fixed;
	   /* position: absolute; */
	   /* position: relative; */
	}
	#monofeo {
	   float: left;
	   width: 40%;
	   height: 34px;
	   display: inline-block;
	   background: url(images/monillo.png) 0% 100%/25px no-repeat;
	   text-indent: -9999px;
	   z-index: 3;
	   position: relative;
	   left: 137px;
	   top: 55px;
	}
	   #navForosBack{margin-left: 255px;
	   width: 64%;
	   margin-top: 77px;
	   border: 1px white solid;
	   background-color: none;
	           word-spacing: 61px;
	}
	   #navForosBack > button:hover{
	       background-color: white;
	       color: black;
	       text-decoration-line: underline;
	       border-radius: 0px;
	   }
	.sidenav a {
	   width: 64%;
	   background-color: #2E2E2C;
	   margin-top: 16px;
	   margin-right: auto;
	   margin-left: auto;
	   padding: 6px 3px 6px 8px;
	   text-decoration: none;
	   font-size: 21px;
	   color: #ffffff;
	   display: block;
	   position: relative;
	   top: 168px;
	   font-weight: 600px !important;
	}

	.sidenav a:active{
	   color: #000000;
	   background-color:#ffffff; 
	}
	#cuenta {
	   position: absolute;
	   z-index: 2;
	   left: 152px;
	   top: 54px;
	   padding: 6px 11px;
	   background-color: #2E2E2C;
	   /* background: none; */
	   border: none;
	}
	.salir {
	   z-index: 3;
	   position: absolute;
	   top: 591px;
	   left: 167px;
	   border: none;
	   padding: 4px 18px;
	   background-color: #2E2E2C;
	}
	.main {
	   margin-left: 200px; /* Same as the width of the sidenav */
	}
#seccion_back_foros > div:nth-child(3) > div.filterDiv.existentes.show > table > thead > tr > th:nth-child(1){width: 280px;}
	@media screen and (max-height: 450px) {
	 .sidenav {padding-top: 15px;}
	 .sidenav a {font-size: 18px;}
	}
	</style>
	<style>
	
table.existentes {
    background-color: rgb(255, 255, 255);
    width: 58%;
    position: relative;
    left: 285px;
    top: 20px;
    border: 15px solid white;
    height: 200px;
    text-align: center;
    border-collapse: collapse;
}
	table.existentes td, table.existentes th {
	 border: 1px solid #000000;
	 padding: 5px 3px;
	}
	table.existentes thead {
	   border-bottom: 2px solid #444444;
	}
	table.existentes thead th {   
	 font-size: 15px;
	 font-weight: bold;
	 color: #000000;
	 text-align: center;
	}
        h3{position: relative;
    left: -190px;
    top: 20px;}
       table > thead > tr > th:nth-child(1){width: 280px;}
        td > button { background-color: #3d3c37;color: white;}
        .eliminar {width: 20%; background: url(eliminar.png) center center no-repeat; text-indent: -9999px;background-color:  #3d3c37; }
  body > div.sidenav > a:active{background-color: white;}
	h2 {
	   font-weight: 600;
	   position: relative;
	   top: 46px;
	       left: -13%;
	}
        #seccion_back_foros > div:nth-child(3) > div.filterDiv.pendientes.show > h3{left: -14%;top:10px;}

	.sidenav {
	   height: 100%;
	   width: 268px;
	   position: fixed;
	   z-index: 1;
	   top: 0;
	   left: 72px;
	   background:url(images/texture_nav_backend.png) 100%/ 100% no-repeat;
	   overflow-x: hidden;
	   padding-top: 20px;
	}
	#observatorio {
	   height: 200px;
	   /* display: block; */
	   background: url(images/logo_h1.png) 280px 56% /30% no-repeat;
	   width: 30%;
	   z-index: 3;
	   position: fixed;
	   /* position: absolute; */
	   /* position: relative; */
	}
	#monofeo {
	   float: left;
	   width: 40%;
	   height: 34px;
	   display: inline-block;
	   background: url(images/monillo.png) 0% 100%/25px no-repeat;
	   text-indent: -9999px;
	   z-index: 3;
	   position: relative;
	   left: 137px;
	   top: 55px;
	}
	   #navForosBack{margin-left: 255px;
	   width: 64%;
	   margin-top: 77px;
	   border: 1px white solid;
	   background-color: none;
	           word-spacing: 61px;
	}
	   #navForosBack > button:hover{
	       background-color: white;
	       color: black;
	       text-decoration-line: underline;
	       border-radius: 0px;
	   }
	   #navForosBack > button{background: none;}
	.sidenav a {
	   width: 64%;
	   background-color: #2E2E2C;
	   margin-top: 16px;
	   margin-right: auto;
	   margin-left: auto;
	   padding: 6px 3px 6px 8px;
	   text-decoration: none;
	   font-size: 21px;
	   color: #ffffff;
	   display: block;
	   position: relative;
	   top: 168px;
	   font-weight: 600px !important;
	}

	.sidenav a:active{
	   color: #000000;
	   background-color:#ffffff; 
	}
        .active{color: white;}
	#cuenta {
	   position: absolute;
	   z-index: 2;
	   left: 152px;
	   top: 54px;
	   padding: 6px 11px;
	   background-color: #2E2E2C;
	   /* background: none; */
	   border: none;
	}
	#salir {
	   z-index: 3;
	   position: absolute;
	   top: 591px;
	   left: 94px;
	   border: none;
	   padding: 4px 18px;
	   background-color: #2E2E2C;
	}
	.main {
	   margin-left: 200px; /* Same as the width of the sidenav */
	}
#seccion_back_foros > div:nth-child(3) > div.filterDiv.existentes.show > table > thead > tr > th:nth-child(1){width: 280px;}
	@media screen and (max-height: 450px) {
	 .sidenav {padding-top: 15px;}
	 .sidenav a {font-size: 18px;}
	}
	</style>
	<style>
	.filterDiv {
	 text-align: center;
	 margin: 2px;
	 display: none;
	}

	.show {
	 display: block;
	}

	.container {
	 margin-top: 20px;
	 overflow: hidden;
	}

	/* Style the buttons */
	.btn {
	 border: none;
	 outline: none;
	 padding: 12px 16px;
	 background-color: #f1f1f1;
	 cursor: pointer;
	}

	.btn:hover {
	 background-color: #ddd;
	}

	.btn.active {
	 background-color: #666;
	 color: white;
	}
table.existentes, tab {
    background-color: rgb(255, 255, 255);
    width: 58%;
    position: relative;
    left: 285px;
    top: 20px;
    border: 15px solid white;
    height: 200px;
    text-align: center;
    border-collapse: collapse;
}
	table.existentes td, table.existentes th {
	 border: 1px solid #000000;
	 padding: 5px 3px;
	}
	table.existentes thead {
	   border-bottom: 2px solid #444444;
	}
	table.existentes thead th {   
	 font-size: 15px;
	 font-weight: bold;
	 color: #000000;
	 text-align: center;
	}
        h3{position: relative;
    left: -190px;
    top: 20px;}
        button{background-color: #3d3c37;}}
        #seccion_back_foros > div:nth-child(3) > div.filterDiv.existentess.show > table > thead > tr > th:nth-child(1){width: 280px;}
        td:nth-child(4) > button { background-color: #3d3c37;}
   #seccion_back_foros > div:nth-child(3) > div.filterDiv.existentess.show > table > tbody > tr > td:nth-child(4) > button:nth-child(1){width: 28%;; background: url(images/trash.png) 100% 25%/ 100% no-repeat; text-indent: -9999px;background-color:  #3d3c37; }
     #seccion_back_foros > div:nth-child(3) > div.filterDiv.pendientes.show > div:nth-child(2) > h4{position: relative; top:20px; left: -20%;}
        #seccion_back_foros > div:nth-child(3) > div.filterDiv.pendientes.show > div:nth-child(3) > h4{position: relative;    top: 20px;
    left: -17%;    margin-top: 20px;}
        th.notseen{    border-bottom: 2px solid white;}
        #seccion_back_foros > div:nth-child(3) > div.filterDiv.pendientes.show > div:nth-child(2) > table > tbody > tr > td:nth-child(3),#seccion_back_foros > div:nth-child(3) > div.filterDiv.pendientes.show > div:nth-child(3) > table > tbody > tr > td:nth-child(4) {border-bottom: 2px solid white;}
   #seccion_back_foros > div:nth-child(3) > div.filterDiv.pendientes.show > div > table{height: 100px; padding: 0px;}
        #seccion_back_foros > div:nth-child(3) > div.filterDiv.pendientes.show > div > table > tbody > tr > td{padding: 0px;}
        #navForosBack > button:nth-child(3){background-color: white; color: black; float:right; border-radius: initial;}
        #navForosBack > button:nth-child(3) > span{ padding: 10px 30px; color: white; background: url(images/plus.png) 50% 50% / 40% no-repeat; margin-left: 9px;}
        input{margin-top: -10px;}
	</style>
</head>
<body>
		<span id="monofeo">g</span> <button id="cuenta">TU CUENTA</button>
	<p id="observatorio"></p>
	<div class="sidenav">
		<a href="bak_inicio.php">INICIO</a> <a href="bak_foros.php">FOROS</a> <a href="testp.php">TEST</a> <a href="cuestionariosbackend.php" style="background-color: white;color: #2E2E2C !important;">CUESTIONARIOS</a> <a href="#">MAPAS</a> <a href="back_articulos_bueno.php">ARTÍCULOS</a>
        <button id="salir">SALIR</button>
	</div>
	<div class="main">
		<div id="seccion_back_foros">
			<h2>CUESTIONARIOS</h2>
			<div>
				<button style="background-color: white;border: none; color: black;position: relative;left: 20%;" class="btn" data-toggle="modal" data-target="#myModal22">AYUDA</button>
				<br>
<button style="background-color: white;    color: #5b5b5c;position:relative;left:20%;margin-top:10px" class="btn"  data-toggle="modal" data-target="#myModal10">NUEVA OPCION<span style="background-color:#00A99D; 
                        padding: 5.5px 20px;
                        margin-left: 10px;
                     ">+</span></button>
		</div>
			<div>
				
                    <h3><?php echo $pregunta; ?></h3>
           
  <br>
  <?php crea_lista_opciones($id_pregunta, $id_cuestionario); ?>
  
  <br>
  <a href="admin_preguntascuest.php?id_cuestionario=<?php echo $id_cuestionario;?>">Regresar a Administrador de Preguntas</a>
			</div>
			
		</div>
	</div>
  
		<button class="salir"  data-toggle="modal" data-target="#salirback">SALIR</button> 
  
<div class="modal fade" id="salirback" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
 
      <div class="modal-body">
    <div style="border:1px solid;padding:10px;">
        <p style="font-size:2.5em;">¿QUIERES SALIR DEL ADMINISTRADOR?</p>
  
        <button style ="width:50% !important;margin:0 auto;"class="btn enviar"><a href="login.php">SALIR</a></button>
        <br><br>
        <button style ="width:50% !important;margin:0 auto;" type="button" class="btn enviar " data-dismiss="modal">CANCELAR</button>
        <br>
    </div>
    </div>
  </div>
    </div></div>
	
  <div class="modal fade" id="myModal10" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-body">
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 style="color: black;width: 90%;margin-top: 10px;border-bottom:1px solid;
    margin: 0 auto;">CREAR NUEVAS OPCIONES</h4>   
<p>AGREGA OPCIONES PARA TU PREGUNTA</p>
<form method="post" action="admin_opcionescuest.php" >
  	<input type="hidden" name="insertopcion" value="insertopcion">
    <input type="hidden" name="id_cuestionario" value="<?php echo $id_cuestionario; ?>">
  	<input type="hidden" name="id_pregunta" value="<?php echo $id_pregunta; ?>">
  	Opción de respuesta nueva:<br>
  	<input type="text" name="opcion">
  	<br><br><br><input class="btn enviar" type="submit" value="PUBLICAR">
  </form>   
        
			
      </div>
    </div>
	  </div></div>
	

			
  <div class="modal fade" id="myModal22" role="dialog">
    <div  class="modal-dialog modal-dialog-centered" role="document">
      <div style="width: 300px !important;"class="modal-content">
         <div class="modal-body">
			         
          <button  style="margin-bottom:10px;margin-top: 10px;color: black !important; background-color: white;" class="btn "><a href="files/manual_administrador" download="manual" style="color:black !important;">DESCARGAR MANUAL DE USO <span style="background-color: #00AB9F;">ver</span></a></button>
			
        </div>
   
      </div>
    </div>
  </div>
	
	
	<script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the crurrent tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "TERMINAR Y PUBLICAR";
  } else {
    document.getElementById("nextBtn").innerHTML = "CONTINUAR";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}
</script>
	</body>
</html>