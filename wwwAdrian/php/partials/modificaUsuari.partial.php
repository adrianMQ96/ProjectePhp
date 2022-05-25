<?php

echo '<ul>';

            $sql= "SELECT * FROM $tipusUsuari WHERE email LIKE '$user'";
            $resultat= mysqli_query($connexio,$sql);
            while ($row = mysqli_fetch_assoc($resultat)){
                
                $passwordAntiga = $row["contrasenya"];
                echo '<div id="mainRegistre">';
                

echo '<div id="formulariLogin">';

    echo '<form action="processaModificacioDadesUsuari.php" method="post">';

        echo '<label for="">Nom:</label>';
        echo '<input type="text" id="nom" name="nom" value='.$row["nom"].' required><br/>';

        echo '<label for="">Cognoms:</label>';
        echo '<input type="text" id="cognoms" name="cognoms" value='.$row["cognoms"].' required><br/>';

        echo '<label for="">Poblacio:</label>';
        echo '<input type="text" id="poblacio" name="poblacio" value='.$row["poblacio"].' required><br/>';

        echo '<label for="">Email:</label>';
        echo '<input type="text" id="email" name="email" value='.$row["email"].' required readonly><br/>';
        

        echo '<label for="">Contrasenya:</label>';
        echo '<a href="../php/usuariRegistrat.php?modificarContrasenya">Modifica la contrasenya<a/><br>';

        echo '<label for="">ROL:</label>';
        echo '<input type="text" id="rol" name="rol" value='.$row["rol"].' required readonly><br/><br/>';
                
        echo '<input type="submit" value="Envia"><br>';
        
    echo '</form>';

echo '</div>';

echo '</div>';
            }
        echo '</ul>';

?>

