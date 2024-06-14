		<?php
$default_url = '../data/tmp/tmp 54';
$tema = 'StarAdmin/';
$url = $default_url.'/'.$tema;
?>
<?php include '../include/function/login.php';?>

  <link rel="stylesheet" href="<?php echo $url;?>vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?php echo $url;?>vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="<?php echo $url;?>vendors/css/vendor.bundle.addons.css">
  <link rel="stylesheet" href="<?php echo $url;?>css/style.css">
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
      <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
		  <center><h2><font color="black">FORM LOGIN</font></h2></center>
		  <center><h4><font color="black"> <?php echo ucwords($judul); ?></font></h4></center>
            <div class="auto-form-wrapper">
              <form action="" method="post">
              <div class="form-group">
                  <label class="label">Hak Akses</label>
                  <div class="input-group">
                    <select class="form-control" name="siapa" id="siapa">
                      <option value="admin">Admin</option>
                      <option value="guru">Guru</option>
                    </select>                   
                    <!--<div class="input-group-append">-->
                    <!--  <span class="input-group-text">-->
                    <!--    <i class="mdi mdi-check-circle-outline"></i>-->
                    <!--  </span>-->
                    <!--</div>-->
                  </div>
                </div>
                <div class="form-group">
                  <label class="label">Username</label>
                  <div class="input-group">
                   <input  class="form-control" name="username" type="text" placeholder="Username">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="label">Password</label>
                  <div class="input-group">
                     <input class="form-control" name="password" placeholder="Password" type="password">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                   <a href="../../" class="btn btn-primary my-4">CANCEL</a>
			<button type="submit" type='submit' name="login" class="btn btn-primary my-4">LOGIN</button>
                </div>
                
               
              </form>
            </div>
            <ul class="auth-footer">
              
            </ul>
            <p class="footer-text text-center"><?php echo $copyright; ?></p>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="<?php echo $url;?>vendors/js/vendor.bundle.base.js"></script>
  <script src="<?php echo $url;?>vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="<?php echo $url;?>js/off-canvas.js"></script>
  <script src="<?php echo $url;?>js/misc.js"></script>
  <!-- endinject -->
</body>

</html>