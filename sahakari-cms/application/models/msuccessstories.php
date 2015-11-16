<?php 

class MSuccessStories extends CI_Model{
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
	function getDisplayOrderById($story_id){
		$query=$this->db->query("select display_order as displayorder from tbl_successstories where story_id='$story_id'");
		if($query->num_rows()>0)
		return $query->row()->displayorder;
		else
		return $data="";
	}
	function getDisplayOrderToMove($display_order){
		$query=$this->db->query("select min(display_order) as newdisplayorder from tbl_successstories where display_order>'$display_order'");
		if($query->num_rows()>0)
		return $query->row()->newdisplayorder;
		else
		return "";
	}
	function getDisplayOrderToMoveDown($display_order){
		$query=$this->db->query("select max(display_order) as newdisplayorder from tbl_successstories where display_order<'$display_order'");
		if($query->num_rows()>0)
		return $query->row()->newdisplayorder;
		else
		return "";
	}
	function getStoriesByDisplayOrder($display_order){
		$query=$this->db->query("select * from tbl_successstories where display_order='$display_order'");
		if($query->num_rows()>0)
		$data=$query->row();
		else
		$data="";
		return $data;
	}
	function getStories(){
		$query=$this->db->query("select * from tbl_successstories order by display_order DESC");
		if($query->num_rows()>0)
		$data=$query->result();
		else
		$data=array();
		return $data;
	}
	function getStoriesById($story_id){
		$query=$this->db->query("select * from tbl_successstories where story_id='$story_id'");
		if($query->num_rows()>0)
		$data=$query->row();
		else
		$data="";
		return $data;
	}
	function getstoriesdescription($story_id){
		$query=$this->db->query("SELECT SUBSTRING(`success_story`, 1, 50) as story from tbl_successstories where story_id='$story_id'");
		if($query->num_rows()>0)
		$data=$query->row();
		else
		$data=array();
		return $data;
	}
	function deleteStories($story_id){
		$query=$this->db->query("delete from tbl_successstories where story_id='$story_id'");
		if($query==true)
		return true;
		else
		return false;
	}
	function insertStories($data){
		$query=$this->db->insert("tbl_successstories",$data);
		if($query==true)
		return true;
		else
		return false;
	}
	function updateStory($data,$story_id){
		$this->db->where("story_id",$story_id);
		$query=$this->db->update("tbl_successstories",$data);
		if($query==true)
		return true;
		else
		return false;
	}
	function publish($story_id)
	{
		$this->db->where("story_id",$story_id);	
		$this->db->update("tbl_successstories",array("status"=>1));
	}
	function unpublish($story_id)
	{
		$this->db->where("story_id",$story_id);	
		$this->db->update("tbl_successstories",array("status"=>0));
	}
	function updateDisplayOrder($display_order,$story_id){
		$this->db->where("story_id",$story_id);
		$this->db->update("tbl_successstories",array("display_order"=>$display_order));
	}
}