$("#search").keyup(function(){
		var val=$(this).val();
		if(val.length>0)
		{
			
			$.post("get.php",{key:val},function(data){
			
			$("#search_result").html(data);
			});
		}
		else{
			$("#search_result").html("");
		}
});
$("#date").blur(function(){
	var val=$(this).val();
	alert(val);
});
$(document).ready(function(){
	$("ul").click(function(){
		$(this).children("a").children("li").toggle();
	});
	$(".image_holder img").click(function(){
		var id=$(this).attr("id");
		$("#image_viewer img").attr("src","get_image.php?id="+id);
		$("#image_viewer").show();
		$("#close_image").click(function(){
			$("#image_viewer").hide();
		});
	});
	$('img').on('load',function(){
		$(this).show();
	});
});
