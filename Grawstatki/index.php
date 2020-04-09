
<?php
session_start();
/* nie mozna sie dostac jesli gram*/
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
<meta charset="utf-8" />
	<title>Gra w Statki</title>
	<meta name="description" content="Przed Tobą gra w statki" />
	<meta name="keywords" content="statki,gra" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<link rel="stylesheet" href="style.css" type="text/css" />
	<style>
	#srodek
	{
		width:400px;
		height:250px;
		font-size:30px;
		margin-left:auto;
		margin-right:auto;
		margin-top:200px;
		text-align:center;
		border:2px solid #9dc4bb;
		background-color:white;
		opacity:0.85;
		padding-top:35px;
		border-radius: 8px;
	}
	#ranking
	{
		width:500px;
		min-height:200px;
		font-size:30px;
		margin-left:auto;
		margin-right:auto;
		margin-top:200px;
		text-align:center;
		border:2px solid black;
		text-align:center;
		background-color:white;
		opacity:0.7;
	}
	td
	{
		width:166px;
		height:30px;
	}
	body
	{
		background-image: url("img/statek.png");
		background-repeat: no-repeat;
		background-attachment: fixed;
		background-size: cover;
		height:100%;
		width:100%;
	}
	
	input[type=text]
	{
		width: 300px;
		background-color: #daefeb;
		color: #666;
		border: 2px solid #ddd;
		border-radius: 5px;
		font-size: 20px;
		padding:10px;
		box-sizing: border-box;
		outline: none;
		margin-top:10px;
	}
	
	input[type=text]:focus
	{
		box-shadow: 0px 0px 10px 2px #cccccc;
		-moz-box-shadow: 0px 0px 10px 2px #cccccc;
		-webkit-box-shadow: 0px 0px 10px 2px #cccccc;
		border: 2px solid #caf7ec;
		background-color:#9dc4bb;
		color:#5b6d6d;
		
	}

	input[type=submit]
	{
		width: 300px;
		background-color:#59a893;
		font-size:20px;
		color: white;
		padding: 15px 10px;
		margin-top: 20px;
		border: none;
		border-radius: 5px;
		cursor: pointer;
		letter-spacing: 2px;
	}
	input[type=submit]:focus
	{
		box-shadow: 0px 0px 15px 5px #cccccc;
		-moz-box-shadow: 0px 0px 15px 5px #cccccc;
		-webkit-box-shadow: 0px 0px 15px 5px #cccccc;
	}
	input[type=submit]:hover
	{
		background-color:#6ec9b1;
	}
	#jak
	{
		font-size:25px;
		margin-top:30px;
		padding:30px;
		background-color: white;
		opacity:0.8;
		text-align:center;
		width:500px;
		height:200px;
		margin-left:auto;
		margin-right:auto;
	}
	a
	{
		text-decoration:none;
		color:grey;
	}
	a:hover
	{
		letter-spacing:3px;
		color:green;
	}
	</style>
</head>

<body>
<audio autoplay loop >
  <source src="audio/ptaki.mp3" type="audio/mpeg">
Your browser does not support the audio element.
</audio>
<?php
if(isset($_SESSION['blad']))
{
	echo $SESSION['blad'];
	unset($_SESSION['blad']);
}
?>
<div id="srodek">
<form action="gra.php" method="post">
    Zniszcz wrogie statki <br/>
	i uratuj pirata Jonesa! <br/><br/>
	
<input type="text" name="nick" required="required" placeholder="Nickname"/> <br/>
<input type="submit" value="Nowa gra" name="nowa"/>
<!-- Ranking z ostatniego tygodnia -->
</form>
</div>
	<div id="ranking">
	<b>Tabela wyników:</b>
	<table>
	<tr><td>Gracz</td><td>Strzały</td><td>Data</td></tr>
<?php
require_once("connect.php");
$connection = new mysqli($host, $user, $password, $dbName);
$sql="SELECT * FROM ranking ORDER BY punkty ASC;";
$query = $connection->query($sql);
$table = $query->fetch_all(MYSQLI_ASSOC);
foreach($table as $i)
{
 echo '<tr><td>'.$i['nickname'].'</td><td>'.$i['punkty'].'</td><td>'.$i['data'].'</td></tr>';
  
}
$connection->close();
?>
	</table>	
	</div>
	<div id="jak">
	Kliknij tu aby dowiedzieć się jak grać w zniszcz-statki, </br>
	oraz poznać ciekawe informacje na temat budowy gry </br></br>
	<b><a href="jakgrac.php">Jak grać</a></b>
	</div>
</body>

</html>