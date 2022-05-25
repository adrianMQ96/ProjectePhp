<?php

    $servidor = "localhost";
    $usuari = "projectes_Adrian";
    $contrasenya = "projectes_Adrian";
    $basedades = "projectes_Adrian";

    $connexio = mysqli_connect($servidor, $usuari, $contrasenya, $basedades);

    if (!$connexio) {
        die ("Error de connexió: ".mysqli_connect_error ());
    }

    $Nom = $_POST['nom'];

    $Cognoms = $_POST['cognoms'];
    $Poblacio = $_POST['poblacio'];

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


    // Executem la instrucció, comprovant si hi ha hagut algun tipus d'error i si n'ha retornat més de 0
    if (mysqli_num_rows($resultat) > 0) {

        
    
    
    $sqlInsert ="";

    
        $sqlInsert = "UPDATE alumnat SET nom='$Nom', cognoms='$Cognoms', poblacio='$Poblacio' WHERE email='$Email'";
    
    
    

        if (mysqli_query($connexio, $sqlInsert)) {
            $ultim_id = mysqli_insert_id($connexio);

            $dia = date("Y")."/".date("n")."/".date("j");
            $hora = date("G").":".date("i").":".date("s");
            $fp = fopen("../log/registre.log","a");
            fputs($fp, "Dades Usuari Modificades: $Email - $Rol - Dia: $dia - Hora: $hora \n");
            fclose($fp);

            echo "Les teudes dades s'han canviat correctament".$ultim_id;
            header("Location: usuariRegistrat.php?usuariModificat");
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