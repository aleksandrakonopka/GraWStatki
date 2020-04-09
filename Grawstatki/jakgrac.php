<!DOCTYPE HTML>
<html lang="pl">
<head>
<meta charset="utf-8" />
	<title>Gra w Statki</title>
	<meta name="description" content="Przed Tobą gra w statki" />
	<meta name="keywords" content="statki,gra" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<style>
	a
	{
		font-size:25px;
		text-decoration: none;
		color: grey;
	}
	a:hover
	{
		letter-spacing:3px;
		color:green;
	}
	</style>
</head>
<body>
<b>Jak grać:</b>
Gra polega na zestrzeleniu wszystkich wrogich statków na morzu.</br>
Strzelamy przez naciśnięcie jednego z niebieskich pól.</br>
Statki są tak rozmieszczone, że żaden nie styka się z innym.</br>
Statki są losowo rozmieszczane na planszy.</br>
Statki są ustawione poziomo i pionowo.</br>
Za każdym razem posiadasz 30 kul armatnich, wykorzystaj je dobrze.</br>
Jeśli trafisz we wszystkie statki wygrywasz.</br>
Powtórny strzał w to samo miejsce na statku nie pomoże Ci w wygranej,</br>
a jedynie zmarnuje Twoją amunicję.</br></br>

<b>O budowie gry:</b></br>
Za każdym razem generowana jest nowa plansza ze statkami,</br>
które generowane są za pomocą napisanego przeze mnie algorytmu.</br>
Plansza to zbiór zer i jedynek, jedynki oznaczają pole na którym jest statek, </br>
natomiast zera to morze.</br>
Trafienie w morze uruchamia dźwięk szumu oceanu, a na pod planszą pojawia się napis "Plusk"</br>
Trafienie w statek uruchamia dźwięk strzału, a powtórne naciśnięcie tego samego pola ukarze komunikat</br>
o tym, iż marnujesz amunicję. Gdy wygrasz przekierowany zostajesz do pliku </br>
dostępnego tylko dla wygranego gracza, a twój wynik zapisze się w bazie</br>
i zapisany w tabeli rankingowej odpowiednio posortowanej </br>
(najlepiej gdy jest najmniej strzałów, wtedy wynik jest wyżej w rankingu).</br>
Koniec amunicji oznacza przekierowanie gracza do pliku dostępnego tylko dla gracza przegranego,</br>
jego wynik nie zostaje zapisany, a grę można zaczynać od początku.</br>
Jeżeli wygrasz i użyłeś takiego nickname'u jakiego użyłeś poprzednio,
oraz Twój wynik będzie lepszy od poprzedniego, Twój wynik zostanie nadpisany i poprawi Twoje miejsce w rankingu. </br>
</br>
</br>
<b><a href="index.php">Wróć</a></b>
</body>