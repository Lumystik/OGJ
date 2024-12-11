<?php
require_once 'class/categorias.php';
require_once 'class/foros.php';
require_once 'class/subforos.php';
require_once 'class/temas.php';
require_once 'class/usuarios.php';
require_once 'class/comentarios.php';

include 'header.php';
?>

<div class="caja">
    <div class="categorias">
        Control panel
    </div>

    <?php
    // REGISTRAMOS LA CATEGORIA
    if (isset($_POST['guardar'])) {
        $Categoria = new Categorias();
        $Categoria->add();
    }
    // REGISTRAMOS EL FORO
    if (isset($_POST['foro'])) {
        $Foros = new Foros();
        $Foros->add();
    }
    // REGISTRAMOS EL subFORO
    if (isset($_POST['subforo'])) {
        $SubForos = new Subforos();
        $SubForos->add();
    }
    ?>
    <div class="foro">   
        <div class="tema">
            <form action="" method="post">
                <label>Categoria nueva</label>
                <input type='text' name='titulo' required="required">
                <button type="submit" name="guardar"  class="btn btn-default">Crear</button>
            </form>
        </div>
    </div>
</div>

<?php
$objC = new Categorias();
$categorias = $objC->getCategorias();
foreach ($categorias as $cat) {
    $categoria = $cat["id_forocategoria"];
    ?>
    <div class="caja">
        <div class="categorias">
            <a name="<?php echo $cat["categoria"]; ?>"></a><?php echo $cat["categoria"]; ?> |
            <a class="btn btn-link" href="eliminar.php?opc=1&id=<?php echo $cat["id_forocategoria"]; ?>"> x Eliminar Categoria</a>
        </div>
        <div class="foro">   
            <div class="tema">
                <form action="" method="post">
                    <label>Nuevo foro</label>
                    <input type='text' name='titulo' required="required">
                    <input type="hidden" name="categoria" value="<?php echo $cat["id_forocategoria"]; ?>">                        
                    <button type="submit" name="foro"  class="btn btn-default">Crear</button>
                </form>
            </div>
        </div>

        <?php
        $objF = new Foros();
        $foros = $objF->getForo($categoria);
        if(sizeof($foros)>0){
        foreach ($foros as $foro) {
            ?>
            <div class="foro">
                <div class="foro_icono">
                    <img src="img/note.png">
                </div>
                <div class="foro_titulo">
                    <a href="temas.php?foro=<?php echo $foro["id_foro"]; ?>"><?php echo $foro["foro"]; ?></a> |
                    <a class="btn btn-link" href="eliminar.php?opc=2&id=<?php echo $foro["id_foro"]; ?>"> x Eliminar Foro</a>
                    
                    <form action="" method="post">
                        <label>Nuevo subforo</label>
                        <input type='text' name='titulo' required="required">
                        <input type="hidden" name="foro" value="<?php echo $foro["id_foro"]; ?>">                        
                        <button type="submit" name="subforo"  class="btn btn-default">Crear</button>
                    </form>

                    <ul>
                        <?php
                        $objSF = new Subforos();
                        $subforos = $objSF->getSubforo($foro["id_foro"]);
                        if (sizeof($subforos) == 0) {
                            echo "No existen registros aún";
                        }else{
                            foreach ($subforos as $sforo) {
                                ?>
                                <li>
                                    <?php echo $sforo["subforo"]; ?> |
                                    <a class="btn btn-link" href="eliminar.php?opc=3&id=<?php echo $sforo["id_subforo"]; ?>"> x Eliminar Subforo</a>
                                </li>
                                <?php
                            }
                        }
                        ?>
                    </ul>
                </div>

                <div style="clear:both; height:1px;font-size:0px; line-height: 0px;"></div>
            </div>
            <?php
        }
        }
        ?>
    </div>
    <?php
}
include 'footer.php';

