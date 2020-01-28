
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="style/images/favicon.png">

  <title>Missio</title>


  <?php $this->load->view('Dependencies/Home/style') ?>


</head>
<body>
<div class="content-wrapper">
    <?php $this->load->view('/Dependencies/home/menu_detail') ?>
    
    <div class="wrapper light-wrapper">
      <div class="container inner pt-60">
        <div class="blog grid grid-view boxed">
          <div class="row isotope">
            <?php foreach ($blog_list as $blog): ?>

            <div class="item post grid-sizer col-md-6 col-lg-4">
              <div class="box bg-white shadow p-30">
                <figure class="main mb-30 overlay overlay1 rounded"><a href="#"> <img src="<?=base_url('/uploads/'.$blog->image) ?>" alt="" /></a>
                  <figcaption>
                    <h5 class="text-uppercase from-top mb-0"><?=$this->lang->line('readme_more') ?></h5>
                  </figcaption>
                </figure>
                <div class="meta mb-10"><span class="category"><a href="<?=base_url('/blog')?>" class="hover color"><?=$blog->category ?></a></span></div>
                <h2 class="post-title"><a href="blog-post.html"><?=$blog->name ?></a></h2>
                <div class="post-content">
                  <p><?php echo mb_substr($blog->text, 0,200, 'UTF-8').'...'; ?><a href="<?=$blog->sef_link ?>"</p>
                </div>
                <!-- /.post-content -->
                <hr />
                <div class="meta meta-footer d-flex justify-content-between mb-0"><span class="date">18 Jun 2018</span><span class="comments"><a href="#">5</a></span></div>
              </div>
              <!-- /.box -->
            </div>

          <?php endforeach; ?>

          </div>
          <!-- /.row -->
        </div>
        <!-- /.blog -->
        <div class="space30 d-block d-md-none"></div>
        <div class="pagination bg text-center">
          <ul>
            <li><a href="#" class="btn btn-white shadow"><i class="mi-arrow-left"></i></a></li>
            <li class="active"><a href="#" class="btn btn-white shadow"><span>1</span></a></li>
            <li><a href="#" class="btn btn-white shadow"><span>2</span></a></li>
            <li><a href="#" class="btn btn-white shadow"><span>3</span></a></li>
            <li><a href="#" class="btn btn-white shadow"><i class="mi-arrow-right"></i></a></li>
          </ul>
        </div>
        <!-- /.pagination -->
      </div>
      <!-- /.container -->
    </div>
    <!-- /.wrapper -->
    <footer class="dark-wrapper inverse-text">
      <div class="container inner">
        <div class="row d-md-flex align-items-md-center">
          <div class="col-md-4 text-center text-md-left">
            <p class="mb-0">© 2019 Missio. All rights reserved.</p>
          </div>
          <!--/column -->
          <div class="col-md-4 text-center">
            <img src="/assets/#" srcset="style/images/logo-light.png 1x, style/images/logo-light@2x.png 2x" alt="" />
          </div>
          <!--/column -->
          <div class="col-md-4 text-center text-md-right">
            <ul class="social social-mute social-s mt-10">
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
              <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
              <li><a href="#"><i class="fa fa-vimeo"></i></a></li>
              <li><a href="#"><i class="fa fa-instagram"></i></a></li>
            </ul>
          </div>
          <!--/column -->
        </div>
        <!--/.row -->
      </div>
      <!-- /.container -->
    </footer>
  </div>
  <?php  $this->load->view('Dependencies/home/script') ?>
</body>
</html>
