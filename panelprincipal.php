<?php

include_once ("./controlacceso.php");

#print("GET:");
#print_r($_GET);
#echo"<br>";
#print("COOKIE:");
#print_r($_COOKIE);
#echo "<br>";
#print("SESION:");
#print_r($_SESSION);
#echo "<br>";

$lenguaje = $_GET["lenguaje"];


if ($lenguaje == "EN") {
    $encabezado = "Product List";
    $archivo = "categorias_en.txt";
} else {
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
    <link rel="stylesheet" href="estilos.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        h1,
        h2,
        h3 {
            text-align: center;
        }

        h1 {
            color: #333;
        }

        h2 {
            margin-top: 20px;
            margin-bottom: 10px;
        }

        h3 {
            margin-top: 20px;
            color: #666;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 10px;
        }

        a {
            text-decoration: none;
            color: #007bff;
        }

        a:hover {
            text-decoration: underline;
        }

        .lang-links {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>PANEL PRINCIPAL</h1>
        <h2>Bienvenido Usuario: <?php echo $_SESSION["nombre"] ?></h2>
        <hr>
        <div class="lang-links">
        <a href="cookiesesion.php?lenguaje=ES">ES (Español)</a>
        <a href="cookiesesion.php?lenguaje=EN">EN (English)</a>
        </div>
        <br>
        <a href="cerrarsesion.php">Cerrar Sesion</a>
        <br>
        <h2><?php echo $encabezado; ?></h2>
        <p><?php echo "<pre>$contenido</pre>"; ?></p>
    </div>
</body>

</html>