<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Advertisement extends CI_Controller{
	function index(){
		$this->load->model("MAdvertisement");
		$data['advertisement']=$this->MAdvertisement->getAdvertisement();
		$this->load->view("advertisement/view",$data);
	}
	function add(){
		$this->load->model("MAdvertisement");
		$this->load->view("advertisement/add");
		if(isset($_POST['submit'])){
			$data=array(
						'advertisement_title'=>$_POST['advertisement_title'],
						'advertisement_url'=>$_POST['advertisement_url'],
						'from_date'=>$_POST['from_date'],
						'to_date'=>$_POST['to_date'],
						'location'=>$_POST['location'],
						'image'=>$_POST['photo'],
						'display_order'=>$this->MAdvertisement->getDisplayOrder("tbl_advertisement"),
						);
			$this->MAdvertisement->insert($data);
			redirect("advertisement");
			//testArray($data);die;		
		}
	}
	function edit($id){
		$this->load->model("MAdvertisement");
		$data['advertisement']=$this->MAdvertisement->getAdvertisementById($id);		
		testArray($data);
			if(isset($_POST['submit'])){
			$data=array(
						'advertisement_title'=>$_POST['advertisement_title'],
						'advertisement_url'=>$_POST['advertisement_url'],
						'from_date'=>$_POST['from_date'],
						'to_date'=>$_POST['to_date'],
						'location'=>$_POST['location'],
						'image'=>$_POST['photo'],
						);
			$this->MAdvertisement->updateAdvertisement($data,$id);
			redirect("advertisement");
			}
			$this->load->view("advertisement/edit",$data);
	}
	function delete(){
		$this->load->model("MAdvertisement");
		$advertisement_id=$this->uri->segment(3);
		$this->MAdvertisement->delete($advertisement_id);
		redirect("advertisement");
	}
	function publish($advertisement_id)
	{
		$this->load->model("MAdvertisement");
		$this->MAdvertisement->publish($advertisement_id);
		redirect("advertisement");		
	}
	function unpublish($advertisement_id)
	{
		$this->load->model("MAdvertisement");
		$this->MAdvertisement->unpublish($advertisement_id);
		redirect("advertisement");		
	}
	function displayorderup($advertisement_id){
		$this->load->model("MAdvertisement");
		$current=$this->MAdvertisement->getDisplayOrderById($advertisement_id);
		$newdisplayorder=$this->MAdvertisement->getDisplayOrderToMove($current);
		$newstory=$this->MAdvertisement->getNewsByDisplayOrder($newdisplayorder);
		//testArray($newstory);die;
		$oldstory=$this->MAdvertisement->getNewsByDisplayOrder($current);
		$this->MAdvertisement->updateDisplayOrder($current,$newstory->advertisement_id);
		$this->MAdvertisement->updateDisplayOrder($newdisplayorder,$oldstory->advertisement_id);
		redirect("advertisement");
		//$this->MSuccessStories->updateDisplayOrder($story_id);
	}
	function displayorderdown($advertisement_id){
		$this->load->model("MAdvertisement");
		$current=$this->MAdvertisement->getDisplayOrderById($advertisement_id);
		$newdisplayorder=$this->MAdvertisement->getDisplayOrderToMoveDown($current);
		$newstory=$this->MAdvertisement->getNewsByDisplayOrder($newdisplayorder);
		$oldstory=$this->MAdvertisement->getNewsByDisplayOrder($current);
		$this->MAdvertisement->updateDisplayOrder($current,$newstory->advertisement_id);
		$this->MAdvertisement->updateDisplayOrder($newdisplayorder,$oldstory->advertisement_id);
		redirect("advertisement");
		//$this->MSuccessStories->updateDisplayOrder($story_id);
	}
}