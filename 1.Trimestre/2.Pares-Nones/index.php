<?php

/*if (isset($_GET ['boton'])){
    $boton = $_GET ['boton'];

}else {
    $boton = null;
}*/
/*$boton = $_GET ['boton'] ?? null;
    if ($boton){
        echo " Has pulsado".$boton;
    }*/

$boton = $_GET ['boton'] ?? null;
    if ($boton) {
        $texto = "Tu has elegido "."<strong>".$boton."</strong><br>";
        $maquina = rand(1, 5);
        $texto = "La maquina ha elegido "."<strong>".$maquina."</strong><br>";
        $suma = $boton + $maquina;
        if ($suma % 2 == 0){
            $texto = "El Jugador Gana";
        }else{
            $texto = "La Maquina Gana";
        }

    }
    /*Modo PRO
     $texto = (suma % 2 == 0) ? "El Jugador Gana" : "La Maquina Gana";
     */



?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Pares o Nones</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>

    <body>
        <h1>Pares o Nones</h1>
        <?php if ($boton){ ?>
            <p>
            <?php echo $texto?>
            </p>
            <p>
                <a href="index.php">Volver a jugar</a>
            </p>
        <?php } else{ ?>

        <p> Tu serás nones y la máquina pares, escoge
            un numero para continuar, ¡Mucha suerte!</p>

        <form>
            <input type="submit" name="boton" value="1">
            <input type="submit" name="boton" value="2">
            <input type="submit" name="boton" value="3">
            <input type="submit" name="boton" value="4">
            <input type="submit" name="boton" value="5">
        <form>
            <?php } ?>
    </body>

</html>
