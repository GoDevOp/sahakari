<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MInterviews extends CI_Model {
	function getInterview($id)
	{
		$t="select * from tbl_interviews where status=1 order by display_order desc";
		$q=$this->db->query($t);
		return $q->result();	
	}
	function getInterviewById($interview_id){
	$query=$this->db->query("select * from tbl_interviews where interview_id='$interview_id'");
	if($query->num_rows()>0)
	$data=$query->row();
	else
	$data="";
	return $data;
	}
	function getInterviews($limit="")
	{
		if($limit!=""){
		$t="select * from tbl_interviews where status=1 order by display_order desc limit 0, $limit";
		$q=$this->db->query($t);
		return $q->result();	
		}
		else{
		$t="select * from tbl_interviews";
		$q=$this->db->query($t);
		return $q->result();
		}
	}
}