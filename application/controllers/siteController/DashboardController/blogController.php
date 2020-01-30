<?php
class BlogController extends CI_Controller{
  public function __construct(){
    parent::__construct();
    $this->load->model('siteModel/DashboardModel/dashboardModel');
    $this->load->helper('string');
  }
  public function index(){

  }
  public function blog(){
    $blog = $this->dashboardModel->get('category', 'blog', 'sz_blog');
    $dataBlog = array(
      'blog'  => $blog,
      'blogCh'  => $blog
    );
    $this->load->view('DashboardView/blog_page', $dataBlog);
  }
  public function blogInsert(){
    $name                     = $this->input->post('blog_name');
    $desc                     = $this->input->post('ckeditor');
    $sef_link                 = $this->dashboardModel->sef_link($name);
    if ($this->uri->segment(3) == 'update') {
      // update alınan yer
      $id                       = $this->uri->segment(4);
      //image
      $config["allowed_types"]  = "jpg|gif|png";
      $config["upload_path"]    = "uploads/";
      $file_save_name           = random_string('alnum', 16);
      $config['file_name']      = $file_save_name.".jpg";

      $this->load->library("upload", $config);

      //dropzone name="file" olarak tanımlıyor muş
      if($this->upload->do_upload("file")){
        //  print_r($this->upload->data()); //eğer detay almak istersem buyrayı kullanabilirim
        $file                  =  $file_save_name.".jpg";
        $dataInsert            =  array(
          'category'           => 'blog',
          'name'               => $name,
          'text'               => $desc,
          'image'              => $file,
          'sef_link'           => $sef_link,
          'add_date'           => date('d-m-Y')
        );
        $insert = $this->dashboardModel->update($id, 'sz_blog', $dataInsert);
        if ($insert) {
          redirect(base_url('/dashboard/blog', 200));
          $this->session->set_flashdata('true', 'Oldu');
        }else {
          redirect(base_url('/dashboard/blog', 300));
          $this->session->set_flashdata('err', 'Sorun var');
        }
      }else {
        $dataInsert            =  array(
          'category'           => 'blog',
          'name'               => $name,
          'text'               => $desc,
          'sef_link'           => $sef_link,
          'add_date'           => date('d-m-Y')
        );
        $insert = $this->dashboardModel->update($id, 'sz_blog', $dataInsert);
        if($insert){
          redirect(base_url('/dashboard/blog'));
          $this->session->set_flashdata('true', 'oldu');
        }else {
          redirect(base_url('/dashboard/blog'));
          $this->session->set_flashdata('err', 'Sorun Var');
        }
      }
    }elseif($this->uri->segment(3) == 'i') {
      //image
      $config["allowed_types"]  = "jpg|gif|png";
      $config["upload_path"]    = "uploads/";
      $file_save_name           = random_string('alnum', 16);
      $config['file_name']      = $file_save_name.".jpg";


      $this->load->library("upload", $config);

      //dropzone name="file" olarak tanımlıyor muş
      if($this->upload->do_upload("file")){
        print_r($this->upload->data()); //eğer detay almak istersem buyrayı kullanabilirim
        $file                  =  $file_save_name.".jpg";
        $dataInsert            =  array(
          'category'           => 'blog',
          'name'               => $name,
          'text'               => $desc,
          'image'              => $file,
          'sef_link'           => $sef_link,
          'add_date'           => date('d/m/Y')
        );
        $insert = $this->dashboardModel->insert('sz_blog', $dataInsert);
        if ($insert) {
          redirect(base_url('/dashboard/blog', 200));
          $this->session->set_flashdata('true', 'Oldu');
        }else {
          redirect(base_url('/dashboard/blog', 200));
          $this->session->set_flashdata('err', 'Sorun var');
        }
      }else {
        $dataInsert            =  array(
          'category'           => 'blog',
          'name'               => $name,
          'text'               => $desc,
          'sef_link'           => $sef_link,
          'add_date'           => date('d/m/Y')
        );
        $insert = $this->dashboardModel->insert('sz_blog', $dataInsert);
        if($insert){
          redirect(base_url('/dashboard/blog'));
          $this->session->set_flashdata('true', 'oldu');
        }else {
          redirect(base_url('/dashboard/blog'));
          $this->session->set_flashdata('err', 'Sorun Var');
        }
      }
    }elseif($this->uri->segment(3) == 'delete'){
      $id                    = $this->uri->segment(4);
      $dataInsert            =  array(
        'delete_date'           => date('d/m/Y')
      );
      $insert = $this->dashboardModel->update($id, 'sz_blog', $dataInsert);
      if($insert){
        redirect(base_url('/dashboard/blog'));
        $this->session->set_flashdata('true', 'oldu');
      }else {
        redirect(base_url('/dashboard/blog'));
        $this->session->set_flashdata('err', 'Sorun Var');
      }
    }
  }
}
