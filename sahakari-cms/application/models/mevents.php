<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MEvents extends CI_Model {
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
	function Update($data)
	{
		$this->db->where("event_id",$data['event_id']);
		$query=$this->db->update("tbl_events",$data);	
		if($query==true)
			return true;
		else
			return false;
	}
	function getEvents()
	{
	$query=$this->db->query("select * from tbl_events order by display_order desc");
	if($query->num_rows()>0)
	$data=$query->result();
	else
	$data=array();
	return $data;	
	}
	function Insert($data)
	{
		$data['display_order']=$this->getDisplayOrder("tbl_events");
		$query=$this->db->insert("tbl_events",$data);
		if($query==true)
			return true;
		else
			return false;
	}
	function Delete($event_id)
	{
		$query=$this->db->query("delete from tbl_events where event_id='$event_id'");
		if($query==true)
		return true;
		else
		return false;
	}
	function Publish($event_id)
	{
		$this->db->where("event_id",$event_id);	
		$this->db->update("tbl_events",array("status"=>1));
	}
	function unPublish($event_id)
	{
		$this->db->where("event_id",$event_id);	
		$this->db->update("tbl_events",array("status"=>0));
	}
	function getEvent($event_id){
		$query=$this->db->query("select * from tbl_events where event_id='$event_id'");
		if($query->num_rows()>0)
		$data=$query->row();
		else
		$data="";
		return $data;
	}
}