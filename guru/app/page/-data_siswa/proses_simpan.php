<?php
include '../../../include/all_include.php';

if (!isset($_POST['id_siswa'])) {
        
    ?>
    <script>
        alert("AKSES DITOLAK");
        location.href = "index.php";
    </script>
    <?php
    die();
}


$id_siswa = id_otomatis("data_siswa", "id_siswa", "10");
              $nis=xss($_POST['nis']);
              $nama=xss($_POST['nama']);
              $alamat=xss($_POST['alamat']);
              $jenis_kelamin=xss($_POST['jenis_kelamin']);
              $id_kelas=xss($_POST['id_kelas']);
              $id_tahun_ajaran=xss($_POST['id_tahun_ajaran']);


$query = mysql_query("insert into data_siswa values (
'$id_siswa'
 ,'$nis'
 ,'$nama'
 ,'$alamat'
 ,'$jenis_kelamin'
 ,'$id_kelas'
 ,'$id_tahun_ajaran'

)");

if ($query) {
    ?>
    <script>location.href = "<?php index(); ?>?input=popup_tambah";</script>
    <?php
} else {
    echo "GAGAL DIPROSES";
}
?>
