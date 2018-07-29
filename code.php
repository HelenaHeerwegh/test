<html>
<head>
<style>
div {
    width: 300px;
    padding: 25px;
/*     margin: 25px; */
    color: white;
    font-weight: bold;
}
</style></head>
<body>
<?php

$GLOBALS['colorstrenght']  =  200;

$n = 10;

function DecimalToHexa($number) {
    $listOfHexadecimal = array('A','B','C','D','E','F');
    if ($number < 10 ) {
        return  $number;
    }
    else if($number < 16 ) {
        $newNumber = $number - 9;
        return  $listOfHexadecimal[$newNumber - 1];
    }
    else {
        echo "number to big (is not possible when you use this program correctly): $number";
    }
}

function numberToRGB( $number ) 
{
    //$number  =  (int)$number ;
    if ($number < $GLOBALS['colorstrenght'])
    {
        $new1Number = floor($number / 16);
        $new2Number = floor($number % 16);
        return "#".dechex($GLOBALS['colorstrenght']).DecimalToHexa($new1Number).DecimalToHexa($new2Number).'00';
    }
    else if($number < 2*$GLOBALS['colorstrenght'])
    {
        $number = 212 - ($number - $GLOBALS['colorstrenght']);
        $new1Number = floor($number / 16);
        $new2Number = floor($number % 16);
        return '#'.DecimalToHexa($new1Number).DecimalToHexa($new2Number).dechex($GLOBALS['colorstrenght']).'00';
    }
    else if($number < 3*$GLOBALS['colorstrenght'])
    {
        $number = $number - 2*$GLOBALS['colorstrenght'];
        $new1Number = floor($number / 16);
        $new2Number = floor($number % 16);
        return '#00'.dechex($GLOBALS['colorstrenght']).DecimalToHexa($new1Number).DecimalToHexa($new2Number);
    }
    else if($number < 4*$GLOBALS['colorstrenght'])
    {
        $number = $GLOBALS['colorstrenght'] - ($number - 3*$GLOBALS['colorstrenght']);
        $new1Number = floor($number / 16);
        $new2Number = floor($number % 16);
        return '#00'.DecimalToHexa($new1Number).DecimalToHexa($new2Number).dechex($GLOBALS['colorstrenght']);
    }
    else if($number < 5*$GLOBALS['colorstrenght'])
    {
        $number = $number - 4*$GLOBALS['colorstrenght'];
        $new1Number = floor($number / 16);
        $new2Number = floor($number % 16);
        return '#'.DecimalToHexa($new1Number).DecimalToHexa($new2Number).'00'.dechex($GLOBALS['colorstrenght']);
    }
    else 
    {
        $number = $number - 5*$GLOBALS['colorstrenght'];
        $new1Number = floor($number / 16);
        $new2Number = floor($number % 16);
        return '#'.DecimalToHexa($new1Number).DecimalToHexa($new2Number).'00'.dechex($GLOBALS['colorstrenght']);
    }
}

$list     =  array() ;
$gap      =  floor( ( 5 * $GLOBALS['colorstrenght']) / ( $n-1 ) ) ;

for( $k = 1 ; $k < ( $n - 1 ) ; $k++ )
{
    //echo   $gap .'<br/>';
    //echo   'numberToRGB( '.$k.' * '.$gap.' )<br/>' ;
    //echo  numberToRGB( $k * $gap ).'<br/>' ;
    $list[$k]  =  numberToRGB( $k * $gap );
}

$list[0]         =  '#'.dechex($GLOBALS['colorstrenght']).'0000' ;
$list[$n - 1]    =  '#9400'.dechex($GLOBALS['colorstrenght']) ;

//echo print_r($list);

for ($i = 0; $i <= $n-1; $i++){
    echo  '<div style="background-color:'.$list[$i].'"> '.$i.'. hallooo </div>' ;
}

?>
</body>
</html>
