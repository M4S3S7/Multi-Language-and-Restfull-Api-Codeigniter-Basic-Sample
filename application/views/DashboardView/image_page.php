
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
  <!-- Fonts and Codebase framework -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,400i,600,700">
  <?php $this->load->view('Dependencies/dashboard/style') ?>

</head>
<body>
  <div id="page-container" class="sidebar-o enable-page-overlay side-scroll page-header-modern main-content-boxed">
    <?php $this->load->view('Dependencies/dashboard/menu') ?>
    <main id="main-container">
      <div class="content">
        <h2 class="content-heading">Slide Page Controll </h2>
        <div class="block">
          <div class="block-content block-content-full">
            <form class="dropzone" action="<?php echo base_url('dashboard/image/i/'.$this->uri->segment(3)."/uX001uC"); // ?>"></form>
          </div>
        </div>
      </div>
      <?php  $this->load->view('Dependencies/dashboard/error') ?>
      <div class="content">
        <h2 class="content-heading">DataTables Plugin</h2>

        <!-- Dynamic Table Full -->
        <div class="block">
          <div class="block-header block-header-default">
            <h3 class="block-title">Dynamic Table <small>Full</small></h3>
          </div>
          <div class="block-content block-content-full">
            <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
            <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
              <thead>
                <tr>
                  <th class="text-center"></th>
                  <th>İmage</th>
                  <th class="d-none d-sm-table-cell">Delete Date</th>
                  <th class="d-none d-sm-table-cell" style="width: 15%;">Delete User</th>
                  <th class="text-center" style="width: 15%;">Update/Delete</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($image as $images): ?>
                  <tr>
                    <td class="text-center"><?php echo $images->id ?></td>
                    <td class="font-w600"><?php  echo  $images->name ?></td>
                    <td class="d-none d-sm-table-cell"><?php echo $images->delete_date ?></td>
                    <td class="d-none d-sm-table-cell">
                      <span class="badge badge-danger"><?php echo $images->delete_user ?></span>
                    </td>
                    <td class="text-center">
                      <button type="button" class="btn btn-alt-info" data-toggle="modal" data-target="#modal-<?php echo $images->id ?>">
                        <i class="fa fa-edit"></i>
                      </button>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </main>
      <?php foreach ($update as $update): ?>
        <div class="modal" id="modal-<?php echo $update->id ?>" tabindex="-1" role="dialog" aria-labelledby="modal-extra-large" aria-hidden="true">
          <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
              <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                  <h3 class="block-title">İmage Edit</h3>
                  <div class="block-options">
                    <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                      <i class="si si-close"></i>
                    </button>
                  </div>
                </div>
                <div class="block-content">
                  <form class="" action="<?php echo base_url('dashboard/image/u/'.$this->uri->segment(3)).'/'.$update->id; // ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group row">
                      <label class="col-12">Change Image File</label>
                      <div class="col-12">
                        <div class="custom-file">
                          <input type="file" name="imageFile">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">

                  <button type="submit" class="btn btn-alt-success">
                    <i class="fa fa-check"></i> Saves
                  </button>
                </form>
                <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Close</button>
                <p class="text-center">OR</p>
                <form class="" action="<?php echo base_url('dashboard/image/d/'.$this->uri->segment(3)).'/'.$update->id; // ?>" method="post" enctype="multipart/form-data">
                  <button type="submit" class="btn btn-alt-danger">
                    <i class="fa fa-trash"></i> Remove İmage
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>

      <?php $this->load->view('Dependencies/dashboard/footer') ?>
    </div>
    <!-- END Page Container -->

    <?php $this->load->view('Dependencies/dashboard/script') ?>
    <script src="/Dashboard/js/plugins/dropzonejs/dropzone.min.js"></script>
    <script src="/Dashboard/js/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/Dashboard/js/plugins/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Page JS Code -->
    <script src="/Dashboard/js/pages/be_tables_datatables.min.js"></script>
  </body>
  </html>
