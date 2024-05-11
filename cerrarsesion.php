<?php

include_once("./controlacceso");

session_destroy();
header("Location: index.php");

?>