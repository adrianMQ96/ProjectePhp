<?php
$servidor = "localhost";
$usuari = "projectes_Adrian";
$contrasenya = "projectes_Adrian";
$basedades = "projectes_Adrian";

$connexio = mysqli_connect($servidor, $usuari, $contrasenya, $basedades);

if (!$connexio) {
    die ("Error de connexió: ".mysqli_connect_error ());
}

$Email = $_POST['email'];
$ContrasenyaLogin = $_POST['contrasenya'];
$TipusUsuari = $_POST['radioTipus'];

$sql1="SELECT * FROM $TipusUsuari WHERE email LIKE '$Email'";
$resultat = mysqli_query($connexio, $sql1);

if (mysqli_num_rows($resultat) > 0){
    $contrasenyaEncriptada='';
    session_start([
        'cookie_lifetime' => 86400,
    ]);
    
    /*session is started if you don't write this line can't use $_Session  global variable*/

    while($row = mysqli_fetch_assoc($resultat)){
        $contrasenyaEncriptada= $row["contrasenya"];
        $_SESSION["usuari"]=$row["email"];
        $_SESSION["rol"]=$row["rol"];
    }

    $contrasenyaDes =password_verify($ContrasenyaLogin,$contrasenyaEncriptada);
    if ($contrasenyaDes){

        mysqli_close($connexio);
        header("Location: usuariRegistrat.php");
    }else{
        mysqli_close($connexio);
        header("Location: loginUsuari.php?error=contrasenya");
    }
}else{
    mysqli_close($connexio);
    header("Location: loginUsuari.php?error=email");
}
?>