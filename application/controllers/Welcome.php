<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->model('siteModel/HomeModel/homeModel');
  }
  public function index(){
    $slayt = $this->homeModel->get('category', 'slayt', 'sz_image');
    $menu  = $this->homeModel->get('category', '', 'sz_menu');
    $data  = array(
      'images' => $slayt,
      'menu'   => $menu
    );
    $this->load->view('HomeView/home_page', $data);
  }
  public function blog_list(){
    $blog_list = $this->homeModel->get('_delete', '', 'sz_blog');
    $data      = array(
      'blog_list' => $blog_list
    );
    $this->load->view('HomeView/blog_list_page', $data);
  }
  public function blog_detail(){
    $blog_detail = $this->homeModel->get('sef_link', $this->uri->segment(3), 'sz_blog');
    $data        = array(
      'blog_detail' => $blog_detail
    );
    $this->load->view('HomeView/blog_detail', $data); // daha eklemedim buraya dikkat etmem gerekiyor
  }
}
