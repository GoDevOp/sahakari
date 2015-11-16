<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Company extends CI_Controller{
	function _remap($company_alias){
	$this->load->model("MCompanyInfos");
	$data['companies']=$this->MCompanyInfos->getCompanies();
	$data['company']=$this->MCompanyInfos->getCompanyByAlias($company_alias);
	//testArray($data);
	$this->load->view("company/list",$data);
	}
}