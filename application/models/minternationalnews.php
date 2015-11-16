<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MInternationalNews extends CI_Model {
	function getNewsItems()
	{
		$t="select * from tbl_internationalnews where status=1 order by display_order desc";
		$q=$this->db->query($t);
		return $q->result();	
	}
	function getNewsItemById($news_id){
		$query=$this->db->query("select * from tbl_internationalnews where news_id='$news_id'");
		if($query->num_rows()>0)
		$data=$query->row();
		else
		$data="";
		return $data;
	}
	function getMainNewsItems($limit)
	{
		$t="select * from tbl_internationalnews where status=1 order by display_order desc limit 0, $limit";
		$q=$this->db->query($t);
		return $q->result();	
	}
	function UpdateViews($news_id)
	{
		$t="update tbl_internationalnews set views=views+1, last_viewed_on='".date("Y-m-d H:i:s")."' where news_id='$news_id'";
		$this->db->query($t);

	}
}