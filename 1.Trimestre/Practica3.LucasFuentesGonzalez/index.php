<?php
    //Inicio la sesión
    session_start();

    //Botón de reiniciar
if (isset($_GET['reiniciar'])){
    session_destroy();
    session_start();
}



if (!isset($_SESSION['palabra'])){

    $_SESSION['palabras'] = ["uno", "dos", "tres", "cuatro", "cinco", "seis", "siete", "ocho", "nueve", "diez"];

    //Consigo un numero
    $_SESSION['numero'] = array_rand($_SESSION['palabras']);

    //Saco una palabra del array
    $_SESSION['palabra'] = $_SESSION['palabras'][$_SESSION['numero']];

    //Descompongo la palabra en letras
    $_SESSION['descompuesto'] = str_split($_SESSION['palabra'],1);

    //Compruebo el numero de letras de la palabra
    $_SESSION['num_letras'] = strlen($_SESSION['palabra']);




    //Genero el array de barra bajas
    $_SESSION['resuelto'] = [];
    for ($i = 0; $i < $_SESSION['num_letras']; $i++){
        $_SESSION['resuelto'][] = "_ ";
    }

    //Inicializo variables para los errores
    $_SESSION['errores'] = 6;   //número de errores
    $_SESSION['erroneos'] = []; //array de dígitos erróneos

}

    $_SESSION['imagenes'] = [
            'img/6vida.png',
            'img/5vida.png',
            'img/4vida.png',
            'img/3vida.png',
            'img/2vida.png',
            'img/1vida.png',
            'img/caja.png',
    ];




//Recojo la letra del formulario
if(isset($_GET['letra'])){
    //Booleano para ver si hay error
    $acierto = false;
    //Recorro el array de la palabra elegida
    foreach ($_SESSION['descompuesto'] as $indice => $valor){
        //Si coinciden el valor y la letra introducida
        if ($valor == $_GET['letra']){
            //Asigno el valor de ese índice al array de barra bajas-
            $_SESSION['resuelto'][$indice] = $valor;
            //No hay error
            $acierto = true;
        }
    }
    //Si no ha habido acierto, es un error
    if (!$acierto){
        //Incremento número de errores
        $_SESSION['errores']--;
        //Añado el dígito al array de erróneos (si no estaba ya)
        if (!in_array($_GET['letra'],$_SESSION['erroneos'])){
            array_push($_SESSION['erroneos'],$_GET['letra']);
        }
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Ahorcado</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <h1>EL JUEGO DEL AHORCADO</h1>

    <div class="caja1">
        <?php if (in_array("_ ", $_SESSION['resuelto']) && $_SESSION['errores'] > 0){ ?>
            <form action="index.php" method="GET" name="formulario">
                <p>
                    <input type="text" name="letra" maxlength="1" pattern="[A-Za-z]{1}"
                           placeholder="Introduce una letra" onkeyup="formulario.submit()">
                </p>
            </form>
        <?php } else if ($_SESSION['errores'] <= 0) { ?>
            <strong>¡HAS PERDIDO!</strong><br>

        <?php } else { ?>
            <p>
                <strong>¡HAS GANADO!</strong><br>
            </p>
        <?php } ?>

        <form>
            <input type="submit" name="reiniciar" value="Reiniciar">
        </form>
    </div>



    <div class="caja2">
        <p>
            Palabra adivinada: <strong><?php echo implode("", $_SESSION['resuelto']) ?></strong>
        </p>
        <p>
            Vidas: <strong><?php echo $_SESSION['errores'] ?></strong>
        </p>
    </div>



    <div class="caja3">
        <p>
            Letras erroneos: <strong><?php echo implode(", ", $_SESSION['erroneos']) ?></strong>
        </p>

    </div>

    <img class="persona" src="<?php  echo $_SESSION['imagenes'][$_SESSION ['errores']] ?>"

</body>
</html>


