<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Photos extends CI_Controller{
	function index(){
	$this->load->model("MPhotos");
	//$this->load->model("MGallery");
	$data['photos']=$this->MPhotos->getPhotos();
	$this->load->view("photos/view",$data);
	}
	function add(){
	$this->load->model("MPhotos");
		if(isset($_POST['submit'])){
		//testArray($_POST);die;
		$data=array(
					   'photo_title'=>$_POST['photo_title'],
					   'photo_caption'=>$_POST['photo_caption'],
					   'photo'=>$_POST['photo'],
					   'display_order'=>$this->MPhotos->getDisplayOrder("tbl_photos"),
					   );
		$this->MPhotos->insertPhotos($data);
		}
	$this->load->view("photos/add");	
	}
	function delete(){
		$this->load->model("MPhotos");
		$photos_id=$this->uri->segment(3);
		$this->MPhotos->delete($photos_id);
		redirect("photos");
	}
	function edit(){
		$this->load->model("MPhotos");
		$photos_id=$this->uri->segment(3);
		$data['photo']=$this->MPhotos->getPhotosByPhotoId($photos_id);
			if(isset($_POST['submit'])){
		//testArray($_POST);die;
				$photos=array(
					   'photo_title'=>$_POST['photo_title'],
					   'photo_caption'=>$_POST['photo_caption'],
					   'photo'=>$_POST['photo'],
					  	 );
			$this->MPhotos->updatePhotos($photos,$photos_id);
			redirect("photos");
			}
		$this->load->view("photos/edit",$data);
	}
	function publish($photos_id)
	{
		$this->load->model("MPhotos");
		$this->MPhotos->publish($photos_id);
		redirect("photos");		
	}
	function unpublish($photos_id)
	{
		$this->load->model("MPhotos");
		$this->MPhotos->unpublish($photos_id);
		redirect("photos");		
	}
	function displayorderup($photos_id){
		$this->load->model("MPhotos");
		$current=$this->MPhotos->getDisplayOrderById($photos_id);
		$newdisplayorder=$this->MPhotos->getDisplayOrderToMove($current);
		$newstory=$this->MPhotos->getPhotosByDisplayOrder($newdisplayorder);
		//testArray($newstory);die;
		$oldstory=$this->MPhotos->getPhotosByDisplayOrder($current);
		$this->MPhotos->updateDisplayOrder($current,$newstory->photos_id);
		$this->MPhotos->updateDisplayOrder($newdisplayorder,$oldstory->photos_id);
		redirect("photos");
		//$this->MSuccessStories->updateDisplayOrder($story_id);
	}
	function displayorderdown($photos_id){
		$this->load->model("MPhotos");
		$current=$this->MPhotos->getDisplayOrderById($photos_id);
		$newdisplayorder=$this->MPhotos->getDisplayOrderToMoveDown($current);
		$newstory=$this->MPhotos->getPhotosByDisplayOrder($newdisplayorder);
		$oldstory=$this->MPhotos->getPhotosByDisplayOrder($current);
		$this->MPhotos->updateDisplayOrder($current,$newstory->photos_id);
		$this->MPhotos->updateDisplayOrder($newdisplayorder,$oldstory->photos_id);
		redirect("photos");
		//$this->MSuccessStories->updateDisplayOrder($story_id);
	}
}