
<div id="zonaTitol"><h1 id="titol">Projecte PHP Adrià</h1></div>


<table id="navMenu">
  <tr>
    <th><a id="navItem" href="\wwwAdrian\index.php">Inici</a></th>
    <th><a id="navItem" href="\wwwAdrian\php\visitant.php">Visitant</a></th>
    <?php
        if (isset($_SESSION["usuari"])) {
            echo '<th><a id="navItem" href="\wwwAdrian\php\usuariRegistrat.php">Usuari Registrat</a></th>';
        }else{
            echo '<th><a id="navItem" href="\wwwAdrian\php\loginUsuari.php">Usuari Registrat</a></th>';
        }
    ?>
    <th><a id="navItem" href="\wwwAdrian\php\RegistreUsuari.php">Registra't</a></th>
    <th><a id="navItem" href="\wwwAdrian\php\Admin.php">Administració</a></th>
</table>