<?php 
$filename = date("M") . ".txt";

echo nl2br(file_get_contents($filename));
?>