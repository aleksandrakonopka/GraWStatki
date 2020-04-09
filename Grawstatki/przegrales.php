<?php
session_start();
if(!isset($_SESSION['lost']))
{
    header("Location:index.php");
    exit;
}

unset($_SESSION['lost']);
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Przegrana!</title>
	<style>
	#tresc
	{
		width:500px;
		height:200px;
		font-size:30px;
		margin-left:auto;
		margin-right:auto;
		margin-top:250px;
		background-color:#f1f7ca;
		opacity:0.7;
		border-radius:10px;
		text-align:center;
		padding-top:30px;
	}
	body
	{
		background-image: url("img/statek2.jpg");
		background-repeat: no-repeat;
		background-attachment: fixed;
		background-size: cover;
		height:100%;
		width:100%;
	}
	a
	{
	text-decoration:none;
    color:#5f6825;	
	}
	a:hover
	{
		letter-spacing:2px;
	}
	</style>
</head>

<body>
<div id="tresc">

	<audio autoplay loop>
		<source src="audio/fight.mp3" type="audio/mpeg">
		Your browser does not support the audio element.
	</audio>
	
    Przegrałeś, </br>
	statki pirata Jonesa zostały zniszczone!
    <br/>
	<br/>
    <a href="index.php">Nowa gra</a>
</div>
</body>
</html>
