#include <iostream> //include czyli włączać biblioteke w tym przypadku iostream jest to biblioteka strumieni danych czyli wyjścia wejścia

using namespace std; //używa przestrzeni nazw standardowych jezeli tego by nie było byśmy musieli pisać przed count std czyli std::count

int uczniowie, cukierki, x, y;
// int uczniowie; można osobno lub łącznie
// int cukierki;

int main() //główna funkcja (int to całkowita)
{
    cout << "Hello World" << endl; //cout oznacza console output czyli wyprowadzenie na konsole, a endl oznacza przejscie do nastepnego wiersza w konsoli (enter)
    // << - operator wysyłania danych do strumienia, oddzielają rzeczy w c++
    cout << "Ilu uczniow jest w twojej klasie:";
    cin >> uczniowie;//insturkcja wejścia
    cout << "Ile cukierkow kupila mama:";
    cin >> cukierki;

    x = cukierki/(uczniowie-1);

    cout << "cukierkow dla kazdego ucznia:" << x << endl;

    y = cukierki-x*(uczniowie-1);

    cout << "ile zostalo cukierkow jasiowi:" << y;
    return 0; // int zwraca na koniec 0 dla potwierdzenia, czyli zakończenie programu, wszystko po zakonczeniu sie nie wykona
}