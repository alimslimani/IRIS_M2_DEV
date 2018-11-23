<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>TEAM</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../CSS/style.css"/>
    <script src="../JS/function.js"></script>
    <script src="../JQUERY/jquery-3.1.1.js"></script>
</head>
<body>
<?php
include 'cnx.php';
echo "<h1> Liste des équipes </h1>";
// write query
$sql = $cnx->prepare("select distinct nomEquipe,codeEquipe from equipe");
// execure query
$sql->execute();
echo "<table>";
// travailler avec des numéro au lieu des association
foreach ($sql->fetchAll(PDO::FETCH_NUM) as $line) {
    echo "<tr>";
    echo "<td>" . $line[0] . "</td>";
    echo "<td><a href='result.php?code=" . $line[1] . "&equipe=" . $line[0] . "'> Show runner of team </a></td>";
    echo "</tr>";
}
echo "</table>";
?>
</body>
</html>