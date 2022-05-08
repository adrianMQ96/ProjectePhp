<!DOCTYPE html>
<html>
<head>
    <title> Exemple echo </title>
    <meta charset = "utf-8"/>
    <link rel="stylesheet" type="text/css" href="css/styles.css?v=<?php echo time(); ?>">
</head>
    <body>
        <?php
        echo '<div id="zonaTitol"><h1 id="titol">Inici Projecte PHP Adrian</h1></div>';
        echo '<div id="main">';

        $parametre=false;
        if(isset($_GET['sessio'])){
            $parametre = $_GET['sessio'];
        }
        if ($parametre){
            session_start();
        }

        echo '<div id="visitant">Visitant <br> <a href="php/visitant.php"><img src="img/visitant.png" width="95%" height="60%"></a></div>';
        echo '<div id="usuari">Usuari <br> <img src="img/users.png" width="75%" height="60%">';
        echo '<div id="login">';

        if (session_status() == PHP_SESSION_ACTIVE) {
            echo '<a href="php/usuariRegistrat.php">Usuari Registrat</a> - <a href="php/RegistreUsuari.php">Registrat</a>';
        }else{
            echo '<a href="php/loginUsuari.php">Login</a> - <a href="php/RegistreUsuari.php">Registrat</a>';
        }

        echo '</div>';
        echo '</div>';
        echo '<div id="admin">Administració <br> <a href="php/Admin.php"><img src="img/admin.jpg" width="95%" height="60%"></a></div>';
        echo '</div>';

        ?>
    </body>
</html>