<?php 
function seo($s) {
	html_entity_decode('&#8211;', ENT_NOQUOTES, 'UTF-8');
	$tr = array('ə','Ə','ş','Ş','ı','I','İ','ğ','Ğ','ü','Ü','ö','Ö','Ç','ç','(',')',' ',',','?','’','&#8211;');
	$eng = array('e','e','s','s','i','i','i','g','g','u','u','o','o','c','c','','','-','','','','');
	
	$s = str_replace($tr,$eng,$s);
	$s = strtolower($s);
	$s = preg_replace('/&amp;amp;amp;amp;amp;amp;amp;amp;amp;.+?;/','', $s);
	$s = preg_replace('/\s+/', '-', $s);
	$s = preg_replace('|-+|', '-', $s);
	$s = str_replace('.', '', $s);
	$s = trim($s, '-');
	return $s;
}



?>