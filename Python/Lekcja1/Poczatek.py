print("siemanko")
# print wypisanie na ekranie

stan_konta = 1000
print(stan_konta)

stan_konta2 = input("podaj stan konta")
# input daje mozliwosc wpisania nam uzytkownikowi co chcemy

print(stan_konta2) # podaje stan konta wpisany przez uzytkownika

stan_konta2 = int(stan_konta2) # zmieniamy stan konta na liczbę całościową
stan_konta2 = stan_konta2 + 500*2 # dodajemy do stanu konta 1000 zl
print(stan_konta2) 
# int to liczba stała nie moze byc 3.5
# float to liczba zmienno przecinkowa czyli moze byc 3.5
# string ciąg znakow (łańcuch)
# char to jedna literka
# bool to prawda falsz

x = 9
y = x/2 # python automatycznie zmienia to na float dlatego wyswietla sie 4.5
print(y)

x = x**2 # dwie gwiazdki to potęgowanie i wyjdzie 81
print(x)
x = x**(1/2) # wyjdzie 3 bo pierwiastek z 9 to 3
print(x)

x = 9
x = x//2 #zmienia na int usuwa po przecinku (czyli na calkowite daje)
print(x)
x = 9
x = x/2 #zmienia to float
print(x)

temperature = -5
czy_szczesliwy = True

if temperature > 10 or czy_szczesliwy:
    print("wychodzimy")
elif temperature > -10 and czy_szczesliwy:
    print("ubierz sie cieplo")
else:
    print("nie wychodzimy")
# mozna dawac tez if not ...

for i in range(10): #range wybieramy ile razy ma sie nam wypisac cos w petli
    print(i) #wypisze od 0 do 9

for i in range(1,10): #1 z przodu to od jakiej cyfry zaczynamy liczenie
    print(i) #wypisze od 1 do 9

for i in range(1, 10, 2): #2 na koncu oznacza co ile cyfr ma wyswietlac
    print(i) #wypisze nam 1,3,5,7,9 czyli co druga cyfre od pierwszej

temperature = 15
while temperature > 10:
    print('temperatura jest ok', temperature) # i wypisujemy temperature
    temperature -= 1 # usuwamy po jednym co kazde przejscie pętli

for i in range(1, 10, 2):
    if i != 5: # jezeli i nie jest rowne 5 to wypisze nam pętle i pominie 5
        print(i)

for i in range(1, 10, 2):
    if i == 5: # jezeli i jest rowne 5 to pomijamy i idziemy do 7
        continue
    
    print(i)

for i in range(1, 10, 2):
    if i == 5:
        break #jezeli i jest rowne 5 to zatrzymuje nam petle
    
    print(i)
