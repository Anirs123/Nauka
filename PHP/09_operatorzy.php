<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    h1{
        text-align: center;
    }
    body{
        background-color: black;
        color: white;
        font-family: arial;
    }
    table{
        border-collapse:collapse;
        width: 50%;
        margin: auto;
    }
    th,td{
        border: 1px solid orange;
        padding: 1em;
    }
    legend,label{
        color: orange;
    }
    form{
        width: 350px;
        position: relative;
        margin: auto;
        margin-top: 20vh;
    }
    input{
        padding: 5px;
        margin: 10px;
    }
    .numer{
        width: 50px;
    }
    .zapisz{
        margin: 0px;
    }
    select{
        background-color: white;
        color: black;
        width: 130px;
        height: 30px;
        text-align: center;
    }
    a{
        color: #FED8B1;
        text-decoration: none;
    }
    ul, pre{
        color: orange;
    }
</style>
<?php
    session_start();
    require_once('database_functions.inc');

    // $conn = new mysqli($host, $user, $pass, $db);

    $operator = array('', 'T-Mobile', 'PLAY', 'PLUS', 'Orange', 'NjuMobile', 'Heyah', 'Inne');

    echo '<pre>';
        print_r($_POST);
        print_r($_GET);
    echo '</pre>';

    if(isSet($_GET['akcja'])) //skr.php?akcja=zapisz
        $akcja = $_GET['akcja'];
    else
        $akcja = '';
    //lub prosciej z uzyciem kolescencji
    $akcja = $_GET['akcja'] ?? '';

    $info = '';
    switch($akcja){
        case 'zapisz';
            $info = 'zapis danych do bazy';
            if(isSet($_POST['imie'])){
                $imie = $_POST['imie'];
                $op = $_POST['op'];
                $ile = $_POST['ile'];

                $ip = $_SERVER['REMOTE_ADDR'];
                $data = date('Y-m-d H:i:s');
                // wybieramy sobie sposob do testowania czy dziala
                //$info = '<br>' . $imie . ' - ' . $op . ' - ' . $ile . ' - ' . $ip . ' - ' . $data;
                // $info = "<br> {$imie} - ${op} - {$ile} - {$ip} - {$data}";
                // test czy dziala polecenie do bazy danych
                $info = "insert into OperatorKom values(null, '$imie', '$op', '$ile', '$data', '$ip')";
                // wysylanie do bazy
                $result = $conn -> query($info);
                if($result){
                    $info = 'Dane zapisane pod nr: ' . $conn -> insert_id;
                }
                else{
                    $info = 'err - ' . $conn -> error;
                }
                $conn -> close();
            }
            else{
                $info = 'Włam na strone!';
            }
            // BRAKUJE ZABEZPIECZENIA do 255 lat
        break;
        // polecenie 1
        case 'pokaz':
            $info = '<h1>Zestawienie danych</h1>';

            $query = "select * from OperatorKom";
            //echo $query;
            $result = $conn -> query($query);
            if($result){
                $info .= '<table>
                        <tr>
                            <th>LP</th>
                            <th>Imię</th>
                            <th>Operator</th>
                            <th>Ile Lat</th>
                            <th>Data</th>
                            <th>IP</th>
                        </tr>';
                $lp = 1;
                while($ob = $result -> fetch_object()){
                    // opImie to nazwa pola w mysql
                    // operator to odniesienie do naszej tablicy arrayowej na górze
                    $info .= '<tr>
                                <td>' . $lp++ . '</td>
                                <td>' . $ob -> opImie . '</td>
                                <td>' . $operator[$ob -> opOperator] . '</td>
                                <td>' . $ob -> opLata . '</td>
                                <td>' . $ob -> opData . '</td>
                                <td>' . $ob -> opIP . '</td>
                            </tr>';
                }
                $info .= '</table>';
                $result -> close();
            }
            else{
                $info .= '<p style="color: red;">Brak Danych...</p>';
            }
            $conn -> close();
            break;
        case 'statTmobile':
            $info = '<h1>Ilość responderów T-Mobile</h1>';
            $wynik = $conn -> query("select count(*) as ile from OperatorKom where opOperator = 1");
            if($wynik){
                $ob = $wynik -> fetch_object();
                $info .= '<p>Ilość: ' . $ob -> ile . '</p>';
                $wynik -> close();
            }
            else{
                $info .= '<p style="color: red;">brak danych...</p>';
            }
            $conn -> close();
            break;
        case 'statIlosc':
            $info = '<h1>Zestawienie Operatorów</h1>';

            $wynik = $conn -> query("select count(*) as ile, opOperator from OperatorKom group by opOperator");
            if($wynik){
                $info .= '<table>
                    <tr>
                        <th>Operator</th>
                        <th>Ilość Responderów</th>
                    </tr>';
                    while($wiersz = $wynik -> fetch_assoc()){
                        $info .= '
                        <tr>
                            <td>' . $operator[$wiersz['opOperator']] . '</td>
                            <td>' . $wiersz['ile'] . '</td>
                        </tr>';
                        // ile poniewaz tu mamy select count(*) as ile
                        // $operator to nazwa arraya na samej gorze i bierzemy dla niego jako opOperator z bazy
                    }
                $wynik -> close();
                $info .= '</table>';
            }
            else{
                $info = '<p style="color: red;">brak danych...</p>';
            }
            $conn -> close();
            break;
        case 'statIP':
            $info = '<h1>Statystyki adresów IP</h1>';

            $wynik = $conn -> query("select opLata as ile, opIP from OperatorKom group by opIP");
            if($wynik){
                $info .= '<table>
                <tr>
                    <th>Adres IP</th>
                    <th>Ile Responderów</th>
                </tr>';
                while($wiersz = $wynik -> fetch_assoc()){
                    $info .= '
                    <tr>
                        <td>' . $wiersz['opIP'] . '</td>
                        <td>' . $wiersz['ile'] . '</td>
                    </tr>';
                }
                $wynik -> close();
                $info .= '</table>';
            }
            else{
                $info = '<p style="color: red;">brak danych...</p>';
            }
            $conn -> close();
            break;
        case 'imie':
            $info = '<h1>Więcej niz jedno imie</h1>';

            $wynik = $conn -> query("select count(*) as ile, opImie from OperatorKom group by opImie having ile > 1");
            if($wynik){
                $info .= '<ol>';
                while($wiersz = $wynik -> fetch_assoc()){
                    $info .= '<li> Imię: ' . $wiersz['opImie'] . ', Ilość: ' . $wiersz['ile'] . '</li>'; 
                }
                $wynik -> close();
                $info .= '</ol>';
            }
            else{
                $info = '<p style="color: red;">brak danych...</p>';
            }
            $conn -> close();
            break;
        case 'naj':
            $info = '<h1>Najkrótszy i najdłuższy okres</h1>';

            $wynik = $conn -> query("select count(*) as ile, opOperator, min(opLata) as mini, max(opLata) as maxi from OperatorKom group by opOperator");
            if($wynik){
                $info .= '<table>
                <tr>
                    <th>Operatorzy</th>
                    <th>Ile Responderów</th>
                    <th>najkrócej</th>
                    <th>Najdluzej</th>
                </tr>';
                while($wiersz = $wynik -> fetch_assoc()){
                    $info .= '
                    <tr>
                        <td>' . $operator[$wiersz['opOperator']] . '</td>
                        <td>' . $wiersz['ile'] . '</td>
                        <td>' . $wiersz['mini'] . '</td>
                        <td>' . $wiersz['maxi'] . '</td>
                    </tr>';
                }
                $wynik -> close();
                $info .= '</table>';
            }
            else{
                $info = '<p style="color: red;">brak danych...</p>';
            }
            $conn -> close();
            break;
        default:
            //brak opcji to pokazanie strony
    }
?>
<body>
    <form method="POST" action="?akcja=zapisz">
        <fieldset>
            <legend>OPERATORZY</legend>
            <label for="imie">Imię:</label>
            <input type="text" id="imie" name="imie" required><br>
            <label for="op">Operator:</label>
            <select name="op" id="op">
                <option value="">Proszę Wybrać...</option>
                <option value="1">T-Mobile</option>
                <option value="2">PLAY</option>
                <option value="3">PLUS</option>
                <option value="4">Orange</option>
                <option value="5">NjuMobile</option>
                <option value="6">Heyah</option>
                <option value="7">Inne</option>
            </select><br>
            <label for="ile">Od ilu lat:</label>
            <input class="numer" type="number" id="ile" name="ile"><br>
            <input class="zapisz" type="submit" value="Zapisz">
        </fieldset>
    </form>
    <ul>
        <li><a href="?akcja=pokaz">Pokaż całą tabelę</a></li>
        <li><a href="?akcja=statTmobile">Ile respondentów t-Mobile</a></li>
        <li><a href="?akcja=statIlosc">Zestawienie operatorów</a></li>
        <li><a href="?akcja=statIP">Statystyki adresów IP</a></li>
        <li><a href="?akcja=imie">Więcej niż jedno imię</a></li>
        <li><a href="?akcja=naj">Najkrócej i najdłużej</a></li>
    </ul>
    <div><?=$info?></div>
</body>
</html>