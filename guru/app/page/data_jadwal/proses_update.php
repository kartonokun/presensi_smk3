<?php
include '../../../include/all_include.php';

if (!isset($_POST['id_jadwal'])) {
        
    ?>
    <script>
        alert("AKSES DITOLAK");
        location.href = "index.php";
    </script>
    <?php
    die();
}

$id_jadwal = xss($_POST['id_jadwal']);
$hari = xss($_POST['hari']);
$jam = xss($_POST['jam']);
// $id_kelas = xss($_POST['id_kelas']);
// $id_matapelajaran = xss($_POST['id_matapelajaran']);
// $id_guru = xss($_POST['id_guru']);


$query = mysql_query("update data_jadwal set 
hari='$hari',
jam='$jam'

where id_jadwal='$id_jadwal' ") or die(mysql_error());

if ($query) {
    ?>
    <script>location.href = "<?php index(); ?>?input=popup_edit";</script>
    <?php
} else {
    echo "GAGAL DIPROSES";
}
?>
