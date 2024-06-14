
<a href="<?php index(); ?>">
    <?php btn_kembali(' KEMBALI KE HALAMAN SEBELUMNYA'); ?>
</a>

    <div class="col-sm-12" style="margin-bottom: 20px; margin-top: 20px;">
    <div class="alert alert-warning">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        <strong>Edit Data Jadwal </strong>
        <hr class="message-inner-separator">
            <p>Silahkan Update Data Jadwal  dibawah ini.</p>
        </div>
    </div>


<div class="content-box">
    <form action="proses_update.php"  enctype="multipart/form-data"  method="post">
        <div class="content-box-content">
            <div id="postcustom">	
                <table <?php tabel_in(100, '%', 0, 'center'); ?>>	
                    <tbody>
                        <?php
                        if (!isset($_GET['proses'])) {
                                
                            ?>
                        <script>
                            alert("AKSES DITOLAK");
                            location.href = "index.php";
                        </script>
                        <?php
                        die();
                    }
                    $proses = decrypt(mysql_real_escape_string($_GET['proses']));
                    $sql = mysql_query("SELECT * FROM data_jadwal where id_jadwal = '$proses'");
                    $data = mysql_fetch_array($sql);
                    ?>
                    <!--h
                    <tr>
                        <td width="25%" class="leftrowcms">					
                            <label >Id Jadwal  <font color="red">*</font></label>
                        </td>
                        <td width="2%">:</td>
                        <td>
                           <?php echo $data['id_jadwal']; ?>	
                        </td>
                    </tr>
                    h-->
                    <input type="hidden" class="form-control" name="id_jadwal" value="<?php echo $data['id_jadwal']; ?>" readonly  id="id_jadwal" required="required">

                          <tr>
                            <td width="25%" class="leftrowcms">
                                <label >Hari  <span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <select class="form-control" style="width:50%" type="text" name="hari" id="hari" placeholder="Hari " required="required">
                                <option value="<?php echo ($data['hari']); ?>">- <?php echo ($data['hari']); ?> -</option><?php combo_enum('data_jadwal','hari',''); ?>
                                </select>
                            </td>
                        </tr>
                          <tr>
                            <td width="25%" class="leftrowcms">
                                <label >Jam  Masuk<span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <input  class="form-control" style="width:50%" type="time" name="jam" id="jam" placeholder="Jam Masuk" required="required" value="<?php echo ($data['jam']); ?>">
                            </td>
                        </tr>

                        <tr>
                            <td width="25%" class="leftrowcms">
                                <label >Jam  Pulang<span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <input  class="form-control" style="width:50%" type="time" name="jam_pulang" id="jam_pulang" placeholder="Jam Pulang" required="required" value="<?php echo ($data['jam_pulang']); ?>">
                            </td>
                        </tr>
                          <!-- <tr>
                            <td width="25%" class="leftrowcms">
                                <label >Id Kelas  <span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <select class="form-control" style="width:50%" type="text" name="id_kelas" id="id_kelas" placeholder="Id Kelas " required="required">
                                <option value="<?php echo ($data['id_kelas']); ?>">- <?php echo ($data['id_kelas']); ?> -</option><?php combo_database_v2('data_kelas','id_kelas','kelas',''); ?>
                                </select>
                            </td>
                        </tr>
                          <tr>
                            <td width="25%" class="leftrowcms">
                                <label >Id Matapelajaran  <span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <select class="form-control" style="width:50%" type="text" name="id_matapelajaran" id="id_matapelajaran" placeholder="Id Matapelajaran " required="required">
                                <option value="<?php echo ($data['id_matapelajaran']); ?>">- <?php echo ($data['id_matapelajaran']); ?> -</option><?php combo_database_v2('data_matapelajaran','id_matapelajaran','matapelajaran',''); ?>
                                </select>
                            </td>
                        </tr>
                          <tr>
                            <td width="25%" class="leftrowcms">
                                <label >Id Guru  <span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <select class="form-control" style="width:50%" type="text" name="id_guru" id="id_guru" placeholder="Id Guru " required="required">
                                <option value="<?php echo ($data['id_guru']); ?>">- <?php echo ($data['id_guru']); ?> -</option><?php combo_database_v2('data_guru','id_guru','nip',''); ?>
                                </select>
                            </td>
                        </tr> -->


                    </tbody>
                </table>
                <div class="content-box-content">
                    <center>
                        <?php btn_update(' PROSES UPDATE DATA'); ?>
                    </center>
                </div>		
            </div>
        </div>
    </form>
