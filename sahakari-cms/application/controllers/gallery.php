<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery extends CI_Controller{
	function index(){
	$this->load->model("MGallery");
	$data['gallery']=$this->MGallery->getGallery();
	$this->load->view("gallery/view",$data);
	}
	function add(){
	$this->load->model("MGallery");
	//$this->load->model("MPhotos");
		if(isset($_POST['submit'])){
		$data=array(
					'gallery_title'=>$_POST['gallery_title'],
					'gallery_description'=>$_POST['gallery_description'],
					'display_order'=>$this->MGallery->getDisplayOrder("tbl_gallery"),
					);
		$this->MGallery->insertGallery($data);
		redirect("gallery");
		}
	$this->load->view("gallery/add");
	}
	function delete(){
	$this->load->model("MGallery");
	$gallery_id=$this->uri->segment(3);
	$this->MGallery->deleteGallery($gallery_id);
	redirect("gallery");
	}
	function edit(){
	$this->load->model("MGallery");
	$gallery_id=$this->uri->segment(3);
	$data['gallery']=$this->MGallery->getGalleryById($gallery_id);
		if(isset($_POST['submit'])){
		$gallery=array(
						'gallery_title'=>$_POST['gallery_title'],
						'gallery_description'=>$_POST['gallery_description'],
						);
		$this->MGallery->updateGallery($gallery,$gallery_id);
		redirect("gallery");
		}
	$this->load->view("gallery/edit",$data);
	}
	function publish($gallery_id)
	{
		$this->load->model("MGallery");
		$this->MGallery->publish($gallery_id);
		redirect("gallery");		
	}
	function unpublish($gallery_id)
	{
		$this->load->model("MGallery");
		$this->MGallery->unpublish($gallery_id);
		redirect("gallery");		
	}
	function displayorderup($gallery_id){
		$this->load->model("MGallery");
		$current=$this->MGallery->getDisplayOrderById($gallery_id);
		$newdisplayorder=$this->MGallery->getDisplayOrderToMove($current);
		$newstory=$this->MGallery->getGalleryByDisplayOrder($newdisplayorder);
		//testArray($newstory);die;
		$oldstory=$this->MGallery->getGalleryByDisplayOrder($current);
		$this->MGallery->updateDisplayOrder($current,$newstory->gallery_id);
		$this->MGallery->updateDisplayOrder($newdisplayorder,$oldstory->gallery_id);
		redirect("gallery");
		//$this->MSuccessStories->updateDisplayOrder($story_id);
	}
	function displayorderdown($gallery_id){
		$this->load->model("MGallery");
		$current=$this->MGallery->getDisplayOrderById($gallery_id);
		$newdisplayorder=$this->MGallery->getDisplayOrderToMoveDown($current);
		$newstory=$this->MGallery->getGalleryByDisplayOrder($newdisplayorder);
		$oldstory=$this->MGallery->getGalleryByDisplayOrder($current);
		$this->MGallery->updateDisplayOrder($current,$newstory->gallery_id);
		$this->MGallery->updateDisplayOrder($newdisplayorder,$oldstory->gallery_id);
		redirect("gallery");
		//$this->MSuccessStories->updateDisplayOrder($story_id);
	}
}