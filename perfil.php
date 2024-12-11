<?php
//Include las clases a utikizar
require_once 'class/usuarios.php';
// creamos el objeto usuarios
$objC = new Usuarios();

include 'header.php';

// obtenemos el id 
// primero validamos si la url trae el id por get, si no lo contiene entonces un usuario esta
// revisando su perfil y lo obtenemos de la session que creamos al momento del login
// si es por web lo considera como un visitante
// si es por session activa el formulario para modificarlo

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $u = $objC->usuariosid($id);
    ?>
    <div class="caja">
        <div class="categorias">Usuarios</div>
        <div class="foro">
            <img src="upload/<?php echo $u[0]["avatar"]; ?>" width="70px" /><br/>
            Nick: <?php echo $u[0]["nick"]; ?> <br/>
            Nombre: <?php echo $u[0]["nombre"]; ?> <br/>
            Facebook: <?php echo $u[0]["facebook"]; ?> <br/>
            Twitter: <?php echo $u[0]["twitter"]; ?> <br/>
        </div>
    </div>
    <?php
} else {
    $id = $_SESSION["id"];
    $u = $objC->usuariosid($id);
    
    if (isset($_POST['guardar'])) {
        $com = new Usuarios();
        $com->update($_SESSION["id"]);
    }
    
    ?>
    <div class="caja">
        <div class="categorias">Usuarios</div>
        <div class="foro">
            <form action="" method="post"  class="formulario">
                <img src="upload/<?php echo $u[0]["avatar"]; ?>" width="70px" /> <br/> 
				<a class="btn btn-link" href="foto.php"> - Cambiar foto -</a><br/>
				<a class="btn btn-link" href="eliminar.php?opc=6&id=<?php echo $_SESSION["id"]; ?>&dir=1">Eliminar cuenta</a><br/>
                <label>Nick:</label>
                <?php echo $u[0]["nick"]; ?> <br/>
                <label>Nombre:</label>
                <input type="text" name="nombre" value="<?php echo $u[0]["nombre"]; ?>" /> <br/>
                <label>Correo:</label>
                <input type="text" name="correo" value="<?php echo $u[0]["correo"]; ?>" /> <br/>
                <label>Facebook:</label>
                <input type="text" name="facebook" value="<?php echo $u[0]["facebook"]; ?>" /> <br/>
                <label>Twitter:</label>
                <input type="text" name="twitter" value="<?php echo $u[0]["twitter"]; ?>" /> <br/>
                <label>Firma:</label>
                <input type="text" name="firma" value="<?php echo $u[0]["firma"]; ?>" /> <br/>

                <button type="submit" name="guardar" class="btn btn-default">Registrar</button>
            </form>
        </div>
    </div>

    <?php
}

include 'footer.php';
