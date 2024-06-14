<?php 
    $url = '../../../data/tmp/tmp 54/StarAdmin/';
    include '../../../include/all_include.php';
    include '../../../include/function/session.php'; 
	?>
	
  <link rel="stylesheet" href="<?php echo $url;?>vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?php echo $url;?>vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="<?php echo $url;?>vendors/css/vendor.bundle.addons.css">
  <link rel="stylesheet" href="<?php echo $url;?>css/style.css">

</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
	  <br>
        <?php echo ucwords($judul); ?>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <ul class="navbar-nav navbar-nav-left header-links d-none d-md-flex">
          <li class="nav-item">
            <a href="#" class="nav-link">Management Menu
              <span class="badge badge-primary ml-1"><?php tabelnomin(); ?></span>
            </a>
          </li>
         
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          
         <li class="nav-item dropdown d-none d-xl-inline-block">
            <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <span class="profile-text"> <?php echo $siapa;?></span>
              <img class="img-xs rounded-circle" src="<?php echo $avatar;?>" alt="Profile image">
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <a class="dropdown-item p-0">
                <div class="d-flex border-bottom">
                  <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                    <i class="mdi mdi-bookmark-plus-outline mr-0 text-gray"></i>
                  </div>
                  <div class="py-3 px-4 d-flex align-items-center justify-content-center border-left border-right">
                    <i class="mdi mdi-account-outline mr-0 text-gray"></i>
                  </div>
                  <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                    <i class="mdi mdi-alarm-check mr-0 text-gray"></i>
                  </div>
                </div>
              </a>
              
              <a class="dropdown-item" href="<?php home();?>">
                Home
              </a>
              <a class="dropdown-item" href="<?php logout();?>">
                Sign Out
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="user-wrapper">
                <div class="profile-image">
                  <img src="<?php echo $logo;?>" alt="profile image">
                </div>
                <div class="text-wrapper">
                  <p class="profile-name">Welcome </p>
                  <div>
                    <small class="designation text-muted"><?php echo ucwords($siapa); ?></small>
                    <span class="status-indicator online"></span>
                  </div>
                </div>
              </div>
              <button class="btn btn-success btn-block">
			   Navigation Menu
               
              </button>
            </div>
          </li>
         
         
<!-- MENU -->
                <?php
$m = new SimpleXMLElement('../../../include/settings/menu.xml', null, true);
foreach($m as $i){if($i->t == 's' ){
?>
                <!-- SINGLE -->
            
				
				 <li class="nav-item">
            <a class="nav-link" href="<?php echo $i->l;?>">
              <i class="menu-icon mdi mdi-apps"></i>
              <span class="menu-title"><?php echo $i->n;?></span>
            </a>
          </li>
                <!-- /SINGLE -->
            <?php
}else if($i->t == 'm' ){ $idmenu = $i->id;


  if ($_COOKIE['hak_akses'] == "admin") {
?>
                <!-- MULTI -->

               
			    <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-<?php echo $i->id;?>" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-content-copy"></i>
              <span class="menu-title"><?php echo $i->n;?></span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-<?php echo $i->id;?>">
              <ul class="nav flex-column sub-menu">
               
               
			   
			             <?php
		$m1 = new SimpleXMLElement('../../../include/settings/menu.xml', null, true);
		foreach($m1 as $i1) {
		if($i1->s=="$idmenu" and $i1->t=="sm" ){
		?>
		
		 <li class="nav-item">
                  <a class="nav-link" href="<?php echo $i1->l;?>"><?php echo $i1->n;?></a>
                </li>
                       
                        <?php }} ?>
                  
				  
				  
              </ul>
            </div>
          </li>
    

			   
                  

            <!-- /MULTI -->
            <?php }}} ?>
 <!-- /MENU -->
	</ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row purchace-popup">
            <div class="col-12">
              <span class="d-block d-md-flex align-items-center">
               <?php tabelnomin(); ?>
              </span>
            </div>
          </div>
        
		
		<div class="row">
            <div class="col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">
               
                  <div class="table-responsive">
                  

						<?php include 'halaman.php'; ?>

				  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="container-fluid clearfix">
           <?php echo $copyright; ?>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="<?php echo $url;?>vendors/js/vendor.bundle.base.js"></script>
  <script src="<?php echo $url;?>vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="<?php echo $url;?>js/off-canvas.js"></script>
  <script src="<?php echo $url;?>js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="<?php echo $url;?>js/dashboard.js"></script>
  <!-- End custom js for this page-->
</body>

</html>
