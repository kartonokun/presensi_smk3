
<body>
    <a href="<?php index(); ?>?input=tambah">
        <?php btn_tambah('Tambah Data'); ?>
    </a>

    <a target="blank" href="cetak.php?berdasarkan=data_admin&jenis=xls&pakaiperperiode=<?php echo $status_pakaiperperiode; ?>">
        <?php btn_export('Export Excel'); ?>
    </a>

    <a target="blank" href="cetak.php?berdasarkan=data_admin&jenis=print&pakaiperperiode=<?php echo $status_pakaiperperiode; ?>">
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
                                $sql = "desc data_admin";
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
                <th>Action</th>
                <th>No</th>
                <!--h <th>Id Admin </th> h-->
                <th align="center" class="th_border cell"  >Nama </th>
                <th align="center" class="th_border cell"  >Alamat </th>
                <th align="center" class="th_border cell"  >No Telepon </th>
                <th align="center" class="th_border cell"  >Username </th>
                <th align="center" class="th_border cell"  >Password </th>

            </tr>

            <tbody>
                <?php
                $no = 0;
                $startRow = ($page - 1) * $dataPerPage;
                $no = $startRow;

                if (isset($_GET['Berdasarkan']) && !empty($_GET['Berdasarkan']) && isset($_GET['isi']) && !empty($_GET['isi'])) {
                    $berdasarkan = mysql_real_escape_string($_GET['Berdasarkan']);
                    $isi = mysql_real_escape_string($_GET['isi']);
                    $querytabel = "SELECT * FROM data_admin where $berdasarkan like '%$isi%'  LIMIT $startRow ,$dataPerPage";
                    $querypagination = "SELECT COUNT(*) AS total FROM data_admin where $berdasarkan like '%$isi%'";
                } else {
                    $querytabel = "SELECT * FROM data_admin  LIMIT $startRow ,$dataPerPage";
                    $querypagination = "SELECT COUNT(*) AS total FROM data_admin";
                }
                $proses = mysql_query($querytabel);
                while ($data = mysql_fetch_array($proses)) {
                    ?>
                    <tr class="event2">	
                        
                        <td class="th_border cell" align="center" width="200">
                            <table border="0">
                                <tr>
                                    <td>
                                        <a href="<?php index(); ?>?input=detail&proses=<?= encrypt($data['id_admin']); ?>">
                                        <?php btn_detail('Detail'); ?>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="<?php index(); ?>?input=edit&proses=<?= encrypt($data['id_admin']); ?>">
                                        <?php btn_edit('Edit'); ?>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="<?php index(); ?>?input=hapus&proses=<?= encrypt($data['id_admin']); ?>">
                                        <?php btn_hapus('Hapus'); ?>
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        
                        <td align="center" width="50"><?php $no = (($no + 1) ); echo $no; ?></td>
                        <!--h <td align="center"><?php echo $data['id_admin']; ?></td> h-->
                        <td align="center"><?php echo $data['nama']; ?></td>
                        <td align="center"><?php echo $data['alamat']; ?></td>
                        <td align="center"><?php echo $data['no_telepon']; ?></td>
                        <td align="center"><?php echo $data['username']; ?></td>
                        <td align="center"><?php echo $data['password']; ?></td>

                    
                    </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>

   <?php Pagination($page, $dataPerPage, $querypagination); ?>

</body>
