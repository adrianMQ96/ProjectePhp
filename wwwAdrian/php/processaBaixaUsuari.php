<?php

    $servidor = "localhost";
    $usuari = "projectes_Adrian";
    $contrasenya = "projectes_Adrian";
    $basedades = "projectes_Adrian";

    $connexio = mysqli_connect($servidor, $usuari, $contrasenya, $basedades);

    if (!$connexio) {
        die ("Error de connexió: ".mysqli_connect_error ());
    }

    session_start();
    $Email = $_POST['email'];
    $Rol = $_POST['rol'];

    $tipus = ""
    if($Rol == "ROL_ALUMNAT"){
        $tipus ="alumnat";
    }

    $sqlInsert = "DELETE FROM `$tipus` WHERE `email` = '$Email'";
    
    
    

        if (mysqli_query($connexio, $sqlInsert)) {

            $dia = date("Y")."/".date("n")."/".date("j");
            $hora = date("G").":".date("i").":".date("s");
            $fp = fopen("../log/registre.log","a");
            fputs($fp, "Usuari donat de baixa: $Email - $Rol - Dia: $dia - Hora: $hora \n");
            fclose($fp);
            
            
            echo "Usuari borrat".$ultim_id;
            session_destroy();
            header("Location: ../index.php");
        } else {
            
            echo "Error: <br/>" . mysqli_error ($connexio);
        }

    
?>