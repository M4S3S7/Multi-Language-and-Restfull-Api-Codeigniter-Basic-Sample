<?php if($this->session->flashdata('true')){ ?>
  <div class="col-md-12">
    <!-- Success Alert -->
    <div class="alert alert-success alert-dismissable" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
      <h3 class="alert-heading font-size-h4 font-w400">Başarılı</h3>
      <p class="mb-0">Başarılı Bir Şekilde Eklendi <a class="alert-link" href="javascript:void(0)"></a>!</p>
    </div>
    <!-- END Success Alert -->
  </div>
<?php }else if ($this->session->flashdata('err')) { ?>
  <div class="col-md-12">
    <!-- Success Alert -->
    <div class="alert alert-danger alert-dismissable" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
      <h3 class="alert-heading font-size-h4 font-w400">Hata</h3>
      <p class="mb-0">Sanırım Bir Sistem Sorunu Oluştu lütfen yazılımcınız ile Görüşün<a class="alert-link" href="javascript:void(0)">link</a>!</p>
    </div>
    <!-- END Success Alert -->
  </div>
<?php } ?>
