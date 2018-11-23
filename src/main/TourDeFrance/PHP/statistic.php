<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Liste Coureurs</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../CSS/style.css" />
    <script src="../JS/function.js"></script>
    <script src="../JQUERY/jquery-3.1.1.js"></script>
</head>
<body>
    <?php
        include 'cnx.php';
        // write query 
        echo "<h1>Statistique de ".$_GET['prenom']." ".$_GET['nom']."</h1>";
        $sql = $cnx->prepare("
                SELECT p.nomPays ,
                COUNT(t.classement),
                SUM(e.nbKM),
                SUM(e.nbKM) /   COUNT(t.classement)      
                FROM pays p,temps t, etape e
                WHERE p.codePays = '".$_GET['pays']."' 
                AND t.numCoureur = ".$_GET['numCoureur']." 
                AND t.classement= 1
                AND e.numEtape=t.numEtape");
        // execure query
        $sql->execute();
       echo "<table>";
        // travailler avec des numéro au lieu des association
            foreach($sql-> fetchAll(PDO::FETCH_NUM) as $line){
                echo "<tr>";
				echo "<td>".$line[0]."</td>";
                echo "<td>".$line[1]."</td>";                
                echo "<td>".$line[2]."</td>";
                echo "<td>".$line[3]."</td>";
				echo "</tr>";
            }
            echo "</table>";
    ?>
</body>
</html>
