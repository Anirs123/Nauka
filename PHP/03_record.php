<?php
$host = '';
$user = '';
$pass = '';
$db = '';


$conn = new mysqli($host, $user, $pass, $db);
$conn -> set_charset("utf8");

$query = "select * from samSAMOCHODY";
$result = $conn -> query($query);

echo '<p>Ilość: ' . $result -> num_rows . '</p>';
echo '<pre>';
    print_r($result);
echo '</pre>';


if($result){
    $row = $result -> fetch_assoc();
    echo '<pre>';
        print_r($row);
    echo '</pre>';

    echo '<ul>Rekord nr 1:';
    echo '<li>' . $row['NR_SAMOCHODU'] . '</li>';
    echo '<li>' . $row['MARKA'] . '</li>';
    echo '<li>' . $row['TYP'] . '</li>';
    echo '<li>' . $row['ROK_PROD'] . '</li>';
    echo '<li>' . $row['KOLOR'] . '</li>';
    echo '<li>' . $row['PRZEBIEG'] . '</li>';
    echo '</ul>';
};

foreach($row as $key => $value){
    echo '<li><b>' . $key . '</b>: ' . $value . '</li>';
};

$obj = $result -> fetch_object();
echo '<pre>';
    print_r($obj);
echo '</pre>';
echo 'Marka: ' . $obj -> MARKA . '<br>';

while($row = $result -> fetch_row()){
    echo $row[1]."<br>";
}

$result -> close();
$conn -> close();
?>