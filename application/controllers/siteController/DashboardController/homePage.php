<?php

class HomePage extends CI_Controller{
  var $gImage;
  public function __construct(){
    parent::__construct();
    $this->load->model('siteModel/DashboardModel/dashboardModel');
  }
  public function index(){
    $this->load->view('DashboardView/home_page');
  }
  public function image(){
    $gImage     = $this->uri->segment(3);
    $imageDB    = $this->dashboardModel->get('category', $gImage, 'sz_image');
    $dataImage  = array(
      'update'  => $imageDB,
      'image'   => $imageDB
    );
    $this->load->view('DashboardView/image_page', $dataImage);
  }
}
