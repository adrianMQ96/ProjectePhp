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
$user = $_SESSION["usuari"];
$rol = $_SESSION["rol"];
$tipusUsuari="";
if($rol == "ROL_ALUMNAT"){
    $tipusUsuari="alumnat";
}else{
    $tipusUsuari="professorat";
}

?>

<!DOCTYPE html>
<html>
<head>
    <title> Exemple echo </title>
    <meta charset = "utf-8"/>
    <link rel="stylesheet" type="text/css"  href="../css/styles.css?v=<?php echo time(); ?>">
</head>
<body>
<?php
include "./partials/cap.partial.php";
echo '<div id="main">';

    echo '<div id="mainLogin">';
    echo '<h3 id="titol">Usuari Registrat</h3>';
    //echo '<p>Hola '.$user.' estas registrat com '.$tipusUsuari.'<a href="desconnecta.php"> Desconnecta&#39;t</a></p>';
    include "./partials/benvinguda.partial.php";
    echo '<div id="formulariLogin">';

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

    echo '</div>';
    echo '<div id="titol"><a href="../index.php">Torna a l&#39;inici</a></div>';
    echo '</div>';

echo '</div>';
include "./partials/peu.partial.php";
?>
</body>
