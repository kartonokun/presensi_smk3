<?php 
include 'admin/include/koneksi/koneksi.php';
date_default_timezone_set('Asia/Jakarta');
$nis =  $_GET['proses'];

$hariIndo = array(
	"Minggu",
	"Senin",
	"Selasa",
	"Rabu",
	"Kamis",
	"Jumat",
	"Sabtu"
);
$jam=date('H:i:s');
$hariIni =  $hariIndo[date('w')];
$cek_jadwah_pulang = baca_database("","jam_pulang","select * from data_jadwal where hari = '$hariIni'");

$arr = explode("-", $nis, 2);
$nis = $arr[0];
$tanggal = date("Y-m-d");
$jam_sekarang = date("H:i:s");
$id_siswa = baca_database("","id_siswa","select * from data_siswa where nis = '$nis'");
$cek = baca_database("","jam_pulang","select * from data_absensi where id_siswa = '$id_siswa' and tanggal = '$tanggal'");

if (empty($cek) || $cek == NULL || $cek == "00:00:00"){
    if($jam_sekarang < $cek_jadwah_pulang && $cek == "00:00:00"){
        echo "belum";
    } else {
		echo "sudah";
	}
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