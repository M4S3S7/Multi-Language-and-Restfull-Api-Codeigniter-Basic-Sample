
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
    <?php foreach ($blog_detail as $blog): ?>
      <div class="wrapper light-wrapper">
        <div class="container inner pt-60">
          <div class="row">
            <div class="col-md-12">
              <div class="blog classic-view boxed">
                <div class="box bg-white shadow">
                  <div class="post text-center">
                    <!-- üst fotoğraf -->
                    <figure class="main rounded"><img src="<?=base_url('/uploads/'.$blog->image); ?>" alt="" /></figure>
                    <div class="space10"></div>
                    <div class="post-content text-left">
                      <div class="meta mb-10"><span class="category"><a href="<?=base_url('/blog') ?>" class="hover color"><?=$blog->category ?></a></span></div>
                      <h1 class="post-title"><?=$blog->name ?></h1>
                      <div class="meta"><span class="date"><?=$blog->add_date ?></span></div>
                      <?=$blog->text ?>
                        <div class="meta tags mb-10 text-center">© Sezgin Marble</div>
                        <ul class="social social-mute social-s text-center">
                          <li><a href="https://www.facebook.com/sezgin.marble"><i class="fa fa-facebook"></i></a></li>
                          <li><a href="https://tr.linkedin.com/company/sezgin-marble-ltd-"><i class="fa fa-linkedin"></i></a></li>
                          <li><a href="https://www.instagram.com/sezginmarble/"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                        <!-- /.social -->
                      </div>
                      <!-- /.post-content -->
                    </div>
                    <!-- /.post -->
                  </div>
                  <!-- /.box -->
                </div>
                <!-- /.blog -->
              </div>
              <!--/column -->

              <!-- /column .sidebar -->
            </div>
            <!--/.row -->
          </div>
          <!-- /.container -->
        </div>
      <?php endforeach; ?>
      <!-- /.wrapper -->
      <?php $this->load->view('/Dependencies/home/footer')  ?>
    </div>
    <?php  $this->load->view('Dependencies/home/script') ?>
  </body>
  </html>
