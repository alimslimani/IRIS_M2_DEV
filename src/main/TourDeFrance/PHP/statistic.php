<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Liste Coureurs</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../CSS/style1.css"/>
    <script src="../JS/function.js"></script>
    <script src="../JQUERY/jquery-3.1.1.js"></script>
</head>
<body>
<?php
include 'cnx.php';
echo "<h1>Statistiques de " . $_GET['prenom'] . " " . $_GET['nom'] . "</h1>";
$sql = $cnx->prepare("
                SELECT p.nomPays ,
                COUNT(t.classement),
                (select sum(e1.nbKm) from etape e1,temps t1 where e1.numEtape=t1.numEtape and t1.numCoureur = " . $_GET['numCoureur'] . " ),
                ROUND(COUNT(t.classement) / (select count(numEtape) from etape) *100) +'%'
                FROM pays p,temps t, etape e,coureur c
                WHERE p.codePays = c.codePays
                AND t.numCoureur = c.numCoureur                
                AND t.numCoureur = " . $_GET['numCoureur'] . " 
                AND t.classement= 1
                AND e.numEtape=t.numEtape");
$sql->execute();
echo '<table>';
foreach ($sql->fetchAll(PDO::FETCH_NUM) as $line) {
    echo "<tr>";
    echo '<th>Nationalité</th>';
    echo '<th>Nombre de Victoire(s)</th>';
    echo "</tr>";
    echo '<td align="center">' . $line[0] . '</td>';
    echo '<td align="center">' . $line[1] . '</td>';

    echo "<tr>";
    echo '<th>Nombre de KM</th>';
    echo '<th>Pourcentage du nombre de victoire</th>';
    echo "</tr>";
    echo '<td align="center" style="">' . $line[2] . '</td>';
    echo '<td align="center">' . $line[3] . ' %</td>';
    echo '<br>';
}
echo "</table>";
echo "<br>";
echo '<input type="button" value="Retour" onclick="history.go(-1)">';
?>
</body>
</html>