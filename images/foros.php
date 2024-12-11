  <?php
include 'conexion.php';
?>
    
<!doctype html>
<html lang="es" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Universidad Iberoamericana, Observatorio de Juventud y Género, Diseño Interactivo">
    <meta name="description" content="Página del Observatorio de Género y Juventud dónde puedes participar y contribuir a las conversaciones del foro sobre violencia de género y temas relacionados">
    <meta name="keywords" content="foro, conversación, discusión, contribuir, aportar, OGJ, Observatorio de Género y Juventud, Iberoamericana, Universidad">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>FOROS</title>
   <link rel="shortcut icon" href="images/asset11.png" />
      <link href="css/bootstrap1.css" rel="stylesheet">
     <link href="css/estilos.css" rel="stylesheet">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
<style> header{ width: 0%; height: 0px; background:  url(images/logo_h1.png) 0%/0% no-repeat;}
    .topnav{left: 0px !important;}
    .topnav a { height: 30px;
        line-height: 39px; }
    footer{height: 800px;}
    body > footer > div.row{height: 391px;}
    body > footer > div.row > div{padding-top: 20px;}
    body > footer > div:nth-child(3){padding: 20px;}
    #myTopnav > a{line-height: 20px;}
    body > footer{max-width: 1920px;}
    body > footer > div.row{margin: 0 auto;}
    body > footer > div.row > div:nth-child(1) {
    border: 2px solid #f2526e;    height: 356px;
}
   body > footer > div.row > div:nth-child(2) {
    border: 2px solid #F857A8;    height: 356px;
}
    body > footer > div.row > div:nth-child(3) {
    border: 2px solid #f2526e;     height: 356px;
}
     #footerh2{margin-top: 30px;}
    #lista_temas{text-align: left;}
nav {
    width: 100%;
    height: 61px;
    margin-left: 0px;
    margin-top: -20px;
}
        .topnav{height: 61px;}
   
    .modal-header .close {
    padding: 1rem;
    margin: -1rem 1rem -2rem auto !important;
}
    
    
    </style>
</head>

    
    <body>
<header id="arriba">
    <nav >
      <h2 style="display:none;">Navegación del OGJ</h2>
      <div class="topnav" id="myTopnav"> 
        <img  id="logo-NAV" src="images/logo_NAV.png"> 
            
          <a href="#acerca"  class="active">INICIO </a>
            <a href="#inicio1">ACERCA</a>
            <a href="#contacto" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal2" style=";border:none;" >CONTACTO</a>
            
          <a  href="#aprender"> APRENDER</a>
        
            <a href="#contribuir" >CONTRIBUIR</a>
            <a href="#ayudar">PARTICIPAR</a>  
             <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
        </div>
      </nav>
        <style> .topnav{position: relative; left: 90px;}
    .topnav a { line-height: 10px; letter-spacing: 2px;
        margin-top: 15px; border-left: 1px white solid;}   
        .topnav a:nth-child(2){ margin-left: 50px;}
    </style>
</header>
        
        
<div id="foros">
      <h1 style="display: none">Foros</h1>  
      <h2>Foros</h2>
      <div id="ver_reglas" class="btn btn-default" data-toggle="modal" data-target="#ver-reglas-modal">VER LAS REGLAS DEL FORO</div>
                   <!-- Modal VIOLENCIA DOCENTE-->
      <div class="modal fade" id="ver-reglas-modal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">REGLAS DEL FORO</h4>
        </div>
        <div class="modal-body">
          <p>El Observatorio de Género y Juventud  ha creado el Foro como un espacio e interacción 
amigable y contribución a las discuciones referentes a violencia de género, como una 
herramienta de investigación y concientización sobre el tema.</p>
<br/>
<p>Te pedimos que las contribuciones que hagas aquí sean con el propósito de ayudar a prevenir, 
eliminar y concientizar sobre la violencia de género, con respeto y empatía hacía los otros
usuarios participantes. </p>
         <br />
        </div>
        <div class="modal-footer">
             <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div> 

        <div id="proponer_conversacion" class="btn btn-info btn-lg" data-toggle="modal" data-target="#proponer">PROPONER CONVERSACIÓN</div>
        
  <div class="modal fade" id="proponer" role="dialog">
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">GRACIAS POR QUERER CONTRIBUIR</h4>
      </div>
      <div class="modal-body">
  <form  id="regForm3" action="/action_page.php" style="background-color:white;">
  <div class="tab">
  <p>El Observatorio de Género y Juventud  ha creado el Foro como un espacio e interacción 
amigable y contribución a las discuciones referentes a violencia de género, como una 
herramienta de investigación y concientización sobre el tema.</p>
<br/>
<p>Te pedimos que las contribuciones que hagas aquí sean con el propósito de ayudar a prevenir, 
eliminar y concientizar sobre la violencia de género, con respeto y empatía hacía los otros
usuarios participantes. </p>
</div>
  <div class="tab">
  <p>Para poder contribuir aL FORO sólo te pedimos los siguientes datos:</p>
  <p class="advertencia">- Se mantendran privados y no se mostraran de ninguna manera<br/>
- Tu nombre de usuario es sólo para mostrarlo junto con tu respuesta, no tiene que ser tu nombre o nada relacionado contigo.</p>
  NOMBRE DE USUARIO:
    <p><input placeholder="nombre..." oninput="this.className = ''" name="nombre"></p>
    GÉNERO:
    <p><input placeholder="género..." oninput="this.className = ''" name="genero"></p>
    EDAD:
    <p><input placeholder="edad..." oninput="this.className = ''" name="edad"></p>
    ESTADO:
    <p><input placeholder="estado..." oninput="this.className = ''" name="estado"></p>
    E-MAIL:
    <p><input placeholder="E-mail..." oninput="this.className = ''" name="email"></p>
  </div>
   <div class="tab">
   <p>Para poder contribuir con una conversación te pedimos los siguientes datos:</p>
   TITULO DE LA CONVERSACIÓN
   <p><input placeholder="Escribir..." oninput="this.className = ''" name="titulo_conver"></p>
   PEQUEÑA EXPLICACIÓN SOBRE LA CONVERSACIÓN
<textarea class="explicacion" placeholder="Escribir..." oninput="this.className = ''" name="explicacion"> </textarea>
   </div>
  <div class="botones" style="overflow:auto;">
    <div>
      <button type="button" id="prevBtn" onclick="nextPrev(-1)">ATRÁS</button>
      <button type="button" id="nextBtn" onclick="nextPrev(1)">SIGUIENTE</button>
    
    </div>
  </div>

  <div style="text-align:center;margin-top:40px;">
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
  </div>
          
</form>
      </div>
      <div class="modal-footer">
          <button class="publicar">PUBLICAR</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
      </div>
    </div>


         </div>
    </div>

    
    <section id="creados_por_OGJ">
    <h3>CREADOS POR EL OGJ</h3>
    <div id="lista_temas">
        
    <div class="panel-group">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapse1">VIOLECIA PSICOLÓGICA</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse"> 
        <ul class="list-group">
          <li class="list-group-item">uno<a href="foros_internas.php">participar</a></li>
          <li class="list-group-item">dos<a href="foros_internas.php">participar</a></li>
          <li class="list-group-item">tres<a href="foros_internas.php">participar</a></li>
        </ul>
      </div>
    </div>
  </div>
        
        
    <div class="panel-group">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapse2">VIOLENCIA DE PAREJA</a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
        <ul class="list-group">
          <li class="list-group-item">One <a href="foros_internas.html">participar</a></li>
          <li class="list-group-item">Two <a href="foros_internas.html">participar</a></li>
          <li class="list-group-item">Three <a href="foros_internas.html">participar</a></li>
        </ul>
      </div>
    </div>
  </div>
        <div class="panel-group">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapse3">VIOLENCIA LABORAL</a>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse">
        <ul class="list-group">
          <li class="list-group-item">Menos oportunidades para las mujeres<a href="foros_internas.html">participar</a></li>
          <li class="list-group-item">Two <a href="#">participar</a></li>
          <li class="list-group-item">Three <a href="#">participar</a></li>
        </ul>
      </div>
    </div>
  </div>
        
 <div class="panel-group">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapse3">VIOLENCIA ECONÓMICA</a>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse">
        <ul class="list-group">
          <li class="list-group-item">One <a href="#">participar</a></li>
          <li class="list-group-item">Two <a href="#">participar</a></li>
          <li class="list-group-item">Three <a href="#">participar</a></li>
        </ul>
      </div>
    </div>
  </div>
        
    </div>
    </section>
    
    
    <section id="creados_por_usuarios">
    <h3>CREADOS POR USUARIOS</h3>
    <div id="lista_temas">
    
            
    <div class="panel-group">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapse5">TEMA UNO</a>
        </h4>
      </div>
      <div id="collapse5" class="panel-collapse collapse">
        <ul class="list-group">
          <li class="list-group-item">One <a href="#">participar</a></li>
          <li class="list-group-item">Two <a href="#">participar</a></li>
          <li class="list-group-item">Three <a href="#">participar</a></li>
        </ul>
      </div>
    </div>
  </div>
        
            
    <div class="panel-group">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapse6">TEMA UNO</a>
        </h4>
      </div>
      <div id="collapse6" class="panel-collapse collapse">
        <ul class="list-group">
          <li class="list-group-item">One <a href="#">participar</a></li>
          <li class="list-group-item">Two <a href="#">participar</a></li>
          <li class="list-group-item">Three <a href="#">participar</a></li>
        </ul>
      </div>
    </div>
  </div>
        
            
    <div class="panel-group">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapse7">TEMA UNO</a>
        </h4>
      </div>
      <div id="collapse7" class="panel-collapse collapse">
        <ul class="list-group">
          <li class="list-group-item">One <a href="#">participar</a></li>
          <li class="list-group-item">Two <a href="#">participar</a></li>
          <li class="list-group-item">Three <a href="#">participar</a></li>
        </ul>
      </div>
    </div>
  </div>
    
        <div class="panel-group">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapse3">VIOLENCIA ECONÓMICA</a>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse">
        <ul class="list-group">
          <li class="list-group-item">One <a href="#">participar</a></li>
          <li class="list-group-item">Two <a href="#">participar</a></li>
          <li class="list-group-item">Three <a href="#">participar</a></li>
        </ul>
      </div>
    </div>
  </div>
        
    </div>
    </section>
    
    <aside id="nuevos_post">
    <h3>NUEVOS POSTS</h3>
    <div id="lista-nuevos-post">
    <ul>
    <li><a href="#">NUEVO POST</a></li>
    <li><a href="#">NUEVO POST</a></li>
    <li><a href="#">NUEVO POST</a></li>
    <li><a href="#">NUEVO POST</a></li>
    </ul>
    </div>
    </aside>
</div>
        
<footer>
<style>
    
body > div > footer > div.row > div:nth-child(1) > h3 > span{ width: 100%;height: 60px; background: url(images/logos_aprender_contribuir_dar_recibir.png)-70%/360px no-repeat; display: inline-block;}
body > div:nth-child(1) > footer > div.row > div:nth-child(2) > h3 > span{width: 100%; height: 60px; background: url(images/logos_aprender_contribuir_dar_recibir.png) 44%/360px no-repeat;display: inline-block;}
body > div:nth-child(1) > footer > div.row > div:nth-child(3) > h3 > span{width: 100%; height: 60px; background: url(images/logos_aprender_contribuir_dar_recibir.png) 163%/360px no-repeat;display: inline-block;}
    
 footer{ margin: 0 auto; background: url(images/header_texture.png) 100% no-repeat;}
footer > div{background-color: black}
#footerh2>h2{font-family: 'Barlow Semi Condensed';}
#myTopnav > a.btn.btn-info.btn-lg{height: 28px;line-height: 20px;}
#regresar{margin-top: 50px;}
#regresar > span{ width: 400px; height: 79px; background: url(images/logo_NAV.png) 50%/50% no-repeat; text-indent: -9999px; display: inline-block;    position: relative;
    top: 20px;    right: 30%;}
    footer{text-align: center; color: white !important;}
body > div > footer > div.row{margin: 0 auto;}
 body > div:nth-child(1) > footer > div.row > div:nth-child(1){ border: 2px solid #F857A8;}
body > div:nth-child(1) > footer > div.row > div:nth-child(2){ border: 2px solid #f2526e;}
body > div:nth-child(1) > footer > div.row > div:nth-child(3){border: 2px solid #f2526e;}
#regresar > p { width: 190px;  height: 50px; margin: 0 auto; background-color:  rgba(92, 34, 58, 0.87); line-height: 50px;    position: relative;   left: 30%;
    top: -43px;
    }
    a{color: white !important;}
#regresar{ background-color:  rgba(0, 0, 0, 0);}
#regresar > p > span{width: 10%; text-indent: -9999px; display: inline-block; background: url(images/arrow_up.png) 100%/100% no-repeat;}
body > div > footer > div.row > div:nth-child(1) > h3 > span{ width: 100%;height: 60px; background: url(images/logos_aprender_contribuir_dar_recibir.png)-70%/360px no-repeat; display: inline-block;}
body > div:nth-child(1) > footer > div.row > div:nth-child(2) > h3 > span{width: 100%; height: 60px; background: url(images/logos_aprender_contribuir_dar_recibir.png) 44%/360px no-repeat;display: inline-block;}
body > div:nth-child(1) > footer > div.row > div:nth-child(3) > h3 > span{width: 100%; height: 60px; background: url(images/logos_aprender_contribuir_dar_recibir.png) 163%/360px no-repeat;display: inline-block;}
    body > div:nth-child(1) > footer > div.row > div > p > a{color: white;}
body > div:nth-child(1) > footer > div.row > div > h3{font-size: 1.5em}
  #footerh2{  margin: 0 auto;font-size: 0.8em;}
body > div:nth-child(1) > footer > div.row > div:nth-child(1) {
    width: 255px; margin-top: 20px; margin-bottom: 17px;
}
 body > div:nth-child(1) > footer > div.row > div:nth-child(2) {
    width: 255px;margin-bottom: 17px;
} 
  body > div:nth-child(1) > footer > div.row > div:nth-child(3) {
    width: 255px;margin-bottom: 17px;
}
  #aprender h3 { margin-top: 0px;}
  #regresar > p{margin-bottom: 20px;}
    
  #footerh2{  margin: 0 auto;font-size: 0.8em;}
body > div:nth-child(1) > footer > div.row > div:nth-child(1) {
    width: 255px; margin-top: 20px; margin-bottom: 17px;
}
 body > div:nth-child(1) > footer > div.row > div:nth-child(2) {
    width: 255px;margin-bottom: 17px;
} 
  body > div:nth-child(1) > footer > div.row > div:nth-child(3) {
    width: 255px;margin-bottom: 17px;
}
  #aprender h3 { margin-top: 0px;}
  #regresar > p{margin-bottom: 20px;}
    
    @media screen and (min-width:1080px){ 
    body > div > footer > div.row > div:nth-child(1) > h3 > span { margin-top: 20px;
background:url(../images/logos_aprender_contribuir_dar_recibir.png) -45%/196% no-repeat}
body > div:nth-child(1) > footer > div.row > div:nth-child(2) > h3 > span{margin-top: 20px;
background:url(../images/logos_aprender_contribuir_dar_recibir.png) 45%/196% no-repeat} 
body > div:nth-child(1) > footer > div.row > div:nth-child(3) > h3 > span{margin-top: 20px;
background:url(../images/logos_aprender_contribuir_dar_recibir.png) 140%/196% no-repeat}
        @media screen and (min-width:1280px) and (min-width:1580px){
     body > div > footer > div.row > div:nth-child(1) > h3 > span { height: 100px;
background:url(../images/logos_aprender_contribuir_dar_recibir.png)145px/760px no-repeat}
body > div:nth-child(1) > footer > div.row > div:nth-child(2) > h3 > span{ margin-top: 20px; margin-bottom: 10px; height: 80px;
background:url(../images/logos_aprender_contribuir_dar_recibir.png) -190px/760px no-repeat} 
body > div:nth-child(1) > footer > div.row > div:nth-child(3) > h3 > span{margin-top: 20px; margin-bottom: 10px; 
background:url(../images/logos_aprender_contribuir_dar_recibir.png) -553px/760px no-repeat} 
  #actividades > div > div:nth-child(2) > h3, #actividades > div > div:nth-child(1) > h3{margin-top: 60px;}
#actividades > div > div:nth-child(1) > div> p{margin-left: 30px;}

    #arriba > div.row > div:nth-child(3) > p> a{font-size: 1em;}        
    @media (min-width: 576px){
footer .col-sm-4 {
    max-width: 28.333333% !important;
}
    header .col-sm-4 {
    max-width: 32.333333% !important;
}
}        
            
    }
    
    </style>
  
  <div id="regresar" ><span>h</span> <p> <span>d </span><a href="#arriba">REGRESAR ARRIBA</a></p></div>  
    <div><div class="row" id="footerh2"><h2 class="col-sm-4"><a href="aviso.html">AVISO DE PRIVACIDAD</a></h2><h2 class="col-sm-4">MAPA DEL SITIO</h2><h2 class="col-sm-4">CONTACTO</h2></div></div>

    <div class="row">
        <div class="col-sm-4" style="margin: 0 auto;"> <h3> <span></span>APRENDER</h3><p  ><a href="glosario.html">Glosario</a></p><p><a href="preguntas.html">Preguntas frecuentes</a></p><p><a href="mapa_estadistico.html">Mapa de datos estadísticos</a></p><p><a href="articulos.html">Artículos informativos</a></p><p><a href="#">Testimonios</a></p><p ><a href="tests"> Tests</a></p><p><a href="">Eventos</a></p></div>
    <div class="col-sm-4" style="margin: 0 auto;"> <h3> <span></span>CONTRIBUIR</h3><p><a href="foros.html">Foro de Discusión</a></p><p><a href="cuestionario.html">Cuestionarios de investigación</a></p></div>
    <div class="col-sm-4" style="margin: 0 auto;"> <h3> <span></span>AYUDAR</h3><p><a href="mexico_mapa.html">Mapa de Centros de Ayuda</a></p><p><a href="mexico_mapa.html">Recursos a Distancia</a></p><p><a>Compartir testimonio</a></p></div>  
  </div>
   
    </footer>             
        
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
        