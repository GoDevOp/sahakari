<?php 

class MAdvertisement extends CI_Model{
	function getAdvertisement(){
		$query=$this->db->query("select * from tbl_advertisement order by display_order desc");
		if($query->num_rows()>0)
		$data=$query->result();
		else
		$data=array();
		return $data;
	}
	function getAdvertisementById($advertisement_id){
		$query=$this->db->query("select * from tbl_advertisement where advertisement_id='$advertisement_id'");
		if($query->num_rows()>0)
		$data=$query->row();
		else
		$data="";
		return $data;
	}
	function insert($data){
		$query=$this->db->insert("tbl_advertisement",$data);
		if($query==true)
		return true;
		else
		return false;
	}
	function updateAdvertisement($data,$advertisement_id){
	$this->db->where("advertisement_id",$advertisement_id);
	$query=$this->db->update("tbl_advertisement",$data);
	if($query==true)
	return true;
	else
	return false;
	}
	function delete($advertisement_id){
		$query=$this->db->query("delete from tbl_advertisement where advertisement_id='$advertisement_id'");
		if($query==true)
		return true;
		else
		return false;
	}
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
	function getDisplayOrderById($advertisement_id){
		$query=$this->db->query("select display_order as displayorder from tbl_advertisement where advertisement_id='$advertisement_id'");
		if($query->num_rows()>0)
		return $query->row()->displayorder;
		else
		return $data="";
	}
	function getDisplayOrderToMove($display_order){
		$query=$this->db->query("select min(display_order) as newdisplayorder from tbl_advertisement where display_order>'$display_order'");
		if($query->num_rows()>0)
		return $query->row()->newdisplayorder;
		else
		return "";
	}
	function getDisplayOrderToMoveDown($display_order){
		$query=$this->db->query("select max(display_order) as newdisplayorder from tbl_advertisement where display_order<'$display_order'");
		if($query->num_rows()>0)
		return $query->row()->newdisplayorder;
		else
		return "";
	}
	function getNewsByDisplayOrder($display_order){
		$query=$this->db->query("select * from tbl_advertisement where display_order='$display_order'");
		if($query->num_rows()>0)
		$data=$query->row();
		else
		$data="";
		return $data;
	}
	function publish($advertisement_id)
	{
		$this->db->where("advertisement_id",$advertisement_id);	
		$this->db->update("tbl_advertisement",array("status"=>1));
	}
	function unpublish($advertisement_id)
	{
		$this->db->where("advertisement_id",$advertisement_id);	
		$this->db->update("tbl_advertisement",array("status"=>0));
	}
	function updateDisplayOrder($display_order,$advertisement_id){
		$this->db->where("advertisement_id",$advertisement_id);
		$this->db->update("tbl_advertisement",array("display_order"=>$display_order));
	}
}
