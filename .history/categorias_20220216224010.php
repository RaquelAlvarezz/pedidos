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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> 
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
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