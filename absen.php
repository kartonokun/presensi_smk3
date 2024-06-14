<?php
include 'admin/include/koneksi/koneksi.php';

function kirim_wa($pesan, $wa)
{
    $url = 'https://app.whacenter.com/api/send';

    $data = array(
        'device_id' => '14124c9b6a3efb8faef3a5fbd102f2b8',
        'number' => $wa,
        'message' => "$pesan"
    );
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    $response = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Error: ' . curl_error($ch);
    }
    curl_close($ch);
    return $response;
}

if (!(isset($_GET['proses']))) {
    die();
}

$nis = $_GET['proses'];

$arr = explode("-", $nis, 2);
$nis = $arr[0];

date_default_timezone_set('Asia/Jakarta');

$id_absensi = id_otomatis("data_absensi", "id_absensi", "10");
$tanggal = date('Y-m-d');
$id_siswa = baca_database('', 'id_siswa', "select * from data_siswa where nis='$nis'");

$hariIndo = array(
    "Minggu",
    "Senin",
    "Selasa",
    "Rabu",
    "Kamis",
    "Jumat",
    "Sabtu"
);
$jam = date('H:i:s');
$hariIni =  $hariIndo[date('w')];
$cek_jadwah_pulang = baca_database("", "jam_pulang", "select * from data_jadwal where hari = '$hariIni'");

$cek = cek_database("", "", "", "select * from data_absensi where tanggal='$tanggal' and id_siswa='$id_siswa'");
$cek_pulang = cek_database("", "", "", "select * from data_absensi where tanggal='$tanggal' and id_siswa='$id_siswa'");

$status = ''; // Initialize the status variable

if ($cek == "nggak") {
    if ($id_siswa == "") {

    } else {
        $hariIndo = array(
            "Minggu",
            "Senin",
            "Selasa",
            "Rabu",
            "Kamis",
            "Jumat",
            "Sabtu"
        );
        $jam = date('H:i:s');
        $hariIni =  $hariIndo[date('w')];
        $cek_jadwal = baca_database("", "jam", "select * from data_jadwal where hari = '$hariIni'");
        if ($jam > $cek_jadwal) {
            $query = mysql_query("insert into data_absensi values (
                '$id_absensi'
                 ,'$tanggal'
                 ,'$jam'
                 ,''
                 ,'$id_siswa'
                 ,'terlambat'
            
            )");
            $status = 'terlambat'; // Update the status variable

        } else if ($jam <= $cek_jadwal) {
            $query = mysql_query("insert into data_absensi values (
                '$id_absensi'
                 ,'$tanggal'
                 ,'$jam'
                 ,''
                 ,'$id_siswa'
                 ,'hadir'
                
                )");
            $status = 'hadir'; // Update the status variable
        }

        $nama = baca_database("", "nama", "select * from data_siswa where id_siswa='$id_siswa'");
        $kelas = baca_database("", "id_kelas", "select * from data_siswa where id_siswa='$id_siswa'");
         $no_telepon = baca_database("", "no_telepon", "select * from data_siswa where id_siswa='$id_siswa'");
        $nama_kelas = baca_database("", "kelas", "select * from data_kelas where id_kelas='$kelas'");
        $pesan = "Laporan Aplikasi Presensi Peserta Didik SMK Negeri 3 Pandeglang

Absensi            : Masuk 
Tanggal            : $tanggal
NIS / NISN         : $nis
Nama Peserta Didik : $nama
Kelas              : $nama_kelas
Jam Absen          : $jam
Keterangan         : $status

Note :  
Jam Presensi
06.00 - 07.30 = Masuk Tepat Waktu (MTW)
07.31 - 15.05 = Telat (T)
07.30 - ....   = Bolos (B)
...... - ..... = Alpa (A)
..... - 15.05  = Alpa (A)
15.06 - 17.30  = Pulang Tepat Waktu (PTW)

Jangan membalas pesan ini, ini adalah pesan otomatis yang dikirim oleh Sistem Aplikasi Absensi Peserta Didik SMK Negeri 3 Pandeglang";
        kirim_wa($pesan, $no_telepon);
    }

} else if ($cek_pulang == 'nggak' || ($cek_pulang == 'ada' && $jam >= $cek_jadwah_pulang && $jam != $data_absensi['jam_pulang'])) {
  $query = mysql_query("update data_absensi set 
  jam_pulang='$jam'
   
  where id_siswa='$id_siswa' and tanggal='$tanggal' ") or die(mysql_error());
   
    $nama = baca_database("", "nama", "select * from data_siswa where id_siswa='$id_siswa'");
    $kelas = baca_database("", "id_kelas", "select * from data_siswa where id_siswa='$id_siswa'");
     $no_telepon = baca_database("", "no_telepon", "select * from data_siswa where id_siswa='$id_siswa'");
    $nama_kelas = baca_database("", "kelas", "select * from data_kelas where id_kelas='$kelas'");
    $pesan = "Laporan Aplikasi Presensi Peserta Didik SMK Negeri 3 Pandeglang

Absensi      : Pulang
Tanggal      : $tanggal
NIS / NISN     : $nis
Nama Peserta Didik : $nama
Kelas       : $nama_kelas
Jam Absen     : $jam


Note :  
Jam Presensi
06.00 - 07.30 = Masuk Tepat Waktu (MTW)
07.31 - 15.05 = Telat (T)
07.30 - ....  = Bolos (B)
...... - ..... = Alpa (A)
..... - 15.05 = Alpa (A)
15.06 - 17.30 = Pulang Tepat Waktu (PTW)

Jangan membalas pesan ini, ini adalah pesan otomatis yang dikirim oleh Sistem Aplikasi Absensi Peserta Didik SMK Negeri 3 Pandeglang";
    kirim_wa($pesan, $no_telepon);
   
}

else {
    echo "SUDAH";
    

}



//BACA DATABASE
function baca_database($tabel,$field,$query)
{
	
	if ($query=="")
	{
		$sql = 'SELECT * FROM '.$tabel;
	}
	else
	{
		$sql = $query;
	}
	
	$querytabelualala=$sql;
	$prosesulala = mysql_query($querytabelualala);
	$datahasilpemrosesanquery = mysql_fetch_array($prosesulala);
	$hasiltermantab = $datahasilpemrosesanquery[$field];
	return $hasiltermantab;
}

//CEK DATABASE
function cek_database($tabel,$field,$value,$query)
{
	if ($query=="")
	{
		$sql = "SELECT * FROM ".$tabel." WHERE ".$field." ='".$value."'";
	}
	else
	{
		$sql = $query;
	}
	
	$cek_user=mysql_num_rows(mysql_query($sql));
	if ($cek_user > 0) 
	{   
		$hasiltermantab = "ada";
	}
	else
	{
		$hasiltermantab = "nggak";
	}
	return $hasiltermantab;
}

//KODE OTOMATIS	 	
function id_otomatis($nama_tabel,$id_nama_tabel,$panjang_id)
{
	$cek = mysql_query("SELECT * FROM $nama_tabel");
	$rowcek = mysql_num_rows($cek);
	
	
		$kodedepan = strtoupper($nama_tabel);
		$kodedepan = str_replace("DATA_","",$kodedepan);
		$kodedepan = str_replace("DATA","",$kodedepan);
		$kodedepan = str_replace("TABEL_","",$kodedepan);
		$kodedepan = str_replace("TABEL","",$kodedepan);
		$kodedepan = str_replace("TABLE_","",$kodedepan);
		$kodedepan = strtoupper(substr($kodedepan,0,3));
		$id_tabel_otomatis = $kodedepan.date('YmdHis');
		$min = pow($panjang_id, 3 - 1);
		$max = pow($panjang_id, 3) - 1;
		
		$kodeakhir = mt_rand($min, $max);
	    return $id_tabel_otomatis.$kodeakhir;
}



?>