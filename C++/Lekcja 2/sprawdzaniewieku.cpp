#include <iostream>

using namespace std;

int wiek;

int main(){
    cout << "Ile masz lat: ";
    cin >> wiek;
    
    // if(wiek >= 18){
    //     cout << "Jestes pelnoletni";
    // }
    // else{
    //     cout << "Nie jestes pelnoletni";
    // }
    // if(wiek >= 35){
    //     cout << "Mozesz kandydowac na prezydenta";
    // }
    // else{
    //     cout << "Nie mozesz kandydowac na prezydenta";
    // }
    
    if(wiek < 18){
        cout << "Nie jestes pelnoletni";
    }
    else if((wiek >= 18) && (wiek < 35)){
        cout << "Nie mozesz kandydowac na prezydenta ale jestes pelnoletni";
    }
    else{
        cout << "Mozesz kandydowac na prezydenta i jestes pelnoletni";
    }

    return 0;
}