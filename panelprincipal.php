<?php
include_once("./controlacceso.php");

print("GET:");
print_r($_GET);
echo"<br>";
print("COOKIE:");
print_r($_COOKIE);
echo "<br>";
print("SESION:");
print_r($_SESSION);
echo "<br>";

$lenguaje = $_GET["lenguaje"];


if ($lenguaje == "EN") {
    $encabezado = "Product List";
    $archivo = "categorias_en.txt";
}else{
    $encabezado = "Lista de Productos";
    $archivo = "categorias_es.txt";
}
$contenido = file_get_contents($archivo);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Panel</title>
</head>
<body>
    <h1>Panel Principal</h1>
    <h3>Usuario Logueado: <?php echo $_SESSION["nombre"] ?> </h3>
    <hr>
    <a href="cookiesesion.php?lenguaje=ES">ES (Español)</a>
    <a href="cookiesesion.php?lenguaje=EN">EN (English)</a>
    <br>
    <a href="cerrarsesion.php">Cerrar Sesion</a>
    <br>
    <h2><?php echo $encabezado;?></h2>
    <p><?php echo "<pre>$contenido</pre>"; ?></p>
</body>
</html>