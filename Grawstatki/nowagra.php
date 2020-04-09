<?php
    session_start();
if(!isset($_SESSION['rdyTab']) or !isset($_SESSION['punkty']))
{
    header("Location:index.php");
    exit;
}

/*legenda:
0-morze
1-statek
2-tu juz strzelales(w statek)
inf amunicji
gra sie konczy gdy nie ma w tabeli 1
*/

if(isset($_GET['x']) and isset($_GET['y']))
{
    $x = $_GET['x'];
    $y = $_GET['y'];
	
	unset($_GET['x']);
	unset($_GET['y']);
    
    $_SESSION['punkty']+=1;
    if($_SESSION['tab'][$x][$y]==0)
    {
        $dzwiek="Plum</br>";
		echo '<audio autoplay>';
		echo '<source src="audio/fale.mp3" type="audio/mpeg">';
		echo 'Your browser does not support the audio element.';
		echo '</audio>';
    }
    else if($_SESSION['tab'][$x][$y]==1)
    {
        $dzwiek="Bum!</br>";
		
		echo '<audio autoplay>';
		echo '<source src="audio/strzal.mp3" type="audio/mpeg">';
		echo 'Your browser does not support the audio element.';
		echo '</audio>';
		
        $_SESSION['tab'][$x][$y]=2;   
    }
    else
    {
        $dzwiek="Tu już trafiałeś! Nie marnuj amunicji!</br>";
		
		echo '<audio autoplay>';
		echo '<source src="audio/fale.mp3" type="audio/mpeg">';
		echo 'Your browser does not support the audio element.';
		echo '</audio>';
    }
    
	unset($x);
	unset($y);
	
    if($_SESSION['punkty']>30)
    {
        
        $_SESSION['lost']=TRUE;
        header("Location:przegrales.php");
        unset($_SESSION['punkty']);
		unset($_SESSION['nickname']);
        exit;
    }

    for($i=1;$i<7;$i++)
    {
        for($j=1;$j<7;$j++)
        {
            if($_SESSION['tab'][$i][$j]==1)
            $a=1; 
        }
    }
    
    if(!isset($a))
    {
       $_SESSION['win']=TRUE;
        header("Location:wygrales.php");
        exit; 
    }

}


?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gra</title>
	<style>
	#plansza
	{
		width:600px;
		height:600px;
		padding:30px;
		margin-left:auto;
		margin-right:auto;
		background-color:white;
		opacity:0.7;
	}
	.pole
	{
		background-color:#327a75;
		width:80px;
		height:80px;
		transition: all 0.2s ease-in-out;
		
	}
	.pole:hover
	{
		background-color:#56b7b0;
		opacity:0.8;
		-webkit-transform: scale(0.9);
		-ms-transform: scale(0.9);
		transform: scale(0.9);
	}
	#ile
	{
		margin-top:30px;
		width:500px;
		height:75px;
		padding:20px;
		margin-left:auto;
		margin-right:auto;
		font-size:30px;
		background-color: white;
		opacity:0.8;
		text-align:center;
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
	
	</style>
</head>

<body>


<div id="plansza">
    <table>
        <?php
        for($i=0;$i<7;$i++)
        {
            echo '<tr>';
            for($j=0;$j<7;$j++)
            {
                echo '<td><a href="http://zniszcz-statki.cba.pl/nowagra.php?x='.$i.'&y='.$j.'"><div class="pole"></div></a></td>';
            }
            echo '</tr>';  
        }
        
        ?>
    </table>
	</div>
	<div id="ile">
	<?php
	if(isset($dzwiek))
    {
    echo $dzwiek;
    unset($dzwiek);
    }
    echo "Strzelałeś tyle razy: ".$_SESSION['punkty'];
	?>
	</div>
    <!-- wynik(ilosc strzalow do momentu zabicia wszystkich ) i data i nik sie wysyla do bazy 
-->
</body>
</html>
