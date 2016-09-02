<?php
	require 'connect.php';
	if(isset($_POST['firstname']) && isset($_POST['text1']))
	{
		$firstname=$_POST['firstname'];
		$text=$_POST['text1'];
		$ip=$_SERVER['REMOTE_ADDR'];
		$mac = shell_exec('arp -a '.escapeshellarg(trim($ip)));
		$find="Physical";
		$pos=strpos($mac,$find);
		$macp=substr($mac,($pos+42),26);
		session_start();
		$_SESSION['mac']=$macp;
		//echo $firstname."->".$text;
		if(!empty($firstname)&&!empty($text))
		{
			mysql_query("insert into userinfo values('$firstname','$text','$macp')");
			header("Location:qrcode.php");
		}
	}
	
?>


	<form action="example1.php" method="post">
		<input type="text" name=firstname><br>
		<textarea rows="4" cols="30" name="text1"></textarea><br>
		<input type="submit" value="Create QR Code"/>
	</form>
	

