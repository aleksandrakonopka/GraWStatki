<?php
session_start();

if(!isset($_SESSION['win']))
{
    header("Location:index.php");
    exit;
}
if(!isset($_SESSION['punkty'])) 
{
	$_SESSION['blad']="Punkty nie są ustawione!";
	header("Location:index.php");
	exit();
} 

$nickname=$_SESSION['nickname'];
$punkty=$_SESSION['punkty'];
date_default_timezone_set('Europe/Warsaw');
$data= date("Y-m-d H:i:s");

unset($_SESSION['nickname']);
unset($_SESSION['punkty']);

//echo $nickname;
//echo $punkty;
//echo $data;

require_once("connect.php");

$connection = new mysqli($host, $user, $password, $dbName);
$connection -> set_charset("utf8");

if($connection->connection_errno != 0)
{
	echo $connection->connection_errno;
	//echo "Nie laczy sie z baza";
}
else
{
	/*jeśli w bazie jest ten gracz i ma wiecej strzałów to zastąp go tym wynikiem, a jeśli nie to wrzyć to co wyszło */
	 $czyjest= $connection->query("SELECT * FROM ranking WHERE nickname='$nickname'");
   
   if($czyjest->num_rows > 0) 
   {
	 //echo "Jest taki uzytkownik zapisany";
	 /*wyswietla sie powyższe*/
	 $pkt=$connection->query("SELECT punkty FROM ranking WHERE nickname='$nickname'");
	 $tab=$pkt->fetch_all(MYSQLI_ASSOC);
	 echo "</br>";
		 if($tab[0]['punkty']>$punkty)
		 {
			 /*tu nie wchodzi*/
			 //echo "Nowy rekord!";
			 $connection->query("UPDATE ranking SET punkty='$punkty', data='$data' WHERE nickname='$nickname'");
			 
		 }
	 unset($pkt);
	 unset($tab);
   } 
   else
   {
		$sql="INSERT INTO ranking VALUES ('$nickname','$punkty','$data')";
		if($connection->query($sql))
		{
			//echo "Twój wynik został zapisany!";
		} 
		else
		{
				echo $sql;
				//echo "Nie dziala";
		}
		unset($sql);
   }
}

$connection->close(); 

unset($nickname);
unset($punkty);
unset($data);

unset($_SESSION['win']);
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wygrałeś!</title>
	<style>
	#tresc
	{
	width: 500px;
    height: 200px;
    font-size: 30px;
    margin-left: auto;
    margin-right: auto;
    margin-top: 50px;
    opacity: 0.7;
    background-color: #d9f7f1;
    text-align: center;
    padding-top: 20px;
	padding-bottom: 20px;
    border-radius: 10px;
	}
	body
	{
		background-image: url("img/jones.jpg");
		background-repeat: no-repeat;
		background-attachment: fixed;
		background-size: cover;
		height:100%;
		width:100%;
	}
	
	a
	{
		color:#33755a;
		text-decoration:none;
	}
	a:hover
	{
		letter-spacing:2px;
	}
	</style>
</head>

<body>

<audio autoplay loop>

	<source src="audio/jones.mp3" type="audio/mpeg">
	Your browser does not support the audio element.
	
</audio>

<div id="tresc">
    Wygrałeś, gratulacje!</br>
	Ocaliłeś moją flotę!</br>
	Zapraszam Cię na makaron po bolońsku :)
	</br>
    <br/>
    <a href="index.php"><b>Nowa gra</b></a>
	</div>
	
</body>
</html>
