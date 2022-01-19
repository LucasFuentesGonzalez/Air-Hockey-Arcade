<?php

session_start();

//Reniciar sesión
if (isset($_GET['action']) && $_GET['action'] == "Reiniciar"){
    session_destroy();
    session_start();
}

//Buscar palabras
if (isset($_GET['buscar']) && $_GET['buscar'] == "Buscar"){
    //Recupero el valor de búsqueda
    $texto = filter_input(INPUT_GET,'texto',FILTER_SANITIZE_STRING);
    //Si al menos hay 3 caracteres
    if (strlen($texto) > 2){
        $_SESSION['busqueda'] = $texto;
    }
}

function resultado($Nombre){
    return (strpos(mb_strtolower($Nombre,"utf-8"),mb_strtolower($_SESSION['busqueda'],"utf-8")) !== false);
}

//Ordenar array
if (isset($_GET['filtro'])) {
    $comparacion = "";
    switch ($_GET['filtro']) {
        case 0:
            foreach ($_SESSION['perros'] as $key => $row) {
                $raza[$key] = $row['Raza'];
                $comparacion = "Pastor Aleman";
                if (!in_array($comparacion, $_SESSION['perros'][$key])) {
                    unset($_SESSION['perros'][$key]);
                }
            }
            break;
        case 1:
            foreach ($_SESSION['perros'] as $key => $row) {
                $raza[$key] = $row['Raza'];
                $comparacion = "Labrador retriever";
                if (!in_array($comparacion, $_SESSION['perros'][$key])) {
                    unset($_SESSION['perros'][$key]);
                }
            }
            break;
        case 2:
            foreach ($_SESSION['perros'] as $key => $row) {
                $raza[$key] = $row['Raza'];
                $comparacion = "Husky siberiano";
                if (!in_array($comparacion, $_SESSION['perros'][$key])) {
                    unset($_SESSION['perros'][$key]);
                }
            }
            break;
        case 3:
            foreach ($_SESSION['perros'] as $key => $row) {
                $raza[$key] = $row['Raza'];
                $comparacion = "American Pitbull Terrier";
                if (!in_array($comparacion, $_SESSION['perros'][$key])) {
                    unset($_SESSION['perros'][$key]);
                }
            }
            break;
    }
}


//Array de perros
if (!isset($_SESSION['perros'])){
    $_SESSION['perros'] = [
        [
            'Nombre' => "Zeus",
            'Raza' => "Pastor Aleman",
            'Edad' =>  4,
            'Foto' => "1.png",
        ],
        [
            'Nombre' => "Bruno",
            'Raza' => "Labrador retriever",
            'Edad' =>  7,
            'Foto' => "2.png",
        ],
        [
            'Nombre' => "Leo",
            'Raza' => "Husky siberiano",
            'Edad' =>  3,
            'Foto' => "3.png",
        ],
        [
            'Nombre' => "Simba",
            'Raza' => "Husky siberiano",
            'Edad' =>  4,
            'Foto' => "4.png",
        ],
        [
            'Nombre' => "Toby",
            'Raza' => "American Pitbull Terrier",
            'Edad' =>  9,
            'Foto' => "5.png",
        ],
        [
            'Nombre' => "Max",
            'Raza' => "Pastor Aleman",
            'Edad' =>  10,
            'Foto' => "6.png",
        ],
        [
            'Nombre' => "Noa",
            'Raza' => "Labrador retriever",
            'Edad' =>  6,
            'Foto' => "7.png",
        ],
        [
            'Nombre' => "Horacio",
            'Raza' => "American Pitbull Terrier",
            'Edad' =>  8,
            'Foto' => "8.png",
        ],
        [
            'Nombre' => "Jack",
            'Raza' => "Husky siberiano",
            'Edad' =>  9,
            'Foto' => "9.png",
        ],
        [
            'Nombre' => "Bruno",
            'Raza' => "Pastor Aleman",
            'Edad' =>  2,
            'Foto' => "10.png",
        ],
    ];

//Array con las palabras para filtrar
$_SESSION['filtrado'] = ['Pastor Aleman','Labrador retriever','Husky siberiano','American Pitbull Terrier'];


//Inicializo el valor de búsqueda
if (isset($_COOKIE['busqueda'])){
    $_SESSION['busqueda'] = $_COOKIE['busqueda'];
    header("Location:index.php");
}
else{
    $_SESSION['busqueda'] = "";
}
}

?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ejercicio 3</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <h1>Ejercicio 3</h1>

    <p><a href="index.php?action=Reiniciar" title="Reiniciar">Reiniciar sesión</a><br></p>

    <!-- Filtrar mediante texto -->
    <form name="buscar">
        <input type="text" name="texto" value="<?php echo $_SESSION['busqueda'] ?>">
        <input type="submit" name="buscar" value="Buscar"><br><br>
    </form>


    <!-- Filtrar mediante select -->
    <form action="index.php" name="filtrar">
        Selecciona un filtro:
        <select name="filtro" onchange="filtrar.submit()">
            <option value="">Filtro</option>
            <?php foreach ($_SESSION['filtrado'] as $key => $row){ ?>
                <option value="<?php echo $key ?>"><?php echo $row ?></option>
            <?php } ?>
        </select><br>
    </form><br>


    <!-- Crear cabecera -->
    <ul class="cabecera">
        <li>Foto</li>
        <li>Nombre</li>
        <li>Raza</li>
        <li>Edad</li>
    </ul>


    <!-- Imprimir datos -->
    <?php foreach ($_SESSION['perros'] as $key => $row){
        if (!$_SESSION['busqueda'] || resultado($row['Nombre'])){ ?>
            <ul class="lista">
                <li>
                    <img src="img/<?php echo $row['Foto'] ?>" alt="<?php echo $row['Nombre'] ?>">
                </li>
                <li><?php echo $row['Nombre'] ?></li>
                <li><?php echo $row['Raza'] ?></li>
                <li><?php echo $row['Edad'] ?></li>
            </ul>
            <?php }

        elseif ($comparacion == $row['Raza']){ ?>
            <ul class="lista">
                <li>
                    <img src="img/<?php echo $row['Foto'] ?>" alt="<?php echo $row['Nombre'] ?>">
                </li>
                <li><?php echo $row['Nombre'] ?></li>
                <li><?php echo $row['Raza'] ?></li>
                <li><?php echo $row['Edad'] ?></li>
            </ul>
        <?php }
    } ?>
</body>
