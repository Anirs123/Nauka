<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <?php
        //Wersja z $_GET
        if(isset($_GET['liczba'])) //czy istnieje parametr ?liczba czyli czy zmienna jest zainicjowana
            $liczba = $_GET['liczba']; //skrypt.php?liczba=12
        else
            $liczba = 34327;
        if($liczba % 2 == 0) // ===; !== // '5' === 5
            echo '<h1 style="color: red;">Liczba ' . $liczba . ' jest parzysta</h1>';
            //echo '<h1 style="color: red;">Liczba $liczba jest parzysta</h1>';
        else
            echo '<h1>Liczba ' . $liczba . ' jest NIEparzysta</h1>';

        //<=> porównuje dwie wartosci zwraca 0 gdy sa rowne, -1 gdy lewa jest mniejsza od prawej, a 1 gdy prawa jest mniejsza od lewej. php >=7
        //var_dump podaje typ danych i zmienną
        var_dump(4 <=> 4); // resault: int(0)
        var_dump(4 <=> 7); // resault: int(-1)
        var_dump(4 <=> 2); // resault: int(1)
    ?>
</body>
</html>