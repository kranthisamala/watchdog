<?php
	require 'minium_log.php';
	session_start();
	if(isset($_SESSION['mid'])&&isset($_POST['key']))
	{	
		if(isset($_SESSION['tid']))
		{
			if($_SESSION['tid']==0)
			{
				$key=$_POST['key'];
				$query=mysql_query("SELECT * FROM employeedb where name LIKE '%$key%' OR (username LIKE '%$key%')") or die("hello not exe");
				while($state1=mysql_fetch_array($query))
				{
						echo "<div style='width:400px;position:relative;top:2px;'><a href='user.php?eid=".$state1['eid']."'>".$state1['1']."&nbsp(".$state1['2'].")</a></div>";
				}
			}
			else
			{
			}
		}
	}
?>