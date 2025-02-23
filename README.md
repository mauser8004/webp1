
Web-programozás 1 – gyakorlat Beadandó feladat 

Alakítsanak ki két-fős csoportokat a gyakorlati csoportban és a feladatot közösen, projektmunkában oldják meg. A dokumentációban majd írják le, hogy a két főből ki melyik feladatrészt csinálta meg. 
Ha valaki nem talál társat (pl. páratlanul vannak a csoportban), a GitHub-os feladatot akkor is projektmunkában csinálja meg két GitHub fiókot felhasználva.

Tetszőleges témájú honlap készíthető. A dokumentum végénél a Mellékletben talál példákat.

Összesen: 30 pont

Ha a Kötelező elem - el jelzett feladatok nincsenek megvalósítva, akkor a többi feladat nem kerül értékelésre.

A feladathoz segítséget a következő oldalon talál!

    1. Valósítsa meg a weboldalt a Front Controller dinamikus tervezési minta (Kötelező elem!) alkalmazásával:											
- minden menüpont esetén az index.php fájlt hívja meg
- menüneveket és közös adatokat konfigurációs fájlból olvassa be egy TÖMB-ből (array).
    2. Alkalmazásában használjon Reszponzív tervezést.						(3 pont)
    3. A forráskód a lehető legjobban használja ki a HTML5 lehetőségeit. Az oldalon vízszintes menüt használjon.											(3 pont)
    4. Regisztráció, Belépés, Kilépés. (Kötelező elem!)						
Legyen a honlapon Belépés és Kilépés menüpont a következők szerint:
a) A „Belépés” menüpont akkor látható, ha nincs bejelentkezve a felhasználó.
b) A „Kilépés” menüpont akkor látható, ha be van jelentkezve a felhasználó.
c) A „Belépés” menüpontra kattintva feljön egy oldal, ahol lehet bejelentkezni vagy regisztrálni.
d) Regisztrációkor nem léptetjük be automatikusan a felhasználót.
e) A rendszer fejlécen jelenítse meg a bejelentkezett felhasználót, ha be van lépve, a következő formában: Bejelentkezett: Családi_név Utónév (Login_név)	
    5. Főoldal menü: Készítsen egy látványos oldalt a téma bemutatására. 				(3 pont)
Tegyen az oldalra két videót, egyet saját könyvtárából, és egyet szolgáltatótól  (pl. Youtube), és a saját könyvtárában lévő video ne legyen több mint 5 mp, a méretkorlát miatt. 
Az oldalra tegyen egy Google térképet is, ami megmutatja a választott weboldal fizikai címét. 	
    6. Képek menü: képek, képgaléria tárolására. 							(3 pont)
Legyen lehetőség új képek feltöltésére. Képfeltöltést csak bejelentkezett felhasználó tehet meg.  	
    7. Kapcsolat menü: tartalmazzon egy kapcsolat űrlapot, 					(3 pont)
amelynek segítségével üzenetet lehet küldeni az oldal tulajdonosa számára. Jelenítse meg az adatokat egy új (ötödik) oldal tartalmaként és mentse le adatbázisba is. Ellenőrizze megfelelően az űrlap helyes kitöltését. Az ellenőrzést végezze el kliens- és szerveroldalon is (JavaScript, PHP). A HTML kódban ne ellenőrizze az űrlap adatait.	
    8. Üzenetek menü: Tegye lehetővé megtekinteni táblázatban az előző pontban elküldött üzeneteket az adatbázisból fordított időrend szerint (a legfrissebb legyen elől). 				(3 pont)
Ezt a menüpontot csak bejelentkezett felhasználó láthatja. Írják minden üzenethez a küldés idejét és az üzenetküldő nevét. Ha nem bejelentkezett felhasználó írta, akkor: "Vendég"					
    9. Alkalmazását töltse fel és valósítsa meg Internetes tárhelyen is. Bármelyik tárhely-szolgáltatót használhatja. (Kötelező elem! A működés ez alapján lesz javítva) 				(3 pont)
    10. Használja a GitHub verziókövető rendszert							(3 pont)
(Kötelező elem! A forrás ez alapján lesz javítva) Ne csak a kész alkalmazást töltse fel egy lépésben, hanem a részállapotokat is legalább 5 lépésben, időben arányosan elosztva. 
    11. A GitHub-on a projektmunka módszert alkalmazzák: látszódjék, hogy a csoport tagjai melyik részt készítették el.											(3 pont)
A GIT-en saját nevet válasszanak, ami alapján be lehet azonosítani, hogy ki mit töltött fel.

Készítsen legalább 15 oldalas dokumentációt (PDF formátumban), 				(3 pont)
amiben bemutatja az alkalmazás működését képernyőképekkel. (Kötelező elem! a feladat ez alapján lesz javítva). A dokumentációban adja meg a weboldal és a GitHub projektjének URL címét és írja le részletesen, hogy az előző feladatpontokat az alkalmazásban hogy és hol valósította meg. Fontos, hogy ez utóbbit leírja a dokumentációban, mert a feladat ez alapján lesz javítva. A dokumentációban adja meg az internetes tárhely és adatbázis belépéséhez szükséges FTP és URL címet, felhasználónevet és jelszót, ami szükséges a megoldás ellenőrzéséhez.

Be kell adni a Teams-en keresztül a dokumentációt. Csak a dokumentációt kell beadni, egyéb fájlokat nem! Akik közösen csinálják a feladatot, mindenki adja be a dokumentációt.

Segítség az egyes részekhez

A gyakorlaton bemutatott Front-controller tervezési minta feladatnak abból a megoldásából érdemes kiindulni, amelyikben meg van valósítva a Belépés, Kilépés, Regisztráció, és ezt továbbfejleszteni az aktuális feladatnak megfelelően. Abban a következő feladatpontok már meg vannak valósítva, így nem kell ezekkel dolgoznia (ezért nem jár értük külön pont): Front-controller tervezési minta, Belépés, Kilépés, Regisztráció.

Feladatrész
Fejezet a gyakorlati anyagban
Front Controller tervezési minta
PHP - front-controller tervezési minta
Vízszintes menü
1. gyakorlat– HTML – CSS (több feladatban is van)
Google térkép
2. gyakorlat
Képek, galéria, képfeltöltés
PHP – képek, galéria, képfeltöltés
Adatbázis használat
PHP – Adatbázis használat-…
Regisztráció, Belépés, Kilépés
PHP - front-controller tervezési minta
PHP – Adatbázis használat – Belépés / Regisztráció
Űrlap ellenőrzés kliens és szerver oldalon
JavaScript, PHP ellenőrzés:
PHP, Javascript, HTML, CSS fejezet
Reszponzív tervezés
Reszponzív tervezés
Tárhely használat
Tarhely-hasznalat-Nethely.docx
GitHub használat
GITHUB használat.docx

Internetes tárhelynél az adatbáziselérés beállításai
A tárhelyre való regisztráció után vagy megkapják a következő pirossal jelzett adatokat, vagy maguk tudnak adatbázist ott létrehozni.
A php fájlokban ezt kell megváltoztatni a belépéshez:
$dbh = new PDO('mysql:host=localhost;dbname=adatb', 'adatbf', '****',
                            array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
localhost: a hosthoz itt is ezt kell beírni.
adatb: az adatbázis neve a tárhelyen
adatbf: az adatbázis felhasználó neve az adatbázisban
'****': a felhasználó jelszava

Melléklet
Példa weboldal témákra:
    1. egyszerű egy- vagy kétszemélyes játék
    2. tanulást segítő oldal ellenőrző feladatokkal
    3. természettudományos szimulációk állítható paraméterekkel
    4. hobbit bemutató oldal felhasználói interakcióval
    5. kereskedelmi célú oldal
    6. oltópont,   
    7. webshop,   
    8. idősek otthona (gyógyszerek, ételek, időpontok),   
    9. vállalatirányítási rendszer (számlák, rendelések),   
    10. munkaidő-nyilvántartó rendszer,   
    11. munkaerő-nyilvántartó rendszer,   
    12. kutatások nyilvántartása,   
    13. flottakezelő rendszer,   
    14. autókereskedés,   
    15. filmes adatbázis,   
    16. állatkereskedés,   
    17. menhelyi nyilvántartó,   
    18. eszközleltár,   
    19. biztosítási rendszer (szerződések, káresemény, biztosítási összeg, biztosítás fajtája),   
    20. foglalási rendszer,   
    21. utazási iroda,   
    22. építőipari projekt rendszere,   
    23. könyvtári nyilvántartó,   
    24. egyéni költségeket nyilvántartó rendszer,   
    25. valutaváltó,   
    26. vonatjegy applikáció,   
    27. ételrendelő applikáció,   
    28. szolgáltatásrendelő (fodrászat, időpontkezelés, szolgáltatások),   
    29. mesterember app (kit, mikor lehet hívni),  
    30. tanulónyilvántartó rendszer (NEPTUN),  
    31. kedvezményes kuponokat gyűjtő app (milyen termék, milyen kedvezmény),  
    32. ticketing (hibabejelentő rendszer),  
    33. online kurzusok (e-learning menedzsment rendszer, LMS),  
    34. telefonflotta nyilvántartása,  
    35. elektromos művek ügyfélnyilvántartója,  
    36. nyelvtanár-nyilvántartó,  
    37. ételkiszállítás/ételfutár app (Teletál, Netpincér),  
    38. konferencia-nyilvántartó,  
    39. receptgyűjtemény



