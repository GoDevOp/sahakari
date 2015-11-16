<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Companyinfo extends CI_Controller {
	function index()
	{
		$this->load->model("MCompanyInfos");
		$data['CompanyInfos']=$this->MCompanyInfos->getCompanyinfos();	
		$this->load->view("companyinfos/companyinfo",$data);
	}
	function edit(){
		$this->load->model("MCompanyInfos");
		$id=$this->uri->segment(3);
		$data['companyinfo']=$this->MCompanyInfos->getCompanyInfoById($id);
		$this->load->view("companyinfos/edit",$data);
			if(isset($_POST['title'])){
			$data=array(
						'title'=>$_POST['title'],
						'company_name'=>$_POST['company_name'],
						'company_alias'=>createAlias($_POST['company_name'],"tbl_companyinfos","company_alias"),
						'short_intro'=>$_POST['short_intro'],
						'full_information'=>$_POST['full_information'],
						'image'=>$_POST['photo'],
						);
			$this->MCompanyInfos->updateCompany($data,$id);
			redirect("companyinfo");
			}
	}
	function delete(){
		$this->load->model("MCompanyInfos");
		$id=$this->uri->segment(3);
		$this->MCompanyInfos->deleteCompany($id);
		redirect("companyinfo");
	}
	function add(){
		$this->load->model("MCompanyInfos");
		$this->load->view("companyinfos/add");
		if(isset($_POST['title'])){
		$data=array(
					'title'=>$_POST['title'],
					'company_name'=>$_POST['company_name'],
					'company_alias'=>createAlias($_POST['company_name'],"tbl_companyinfos","company_alias"),
					'short_intro'=>$_POST['short_intro'],
					'full_information'=>$_POST['full_information'],
					'image'=>$_POST['photo'],
					);
		$this->MCompanyInfos->insertCompanyInfo($data);
		redirect("companyinfo");
		}
	}
	function details($company_alias)
	{
		$this->load->model("MCompanyInfos");
		$CompanyInfo=$this->MCompanyInfos->getCompanyInfoByAlias($company_alias);
		$CompanyInfo->Details=$this->MCompanyInfos->getCompanyDetails($CompanyInfo->company_id);
		$data['CompanyInfo']=$CompanyInfo;
		$this->load->view("companyinfos/details",$data);
	}
	function delete_details($companyinfo_details_id)
	{
		$this->load->model("MCompanyInfos");
		$CompanyDetails=$this->MCompanyInfos->getCompanyByDetailsID($companyinfo_details_id);
		$this->MCompanyInfos->deleteDetails($companyinfo_details_id);
		redirect("companyinfo/details/".$CompanyDetails->company_alias);	
	}
	function ajax($param)
	{
		switch($param)
		{
			case 'add_details':
				$this->load->model("MCompanyInfos");
				if(isset($_POST['title']))
				{
					$PostedData=array(
					"company_id"=>$_POST['company_id'],
					"details_title"=>$_POST['title'],
					"details_text"=>$_POST['text']
					);
					$this->MCompanyInfos->addCompanyDetails($PostedData);
				}
				break;
			case 'update_details':
				$this->load->model("MCompanyInfos");
				if(isset($_POST['title']))
				{
					$PostedData=array(
					"companyinfo_details_id"=>$_POST['companyinfo_details_id'],
					"details_title"=>$_POST['title'],
					"details_text"=>$_POST['text']
					);
					$this->MCompanyInfos->updateCompanyDetails($PostedData);
				}
				break;
			default :
				echo "No Action Defined";	
		}
	}
}