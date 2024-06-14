<?php
$url = '../../../data/tmp/inventory-management/files';
include '../../../include/all_include.php';        
include '../../../include/function/session.php';  
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<meta name="description" content="POS - Bootstrap Admin Template">
<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern,  html5, responsive">
<meta name="author" content="Dreamguys - Bootstrap Admin Template">
<meta name="robots" content="noindex, nofollow">
<title>Dreams Pos admin template</title>

<link rel="shortcut icon" type="image/x-icon" href="<?php echo $logo; ?>">

<link rel="stylesheet" href="<?php echo $url; ?>/assets/css/bootstrap.min.css">

<link rel="stylesheet" href="<?php echo $url; ?>/assets/css/animate.css">

<link rel="stylesheet" href="<?php echo $url; ?>/assets/css/dataTables.bootstrap4.min.css">

<link rel="stylesheet" href="<?php echo $url; ?>/assets/plugins/fontawesome/css/fontawesome.min.css">
<link rel="stylesheet" href="<?php echo $url; ?>/assets/plugins/fontawesome/css/all.min.css">

<link rel="stylesheet" href="<?php echo $url; ?>/assets/css/style.css">
</head>
<body>
<div id="global-loader">
<div class="whirly-loader"> </div>
</div>

<div class="main-wrapper">

<div class="header">

<div class="header-left active">


<img src="<?php echo $logo;?>" alt="" width="60px">
<h6 style="margin-top: 10px;">Man 1 Muaro Jambi</h6>
</div>

<a id="mobile_btn" class="mobile_btn" href="<?php echo $url; ?>/#sidebar">
<span class="bar-icon">
<span></span>
<span></span>
<span></span>
</span>
</a>

<ul class="nav user-menu">






<li class="nav-item dropdown has-arrow main-drop">
<a href="javascript:void(0);" class="dropdown-toggle nav-link userset" data-bs-toggle="dropdown">
<span class="user-img"><img src="<?php echo $avatar; ?>" alt="">
<span class="status online"></span></span>
</a>
<div class="dropdown-menu menu-drop-user">
<div class="profilename">
<!-- <div class="profileset">
<span class="user-img"><img src="<?php echo $url; ?>/assets/img/profiles/avator1.jpg" alt="">
<span class="status online"></span></span>
<div class="profilesets">
<h6>John Doe</h6>
<h5>Admin</h5>
</div>
</div> -->
<!-- <hr class="m-0">
<a class="dropdown-item" href="<?php echo $url; ?>/profile.html"> <i class="me-2" data-feather="user"></i> My Profile</a>
<a class="dropdown-item" href="<?php echo $url; ?>/generalsettings.html"><i class="me-2" data-feather="settings"></i>Settings</a> -->
<hr class="m-0">
<a class="dropdown-item logout pb-0" href="<?php logout();?>"><img src="<?php echo $url; ?>/assets/img/icons/log-out.svg" class="me-2" alt="img">Logout</a>
</div>
</div>
</li>
</ul>


<div class="dropdown mobile-user-menu">
<a href="<?php echo $url; ?>/javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
<div class="dropdown-menu dropdown-menu-right">
<a class="dropdown-item" href="<?php echo $url; ?>/profile.html">My Profile</a>
<a class="dropdown-item" href="<?php echo $url; ?>/generalsettings.html">Settings</a>
<a class="dropdown-item" href="<?php echo $url; ?>/signin.html">Logout</a>
</div>
</div>

</div>


<div class="sidebar" id="sidebar">
<div class="sidebar-inner slimscroll">
<div id="sidebar-menu" class="sidebar-menu">
<ul>

<!-- MENU -->
<?php
$m = new SimpleXMLElement('../../../include/settings/menu.xml', null, true);
foreach($m as $i){if($i->t == 's' ){
?>
<!-- SINGLE -->
					<li class="">
						<a href="<?php echo $i->l;?>">
							<i class="menu-icon fa fa-edit"></i>
							<span class=""> <?php echo $i->n;?> </span>
						</a>
					</li>
<!-- /SINGLE -->
<?php
}else if($i->t == 'm' ){ $idmenu = $i->id;
?>
<!-- MULTI -->
		
<li class="submenu">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon <?php echo $i->i;?>"></i>
							<span class="">
								<?php echo $i->n;?>
							</span>
						</a>

						<ul class="">
								<?php
		$m1 = new SimpleXMLElement('../../../include/settings/menu.xml', null, true);
		foreach($m1 as $i1) {
		if($i1->s=="$idmenu" and $i1->t=="sm" ){
			if ($i1->n == "Laporan Absensi") { ?>		
            <li>
			<a class="item" href="<?php echo $i1->l;?>" target="_blank">
            <i class="<?php echo $i1->i;?>"></i> <?php echo $i1->n;?>
        </a>
				</li>
			<?php } else { ?>
				<li>
				<a class="item" onclick="window.location = '<?php echo $i1->l;?>'">
				<i class="<?php echo $i1->i;?>"></i> <?php echo $i1->n;?></a>
				</li>
		<?php }} } ?>

						</ul>	
					</li>

<!-- /MULTI -->
		<?php }} ?>
<!-- /MENU -->

</ul>
</li>

</ul>
</div>
</div>
</div>

<div class="page-wrapper">
<div class="content">
<div class="row">

</div>



<div class="card mb-0">
<div class="card-body">
<?php include 'halaman.php' ?>
</div>
</div>
</div>
</div>
</div>


<script src="<?php echo $url; ?>/assets/js/jquery-3.6.0.min.js"></script>

<script src="<?php echo $url; ?>/assets/js/feather.min.js"></script>

<script src="<?php echo $url; ?>/assets/js/jquery.slimscroll.min.js"></script>

<script src="<?php echo $url; ?>/assets/js/jquery.dataTables.min.js"></script>
<script src="<?php echo $url; ?>/assets/js/dataTables.bootstrap4.min.js"></script>

<script src="<?php echo $url; ?>/assets/js/bootstrap.bundle.min.js"></script>

<script src="<?php echo $url; ?>/assets/plugins/apexchart/apexcharts.min.js"></script>
<script src="<?php echo $url; ?>/assets/plugins/apexchart/chart-data.js"></script>

<script src="<?php echo $url; ?>/assets/js/script.js"></script>
</body>
</html>