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
$Error="";
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

    if(isset($_GET['modificarUsuari'])){
        include "./partials/modificaUsuari.partial.php";
        echo '<div id="titol"><a href="../php/usuariRegistrat.php">Cancel·la</a></div><br>';
    }elseif(isset($_GET['modificarContrasenya'])){
        include "./partials/modificaContrasenya.partial.php";
        echo '<div id="titol"><a href="../php/usuariRegistrat.php">Cancel·la</a></div><br>';
    }elseif(isset($_GET['errorCorrecta'])){
        $Error="La contrasenya no es correcta";
        include "./partials/modificaContrasenya.partial.php";
        echo '<div id="titol"><a href="../php/usuariRegistrat.php">Cancel·la</a></div><br>';
        
    }elseif(isset($_GET['errorCoincidir'])){
        $Error="Les contrasenyes han de coincidir";
        include "./partials/modificaContrasenya.partial.php";
        echo '<div id="titol"><a href="../php/usuariRegistrat.php">Cancel·la</a></div><br>';
        
    }else{
        include "./partials/dadesUsuari.partial.php";
        echo '<div id="titol"><a href="../php/usuariRegistrat.php?modificarUsuari">Modifica les teues dades</a></div><br>';
        echo '<div id="titol"><a href="../php/usuariRegistrat.php?mostrarLog">Visualitzar Log</a></div><br>';
    } 

    //Baixa Usuari
        echo '<form action="processaBaixaUsuari.php" method="post">';
        
        echo '<input type="text" id="email" name="email" value='.$user.' required hidden><br/>';

        echo '<input type="text" id="rol" name="rol" value='.$rol.' required hidden><br/>';

            echo '<input type="submit" value="Donat de Baixa" onclick="return confirm("Estas segur?");>';
        echo '</form>';
    
    echo '</div>';
    
    echo '<div id="titol"><a href="../index.php?">Torna a l&#39;inici</a></div>';
    if(isset($_GET['usuariModificat'])){
        echo '<div id="titol"><p>Les teudes dades sl&#39;han canviat correctament</p></div>';
    }

    if(isset($_GET['contrasenyaModificada'])){
        echo '<div id="titol"><p>La contrasenya sl&#39;ha canviat correctament</p></div>';
    }
    echo '</div>';

echo '</div>';
include "./partials/peu.partial.php";

if(isset($_GET['mostrarLog'])){
    include "./partials/visualitzaLog.partial.php";
    echo '<div id="titol"><a href="../php/usuariRegistrat.php">Oculta Log</a></div><br>';
    
}
?>
</body>
