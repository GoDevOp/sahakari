<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MNews extends CI_Model {
	function getNewsItems()
	{
		$t="select * from tbl_news where status=1 order by display_order desc";
		$q=$this->db->query($t);
		return $q->result();	
	}
	function getMainNewsItems($limit)
	{
		$t="select * from tbl_news where status=1 order by display_order desc limit 0, $limit";
		$q=$this->db->query($t);
		return $q->result();	
	}
	function getNewsItemByID($news_id)
	{
		$t="select * from tbl_news where news_id='$news_id'";
		$q=$this->db->query($t);
		return $q->row();	
	}
	function getNewsItemsForTicker()
	{
		$t="select * from tbl_news where status=1 order by display_order desc";
		$q=$this->db->query($t);
		return $q->result();	
	}
	function UpdateViews($news_id)
	{
		$t="update tbl_news set views=views+1, last_viewed_on='".date("Y-m-d H:i:s")."' where news_id='$news_id'";
		$this->db->query($t);

	}
	function getPopularNews(){
		$query=$this->db->query("select * from tbl_news order by views desc limit 10");
		if($query->num_rows()>0)
		$data=$query->result();
		else
		$data=array();
		return $data;
	}
}