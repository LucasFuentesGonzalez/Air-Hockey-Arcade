<?php

$jugador = 1; //Elige un numero entre 1 y 5
$maquina = (rand(1, 5));

if ((($jugador+$maquina) % 2) == 0){
    echo "Gana el jugador<br>";
}else{
    echo "Gana la maquina<br>";
}

echo "El jugador saco un: ".$jugador."<br>";
echo "La maquina saco un: ".$maquina."<br>";



echo "<br>";
echo"<br>";
echo"<br>";





$lanzamiento = 34; //Elige un numero entre 0 y 50
$viento = (rand(0, 50));
$resultado = $lanzamiento + $viento;

if (($resultado < 50 and $resultado > 40) or
    ($resultado > 50 and $resultado < 60)){
    echo $resultado." Ha estado cerca, prueba otra vez<br>";
}elseif ($resultado == 50){
    echo $resultado." ¡Enhorabuena, acertaste!<br>";
}else{
    echo $resultado." Not even close baby<br>";
}

echo "Lanzaste con ".$lanzamiento." pts de fuerza"."<br>";
echo "¡OH NO! el viento te desvio ".$viento."<br>";



?>