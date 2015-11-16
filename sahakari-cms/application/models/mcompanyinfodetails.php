<?php 

class MCompanyInfoDetails extends CI_Model{
	function getcompanydetails($company_id){
	$query=$this->db->query("select * from tbl_companyinfodetails where company_id='$company_id'");
	if($query->num_rows()>0)
	$data=$query->row();
	else
	$data="";
	return $data;
	}
}