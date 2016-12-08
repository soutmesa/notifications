$(function(){
	
	setInterval(function(){
		var url = 'http://localhost:8585/notification/api/api.php?act=';
		$.ajax({
		  	method: "POST",
		  	url: url + "get_notes",
		  	dataType: "json",
		  	success: function(response){
		  		datas = response[0].leng;
		  		$('.badge-notify-notes').text(datas)
		  	}
		});
	}, 1000);
});