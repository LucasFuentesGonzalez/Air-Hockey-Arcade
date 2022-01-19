<?php

session_start();

//Reniciar sesión
if (isset($_GET['action']) && $_GET['action'] == "Reiniciar"){
    session_destroy();
    session_start();
}


if (!isset($_SESSION['productos'])) {
    $_SESSION['productos'] = [
        [
            'nombre' => "Set de raqueta de tenis",
            'precio' => "49,95€",
            'imagen' => "img/tenis.png",
            'contador' => "0",
        ],
        [
            'nombre' => "Set de pesas",
            'precio' => "59,95€",
            'imagen' => "img/pesas.png",
            'contador' => "0",
        ],
        [
            'nombre' => "Set de bate de béisbol + pelota",
            'precio' => "29,95€",
            'imagen' => "img/beisbol.png",
            'contador' => "0",
        ],
        [
            'nombre' => "Set de bolos",
            'precio' => "129,95€",
            'imagen' => "img/bolos.png",
            'contador' => "0",
        ],
        [
            'nombre' => "Diana",
            'precio' => "89,95€",
            'imagen' => "img/diana.png",
            'contador' => "0",
        ],
        [
            'nombre' => "Bicicleta",
            'precio' => "249,95€",
            'imagen' => "img/bicicleta.png",
            'contador' => "0",
        ],
        [
            'nombre' => "Monopatín",
            'precio' => "69,95€",
            'imagen' => "img/monopatin.png",
            'contador' => "0",
        ],
        [
            'nombre' => "Balón de fútbol",
            'precio' => "19,95€",
            'imagen' => "img/futbol.png",
            'contador' => "0",
        ],
        [
            'nombre' => "Balón de baloncesto",
            'precio' => "19,95€",
            'imagen' => "img/baloncesto.png",
            'contador' => "0",
        ],
        [
            'nombre' => "Balón de rugby",
            'precio' => "25,95€",
            'imagen' => "img/rugby.png",
            'contador' => "0",
        ],
    ];
}


?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ejercicio 4</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<h1>Ejercicio 4</h1>

<p><a href="index.php?action=Reiniciar" title="Reiniciar">Vaciar cesta</a><br></p>


<ul class="cabecera">
    <li>Imagen</li>
    <li>Nombre</li>
    <li>Precio</li>
    <li>Acciones</li>
</ul>

<?php foreach ($_SESSION['productos'] as $key => $row){?>
    <ul>
        <!-- Imprimir datos -->
        <li>
            <img class="img" src="<?php echo $row['imagen'] ?>" alt="<?php echo $row['nombre'] ?>">
        </li>
        <li><?php echo $row['nombre'] ?></li>
        <li><?php echo $row['precio'] ?></li>
        <li>
            <form>
                <input type="button" value="-"/>
                <input type="text" value="<?php echo $row['contador'] ?>">
                <input type="button" value="+"/>
            </form>
        </li>
    </ul>
<?php } ?>

</body>
