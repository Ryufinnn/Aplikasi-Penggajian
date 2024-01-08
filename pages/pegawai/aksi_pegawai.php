<?php

include ('../koneksi.php');
if ($_GET['proses']=='entri')
{
$nip=$_POST['nip'];
$nama=$_POST['nama'];
$sk=$_POST['sk'];
$nohp=$_POST['nohp'];
$alamat=$_POST['alamat'];
$jabatan=$_POST['jabatan'];
$password=$_POST['password'];
$level=$_POST['level'];

$simpan=mysql_query("insert into pegawai(nip,nama,sk,nohp,alamat,jabatan,password) values ('$nip','$nama','$sk','$nohp','$alamat','$jabatan','$password')");

$save=mysql_query("insert into user(username,password,level) values ('$nip','$password','$level')");
	if($simpan)
	{
		echo "<script>top.location='../index.php?p=pegawai'</script>";
		}

}
if ($_GET['proses']=='edit')
{
$update=mysql_query("update pegawai set nama='$_POST[nama]',
												  sk='$_POST[sk]',
												  nohp='$_POST[nohp]',
												  alamat='$_POST[alamat]',
												  jabatan='$_POST[jabatan]',
												  password='$_POST[password]'
												  where nip='$_POST[nip]'");
		if($update)
		{
			header("location:../index.php?p=pegawai");
		}

}
if($_GET['proses']=='hapus')
{
	$hapus=mysql_query("delete from pegawai where nip = '$_GET[nip]'");
	if($hapus)
	{
		header("location:../index.php?p=pegawai");
	}

}
?>