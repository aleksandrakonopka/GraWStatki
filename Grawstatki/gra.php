<?php
session_start();
/* nie mozna sie dostac jesli gram*/
/*jesli nie ma niku podanego wywala do indeks i wychodzi blad ze nie podales niku*/



/* morze bez statków */
if(isset($_POST['nowa']) AND isset($_POST['nick']))
{
    $_SESSION['punkty']=0;
    $_SESSION['nickname']=$_POST['nick'];
	unset($_POST['nick']);
	
    $tab = array
      (
      array(0,0,0,0,0,0,0),
      array(0,0,0,0,0,0,0),
      array(0,0,0,0,0,0,0),
      array(0,0,0,0,0,0,0),
      array(0,0,0,0,0,0,0),
      array(0,0,0,0,0,0,0),
      array(0,0,0,0,0,0,0)
      );

    $rows=rand(0,6);
    $cols=rand(0,4);

    $tab[$rows][$cols]=1;
    $tab[$rows][$cols+1]=1;
    $tab[$rows][$cols+2]=1;


    $rowdo=rand(0,6);
    $coldo=rand(0,5);

    while($rowdo==$rows || $rowdo==$rows+1 || $rowdo==$rows-1)
    {
        $rowdo=rand(0,6);
        $coldo=rand(0,5);
    }


    $tab[$rowdo][$coldo]=1;
    $tab[$rowdo][$coldo+1]=1;
    
    $rowdt=rand(0,5);
    $coldt=rand(0,6);

    while(($rowdt==$rowdo && $coldt==$coldo )|| ($rowdt==$rowdo && $coldt==$coldo+1 )|| ($rowdt+1==$rowdo && $coldt==$coldo )|| ($rowdt+1==$rowdo && $coldt==$coldo+1 )||($rowdt-1==$rowdo && $coldt==$coldo )|| ($rowdt-1==$rowdo && $coldt==$coldo+1 )||($rowdt+2==$rowdo && $coldt==$coldo )|| ($rowdt+2==$rowdo && $coldt==$coldo+1 ) || ($rowdt==$rows && $coldt==$cols)||($rowdt==$rows && $coldt==$cols+1)||($rowdt==$rows && $coldt==$cols+2)||($rowdt==$rows && $coldt==$cols+3)||($rowdt+1==$rows && $coldt==$cols)||($rowdt+1==$rows && $coldt==$cols+1)||($rowdt+1==$rows && $coldt==$cols+2)||($rowdt+1==$rows && $coldt==$cols+3)||($rowdt+2==$rows && $coldt==$cols)||($rowdt+2==$rows && $coldt==$cols+1)||($rowdt+2==$rows && $coldt==$cols+2)||($rowdt+2==$rows && $coldt==$cols+3)||($rowdt-1==$rows && $coldt==$cols)||($rowdt-1==$rows && $coldt==$cols+1)||($rowdt-1==$rows && $coldt==$cols+2)||($rowdt-1==$rows && $coldt==$cols+3)||($rowdt==$rows && $coldt==$cols-1)||($rowdt+1==$rows && $coldt==$cols-1)||($rowdt+1==$rowdo && $coldt==$coldo+2)||($rowdt==$rowdo && $coldt==$coldo-1)||($rowdt==$rowdo && $coldt==$coldo+2)||($rowdt+1==$rowdo && $coldt==$coldo-1))
    {
    $rowdt=rand(0,5);
    $coldt=rand(0,6);
    }
    
    $tab[$rowdt][$coldt]=1;
    $tab[$rowdt+1][$coldt]=1;
    
    $_SESSION['tab'] = $tab;


   $_SESSION['rdyTab']= TRUE;
    
   header("Location:nowagra.php");
   exit;

    unset($_POST['nowagra']);
    unset($_SESSION['punkty']);
    unset( $_SESSION['rdyTab']);
}
else
{
    $_SESSION['blad']='Błąd!';
	header("Location:index.php");
    exit;
}


?>
