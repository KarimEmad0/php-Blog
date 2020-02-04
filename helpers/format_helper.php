<?php
function formatDate($date){
return date('F j, Y, g:i a',strtotime($date)); //to make a date
}
function shortenText($text,$chars=50){
$text=substr($text,0,$chars);
$text=substr($text,0,strrpos($text," "));  // to make short string for a body

$text.="...";
return $text;
}

 ?>
