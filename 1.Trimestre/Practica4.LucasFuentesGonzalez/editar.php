
<?php
    session_start();
    //Obtenemos la id del actor y guardamos su informacion en la variable $actor
    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $actor = $_SESSION['actores'][$id];
    }
    else{
        echo "No encuentro el actor";
    }

    //Guardamos los valores
    if (isset($_GET['Guardar'])){
        $_SESSION['actores'][$_GET['id']]['nombre'] = $_GET['nom'];
        $_SESSION['actores'][$_GET['id']]['apellido'] = $_GET['ape'];
        $_SESSION['actores'][$_GET['id']]['nacionalidad'] = $_GET['nac'];
        $_SESSION['actores'][$_GET['id']]['fecha de nacimiento'] = $_GET['fech'];
        $_SESSION['actores'][$_GET['id']]['imagen'] = $_GET['imagen'];
    }

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Editar <?php echo $actor['nombre']." ".$actor['apellidos'] ?></title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body class="body3">

<a href="index.php" title="Volver">Volver</a>
    <div class="cuadro">
        <form action="editar.php">
            <!-- Imprimimos los parametros para modificar por pantalla -->
            <p><b>Cambiar el Nombre:</b></p>
            <input name="nom" type="text" value="<?php echo $actor['nombre'];?>"><br><br>

            <p><b>Cambiar el Apellido:</b></p>
            <input name="ape" type="text" value="<?php echo $actor['apellidos'];?>"><br><br>

            <p><b>Cambiar la Nacionalidad:</b></p>
            <input name="nac" value="<?php echo $actor['nacionalidad'];?>"><br><br>

            <p><b>Cambiar la Fecha de Nacimiento:</b></p>
            <input name="fech" value="<?php echo $actor['fecha de nacimiento']->format("d/m/Y");?>"><br><br>

            <p><b>Cambiar la Imagen:</b></p>
            <input name="imagen" value="<?php echo $actor['imagen'];?>"><br><br>

            <!-- Creo el boton para guardar -->
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <input type="submit" name="Guardar" value="Guardar"><br><br>
        </form>
    </div>

</body>
</html>















