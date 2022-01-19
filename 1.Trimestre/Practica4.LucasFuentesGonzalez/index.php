<?php
    session_start();

    //Boton para reiniciar la pagina
    if (isset($_GET['action']) && $_GET['action'] == "Reiniciar"){
        session_destroy();
        session_start();
    }

    //Boton para borrar
    if(isset($_GET['action']) && $_GET['action'] == "Borrar"){
        $id = $_GET['id'];
        unset($_SESSION['actores'][$id]);
    }




    //Ordenar nombres
    //Ascendente
    if (isset($_GET['action']) && $_GET['action'] == "OrdenarAsc1"){
        foreach ($_SESSION['actores'] as $key => $row){
            $nombres[$key] = $row['nombre'];
        }
        array_multisort($nombres, SORT_ASC, $_SESSION['actores']);
    }
    //Descendente
    if (isset($_GET['action']) && $_GET['action'] == "OrdenarDesc1"){
        foreach ($_SESSION['actores'] as $key => $row){
            $nombres[$key] = $row['nombre'];
        }
        array_multisort($nombres, SORT_DESC, $_SESSION['actores']);
    }




    //Ordenar apellidos
    //Ascendente
    if (isset($_GET['action']) && $_GET['action'] == "OrdenarAsc2"){
        foreach ($_SESSION['actores'] as $key => $row){
            $apellido[$key] = $row['apellidos'];
        }
        array_multisort($apellido, SORT_ASC, $_SESSION['actores']);
    }
    //Descendente
    if (isset($_GET['action']) && $_GET['action'] == "OrdenarDesc2"){
        foreach ($_SESSION['actores'] as $key => $row){
            $apellido[$key] = $row['apellidos'];
        }
        array_multisort($apellido, SORT_DESC, $_SESSION['actores']);
    }




    //Ordenar fechas
    //Ascendente
    if (isset($_GET['action']) && $_GET['action'] == "OrdenarAsc3"){
        foreach ($_SESSION['actores'] as $key => $row){
            $fechas[$key] = $row['fecha de nacimiento'];
        }
        array_multisort($fechas, SORT_ASC, $_SESSION['actores']);
    }
    //Descendente
    if (isset($_GET['action']) && $_GET['action'] == "OrdenarDesc3"){
        foreach ($_SESSION['actores'] as $key => $row){
            $fechas[$key] = $row['fecha de nacimiento'];
        }
        array_multisort($fechas, SORT_DESC, $_SESSION['actores']);
    }




    //Array con los actores
    if (!isset($_SESSION['actores'])) {

        $_SESSION['actores'] = [
            [
                'nombre' => "Marlon",
                'apellidos' => "Brando",
                'nacionalidad' => "Estados Unidos",
                'fecha de nacimiento' => DateTime::createFromFormat("d/m/Y","3/4/1924", new DateTimeZone("Europe/Madrid")),
                'imagen' => "img/img1.jpg",
            ],
            [
                'nombre' => "Brad",
                'apellidos' => "Pitt",
                'nacionalidad' => "Estados Unidos",
                'fecha de nacimiento' => DateTime::createFromFormat("d/m/Y","18/12/1963", new DateTimeZone("Europe/Madrid")),
                'imagen' => "img/img2.jpg",
            ],
            [
                'nombre' => "Humphrey",
                'apellidos' => "Bogart",
                'nacionalidad' => "Estados Unidos",
                'fecha de nacimiento' => DateTime::createFromFormat("d/m/Y","25/12/1899", new DateTimeZone("Europe/Madrid")),
                'imagen' => "img/img3.jpg",
            ],
            [
                'nombre' => "Angelina",
                'apellidos' => "Jolie",
                'nacionalidad' => "Estados Unidos",
                'fecha de nacimiento' => DateTime::createFromFormat("d/m/Y","4/6/1975", new DateTimeZone("Europe/Madrid")),
                'imagen' => "img/img4.jpg",
            ],
            [
                'nombre' => "Jack",
                'apellidos' => "Nicholson",
                'nacionalidad' => "Estados Unidos",
                'fecha de nacimiento' => DateTime::createFromFormat("d/m/Y","22/4/1937", new DateTimeZone("Europe/Madrid")),
                'imagen' => "img/img5.jpg",
            ],
            [
                'nombre' => "Will",
                'apellidos' => "Smith",
                'nacionalidad' => "Estados Unidos",
                'fecha de nacimiento' => DateTime::createFromFormat("d/m/Y","25/9/1968", new DateTimeZone("Europe/Madrid")),
                'imagen' => "img/img6.jpg",
            ],
            [
                'nombre' => "Sean",
                'apellidos' => "Connery",
                'nacionalidad' => "Reino Unido",
                'fecha de nacimiento' => DateTime::createFromFormat("d/m/Y","25/8/1930", new DateTimeZone("Europe/Madrid")),
                'imagen' => "img/img7.jpg",
            ],
            [
                'nombre' => "Morgan",
                'apellidos' => "Freeman",
                'nacionalidad' => "Estados Unidos",
                'fecha de nacimiento' => DateTime::createFromFormat("d/m/Y","1/6/1937", new DateTimeZone("Europe/Madrid")),
                'imagen' => "img/img8.jpg",
            ],
            [
                'nombre' => "James",
                'apellidos' => "Stewart",
                'nacionalidad' => "Estados Unidos",
                'fecha de nacimiento' => DateTime::createFromFormat("d/m/Y","20/5/1908", new DateTimeZone("Europe/Madrid")),
                'imagen' => "img/img9.jpg",
            ],
            [
                'nombre' => "Henry",
                'apellidos' => "Fonda",
                'nacionalidad' => "Estados Unidos",
                'fecha de nacimiento' => DateTime::createFromFormat("d/m/Y","16/5/1905", new DateTimeZone("Europe/Madrid")),
                'imagen' => "img/img10.jpg",
            ],
            [
                'nombre' => "Charlie",
                'apellidos' => "Chaplin",
                'nacionalidad' => "Reino Unido",
                'fecha de nacimiento' => DateTime::createFromFormat("d/m/Y","16/4/1889", new DateTimeZone("Europe/Madrid")),
                'imagen' => "img/img11.jpg",
            ],
            [
                'nombre' => "Scarlett",
                'apellidos' => "Johansson",
                'nacionalidad' => "Estados Unidos",
                'fecha de nacimiento' => DateTime::createFromFormat("d/m/Y","22/11/1984", new DateTimeZone("Europe/Madrid")),
                'imagen' => "img/img12.jpg",
            ],
            [
                'nombre' => "Christian",
                'apellidos' => "Bale",
                'nacionalidad' => "Reino Unido",
                'fecha de nacimiento' => DateTime::createFromFormat("d/m/Y","30/1/1974", new DateTimeZone("Europe/Madrid")),
                'imagen' => "img/img13.jpg",
            ],
            [
                'nombre' => "Robert",
                'apellidos' => "De Niro",
                'nacionalidad' => "Estados Unidos",
                'fecha de nacimiento' => DateTime::createFromFormat("d/m/Y","17/8/1943", new DateTimeZone("Europe/Madrid")),
                'imagen' => "img/img14.jpg",
            ],
            [
                'nombre' => "Gary",
                'apellidos' => "Cooper",
                'nacionalidad' => "Estados Unidos",
                'fecha de nacimiento' => DateTime::createFromFormat("d/m/Y","7/5/1901", new DateTimeZone("Europe/Madrid")),
                'imagen' => "img/img15.jpg",
            ],
            [
                'nombre' => "Ricardo",
                'apellidos' => "Darín",
                'nacionalidad' => "Argentina",
                'fecha de nacimiento' => DateTime::createFromFormat("d/m/Y","16/1/1957", new DateTimeZone("Europe/Madrid")),
                'imagen' => "img/img16.jpg",
            ],
            [
                'nombre' => "John",
                'apellidos' => "Wayne",
                'nacionalidad' => "Estados Unidos",
                'fecha de nacimiento' => DateTime::createFromFormat("d/m/Y","26/5/1907", new DateTimeZone("Europe/Madrid")),
                'imagen' => "img/img17.jpg",
            ],
            [
                'nombre' => "Laurence",
                'apellidos' => "Olivier",
                'nacionalidad' => "Reino Unido",
                'fecha de nacimiento' => DateTime::createFromFormat("d/m/Y","22/5/1907", new DateTimeZone("Europe/Madrid")),
                'imagen' => "img/img18.jpg",
            ],
            [
                'nombre' => "Tom",
                'apellidos' => "Hanks",
                'nacionalidad' => "Estados Unidos",
                'fecha de nacimiento' => DateTime::createFromFormat("d/m/Y","9/7/1956", new DateTimeZone("Europe/Madrid")),
                'imagen' => "img/img19.jpg",
            ],
            [
                'nombre' => "Natalie",
                'apellidos' => "Portman",
                'nacionalidad' => "Jerusalén",
                'fecha de nacimiento' => DateTime::createFromFormat("d/m/Y","9/6/1981", new DateTimeZone("Europe/Madrid")),
                'imagen' => "img/img20.jpg",
            ],
            [
                'nombre' => "Gene",
                'apellidos' => "Kelly",
                'nacionalidad' => "Estados Unidos",
                'fecha de nacimiento' => DateTime::createFromFormat("d/m/Y","23/8/1912", new DateTimeZone("Europe/Madrid")),
                'imagen' => "img/img21.jpg",
            ],
            [
                'nombre' => "Kirk",
                'apellidos' => "Douglas",
                'nacionalidad' => "Estados Unidos",
                'fecha de nacimiento' => DateTime::createFromFormat("d/m/Y","9/12/1916", new DateTimeZone("Europe/Madrid")),
                'imagen' => "img/img22.jpg",
            ],
            [
                'nombre' => "Burt",
                'apellidos' => "Lancaster",
                'nacionalidad' => "Estados Unidos",
                'fecha de nacimiento' => DateTime::createFromFormat("d/m/Y","2/11/1913", new DateTimeZone("Europe/Madrid")),
                'imagen' => "img/img23.jpg",
            ],
            [
                'nombre' => "Santiago",
                'apellidos' => "Segura",
                'nacionalidad' => "España",
                'fecha de nacimiento' => DateTime::createFromFormat("d/m/Y","17/7/1965", new DateTimeZone("Europe/Madrid")),
                'imagen' => "img/img24.jpg",
            ],
            [
                'nombre' => "Buster",
                'apellidos' => "Keaton",
                'nacionalidad' => "Estados Unidos",
                'fecha de nacimiento' => DateTime::createFromFormat("d/m/Y","4/10/1895", new DateTimeZone("Europe/Madrid")),
                'imagen' => "img/img25.jpg",
            ],
        ];
    }


?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listado de personajes</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
</head>

<body class="body1">
    <h1><u>Listado de personajes</u></h1>

    <div class="boton">
        <p>
            <!-- Creo el boton para reiniciar la pagina -->
            <a href="index.php?action=Reiniciar" title="Reiniciar">
            Reiniciar sesion</a>
        </p>
    </div>

    <ul class="cabecera">
        <!-- Colocamos el titulo y las flechas -->
        <li>Foto</li>
        <li>Nombre
            <a href="index.php?action=OrdenarAsc1">
                <span class="lnr lnr-arrow-down"></span>
            </a>
            <a href="index.php?action=OrdenarDesc1">
                <span class="lnr lnr-arrow-up"></span>
            </a>
        </li>
        <li>Apellidos
            <a href="index.php?action=OrdenarAsc2">
                <span class="lnr lnr-arrow-down"></span>
            </a>
            <a href="index.php?action=OrdenarDesc2">
                <span class="lnr lnr-arrow-up"></span>
            </a>
        </li>

        <li>Nacionalidad</li>

        <li>Fecha de nacimiento
            <a href="index.php?action=OrdenarAsc3">
                <span class="lnr lnr-arrow-down"></span>
            </a>
            <a href="index.php?action=OrdenarDesc3">
                <span class="lnr lnr-arrow-up"></span>
            </a>
        </li>

        <li>Acciones</li>
    </ul>

    <?php foreach ($_SESSION['actores'] as $key => $row){

        //Creo colores aleatorios
        $_SESSION['r'] = mt_rand( 170, 200 );
        $_SESSION['g'] = mt_rand( 70, 100 );
        $_SESSION['b'] = mt_rand( 0, 30 );
        $_SESSION['a'] = '0.4';

        //Uno los coles en el rgb
        $_SESSION['color'] = 'rgba('.$_SESSION['r'].','.$_SESSION['g'].','.$_SESSION['b'].','.$_SESSION['a'].')';

        ?>

        <ul style="background-color: <?php echo $_SESSION['color']?>">
            <li>
                <img class="img1" src="<?php echo $row['imagen'] ?>" alt="<?php echo $row['nombre'] ?>">
            </li>
            <!-- Imprimimos los datos por pantalla -->
            <li><?php echo $row['nombre'] ?></li>
            <li><?php echo $row['apellidos'] ?></li>
            <li><?php echo $row['nacionalidad'] ?></li>
            <li><?php echo $row['fecha de nacimiento']->format("d/m/Y") ?></li>
            <li>
                <!-- Boton de ver -->
                <a href="ver.php?id=<?php echo $key ?>" alt="<?php echo $row ?>" title="Ver">
                    <span class="lnr lnr-eye"></span>
                </a>
                <!-- Boton para editar -->
                <a href="editar.php?id=<?php echo $key ?>" title="Editar">
                    <span class="lnr lnr-pencil"></span>
                </a>
                <!-- Boton para borrar -->
                <a href="index.php?action=Borrar&id=<?php echo $key ?>" title="Borrar">
                    <span class="lnr lnr-trash"></span>
                </a>
            </li>
        </ul>
    <?php } ?>

</body>
</html>








