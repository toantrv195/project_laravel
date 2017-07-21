$(document).ready(function(){
	$(".update").click(function(){
		var rowid = $(this).attr('id');
		var qty = $(this).parent().parent().find('.qty').val();
		var token = $("input[name='_token']").val();
		
		$.ajax({
			url:'cap-nhat/'+rowid+'/'+qty,
			type:'GET',
			cache:false,
			data:{"token":token,"rowid":rowid,"qty":qty},
			success:function(data){
				if(data == "Oke"){
					window.location = "gio-hang"
				}
			}

		});
	});
});

$("div.alert").delay(3000).slideUp();