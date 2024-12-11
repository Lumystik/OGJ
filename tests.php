<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'conexion.php';

function crea_cuestionarios() {
  $q = "select * from equipo01_tests ";
  $rs = ejecutar($q);
    
    while( $r = mysqli_fetch_array($rs) ) {
    $id_test = $r['id_test'];
    $titulo = $r['titulo'];
    $descripcion = $r['descripcion'];
    
    echo 
      
      "  
    <div class='col-sm-5 col-lg-5 test' >

	  <h3 class='nombre_art'>$titulo</h3>
					   <p>$descripcion</p>
            <button class='btn botonArt'><a href='test1.php?id_test=$id_test'>PARTICIPA</a></button> <br></div>
                                       
"
        ;
  }
}

?>

<!Doctype html>
<html lang="es" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="author" cont+ent="Universidad Iberoamericana, Observatorio de Juventud y Género, Diseño Interactivo">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Observatorio de Género y Juventud</title>
  <link rel="shortcut icon" href="images/asset11.png" />
      <link href="css/estilosinternas.css" rel="stylesheet">
         <link rel="stylesheet" href="css/bootstrap-grid.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="css/bootstrap-grid.css"></script>
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
    border-right: 5px solid #8fbc8f;
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
    body>div {
    max-width: 1920px;
    display: flex;
    flex-flow: row wrap;
    justify-content: space-around;
}
    footer{width: 100%;}
    h2{width: 100%;}
	input:required,
textarea:required {
  border-color: red !important;
}

	body{ color: white !important;}
	a:link{ color: white !important;}
		a:active{ color: white !important;}

	#prevBtn , #nextBtn {
  background-color: #00AB9E  !important;    color: white;
    border: none;
    width: 150px;
    height: 50px !important;
}
	label{color: black !important;}
    footer{clear: both;width: 100%;}
    .h2test{    text-align: center;
    color: #8fbc8f;
    font-family: 'archiveregular';
   
		font-size: 4em;}.close{color: black;}
 
	body{background-color: #2E2E2C;}
        .nombreArt{
                border-bottom: 2px solid;
	}form{color: black;}
        
		.filterDivArticulos{
  color: #ffffff;
  text-align: center;
  display: none;
}
		.row{
			margin:0 auto; width: 100%;

		}
	.test{padding: 10px;
    background-color: darkseagreen;
    margin-left: 20px;
    margin-right: 10px;
        margin-bottom: 10px;}
.show {
  display: block;
}
		 .close{
			 color: #000000 !important;
		 }


		articulos1{
			margin: 0 auto;
		}
        h3{
            font-family: 'Sequel Neue';
	} .modal-title{color: white;text-align: center;}
/* Style the buttons */
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
       
.btn.active {
  background-color:#2E2E2C;
  color: white;
}
		.env2{margin-left: 55%;}
        #navAyudar{background-color: #2E2E2C; border: 1px solid white;}

		 @media (min-width: 1024px){
			 .h2articulo{font-size: 3rem;}
			 .btn{font-size: 1rem;}
		 }

    </style>
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
</head> 
	<body>
<nav>
<div class="topnav" id="myTopnav">
	     
<h1 >OBSERVATORIO DE GÉNERO Y JUVENTUD</h1>
	<div style="margin-left: 25%;margin-top: 10px;">
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
      <a href="mapa_estadistico.html">MAPAS</a>
	<a href="articulos.html">ARTICULOS</a>


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
        </nav>
<div id="seccion_aprender_inicio" style="color: white;">
    <h2 class="h2test" id="aprender_h2_uno">TESTS</h2>
    
<br><br>
    <p style="width:100%;">El observatorio a creado test para que jovenes conozcan más acerca de sus relaciones de pareja.</p>
    <?php crea_cuestionarios(); ?>
   
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
  <div class="modal fade" id="myModal10" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-body">
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			 <form id="regForm" method="post" class="form-horizontal" action="/action_page.php">

  <div class="tab"> 
	  <p style="color: black;
    border-bottom: 1px solid black;
    width: 90%;
    margin: 0 auto;
    font-size: 24px;">GRACIAS POR QUERER CONTRIBUIR</p>  <!-- One "tab" for each step in the form: -->
 <p style="width: 80%;text-align: left;margin: 0 auto;">El observatorio a creado test para que jovenes conozcan más acerca de sus relaciones de pareja.</p>
<br/>
<p style="width: 80%;text-align: left;margin: 0 auto;">Recuerda que NO existen respuestas correctas ni incorrectas, lo que queremos es que expreses tu propia opinión a partir de tu experiencia y contestes con sinceridad.</p>
			
        </div>
  <div class="tab">
 <p style="font-size: 24px; color: black;text-align: center;border-bottom: 1px solid;width: 90%;margin: 0 auto;">GRACIAS POR QUERER CONTRIBUIR</p>
  <p>Para poder contribuir sólo te pedimos los siguientes datos</p>
  <p class="advertencia">- Se mantendran privados y no se mostraran de ninguna manera<br/>
</p>
    GÉNERO:
    <p><input placeholder="género..." oninput="this.className = ''" name="genero" required></p>
    EDAD:
    <p><input placeholder="edad..." oninput="this.className = ''" name="edad" required></p>
    ESTADO:
    <p><input placeholder="estado..." oninput="this.className = ''" name="estado" required></p>
  </div>
 <div class="tab" style="color: black !important;">
	   <p style="font-size: 24px; color: black;text-align: center;border-bottom: 1px solid;width: 80%;margin: 0 auto;">TEST</p>
   <p class="preguntas">1.¿Tu novio/a revisa tu correo electrónico, mensajes de teléfono, WhatsApp, etc.?</p>
     <input type="radio" name="preg1" value="si"  required> SI<br> 
	   <input type="radio" name="preg1" value="no" required> NO<br>

  
  </div>
   <div class="tab" style="color: black !important;">
	   <p style="font-size: 24px; color: black;text-align: center;border-bottom: 1px solid;width: 80%;margin: 0 auto;">TEST</p>
   <p class="preguntas">2.Sientes que debes tener relaciones sexuales con él/ella para que no se vaya con otra persona o “porque es lo normal después del tiempo que llevan juntos”?</p>
     <input type="radio" name="preg2" value="si" checked required> SI<br> 
	   <input type="radio" name="preg2" value="no" required> NO<br>

  
  </div>
     <div class="tab" style="color: black !important;">
	   <p style="font-size: 24px; color: black;text-align: center;border-bottom: 1px solid;width: 80%;margin: 0 auto;">TEST</p>
   <p class="preguntas">3.	¿Sientes que te has alejado de tu familia, amigos y amigas desde que estás saliendo con tu novio/a?</p>
     <input type="radio" name="preg3" value="si" checked required> SI<br> 
	   <input type="radio" name="preg3" value="no" required> NO<br>

  
  </div>
       <div class="tab" style="color: black !important;">
	   <p style="font-size: 24px; color: black;text-align: center;border-bottom: 1px solid;width: 80%;margin: 0 auto;">TEST</p>
   <p class="preguntas">4.	¿Tu pareja te ha dejado de hablar o te ha ignorado (ley del hielo)  y te hace sentir culpable por eso? </p>
     <input type="radio" name="preg4" value="si" checked required> SI<br> 
	   <input type="radio" name="preg4" value="no" required> NO<br>
 </div>
  
  <div style="overflow:auto;">
    <div style="float:right;">
      <button type="button" id="prevBtn" onclick="nextPrev(-1)">ANTERIOR</button>
      <button type="button" id="nextBtn" onclick="nextPrev(1)">CONTINUAR</button>
    </div>
  </div>
  <!-- Circles which indicates the steps of the form: -->
  <div style="text-align:center;margin-top:40px;">
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>    <span class="step"></span>


  </div>
</form>
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
filterSelection("genero")
function filterSelection(c) {
  var x, i;
  x = document.getElementsByClassName("filterDivArticulos");
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
var btnContainer = document.getElementById("navArticulos");
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
