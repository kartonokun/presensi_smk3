
<a href="<?php index(); ?>">
    <?php btn_kembali(' KEMBALI KE HALAMAN SEBELUMNYA'); ?>
</a>

    <div class="col-sm-12" style="margin-bottom: 20px; margin-top: 20px;">
    <div class="alert alert-warning">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        <strong>Edit Data Kelas </strong>
        <hr class="message-inner-separator">
            <p>Silahkan Update Data Kelas  dibawah ini.</p>
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
                    $sql = mysql_query("SELECT * FROM data_kelas where id_kelas = '$proses'");
                    $data = mysql_fetch_array($sql);
                    ?>
                    <!--h
                    <tr>
                        <td width="25%" class="leftrowcms">					
                            <label >Id Kelas  <font color="red">*</font></label>
                        </td>
                        <td width="2%">:</td>
                        <td>
                           <?php echo $data['id_kelas']; ?>	
                        </td>
                    </tr>
                    h-->
                    <input type="hidden" class="form-control" name="id_kelas" value="<?php echo $data['id_kelas']; ?>" readonly  id="id_kelas" required="required">

                    <tr>
                            <td width="25%" class="leftrowcms">
                                <label >Wali Kelas  <span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>                                
                                <select class="form-control" name="id_guru" id="id_guru">
                                    <option value="<?php echo $data['id_guru'];?>">- <?php echo baca_database("","nama","select * from data_guru where id_guru = '$data[id_guru]'");?> -</option>
                                    <?php combo_database_v2("data_guru","id_guru","nama",""); ?>
                                </select>
                            </td>
                        </tr>

                          <tr>
                            <td width="25%" class="leftrowcms">
                                <label >Kelas  <span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <input  class="form-control" style="width:50%" type="varchar" name="kelas" id="kelas" placeholder="Kelas " required="required" value="<?php echo ($data['kelas']); ?>">
                            </td>
                        </tr>


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
