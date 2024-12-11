

<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Con esta función se puede utilizar $_SESSION
session_start();

include "conexion.php";

$autenticado = true;

if(isset($_POST['logout'])) {
    
    unset($_SESSION['usuario']);
    session_destroy();
}

if( isset( $_POST['usuario'] ) && isset( $_POST['pwd'] ) ) {
      $usuario = $_POST['usuario'];
      $pwd = $_POST['pwd'];
      
      $q = "select * from equipo01_admin where usuario = '$usuario' and pwd = password('$pwd')";
      
      // rs viene de Record Set.
      $rs = ejecutar($q);
      if( $r = mysqli_fetch_array($rs) ) {
        $autenticado = true;
        $_SESSION['usuario'] = $usuario;
        $_SESSION['pwd'] = $pwd;  
        echo "Usuario autenticado correctamente!";
        header("Location: bak_inicio.php");
      } else {
        $autenticado = false;
        unset($_SESSION['usuario']);
        //echo "Verifica tu usuario y contraseña";
      }
}
?>
<!Doctype html>
<!--Doctype para indicar el tipo de documento-->
<html lang="es-mx" dir="ltr">
<!--HTML con idioma español mexicano y dirección de izquierda a derecha-->
<!--Inserción de metas charset, author, description, keywords, viewport, y los scripts decompatibilidad--> 
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="author" content="Mauricio Castro, Loris Karam, Alejandro López Navarrete,  Montserrat Suaste">
        <meta name="description" content="El Observatorio de Género y Juventud es un espacio autónomo, plural, transdiciplinario, con capacidad investigativa y de análisis crítico, que genera información clara y precisa, sobre las prácticas y percepción en torno a la igualdad, equidad y violencia de género en la población juvenil, así como sobre las causas, la naturaleza e impacto de la violencia de género en la pareja, a edades tempranas. Busca sensibilizar y concienciar a la comunidad en general sobre este fenómeno social mediante el análisis de información generada y el desarrollo nuevas propuestas que permitan hacer propuestas de políticas públicas y potenciar las acciones de prevención y eliminación de la violencia.">
        <meta name="keywords" content="Violencia de género, Violencia de parejas, juventud, Observatorio De Género Y Juventud, agresión, violencia, relación, prevención, igualdad,">
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <link href="css/estilos_backend.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.css" />
        <link href="webfontkit-20180405-195230/stylesheet.css" rel="stylesheet">
        <link rel="icon" href="Images/favicon_color.png">
        <title>Observatorio De Género Y Juventud</title>
</head>
    
     <style>
        #login{
            background: url(images/TEXTURA.jpg) top center / 200% no-repeat;
            }
        
        #login h1 {
            width: 51%;
            text-align: center;
            color: white;
            font-family: 'sequel';
            font-size: 1.6rem;
            margin: auto;
            margin-top: 6.4%;
            margin-bottom: 3%;
            padding-bottom: 1%;
            text-align: center;
            line-height: 35px;
            box-sizing: border-box;
            border-bottom: solid 1px white;
            }
        
              #login form{
            background-color: white;
            width: 65%;
            margin: auto;
            margin-bottom: 20%;
            padding: 4%;
        }
            
               #login form>div{
            font-size: 1rem;
            border: solid 1px grey;
            padding: 5%;
        }
        
         #login form #logo_login{
            height: 79px;
            background: url(images/Asset11.png) center top / 12% no-repeat;
            text-indent: -9999px;
            margin-bottom: 4%;
        }
        
          #login #usuario, #login #pswd{
            width: 75%;
            margin: auto;
            font-family: 'sequel';
            text-align: right;
            margin-bottom: 3%;
            display: grid;
            grid-template-columns: 40% 50%;
            grid-template-areas: "etiqueta campo";
            border: none;
        }
        
            #login #login_usuario, #login #login_pswd{
            grid-area: etiqueta;
            margin-right: 13%;
        }
        
         #login input{
            grid-area: campo;
            border: solid 1px grey;
            font-family: 'Barlow Semi Condensed';
        }
        
             #login #ingresar{
            color: white;
            padding: 1.3% 7%;
            margin: auto;
            margin-top: 7%;
            /* align-self: center; */
            /* margin: auto; */
            background-color: #7bb295;
            opacity: 0.67;
            font-family: 'sequel';
            text-align: center;
            display: inherit;
        }
        
         @media(min-width:1920px){
        #login h1{
            width: 57%;
            text-align: center;
            color: white;
            font-family: 'sequel';
            font-size: 3.5rem;
            margin: auto;
            margin-top: 15%;
            margin-bottom: 5%;
            padding-bottom: 2%;
            text-align: center;
            line-height: 35px;
            box-sizing: border-box;
            border-bottom: solid 4px white;
        }
        
        #login form{
            background-color: white;
            width: 95%;
            margin: auto;
            margin-bottom: 20%;
            padding: 4%;
        }
    
        #login form>div{
            font-size: 1.8rem;
            border: solid 1px grey;
            padding: 5%;
        }
        
        #login form #logo_login{
            height: 110px;
            background: url(images/Asset11.png) center top / 13% no-repeat;
            text-indent: -9999px;
            margin-bottom: 6%;
        }
    
        
        #login #usuario, #login #pswd{
            width: 79%;
            margin: auto;
            font-family: 'sequel';
            text-align: right;
            margin-bottom: 3%;
            display: grid;
            grid-template-columns: 40% 50%;
            grid-template-areas: "etiqueta campo";
            border: none;
        }
        
        #login #login_usuario, #login #login_pswd{
            grid-area: etiqueta;
            margin-right: 13%;
        }
        
        #login input{
            grid-area: campo;
            border: solid 1px grey;
            font-family: 'Barlow Semi Condensed';
        }
        
        #login #ingresar{
            color: white;
            padding: 1.3% 7%;
            margin: auto;
            margin-top: 7%;
            /* align-self: center; */
            /* margin: auto; */
            background-color: #7bb295;
            opacity: 0.67;
            font-family: 'sequel';
            font-size: 1.8rem;
            text-align: center;
            display: inherit;
        }
            }
    </style>
    
        
<body id="login">
    <h1 id="inicio">INICIO DE SESIÓN PARA ADMINISTRADOR</h1>
  <div class="container">
            <div class="container">
       <form action="login.php" method="post">
              <label>Usuario: </label>
            <p>
              <input name="usuario" type="text" placeholder="Usuario" required>
            </p>
              <label>Contraseña: </label>
            <p>
              <input name="pwd" type="password" placeholder="Contraseña" required>
            </p>
              
            <button type="submit">Ingresar</button>
              
        </form>
          
          <?php
if( !$autenticado )
{
?>
        <div class="alert alert-danger alert-dismissable">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          Verifica usuario y password.
        </div>
<?php
}
?>
</body>

  