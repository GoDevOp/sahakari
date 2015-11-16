<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller {
	public function _remap($news_id)
	{
		$this->load->model("MNews");
		if($news_id!="" && $news_id!="index"):
			$NewsItem=$this->MNews->getNewsItemByID($news_id);
			$this->MNews->UpdateViews($news_id);
			$data['NewsItem']=$NewsItem;
			$this->load->view('news/view',$data);
		else:
			$NewsItems=$this->MNews->getNewsItems();
			$data['NewsItems']=$NewsItems;
			$this->load->view('news/list',$data);
		endif;
	}
}
