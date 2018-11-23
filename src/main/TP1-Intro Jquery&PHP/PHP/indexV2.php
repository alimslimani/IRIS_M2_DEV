<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>M2INFO_DEV_TP1_V2_PHP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen"/>
    <script src="../JS/functions.js"></script>
    <script src="../JQUERY/jquery-3.1.1.js"></script>
</head>
<body>
    <!-- <form action="page2.php" method="POST">
        <label>Veuiilez saisir votre prenom</label>
        <br>
        <input name ="userName" type="text">
        <input type="submit" value="next page">
    </form> -->

    <!-- V1 connect to database -->
    <?php
        include 'cnx.php';
        // write query
        $sql = $cnx->prepare("select idCateg,nomCateg from categorie");
        // execure query
        $sql->execute();
        echo"<h1>Please, select your categorie of games</h1>";
        echo"<select id='lstCateg'>";
        // foreach($sql-> fetchAll(PDO::FETCH_NUM) as $line){ $line[indice de la colonne]
        // autre methode,
        // travailler avec des numéro au lieu des association
        foreach($sql-> fetchAll(PDO::FETCH_ASSOC) as $line){
            echo"<option value='".$line['idCateg']."'>".$line['nomCateg']."</option>";
        }
        echo"</select>";
        echo"<br><br>";
        echo"<input type='submit' onclick ='showGames()' value='show categories of games'>";
        echo"<div id ='divJeux'></div>";
    ?>
</body>
</html>