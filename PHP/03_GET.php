<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <a href="?kolor=green">green</a><br>
    <a href="?kolor=blue">blue</a><br>
    <a href="?kolor=red">red</a><br>
    <?php
        //Wersja z $_GET
        if(isset($_GET['kolor']))
            $kolor = $_GET['kolor'];
        else
            $kolor = 'black';
        echo '<h1>Nazwa skryptu ' . $_SERVER['SCRIPT_FILENAME'] . '</h1>';
    ?>
    <style>
        body{
            background-color: <?= $kolor?>;
            color: white;
        }
    </style>
</body>
</html>