
<a href="<?php index(); ?>">
    <?php btn_kembali(' KEMBALI'); ?>
</a>

<br><br>

<div class="content-box">
    <div class="content-box-content">
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
            <tr>
                <td class="clleft" width="25%">Id Jadwal </td>
                <td class="clleft" width="2%">:</td>
                <td class="clleft"><?php echo $data['id_jadwal']; ?></td>	
            </tr>

            <tr>
                <td class="clleft" width="25%">Hari </td>
                <td class="clleft" width="2%">:</td>
                <td class="clleft"><?php echo $data['hari']; ?></td>
            </tr>
            <tr>
                <td class="clleft" width="25%">Jam Masuk</td>
                <td class="clleft" width="2%">:</td>
                <td class="clleft"><?php echo $data['jam']; ?></td>
            </tr>

            <tr>
                <td class="clleft" width="25%">Jam Pulang</td>
                <td class="clleft" width="2%">:</td>
                <td class="clleft"><?php echo $data['jam_pulang']; ?></td>
            </tr>
            <!-- <tr>
                <td class="clleft" width="25%">Id Kelas </td>
                <td class="clleft" width="2%">:</td>
                <td class="clleft"><?php echo $data['id_kelas']; ?></td>
            </tr>
            <tr>
                <td class="clleft" width="25%">Id Matapelajaran </td>
                <td class="clleft" width="2%">:</td>
                <td class="clleft"><?php echo $data['id_matapelajaran']; ?></td>
            </tr>
            <tr>
                <td class="clleft" width="25%">Id Guru </td>
                <td class="clleft" width="2%">:</td>
                <td class="clleft"><?php echo $data['id_guru']; ?></td>
            </tr> -->




            </tbody>
        </table>
    </div>
</div>
