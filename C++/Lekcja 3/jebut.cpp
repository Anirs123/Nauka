#include <iostream>
#include <windows.h> //biblioteka z poleceniami typu Sleep
#include <cstdlib> //biblioteka poleceń cmd

using namespace std;

int main(){
    for (int i=15; i>=0; i--){
        Sleep(1000); //1000 milisekund czyli 1 sekunda | polecenie Sleep powoduje czekanie jeden sekundy w tym wypadku
        system("cls"); //czyszczenie ekranu dla lepszego wyglądu wyswietlania sekund
        cout << i << endl;
    }
    cout << "JEBUT!";
    return 0;
}