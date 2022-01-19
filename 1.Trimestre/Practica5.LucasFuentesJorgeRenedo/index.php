<?php

    if(isset($_POST['Confirmar'])) { //Guardamos los inputs en estas variables
        $nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
        $apellido = filter_input(INPUT_POST, 'apellido', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
        $telefono = filter_input(INPUT_POST, 'telefono', FILTER_SANITIZE_STRING);
        $postal = filter_input(INPUT_POST, 'postal', FILTER_SANITIZE_STRING);
        $ciudad = filter_input(INPUT_POST, 'ciudad', FILTER_SANITIZE_STRING);
        $domicilio = filter_input(INPUT_POST, 'domicilio', FILTER_SANITIZE_STRING);
        $contrasena = filter_input(INPUT_POST, 'contraseña', FILTER_SANITIZE_STRING);
        $web = filter_input(INPUT_POST, 'web', FILTER_SANITIZE_STRING);
    }

    //Comprobamos que se cumplan las condiciones
    $re1 = preg_match("/[0-9]/",$nombre);//Patron para comprobar si contiene numeros
    $re2 = preg_match("/[0-9]/",$apellido);//Patron para comprobar si contiene numeros
    $re3 = preg_match("/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-ZÑa-zñ]+$/",$email);//Patron para comprobar el email
    $re4 = preg_match("/^([0-9]{9,9})$/",$telefono);//Patron para comprobar el telefono
    $re5 = preg_match("/^([0-9]{5,5})$/",$postal);//Patron para comprobar el codigo postal
    $re6 = preg_match("/[0-9]/",$ciudad);//Patron para comprobar si contiene numeros
    $re7 = preg_match("/[A-Za-zÑn]/",$domicilio);//Patron para que aparezcan letras
        //Patron para que aparezcan entre o 8 y 16 caracteres, almenos un numero, una mayusculam una minuscula y un caracter
    $re8 = preg_match("/((?=.*?[A-ZÑ])(?=.*?[a-zñ])(?=.*?[0-9])(?=.*?[^A-Za-z0-9])).{8,16}/",$contrasena);
        //Patron para comprobar una direccion web
    $re9 = preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|](\.)[a-z]{2}/i",$web);


    //Declaramos las variables para mostrar los errores
    $error_nombre = " ";
    $error_apellidos = " ";
    $error_email = " ";
    $error_telefono = " ";
    $error_postal = " ";
    $error_ciudad = " ";
    $error_domicilio = " ";
    $error_contrasena = " ";
    $error_web = " ";

    //En caso de que se cumplan las codiciones mostraremos los siguientes mensajes
    if(isset($_POST['Confirmar'])) {
        if ($re1 == 1){$error_nombre = "*Solo puedes introducir letras<br>";}
        if ($re2 == 1){$error_apellidos = "*Solo puedes introducir letras<br>";}
        if ($re3 == 0){$error_email = "*Introduce un email válido<br>";}
        if ($re4 == 0){$error_telefono = "*Debes introducir 9 numeros<br>";}
        if ($re5 == 0){$error_postal = "*Solo se permiten 5 numeros en estes campo<br>";}
        if ($re6 == 1){$error_ciudad = "*Solo puedes introducir letras<br>";}
        if ($re7 == 0){$error_domicilio = "*Solo puedes introducir letras<br>";}
        if ($re8 == 0){$error_contrasena = "*Debes introducir una contraseña de entre 8 a 16 caracteres con almenos una mayuscula, una minuscula, un numero y un caracter especial<br>";}
        if ($re9 == 0){$error_web = "*Introduce un link válido<br>";}

        //En caso de que no rellenen los inputs apareceran los siguientes errores
        if (empty($nombre)){$error_nombre = "*Introduce un nombre<br>";}
        if (empty($apellidos)){$error_apellidos = "*Introduce un apellido<br>";}
        if (empty($email)){$error_email = "*Introduce un email<br>";}
        if (empty($telefono)){$error_telefono = "*Introduce un telefono<br>";}
        if (empty($postal)){$error_postal = "*Introduce un codigo postal<br>";}
        if (empty($ciudad)){$error_ciudad = "*Introduce una ciudad<br>";}
        if (empty($domicilio)){$error_domicilio = "*Introduce un domicilio<br>";}
        if (empty($contrasena)){$error_contrasena = "*Introduce tu contraseña<br>";}
        if (empty($web)){$error_web = "*Introduce una web<br>";}
    }

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login Santander</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" type="image/x-icon" href="https://i.imgur.com/NY1I7v3.png" />
</head>
<body>
<!--Añadimos el logo de santander-->
<img class="santander" src="https://i.imgur.com/R0A5EZP.png" alt="Logo Banco Santander">

<div id="contenedor">
    <div class="header">
        <h1>¡Bienvenido a Banco Santander!</h1>

        <form action="index.php" method="post">

            <div class="interior">
                <label for="nombre">Nombre:</label>
                <input class="input" type="text" id="nombre" name="nombre" placeholder="Inserte su nombre">
                <p class="error"><?php echo $error_nombre ?></p><!--Mostramos el error de nombre-->
            </div>


            <div class="interior">
                <label for="apellido">Apellidos:</label>
                <input class="input" type="text" id="apellido" name="apellido" placeholder="Inserte su apellido">
                <p class="error"><?php echo $error_apellidos ?></p><!--Mostramos el error de apellidos-->
            </div>

            <div class="interior">
                <label for="email">Email:</label>
                <input class="input" type="email" id="email" name="email" placeholder="Inserte su email">
                <p class="error"><?php echo $error_email ?></p><!--Mostramos el error de email-->
            </div>

            <div class="interior">
                <label for="telefono">Telefono:</label>
                <input class="input" type="tel" id="telefono" name="telefono" placeholder="Inserte su telefono">
                <p class="error"><?php echo $error_telefono ?></p><!--Mostramos el error de telefono-->
            </div>

            <div class="interior">
                <label for="postal">Código Postal:</label>
                <input class="input" type="text" id="postal" name="postal" placeholder="Inserte su Código Postal">
                <p class="error"><?php echo $error_postal ?></p><!--Mostramos el error de codigo postal-->
            </div>

            <div class="interior">
                <label for="ciudad">Ciudad:</label>
                <input class="input" type='text' id="ciudad" name="ciudad" placeholder="Inserte su ciudad">
                <p class="error"><?php echo $error_ciudad ?></p><!--Mostramos el error de ciudad-->
            </div>

            <div class="interior">
                <label for="domicilio">Domicilio:</label>
                <input class="input" type='text' id="domicilio" name="domicilio" placeholder="Inserte su domicilio">
                <p class="error"><?php echo $error_domicilio ?></p><!--Mostramos el error de domicilio-->
            </div>

            <div class="interior">
                <label for="contraseña">Contraseña:</label>
                <input class="input" type="text" id="contraseña" name="contraseña" placeholder="Inserte su contraseña">
                <p class="error"><?php echo $error_contrasena ?></p><!--Mostramos el error de contrasena-->
            </div>

            <div class="interior">
                <label for="web">Web:</label>
                <input class="input" type="url" id="web" name="web" placeholder="Inserte web">
                <p class="error"><?php echo $error_web ?></p><!--Mostramos el error de web-->
            </div><br>

            <div class="interior" style="margin-left: 40px;">
                <label for="provincia">Provincia:</label>
                <select class="input" name="provincia" style="margin-left: 25px;">
                    <option value="Seleccione provincia">Seleccione provincia</option>
                    <?php
                    $lineas=file_get_contents("archivo.txt");//Indicamos cual es nuestro fichero con las provincias
                    $provincias=explode("\n",$lineas);
                    //Mediante un foreach sacamos y mostramos las provincias con su codigo
                    foreach($provincias as $provincia){
                        $opciones.='<option value="'.$provincia.'">'.$provincia.'</option>';
                    }
                    echo $opciones;//Imprimimos las provincias en el select
                    ?>
                    </option>
                </select>
            </div><br><br>
            <!--Creamos el boton para enviar el formulario-->
            <input class="enviar" type="submit" name="Confirmar" value="Confirmar">
        </form>

    </div>
</div>

</body>
</html>
