
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, "
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" text="text/css" href="css/style.css">
    <title>Ejercicio 11</title>

</head>
<body>
    <h1>Ejercicio 11</h1>

    <p>Genera un número aleatorio de 10 dígitos y, mediante un formulario
        que solo admita un número del 0 al 9 cada vez, desarrolla la lógica
        necesaria para que se vaya adivinando (y mostrando) el número.
        Debes llevar además la cuenta de los errores cometidos (dígitos
        no incluidos en el número aleatorio)</p>

    <?php
        //Inicio la sesion
        session_start();

        //Boton de reiniciar
        if (isset($_GET['reiniciar'])){
            session_destroy();
            session_start();
        }



        //Si no esta generando el numero, lo genero y lo almaceno en sesion
        if (!isset($_SESSION['numero'])){
            //numero aleatorio de 10 digitos
            $_SESSION['numero'] = rand(1000000000,9999999999);

            //Convierto el numero en un array
            $_SESSION['original'] = str_split($_SESSION['numero'],1);

            //Genero el array de asteriscos
            $_SESSION['resuelto'] = [];
            for ($i = 0; $i < 10; $i++){
                $_SESSION['resuelto'][] = "*";
            }

            //Inicializo variables para los errores
            $_SESSION['errores'] = 0; //numero de errores
            $_SESSION['erroneos'] = []; //array de digitos erroneos

            //Array de colores
            $_SESSION['colores'] = [
                'rgb(0, 255, 0, 0.3)',
                'rgb(255, 0, 0, 0.3)',
                'rgb(255, 196, 0, 0.3)',
                'rgb(255, 89, 0, 0.3)',
                'rgb(255, 150, 0, 0.3)',
                'rgb(255, 0, 0, 0.3)',

            ];

        }

        //Recojo el numero del formulario
        if(isset($_GET['digito'])){
            //Booleano para ver si hay error
            $acierto = false;
            //Recorro el array del numero original
            foreach ($_SESSION['original'] as $indice => $valor){
                //Si coinciden el valor y el numero introducido
                if($valor == $_GET['digito']){
                    //Asigno el valor de ese indice al array de asteriscos
                    $_SESSION['resuelto'][$indice] = $valor;
                    //No hay error
                    $acierto = true;
                }
            }

            //Si no ha habido acierto, es un error
            if (!$acierto){
                //Incremento numero de errores
                $_SESSION['errores']++;
                //Añado el digito al array de erroneos (si no estaba ya)
                if (!in_array($_GET['digito'],$_SESSION['erroneos'])){
                    array_push($_SESSION['erroneos'],$_GET['digito']);
                }
            }
        }


     ?>

    <p>
        Numero generado: <strong><?php echo $_SESSION['numero'] ?></strong>
    </p>
    <p>
        Numero adivinado: <strong><?php echo implode("",$_SESSION['resuelto']) ?></strong>
    </p>
    <p>
        Numero erroneos: <strong><?php echo implode(", ",$_SESSION['erroneos']) ?></strong>
    </p>
    <p>
        Errores cometidos: <strong><?php echo $_SESSION['errores'] ?></strong>
    </p>

    <form>
        <input type="submit" name="reiniciar" value="Reiniciar">
    </form>
    <div style="background-color: <?php echo $_SESSION['colores'] ?>"></div>

    <?php if (in_array("*", $_SESSION['resuelto']) && $_SESSION['errores'] < 5){ ?>
        <form name="enviar">
            <p>
                Introduce un digito del 0 al 9:
                <input type="number" min="0" max="9" name="digito" onkeyup="enviar.submit()">
            </p>
        </form>
    <?php } else if ($_SESSION['errores'] == 5) { ?>
            <strong>¡HAS PERDIDO!</strong>

    <?php } else { ?>
        <p>
            <strong>¡HAS COMPLETADO EL NUMERO!</strong>
        </p>
    <?php } ?>


</body>
</html>
