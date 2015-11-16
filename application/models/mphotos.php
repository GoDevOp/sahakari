<?php 

class MPhotos extends CI_Model{
	function getPhotos(){
	$query=$this->db->query("select * from tbl_photos");
	if($query->num_rows()>0)
	$data=$query->result();
	else
	$data=array();
	return $data;
	}
}