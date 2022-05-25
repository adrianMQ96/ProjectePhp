<?php

session_start();
$Email = $_SESSION["usuari"];
$rol = $_SESSION["rol"];

$dia = date("Y")."/".date("n")."/".date("j");
        $hora = date("G").":".date("i").":".date("s");
        $fp = fopen("../log/registre.log","a");
        fputs($fp, "Logout: $Email - $rol - Dia: $dia - Hora: $hora \n");
        fclose($fp);
session_destroy();
header("Location: ../index.php");
?>