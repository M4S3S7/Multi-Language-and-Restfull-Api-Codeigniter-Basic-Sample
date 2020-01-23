<?php
class fileController extends CI_Controller{
  public function __construct(){
    parent::__construct();
    $this->load->model('siteModel/DashboardModel/dashboardModel');
    $this->load->helper('string');
  }
  public function index(){

  }
  public function image(){
    // U -- update kısaltması
    if($this->uri->segment(3) == 'u'){
      $data = $this->uri->segment(4);//category Name
      $id   = $this->uri->segment(5);//gelen id adı
      $config["allowed_types"]  = "jpg|gif|png";
      $config["upload_path"]    = "uploads/";
      $file_save_name           = random_string('alnum', 16);
      $config['file_name']      = $file_save_name.".jpg";

      $this->load->library("upload", $config);

      //dropzone name="file" olarak tanımlıyor muş
      if($this->upload->do_upload("imageFile")){
      //  print_r($this->upload->data()); //eğer detay almak istersem buyrayı kullanabilirim
        $file                  =  $file_save_name.".jpg";
        $dataInsert            =  array(
          'category'           => $data,
          'name'               => $file,
        );
        $this->dashboardModel->update($id, 'sz_image', $dataInsert);
        redirect(base_url('dashboard/image/'.$this->uri->segment(4)));
      }else {
        print_r(array('error' => $this->upload->display_errors()));
      }
      // i insert olarak kısalttım
    }elseif ($this->uri->segment(3) == 'i') {
      $data = $this->uri->segment(4);
      $config["allowed_types"]  = "jpg|gif|png";
      $config["upload_path"]    = "uploads/";
      $file_save_name           = random_string('alnum', 16);
      $config['file_name']      = $file_save_name.".jpg";

      $this->load->library("upload", $config);

      //dropzone name="file" olarak tanımlıyor muş
      if($this->upload->do_upload("file")){
        //print_r($this->upload->data()); //eğer detay almak istersem buyrayı kullanabilirim
        $file                  =  $file_save_name.".jpg";
        $dataInsert            =  array(
          'category'           => $data,
          'name'               => $file,
        );
        $this->dashboardModel->insert('sz_image', $dataInsert);
      }else {
        redirect(base_url('dashboard/image/'.$rdrct));
        print_r(array('error' => $this->upload->display_errors()));
      }
      //delete işleminin yapıldığı
    }elseif($this->uri->segment(3) == 'd'){
      $id               = $this->uri->segment(5);
      $rdrct            = $this->uri->segment(4); //static redirect işteci
      $dataArray        = array(
        'delete'        => 1,
        'delete_user'   => 'user name',
        'delete_date'   => date('d/m/Y')
      );
      $delete = $this->dashboardModel->update($id, 'sz_image', $dataArray);
      if($delete){
        $this->session->set_flashdata('true', 'Completed');
        redirect(base_url('dashboard/image/'.$rdrct));
      }else {
        $this->session->set_flashdata('err', 'Complated');
        redirect(base_url('dashboard/image/'.$rdrct));
      }
    }
  }
}
