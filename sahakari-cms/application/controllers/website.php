<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Website extends CI_Controller{
	function index(){
	$this->load->model("MWebsite");
	$data['website']=$this->MWebsite->getwebsite();
	$this->load->view("websitelist",$data);
	//testArray($data);
	}
	function updatewebsite(){
	$this->load->model("MWebsite");
	$data['website']=$this->MWebsite->getwebsite();
	$this->load->view("editwebsite",$data);
		if(isset($_POST['title'])){
		$data=array(
					'title'=>$_POST['title'],
					'contact'=>$_POST['contact'],
					'copyright'=>$_POST['copyright']
					);
		//testArray($data);die;
		$this->MWebsite->updateWebsite($data);
		redirect("website");
		}
	//$title=$this->uri->segment(
	}
}