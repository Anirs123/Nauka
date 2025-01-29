#include <iostream>

using namespace std;

int populacja=1; int godzin=0;

int main(){
    //while
    while(populacja<=1000000000){
        godzin++;
        populacja = populacja*2;

        cout << "Minelo godzin: " << godzin << endl;
        cout << "Liczba bakterii: " << populacja << endl;
    }
    
    //do .. while - polega na tym ze wykona sie przynajmniej raz nawet jezeli nie spelnia warunków a samo while nie wykona sie jezeli nie spelni warunkow
    do
    {
        /*godzin++;
        populacja = populacja*2;

        cout << "Minelo godzin: " << godzin << endl;
        cout << "Liczba bakterii: " << populacja << endl;*/
    } while (populacja<=1000000000);
    
    return 0;
}