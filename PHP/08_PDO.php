<?php
$host = '';
$user = '';
$pass = '';
$db = '';


$conn = new mysqli($host, $user, $pass, $db);
// $conn -> set_charset("utf8");
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Postać tabeli</title>
</head>
<style>

</style>
<body>
    <?php 
    try{
        //rodzaj_bazy;host=adres_servera; port=port;ecoding=kodowanie_znakow;dbname=nazwa_bazy;
        $db_conn = new PDO('mysql:host=' . $host . ';dbname=' . $db . ';encoding=utf8', $user, $pass,
        array(
            //sterownik bazy mysql bedzie tworzyl stale polaczenia
            PDO::ATTR_PERSISTENT => true,
            //Wylaczenie zbednego emulate prepares
            PDO::ATTR_EMULATE_PREPARES => false,
            //ustalenie sposobu raportowania bledow
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ));
    }
    catch(PDOException $err){
        exit('Blad polaczenia z baza danych: ' . $err -> getMessage());
    }
    echo 'siema dziala'
    ?>
</body>
</html>