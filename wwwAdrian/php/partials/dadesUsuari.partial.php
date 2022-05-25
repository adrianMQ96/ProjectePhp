<?php

echo '<ul>';

            $sql= "SELECT * FROM $tipusUsuari WHERE email LIKE '$user'";
            $resultat= mysqli_query($connexio,$sql);
            while ($row = mysqli_fetch_assoc($resultat)){
                echo '<li>Nom: '.$row["nom"].'</li>';
                echo '<li>Cognoms: '.$row["cognoms"].'</li>';
                echo '<li>Poblacio: '.$row["poblacio"].'</li>';
                echo '<li>email: '.$row["email"].'</li>';
                echo '<li>Contrasenya: '.$row["contrasenya"].'</li>';
                echo '<li>Rol: '.$row["rol"].'</li>';
                echo '<li>Data: '.$row["data"].'</li>';
            }
        echo '</ul>';

?>