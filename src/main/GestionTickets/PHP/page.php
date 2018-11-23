<?php
        include 'cnx.php';
        $sql=$cnx->prepare("select t.nomTicket, t.dateTicket, t.niveauTicket 
        from tickets t,users u where t.idUser=u.idUser and t.idUser =".$_GET['id']."");
        $sql->execute();

        foreach($sql->fetchAll(PDO::FETCH_NUM) as $line){
            echo "<p>".$line[0]." - ".$line[1]." - ".$line[2]."</p>";
        }
?>

