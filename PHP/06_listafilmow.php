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
    h1{
        text-align: left;
    }
    li:hover{
        font-weight: bold;
    }
</style>
<body>
    <h1>Lista Filmów</h1>
            <?php 
                $query = "select FilTytul from filFilmy order by FilTytul Asc"; //zapytanie
                $result = $conn -> query($query); //wysylanie do bazy
                
                $lp = 1;
                if($result) { //jezeli prawidłowa odpowiedz
                    echo '<ol>';
                    while($ob = $result -> fetch_object()){ //pobiermay wszystkie rekordy jako obiekty
                        echo '<li>' . $ob -> FilTytul . '</li>';
                    }
                    echo '</ol>';
                    $result -> close();
                }
                else{
                    echo '<p>Brak wynikow zapytania lub blad zapytania</p>';
                }
                $conn -> close(); // zamkniecie laczenia z baza
            ?>
</body>
</html>