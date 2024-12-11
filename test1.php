<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'conexion.php';

$id_test = null;
$titulo = "";

if( isset($_GET['id_test']) ) {
  $id_test = $_GET['id_test'];
}

if( isset($_POST['id_test']) ) {
  $id_test = $_POST['id_test'];
}

$titulo = obtiene_titulo($id_test);
$mensaje = "";

if( isset($_POST['savetest']) ) {
  $id_test = $_POST['id_test'];
  $q = "select * from equipo01_preguntastest where id_test = $id_test";
  $rs = ejecutar($q);
  
  // Se recorre cada pregunta del cuestionario.
  while( $r = mysqli_fetch_array($rs) ) {
    $id_pregunta = $r['id_pregunta'];
    $respuesta = "";
    
    // Se obtiene la respuesta de la pregunta.
    if( isset($_POST["p$id_pregunta"]) ) {
      $respuesta = $_POST["p$id_pregunta"];
    }

    // Se inserta el id_opcion seleccionada de la pregunta.
    $q = "insert into equipo01_respuestastest(respuesta, id_test, id_pregunta) values ($respuesta, $id_test, $id_pregunta)";
    if( ejecutar($q) ) {
      $mensaje = "GRACIAS POR CONTRIBUIR <br>TU OPINION NOS AYUDA A COMPRENDER MÁS EL TEMA.";
    }
  }
}

function obtiene_titulo($id_test) {
  $q = "select * from equipo01_tests where id_test = $id_test";
  $rs = ejecutar($q);
  if($r = mysqli_fetch_array($rs)) {
    $titulo = $r['titulo'];
  }
  return $titulo;
}

function crea_preguntas($id_test) {
  $q = "select * from equipo01_preguntastest where id_test = $id_test";
  $rs = ejecutar($q);
  
  $num = 1;
  while($r = mysqli_fetch_array($rs)) {
    $id_pregunta = $r['id_pregunta'];
    $pregunta = $r['pregunta'];
    $id_test = $r['id_test'];
    
    echo "<br><p>$num $pregunta</p>";

    // Se utiliza un segundo query para recuperar las opciones de respuesta.
    $q2 = "select * from equipo01_opciones_pregunta where id_pregunta = $id_pregunta";
    $rs2 = ejecutar($q2);
    while($r2 = mysqli_fetch_array($rs2)) {
      $id_opcion = $r2['id_opcion'];
      $opcion = $r2['opcion'];
      $id_pregunta = $r2['id_pregunta'];
      echo "<input type='radio' name='p$id_pregunta' value='$id_opcion'>$opcion<br>";
    } 
    $num++;
  }
}

?>
<!Doctype html>
<html lang="es" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Universidad Iberoamericana, Observatorio de Juventud y Género, Diseño Interactivo">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Observatorio de Género y Juventud</title>
    <link rel="shortcut icon" href="images/logo_h1.png" />
         <link rel="stylesheet" href="css/estilosinternas.css">

         <link rel="stylesheet" href="css/bootstrap-grid.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="css/bootstrap-grid.css"></script>
    <style>
		.close{color: black !important;}
		.table{
  display: table;
  table-layout: fixed;
  width: 100%;
  padding: 3px;
	background-color: white;color: black;
}

.caption{
  display: table-caption;
  text-align: center;
  font-weight: bold;
}

.thead{
  display: table-header-group;
  font-weight: bold;
}

.tbody{
  display: table-row-group;
}

.tr{
  display: table-row;
}





.th,
.td{
  display: table-cell;
}

.td{
  padding: 10px 0;
}

.label{
  display: none;
}

@media all and (max-width: 600px){
  .thead{
    display: none;
  }
  .tr{
    display: block;
    margin-bottom: 1.5em;
    padding: 10px;
  }
  .td{
    display: inherit;
    padding: 0;
  }
  .label{
    font-weight: bold;
    display: inline-block;
    min-width: 120px;
  }  
}
    
    
    </style>
    <style>
    a{color: white !important;}
    h1{float: left;height: 44px;
    margin-top: 3px;
    position: relative;
    left: 5%;}
body {color: white !important; margin:0;background-color: #2E2E2C !important;}
	h1{ height: 60px;margin-top: 5px; width: 40%; text-indent: -99999999px;background: url(images/logo_NAV.png) 40%/30% no-repeat;float: left;}
.dropdown, .dropup {
    position: unset;
}
.topnav {
  overflow: hidden;
  background:url(images/nav_bar.png) repeat-x;
}

.topnav a {
  float: left;
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
	background-color: #181719;
	border-right: 1px solid;
	font-family: 'barlow semi condensed';
}

.active {
  background-color: #4CAF50;
  color: white;
}

.topnav .icon {
  display: none;
}

.dropdown {
    float: left ;
    overflow: hidden ;
}

.dropdown .dropbtn {
    font-size: 17px;    
    border: none;
    outline: none;
    color: white !important;
    padding: 14px 16px !important;
    background-color: #181719;
    font-family: 'barlow semi condensed';
    margin: 0;border-right: 1px solid;
}

.dropdown-content {
    display: none;
    position: absolute ;
    background-color: white;
	color: white !important;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    float: none !important;
    color: white;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
}

.topnav a:hover, .dropdown:hover .dropbtn {
  background-color: #555;
  color: white;
}

.dropdown-content a:hover {
    background-color: #ddd;
    color: black;
}

.dropdown:hover .dropdown-content {
    display: block;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child), .dropdown .dropbtn {
    display: none;
  }
  .topnav a.icon {
    float: right;
    display: block;
  }
}
        
	
@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
  .topnav.responsive .dropdown {float: none;}
  .topnav.responsive .dropdown-content {position: relative;}
  .topnav.responsive .dropdown .dropbtn {
    display: block;
    width: 100%;
    text-align: left;
  }
}
    @media screen and (max-width: 959px){ and (min-width: 768px)
#myTopnav > a {
    position: relative;
    left: 8%;
        }}
    @media screen and (min-width: 960px){
#myTopnav > a {
    position: relative;
    /* left: 20%; */
    font-size: 1.2em;
    }}
</style>
<style>
	
	body{margin: 0;background-color: #2E2E2C;}

    .preguntas{
        width: 80%;color: white;
    }

    .h2test{    text-align: center;
    color: greenyellow;
    font-family: 'archiveregular';
    line-height: 150px;
    margin-bottom: -30px;font-size: 4em;}
 
		.row{
			margin-right: 0;width: 100%;margin-left: 9%;

		}
.show {
  display: block;
}
		 .close{
			 color: #000000;
		 }

.btn {
  border: none;
  outline: none;
  padding: 12px 16px;
  background-color: #2E2E2C;
  cursor: pointer;
		 } h3{    font-size: 1.5rem;}
        button{margin: 0 auto;}
		
.btn:hover {
  background-color: #2E2E2C;text-decoration: underline;
}
    form{width: 80%;margin: 0 auto;padding: 20px;color: white;} 
.btn.active {
  background-color:#2E2E2C;
  color: white;
}
		.env2{margin-left: 55%;}
        #navAyudar{background-color: #2E2E2C; border: 1px solid white;}

    .tab{padding: 3%;}
.active {
  background-color: beige;
  color: white;
}



    .step{background-color: beige !important;}
	
	
</style>
    
</head>
	<body>
<div class="topnav" id="myTopnav">
	     
<h1 >OBSERVATORIO DE GÉNERO Y JUVENTUD</h1>
	<div id="arriba" style="margin-left: 25%;margin-top: 10px;">
<h2 style="display: none;">Menu de navegación</h2>
  <a href="index.html" class="active">INICIO</a>
  <a href="index.html#">ACERCA</a>
  <a  data-toggle="modal" data-target="#myModal2">CONTACTO</a>
  <div class="dropdown">
    <button class="dropbtn">APRENDER 
    </button>
    <div class="dropdown-content">
      <a href="glosario.html">GLOSARIO</a>
      <a href="preguntas.html">PREGUNTAS FRECUENTES</a>
	<a href="articulos.html">ARTICULOS</a>
        <a href="tests.php">TESTS</a>


    </div>
  </div> 
  <div class="dropdown">
    <button class="dropbtn">CONTRIBUYE 
    </button>
    <div class="dropdown-content">
      <a href="foros.php">FOROS</a>
      <a href="cuestionario.php">CUESTIONARIO</a>
    </div>
  </div> 
  <div class="dropdown">
    <button class="dropbtn">AYUDA
    </button>
    <div class="dropdown-content">
      <a href="#">CENTROS DE AYUDA</a>
      <a href="#">TESTIMONIOS</a>
      <a href="#">RECURSOS A DISTANCIA</a>
    </div>
  </div> 
	
</div>
	
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div> 
    
<h2 class="h2test">TEST</h2>
   <h3 style="text-align:center;color:white;font-family:'sequel';"><?php echo $titulo; ?></h3>

 <form method="post" action="test1.php">
    <input name="savetest" value="savetest" type="hidden">
    <input value="<?php echo $id_test;?>" type="hidden"  name="id_test" >
    <?php crea_preguntas($id_test); ?>
        <?php
    if($mensaje != "") {
        echo "<h3 style='color:black;margin:0 auto;text-align:center;'>$mensaje</h3>";
    }
  ?>  
    <br>
    <input class="btn" style="width:90%;margin:0 auto;background-color:rgb(42, 131, 125);color:white;"type="submit" value="ENVIAR">
  </form>
  <br>
  <button class="btn" style="background-color:#606060;"><a href="tests.php">Regresar a tests</a></button>
    <footer>
  <div id="regresar" ><span>h</span> <p> <span>d </span><a href="#arriba">REGRESAR ARRIBA</a></p></div>  
    <div style="width: 90%;margin: 0 auto;"><div class="row" id="footerh2"><h2 class="col-sm-4"><button type="button" class="btn " style="background-color: inherit;" data-toggle="modal" data-target="#exampleModalLong">
AVISO DE PRIVACIDAD</button></h2><h2 class="col-sm-4">MAPA DEL SITIO</h2><h2 class="col-sm-4"><button class="btn" data-toggle="modal" data-target="#myModal2" style="background-color: inherit;">CONTACTO</button></h2></div></div>

    <div class="row" style="width: 90%;margin: 0 auto;">
        <div class="col-sm-4" style="margin: 0 auto;border:3px solid rgb(242, 82, 110);"> <h3> <span></span>APRENDER</h3><p  ><a href="glosario.html">Glosario</a></p><p><a href="preguntas.html">Preguntas frecuentes</a></p><p><a href="mapa_estadistico.html">Mapa de datos estadísticos</a></p><p><a href="articulos.html">Artículos informativos</a></p><p><a href="#">Testimonios</a></p><p ><a href="tests"> Tests</a></p><p><a href="">Eventos</a></p></div>
    <div class="col-sm-4" style="margin: 0 auto;border: 3px solid #f2526e;"> <h3> <span></span>CONTRIBUIR</h3><p><a href="foros.html">Foro de Discusión</a></p><p><a href="cuestionario.html">Cuestionarios de investigación</a></p></div>
    <div class="col-sm-4" style="margin: 0 auto;border: 3px solid #f2526e;"> <h3> <span></span>AYUDAR</h3><p><a href="mexico_mapa.html">Mapa de Centros de Ayuda</a></p><p>Recursos a Distancia</p><p><a>Compartir testimonio</a></p></div>  
  </div><div style="text-align: right;width: 90%;margin: 0 auto;"><p style="font-size: 1.5em;color: white !important;">Universidad Iberoamericana 2018</p></div>
   
    </footer>   
  <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle" style="color:black !important;">AVISO DE PRIVACIDAD</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <p>En cumplimiento con lo establecido por <strong>la Ley Federal de Protección de Datos Personales</strong> en
Posesión de los Particulares, <strong>la Universidad Iberoamericana</strong>, A. C. con domicilio en Prolongación
Paseo de la Reforma No. 880, Colonia Lomas de Santa Fe, Delegación Álvaro Obregón, C. P.
01219, Ciudad de México, le informa que los datos personales, entendiendo por estos, de manera
enunciativa mas no limitativa: nombre, fecha de nacimiento, nacionalidad, dirección, correo
electrónico, número de teléfono, («datos personales»), los datos personales sensibles,
entendiendo por estos, de manera enunciativa mas no limitativa: origen racial o étnico, estado de
salud presente y futuro, creencias religiosas, filosóficas y morales, afiliación sindical, opiniones
políticas y demás información que pueda ser usada para identificarlo, otorgados por usted
(«Usuario») y recopilados directamente en nuestra base de datos serán usados exclusivamente
			 para que la Universidad Iberoamericana </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
      </div>
    </div>
  </div>
</div>
	
	  <div class="modal fade" id="myModal2" role="dialog" >
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="background-color: #2E2E2C;">
        <div class="modal-header">
          <h4 class="modal-title" style="color:black !important;">¡Contáctanos!</h4>
        </div>
        <div class="modal-body">
       		<div class="contacts table" aria-labelledby="contacts-caption-text">
  <span class="caption" id="contacts-caption-text">OBSERVATORIO DE GÉNERO Y JUVENTUD</span>
  <div class="contacts-header thead">
    <span class="th" id="th-name">Nombre:</span>
    <span class="th" id="th-org">Función:</span>
    <span class="th" id="th-phone">Correo:</span>
  </div>  
  <ul class="tbody">
    <li class="tr" itemscope itemtype="http://schema.org/Person">
      <span class="td">
        <span class="label">Nombre:</span>
        <span class="data" itemprop="name" aria-labelledby="th-name">Elvia</span>
      </span>
      <span class="td" itemscope itemtype="http://schema.org/Organization">
        <span class="label">Función:</span>
        <span class="data" itemprop="name" aria-labelledby="th-org">Coordinadora</span>
      </span>
      <span class="td">
        <span class="label">Correo:</span>
        <span class="data" itemprop="email" aria-labelledby="th-email"><a href="mailto:ola.nordmann@acme-corp.no">elvia@...</a></span>
      </span>
    </li>
    <li class="tr" itemscope itemtype="http://schema.org/Person">
      <span class="td">
        <span class="label">Nombre:</span>
        <span class="data" itemprop="name" aria-labelledby="th-name">Gloria</span>
      </span>
      <span class="td" itemscope itemtype="http://schema.org/Organization">
        <span class="label">Función</span>
        <span class="data" itemprop="name" aria-labelledby="th-org">Asistente</span>
      </span>
      <span class="td">
        <span class="label">Correo</span>
        <span class="data" itemprop="email" aria-labelledby="th-email"><a href="mailto:kari.nordmann@acme-corp.no">Gloria...</a></span>
      </span>
    </li>    
  </ul>
	</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">CERRAR</button>
        </div>
      </div>
      
          </div></div>
    <script> 
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
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
    document.getElementById("nextBtn").innerHTML = "ENVIAR";
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

