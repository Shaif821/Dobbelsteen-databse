<!DOCTYPE html>
<html>
<head>
    <title>Dobbelsteen</title>
    <meta charset="UTF-8">

<body>
<header style="background-color: #333; font-size: 36px; color: white; height:1.5em; text-align:center;">Dobbelsteen, Shaif Bhaggoe, MD1A</header>
<br>

    <form action = "Dobbelsteen.php">
<input type="submit" value="input">
    </form>
    
<?php
include("db_const.php");
include("basic_insert.php");
include("basic_show.php");

/*http://www.tutorialized.com/view/tutorial/Basic-PHP-image-tutorial/24061*/

//dobbelsteen($worp);
//print "<img src=image.png?" .date("U"). ">";
    
function dobbelsteen($worp){
    $im = imagecreate(200,200) or die ("Kan dit niet uitvoeren");
    imagecolorallocate($im, 208, 0, 21); //definieert de kleur. kleur = rood
    //De code hierboven maakt een vierkant met kleur.

    //De code hieronder maakt de cirkels
    $white = imagecolorallocate($im, 255, 255, 255); //defineert een wit kleur

    //Voorbeeld:
    //Maakt de cirkels:     X  Y width height kleur
    //imagefilledellipse($im, 35, 35, 40, 40, $white);
    
    if($worp==1){ //Dit wordt 1 
    imagefilledellipse($im, 100, 100, 40, 40, $white); //stip 4
    }
    
    if($worp==2) { //Dit wordt 2 
    imagefilledellipse($im, 35, 35, 40, 40, $white); //stip 1
    imagefilledellipse($im, 165, 165, 40, 40, $white); //stip 7
    }
    
    if($worp==3) { //dit wordt 3 stippetjes 
    imagefilledellipse($im, 35, 35, 40, 40, $white); //stip 1
    imagefilledellipse($im, 100, 100, 40, 40, $white); //stip 4
    imagefilledellipse($im, 165, 165, 40, 40, $white); //stip 7
    }
    

    if($worp==4){ //Dit worden 4 stippetjes
    imagefilledellipse($im, 35, 35, 40, 40, $white); //stip 1
    imagefilledellipse($im, 165, 35, 40, 40, $white); //stip 2
    imagefilledellipse($im, 35, 165, 40, 40, $white); //stip 6
    imagefilledellipse($im, 165, 165, 40, 40, $white); //stip 7
    }
    
    if($worp==5){ //Dit worden 5 stippetjes
    imagefilledellipse($im, 35, 35, 40, 40, $white); //stip 1
    imagefilledellipse($im, 165, 35, 40, 40, $white); //stip 2
    imagefilledellipse($im, 100, 100, 40, 40, $white); //stip 4
    imagefilledellipse($im, 35, 165, 40, 40, $white); //stip 6
    imagefilledellipse($im, 165, 165, 40, 40, $white); //stip 7
    }
    
    if($worp==6){ //6 stippetjes
    imagefilledellipse($im, 35, 35, 40, 40, $white); //stip 1
    imagefilledellipse($im, 165, 35, 40, 40, $white); //stip 2
    imagefilledellipse($im, 35, 100, 40, 40, $white); //stip 3
    imagefilledellipse($im, 165, 100, 40, 40, $white); //stip 5
    imagefilledellipse($im, 35, 165, 40, 40, $white); //stip 6
    imagefilledellipse($im, 165, 165, 40, 40, $white); //stip 7
    }
    
    imagepng($im, $worp.".png"); //Slaat de gegevens op van $im in de "image.png"
    imagedestroy($im); //Maakt geheugen vrij 
}
    
    $worp = rand(1, 6);
    dobbelsteen($worp);
    $aWorp[0]=$worp;
    print "<img src=$worp.png?".date("U") .">&nbsp;";
    
    $worp2 = rand(1, 6);
    dobbelsteen($worp2);
    $aWorp[1]=$worp2;
    print "<img src=$worp2.png?".date("U") .">&nbsp;";
  
    $worp3 = rand(1, 6);
    dobbelsteen($worp3);
    $aWorp[2]=$worp3;
    print "<img src=$worp3.png?".date("U") .">&nbsp;";
    
    $worp4 = rand(1, 6);
    dobbelsteen($worp4);
    $aWorp[3]=$worp4;
    print "<img src=$worp4.png?".date("U") .">&nbsp;";
    
    $worp5 = rand(1, 6);
    dobbelsteen($worp5);
    $aWorp[4]=$worp5;
    print "<img src=$worp5.png?".date("U") .">&nbsp;";
    
 
//var_dump($aWorp);   
//tel de ogen van de worp
//$aScore = analyse($aWorp);//tel de ogen van de worp
//pokerOrNot($aScore);//tell it like it is
$aScore = analyse($aWorp);  
var_dump($aScore);

    
    function analyse($aWorp){
    $aScore = array (0,0,0,0,0,0,0);//initialiseer de array met alle waarden op 0
    for ($i = 1 ; $i <= 6 ; $i++){//outer loop
		for ($j = 0 ; $j <5 ; $j++){//inner loop
            if ($aWorp[$j] == $i){
                $aScore[$i]++;
            }}}
    return $aScore; //$aScore is een lokale variabele.
	//via de return krijg je de array $aScore  'buiten de functie'
}
    
    print_r($aScore);
    rsort($aScore);
        echo"<br>gesorteerd" . "<br>";
    print_r($aScore);
    echo "<hr><font-size = '12'>"  . "<br>";
    
    //debug
    $score = "test";
    
    
    if ($aScore[0] == 5) { //5 keer zelfde aantal ogen = Poker
        echo "je hebt een Poker"  . "<br>";
        $score = "Poker";
    }
    if ($aScore[0] == 4){//4 keer zelfde aantal ogen = Carre
        echo "je hebt een Carre"  . "<br>";
        $score = "Carre";
    }
    if ($aScore[0] == 3){//3 keer zelfde aantal ogen = Full house
        echo "je hebt een Fullhouse"  . "<br>";
        $score = "Full house";
    }
    if($aScore[0] == 2){ 
        if ($aScore[1] == 2) //2 keer hetzelfde + 2 keer hetzelfde = Two pair
        {
            echo "je hebt Two Pairs"  . "<br>";
            $score = "Two Pairs";
        }
        else {//2 keer hetzelfde ogen = One pair
            echo "je hebt One Pair" . "<br>";
            $score = "One Pair";
        }
    }
        
        if ($aScore[0] == 1) { //1 keer hetzelfde = niks
            echo "Probeer opnieuw, je hebt niks"  . "<br>";
            $score = "Niks";
        }
        echo"</font<hr>";{
            
        }
     
   $userID = "123456";
    insertScore ($userID, $aWorp, $score);
    laatZien();
    
?>


<br>
<br>
<style>
    div{
        font-family: calibri;
        word-spacing: 1.5em;
    }
    </style>



</body>
</html>
