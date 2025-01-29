#include <iostream>

using namespace std;
// w int przechowujemy całości czyli cyfry jak damy int PIN to utnie nam 0 z przodu jak ktos ma pin 0521
// dlatego uzyjemy stringa jest to zmienna ale zamienia to na litery i zostaje taka jaka jest w orginale czyli zostawi 0521 bo potraktuje to jako litery a nie cyfry
string PIN;

int main(){
    cout << "Witaj w naszym naszym banku!" << endl;
    cout << "Podaj numer PIN:";
    cin >> PIN;

    if(PIN == "1729"){
        cout << "Poprawny PIN";
    }else{
        cout << "Błędny PIN";
    }
    return 0;
}