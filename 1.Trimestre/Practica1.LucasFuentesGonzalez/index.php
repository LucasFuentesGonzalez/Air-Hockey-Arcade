<?php
//Declaramos el array de los dias de la semana.
$semana = ['Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab', 'Dom'];

//Declaramos el array de los dias de la semana.
$dias = array (1 => 31, 28, 31, 30, 31, 30, 31, 30, 31, 30, 31, 30);

//Declaramos el array de los meses del año.
$meses =array (
    1 => 'Enero',
    'Febrero',
    'Marzo',
    'Abril',
    'Mayo',
    'Junio',
    'Julio',
    'Agosto',
    'Septiembre',
    'Octubre',
    'Noviembre',
    'Diciembre'
);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Calendario 2021</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
    <body>
        <div class="cuadrado"> <!-- Creamos una clase para encuadrar el calendario -->
        <h1>Calendario 2021</h1>
        <?php foreach ($meses as $num_mes => $nombre_mes){ ?> <!-- Creamos una clase para encuadrar el calendario -->

            <div class="cajas"> <!-- Creamos una clase para gestionar las cajas -->
                <h3><?php echo $nombre_mes ?></h3><!-- Llamamos al array mes -->
                <table>
                    <tr>
                        <?php foreach ($semana as $sem){ ?>
                            <th><?php echo $sem ?></th> <!-- Llamamos al array semana -->
                        <?php } ?>
                    </tr>

                    <tr>
                        <?php for ($i=1; $i <= $dias[$num_mes]; $i++){?> <!-- Imprimimos los numeros -->
                            <td><?php echo $i ?></td>
                        <?php
                            if($i%7==0){ /* Cada vez que el bucle recorra siete numeros creara otra linea */
                                echo "<tr></tr>";
                            }
                        }?>
                    </tr>
                </table>
            </div>
        <?php } ?>
        </div>
    </body>
</html>

