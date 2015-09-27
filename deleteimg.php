<?php
require 'minium_log.php';
session_start();
if(isset($_SESSION['mid'])&&isset($_POST['imgid']))
{	
	if(isset($_SESSION['tid']))
	{
		if($_SESSION['tid']==0)
		{
			$imgid=$_POST['imgid'];
			$query=mysql_query("DELETE FROM `mini_project`.`image` WHERE `image`.`imgid` = '$imgid'") or die("hello not exe");
			echo "Image deleted";
		}
		else
		{
		}
	}
}
?>