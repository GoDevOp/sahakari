<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MCompanyInfos extends CI_Model {
	function getRandomCompany()
	{
		$t="select * from tbl_companyinfos where status=1 order by RAND() limit 1";
		$q=$this->db->query($t);
		return $q->row();			
	}
	function getCompanyByAlias($company_alias){
	$query=$this->db->query("select * from tbl_companyinfos where company_alias='$company_alias'");
	if($query->num_rows()>0)
	$data=$query->row();
	else
	$data="";
	return $data;
	}
	function getCompanies(){
	$query=$this->db->query("select * from tbl_companyinfos");
	if($query->num_rows()>0)
	$data=$query->result();
	else
	$data=array();
	return $data;
	}
	function getCompaniesAlphabetically($alphabet="",$limit="")
	{
		$query=$this->db->query("select * from tbl_companyinfos order by company_name asc");
		if($query->num_rows()>0)
		$data=$query->result();
		else
		$data=array();
		return $data;	
	}
}