<?php
//Include las clases
require_once 'class/categorias.php';
require_once 'class/foros.php';
require_once 'class/subforos.php';
require_once 'class/temas.php';
require_once 'class/usuarios.php';
require_once 'class/comentarios.php';

include 'header.php';

$objP = new Temas();
$tema = $objP->tema($_GET["id"]);

// Agrega las visitas al tema
$objhit = new Temas();
$objhit->hits($_GET["id"]);
// Fin del agregador a las visitas

if (isset($_GET['sub'])) {
    $objF = new Foros();
    $titulo = $objF->foroporid($_GET['foro']);


    $objSF = new Subforos();
    $stitulo = $objSF->subforoporid($_GET['sub']);
    ?>
    <h2>Foro: <?php echo $titulo[0]["foro"]; ?> / SubForo: <?php echo $stitulo[0]["subforo"]; ?></h2>

    <h4>
        <a href="<?php echo Conexion::ruta(); ?>">Foros</a> &rarr;
        <a href="<?php echo Conexion::ruta(); ?>#<?php echo $titulo[0]["categoria"]; ?>"><?php echo $titulo[0]["categoria"]; ?></a> &rarr;
        <a href="<?php echo Conexion::ruta(); ?>temas.php?foro=<?php echo $titulo[0]["id_foro"]; ?>"><?php echo $titulo[0]["foro"]; ?></a> &rarr;
        <a href="<?php echo Conexion::ruta(); ?>temas.php?foro=<?php echo $titulo[0]["id_foro"]; ?>&sub=<?php echo $_GET['sub']; ?> "><?php echo $stitulo[0]["subforo"]; ?></a> &rarr;
        <?php echo $tema[0]["titulo"]; ?>
    </h4>

    <?php
} else {
    $objF = new Foros();
    $titulo = $objF->foroporid($_GET['foro']);
    ?>
    <h2>Foro: <?php echo $titulo[0]["foro"]; ?></h2>
    <h4>
        <a href="<?php echo Conexion::ruta(); ?>">Foros</a> &rarr;
        <a href="<?php echo Conexion::ruta(); ?>#<?php echo $titulo[0]["categoria"]; ?>"><?php echo $titulo[0]["categoria"]; ?></a> &rarr;
        <a href="<?php echo Conexion::ruta(); ?>temas.php?foro=<?php echo $titulo[0]["id_foro"]; ?>">
            <?php echo $titulo[0]["foro"]; ?></a> &rarr; <?php echo $tema[0]["titulo"]; ?>
    </h4>

    <?php
}
?>

<div class="caja">
    <div class="categorias">
        Tema: <?php echo $tema[0]["titulo"]; ?>
    </div>

    <div class="temausuario">
        <div class="avatar">
            <img src="upload/<?php echo $tema[0]["avatar"]; ?>" width="70px" />
        </div>
        <div class="usuario">
            <a href="perfil.php?id=<?php echo $tema[0]["id_usuario"]; ?>"><?php echo $tema[0]["nick"]; ?></a>
        </div>
        <div class="datos">
            Fecha ingreso: <?php echo $tema[0]["fechaderegistro"]; ?><br/>
        </div>
        <div style="clear:both; height:1px;font-size:0px; line-height: 0px;"></div>
    </div>

    <div class="foro">   
        <div class="tema">
            <?php echo $tema[0]["contenido"]; ?>
        </div>

    </div>

    <div class="firma">
        <?php echo $tema[0]["firma"]; ?>
    </div>
</div>

<h2>Comentarios</h2>

<?php
$objcom = new Comentarios();
$resultado = $objcom->comentarios($_GET["id"]);
foreach ($resultado as $temas) {
    ?>
    <div class="caja">
        <div class="categorias">
            Comentario: <?php echo $temas["id_comentario"]; ?>  / Fecha: <?php echo $temas["fecha"]; ?>  
            <?php
            // validamos primero si es el admin puede eliminar lo que sea
            // validados si el comentario fue creado por el usuario logueado activa la opcion de eliminar
            if(isset($_SESSION["nombre"])){
            if ($_SESSION["nombre"] == "admin" or $temas["id_usuario"] == $_SESSION["id"]) {
                if (isset($_GET["sub"])) {
                    ?>
                    | <a class="btn btn-link" href="eliminar.php?opc=5&id=<?php echo $temas["id_comentario"]; ?>&tema=<?php echo $_GET["id"]; ?>&foro=<?php echo $_GET["foro"]; ?>&sub=<?php echo $_GET["sub"]; ?>">
                        x Eliminar Tema</a>
                    <?php
                } else {
                    ?>
                    | <a class="btn btn-link" href="eliminar.php?opc=5&id=<?php echo $temas["id_comentario"]; ?>&tema=<?php echo $_GET["id"]; ?>&foro=<?php echo $_GET["foro"]; ?>&sub=0">
                        x Eliminar Tema</a>
                    <?php
                }
            }
        }
            ?>
        </div>

        <div class="temausuario">
            <div class="avatar">
                <img src="upload/<?php echo $temas["avatar"]; ?>" width="70px" />
            </div>
            <div class="usuario">
                <a href="perfil.php?id=<?php echo $temas["id_usuario"]; ?>"><?php echo $temas["nick"]; ?></a>
            </div>
            <div class="datos">
                Fecha ingreso: <?php echo $temas["fechaderegistro"]; ?><br/>
            </div>
            <div style="clear:both; height:1px;font-size:0px; line-height: 0px;"></div>
        </div>

        <div class="foro">   
            <div class="tema">
                <?php echo $temas["comentario"]; ?>
            </div>
        </div>

        <div class="firma">
            <?php echo $temas["firma"]; ?>
        </div>
    </div>
    <?php
}
?>


<!-- editor -->
<script language="javascript" type="text/javascript" src="librerias/tiny_mce/tiny_mce.js"></script>

<script language="javascript" type="text/javascript">
    tinyMCE.init({
        relative_urls: false,
        convert_urls: false,
        mode: "textareas",
        plugins: "phpimage",
        theme: "advanced",
        theme_advanced_toolbar_location: "top",
        theme_advanced_toolbar_align: "left",
        theme_advanced_statusbar_location: "bottom",
        theme_advanced_resizing: true,
        theme_advanced_resize_horizontal: false,
        theme_advanced_buttons1: "bold,italic,strikethrough,separator,formatselect,separator,bullist,numlist,outdent,indent,separator,justifyleft,justifycenter,justifyright,justifyfull,separator,link,unlink,phpimage,separator,code",
        theme_advanced_buttons2: "",
        theme_advanced_buttons3: "",
        content_css: "tiny_mce/estilo_editor.css",
    });
</script>

<div class="caja">
    <div class="categorias">
        Agregar Comentario
    </div>

    <?php
    // REGISTRAMOS EL COMENTARIO
    if (isset($_POST['guardar'])) {
        $com = new Comentarios();

        if (isset($_GET["sub"])) {
            $sub = $_GET["sub"];
        } else {
            $sub = 0;
        }

        $com->add($_GET["id"], $_GET["foro"], $sub);
    }
	
	if (isset($_SESSION["nombre"])) {
	?>
	<div class="foro">   
        <div class="tema">
            <form action="" method="post">
                <textarea name="comentario" class="tex"></textarea>
                <button type="submit" name="guardar"  class="btn btn-default">COMENTAR</button>
            </form>
        </div>
    </div>
	<?php
	}else{
	?>
		<p>Para comentar necesita  <a href="entrar.php"> -- iniciar sesión -- </a></p>
	<?php
	}
    ?>
    
</div>
<?php
include 'footer.php';