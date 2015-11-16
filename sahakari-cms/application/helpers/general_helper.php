<?php
function testArray($arr)
{
	echo "<pre>";
	print_r($arr);
	echo "</pre>";
}
function convertdate($d){
$date = strtotime($d);
return date("jS F Y ",$date);
}
function createAlias($text,$tablename,$fieldname)
{
	$new_string = trim(preg_replace('/[^A-Za-z0-9_]/', ' ', strip_tags($text)));
	$new_string = preg_replace( '/\s+/', ' ', $new_string );
	$alias=strtolower(str_replace(" ","_",trim($new_string)));
	$CI=& get_instance();
	$q=$CI->db->query("select * from $tablename where $fieldname='$alias'");
	if($q->num_rows()>0)
	{
		$alias.=date("ymdhis");	
	}
	return $alias;
}
function getdays($date){
$d = strtotime($date);
$diff=$d-time();
$day = floor($diff/(60*60*24));

return ++$day;
}
