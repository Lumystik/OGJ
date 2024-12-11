<?php
//Include las clases
require_once 'class/foros.php';
require_once 'class/subforos.php';
require_once 'class/temas.php';
require_once 'class/comentarios.php';
require_once 'class/usuarios.php';

include 'header.php';

?>
<div class="caja">
    <div class="categorias">
        <div class="temas_titulo">Temas</div>
        <div class="temas_respuestas"></div>
        <div class="temas_ultimo"></div>
        <div style="clear:both; height:1px;font-size:0px; line-height: 0px;"></div>
    </div>
    <div class="foro">
        <?php
        // listo todos los usuarios cosa de niños
        $obju = new Usuarios();
        $usuarios = $obju->usuariotemas($_GET["id"]);
        foreach ($usuarios as $u) {
            ?>
            <div class="foro_icono">
                <img src="img/note.png">
            </div>
            <div class="foro_titulo">
                <a href="temas.php?foro=<?php echo $u["id_foro"]; if($u["id_subforo"]>0){echo "&sub=".$u["id_subforo"];} ?>"><?php echo $u["titulo"]; ?></a>
            </div>
            <div class="temas_mensajes">

            </div>
            <div class="ultimocomentario">
            </div>
            <div style="clear:both; height:1px;font-size:0px; line-height: 0px;"></div>
            <?php
        }
        ?>
    </div>
</div>

<?php

include 'footer.php';
?>
