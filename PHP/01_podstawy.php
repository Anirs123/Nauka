<?php
        $kolor = 'red';
        echo "My first PHP script!";
        echo '<h1 style="color: red;">NAGLOWEK</h1>';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?= '<meta charset="UTF-8">' ?> <!-- zastępuje echo -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        echo "My first PHP script!";
        echo '<h1 style="color: blue;">NAGLOWEK</h1>';
        print "inna forma wyswietlania<br>";
        // phpinfo(); wyswietla informacje o php
        $zm = 12.20; 
        // zmienna zm
        echo 'print: ' . $zm * 7 . '<br>' . 'Ala' . $zm . '<br>';
        echo $zm * 2 . '<br>';
        $zm = 27;
        echo $zm . '<br>';
        $zm = "Ala ma kota";
        echo $zm . '<br>';

        print "<p>{$zm}</p>"; // "//" są opcjonalne
        print "<p>$zm</p>";
        echo '<p>Zmienna $zm zawiera ' . $zm . '</p>';
        echo '<p>Zmienna $zm zawiera $zm</p>';  
        // HEREDOC - kilkulinijkowy tekst nazwa jest wlasna w uchach "MOJA"
        echo <<< "HER"
            <p>
            zmienna $zm
            zawiera wartość {$zm}
            </p>
        HER;

        // NEWDOC - jak wyzej ale nie interpertuje zmiennych
        //wazne sa apostrofy gdy masz '' daje sam tekst gdy "" wartosci
        $t = <<< 'HER'
            <p>
            zmienna $zm
            zawiera wartosc ${zm}
            </p>
        HER;
        echo $t;
    ?>
    <p>pierwsza lekcja php</p>
    <style>
        body{
            background-color: <?= $kolor?>;
        }
    </style>
</body>
</html>