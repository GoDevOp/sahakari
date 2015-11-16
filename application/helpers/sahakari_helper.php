<?php
function testArray($arr)
{
	echo "<pre>";
	print_r($arr);
	echo "</pre>";
}
function getNewsTickerItems()
{
	$CI=& get_instance();
	$CI->load->model("MNews");
	$TickerNewsItems=$CI->MNews->getNewsItemsForTicker();
	return $TickerNewsItems;
}
function convertdate($d)
{
	$date = strtotime($d);
	return date("jS F Y ",$date);
}
function getPhotos(){
	$CI=& get_instance();
	$CI->load->model("MPhotos");
	$photos=$CI->MPhotos->getPhotos();
	//print_r($photos);
	return $photos;
}
function sahakari_url()
{
	return base_url()."individual/";	
}
?>