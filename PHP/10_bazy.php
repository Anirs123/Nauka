<?php
session_start();
$loginX = 'user';
$hasloX = '123';
//spr opcji wywolania strony

    $op = $_GET['op'] ?? 'wstep';

    switch($op){
        case 'wstep':
            $tresc = '<header>
                        <h3>Wstęp</h3>
                    </header>
                    <div>
                        <p>Cus wartego uwagi</p>
                    </div>';
 
                    /*'<article>
                    <header class="head_art">
                        <h1>Wstęp</h1>
                    </header>
                    <section class="sec_art">
                        <p>Strona prezentująca prostysystem wyświtlania</p>
                    </section>
                    <footer class="foot_art">
                        <p>Try it ...</p>
                    </footer>
                    </article>';*/
        break;
        case 'm1':
            $tresc = '<p>Wybrano menu 1</p>';
        break;
        case 'm2':
            $_SESSION['op'] = $op;
            if($_SESSION['zalogowany'])
                $tresc = '<h2>Wybrano menu 2</h2>';
            else
                header("Location: ?op=formLog"); //funkcja wyslania naglowka do przegladarki
        break;
        case 'm3':
            $_SESSION['op'] = $op;
            if($_SESSION['zalogowany'])
                $tresc = '<h2>Wybrano menu 3</h2>';
            else
                header("Location: ?op=formLog"); //funkcja wyslania naglowka do przegladarki
        break;
        case 'formLog':
            $tresc = '<h2>Wymagane logowanie</h2><p>user 123</p>
                <form id="formularz" method="post" action="?op=loguj">
                    <div>
                        <div>
                            <label for="login">Login:</label>
                            <input type="text" id="login" name="login" required>
                        </div>
                        <div>
                            <label for="haslo">Haslo:</label>
                            <input type="password" id="haslo" name="haslo" required>
                        </div>
                        <div>
                            <input type="submit" value="Zaloguj">
                        </div>
                    </div>
                </form>';
        break;
        case 'loguj':
            if(isset($_POST['login']))
                $login = $_POST['login'];
            else
                $login = '';
            if(isset($_POST['haslo']))
                $haslo = $_POST['haslo'];
            else
                $haslo = '';
            //czy zalogowano poprawnie
            if($login == $loginX && $haslo == $hasloX){
                $_SESSION['zalogowany'] = true;
                header("Location: ?op=" . $_SESSION['op']);
            }
            else{
                $tresc = 'ZLy login lub hasło!';
            }
        break;
        case 'wyloguj':
            $_SESSION['zalogowany'] = false;
            unset($_SESSION['zalogowany']);
            $session_destroy;
            header("Location: ?op=wstep");
        break;
        default:
            $tresc = '<h1>Nie ze mna te numery Bruner!!! Mam twoj adres IP: ' . $_SERVER['REMOTE_ADDR'] . '</h1>';
    }
?>
<!doctype html>
<html lang="pl">
<head>
    <title>Strona z logowaniem</title>
    <meta charset="utf-8">
</head>
<style>
    body{
        background-color: wheat;
    }
    .oko3{
        margin: auto;
        padding: auto;
        background-color: lightgray;
        width: 1400px;
        padding: 5px;
    }
    .oko1{
        font-size: 40px;
        text-align: right;
        margin-right: 10px;
    }
    .oko2{
        font-size: 20px;
        text-align: right;
        margin-right: 10px;
    }
    .contener{
        background-color: burlywood;
        padding: 10px;
        width: 150px;
        margin-left: 227px;
        float: left;
        clear: both;
    }
    .contener2{
        background-color: wheat;
        width: 1212px;
        height: 400px;
        padding: 10px;
        float: left;
        border-left: 4px solid black;
        border-right: 4px solid black;
    }
</style>
<body>
    <header class="oko3">
        <p class="oko1"><b>Strona z logowaniem</b></p>
        <p class="oko2">wykorzystnie mechanizmu sesji</p>
        <p class="oko2">by Szymon</p>
    </header>
    <div class="contener">
        <p>Menu strony</p>
        <ul>
            <li><a href="?op=wstep">Wstep</a></li>
            <li><a href="?op=m1">Opcja 1</a></li>
            <li><a href="?op=m2">Opcja 2</a></li>
            <li><a href="?op=m3">Opcja 3</a></li>
        </ul>
        <?php
            if(isset($_SESSION['zalogowany']) && $_SESSION['zalogowany'] == true){
                echo '<button><a href="?op=wyloguj">Wyloguj</a></button>';
            }
        ?>
    </div>
    <div class="contener2">
        <?=$tresc;?>
    </div>
</body>
</html>