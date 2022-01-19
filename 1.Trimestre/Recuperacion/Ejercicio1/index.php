<?php

session_start();

//Reniciar sesión
if (isset($_GET['action']) && $_GET['action'] == "Reiniciar"){
    session_destroy();
    session_start();
    setcookie("busqueda","",-1);
    header("Location: tienda.php");
}


$lorem = "Lorem ipsum dolor sit amet consectetur adipiscing elit. Suspendisse eget arcu vitae tellus lacinia ullamcorper. Quisque dapibus vel sapien 
in euismod etiam eu fermentum nisl integer non nunc elit. Nullam vestibulum tortor dictum nunc blandit convallis. Fusce euismod 
pharetra ullamcorper Sed mollis efficitur orci quis ullamcorper. Cras tristique ipsum ac dictum lacinia quam augue sollicitudin turpis 
ac ultrices ex sapien non metus. Donec in ipsum ullamcorper ornare dui quis semper est. Morbi justo ipsum iaculis elementum tortor a ultrices 
dictum metus. Pellentesque dui urna suscipit non venenatis ac aliquam euismod felis. Nullam mauris quam faucibus quis elementum non iaculis 
in quam. Curabitur sed sem a velit posuere euismod sed non urna. In eget lectus finibus congue dui ut fringilla leo. Pellentesque tempus 
odio ut pellentesque porttitor justo sem aliquet lectus in volutpat nunc sapien nec nulla. Vivamus ultricies a odio ac auctor. Sed id 
lacus tincidunt hendrerit augue quis consequat ligula. Vestibulum blandit felis eget imperdiet viverra aliquam erat volutpat nulla accumsan ex eget rutrum blandit. 
Mauris in sem ultrices dictum est luctus iaculis tortor. Aliquam a nisl non tortor ultricies dapibus fermentum ac diam. In hendrerit dui 
sit amet consequat fringilla donec viverra est vitae lacus mattis vel convallis.";



?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ejercicio 1</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <h1>Ejercicio 1</h1>
    <p>
        <a href="index.php?action=Reiniciar" title="Reiniciar">Reiniciar sesión</a>
    </p>

    <form name="buscar">
        <input type="text" name="texto" value="">
        <input type="submit" name="buscar" value="Buscar"><br><br>
        <textarea name="comentario" rows="20" cols="70"><?php echo $lorem ?></textarea> <br><br>
    </form>

    <?php
        if(isset($_GET['buscar'])){
            //Recogemos la palabra introducida
            $_SESSION['busq'] = filter_input(INPUT_GET, 'texto', FILTER_SANITIZE_STRING);
            $_SESSION['busqueda'] = $_SESSION['busq'];
            //Almacena la cookie 1 día
            setcookie("busqueda", $_SESSION['busq'], time() + 86400);

            //Recogemos el parrafo introducido
            $_SESSION['texto'] = filter_input(INPUT_GET, 'comentario', FILTER_SANITIZE_STRING);
            $_SESSION['palabras'] = explode(" ", $_SESSION['texto']);

            //Imprimimos el nuevo texto
            foreach ($_SESSION['palabras'] as $key => $row) {
                if ($_SESSION['busq'] != $_SESSION['palabras'][$key]) {
                    echo $_SESSION['palabras'][$key] . " ";
                }
                if ($_SESSION['busq'] == $_SESSION['palabras'][$key]) {?>
                    <span class="destacar">
                    <?php echo $_SESSION['palabras'][$key];?>
                    </span>
                <?php }
            }
        }
    ?>
</body>