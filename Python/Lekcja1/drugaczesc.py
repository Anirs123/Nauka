from copy import deepcopy

oceny = [4,5,3,2,1,6,4] #tablice są indeksowane od 0

print(oceny[0]) # wypisze nam pierwszą ocene czyli 4

oceny[3] = 5 #nadpisuje czwartą ocene czyli 2 na pięć
print(oceny[3])

for i in range(len(oceny)): #len() jest to dlugosc czyli mamy 7 ocen i wypisze nam tyle ile ich jest
    print(oceny[i], end=" ") #end=" " daje nam spacje po każdej ocenie

#SZYBSZY SPOSOB (pythonowy)

for ocena in oceny:
    print(ocena, end=" ")

for i, ocena in enumerate(oceny):
    print(i, oceny) # wyswietli nam ponumerowane oceny w kolejnosci i jakie to są

for i, ocena in enumerate(oceny):
    if i%2 == 0 and ocena > 3:
        print(i, ocena) # wyswietl oceny parzyste czyli podzielne przez dwa i większe od 3

#podnosimy kazda ocene o jedną
for i, ocena in enumerate(oceny):
    oceny[i] += 1

    #dodawanie oceny
    oceny.append(5) #dodawanie jednego elementu
    oceny.extend([3,1,2]) #dodawanie wiecej niz jednego elementu czyli rozszezanie
    oceny.insert(1,4) # dodawanie w dane miejsce w tym przypadku za pierwszym elementem dodajemy 4
    # oceny.remove(6) #usuwa szósty element z listy
    oceny.pop() #usuwa ostatni element z listy
    oceny.sort() #sortowanie ocen rosnąco
    oceny = sorted(oceny) #lepsze sortowanie
    oceny = sorted(oceny, reverse=True) #sortowanie od konca

    if 7 in oceny:
        print("Jest taka ocena") #sprawdza czy w ocenach znajduje sie ocena 7

print(oceny)
print(oceny.index(6)) #wyswietli nam na jakiej pozycji znajduje sie ocena 6

#listy dwuwymiarowe itp

oceny_all = [[1, 2, 3], [6,6,6], [3,3,4]]

print(oceny_all[0]) #wypisze pierwszą tablice w tablicy
print(oceny_all[0][0]) #wypisze pierwszy element w pierwszej tablicy w tablicy

for student in oceny_all:
    for ocena in student:
        print(ocena, end=" ")

oceny_2 = deepcopy(oceny_all) #deepcopy to kopia tabeli ale trzeba zaimportowac jej biblioteke
oceny_2[0][0]=123 #zmieniamy w tabeli 0 i pozycji zerowej coś co tam było na 123 w nowej tabeli o nazwie oceny_2
print(oceny_all)
print(oceny_2)

#sety
#sety działają tak że usuwają powtarzające się liczby
liczby = [1,2,2,4,6,7,3,1,3,6,9,6]
liczby = set(liczby) #zmieniamy liczby na setowe czyli przefiltrowane bez powtarzajacych sie
print(liczby)

#chcemy sprawdzic jakie wspolne oceny maja marek i kozak

oceny_kozak = [6,5,6,4,3,6,6,6,6]
oceny_marek = [1,2,3,2,1,1,2,3,2]

marek_set = set(oceny_marek)
kozak_set = set(oceny_kozak)
print(marek_set.intersection(kozak_set)) #intersection to porównanie i wyszukuje identycznych wartości
print(marek_set.difference(kozak_set)) #jakie oceny są u marka których nie ma kozak
#zmienienie setu na liste lub poukładanie listy czyli zrobienie jej w set i w liste 
oceny_kozak = list(set(oceny_kozak))
print(oceny_kozak)

#słownik
oceny_slownik = {} #tworzymy slownik
oceny_slownik["marek"] = [1,2,3,5,2,3] #dodajemy do slownika tabele marek i należy do niego tabela z ocenami
oceny_slownik['kozak'] = [6,6,6]
print(oceny_slownik['marek'])

for imie, oceny in oceny_slownik.items(): #przechodzimy przez marka i kozaka jest imie i oceny czyli dwa slowa kluczowe określające ich dwóch
    print(k, v)

for oceny in oceny_slownik.values(): #wypisze nam oceny dla kazdego z osob bez podawania kogo to są
    print(oceny)

#stringi
imie = "Szymon"
print(imie[0]) #wypisze pierwszą

if "S" in imie: #sprawdza czy jest S w imieniu
    print("Jest taka litera")

