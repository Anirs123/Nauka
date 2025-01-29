#include <iostream>
#include <cstdlib>
#include <time.h>
#include <stdio.h>

using namespace std;

int liczba, trafienie, ile_prob=0;

int main()
{
    cout << "Witaj wygenerowalem liczbe z zakresu od 1 do 100" << endl;
    srand(time(NULL)); //srand - zacznij generowac liczby losowe
    liczba = rand()%100+1;

    while(trafienie != liczba){ //uruchamia to ponownie jezeli trafienie nie jest takie jak liczba
        ile_prob++;
        cout << "Zgadnij jaka liczba: Jest to twoja " << ile_prob << " proba" << endl;
        cin >> trafienie;
        if(trafienie == liczba){
            cout << "Udało ci się wygrales! Wygrywasz w " << ile_prob << " probie" << endl;
        }
        else if(trafienie > liczba){
            cout << "To za duza liczba" << endl;
        }
        else if(trafienie < liczba){
            cout << "Podales za mala liczba" << endl;
        }
    }

    system("pause"); //zatrzymanie programu na ekranie (zaczekanie na enter) mozna uzyc getchar(); zamiast system("pause")
    return 0;
}