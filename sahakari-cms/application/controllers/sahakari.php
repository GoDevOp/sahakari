<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sahakari extends CI_Controller{
	function index(){
	$this->load->model("MSahakari");
	$data['sahakari']=$this->MSahakari->getSahakari();
	$this->load->view("sahakari/view",$data);
	}
	function edit($sahakari_id){
	$this->load->model("MSahakari");
	$data['sahakari']=$this->MSahakari->getShakariById($sahakari_id);
		if(isset($_POST['submit'])){
		$data=array(
					'title'=>$_POST['title'],
					'alias'=>$this->MSahakari->createAlias($_POST['title'],"tbl_sahakari","alias"),
					'sahakari_name'=>$_POST['sahakari_name'],
					'sahakari_address'=>$_POST['sahakari_address'],
					'logo'=>$_POST['photo'],
					'short_intro'=>$_POST['short_intro'],
					'sahakari_email'=>$_POST['sahakari_email'],
					'facebook_email'=>$_POST['facebook_email'],
					'contact_person'=>$_POST['contact_person'],
					'contact_person_mobile'=>$_POST['contact_person_mobile'],
					'membership_date'=>$_POST['membership_date'],
					'membership_by'=>$_POST['membership_by'],
					'remarks'=>$_POST['remarks'],
					);
		$this->MSahakari->updateSahakari($data,$sahakari_id);
		redirect("sahakari");
		}
	$this->load->view("sahakari/edit",$data);
	}
	function add(){
	$this->load->model("MSahakari");
		if(isset($_POST['submit'])){
		$data=array(
					'title'=>$_POST['title'],
					'alias'=>$this->MSahakari->createAlias($_POST['title'],"tbl_sahakari","alias"),
					'sahakari_name'=>$_POST['sahakari_name'],
					'sahakari_address'=>$_POST['sahakari_address'],
					'logo'=>$_POST['photo'],
					'short_intro'=>$_POST['short_intro'],
					'sahakari_email'=>$_POST['sahakari_email'],
					'facebook_email'=>$_POST['facebook_email'],
					'contact_person'=>$_POST['contact_person'],
					'contact_person_mobile'=>$_POST['contact_person_mobile'],
					'membership_date'=>$_POST['membership_date'],
					'membership_by'=>$_POST['membership_by'],
					'remarks'=>$_POST['remarks'],
					);
		$this->MSahakari->addSahakari($data);
		redirect("sahakari");
		}
	$this->load->view("sahakari/add");
	}
	function ajax($action)
	{
		$this->load->model("MSahakari");
		switch($action)
		{
			case "getSahakariWebsite":
				$sahakari_id=$_POST['sahakari_id'];
				$Website=$this->MSahakari->getShakariWebsite($sahakari_id);
				echo json_encode($Website);			
				break;
			case "save":
				$sahakari_id=$_POST['sahakari_id'];
				$Website=$this->MSahakari->getShakariWebsite($sahakari_id);
				$PostedData=array(
				"sahakari_id"=>$sahakari_id,
				"about"=>$_POST['about'],
				"services"=>$_POST['services'],
				"homepage"=>$_POST['homepage'],
				"members"=>$_POST['members'],
				"report"=>$_POST['report'],
				"contact"=>$_POST['contact'],
				"last_updated"=>date("Y-m-d H:i:s")				
				);
				if($Website!="")
				{
					$this->MSahakari->UpdateWebsite($PostedData);
				}
				else
				{
					$this->MSahakari->CreateWebsite($PostedData);
				}
				break;
			default:
				echo "No Action Defined";	
		}
	}
	function publish($sahakari_id)
	{
		$this->load->model("MSahakari");
		$this->MSahakari->publish($sahakari_id);
		redirect("sahakari");		
	}
	function unpublish($sahakari_id)
	{
		$this->load->model("MSahakari");
		$this->MSahakari->unpublish($sahakari_id);
		redirect("sahakari");		
	}
}