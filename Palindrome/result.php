<?php

 $stringn=$_GET["name"];

echo "$string";

function palindrome($string){
$string=strtolower($string);
if (strcmp($string,strrev($string))===0){
    return "$string is a planidrome";
}else{
return "$string is not a planidrome";}
}

$result= palindrome("$stringn");
echo "$result";
?>



