<?php 

class MEvents extends CI_Model{
	function getEvents(){
	$query=$this->db->query("select * from tbl_events");
	if($query->num_rows()>0)
	$data=$query->result();
	else
	$data=array();
	return $data;
	}
	function getEventById($event_id){
	$query=$this->db->query("select * from tbl_events where event_id='$event_id'");
	if($query->num_rows()>0)
	$data=$query->row();
	else
	$data="";
	return $data;
	}
	function UpdateViews($event_id)
	{
		$t="update tbl_events set views=views+1, last_viewed='".date("Y-m-d H:i:s")."' where event_id='$event_id'";
		$this->db->query($t);

	}
}