
<body>
    <a href="<?php index(); ?>?input=tambah">
        <?php btn_tambah('Tambah Data'); ?>
    </a>

    <a target="blank" href="cetak.php?berdasarkan=data_jadwal&jenis=xls&pakaiperperiode=<?php echo $status_pakaiperperiode; ?>">
        <?php btn_export('Export Excel'); ?>
    </a>

    <a target="blank" href="cetak.php?berdasarkan=data_jadwal&jenis=print&pakaiperperiode=<?php echo $status_pakaiperperiode; ?>">
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
                                $sql = "desc data_jadwal";
                                $result = @mysql_query($sql);
                                while ($row = @mysql_fetch_array($result)) {
                                    if ($row[0] == 'id_kelas' || $row[0] == 'id_matapelajaran' || $row[0] == 'id_guru' || $row[0] == 'id_jadwal') {

                                    } else {
                                        echo "<option name='berdasarkan' value=$row[0]>$row[0]</option>";
                                    }
                                    
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
                <th>Action</th>
                <th>No</th>
                <!--h <th>Id Jadwal </th> h-->
                <th align="center" class="th_border cell"  >Hari </th>
                <th align="center" class="th_border cell"  >Jam Masuk</th>
                <th align="center" class="th_border cell"  >Jam Pulang</th>
                <!-- <th align="center" class="th_border cell"  >Kelas </th>
                <th align="center" class="th_border cell"  >Matapelajaran </th>
                <th align="center" class="th_border cell"  >Nip </th> -->

            </tr>

            <tbody>
                <?php
                $no = 0;
                $startRow = ($page - 1) * $dataPerPage;
                $no = $startRow;

                if (isset($_GET['Berdasarkan']) && !empty($_GET['Berdasarkan']) && isset($_GET['isi']) && !empty($_GET['isi'])) {
                    $berdasarkan = mysql_real_escape_string($_GET['Berdasarkan']);
                    $isi = mysql_real_escape_string($_GET['isi']);
                    $querytabel = "SELECT * FROM data_jadwal where $berdasarkan like '%$isi%'  LIMIT $startRow ,$dataPerPage";
                    $querypagination = "SELECT COUNT(*) AS total FROM data_jadwal where $berdasarkan like '%$isi%'";
                } else {
                    $querytabel = "SELECT * FROM data_jadwal  LIMIT $startRow ,$dataPerPage";
                    $querypagination = "SELECT COUNT(*) AS total FROM data_jadwal";
                }
                $proses = mysql_query($querytabel);
                while ($data = mysql_fetch_array($proses)) {
                    ?>
                    <tr class="event2">	
                        
                        <td class="th_border cell" align="center" width="200">
                            <table border="0">
                                <tr>
                                    <td>
                                        <a href="<?php index(); ?>?input=detail&proses=<?= encrypt($data['id_jadwal']); ?>">
                                        <?php btn_detail('Detail'); ?>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="<?php index(); ?>?input=edit&proses=<?= encrypt($data['id_jadwal']); ?>">
                                        <?php btn_edit('Edit'); ?>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="<?php index(); ?>?input=hapus&proses=<?= encrypt($data['id_jadwal']); ?>">
                                        <?php btn_hapus('Hapus'); ?>
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        
                        <td align="center" width="50"><?php $no = (($no + 1) ); echo $no; ?></td>
                        <!--h <td align="center"><?php echo $data['id_jadwal']; ?></td> h-->
                        <td align="center"><?php echo $data['hari']; ?></td>
                        <td align="center"><?php echo substr($data['jam'], 0 , -3); ?></td>
                        <td align="center"><?php echo substr($data['jam_pulang'], 0 , -3); ?></td>
                        <!-- <td align="center"><?php echo baca_database("","kelas","select * from data_kelas where id_kelas='$data[id_kelas]'")  ?></td>
                        <td align="center"><?php echo baca_database("","matapelajaran","select * from data_matapelajaran where id_matapelajaran='$data[id_matapelajaran]'")  ?></td>
                        <td align="center"><?php echo baca_database("","nip","select * from data_guru where id_guru='$data[id_guru]'")  ?></td> -->

                    
                    </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>

   <?php Pagination($page, $dataPerPage, $querypagination); ?>

</body>
