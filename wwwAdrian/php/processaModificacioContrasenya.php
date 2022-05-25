<?php

    $servidor = "localhost";
    $usuari = "projectes_Adrian";
    $contrasenya = "projectes_Adrian";
    $basedades = "projectes_Adrian";

    $connexio = mysqli_connect($servidor, $usuari, $contrasenya, $basedades);

    if (!$connexio) {
        die ("Error de connexió: ".mysqli_connect_error ());
    }

    $ContrasenyaActual = $_POST['contrasenyaActual'];
    $ContrasenyaNova = $_POST['contrasenyaNova'];
    $ContrasenyaConfirmar = $_POST['contrasenyaConfirmar'];

    $Email = $_POST['email'];
    $Rol = $_POST['rol'];
    $TipusUsuari= "";
    if($Rol == "ROL_ALUMNAT"){
        $TipusUsuari = "alumnat";
    }
    

    $Usuaris = strtolower($TipusUsuari);
    //$sql="SELECT * FROM $Usuaris WHERE correu = '".$Email."'";
    $sql="SELECT * FROM $Usuaris";
    $resultat = mysqli_query($connexio, $sql);

    $ContrasenyaEncriptada = "";

    while($row = mysqli_fetch_assoc($resultat)){
        $ContrasenyaEncriptada= $row["contrasenya"];
    }

    $sql1="SELECT * FROM $TipusUsuari WHERE email LIKE '$Email'";
    $resultat = mysqli_query($connexio, $sql1);
    
    $contrasenyaDes =password_verify($ContrasenyaActual,$ContrasenyaEncriptada);

    $sqlInsert ="";

    

    // Executem la instrucció, comprovant si hi ha hagut algun tipus d'error i si n'ha retornat més de 0
    if (mysqli_num_rows($resultat) > 0) {

        $opcions = [
            'cost' => 11,
        ];
        $ContrasenyaEncriptada= password_hash($ContrasenyaNova, PASSWORD_BCRYPT,$opcions)."\n";
        $ContrasenyaEncriptada= trim($ContrasenyaEncriptada);
    
        if ($contrasenyaDes){

            if($ContrasenyaNova == $ContrasenyaConfirmar ){
                $sqlInsert = "UPDATE alumnat SET contrasenya='$ContrasenyaEncriptada' WHERE email='$Email'";
            }else{
                header("Location: usuariRegistrat.php?errorCoincidir");
            }
            
        }else{
            header("Location: usuariRegistrat.php?errorCorrecta");
        }

        

        if (mysqli_query($connexio, $sqlInsert)) {
            $ultim_id = mysqli_insert_id($connexio);

            $dia = date("Y")."/".date("n")."/".date("j");
            $hora = date("G").":".date("i").":".date("s");
            $fp = fopen("../log/registre.log","a");
            fputs($fp, "Contrasenya Modificada: $Email - $Rol - Dia: $dia - Hora: $hora \n");
            fclose($fp);

            echo "La teua contrasenya s'han canviat correctament".$ultim_id;
            header("Location: usuariRegistrat.php?contrasenyaModificada");
        } else {
            echo "Error: ". $sql . "<br/>" . mysqli_error ($connexio);
        }

    } else {
        //no s'ha trobat cap resultat
        echo "0 resultats";
    }
    //Tanquem la connexió abans d'acabar
    mysqli_close($connexio);

    echo "</div>";

?>