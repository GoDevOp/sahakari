<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MCompanyInfos extends CI_Model {
	function getCompanyInfos()
	{
		$query=$this->db->query("select * from tbl_companyinfos");
		if($query->num_rows()>0)
		$data=$query->result();
		else
		$data=array();
		return $data;
	}
	function getCompanyInfoById($company_id)
	{
		$query=$this->db->query("select * from tbl_companyinfos where company_id='$company_id'");
		if($query->num_rows>0)
		$data=$query->row();
		else
		$data="";
		return $data;
	}
	function getCompanyInfoByAlias($company_alias)
	{
		$query=$this->db->query("select * from tbl_companyinfos where company_alias='$company_alias'");
		if($query->num_rows>0)
		$data=$query->row();
		else
		$data="";
		return $data;
	}
	function getCompanyDetails($company_id)
	{
		$query=$this->db->query("select * from tbl_companyinfo_details where company_id='$company_id'");
		if($query->num_rows()>0)
		$data=$query->result();
		else
		$data=array();
		return $data;
	}
	function addCompanyDetails($PostedData)
	{
		$PostedData["display_order"]=$this->getDisplayOrder("tbl_companyinfo_details");
		$this->db->insert("tbl_companyinfo_details",$PostedData);	
	}
	function updateCompanyDetails($PostedData)
	{
		$this->db->where("companyinfo_details_id",$PostedData['companyinfo_details_id']);
		$this->db->update("tbl_companyinfo_details",$PostedData);	
	}
	function getDisplayOrder($TableName)
	{
		$q=$this->db->query("select max(display_order)+1 as display_order from $TableName")->row();
		return $q->display_order;
	}
	function getCompanyByDetailsID($company_details_id)
	{
		$t="select * from tbl_companyinfos where company_id=(select company_id from tbl_companyinfo_details where companyinfo_details_id='$company_details_id')";	
		return $this->db->query($t)->row();
	}
	function deleteDetails($company_details_id)
	{
		$query=$this->db->query("delete from tbl_companyinfo_details where companyinfo_details_id='$company_details_id'");
	}
	function deleteCompany($company_id)
	{
		$query=$this->db->query("delete from tbl_companyinfos where company_id='$company_id'");
		if($query==true)
		return true;
		else
		return false;
	}
	function updateCompany($data,$company_id)
	{
		$title=$data['title'];
		$short_intro=$data['short_intro'];
		$full_information=$data['full_information'];
		$this->db->where("company_id",$company_id);
		$query=$this->db->update("tbl_companyinfos",$data);
		if($query==true)
		return true;
		else
		return false;
	}
	function insertCompanyInfo($data)
	{
		$query=$this->db->insert("tbl_companyinfos",$data);
		if($query==true)
		return true;
		else
		return false;
	}
}