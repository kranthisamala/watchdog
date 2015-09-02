<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="bootstrap-3.2.0-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container-fluid">
	<div id="nav"class="col-md-12">
		<div class="col-md-2" id="title"><img src="res/title.png"  height="100%"></div>
		<div class="col-md-offset-8">
			<table>	
				<tr>
					<td class=" menu" hold="home">Home</td>
					<td class=" menu" style="z-index:2;" hold="aboutus">AboutUs</td>
					<td></td>
				</tr>
			</table>
		</div>
		<div id="login">
			<div id="login_menu" data-toggle="tooltip" data-placement="left" title="Click to Login"><i class="fa fa-sign-in"></i></div>
			<div id="login_form_holder" style="z-index:2;">
				<div id="triangle"></div>
				<div id="login_text">Login</div>
				<form id="login_form" action="#">
					<input type="text" placeholder="UserName" id="uname" name="uname"/>
					<input type="password" placeholder="Password" id="pass" name="pass"/>
					<span id="warn" style="color:red;padding-left:3px;padding-right:3px;padding-top:0px;padding-bottom:0px;"></span>
					<input type="button" value="Submit" id="submit" name="submit"/>
				</form>
			</div>
		</div>
	</div>
</div>

<div id="middle">
	<div id="div1"></div>
	<div id="div2" class="container-fluid">
		<div id="about_us" class="col-md-6">
			<h3 style="margin-top:0px;">About us</h3>
			<h4>WatchDog is a entrepreneur version software helps in monitoring and assessing activeness of your employees</h4>
			<p>Employee monitoring system used for workplace surveillance, to gather the information about the activities of the employee.
			There are many drawbacks when we consider CC-Cams so, only way to create such environment is by planning surprise inspections.
			This project is to automate this idea and create monitoring system.
			Project would be divided into two modules as Employee Login portal and Monitoring portal. 
			Each employee will be allocated with a fixed system to use. 
			Employee portal is developed using JAVA platform. Monitoring portal is a remote/portable web application so that results can be accessed from anywhere.
			Administrator module has authentication to add new person to the industry and allocate system to work.
			Each copy of the software will have its own identity which will be given to specific employee.
			Software is designed in such a way that it takes screenshots and updates them into database. 
			Employees are smart enough to act in safe way if they find the time intervals between each update, so we design software in such a way that it takes screenshots at random timings instead of regular fixed-intervals.
			</p>
		</div>
		<div class="col-md-3">
			<div id="who_button">Learn More</div>
		</div>
	</div>
	
	<div id="div3"></div>
</div>
<div></div>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/main.js"></script>
<script type="text/javascript" src="bootstrap-3.2.0-dist/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>
</body>
</html>