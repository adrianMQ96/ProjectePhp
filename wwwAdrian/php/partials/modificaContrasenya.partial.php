<?php

echo '<ul>';

            $sql= "SELECT * FROM $tipusUsuari WHERE email LIKE '$user'";
            $resultat= mysqli_query($connexio,$sql);
            while ($row = mysqli_fetch_assoc($resultat)){
                
                
                echo '<div id="mainRegistre">';
                

echo '<div id="formulariLogin">';

    echo '<form action="processaModificacioContrasenya.php" method="post">';
    echo '<span style="color:red" class="errors">'.$Error.'</span><br><br>';
        echo '<label for="">Contrasenya Actual:</label>';
        echo '<input type="password" id="contrasenyaActual" minlength="6" name="contrasenyaActual" required><br/>';

        echo '<label for="">Contrasenya Nova:</label>';
        echo '<input type="password" id="contrasenyaNova" minlength="6" name="contrasenyaNova" required><br/>';

        echo '<label for="">Confirmar Contrasenya:</label>';
        echo '<input type="password" id="contrasenyaConfirmar" minlength="6" name="contrasenyaConfirmar" required><br/>';

        echo '<input type="text" id="email" name="email" value='.$row["email"].' required hidden><br/>';
        echo '<input type="text" id="rol" name="rol" value='.$row["rol"].' required readonly hidden><br/><br/>';
                
        echo '<input type="submit" value="Envia"><br>';
        
    echo '</form>';

echo '</div>';

echo '</div>';
            }
        echo '</ul>';

?>
