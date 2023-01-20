  <?php include("includes/css.php"); ?>

  <body class="hold-transition skin-blue sidebar-mini">
      <div class="wrapper">
          <?php include("includes/header.php");?>
          <?php include("includes/sidebar.php");?>
          <div class="content-wrapper">
              <div class="col-md-8">
                  <section class="content">
                      <div class="box box-danger gurnew">
                          <div class="box-header py-3">
                              <h6 class="m-0 font-weight-bold text-primary">Google Recaptcha</h6>
                          </div>
                          <div class="box-body table-responsive">
                              <div class="nav-tabs-custom">
                                  <form action="" method="post" enctype="multipart/form-data">

                                      <div class="col-md-12">
                                          <div class="form-group">
                                              <label> Allow Google Recaptcha</label>
                                              <select class="form-control">
                                                  <option>Yes</option>
                                                  <option>No</option>
                                              </select>
                                          </div>
                                      </div>

                                      <div class="col-md-4">
                                          <div class="form-actions">
                                              <button type="submit" name="submit" id="submit" class="btn btn-success btn-lg">Update</button>
                                          </div>
                                      </div>
                                  </form>
                              </div>
                          </div>
                      </div>
                  </section>
              </div>
          </div>
          <?php include("includes/footer.php");?>
          <div class="control-sidebar-bg"></div>
      </div>
      <?php include("includes/js.php");?>
  </body>
  </html>