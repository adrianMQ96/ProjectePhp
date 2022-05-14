<?php
$user = $_SESSION["usuari"];
$rol = $_SESSION["rol"];
$tipusUsuari="";
if($rol == "ROL_ALUMNAT"){
    $tipusUsuari="alumnat";
}else{
    $tipusUsuari="professorat";
}
echo '<p>Hola '.$user.' estas registrat com '.$tipusUsuari.'<a href="\wwwAdrian\php\desconnecta.php"> Desconnecta&#39;t</a></p>';
?>
