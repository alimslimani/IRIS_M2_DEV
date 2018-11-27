<?php
        include 'cnx.php';
        $sql = $cnx->prepare("select nomTicket,dateTicket,niveauTicket from tickets where idUser =".$_GET['idUser']);
        $sql->execute();

        foreach($sql->fetchAll(PDO::FETCH_ASSOC) as $ligne)
        {
            echo "<p>".$ligne['nomTicket']." - " .$ligne['dateTicket']." - ".$ligne['niveauTicket']. "</p>";
        }
?>
