<?php   
	session_start();
	if(isset($_SESSION['id_user']) && isset($_SESSION['nama'])){
	echo "SELAMAT DATANG ".$_SESSION['nama']."<br/>";
	include_once('acl.php');
	$acl = getAcl();
	$group = $_SESSION['group'];
	if(isset($acl[$group])){   
			foreach($acl[$group] as $k){    
					echo "<a href=\"$k\">".substr($k,0,strrpos($k,'.'))."</a>";    
					echo "<br/>";
				}
			}
	}
	echo "<a href=\"logout.php\">Logout</a>"; 
?>