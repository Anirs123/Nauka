<?php
echo 'Start skryptu';

function lacz_bd(){
    $wynik = @new mysqli('','','','');

if($wynik -> connect_errno){
    echo '<p>Połonczenie z serwerem bazy danych nie powiodło sie. KOmunikat błędu: ' . $wynik -> connect_error . '</p>';
    exit();
} else{
    $wynik -> query("set names 'utf8'");
    echo '<p>Połoncznie z bazą</p>';
    return $wynik;
}}

$lacz = lacz_bd();
$wynik = $lacz->query("select * from samSAMOCHODY");
if($wynik){
    // while($wiersz = $wynik -> fetch_assoc()) { //dopóki sa pobrane rekordy
    foreach($wynik as $wiersz){
        echo '<pre>';
            print_r($wiersz);
        echo '</pre>';
    }
    $wynik -> close();
}
else{
    echo '<p>brak wyników zapytania lub błąd zapytania!!!</p>';
}


$lacz -> close();
?>