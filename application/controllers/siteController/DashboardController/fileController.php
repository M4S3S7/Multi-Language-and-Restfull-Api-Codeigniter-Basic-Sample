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
      $text = $this->input->post('item_desc');
      $item = $this->input->post('item_name');
      $video= $this->input->post('item_video');
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
          'text'               => $text,
          'item_name'          => $item,
          'video'              => $video
        );
        $this->dashboardModel->update($id, 'sz_image', $dataInsert);
        redirect(base_url('dashboard/image/'.$this->uri->segment(4)));
      }else {
        $dataInsert            =  array(
          'category'           => $data,
          'text'               => $text,
          'item_name'          => $item,
          'video'              => $video
        );
        $this->dashboardModel->update($id, 'sz_image', $dataInsert);
        redirect(base_url('dashboard/image/'.$this->uri->segment(4)));
      }
      // i insert olarak kısalttım
    }elseif ($this->uri->segment(3) == 'i') {
      $data = $this->uri->segment(4);
      $text = $this->input->post('item_desc');
      $item = $this->input->post('item_name');
      $video= $this->input->post('item_video');
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
          'text'               => $text,
          'item_name'          => $item,
          'video'              => $video
        );
        $this->dashboardModel->insert('sz_image', $dataInsert);
      }else {
        redirect(base_url('dashboard/image/'.$this->uri->segment(4)));
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
  public function floaraInsert(){
    try {
      // File Route.
      $fileRoute = 'uploads/';
      $fieldname = "file";
      // Get filename.
      $filename = explode(".", $_FILES[$fieldname]["name"]);
      // Do not use $_FILES["file"]["type"] as it can be easily forged.
      $finfo = finfo_open(FILEINFO_MIME_TYPE);
      $tmpName = $_FILES[$fieldname]["tmp_name"];
      $mimeType = finfo_file($finfo, $tmpName);
      $extension = end($filename);
      // Allowed extensions.
      $allowedExts = array("gif", "jpeg", "jpg", "png", "svg", "blob");
      // Allowed mime types.
      $allowedMimeTypes = array("image/gif", "image/jpeg", "image/pjpeg", "image/x-png", "image/png", "image/svg+xml");
      // Validate image.
      if (!in_array(strtolower($mimeType), $allowedMimeTypes) || !in_array(strtolower($extension), $allowedExts)) {
        throw new \Exception("File does not meet the validation.");
      }
      // Generate new random name.
      $name = sha1(microtime()) . "." . $extension;
      $fullNamePath =  $fileRoute . $name;
      // Check server protocol and load resources accordingly.
      if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] != "off") {
        $protocol = "https://";
      } else {
        $protocol = "http://";
      }
      // Save file in the uploads folder.
      move_uploaded_file($tmpName, $fullNamePath);
      // Generate response.
      $response = new \StdClass;
      $response->link = $protocol.$_SERVER["HTTP_HOST"].dirname($_SERVER["PHP_SELF"]).$fileRoute . $name;
      // Send response.
      echo stripslashes(json_encode($response));
    } catch (Exception $e) {
      // Send error response.
      echo $e->getMessage();
      http_response_code(404);
    }
  }
  public function floaraGet(){
    // Array of image links to return.
    $response = array();
    // Image types.
    $image_types = array(
      "image/gif",
      "image/jpeg",
      "image/pjpeg",
      "image/jpeg",
      "image/pjpeg",
      "image/png",
      "image/x-png"
    );
    // Filenames in the uploads folder.
    $fnames = scandir("uploads");
    // Check if folder exists.
    if ($fnames) {
      // Go through all the filenames in the folder.
      foreach ($fnames as $name) {
        // Filename must not be a folder.
        if (!is_dir($name)) {
          // Check if file is an image.
          if (in_array(mime_content_type(getcwd() . "/uploads/" . $name), $image_types)) {
            // Add to the array of links.
            $data = array(
              'url' => base_url('/uploads/'.$name),
              'thumb' => base_url('/uploads/'.$name),
              'tag'  => 'Marble'
            );
            array_push($response, $data);
          }
        }
      }
    }
    // Folder does not exist, respond with a JSON to throw error.
    else {
      $response = new StdClass;
      $response->error = "Images folder does not exist!";
    }
    $response = json_encode($response);
    // Send response.
    echo stripslashes($response);
  }
  public function floaraDelete(){
    $src = $this->input->post('src');
    if (file_exists(getcwd() . $src)) {
      unlink(getcwd() . $src);
    }
  }
}
