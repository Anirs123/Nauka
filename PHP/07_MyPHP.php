<?php
$host = '';
$user = '';
$pass = '';
$db = '';


$conn = new mysqli($host, $user, $pass, $db);
// $conn -> set_charset("utf8");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Postać tabeli</title>
</head>
<style>
    h1,span{
        font-size: 40px;
        font-family: 'Arial';
        display: inline-block;
    }
    span{
        color: red;
    }
</style>
<body>
            <?php 
                $plec = $_GET['plec'] ?? '';
                switch($plec){ //jezeli ?plec=M lub K tworzy nam dany result ktory pozniej wyswietlimy
                    case 'M';
                        $result = $conn -> query('select imie from imiona where plec = "M" order by rand() limit 1');
                    break;
                    case 'K';
                        $result = $conn -> query('select imie from imiona where plec = "K" order by rand() limit 1');
                    break;
                    default: //jezeli nie ma K lub M
                    $result = $conn -> query("select imie from imiona order by rand() limit 1");
                }
                
                if($result) { //jezeli prawidłowa odpowiedz
                    $ob = $result -> fetch_object(); //tworzenie obiektu z zapytania
                    echo '<h1>Wylosowano: <span>' . $ob -> imie . '</span></h1>';
                    echo '<br><a href="?plec=M">Wylosuj faceta</a>&nbsp;';
                    echo '<a href="?plec=K">Wylosuj kobiete</a>';

                    $result -> close(); //czyszczenie result
                }
                else{
                    echo '<p>Brak wynikow zapytania lub blad zapytania</p>';
                }
                $conn -> close(); // zamkniecie laczenia z baza
            ?>
</body>
</html>