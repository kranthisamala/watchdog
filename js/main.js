$(document).ready(function(){
	var scroll;
	function nav_adjust(){
		if(scroll>70)
		{
			$("#nav").css("top",scroll+"px");
		}
		else
		{
			$("#nav").css("top","50px");
		}
	}
	function about_us(){
		if(scroll>250)
		{
			$("#about_us").animate({opacity:"1",top:"0px"},1500);
			$("#who_button").animate({opacity:"1",left:"0px"},1200);
		}
	}
	$(window).scroll(function(){
		scroll=$(this).scrollTop();
		
		nav_adjust();
		about_us();
	});
	$("#login_menu").click(function(){
		$("#login_form_holder").toggle();
	});
	$(".menu").click(function(){
			if($(this).attr("hold")=="home")
			$('html, body').animate({scrollTop:0}, 800);	
			else
			{
				$('html, body').animate({scrollTop:$("#about_us").offset().top-300}, 1500);
			}
	});
	$("#submit").click(function(){
		var uname=$("#uname").val().trim();
		var pass=$("#pass").val().trim();
		if(uname==""&&pass=="")
		{
			$("#warn").text("Please enter username and password");
		}
		else if(uname=="")
		{
			$("#warn").text("Please enter username");
		}
		else if(pass=="")
		{
			$("#warn").text("Please enter password");
		}
		else
		{
			$.post("login.php",{uname:uname,pass:pass},function(data){
				if(data=="logged in")
				{
					window.location="user.php";
				}
				else if(data=="login failed")
				{
					$("#warn").text("Password or username is incorrect");	
				}
				else if(data="Query failed to execute")
				{
					alert("query failed to execute");
				}
				else if(data="Not set")
				{
					$("#warn").text("Password or username or not set");	
				}
			});
		}
		
	});
});