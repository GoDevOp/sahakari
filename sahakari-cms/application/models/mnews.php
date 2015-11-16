<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MNews extends CI_Model {
	function getDisplayOrder($TableName)
	{
		$t="select max(display_order)+1 as display_order from $TableName";
		$q=$this->db->query($t);
		if($q->row()->display_order!=""):
			return $q->row()->display_order;
		else:
			return 1;
		endif;
	}
	function getDisplayOrderById($news_id){
		$query=$this->db->query("select display_order as displayorder from tbl_news where news_id='$news_id'");
		if($query->num_rows()>0)
		return $query->row()->displayorder;
		else
		return $data="";
	}
	function getDisplayOrderToMove($display_order){
		$query=$this->db->query("select min(display_order) as newdisplayorder from tbl_news where display_order>'$display_order'");
		if($query->num_rows()>0)
		return $query->row()->newdisplayorder;
		else
		return "";
	}
	function getDisplayOrderToMoveDown($display_order){
		$query=$this->db->query("select max(display_order) as newdisplayorder from tbl_news where display_order<'$display_order'");
		if($query->num_rows()>0)
		return $query->row()->newdisplayorder;
		else
		return "";
	}
	function getNewsByDisplayOrder($display_order){
		$query=$this->db->query("select * from tbl_news where display_order='$display_order'");
		if($query->num_rows()>0)
		$data=$query->row();
		else
		$data="";
		return $data;
	}
	function add($NewsData)
	{
		
	}
	function update($data,$news_id)
	{
	$this->db->where("news_id",$news_id);
	$query=$this->db->update("tbl_news",$data);	
	if($query==true)
	return true;
	else
	return false;
	}
	function getNews()
	{
	$query=$this->db->query("select * from tbl_news order by display_order desc");
	if($query->num_rows()>0)
	$data=$query->result();
	else
	$data=array();
	return $data;	
	}
	function getNewsItem($news_id)
	{
		$query=$this->db->query("select * from tbl_news where news_id='$news_id'");
		if($query->num_rows()>0)
		$data=$query->row();
		else
		$data="";
		return $data;	
	}
	function insertnews($data){
	$news_title=$data['news_title'];
	$news_text=$data['news_text'];
	$added_on=$data['added_on'];
	$data['display_order']=$this->getDisplayOrder("tbl_news");
	//$news_thumb=$data['news_thumb'];
	$query=$this->db->insert("tbl_news",$data);
	if($query==true)
	return true;
	else
	return false;
	}
	function deleteNews($news_id)
	{
		$query=$this->db->query("delete from tbl_news where news_id='$news_id'");
		if($query==true)
		return true;
		else
		return false;
	}
	function publish($news_id)
	{
		$this->db->where("news_id",$news_id);	
		$this->db->update("tbl_news",array("status"=>1));
	}
	function unpublish($news_id)
	{
		$this->db->where("news_id",$news_id);	
		$this->db->update("tbl_news",array("status"=>0));
	}
	function getNewsDetail($news_id){
		$query=$this->db->query("select * from tbl_news where news_id='$news_id'");
		if($query->num_rows()>0)
		$data=$query->row();
		else
		$data="";
		return $data;
	}
	function updateDisplayOrder($display_order,$news_id){
		$this->db->where("news_id",$news_id);
		$this->db->update("tbl_news",array("display_order"=>$display_order));
	}
}