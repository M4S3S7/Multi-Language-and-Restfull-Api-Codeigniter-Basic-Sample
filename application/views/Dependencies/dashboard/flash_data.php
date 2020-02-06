<?php if($this->session->flashdata('true')){ ?>
  <script type="text/javascript">
  Swal.fire({
    icon: 'success',
    title: 'Success'
  })
  </script>
<?php }else if ($this->session->flashdata('err')) { ?>
  <script type="text/javascript">
  Swal.fire({
    icon: 'error',
    title: 'Oops...',
    text: 'Something went wrong!',
    footer: '<a href="/dashboard/issue">Why do I have this issue?</a>'
  })
</script>
<?php } ?>
