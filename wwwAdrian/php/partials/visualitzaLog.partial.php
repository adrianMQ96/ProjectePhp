<?php

$user = $_SESSION["usuari"];
$rol = $_SESSION["rol"];

$patro="/$user/i"; 
preg_match($patro,"/../log/registre.log");

$fp = fopen("../log/registre.log", "r");
while (!feof($fp)) {
    $linia = fgets($fp); 
    if (preg_match($patro,$linia)) { 
        ?>
        <p style="text-align: center; color: red;"> <?php echo $linia ?> </p>
        <?php
    }
}
fclose($fp);

?>