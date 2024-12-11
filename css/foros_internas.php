<!doctype html>
<html lang="es" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Universidad Iberoamericana, Observatorio de Juventud y Género, Diseño Interactivo">
    <meta name="description" content="Página del Observatorio de Género y Juventud dónde puedes participar y contribuir a las conversaciones del foro sobre violencia de género y temas relacionados">
    <meta name="keywords" content="foro, conversación, discusión, contribuir, aportar, OGJ, Observatorio de Género y Juventud, Iberoamericana, Universidad">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>FOROS INTERNAS</title>
    <link rel="shortcut icon" href="images/icono-pesta%C3%B1a.jpg" />
      <link href="css/estilo_preguntas_glosario_FORO.css" rel="stylesheet">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap1.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <style> .topnav{position: relative; left: 90px;}
    .topnav a { line-height: 10px; letter-spacing: 2px;
        margin-top: 10px; border-left: 1px white solid;}   
        .topnav a:nth-child(2){ margin-left: 50px;}
    </style>
</head>

    
    <body>
<header>
    <nav>
      <h2 style="display:none;">Navegación del OGJ</h2>
      <div class="nav_foros">
        <div class="topnav" id="myTopnav"> 
        <img  id="logo-NAV" src="images/logo_NAV.png"> 
            <a href="index.html#inicio"  class="active">INICIO</a>
            <a href="index.html#acerca">ACERCA</a>
            <a href="index.html#contacto">CONTACTO</a>
            <a href="index.html#aprender">APRENDER</a>
            <a href="index.html#contribuir">CONTRIBUIR</a>
            <a href="index.html#ayudar">AYUDAR</a>  
            <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
            </div>
        </div>
      </nav>
</header>
        
<div id="foros_internas" >
  <h1 style="display: none;">DISCUSIÓN</h1>      
  
    <div >
    <a id="regresar" href="foros.html">REGRESAR A FOROS</a>

    <section id="discusion">
    <h3>VIOLENCIA LABORAL</h3>
    <div id="contenido">
    <h4>MENOS OPORTUNIDADES PARA LAS MUJERES</h4>
    <p>propuesta por OGJ o USUARIO</p>
    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto.</p>
    </div>
     </section>
<div>

        
        </div>     

         <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" id="responder">Responder</button></div>
 
 
    <div id="asides_foros_internas">
    <aside id="relacionadas">
    <h3>CONVERSACIONES RELACIONADAS</h3>
    <div id="lista-conver-relacionadas">
    <ul>
    <li><a href="#">NUEVO POST</a></li>
    <li><a href="#">NUEVO POST</a></li>
    <li><a href="#">NUEVO POST</a></li>
    <li><a href="#">NUEVO POST</a></li>
    </ul>
    </div>
    </aside>
    
    
    <aside id="interesarte">
    <h3>PODRÍA INTERESARTE</h3>
        <div id="lista-podria-interesarte">
    <ul>
    <li><a href="#">NUEVO POST</a></li>
    <li><a href="#">NUEVO POST</a></li>
    <li><a href="#">NUEVO POST</a></li>
    <li><a href="#">NUEVO POST</a></li>
    </ul>
    </div>
    </aside>
    </div>
        </div>
        
        
          <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
         <?php
// define variables and set to empty values
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = test_input($_POST["name"]);
  $email = test_input($_POST["email"]);
  $website = test_input($_POST["website"]);
  $comment = test_input($_POST["comment"]);
  $gender = test_input($_POST["gender"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>¡Gracias por contribuir!</h2>
<form style="background-color:white;" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Nombre: <input type="text" name="creador">
  <br><br>
  Edad: <input type="text" name="edad">
  <br><br>
  Estado: <input type="text" name="estado">
  <br><br>
  Comentario: <textarea name="comentario" rows="5" cols="40"></textarea>
  <br><br>
  Género:<input placeholder="género..." oninput="this.className = ''" name="genero">
  <br><br>
  <input type="submit" name="enviar" value="Submit">
</form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
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
    document.getElementById("nextBtn").innerHTML = "ACEPTAR";
  } else {
    document.getElementById("nextBtn").innerHTML = "Siguiente" + "<span class='glyphicon glyphicon-menu-right'></span>";
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
    document.getElementById("regForm2").submit();
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