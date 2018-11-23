<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>TICKETS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="CSS/style.css" />
    <script src="../JS/function.js"></script>
    <script src="../JQUERY/jquery-3.1.1.js"></script>
</head>
<body>
    <?php
        include 'cnx.php';
        // write query 
        $sql = $cnx->prepare("select t.nomTicket, t.dateTicket, t.niveauTicket 
        from tickets t,users u where t.idUser=u.idUser and t.idUser =".$_GET['id']);
        // execure query
        $sql->execute();
       echo "<table>";
        // travailler avec des numéro au lieu des association
            foreach($sql-> fetchAll(PDO::FETCH_NUM) as $line){
                echo "<tr>";
				echo "<td>".$line[0]."</td>";
                echo "<td>".$line[1]."</td>";
                echo "<td>".$line[2]."</td>";
				echo "</tr>";
                /*echo"<input type='button' onclick ='showTickets(".$line[2].")' value='show ".$line[0]." tickets'>"; */
            }
            echo "</table>";
    ?>
</body>
</html>
