
<a href="<?php index(); ?>">
    <?php btn_kembali(' KEMBALI KEHALAMAN SEBELUMNYA'); ?>
</a>	

    <div class="col-sm-12" style="margin-bottom: 20px; margin-top: 20px;">
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        <strong>Tambah Data Siswa </strong>
        <hr class="message-inner-separator">
            <p>Silahkan input Data Siswa  dibawah ini.</p>
        </div>
    </div>

<div class="content-box">
    <form action="proses_simpan.php" enctype="multipart/form-data"  method="post">
        <div class="content-box-content">
            <div id="postcustom">	
                <table <?php tabel_in(100, '%', 0, 'center'); ?>>		
                    <tbody>
                        <!--h
                        <tr>
                            <td width="25%" class="leftrowcms">					
                                <label >Id Siswa  <span class="highlight">*</span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                              <?php echo id_otomatis("data_siswa", "id_siswa", "10"); ?>  		
                            </td>
                        </tr>
                        h-->
                        <input type="hidden" class="form-control" readonly value="<?php echo id_otomatis("data_siswa", "id_siswa", "10"); ?>" name="id_siswa" placeholder="Id Siswa " id="id_siswa" required="required">

                          <tr>
                            <td width="25%" class="leftrowcms">
                                <label >Nis  <span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <input  class="form-control" style="width:50%" type="varchar" name="nis" id="nis" placeholder="Nis " required="required">
                            </td>
                        </tr>
                          <tr>
                            <td width="25%" class="leftrowcms">
                                <label >Nama  <span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <input  class="form-control" style="width:50%" type="varchar" name="nama" id="nama" placeholder="Nama " required="required">
                            </td>
                        </tr>
                          <tr>
                            <td width="25%" class="leftrowcms">
                                <label >Alamat  <span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <textarea class="form-control" style="width:50%" type="text" name="alamat" id="alamat" placeholder="Alamat " required="required"></textarea>
                            </td>
                        </tr>
                         <tr>
                            <td width="25%" class="leftrowcms">
                                <label >Nomor Telelpon  <span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <input  class="form-control" style="width:50%" type="varchar" name="no_telepon" id="no_telepon" placeholder="Nomor Telepon " required="required">
                            </td>
                        </tr>
                          <tr>
                            <td width="25%" class="leftrowcms">
                                <label >Jenis Kelamin  <span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <select class="form-control" style="width:50%" type="text" name="jenis_kelamin" id="jenis_kelamin" placeholder="Jenis Kelamin " required="required">
                                <option></option><?php combo_enum('data_siswa','jenis_kelamin',''); ?>
                                </select>
                            </td>
                        </tr>
                          <tr>
                            <td width="25%" class="leftrowcms">
                                <label >Kelas  <span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <select class="form-control" style="width:50%" type="text" name="id_kelas" id="id_kelas" placeholder="Id Kelas " required="required">
                                <option></option><?php combo_database_v2('data_kelas','id_kelas','kelas',''); ?>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td width="25%" class="leftrowcms">
                                <label >Jurusan  <span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <select class="form-control" style="width:50%" type="text" name="id_jurusan" id="id_jurusan" placeholder="Id Jurusan " required="required">
                                <option></option><?php combo_database_v2('data_jurusan','id_jurusan','jurusan',''); ?>
                                </select>
                            </td>
                        </tr>
                          <tr>
                            <td width="25%" class="leftrowcms">
                                <label >Tahun Ajaran  <span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <select class="form-control" style="width:50%" type="text" name="id_tahun_ajaran" id="id_tahun_ajaran" placeholder="Id Tahun Ajaran " required="required">
                                <option></option><?php combo_database_v2('data_tahun_ajaran','id_tahun_ajaran','tahun_ajaran',''); ?>
                                </select>
                            </td>
                        </tr>
                          
                        
                
                        
                    </tbody>
                </table>
                <div class="content-box-content">
                    <center>
                        <?php btn_simpan(' PROSES SIMPAN DATA'); ?>
                    </center>
                </div>		
            </div>
        </div>
    </form>
