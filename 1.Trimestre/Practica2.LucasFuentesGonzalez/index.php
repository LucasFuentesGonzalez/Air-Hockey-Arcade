<?php
$HEXA= ""; $R=""; $G=""; $B=""; $array="";

//Funcion para boton1
if(isset($_GET['enviar1'])){

    $HEXA = filter_input(INPUT_GET, 'HEXA', FILTER_SANITIZE_STRING);//Guardamos el hexadecimal
}

//Funcion para boton2
if(isset($_GET['enviar2'])){

    $R = filter_input(INPUT_GET, 'R', FILTER_SANITIZE_STRING);//Guardamos el color rojo
    $G = filter_input(INPUT_GET, 'G', FILTER_SANITIZE_STRING);//Guardamos el color verde
    $B = filter_input(INPUT_GET, 'B', FILTER_SANITIZE_STRING);//Guardamos el color azul
}

?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Carta de colores</title>
    <link rel="shortcut icon" href="img/icono.png">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <h1>Conversor de colores</h1>

    <div class="hexadecimal">
        <h3>Codigo Hexadecimal</h3>
        <div>
            <form action="index.php" method="GET">
                HEXA: <input type="text" name="HEXA"><br><br>
                <input type="submit" name="enviar1" value="Busca color"><br><br>
            </form>
        </div>
    </div>

    <div class="paleta" style="background-color: <?php echo '#' . $HEXA?>">
        <div class="calculo">
            <?php //en caso de que pulsemos el boton1 sucedera lo siguiente
                if(isset($_GET['enviar1'])){
                    //Sacamos el codigo hexadecimal
                    echo "#".$HEXA."<br>";

                    //Sacamos el codigo rgb convertido de hexadecimal
                    $array = sscanf($HEXA,"%c %c %c %c %c %c %c %c %c");
                    //$array = str_split($HEXA); //Forma 2
                    $R = $array[0].$array[1];
                    $G = $array[2].$array[3];
                    $B = $array[4].$array[5];
                    echo "rgb(".(hexdec($R)).",".(hexdec($G)).",".(hexdec($B)).")";

                    //Otra forma de hacerlo, (no funciona)
                    /*list($R, $G, $B) = sscanf($HEXA, "#%02x%02x%02x");
                    echo "rgb(".$R.",".$G.",".$B.")"."<br>";*/
                }
            ?>
        </div>
    </div>



    <div class="RGB">
        <h3>Codigo RGB</h3>
        <div>
            <form action="index.php" method="GET">
                R: <input type="text" name="R"><br><br>
                G: <input type="text" name="G"><br><br>
                B: <input type="text" name="B"><br><br>
                <input type="submit" name="enviar2" value="Busca color"><br><br>
            </form>
        </div>
    </div>

    <div class="paleta2" style="background-color: rgb(<?php echo ($R.', '. $G.', '.$B)?>);">
        <div class="calculo">
            <?php
                if(isset($_GET['enviar2'])) {
                    //Sacamos el codigo rgb
                    echo "rgb(".$R.",".$G.",".$B.")"."<br>";

                    //Sacamos el codigo hexadecimal convertido de rgb
                    $HEXA = sprintf("%02x%02x%02x", $R,$G,$B);
                    echo "#".$HEXA."<br>";

                    //Segunda forma de transformar decimal a hexadecimal
                    /*
                    $HEXA = dechex($R) . dechex($G) . dechex($B);
                    echo "#".$HEXA."<br>";
                    */
                }
            ?>
        </div>
    </div>
    <div class="color"><input type="color"></div>

</body>
</html>