<?php 
class MSahakari extends CI_Model{
	function getsahakari(){
	$query=$this->db->query("select * from tbl_sahakari");
	if($query->num_rows()>0)
	$data=$query->result();
	else
	$data=array();
	return $data;
	}
	function getSahakariesAlphabetically()
	{
		$query=$this->db->query("select * from tbl_sahakari order by title asc");
		if($query->num_rows()>0)
		$data=$query->result();
		else
		$data=array();
		return $data;		
	}
	function getSahakariByAlias($alias)
	{
		$query=$this->db->query("select * from tbl_sahakari where alias='$alias'");
		if($query->num_rows()>0):
			$data=$query->row();
			$data->Website=$this->getSahakariWebsite($data->sahakari_id);
		else:
			$data=array();
		endif;
			return $data;	
		
	}
	function getSahakariWebsite($sahakari_id)
	{
		$query=$this->db->query("select * from tbl_sahakari_website where sahakari_id='$sahakari_id'");
		if($query->num_rows()>0)
		$data=$query->row();
		else
		$data="";
		return $data;
	}
}