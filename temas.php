<?php
//Include las clases
require_once 'class/foros.php';
require_once 'class/subforos.php';
require_once 'class/temas.php';
require_once 'class/comentarios.php';


// Total de temas
$cantTemas = "5";

include 'header.php';

echo "<hr>";

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
        <?php echo $stitulo[0]["subforo"]; ?>
    </h4>

    <?php
    $foro = $_GET['foro'];
    $sub = $_GET['sub'];
    if (isset($_SESSION["id"])) {
        ?>
        <div class="nuevotema">
            <a href="nuevotema.php?foro=<?php echo $foro; ?>&sub=<?php echo $_GET['sub']; ?>"> 
                <img src="img/edit.png" /> NUEVO TEMA </a>
            </div>

            <?php
        }

    //*****************************************
        $sub = $_GET['sub'];
        $objTemas = new Temas();

        if (isset($_GET["pos"]))
            $inicio = $_GET["pos"];
        else
            $inicio = 0;

        $proxima = $inicio + $cantTemas;

        $datos = $objTemas->getsubTemas($sub, $inicio, $cantTemas);

        $total = $objTemas->TotalsubTemas($sub);

        $cantPag = $total / $cantTemas;

        if (isset($_GET["pos"]) and $_GET["pos"] > 0)
            $actual = $_GET["pos"] / $cantTemas + 1;
        else
            $actual = 1;
    //****************************************
        ?>
        <div>
            Temas del <?php echo $i = $inicio + 1; ?> al <?php echo $proxima; ?> de <?php echo $total; ?>
        </div>
        <div class="caja">
            <div class="categorias">
                <div class="temas_titulo">Titulo / Autor</div>
                <div class="temas_respuestas">Respuestas / Visitas</div>
                <div class="temas_ultimo">Último mensaje</div>
                <div style="clear:both; height:1px;font-size:0px; line-height: 0px;"></div>
            </div>

            <?php
            if (sizeof($datos) == 0) {
                echo "No existen registros aún";
            } else {
            //****************
                foreach ($datos as $temas) {
                    ?>
                    <div class="foro">
                        <div class="foro_icono">
                            <img src="img/note.png">
                        </div>
                        <div class="foro_titulo">
                            <a href="tema.php?id=<?php echo $temas["id_tema"]; ?>&foro=<?php echo $foro; ?>&sub=<?php echo $sub; ?>"><?php echo $temas["titulo"]; ?></a>
                            <?php
                        // validamos primero si es el admin puede eliminar lo que sea
                        // validados si el tema fue creado por el usuario logueado activa la opcion de eliminar
                            if(isset($_SESSION["nombre"])){
                            if ($_SESSION["nombre"] == "admin" or $temas["id_usuario"] == $_SESSION["id"]) {
                                if (isset($_GET["sub"])) {
                                    ?>
                                    <a class="btn btn-link" href="eliminar.php?opc=4&id=<?php echo $temas["id_tema"]; ?>&foro=<?php echo $_GET["foro"]; ?>&sub=<?php echo $_GET["sub"]; ?>">
                                        x Eliminar Tema</a>
                                        <?php
                                    } else {
                                        ?>
                                        <a class="btn btn-link" href="eliminar.php?opc=4&id=<?php echo $temas["id_tema"]; ?>&foro=<?php echo $_GET["foro"]; ?>&sub=0">
                                            x Eliminar Tema</a>
                                            <?php
                                        }
                                    }
                                }
                                    ?>
                                    <br>
                                    Iniciado por <a href="perfil.php?id=<?php echo $temas["id_usuario"]; ?>"><?php echo $temas["nick"]; ?></a>, <?php echo $temas["fecha"]; ?>
                                </div>
                                <div class="temas_mensajes">
                                    Respuestas:
                                    <?php
                        // total de comentarios
                                    $objCom = new Comentarios();
                                    $com = $objCom->TotalComentarios($temas["id_tema"]);
                                    echo $com;
                                    ?>
                                    <br>
                                    Visitas: <?php echo $temas["hits"]; ?>
                                </div>
                                <div class="ultimocomentario">
                                    <?php
                                    $objMensajes = new Comentarios();
                                    $mensaje = $objMensajes->ultmoComentario($temas["id_tema"]);
                                    if (sizeof($mensaje) > 0) {
                                        echo "Usuario: " . $mensaje[0]["nick"] . "<br/>";
                                        echo "Fecha: " . $mensaje[0]["fecha"];
                                    } else {
                                        echo 'No hay comentarios';
                                    }
                                    ?>
                                </div>
                                <div style="clear:both; height:1px;font-size:0px; line-height: 0px;"></div>
                            </div>
                            <?php
                        }
            //********* paginacion *******/
                    }
                    ?>

                    <!-- fin de la magia -->
                    <?php
                } else {
                    $objF = new Foros();
                    $titulo = $objF->foroporid($_GET['foro']);
                    ?>
                    <h2>Foro: <?php echo $titulo[0]["foro"]; ?></h2>
                    <h4>
                        <a href="<?php echo Conexion::ruta(); ?>">Foros</a> &rarr;
                        <a href="<?php echo Conexion::ruta(); ?>#<?php echo $titulo[0]["categoria"]; ?>"><?php echo $titulo[0]["categoria"]; ?></a> &rarr;
                        <?php echo $titulo[0]["foro"]; ?>
                    </h4>

                    <?php
                    $foro = $_GET['foro'];
                    if (isset($_SESSION["id"])) {
                        ?>
                        <div class="nuevotema">
                            <a href="nuevotema.php?foro=<?php echo $foro; ?>&sub=0"> 
                                <img src="img/edit.png" /> NUEVO TEMA </a>
                            </div>

                            <?php
                        }

        //*****************************************
                        $foro = $_GET['foro'];
                        $objTemas = new Temas();

                        if (isset($_GET["pos"]))
                            $inicio = $_GET["pos"];
                        else
                            $inicio = 0;

                        $proxima = $inicio + $cantTemas;

                        $datos = $objTemas->getTemas($foro, $inicio, $cantTemas);

                        $total = $objTemas->TotalTemas($foro);

                        $cantPag = $total / $cantTemas;

                        if (isset($_GET["pos"]) and $_GET["pos"] > 0)
                            $actual = $_GET["pos"] / $cantTemas + 1;
                        else
                            $actual = 1;
        //****************************************
                        ?>
                        <div>
                            Temas del <?php echo $i = $inicio + 1; ?> al <?php echo $proxima; ?> de <?php echo $total; ?>
                        </div>
                        <div class="caja">
                            <div class="categorias">
                                <div class="temas_titulo">Titulo / Autor</div>
                                <div class="temas_respuestas">Respuestas / Visitas</div>
                                <div class="temas_ultimo">Último mensaje</div>
                                <div style="clear:both; height:1px;font-size:0px; line-height: 0px;"></div>
                            </div>

                            <?php
                            if (sizeof($datos) == 0) {
                                echo "No existen registros aún";
                            } else {
                //****************
                                foreach ($datos as $temas) {
                                    ?>
                                    <div class="foro">
                                        <div class="foro_icono">
                                            <img src="img/note.png">
                                        </div>
                                        <div class="foro_titulo">
                                            <a href="tema.php?id=<?php echo $temas["id_tema"]; ?>&foro=<?php echo $foro; ?>"><?php echo $temas["titulo"]; ?></a> 
                                            <?php
                            // validamos primero si es el admin puede eliminar lo que sea
                            // validados si el tema fue creado por el usuario logueado activa la opcion de eliminar
                                            if(isset($_SESSION["nombre"])){
                                                if ($_SESSION["nombre"] == "admin" or $temas["id_usuario"] == $_SESSION["id"]) {
                                                    if (isset($_GET["sub"])) {
                                                        ?>
                                                        <a class="btn btn-link" href="eliminar.php?opc=4&id=<?php echo $temas["id_tema"]; ?>&foro=<?php echo $_GET["foro"]; ?>&sub=<?php echo $_GET["sub"]; ?>">
                                                            x Eliminar Tema</a>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <a class="btn btn-link" href="eliminar.php?opc=4&id=<?php echo $temas["id_tema"]; ?>&foro=<?php echo $_GET["foro"]; ?>&sub=0">
                                                                x Eliminar Tema</a>
                                                                <?php
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                    <br>
                                                    Iniciado por <a href="perfil.php?id=<?php echo $temas["id_usuario"]; ?>"><?php echo $temas["nick"]; ?></a>, <?php echo $temas["fecha"]; ?>
                                                </div>
                                                <div class="temas_mensajes">
                                                    Respuestas:
                                                    <?php
                                                    $objCom = new Comentarios();
                                                    $com = $objCom->TotalComentarios($temas["id_tema"]);
                                                    echo $com;
                                                    ?>
                                                    <br>
                                                    Visitas: <?php echo $temas["hits"]; ?>
                                                </div>
                                                <div class="ultimocomentario">

                                                    <?php
                                                    $objMensajes = new Comentarios();
                                                    $mensaje = $objMensajes->ultmoComentario($temas["id_tema"]);
                                                    if (sizeof($mensaje) > 0) {
                                                        echo "Usuario: " . $mensaje[0]["nick"] . "<br/>";
                                                        echo "Fecha: " . $mensaje[0]["fecha"];
                                                    } else {
                                                        echo 'No hay comentarios';
                                                    }
                                                    ?>

                                                </div>
                                                <div style="clear:both; height:1px;font-size:0px; line-height: 0px;"></div>
                                            </div>
                                            <?php
                                        }
                //********* paginacion *******/
                                    }
                                    ?>

                                </div>

                                <!-- Fin #paginacion -->
                                <div id="paginacion">
                                    <?php
                                    if ($inicio == 0) {
                                        ?>
                                        <span class="negrita">Anterior</span>
                                        <?php
                                    } else {
                                        ?>
                                        <a href="?foro=<?php echo $foro; ?>&pos=<?php echo $inicio - $cantTemas; ?>">Anterior</a>
                                        <?php
                                    }
                                    ?>

                                    <?php
                                    $a = 0;
                                    $ultimaPag = 0;

                                    if ($actual > 6) {
                                        echo "...";
                                    }

                                    for ($i = 1; $i <= $cantPag; $i++) {
                                        if ($i >= $actual - 5 && $i <= $actual + 5) {
                                            if ($i == $actual) {
                                                ?>	
                                                <span> <?php echo $i; ?> </span>
                                                <?php
                                            } else {
                                                ?>
                                                <a href="?foro=<?php echo $foro; ?>&pos=<?php echo $a; ?>"> <?php echo $i . " "; ?> </a>
                                                <?php
                                            }
                                        }
                                        $a+=$cantTemas;
                                        $ultimaPag++;
                                    }

                                    $final = $ultimaPag * $cantTemas;
                                    $resto = $total - $final;

                                    if ($final < $total) {
                                        $ultimaPag++;

                                        if ($actual == $ultimaPag) {
                                            ?>
                                            <span><?php echo $ultimaPag; ?></span>
                                            <?php
                                        } else {
                                            ?>
                                            <a href="?foro=<?php echo $foro; ?>&pos=<?php echo $final; ?>"><?php echo $ultimaPag; ?></a>
                                            <?php
                                        }
                                    }

                                    if ($ultimaPag - $actual > 5) {
                                        echo "...";
                                    }
                                    ?>

                                    <?php
                                    if ($ultimaPag == $actual) {
                                        ?>
                                        <span>Siguiente</span>
                                        <?php
                                    } else {
                                        ?>
                                        <a href="?foro=<?php echo $foro; ?>&pos=<?php echo $inicio + $cantTemas; ?>">Siguiente</a>
                                        <?php
                                    }
                                    ?>

                                </div>
                                <!-- Fin #paginacion -->
                                <?php
                            }


                            include 'footer.php';
                            ?>
