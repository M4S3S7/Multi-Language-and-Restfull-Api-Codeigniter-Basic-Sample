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
            if ($images->delete == 0) {
              if($images->text == ''){ ?>
                <li data-transition="parallaxvertical" data-thumb="<?php echo base_url('uploads/'.$images->name); ?>">
                  <img src="<?php echo base_url('uploads/'.$images->name); ?>" alt="" />
                </li>
              <?php }elseif($images->text != ''){ ?>
                <li data-transition="slideleft" data-thumb="<?php echo base_url('uploads/'.$images->name); ?>"><img src="<?php echo base_url('uploads/'.$images->name); ?>" alt="" />
                  <div class="tp-caption font-weight-700 text-uppercase color-white text-center" data-x="center" data-y="middle" data-voffset="['-75','-75','-75','-55']" data-fontsize="['18','18','18','18']" data-lineheight="['28','28','28','28']"
                  data-width="['600','600','600','600']" data-textAlign="['center','center','center','center']" data-whitespace="['normal','normal','normal','normal']" data-frames='[{"delay":500,"speed":2000,"frame":"0","from":"sX:0.9;sY:0.9;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":500,"frame":"999","to":"sX:0.9;sY:0.9;opacity:0;fb:20px;","ease":"Power3.easeInOut"}]'
                  data-responsive="on" data-responsive_offset="on" style="z-index: 9; letter-spacing: 3px;"><?php echo $images->text ?></div>
                  <div class="tp-caption font-weight-700 color-white text-center" data-x="center" data-y="middle" data-voffset="['0','0','0','0']" data-fontsize="['55','55','55','35']" data-lineheight="['65','65','65','45']" data-width="['800','800','680','340']"
                  data-textAlign="['center','center','center','center']" data-whitespace="['normal','normal','normal','normal']" data-frames='[{"delay":500,"speed":2000,"frame":"0","from":"sX:0.9;sY:0.9;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":500,"frame":"999","to":"sX:0.9;sY:0.9;opacity:0;fb:20px;","ease":"Power3.easeInOut"}]'
                  data-responsive="on" data-responsive_offset="on" style="z-index: 9;"><?php echo $images->item_name ?></div>
                  <!-- <a class="tp-caption btn btn-l btn-white" data-x="center" data-y="middle" data-voffset="['100','100','100','80']" data-width="['auto','auto','auto','auto']" data-textAlign="['center','center','center','center']" data-frames='[{"delay":500,"speed":2000,"frame":"0","from":"sX:0.9;sY:0.9;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":500,"frame":"999","to":"sX:0.9;sY:0.9;opacity:0;fb:20px;","ease":"Power3.easeInOut"}]'
                  data-responsive="on" data-responsive_offset="on" style="z-index: 9;" href="#">View Images</a> -->
                </li>
              <?php  }elseif($images->video == 'url'){ ?>
                <li data-transition="fade"><img src="/assets/style/media/movie2.jpg" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina="" />
                  <div class="rs-background-video-layer" data-forcerewind="on" data-volume="mute" data-videowidth="100%" data-videoheight="100%" data-videomp4="/assets/style/media/movie.mp4" data-videopreload="preload" data-videoloop="loop" data-forcecover="1"
                  data-aspectratio="16:9" data-autoplay="true" data-autoplayonlyfirsttime="false" data-nextslideatend="false" data-dottedoverlay="darkoverlay"></div>
                  <div class="tp-caption font-weight-700 color-white text-center" data-x="center" data-y="middle" data-voffset="['-40','-40','-40','-40']" data-fontsize="['55','55','55','35']" data-lineheight="['65','65','65','45']" data-width="['1000','1000','1000','1000']"
                  data-textAlign="['center','center','center','center']" data-whitespace="['normal','normal','normal','normal']" data-frames='[{"from":"x:-50px;opacity:0;","speed":1000,"to":"o:1;","delay":1000,"ease":"Power2.easeOut"},{"delay":"wait","speed":1500,"to":"opacity:0;","ease":"Power4.easeIn"}]'
                  data-responsive="on" data-responsive_offset="on" style="z-index: 9;">I'm Caitlyn Missio</div>
                  <div class="tp-caption font-weight-700 text-uppercase color-white text-center" data-x="center" data-y="middle" data-voffset="['40','40','40','40']" data-fontsize="['22','22','22','22']" data-lineheight="['32','32','32','32']" data-width="['1000','1000','1000','1000']"
                  data-textAlign="['center','center','center','center']" data-whitespace="['normal','normal','normal','normal']" data-frames='[{"from":"x:50px;opacity:0;","speed":1000,"to":"o:1;","delay":1500,"ease":"Power2.easeOut"},{"delay":"wait","speed":1500,"to":"opacity:0;","ease":"Power4.easeIn"}]'
                  data-responsive="on" data-responsive_offset="on" style="z-index: 9; letter-spacing: 1px;">Director & Filmmaker</div>
                  <div class="tp-caption rev-scroll-btn  rs-parallaxlevel-5" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['bottom','bottom','bottom','bottom']" data-voffset="['20','20','20','20']" data-width="28"
                  data-height="44" data-whitespace="nowrap" data-type="button" data-actions='[{"event":"click","action":"scrollbelow","offset":"px","delay":"","speed":"300","ease":"Linear.easeNone"}]' data-basealign="slide" data-responsive_offset="on"
                  data-responsive="off" data-frames='[{"delay":800,"speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]' style="z-index: 19; min-width: 28px; max-width: 28px; max-width: 44px; max-width: 44px; white-space: nowrap;font-weight: 400;border-color:rgba(255,255,255,1);border-style:solid;border-width:2px;border-radius:12px;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;"><span></span></div>
                </li>
              <?php }
            }
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
