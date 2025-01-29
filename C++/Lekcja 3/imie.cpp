#include <iostream>

using namespace std;

string imie;
int ile;

int main(){
    cout << "Podaj jak masz na imie: ";
    cin >> imie;
    cout << "Podaj ile razy calkowita: ";
    cin >> ile;
    for (int i=1; i<=ile; i++){
        cout << i << ". " << imie << endl;
    }
    return 0;
}