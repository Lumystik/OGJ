<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Con esta función se puede utilizar $_SESSION
session_start();

if( !isset( $_SESSION['user'] ) ) {
  header('HTTP/1.0 401 Pagina no autorizada');
  exit();
}

include "conexion.php";

$q = "select * from equipo01_admin";
$rs = ejecutar($q);
// r viene de row, registro, renglon.
while($r = mysqli_fetch_array($rs) ) {
  $usuario  = $r['usuario'];
  $avatar  = $r['avatar'];
}


?>
<!DOCTYPE HTML>
<html>
   <head>
      <title>Administrador de Contenidos - OGJ</title>
      <meta charset="utf-8" />
      <meta name="author" content="Equipo 2">
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <link rel="stylesheet" href="cms.css">
      
      <link rel="shortcut icon" href="assets/css/images/ogj.ico" type="image/x-icon">
      <link rel="icon" href="assets/css/images/ogj.ico" type="image/x-icon">
	   
   </head>
   <body>
	   <header>
		   <div class="sidenav">
		   <figure class="logo"><img src="images/Logo.svg" alt="logo del observatorio de Género y Juventud"> </figure>
		   <ul>
			   <span></span>
			   <li><a href="admin.html" style="text-decoration: underline; text-decoration-color: #6DC6AF">Usuario</a></li>
			   <span></span>
			   <li><a href="admn-articulos.html">Aprende más</a></li>
			   <span></span>
			   <li><a href="admn-evento.html">Eventos</a></li>
			   <span></span>
			   <li><a href="admn-test.html">Test</a></li>
			   <span></span>
			   <li><a href="admn-foros.html">Foros</a></li>
			   <span></span>
			   <li><a href="admn-a_quien_acudir.html">A quien acudir</a></li>
		   </ul>
	   </div>
	   </header>
	   <div id="home">
			<div id="main">
		   <section id="banner">
		   		<span></span>
			   	<span></span>
			   	<span></span>
			   	<span></span>
			   	<span></span>
			   	<span></span>
			   	<span></span>
			   </section>
		   <div id="side">
			<h2>BIENVENIDO</h2>
			<p><?php echo $usuario; ?></p>
			<figure>
				<img src="<?php echo $avatar; ?>" alt="Imagen del Usuario">
			</figure>
		   </div>
		   <section id="content">
		   <p>Texto de Bienvenida Texto de Bienvenida Texto de Bienvenida Texto de Bienvenida Texto de Bienvenida Texto de Bienvenida Texto de Bienvenida Texto de Bienvenida Texto de Bienvenida Texto de Bienvenida Texto de Bienvenida Texto de Bienvenida Texto de Bienvenida Texto de Bienvenida Texto de Bienvenida Texto de Bienvenida </p>
		   <button><a href="manual.pdf">Descarga el manual de uso</a></button>
		   </section>
		   </div>
	   </div>
   </body>
</html>




