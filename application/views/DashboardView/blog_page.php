
<!doctype html>
<html lang="en" class="no-focus">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

  <title></title>

  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="robots" content="noindex, nofollow">
  <!-- Icons -->
  <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
  <link rel="shortcut icon" href="/Dashboard/media/favicons/favicon.png">
  <link rel="icon" type="image/png" sizes="192x192" href="/Dashboard/media/favicons/favicon-192x192.png">
  <link rel="apple-touch-icon" sizes="180x180" href="/Dashboard/media/favicons/apple-touch-icon-180x180.png">
  <link rel="stylesheet" href="/Dashboard/js/plugins/dropzonejs/dist/dropzone.css">
  <link rel="stylesheet" href="/Dashboard/js/plugins/nestable2/jquery.nestable.min.css">


  <!-- Fonts and Codebase framework -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,400i,600,700">
  <?php $this->load->view('Dependencies/dashboard/style') ?>
</head>
<body>
  <div id="page-container" class="sidebar-o enable-page-overlay side-scroll page-header-modern main-content-boxed">
    <?php $this->load->view('Dependencies/dashboard/menu') ?>
    <main id="main-container">

      <?php  $this->load->view('Dependencies/dashboard/error') ?>
      <div class="content">
        <h2 class="content-heading">Menu Page</h2>
        <div class="block">
          <div class="block-header block-header-default">
            <h3 class="block-title">Menu List</h3>
            <div class="block-options">
              <div class="block-options-item">
                <code>.table</code>
              </div>
            </div>
          </div>
          <div class="block-content">
            <table class="table table-vcenter">
              <thead>
                <tr>
                  <th class="text-center" style="width: 50px;">#</th>
                  <th>Name</th>
                  <th class="d-none d-sm-table-cell" style="width: 15%;">Access</th>
                  <th class="text-center" style="width: 100px;">Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($blog as $blog): ?>
                  <tr>
                    <th class="text-center" scope="row"><?php echo $blog->id ?></th>
                    <td><?php echo $blog->name ?></td>
                    <td class="d-none d-sm-table-cell">
                      <span class="badge badge-warning"></span>
                    </td>
                    <td class="text-center">
                      <div class="btn-group">
                        <button type="button" class="btn btn-alt-info" data-toggle="modal" data-target="#modal-extra-<?php echo $blog->id ?>">Delete</button>
                      </button>
                    </div>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </main>
    <?php foreach ($blogCh as $blogCh): ?>
      <div class="modal" id="modal-extra-<?php echo $blogCh->id ?>" tabindex="-1" role="dialog" aria-labelledby="modal-extra-large" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
          <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
              <div class="block-header bg-primary-dark">
                <h3 class="block-title">Terms &amp; Conditions</h3>
                <div class="block-options">
                  <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                    <i class="si si-close"></i>
                  </button>
                </div>
              </div>
              <div class="block-content">
                <form class="" action="<?php echo base_url("/dashboard/menu/update/".$blogCh->id); ?>" method="post">
                  <div class="form-group row">
                    <label class="col-12" for="example-text-input">Change file input</label>
                    <div class="col-md-12">
                      <input type="text" class="form-control" name="menu_name" value="<?php echo $blogCh->name ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-12" for="example-text-input">Custom Page</label>
                    <div class="col-md-12">
                      <textarea id="js-ckeditor" name="ckeditor">Hello World!</textarea>
                      <div class="form-text text-muted">Customize Page Details</div>
                    </div>
                  </div>
                </div>
              </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-alt-success">
                <i class="fa fa-check"></i> Perfect
              </button>
            </form>
            <p>OR</p>
            <form class="" action="<?php echo base_url("/dashboard/menu/delete/".$blogCh->id) ?>" method="post" enctype="multipart/form-data">
              <button type="submit" class="btn btn-alt-danger">
                <i class="fa fa-trash"></i> Delete
              </button>
            </form>
          </div>
        </div>
      </div>
  <?php endforeach; ?>

  <?php $this->load->view('Dependencies/dashboard/footer') ?>
  <!-- END Page Container -->
  <?php $this->load->view('Dependencies/dashboard/script') ?>
  <script src="/Dashboard/js/plugins/ckeditor/ckeditor.js"></script>
  <script src="/Dashboard/js/plugins/dropzonejs/dropzone.min.js"></script>
  <script src="/Dashboard/js/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="/Dashboard/js/plugins/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="/Dashboard/js/pages/be_tables_datatables.min.js"></script>
  <script>jQuery(function(){ Codebase.helpers(['ckeditor']); });</script>

</body>
</html>
