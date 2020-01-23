<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="assets/style/images/favicon.png">
  <title>Missio</title>
  <?php $this->load->view('Dependencies/home/style') ?>
</head>
<body>
  <div class="content-wrapper">
    <?php $this->load->view('Dependencies/home/menu') ?>
    <!-- rev slider -->
    <div class="rev_slider_wrapper fullscreen-container">
      <div id="slider6" class="rev_slider fullscreenbanner dark-wrapper" data-version="5.4.7">
        <ul>
         <?php foreach($images as $images){
           if($images->delete == 0){ ?>
          <li data-transition="parallaxvertical" data-thumb="<?php echo base_url('uploads/'.$images->name); ?>">
            <img src="<?php echo base_url('uploads/'.$images->name); ?>" alt="" />
          </li>
        <?php }
        }
         ?>

        </ul>
        <div class="tp-bannertimer tp-bottom"></div>
      </div>
      <!-- /.rev_slider -->
    </div>
    <!-- /.rev_slider_wrapper -->
  </div>
  <!-- /.content-wrapper -->
  <?php  $this->load->view('Dependencies/home/script') ?>
</body>
</html>
