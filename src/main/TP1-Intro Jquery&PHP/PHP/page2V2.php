<?php
        include 'cnx.php';
        $sql=$cnx->prepare("select idJeux, nomJeux from jeux where numCateg =".$_GET['id']."");
        $sql->execute();

        foreach($sql->fetchAll(PDO::FETCH_NUM) as $line){
            echo "<p>".$line[0]." - ".$line[1]."</p>";
        }
?>