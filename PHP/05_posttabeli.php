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
    table{
        width: 100%;
        border-collapse: collapse;
    }
    table,th,td{
        border: 1px solid black;
        padding: 0.5em;
    }
    tbody tr:nth-child(odd) {
        background-color: #ccc;
    }
    h1{
        text-align: center;
    }
</style>
<body>
    <h1>Tabela Pracownicy</h1>
    <table>
        <thead>
            <tr>
                <th>LP</th>
                <th>NR_PRACOWNIKA</th>
                <th>IMIE I NAZWISKO</th>
                <th>DATA_ZATR</th>
                <th>DZIAL</th>
                <th>STANOWISKO</th>
                <th>PENSJA</th>
                <th>DODATEK</th>
                <th>NR_MIEJSCA</th>
                <th>NR_TELEFONU</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $query = "select * from samPRACOWNICY"; //zapytanie
                $result = $conn -> query($query); //wysylanie do bazy
                
                $lp = 1;
                if($result) { //jezeli prawidłowa odpowiedz
                    while($ob = $result -> fetch_object()){ //pobiermay wszystkie rekordy jako obiekty
                        $imie = $ob -> IMIE;
                        $nazwisko = $ob -> NAZWISKO;
                        echo '<tr>
                            <td>' . $lp++ . '</td>
                            <td>' . $ob -> NR_PRACOWNIKA . '</td>
                            <td>' . $imie . ' ' . $nazwisko . '</td>
                            <td>' . $ob -> DATA_ZATR . '</td>
                            <td>' . $ob -> DZIAL . '</td>
                            <td>' . $ob -> STANOWISKO . '</td>
                            <td>' . $ob -> PENSJA . '</td>
                            <td>' . $ob -> DODATEK . '</td>
                            <td>' . $ob -> NR_MIEJSCA . '</td>
                            <td>' . $ob -> NR_TELEFONU . '</td>
                        </tr>';
                    }
                    $result -> close();
                }
                else{
                    echo '<p>Brak wynikow zapytania lub blad zapytania</p>';
                }
                $conn -> close(); // zamkniecie laczenia z baza
            ?>
        </tbody>
        <tfoot>

        </tfoot>
    </table>
</body>
</html>