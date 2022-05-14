<!DOCTYPE html>
<html>
<head>
    <title> Exemple echo </title>
    <meta charset = "utf-8"/>
    <link rel="stylesheet" type="text/css"  href="../css/styles.css?v=<?php echo time(); ?>">
</head>
<body>
<?php

$parametre="";
if(isset($_GET['error'])){
    $parametre = $_GET['error'];
}
$ErrorContrasenya="";
$ErrorEmail="";

switch ($parametre){
    case "contrasenya":
        $ErrorContrasenya="Contrasenya incorrecta";
        break;
    case "email":
        $ErrorEmail="El usuari no existeix";
        break;
}

    include "./../php/partials/cap.partial.php";
    echo '<div id="main">';

    echo '<div id="mainLogin">';
    echo '<h3 id="titol">Login Usuari Registrat</h3>';
    echo '<div id="formulariLogin">';
        echo '<form action="processaLogin.php" method="post">';
            echo '<label for="">Email </label>';
            echo '<input type="text" id="" name="email">';
            echo '<span class="errors">'.$ErrorEmail.'</span><br>';

            echo '<label for="">Contrasenya </label>';
            echo '<input type="password" id="" name="contrasenya">';
            echo '<span class="errors">'.$ErrorContrasenya.'</span><br>';

            echo '<label>Tipus d&#39;usuari </label>';
            echo '<input type="radio" id="alumnat" value="alumnat" name="radioTipus">';
            echo '<label>Alumnat </label>';
            echo '<input type="radio" id="professorat" value="professorat" name="radioTipus">';
            echo '<label>Professorat </label><br><br>';
            echo '<input type="submit" value="Submit">';
        echo '</form>';
    echo '</div>';
    echo '<div id="titol"><a href="../index.php">Torna a l&#39;inici</a></div>';
    echo '</div>';

    echo '</div>';
    include "./../php/partials/peu.partial.php";
?>
</body>