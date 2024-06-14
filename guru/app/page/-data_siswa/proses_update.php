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

$id_siswa = xss($_POST['id_siswa']);
$nis = xss($_POST['nis']);
$nama = xss($_POST['nama']);
$alamat = xss($_POST['alamat']);
$jenis_kelamin = xss($_POST['jenis_kelamin']);
$id_kelas = xss($_POST['id_kelas']);
$id_tahun_ajaran = xss($_POST['id_tahun_ajaran']);


$query = mysql_query("update data_siswa set 
nis='$nis',
nama='$nama',
alamat='$alamat',
jenis_kelamin='$jenis_kelamin',
id_kelas='$id_kelas',
id_tahun_ajaran='$id_tahun_ajaran'

where id_siswa='$id_siswa' ") or die(mysql_error());

if ($query) {
    ?>
    <script>location.href = "<?php index(); ?>?input=popup_edit";</script>
    <?php
} else {
    echo "GAGAL DIPROSES";
}
?>
