<?php


include 'conexion.php';

if(isset($_POST['eliminar'])) {
  $id_comentarios = $_POST['id_comentarios'];
  $q = "delete from equipo01_comentarios where id_comentarios = $id_comentarios";
  ejecutar($q);
}

function crea_tabla_foros() {
  $q = "select equipo01_usuarios.usuario, equipo01_foros.nombreforo, equipo01_comentarios.id_comentarios, equipo01_comentarios.comentarios from equipo01_usuarios inner join 
  equipo01_comentarios on equipo01_usuarios.id_usuarios = equipo01_comentarios.id_usuarios inner join equipo01_foros on equipo01_foros.id_foro = equipo01_comentarios.id_foro";
  $rs = ejecutar($q);
  
  $contenido = " ";
  while($r = mysqli_fetch_array($rs)) {
    $id_foro = $r['id_foro'];
    $nombreforo = $r['nombreforo'];
    $usuario = $r['usuario'];
    $comentarios = $r['comentarios'];
        $id_comentarios = $r['id_comentarios'];  
    $contenido .= "
    	<tr>
        	<td style='color:black;'>$nombreforo</td>
        	<td style='color:black;'>$usuario</td>
            <th style='color:black;'>$comentarios </th>
            <td>  <form method='post' action='bak_foros.php'>
          			<input type='hidden' name='id_comentarios' value='$id_comentarios'>
          			<input class='trash' type='submit' name='eliminar' value='Eliminar'>
                    <button data-toggle='modal' data-target='#ver'>VER</button>
        		</form>
        	</td>
        	<td>
        		$boton
        	</td>
    	</tr>
    ";
  }
  
  echo "
        <table class='existentes'  border='1'>
            <tr style='color:black;'>
                 <th>NOMBRE FORO</th> <th>CREADOR</th> <th>COMENTARIOS</th> <th>FUNCIONES</th>
            </tr>
            $contenido    
        </table>
  	";
}

function crea_foros_pendientes() {
  $q = "select equipo01_usuarios.usuario, equipo01_foros.nombreforo, equipo01_comentarios.id_comentarios, equipo01_comentarios.comentarios from equipo01_usuarios inner join 
  equipo01_comentarios on equipo01_usuarios.id_usuarios = equipo01_comentarios.id_usuarios inner join equipo01_foros on equipo01_foros.id_foro = equipo01_comentarios.id_foro";
  $rs = ejecutar($q);
  
  $contenido = " ";
  while($r = mysqli_fetch_array($rs)) {
    $id_foro = $r['id_foro'];
    $nombreforo = $r['nombreforo'];
    $usuario = $r['usuario']; 
    $contenido .= "
    	<tr>
        	<td style='color:black;'>$nombreforo</td>
        	<td style='color:black;'>$usuario</td>
            <td>  <form method='post' action='bak_foros.php'>
          			<input type='hidden' name='id_foro' value='$id_comentario'>
          			<input class='trash' type='submit' name='eliminar' value='Eliminar'>
                    <button data-toggle='modal' data-target='#ver'>VER</button>
        		</form>
        	</td>
        	<td>
        		$boton
        	</td>
    	</tr>
    ";
  }
  
  echo "
        <table class='existentes'  border='1'>
            <tr style='color:black;'>
                 <th>NOMBRE DEL FORO</th> <th>USUARIO CREADOR</th>  <th>  </th>
            </tr>
            $contenido    
        </table>
  	";
}

function crea_comentarios_pendientes() {
  $o = "select equipo01_usuarios.usuario, equipo01_foros.nombreforo, equipo01_comentarios.id_comentarios, equipo01_comentarios.comentarios from equipo01_usuarios inner join 
  equipo01_comentarios on equipo01_usuarios.id_usuarios = equipo01_comentarios.id_usuarios inner join equipo01_foros on equipo01_foros.id_foro = equipo01_comentarios.id_foro";
  $rs = ejecutar($o);
  
  $contenido = " ";
  while($r = mysqli_fetch_array($rs)) {
    $id_foro = $r['id_foro'];
    $nombreforo = $r['nombreforo'];
    $usuario = $r['usuario']; 
    $fecha = date("Y-m-d H:i:s");
    $contenido .= "
    	<tr>
        	<td style='color:black;'>$usuario</td>
        	<td style='color:black;'>$nombreforo</td>
            <td style='color:black;'>$fecha</td>
            <td>  <form method='post' action='bak_foros.php'>
          			<input type='hidden' name='id_foro' value='$id_foro'>
          			<input class='trash' type='submit' name='eliminar' value='Eliminar'>
                    <button data-toggle='modal' data-target='#ver'>VER</button>
        		</form>
        	</td>
        	<td>
        		$boton
        	</td>
    	</tr>
    ";
  }
  
  echo "
        <table class='existentes'  border='1'>
            <tr style='color:black;'>
                 <th>USUARIO</th> <th>EN EL FORO</th>  <th>FECHA  </th> <th> </th>
            </tr>
            $contenido    
        </table>
  	";
}

?>

<!DOCTYPE html>
<html>
<head>
       <meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1" name="viewport">
	<meta content="IE=edge" http-equiv="X-UA-Compatible">
	<title>Observatorio de Género y Juventud</title>
	<link rel="shortcut icon" href="images/asset11.png" />
	<link href="css/estilos.css" rel="stylesheet">
	<link href="css/bootstrap-grid.min.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js">
	</script>
	<link href="css/maxcdn.bootstrapcdn.css" rel="stylesheet">
	
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js">
	</script>
	<script src="css/bootstrap-grid.css">
	</script>
	<style>
	h2 {
	   font-weight: 600;
	   position: relative;
	   top: 46px;
	       left: -13%;
	}
        #seccion_back_foros > div:nth-child(3) > div.filterDiv.pendientes.show > h3{left: -14%;top:10px;}
	body {
	  
	background-color: #2E2E2C;
	}
        table{position: relative;
    left: 26%; top: 20px;}   
	*{font-family: 'Barlow Semi Condensed', sans-serif; }
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

	.sidenav a:focus, .sidenav a:hover, .sidenav a:active{
	   color: #000000;
	   background-color:#ffffff; 
	}, .sidenav a:active{
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
	   margin-left: 200px; /* Same as the width of the sidenav */}
        textarea{    width: 73%;
    height: 100px;}
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
#seccion_back_foros > div:nth-child(3) > div.filterDiv.existentess.show > table > tbody > tr > th:nth-child(4){ width: 132px;}
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
   .trash{width: 37%;border: none; background: url(images/trash.png) 100% 25%/ 100% no-repeat; text-indent: -9999px;background-color:  #3d3c37; }
     #seccion_back_foros > div:nth-child(3) > div.filterDiv.pendientes.show > div:nth-child(2) > h4{position: relative; top:20px; left: -20%;}
        #seccion_back_foros > div:nth-child(3) > div.filterDiv.pendientes.show > div:nth-child(3) > h4{position: relative;    top: 20px;
    left: -17%;    margin-top: 20px;}
        th.notseen{    border-bottom: 2px solid white;}
        #seccion_back_foros > div:nth-child(3) > div.filterDiv.pendientes.show > div:nth-child(2) > table > tbody > tr > td:nth-child(3),#seccion_back_foros > div:nth-child(3) > div.filterDiv.pendientes.show > div:nth-child(3) > table > tbody > tr > td:nth-child(4) {border-bottom: 2px solid white;}
   #seccion_back_foros > div:nth-child(3) > div.filterDiv.pendientes.show > div > table{height: 100px; padding: 0px;}
        #seccion_back_foros > div:nth-child(3) > div.filterDiv.pendientes.show > div > table > tbody > tr > td{padding: 0px;}
        #navForosBack > button:nth-child(3){background-color: white; color: black; float:right; border-radius: initial;}
        #navForosBack > button:nth-child(3) > span{ padding: 10px 30px; color: white; background: url(images/plus.png) 50% 50% / 40% no-repeat; margin-left: 9px;}
        input{margin-top: -10px;}#seccion_back_foros > div:nth-child(3) > div.filterDiv.existentess.show > table > tbody > tr > td:nth-child(4) > form > button{border: none;}
        #seccion_back_foros > div:nth-child(3) > div.filterDiv.existentess.show > table > tbody > tr:nth-child(2) > td:nth-child(4) > form > button
    .modal-body, .modal-header, .modal-footer {
    background-color: white !important;
        
}
        #regForm2 > h5{color: black !important;}
        #regForm2 > h6{color: black !important;}
        #proponer > div > div > div.modal-footer > button.btn.btn-default, #eliminar > div > div > div.modal-footer > button.btn.btn-default, #ver > div > div > div.modal-footer > button.btn.btn-default{border-radius: 0px;
    padding: 1px 11px;
    font-size: 1.1em;
    background-color: #3d3c37;}
        .modal-footer{margin: 0 auto;}
        body > div.sidenav > a:focus,  body > div.sidenav > a:active{background-color: white; color: black;}
	</style>
</head>
<body>
	<div id="divmonofeo">
		<span id="monofeo">g</span> <button id="cuenta">TU CUENTA</button>
	</div>
	<p id="observatorio"></p>
	<div class="sidenav">
		<a href="#">INICIO</a> <a href="#">FOROS</a> <a href="#">TEST</a> <a href="#">CUESTIONARIOS</a> <a href="#">MAPAS</a> <a href="#">ARTÍCULOS</a>
        <button id="salir">SALIR</button>
	</div>
	<div class="main">
		<div id="seccion_back_foros">
			<h2>FOROS</h2>
			<div id="navForosBack">
				<button class="btn active" onclick="filterSelection('existentess')">EXISTENTES</button> <button class="btn" onclick="filterSelection('pendientes')">PENDIENTES DE APROBACIÓN</button> <button class="btn" onclick="filterSelection('crear')" id="proponer_conversacion" data-toggle="modal" data-target="#proponer"> CREAR NUEVOS<span style="background-color:#00A99D;">+</span></button>
			</div>
			<div >
				<div class="filterDiv existentess">
                    <h3>EXISTENTES</h3>
                     <?php crea_tabla_foros(); ?>
							
				</div>
				<div class="filterDiv pendientes">
                    <h3>PENDIENTES DE APROBACIÓN</h3>
					<div>
                    <h4>FOROS</h4> 
                        <?php crea_foros_pendientes(); ?>
                  
                    <h4>COMENTARIOS</h4>
                        <?php crea_comentarios_pendientes(); ?>
                          
   
                 
     <style>
         #regForm1{  width: 58%;
    position: relative;
    left: 33%;
    top: 56px;
         height: 440px;     
         } 
         #regForm1 > div.tab > h3{left: 17px;}
         #regForm1 > div.tab > h4{color: black;font-weight: 700;font-size: 1em;    margin-left: 79px;
    text-align: left;}
         #regForm1 > div.tab > p:nth-child(4) > input{
    border: 1px solid black;
    width: 300px;    position: relative;
    top: -30px;
    left: -19px;}
         #regForm1 > div.tab > p:nth-child(6) > input{width: 590px; height: 140px;border: 1px solid black;}
         .tab>h3 {
                 width: 95%;
    margin-top: 3%;
    text-align: center;
    color: white;
             border-bottom: 2px solid black;
   
         }
         #regForm1 > div.tab > h4:nth-child(2){margin-top: 39px;}
         .publicar, .cancelar{border: none;}
         
      #proponer > span   {    color: black;
    font-weight: 900;
    font-size: 2em;
    position: relative;
    top: 123px;
    z-index: 3;
    left: 39%;}
    </style>   

    <div id="eliminar" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">¿Estás seguro de querer eliminar?</h4>
      </div>
      <div class="modal-body">
    <p style="color:black;left: 7px;margin-top: 30px;">FORO: </p>
   <p id="temaforo" style="margin-top: 40px;"></p>
      </div>
          
      <div class="modal-footer">
          <button class="publicar">PUBLICAR</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">CANCELAR</button>
      </div>
    </div>

  </div>
</div>
     <div id="ver" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">PERFILES DE PARTICIPANTES</h4>
      </div>
      <div class="modal-body">
    <p></p>
      </div>
          
      <div class="modal-footer">
          <button class="publicar">PUBLICAR</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">CANCELAR</button>
      </div>
    </div>

  </div>
</div>       
     <div id="proponer" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">CREAR NUEVO FORO</h4>
      </div>
      <div class="modal-body">
  <form  id="regForm2" action="/action_page.php" style="background-color:white;">
    <h5>USUARIO:OGJ</h5>      
       <h6>TITULO DE FORO</h6>
       <p><input class="explicacion" placeholder="Escribir..." oninput="this.className = ''" name="explicacion"></p>
  <h6>INTRODUCCIÓN DE FORO Y PREGUNTA</h6>
    <textarea class="explicacion" placeholder="Escribir..." oninput="this.className = ''" name="explicacion"></textarea>
   <p style="color:black;">¿QUÉ QUIERES HACER?</p>      
          
</form>
      </div>
      <div class="modal-footer">
          <button class="publicar">PUBLICAR</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
      </div>
    </div>


         </div></div></div></div></div></div></div>
	<script>
	filterSelection("existentess")
	function filterSelection(c) {
	 var x, i;
	 x = document.getElementsByClassName("filterDiv");
	 if (c == "all") c = "";
	 for (i = 0; i < x.length; i++) {
	   w3RemoveClass(x[i], "show");
	   if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
	 }
	}

	function w3AddClass(element, name) {
	 var i, arr1, arr2;
	 arr1 = element.className.split(" ");
	 arr2 = name.split(" ");
	 for (i = 0; i < arr2.length; i++) {
	   if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
	 }
	}

	function w3RemoveClass(element, name) {
	 var i, arr1, arr2;
	 arr1 = element.className.split(" ");
	 arr2 = name.split(" ");
	 for (i = 0; i < arr2.length; i++) {
	   while (arr1.indexOf(arr2[i]) > -1) {
	     arr1.splice(arr1.indexOf(arr2[i]), 1);     
	   }
	 }
	 element.className = arr1.join(" ");
	}

	// Add active class to the current button (highlight it)
	var btnContainer = document.getElementById("navForosBack");
	var btns = btnContainer.getElementsByClassName("btn");
	for (var i = 0; i < btns.length; i++) {
	 btns[i].addEventListener("click", function(){
	   var current = document.getElementsByClassName("active");
	   current[0].className = current[0].className.replace(" active", "");
	   this.className += " active";
	 });
	}
	</script>
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
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "SIGUIENTE";
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
    document.getElementById("regForm1").submit();
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