<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Defaults extends CI_Controller {
	function index()
		{
		$this->load->model("MWebsite");
		$data['website']=$this->MWebsite->getwebsite();		
		if(isset($_POST['title'])){
		$data=array(
					'title'=>$_POST['title'],
					'contact'=>$_POST['contact'],
					'copyright'=>$_POST['copyright']
					);
		$this->MWebsite->updateWebsite($data);
		$data['message']="Website Defaults Edited Successfully";
		redirect("defaults");
		}
		$this->load->view("defaults/setup-defaults",$data);
	}
}