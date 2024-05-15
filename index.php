<?php
#––––––––––––––Llenar Datos–––––––––––––––––
$preferencias = false;
$nombre = "";
$clave = "";
if (isset($_COOKIE["c_preferencias"]) &&
    $_COOKIE["c_preferencias"] != "") {
        $preferencias = true;
        $nombre = $_COOKIE["c_nombre"];
        $clave = $_COOKIE["c_clave"];
}

#print("GET:");
#print_r($_GET);
#echo"<br>";
#print("COOKIE: $_COOKIE");
#print_r($_COOKIE);
#echo "<br>";
#print("SESION:");
#print_r($_SESSION);
#echo "<br>";


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>
    <!-- Formulario HTML-->
    <form action="cookiesesion.php" method="POST">
    <h1>LOGIN</h1>
        <label for="txtNombre">Nombre:</label><br>
        <input id="txtNombre" type="text" name="nombre" required value="<?php echo ($nombre) ?>"/><br>
        <label for="txtClave">Clave:</label><br>
        <input id="txtClave" type="password" name="clave" required value="<?php echo ($clave) ?>"/><br>
        <br>
        <input type="checkbox" name="chkpreferencias" <?php echo($preferencias)? "checked": "" ?>> Recordarme
        <br>
        <input type="submit" name="btnEnviar" />
    </form>
</body>

</html>