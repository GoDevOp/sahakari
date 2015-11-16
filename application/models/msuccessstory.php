<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MSuccessStory extends CI_Model {
	function getSuccessStory()
	{
		$t="select * from tbl_successstories where status=1 order by display_order desc limit 1";
		$q=$this->db->query($t);
		return $q->row();			
	}
	function getSuccessStoryById($story_id){
		$query=$this->db->query("select * from tbl_successstories where story_id='$story_id'");
		if($query->num_rows()>0)
		$data=$query->row();
		else
		$data="";
		return $data;
	}
	function getSuccesStories(){
		$query=$this->db->query("select * from tbl_successstories");
		if($query->num_rows()>0)
		$data=$query->result();
		else
		$data=array();
		return $data;
	}
}