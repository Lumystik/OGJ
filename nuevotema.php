<?php
//Include las clases
require_once 'class/categorias.php';
require_once 'class/foros.php';
require_once 'class/subforos.php';
require_once 'class/temas.php';
require_once 'class/usuarios.php';
require_once 'class/comentarios.php';

include 'header.php';
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
        Agregar Tema
    </div>
    
    <?php
    // REGISTRAMOS EL COMENTARIO
    if (isset($_POST['guardar'])) {
        $tema = new Temas();
        $tema->add($_GET["foro"], $_GET["sub"]);
    }
    ?>
    <div class="foro">   
        <div class="tema">
            <form action="" method="post">
                <label>Titulo</label>
                <input type='text' name='titulo' required="required">
                <br/><br/>
                <label>Contenido</label>
                <textarea name="contenido" class="tex"></textarea>
                <button type="submit" name="guardar"  class="btn btn-default">Crear</button>
            </form>
        </div>
    </div>
</div>
<?php
include 'footer.php';

