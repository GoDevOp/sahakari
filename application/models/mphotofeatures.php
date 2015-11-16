<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MPhotoFeatures extends CI_Model {
	function getPhotoFeatures()
	{
		$t="select * from tbl_photofeatures order by display_order desc";
		$q=$this->db->query($t);
		return $q->result();	
	}
}