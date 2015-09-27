<?php
if(isset($_SESSION['tid']))
{
	if($_SESSION['tid']==0)
	{
		?>
		<div class="row">
			<div id="navigator" class="col-md-2">
				<h4 style="z-index:3;background-color:rgb(248,45,39);color:white;padding:10px;margin-top:0px;" class="col-md-12 col-sm-12 col-xs-12">Members</h4>
				<div style='z-index:2;margin-top:45px;'>
					<?php
					$query="SELECT * FROM team_details";
					$query_res=mysql_query($query);
					while($res=mysql_fetch_array($query_res))
					{
						echo "
						<div class='team_name' style='z-index:2;margin:0;' >
						<ul class='dropdown'>
						<div class='title'>
						&nbsp".$res['team_name']."
						</div>";
						$team_members=mysql_query("SELECT * FROM team_members WHERE tid=".$res['tid']."");
						while($res1=mysql_fetch_array($team_members))
						{
							$name=mysql_query("SELECT * FROM employeedb where eid=".$res1['eid']."");
							$name1=mysql_fetch_array($name);
							echo "<a href='user.php?eid=".$res1['eid']."'><li>".$name1['name']."</li></a>";
						}
						echo "</ul></div>
						";
					}
					?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-10  com-sm-12 col-xs-12 col-md-offset-2 col-sm-offset-2 " id="middle">
<?php
				if(isset($_GET['eid']))
				{
					

					$eid=$_GET['eid'];
					$query="SELECT * FROM session WHERE eid='$eid' ORDER BY sessionid DESC";
					$query=mysql_query($query);
					echo "<div class='container-fluid'>";
					while($res=mysql_fetch_assoc($query))
					{
						$start_date = new DateTime($res['start']);
						$res_time=$start_date->diff(new DateTime($res['end']));
						$res_time_total=($res_time->s + ($res_time->i * 60)+ ($res_time->h * 60 *60));
						if($res_time_total!=0)
							$res_active=round(($res['activetime']*100)/$res_time_total);
						else 
							$res_active=0;
						if($res_active > 85)
							$res_color='progress-bar-success';
						else if($res_active > 65)
							$res_color='progress-bar-info';
						else if($res_active > 45)
							$res_color='progress-bar-warning';
						else 
							$res_color='progress-bar-danger';

						echo "<div class='session_details col-md-12 col-sm-12'>
						<div class='session_no col-md-6 col-sm-6'>Session No:-".$res['sessionid']."</div>
						<div class='col-md-6 col-sm-6 session_time'><p>Start:".(new DateTime($res['start']))->format('Y-m-d H:i:s')." End:".(new DateTime($res['end']))->format('Y-m-d H:i:s')."<p></div>
						<div class='col-md-10 col-sm-10' style='background-color:blue;height:1px;margin-bottom:2px;'></div>
						<div class='progress col-md-10 col-sm-10'>
						<div class='progress-bar ".$res_color." progress-bar-striped active' role='progressbar'
						aria-valuenow='".$res_active."' aria-valuemin='0' aria-valuemax='100' style='width:".$res_active."%'>
						".$res_active."% active
						</div>
						</div>";
						$query_res="SELECT * FROM image WHERE sessionid='".$res['sessionid']."'";
						$query_res=mysql_query($query_res);
						while($res1=mysql_fetch_assoc($query_res))
						{
							echo	"<div class='col-md-2 col-sm-2 image_holder'>
							<div class='delete_image' data-toggle='tooltip' data-placement='right' title='Delete image' imgid='".$res1['imgid']."'><i class='fa fa-close'></i></div>
							<img src='get_image.php?id=".$res1['imgid']."' width='100%' id='".$res1['imgid']."' height='100%'>
							</div>";
						}

						echo "</div>";
					}
					echo "</div>";
				}
				else
				{
					$query="SELECT * FROM team_details";
					$query=mysql_query($query);
					echo "<div class='container-fluid'>";
					while($res=mysql_fetch_array($query))
					{
						echo "
						<div class='team_block col-md-12 col-sm-10 col-xs-12'>
						<div class='middle_team_name col-md-12 col-sm-12 col-xs-12'>".$res['team_name']."</div>
						<div class='col-md-12 col-sm-12 col-xs-12' style='background-color:blue;height:1px;margin-bottom:2px;'></div>
						";

						$query_members=mysql_query("SELECT * FROM team_members WHERE tid=".$res['tid']);
						while($res_members=mysql_fetch_assoc($query_members))
						{
							$eid=$res_members['eid'];
							$emp_name=mysql_fetch_assoc(mysql_query("SELECT * FROM employeedb WHERE eid='$eid'"));
							$create_div=mysql_query("SELECT * FROM session s,image i,employeedb e WHERE s.eid='$eid' AND e.eid=s.eid AND s.sessionid=i.sessionid AND s.sessionid=(SELECT max(sessionid) FROM session where eid=s.eid) AND i.time=(SELECT max(time) FROM image WHERE sessionid=s.sessionid)");
							$res_emp=mysql_fetch_assoc($create_div);
							$start_date = new DateTime($res_emp['start']);
							$res_time=$start_date->diff(new DateTime($res_emp['end']));
							$res_time_total=($res_time->s + ($res_time->i * 60)+ ($res_time->h * 60 *60));
							if($res_time_total!=0)
								$res_active=round(($res_emp['activetime']*100)/$res_time_total);
							else 
								$res_active=0;
							if($res_active > 85)
								$res_color='progress-bar-success';
							else if($res_active > 65)
								$res_color='progress-bar-info';
							else if($res_active > 45)
								$res_color='progress-bar-warning';
							else 
								$res_color='progress-bar-danger';

							echo "
							
							<div class='col-md-3 col-sm-4 col-xs-4 employee_box' style='margin-top:60px;'>
							<a href='user.php?eid=".$emp_name['eid']."'>
							";
							if($res_emp['imgid'])
							{
								echo "<img src='get_image.php?id=".$res_emp['imgid']."' width='100%'/>";
							}
							else
							{
								echo "<img src='res/default.jpg' width='100%' height='60%' />";
							}
							echo "<div class='emp_name'>
							".$emp_name['username']."</div>
							<div class='progress'>
							<div class='progress-bar ".$res_color." progress-bar-striped active' role='progressbar'
							aria-valuenow='".$res_active."' aria-valuemin='0' aria-valuemax='100' style='width:".$res_active."%'>
							".$res_active."% active
							</div>
							</div>
							
							</a>
							</div>";
						}
						echo "</div>";
					}
					echo "</div>";
				}
?>
			</div>
			<div class='container-fluid' style='margin:0px;'>
				<div id="image_viewer">
					<div style="background-color:black;opacity:0.7;width:100%;position:absolute;top:0px;left:0px;height:100%;"></div>
					<div id="close_image"><i class='fa fa-close'></i></div>
					<div style="position:absolute;height:80%;width:70%;left:15%;top:10%;">
						<img class="img-responsive" src="">
					</div>
				</div>
			</div>
		</div>

		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="bootstrap-3.2.0-dist/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/user1.js"></script>
		<script>
		$(document).ready(function(){
			$('[data-toggle="tooltip"]').tooltip();   
		});
		</script>
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