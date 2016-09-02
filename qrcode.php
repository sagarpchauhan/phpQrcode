<?php
	require 'connect.php';
	include 'qrlib.php';
	
	if(isset($_POST['qrcode']))
	{
		session_start();
		$macp=$_SESSION['mac'];
		$q=mysql_query("select reg_id from userinfo where macid='$macp'");
		$row=mysql_fetch_assoc($q);
		$img=$row['reg_id'];
		QRcode::png("$img");
	}
	
	?>

<form action="qrcode.php" method="post">
	<input type="submit" name="qrcode" value="QR Code" >
</form>