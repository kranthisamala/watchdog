<?php
	require 'minium_log.php';
	require 'session.php';
	if(isset($_POST['uname'])&&isset($_POST['pass']))
	{
		$uname=$_POST['uname'];
		$pass=$_POST['pass'];
		$query="SELECT * FROM monitors where username='$uname' AND password='$pass'";
		if($query_check=mysql_query($query))
		{	
			if(mysql_num_rows($query_check))
			{
				$_SESSION['tid']=mysql_result($query_check,0,'tid');
				$_SESSION['mid']=mysql_result($query_check,0,'mid');
				echo "logged in";	
			}
			else
			{
				echo "login failed";
			}
		}
		else{
			echo "Query failed to execute" ;
		}
	}
	else{
		echo "Not set";
	}
?>