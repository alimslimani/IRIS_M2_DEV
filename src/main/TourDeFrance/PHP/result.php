<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Liste Coureurs</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../CSS/style.css"/>
    <script src="../JS/function.js"></script>
    <script src="../JQUERY/jquery-3.1.1.js"></script>
</head>
<body>
<?php
include 'cnx.php';
echo "<h1> Liste des coureurs de l'équipe " . $_GET['code'] . "</h1>";
// write query
$sql = $cnx->prepare("select nomCoureur,prenomCoureur,codePays,numCoureur
        from coureur where codeEquipe ='" . $_GET['code'] . "'");
// execure query
$sql->execute();
echo "<table>";
// travailler avec des numéro au lieu des association
foreach ($sql->fetchAll(PDO::FETCH_NUM) as $line) {
    echo "<tr>";
    echo "<td>" . $line[0] . "</td>";
    echo "<td>" . $line[1] . "</td>";
    echo "<td><a href='statistic.php?numCoureur=" . $line[3] . "&pays=" . $line[2] . "&nom=" . $line[0] . "&prenom=" . $line[1] . "'> Statistiques </a></td>";
    echo "</tr>";
}
echo "</table>";
echo "<br>";
echo '<input type="button" value="Retour" onclick="history.go(-1)">';
?>
</body>
</html>