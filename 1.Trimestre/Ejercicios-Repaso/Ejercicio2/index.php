<?php
session_start();

if (isset($_GET['action']) && $_GET['action'] == "Reiniciar"){
    session_destroy();
    session_start();
}


//Ordenar nombres
//Ascendente
if (isset($_GET['action']) && $_GET['action'] == "OrdenarAsc1"){
    foreach ($_SESSION['perros'] as $key => $row){
        $nombres[$key] = $row['Nombre'];
    }
    array_multisort($nombres, SORT_ASC, $_SESSION['perros']);
}

//Descendente
if (isset($_GET['action']) && $_GET['action'] == "OrdenarDesc1"){
    foreach ($_SESSION['perros'] as $key => $row){
        $nombres[$key] = $row['Nombre'];
    }
    array_multisort($nombres, SORT_DESC, $_SESSION['perros']);
}


//Ordenar raza
//Ascendente
if (isset($_GET['action']) && $_GET['action'] == "OrdenarAsc2"){
    foreach ($_SESSION['perros'] as $key => $row){
        $razas[$key] = $row['Raza'];
    }
    array_multisort($razas, SORT_ASC, $_SESSION['perros']);
}
//Descendente
if (isset($_GET['action']) && $_GET['action'] == "OrdenarDesc2"){
    foreach ($_SESSION['perros'] as $key => $row){
        $razas[$key] = $row['Raza'];
    }
    array_multisort($razas, SORT_DESC, $_SESSION['perros']);
}


//Ordenar edad
//Ascendente
if (isset($_GET['action']) && $_GET['action'] == "OrdenarAsc3"){
    foreach ($_SESSION['perros'] as $key => $row){
        $edades[$key] = $row['Edad'];
    }
    array_multisort($edades, SORT_ASC, $_SESSION['perros']);
}
//Descendente
if (isset($_GET['action']) && $_GET['action'] == "OrdenarDesc3"){
    foreach ($_SESSION['perros'] as $key => $row){
        $edades[$key] = $row['Edad'];
    }
    array_multisort($edades, SORT_DESC, $_SESSION['perros']);
}


//Si se ha enviado el form
if (isset($_GET['orden'])){
    $array = [];
    $columna = "";
    $sentido = null;
    $tipo = "";
    switch ($_GET['orden']){
        case 0: //Nombre ASC
            $columna = "Nombre";
            $sentido = SORT_ASC;
            $tipo = SORT_STRING;
            break;
        case 1: //Nombre DESC
            $columna = "Nombre";
            $sentido = SORT_DESC;
            $tipo = SORT_STRING;
            break;
        case 2: //Raza ASC
            $columna = "Raza";
            $sentido = SORT_ASC;
            $tipo = SORT_STRING;
            break;
        case 3: //Raza DESC
            $columna = "Raza";
            $sentido = SORT_DESC;
            $tipo = SORT_STRING;
            break;
        case 4: //Precio Mayor
            $columna = "Edad";
            $sentido = SORT_DESC;
            $tipo = SORT_NUMERIC;
            break;
        case 5: //Precio Menor
            $columna = "Edad";
            $sentido = SORT_ASC;
            $tipo = SORT_NUMERIC;
            break;
    }
    foreach ($_SESSION['perros'] as $key => $row){
        $array[$key] = $row[$columna];
    }
    array_multisort($array, $sentido, $_SESSION['perros'],$tipo);
}

//---------------------------------------------------------------------

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
            'Raza' => "Pomerania",
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
            'Raza' => "Bulldog",
            'Edad' =>  9,
            'Foto' => "5.png",
        ],
        [
            'Nombre' => "Max",
            'Raza' => "Caniche",
            'Edad' =>  10,
            'Foto' => "6.png",
        ],
        [
            'Nombre' => "Noa",
            'Raza' => "Golden retriever",
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
            'Raza' => "Chihuahua",
            'Edad' =>  9,
            'Foto' => "9.png",
        ],
        [
            'Nombre' => "Bruno",
            'Raza' => "Dachshund",
            'Edad' =>  2,
            'Foto' => "10.png",
        ],
    ];
}

$_SESSION['ordenacion'] = ['Nombre A-Z','Nombre Z-A','Raza A-Z','Raza Z-A','Edad Mayor','Edad Menor'];

?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ejercicio 2</title>
    <link rel="stylesheet" type="text/css" href="css/style.css"">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
</head>
<body>
    <h1>Tienda de perros</h1>
    <p><a href="index.php?action=Reiniciar" title="Reiniciar">Reiniciar sesión</a><br></p>



    <!-- Ordenar mediante select -->
    <form action="index.php" name="ordenar">
        Selecciona un órden:
        <select name="orden" onchange="ordenar.submit()">
            <option value="">Órden</option>
            <?php foreach ($_SESSION['ordenacion'] as $key => $row){ ?>
                <option value="<?php echo $key ?>"><?php echo $row ?></option>
            <?php } ?>
        </select><br>
    </form><br>



    <!-- Ordenar mediante radius -->
    <form action="index.php" name="ordenar1">
        <?php foreach ($_SESSION['ordenacion'] as $key => $row){ ?>
            <input type="radio" name="orden" onchange="ordenar1.submit()" value="<?php echo $key ?>"><?php echo $row."<br>"?>
        <?php } ?>
    </form>



    <!-- Ordenar mediante enlaces -->
    <ul class="cabecera">
        <li>Foto</li>

        <li>Nombre
            <a href="index.php?action=OrdenarAsc1">
                <span class="lnr lnr-arrow-down"></span>
            </a>
            <a href="index.php?action=OrdenarDesc1">
                <span class="lnr lnr-arrow-up"></span>
            </a>
        </li>

        <li>Raza
            <a href="index.php?action=OrdenarAsc2">
                <span class="lnr lnr-arrow-down"></span>
            </a>
            <a href="index.php?action=OrdenarDesc2">
                <span class="lnr lnr-arrow-up"></span>
            </a>
        </li>

        <li>Edad
            <a href="index.php?action=OrdenarAsc3">
                <span class="lnr lnr-arrow-down"></span>
            </a>
            <a href="index.php?action=OrdenarDesc3">
                <span class="lnr lnr-arrow-up"></span>
            </a>
        </li>
    </ul>


    <!-- Imprimir datos -->
    <?php foreach ($_SESSION['perros'] as $key => $row){ ?>
        <ul class="lista">
            <li>
                <img src="img/<?php echo $row['Foto'] ?>" alt="<?php echo $row['Nombre'] ?>">
            </li>
            <li><?php echo $row['Nombre'] ?></li>
            <li><?php echo $row['Raza'] ?></li>
            <li><?php echo $row['Edad'] ?></li>
            <li>
        </ul>
    <?php } ?>

</body>
</html>