<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MInterviews extends CI_Model {
	function getDisplayOrder($TableName="")
	{
		$q=$this->db->query("select max(display_order)+1 as display_order from $TableName")->row();
		return $q->display_order;
	}
	function getDisplayOrderById($interview_id){
		$query=$this->db->query("select display_order as displayorder from tbl_interviews where interview_id='$interview_id'");
		if($query->num_rows()>0)
		return $query->row()->displayorder;
		else
		return $data="";
	}
	function getDisplayOrderToMove($display_order){
		$query=$this->db->query("select min(display_order) as newdisplayorder from tbl_interviews where display_order>'$display_order'");
		if($query->num_rows()>0)
		return $query->row()->newdisplayorder;
		else
		return "";
	}
	function getDisplayOrderToMoveDown($display_order){
		$query=$this->db->query("select max(display_order) as newdisplayorder from tbl_interviews where display_order<'$display_order'");
		if($query->num_rows()>0)
		return $query->row()->newdisplayorder;
		else
		return "";
	}
	function getNewsByDisplayOrder($display_order){
		$query=$this->db->query("select * from tbl_interviews where display_order='$display_order'");
		if($query->num_rows()>0)
		$data=$query->row();
		else
		$data="";
		return $data;
	}
	function getInterviews()
	{
		$t="select * from tbl_interviews order by display_order desc";
		$q=$this->db->query($t);
		return $q->result();			
	}
	function add($interviewData)
	{
		$this->db->insert("tbl_interviews",$interviewData);
	}
	function getInterviewByID($interview_id)
	{
		$t="select * from tbl_interviews where interview_id='$interview_id'";
		$q=$this->db->query($t);
		return $q->row();		
	}
	function update($interviewData)
	{
		$this->db->where("interview_id",$interviewData['interview_id']);	
		$this->db->update("tbl_interviews",$interviewData);
	}
	function publish($interview_id)
	{
		$this->db->where("interview_id",$interview_id);	
		$this->db->update("tbl_interviews",array("status"=>1));
	}
	function unpublish($interview_id)
	{
		$this->db->where("interview_id",$interview_id);	
		$this->db->update("tbl_interviews",array("status"=>0));
	}
	function delete($interview_id){
	$query=$this->db->query("delete from tbl_interviews where interview_id='$interview_id'");
	if($query==true)
	return true;
	else
	return false;
	}
	function updateDisplayOrder($display_order,$interview_id){
		$this->db->where("interview_id",$interview_id);
		$this->db->update("tbl_interviews",array("display_order"=>$display_order));
	}
}