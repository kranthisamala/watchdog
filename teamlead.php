<?php
	if(isset($_SESSION['tid']))
	{
		if($_SESSION['tid']!=0)
		{
?>
<div></div>
<?php
		}
		else
		{
			header('Location: index.php');
		}
	}
	else
	{
		header('Location: index.php');
	}
?>