#include <iostream>

using namespace std;

string login, haslo;

int main(){
    cout << "Podaj login: ";
    cin >> login;
    cout << "Podaj haslo: ";
    cin >> haslo;
    if(login == "admin" && haslo =="szarlotka"){ //lub if((login == "admin") && (haslo == "szarlotka"))
        cout << "Poprawne dane logowania, Witaj!";
    }
    else{
        cout << "Nie udalo ci sie zalogowac!";
    }

    return 0;
}