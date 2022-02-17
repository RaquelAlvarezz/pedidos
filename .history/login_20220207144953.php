<?php
require_once 'bd.php';
// formulario de login habitual. Si va bien abre la sesión, guarda el nombre de usuario
//  y redirige a principal.php. Si va mal, mensaje de error

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$usu = comprobar_usuario($_POST['usuario'], $_POST['clave']);
if($usu===FALSE){
    $err = TRUE;
    $usuario = $_POST['usuario'];
    }else{
        session_start();
        // $usu tiene campos correo y codRes, correo
        $_SESSION['usuario'] = $usu;
        $_SESSION['carrito'] = [];
        header("Location: categorias.php");
        return;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../scss/style.scss">
    <script src="./components/header.js" type="text/javascript" defer></script>
    <script src="./components/footer.js" type="text/javascript" defer></script>
    
</head>
<body>
<?php if (isset($_GET["redirigido"])){
    echo "<p>Haga login para continuar</p>";
} ?>
<?php if (isset($err) and $err == TRUE){
    echo "<p>Revise usuario y contraseña</p>";
}?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
    <label for="usuario">Usuario</label>
    <input value = "<?php if(isset($usuario))echo $usuario;?>"
    id="usuario" name="usuario" type="text">
    <label for = "clave">Clave</label>
    <input id="clave" name="clave" type="password">
    <input type="submit">
</form>
</body>
</html>