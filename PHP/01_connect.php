<?php
echo 'Start skryptu';

function lacz_bd(){
    $wynik = @new mysqli('localhost','','','');

if($wynik -> connect_errno){
    echo '<p>Połonczenie z serwerem bazy danych nie powiodło sie. KOmunikat błędu: ' . $wynik -> connect_error . '</p>';
    exit();
} else{
    $wynik -> query("set names 'utf8'");
    echo '<p>Połoncznei z bazą</p>';
    return $wynik;
}}

$lacz = lacz_bd();
$lacz -> close();
?>