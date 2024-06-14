
<body>

<?php /* if ($_COOKIE['hak_akses'] == "admin") { ?>
    <a href="<?php index(); ?>?input=tambah">
        <?php btn_tambah('Tambah Data'); ?>
    </a>
    <?php } */?>

    <a target="blank" href="cetak.php?berdasarkan=data_siswa&jenis=xls&pakaiperperiode=<?php echo $status_pakaiperperiode; ?>">
        <?php btn_export('Export Excel'); ?>
    </a>

    <a target="blank" href="cetak.php?berdasarkan=data_siswa&jenis=print&pakaiperperiode=<?php echo $status_pakaiperperiode; ?>">
        <?php btn_cetak('Cetak'); ?>
    </a>

    <a href="<?php index(); ?>">
        <?php btn_refresh('Refresh Data'); ?>
    </a>

    <br><br>

    <form name="formcari" id="formcari" action="" method="get">
        <fieldset> 
            <table>
                <tbody>
                    <tr>
                        <td>Berdasarkan</td>	
                        <td>:</td>	
                        <td>
                            <!-- <input value="" name="Berdasarkan" id="Berdasarkan" > --> 
                            <select class="form-control" data-live-search="true" name="Berdasarkan" id="Berdasarkan">
                                <?php
                                $sql = "desc data_siswa";
                                $result = @mysql_query($sql);
                                while ($row = @mysql_fetch_array($result)) {
                                    echo "<option name='berdasarkan' value=$row[0]>$row[0]</option>";
                                }
                                ?>
                            </select>							
                        </td>
                    </tr>

                    <tr>
                        <td>Pencarian</td>	
                        <td>:</td>	
                        <td>							
                                <!--<input class="form-control" type="text" name="isi" value="" >--> <input  type="text" name="isi" value="" >
                            <?php btn_cari('Cari'); ?>
                        </td>
                    </tr>
                </tbody>
            </table>									
        </fieldset>
    </form>

    <div style="overflow-x:auto;">
        <table <?php tabel(100, '%', 1, 'left'); ?> >
            <tr>					
            <?php  if ($_COOKIE['hak_akses'] == "admin") { ?>			  
                <!-- <th>Action</th> -->
                <?php } ?>
                <th>No</th>
                <!--h <th>Id Siswa </th> h-->
                <th align="center" class="th_border cell"  >Nis </th>
                <th align="center" class="th_border cell"  >Nama </th>
                <th align="center" class="th_border cell"  >Alamat </th>
                <th align="center" class="th_border cell"  >Jenis Kelamin </th>
                <th align="center" class="th_border cell"  >Kelas </th>
                <th align="center" class="th_border cell"  >Jurusan</th>

                <th align="center" class="th_border cell"  >Tahun Ajaran </th>
            
            </tr>

            <tbody>
                <?php
                $id_guru = decrypt($_COOKIE['id_guru']);
                $id_kelas = baca_database("","id_kelas","select * from data_kelas where id_guru ='$id_guru'");
                $no = 0;
                $startRow = ($page - 1) * $dataPerPage;
                $no = $startRow;

                if (isset($_GET['Berdasarkan']) && !empty($_GET['Berdasarkan']) && isset($_GET['isi']) && !empty($_GET['isi'])) {
                    $berdasarkan = mysql_real_escape_string($_GET['Berdasarkan']);
                    $isi = mysql_real_escape_string($_GET['isi']);
                    $querytabel = "SELECT * FROM data_siswa where $berdasarkan like '%$isi%'  LIMIT $startRow ,$dataPerPage";
                    $querypagination = "SELECT COUNT(*) AS total FROM data_siswa where $berdasarkan like '%$isi%'";
                } else {
                    $querytabel = "SELECT * FROM data_siswa where id_kelas = '$id_kelas' LIMIT $startRow ,$dataPerPage";
                    $querypagination = "SELECT COUNT(*) AS total FROM data_siswa where id_kelas = '$id_kelas'";
                }
                $proses = mysql_query($querytabel);
                while ($data = mysql_fetch_array($proses)) {
                    ?>
                    <tr class="event2">	
                  
                        <td align="center" width="50"><?php $no = (($no + 1) ); echo $no; ?></td>
                        <!--h <td align="center"><?php echo $data['id_siswa']; ?></td> h-->
                        <td align="center"><?php echo $data['nis']; ?></td>
                        <td align="center"><?php echo $data['nama']; ?></td>
                        <td align="center"><?php echo $data['alamat']; ?></td>
                        <td align="center"><?php echo $data['jenis_kelamin']; ?></td>
                        <td align="center"><?php echo baca_database("","kelas","select * from data_kelas where id_kelas='$data[id_kelas]'")  ?></td>
                        <td align="center"><?php echo baca_database("","jurusan","select * from data_jurusan where id_jurusan='$data[id_jurusan]'")  ?></td>
                        <td align="center"><?php echo baca_database("","tahun_ajaran","select * from data_tahun_ajaran where id_tahun_ajaran='$data[id_tahun_ajaran]'")  ?></td>
      
                       


                    
                    </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>

   <?php Pagination($page, $dataPerPage, $querypagination); ?>

</body>
