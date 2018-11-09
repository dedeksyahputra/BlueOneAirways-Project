<?php 
$mysql = mysqli_connect('localhost','root','','Blueoneairways');
if((!$_POST['username']) || (!$_POST['password']))
	header ("location:login2.php?pesan=username/password belum andaisi");
else 
{
	$username = $_POST['username'];
	$password = $_POST['password'];
	$sql_comm = "select * from customer where username='$username' and password='$password'";
	$query = $mysql->query($sql_comm);
	$num = $query->num_rows; 
	$row = $query->fetch_array(); 
} 
if($num == 1)
{
	session_start();
	$id_user = $row['no'];
	$_SESSION['id_user'] = $row['no'];
	$_SESSION['nama'] = $row['username'];
	$_SESSION['group'] = $row['group'];
	header("location:selamatdatang2.php"); 
}  
else 
{ 
	header("location:login2.php?username/password anda salah"); 
}
?> 
