<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PhotoFeature extends CI_Controller{
	function index()
	{
		$this->load->model("MPhotoFeatures");
		$data['PhotoFeatures']=$this->MPhotoFeatures->getPhotoFeatures();
		$this->load->view("photofeatures/view",$data);
	}
	function add()
	{
		$this->load->model("MPhotoFeatures");
		if(isset($_POST['submit']))
		{
			$PostedData=array(
			"title"=>$_POST['title'],
			"photo"=>$_POST['photo'],
			"caption"=>$_POST['caption'],
			"added_on"=>$_POST['added_on']
			);
			$this->MPhotoFeatures->add($PostedData);
		}
		$this->load->view("photofeatures/add");	
	}
	function edit($photofeature_id)
	{
		$this->load->model("MPhotoFeatures");
		$data['PhotoFeature']=$this->MPhotoFeatures->getPhotoFeature($photofeature_id);
		if(isset($_POST['submit']))
		{
			$PostedData=array(
			"photofeature_id"=>$photofeature_id,
			"title"=>$_POST['title'],
			"photo"=>$_POST['photo'],
			"caption"=>$_POST['caption'],
			"added_on"=>$_POST['added_on']
			);
			$this->MPhotoFeatures->update($PostedData);
			redirect("photofeature");
		}
		$this->load->view("photofeatures/edit",$data);	
	}
	function delete($photofeature_id)
	{
		$this->load->model("MPhotoFeatures");
		$this->MPhotoFeatures->delete($photofeature_id);
		redirect("photofeature");
	}
	function publish($photofeature_id)
	{
		$this->load->model("MPhotoFeatures");
		$this->MPhotoFeatures->publish($photofeature_id);
		redirect("photofeature");	
	}
	function unpublish($photofeature_id)
	{
		$this->load->model("MPhotoFeatures");
		$this->MPhotoFeatures->unpublish($photofeature_id);
		redirect("photofeature");	
	}
}