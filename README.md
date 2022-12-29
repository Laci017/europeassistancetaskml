Feladat

1.	Készíts egy feladat kezelő Laravel alkalmazást, melyet kizárólag autentikáció után lehet csak elérni.
2.	Legyen lehetőség regisztrációra a kezdő oldalon.
3.	Bejelentkezés után az oldal listázza adatbázisból az elérhető feladatokat a következő paraméterekkel:
a.	Feladat neve
b.	Határidő (meddig kell befejezni)
c.	Leírás
d.	Prioritás
e.	Állapot (bejelentve, hozzáadva valakihez, folyamatban, tesztelhető, kész)
f.	Feladathoz rendelt személy (felhasználó)
g.	Feladat létrehozója (felhasználó)
4.	Minden feladat paraméter adatbázisból legyen lekérdezve, a prioritásokat, személyeket és állapotot külön táblák tartalmazzák. Legyen olyan feladat, ahova több személyt is hozzá lehet rendelni.
5.	Az adatbázishoz készíts seeder-eket.
6.	Legyen lehetőség feladatot felhasználóhoz rendelni. A feladat hozzárendelés után mentődjön adatbázisba, hogy melyik felhasználó melyik feladathoz lett hozzárendelve.
7.	A front end design-ra nem kötelező hangsúlyt fektetni, de használhatsz bármilyen keretrendszert / library-t.
8.	Töltsd fel az alkalmazást github-ra és küldj rövid telepítési útmutatót.

Telepítési útmutató: 

InnoDB adatbázis létrehozása: europe_assistance_db
.env környezeti beállítások ellenőrzése
composer install
php artisan migrate
php artisan db:seed
npm install
npm run watch
