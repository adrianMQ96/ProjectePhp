<!DOCTYPE html>
<html>
<head>
    <title> Exemple echo </title>
    <meta charset = "utf-8"/>
    <link rel="stylesheet" type="text/css" href="../css/styles.css?v=<?php echo time(); ?>">
</head>
<body>
<?php
include "./../php/partials/cap.partial.php";
echo '<h3 id="titol">Visitant:: En construcció</h3>';
echo '<div id="main">';


echo '<div id="usuari"> <img src="../img/construccio.png" width="100%" height="100%">';

echo '</div>';

echo '</div>';

if (session_status() == PHP_SESSION_ACTIVE) {
    include "./../php/partials/benvinguda.partial.php";
    echo '<div id="titol"><a href="../index.php">Torna a l&#39;inici</a></div>';
}

include "./../php/partials/peu.partial.php";


?>
</body>
</html>