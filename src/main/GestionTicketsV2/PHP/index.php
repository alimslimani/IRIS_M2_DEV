<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="../JS/functions.js"></script> 
    <script src="../JQUERY/jquery-3.1.1.js"></script>
</head>
<body>
    <?php
        include 'cnx.php';
        $sql = $cnx->prepare("select idUser, nomUser, prenomUser from users");
        $sql->execute();
        echo "<table border='1'>";
        foreach($sql->fetchAll(PDO::FETCH_ASSOC) as $ligne)
        {
            echo "<tr>";
            echo "<td>".$ligne['nomUser']."</td>";
                echo "<td>".$ligne['prenomUser']."</td>";
                echo "<td><input onclick='afficher(".$ligne['idUser'].")' type='button' value='Afficher les tickets'></td>";
            echo "</tr>";
        }
        echo "</table>";

    ?>
    <br>
    <div id='divTicket'></div>
</body>
</html>