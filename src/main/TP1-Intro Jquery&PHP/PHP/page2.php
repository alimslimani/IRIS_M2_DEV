<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Bienvenu</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen"/>
</head>
<body>
    <?php
        include 'cnx.php';
        $sql=$cnx->prepare("select idJeux, nomJeux from jeux where numCateg =".$_GET['lstCateg']."");
        $sql->execute();

        foreach($sql->fetchAll(PDO::FETCH_NUM) as $line){
            echo "<p>".$line[0]." - ".$line[1]."</p>";
        }
    ?>
</body>
</html>