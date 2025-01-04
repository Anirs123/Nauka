<?php>
    $a = 15;
    $b = 2;
    $c = $d = $e = 19;
    $g = $c / $a;
    echo $g;
    $mod = $e % $a; //reszta z dzielenia
    echo '<br>' . $mod . '<br>';

    /*
        RZUTOWANIE TYPU
            (int), (integer) - rzutuje do typu calkowitego
            (real), (double), (float) - rzutuje do typu rzeczywistego
            (string) - rzutuj do ciagu
            (array) - rzutuj do tablicy
            (object) - rzutuj do obiektu
    */
    echo 'Rzutowanie na int: ' . (int)$g . '<br>';
    echo 'Rzutowanie na real: ' . (double)$a . '<br>';

    $liczba = 10.7;
    settype($liczba, "integer");
    echo $liczba . '<br>';
    $liczba = "Ala ma kota";
    echo $liczba . '<br>';

    /*
		zmienne predefiniowane
			- DOCUMENT_ROOT â zwraca katalog główny serwera WWW, gdzie umieszczony jest skrypt,
			- HTTP_HOST â zwraca zawartość nagłówka âHostâ z aktualnego zapytania, jeśli taki istnieje,
			- HTTP_REFERER â zwraca adres strony (jeśli taka istniała), która przekierowała do przeglądarkę do naszej witryny. Wartość ta powinna być ustalona przez przeglądarkę, ale nie wszystkie aplikacje sobie z tym radzą. Zmienna ta jest używana często przy tworzeniu statystyk WWW,
			- HTTP_USER_AGENT â zwraca zawartość nagłówka âUser-Agentâ z zapytania, jeśli taki istnieje. Jest to ciąg informujący o przeglądarce, która została użyta do wyświetlenia bieżącej strony,
			- REMOTE_ADDR â zwraca adres IP użytkownika, który wyświetlił bieżącą stronę,
			- SCRIPT_FILENAME â zwraca ścieżkę do wykonywanego skryptu,
			- SERVER_ADMIN â zwraca adres administratora serwera WWW. Jeśli skrypt działa na wirtualnym serwerze, to będzie to wartość podana dla tego wirtualnego serwera,
			- SERVER_PORT â zwraca port na serwerze, którego użyto do połączenia. Dla standardowych połączeń będzie to wartość 80,
			- SERVER_SIGNATURE â zwraca ciąg zawierający wersję i nazwę wirtualnego hosta, który jest dodawany do stron generowanych przez serwer,
			- SCRIPT_NAME â zwraca ścieżkę do wykonywanego pliku. Jest to przydatne w wypadku skryptów odwołujących się do samych siebie.
		
			Powyższe zmienne wyświetlamy w następujący sposób:

	*/
	echo '<br>REMOTE_ADDR:' . $_SERVER['REMOTE_ADDR'] . '<br>';
	echo '<br>HTTP_USER_AGENT:' . $_SERVER['HTTP_USER_AGENT'] . '<br>';
	/*
		STAĹE
			__FILE__ â zawiera nazwę pliku, który jest akurat przetwarzany. Jeśli stała ta znajduje się w pliku, którego treść znajduje się w innym zbiorze (include), to również zwracana jest nazwa pliku podstawowego, gdzie użyto stałej,
			__LINE__â zawiera numer akurat przetwarzanej linii skryptu. Jeśli stała ta znajduje się w pliku, którego treść znajduje się w innym zbiorze (include), to również zwracany jest numer linii z pliku podstawowego,
			PHP_VERSION â zawiera wersję akurat używanego parsera PHP,
			PHP_OS â zawiera nazwę systemu operacyjnego, na którym uruchamiany jest parser PHP.

			Własne stałe można definiować funkcją define(), która pobiera dwa argumenty â nazwę stałej i jej wartość. Dla przykładu:

	*/
	
	define('HELLO', "Witam! w PHP");		//stała globalna
	define('BR','<br>');
	echo HELLO . BR; 
	const LANGUAGE = 'PHP';			//stała lokalna
	echo LANGUAGE;
	echo 'Skrypt: ' . __FILE__  . '<br>';
	
	echo '------------------------------------' . BR;
	echo 4 ** 2; // result: 16
	$a = 13;
	
	$w = 7 + $a++ - 10 + $a; //7 + 13 - 10 + 14
	echo '7' + 3 . '<br>';
	echo '$w = ' . $w . BR;
	$a += 2;
	$a -= 2;// $a = $a - 2
	$a *= 2;
	$a /= 2;
	$a %= 2;
	$a .= 'dalszy ciąg';

	echo '<br>' . $a . '<br>';
	$number = 3;
	echo $number **= 3; // result: 27

	++$a;	//Preinkrementacja	Zwiększa $a o jeden, a następnie zwraca $a.
	$a++;	//Postinkrementacja	Zwraca $a, a następnie zwiększa $a o jeden.
	--$a;	//Predekrementacja
	$a--;	//Postdekrementacja

	$a = 5;
	echo 'Powinno być 4: ' . --$a . BR; 
	$d = 7;
	$e = -3;
	$w = 5 + --$e + ++$d - $d--;
	echo '5 + --$e + ++$d - $d-- = ' . $w . BR;

	//operacje na wartościach - bez referencji
	$a = 5;
	$b = $a;	//$b jest kopią $a
	$a = 7;		//nie zmienia to wartości $b
	echo '$a przechowuje '.$a.', $b przechowuje '.$b.'<br />'; 	//oczekujemy wartości 7 oraz 5;
  
	//zastosowanie operatora referencji
	$a = 5;
	$b = &$a;		//$b wskazuje na ten sam adres pamięci co $a
	$a = 7;			//zmieniając $a zmieniamy wartość $b
	echo '$a przechowuje '.$a.', $b przechowuje '.$b.'<br />'; 	//oczekujemy wartości 7 oraz 7;
	
	$a = 3.25;
	$b = 0;//Uwaga - nie ma dzielenia przez zero!

	$c = @($a / $b);//brak komunikatu o błędzie
	echo 'Błąd został stłumiony';

	echo '<br>';
	$c = $a / $b;//powinien być komunikat o błędzie

	echo 'cdn...';
?>