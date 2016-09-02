<?php
	$servername="localhost";
	$username="root";
	$password="";
	
	$connect=@mysql_connect("$servername","$username","$password") or die("check your server connection");
	mysql_select_db("qrcode") or die("No such Database");
?>