<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MPhotoFeatures extends CI_Model {
	function getDisplayOrder($TableName)
	{
		$t="select max(display_order)+1 as display_order from $TableName";
		$q=$this->db->query($t);
		//print_r($q->row());die;
		if($q->row()->display_order!=""):
			return $q->row()->display_order;
		else:
			return 1;
		endif;
	}
	function getPhotoFeatures()
	{
		$t="select * from tbl_photofeatures order by display_order desc";
		$q=$this->db->query($t);	
		if($q->num_rows()>0)
			return $q->result();
		else
			return array();
	}
	function getPhotoFeature($photofeature_id)
	{
		$t="select * from tbl_photofeatures where photofeature_id='$photofeature_id'";
		$q=$this->db->query($t);	
		if($q->num_rows()>0)
			return $q->row();
		else
			return array();
	}
	function add($PostedData)
	{
		$PostedData['display_order']=$this->getDisplayOrder("tbl_photofeatures");
		$this->db->insert("tbl_photofeatures",$PostedData);	
	}
	function delete($photofeature_id)
	{
		$t="select * from tbl_photofeatures where photofeature_id='$photofeature_id'";
		$q=$this->db->query($t);
		$photo=$q->row()->photo;
		unlink("../".$photo);
		$t="delete from tbl_photofeatures where photofeature_id='$photofeature_id'";	
		$q=$this->db->query($t);
	}
	function update($PostedData)
	{
		$this->db->where("photofeature_id",$PostedData['photofeature_id']);
		$this->db->update("tbl_photofeatures",$PostedData);
	}
	function publish($photofeature_id)
	{
		$this->db->where("photofeature_id",$photofeature_id);
		$PostedData=array("status"=>1);
		$this->db->update("tbl_photofeatures",$PostedData);
	}
	function unpublish($photofeature_id)
	{
		$this->db->where("photofeature_id",$photofeature_id);
		$PostedData=array("status"=>0);
		$this->db->update("tbl_photofeatures",$PostedData);
	}
}