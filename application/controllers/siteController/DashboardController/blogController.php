<?php
class BlogController extends CI_Controller{
  public function __construct(){
    parent::__construct();
    $this->load->model('siteModel/DashboardModel/dashboardModel');
  }
  public function index(){

  }
  public function blog(){
    $blog = $this->dashboardModel->get('category', '', 'sz_blog');
    $dataBlog = array(
      'blog'  => $blog,
      'blogCh'  => $blog
    );
    $this->load->view('DashboardView/blog_page', $dataBlog);
  }
  public function blogInsert(){

  }
}
