<?php

session_start();

//Reniciar sesión
if (isset($_GET['action']) && $_GET['action'] == "Reiniciar"){
    session_destroy();
    session_start();
}

//Guardamos la cantidad de productos que quieren comprar
$cant = filter_input(INPUT_GET, 'numero', FILTER_SANITIZE_STRING);


if (isset($_SESSION['0'])) {
    $array = [$_SESSION['productos'][0], $cant];
    array_push($_SESSION['carrito'],$array);
}

if (isset($_SESSION['1'])) {
    $array = [$_SESSION['productos'][1], $cant];
    array_push($_SESSION['carrito'],$array);
}

if (isset($_SESSION['2'])) {
    $array = [$_SESSION['productos'][2], $cant];
    array_push($_SESSION['carrito'],$array);
}

if (isset($_SESSION['3'])) {
    $array = [$_SESSION['productos'][3], $cant];
    array_push($_SESSION['carrito'],$array);
}

if (isset($_SESSION['4'])) {
    $array = [$_SESSION['productos'][4], $cant];
    array_push($_SESSION['carrito'],$array);
}

if (isset($_SESSION['5'])) {
    $array = [$_SESSION['productos'][6], $cant];
    array_push($_SESSION['carrito'],$array);
}

if (isset($_SESSION['6'])) {
    $array = [$_SESSION['productos'][6], $cant];
    array_push($_SESSION['carrito'],$array);
}

if (isset($_SESSION['7'])) {
    $array = [$_SESSION['productos'][7], $cant];
    array_push($_SESSION['carrito'],$array);
}

if (isset($_SESSION['8'])) {
    $array = [$_SESSION['productos'][8], $cant];
    array_push($_SESSION['carrito'],$array);
}

if (isset($_SESSION['9'])) {
    $array = [$_SESSION['productos'][9], $cant];
    array_push($_SESSION['carrito'],$array);
}


if (!isset($_SESSION['productos'])) {
    $_SESSION['carrito'] = [];
    $_SESSION['productos'] = [
        [
            'nombre' => "Set de raqueta de tenis",
            'precio' => "49,95€",
            'imagen' => "img/tenis.png",
            'cantidad' => "0",
        ],
        [
            'nombre' => "Set de pesas",
            'precio' => "59,95€",
            'imagen' => "img/pesas.png",
            'cantidad' => "0",
        ],
        [
            'nombre' => "Set de bate de béisbol + pelota",
            'precio' => "29,95€",
            'imagen' => "img/beisbol.png",
            'cantidad' => "0",
        ],
        [
            'nombre' => "Set de bolos",
            'precio' => "129,95€",
            'imagen' => "img/bolos.png",
            'cantidad' => "0",
        ],
        [
            'nombre' => "Diana",
            'precio' => "89,95€",
            'imagen' => "img/diana.png",
            'cantidad' => "0",
        ],
        [
            'nombre' => "Bicicleta",
            'precio' => "249,95€",
            'imagen' => "img/bicicleta.png",
            'cantidad' => "0",
        ],
        [
            'nombre' => "Monopatín",
            'precio' => "69,95€",
            'imagen' => "img/monopatin.png",
            'cantidad' => "0",
        ],
        [
            'nombre' => "Balón de fútbol",
            'precio' => "19,95€",
            'imagen' => "img/futbol.png",
            'cantidad' => "0",
        ],
        [
            'nombre' => "Balón de baloncesto",
            'precio' => "19,95€",
            'imagen' => "img/baloncesto.png",
            'cantidad' => "0",
        ],
        [
            'nombre' => "Balón de rugby",
            'precio' => "25,95€",
            'imagen' => "img/rugby.png",
            'cantidad' => "0",
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

<!-- Crear cabecera -->
<ul class="cabecera">
    <li>Imagen</li>
    <li>Nombre</li>
    <li>Precio</li>
    <li>Acciones</li>
</ul>

<!-- Imprimir datos -->
<?php foreach ($_SESSION['productos'] as $key => $row){?>
    <ul class="lista">
        <li>
            <img class="img" src="<?php echo $row['imagen'] ?>" alt="<?php echo $row['nombre'] ?>">
        </li>
        <li><?php echo $row['nombre'] ?></li>
        <li><?php echo $row['precio'] ?></li>
        <li>
            <form>
                <input type="text" name="numero" value="" maxlength="2" size="1" placeholder="0">
                <input type="submit" name="<?php echo $key ?>" value="Añadir">
            </form>
        </li>
    </ul>
<?php }
echo $_SESSION['carrito'] ?>

</body>
