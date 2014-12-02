<!DOCTYPE html>
<?php include "db_connect.php"; ?>
<html>
<head>
    <title>Movie thing</title>
</head>
<?php 
    $sql = "SELECT * FROM Movie;";
    $sth = $pdo->prepare($sql);
    $sth->execute();
    $res = $sth->fetchAll();
?>
<body>
    <table style='border:1px solid #555;text-align:left;font-family:arial' cellpadding="10" cellspacing="0">
        <tr>
            <th>&nbsp;</th>
            <th>Titel</th>
            <th>år</th>
        <?php 
        foreach ($res as $movie)
        {
            echo "<tr>" .
            "<td>" . "<img src='" . $movie->image . "''>" . "</td>" .
            "<td>" . $movie->title . "</td>" .
            "<td>" . $movie->YEAR . "</td>" .
            "</tr>";
        }
        ?>
    </table>
</body>
</html>