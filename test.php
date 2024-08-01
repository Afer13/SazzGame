<?php
//include 'function.php';
//seo("Salam".'/'."melekim");
$string = "&8211;";
$output = mb_convert_encoding($string, 'UTF-8', 'HTML-ENTITIES');
echo $output;
?> 