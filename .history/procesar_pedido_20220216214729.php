<?php
// comprueba que el usuario haya abierto sesion o redirige
require 'correo.php';
require 'sesiones.php';
require_once 'bd.php';
comprobar_sesion();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
    <script src="src/components/header.js"></script>
    <script src="src/components/footer.js"></script>
    <title>Pedidos</title>
    
</head>
<body>
    <?php
    require 'cabecera.php';
    $resul = insertar_pedido ($_SESSION['carrito'],
    $_SESSION['usuario']['codRes']);
    if ($resul === FALSE){
        echo "No se ha podido realizar el pedido<br>";
    } 
    else{
        $correo = $_SESSION['usuario']['correo'];
        echo "Pedido realizado con éxito. Se enviará un correo de confirmación a: $correo ";
        $conf = enviar_correos($_SESSION['carrito'], $resul, $correo);
        if($conf!==TRUE){
            echo "Error al enviar: $conf <br>";
        };
        //vaciar carrito
        $_SESSION['carrito'] = [];

		}
    ?>
    
</body>
</html>