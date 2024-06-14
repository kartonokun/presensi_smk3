	<center><h3><?php sambutan(); ?></h3>

	</center>
	<div class="content-wrapper">
         
         <?php 
         if ($_COOKIE['hak_akses'] == "admin") { ?>
          <div class="row purchace-popup">
            <div class="col-12">
              <span class="d-block d-md-flex align-items-center">
                <p>Klik Proses Presensi untuk melakukan Presensi Wajah</p>
                <a class="btn ml-auto download-button d-none d-md-block" href="../data_siswa/" target="_blank">Buat Database Wajah</a>
                <a class="btn purchase-button mt-4 mt-md-0" href="../../../../" target="_blank">Proses Presensi</a>
                <i class="mdi mdi-close popup-dismiss d-none d-md-block"></i>
              </span>
            </div>
          </div>
          <?php } ?>
          
          <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-cube text-danger icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Presensi Hari ini</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0"><?php $sekarang = date('Y-m-d'); echo totalr("","select * from data_absensi where tanggal like '$sekarang'");?></h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> Dari Total <?php echo totalr('data_siswa','');?> Siswa
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-receipt text-warning icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Total Data Kelas</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0"><?php echo totalr('data_kelas','');?></h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-bookmark-outline mr-1" aria-hidden="true"></i> kelas tersedia
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-poll-box text-success icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Data Siswa</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0"><?php echo totalr('data_siswa','');?></h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-calendar mr-1" aria-hidden="true"></i> Keseluruhan Siswa
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-account-location text-info icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Data Guru</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0"><?php echo totalr('data_guru','');?></h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-reload mr-1" aria-hidden="true"></i> Keseluruhan Guru
                  </p>
                </div>
              </div>
            </div>
          </div>

      

          <div class="row">
            <div class="col-lg-7 grid-margin stretch-card">
              <!--weather card-->
              <div>
              
			  <img width="100%" src="<?php echo $background;?>">
               
              </div>
              <!--weather card ends-->
            </div>
            <div class="col-lg-5 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h2 class="card-title text-primary mb-5">Detail Informasi data Pelajaran</h2>
                  <div class="wrapper d-flex justify-content-between">
                    <div class="side-left">
                      <p class="mb-2">Jumlah Mata Pelajaran</p>
                      <p class="display-3 mb-4 font-weight-light"><?php echo totalr('data_matapelajaran','');?></p>
                    </div>
                    <div class="side-right">
                      <small class="text-muted"></small>
                    </div>
                  </div>
                  <div class="wrapper d-flex justify-content-between">
                    <div class="side-left">
                      <p class="mb-2">Tahun Ajaran</p>
                      <p class="display-3 mb-5 font-weight-light"><?php echo date('Y')?></p>
                    </div>
                    <div class="side-right">
                      <small class="text-muted"></small>
                    </div>
                  </div>
                 
                </div>
              </div>
            </div>
          </div>
         
         
        </div>