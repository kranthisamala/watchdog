<?php
	require 'minium_log.php';
	session_start();
	if(isset($_SESSION['mid']))
	{
		if(isset($_SESSION['tid']))
		{
?>
<html>
<body>
		<link rel="stylesheet" href="bootstrap-3.2.0-dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/user.css">
		<div class="container-fluid">
		<div id="base">
			<div id="nav" class="row">
				<a href="index.php"  ><div class="col-md-1" id="home_button"><i  class="fa fa-home"></i></div></a>
				<div  class="col-md-4" id="search-group">
					<div class="input-group">
						<input id="search" type="text" class="form-control" placeholder="Search for...">
						<span class="input-group-btn">
							<button class="btn btn-default" type="button"><i class="fa fa-search" style="font-size:20px;"></i></button>
						</span>
					</div>
					<div id="search_result" class="col-md-10"></div>
				</div>
				<div id="logout" class="col-md-offset-5 col-md-1"><a style="color:white;"href="logout.php">logout</a></div>
			</div>
			<?php
				if($_SESSION['tid']==0)
				{
					include 'all.php';
				}
				else
				{
					include 'teamlead.php';
				}
			?>
			
		</div>
		</div>
</body>
</html>

<?php
		}
		else{
			header('Location: index.php');
		}
	}
	else{
		header('Location: index.php');
	}
?>