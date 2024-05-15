<?php
include_once("./controlacceso.php");

#print_r($_GET);
#echo"<br>";
#print_r($_COOKIE);
#echo "<br>";
#print_r($_SESSION);
#echo "<br>";

#––––––––––––––––––––COOKIE––––––––––––––––––
#Datos Basicos
#Primer Ingreso -- Envio de Datos por POST
if (isset($_POST["nombre"]) && isset($_POST["clave"])){
    $nombre = $_POST["nombre"];
    $clave = $_POST["clave"];
    $preferencias = isset($_POST["chkpreferencias"])? $_POST["chkpreferencias"] : "";
}
#Cualquier otro ingreso con cookies
else if (isset($_COOKIE["c_preferencias"]) && $_COOKIE["c_preferencias"] != ""){
    $nombre = $_COOKIE["c_nombre"];
    $clave = $_COOKIE["c_clave"];
    $preferencias = $_COOKIE["c_preferencias"];
}
##### No se define el caso de que no se usa cookies ya que no es necesario

#Datos de Lenguaje
#Setear el lenguaje usando GET
if (isset($_GET["lenguaje"])){
    $lenguaje = $_GET["lenguaje"];
}
# Setear el lenguaje usando las cookies para iniciar en el idioma que se dejó
else if (isset($_COOKIE["c_lenguaje"])){
    $lenguaje = $_COOKIE["c_lenguaje"];
}
# Primer ingreso, No se usa ni GET ni COOKIES(No seteada aun)
else{
    $lenguaje = "ES";
}


#Setear cookies
# Checkbox es seleccionado
if ($preferencias != "") {
    setcookie("c_nombre",$nombre, 0);
    setcookie("c_clave",$clave, 0);
    setcookie("c_preferencias",$preferencias, 0);
    setcookie("c_lenguaje",$lenguaje, 0);
}
# No guarda cookie 
else{
    //si existen cookies, las borro
    if (isset($_COOKIE)) {
        foreach($_COOKIE as $key => $value) {
            setcookie($key,"");
        }
    }
}

#––––––––––SESION––––––––––––

#Primer ingreso
    if ($_POST["nombre"]=="jona" && $_POST["clave"] == "jona123"){
        $_SESSION["nombre"] = $_POST["nombre"];
        $_SESSION["clave"] = $_POST["clave"];
        include_once("redirigir.php");
    }else if (isset ($_SESSION["nombre"]) && isset($_SESSION["clave"])){
        include_once("redirigir.php");
    }else {
        header("Location: index.php");
    }
/*
# Cualquier otro ingreso con sesion creada
#if (isset($_SESSION["nombre"]) && isset($_SESSION["clave"])){
else if (isset ($_SESSION["nombre"]) && isset($_SESSION["clave"])){
        include_once("redirigir.php");
    }else {
        header("Location: index.php");
    }
*/

?>