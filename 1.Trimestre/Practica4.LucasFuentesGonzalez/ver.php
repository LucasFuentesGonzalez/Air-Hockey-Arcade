<?php
    session_start();
    //Obtenemos la id del actor y guardamos su informacion en la variable $actor
    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $actor = $_SESSION['actores'][$id];
    }
    else{
        echo "No encuentro el personaje";
    }
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Ver <?php echo $actor['nombre']." ".$actor['apellidos'] ?></title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body class="body2">

    <!-- Creo el boton para volver a la pagina de inicio -->
    <a class="Volver" href="index.php" title="Volver">Volver</a>

    <!-- Imprimimos por pantalla los datos del actor -->
    <h1>Informacion sobre <?php echo $actor['nombre']." ".$actor['apellidos'] ?></h1>
    <div class="caja1">
        <img class="img2" src="<?php echo $actor['imagen'] ?>" alt="<?php echo $actor['nombre']." ".$actor['apellidos'] ?>">
    </div>
    <div class="caja2">
        <li>Nombre: <?php echo $actor['nombre']." ".$actor['apellidos']?></li>
        <li>Nacionalidad: <?php echo $actor['nacionalidad']?></li>
        <li>Fecha de nacimiento: <?php echo $actor['fecha de nacimiento']->format("d/m/Y")?></li>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lobortis libero quis porta pulvinar.
            Duis quis turpis convallis, convallis mauris eget, accumsan sapien. Donec vitae erat a justo facilisis
            porta. Sed finibus elit ante, vel vulputate libero pulvinar nec. Donec facilisis placerat luctus.
            Quisque posuere accumsan congue. Nullam porta sit amet tellus sit amet venenatis. Nam ornare nisi
            iaculis volutpat gravida. Donec a ipsum facilisis, porta turpis et, hendrerit mi. Phasellus sit amet
            lectus sodales lorem blandit tincidunt nec interdum mauris. Nunc porta hendrerit nulla vitae tristique.</p>
    </div>
</body>
</html>
