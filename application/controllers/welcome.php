<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function index()
	{
		$this->load->model("MNews");
		$data['TickerNewsItems']=$this->MNews->getNewsItems();
		$data['popularnews']=$this->MNews->getPopularNews();
		$data['MainNewsItems']=$this->MNews->getMainNewsItems(5);
		$this->load->model("MPhotoFeatures");
		$data['PhotoFeatures']=$this->MPhotoFeatures->getPhotoFeatures();
		$this->load->model("MCompanyInfos");
		$CompanyInfo=$this->MCompanyInfos->getRandomCompany();
		$data['CompanyInfo']=$CompanyInfo;
		$this->load->model("MSuccessStory");
		$SuccessStory=$this->MSuccessStory->getSuccessStory();
		$data['SuccessStory']=$SuccessStory;
		$this->load->model("MInternationalNews");
		$InternationalNews=$this->MInternationalNews->getNewsItems();
		$data['InternationalNews']=$InternationalNews;
		$data['InternationalNewsItems']=$this->MInternationalNews->getMainNewsItems(7);
		$this->load->model("MInterviews");
		$Interview=$this->MInterviews->getInterviews(1);
		$data['Interview']=$Interview[0];
		$this->load->model("MPublicArticles");
		$PublicArticles=$this->MPublicArticles->getArticles(1);
		$data['PublicArticles']=$PublicArticles[0];
		$this->load->model("MEvents");
		$data['events']=$this->MEvents->getEvents();
		$this->load->view('welcome_message',$data);
	}
}
