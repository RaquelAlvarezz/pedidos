<?php
//comprueba que el usuario haya abierto sesión o redirige
require 'sesiones.php';
require_once 'bd.php';
comprobar_sesion();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> 
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script src="src/components/header.js"></script>
    <script src="src/components/footer.js"></script>
    <title>Lista de Categorías</title>
</head>
<header-component></header-component>
<body>
    <?php 
    require 'cabecera.php'; ?>
    <h1>Lista de categorías</h1>
    <!--lista de vínculos con la forma de productos.php?categoria=1-->

    <?php
    $categorias = cargar_categorias();
    if ($categorias === FALSE) {
        echo "<p class='error'>Error al conectar con la base de datos</p>";
    } else {
        echo "<ul>"; //abrir la lista
        foreach ($categorias as $cat) {
            //$cat['nombre] $cat['codCat']
            $url = "productos.php?categoria=" . $cat['codCat'];
            echo "<li class='lista'><a href='$url'>" . $cat['nombre'] . "</a></li>";
        }
        echo "</ul>";
    }
    ?>
    <footer-component></footer-component>
</body>
</html>