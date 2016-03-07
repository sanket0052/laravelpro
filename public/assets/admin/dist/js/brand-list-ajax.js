	
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

$(function(){
	$("#brandlist").attr("disabled", true);
	var brandlist = $("#brandlist").val();
	if(brandlist != ''){	
		$("#brandlist").attr("disabled", false);
	}

	$("#categorylist").change(function(e){
		$("#error").hide();
		var category_select_id = $(this).val();
		
		if(category_select_id != '')
		{
			$.ajax({
				url: 'http://localhost/laravelpro/public/admin/product/brandlist',
				type: "POST",
				data: {_token: CSRF_TOKEN, 'categoryid': category_select_id},
				dataType:'json',
				success: function(data)
				{
					if(data != 0)
					{
						$("#brandlist").html('');
						$("#brandlist").attr("disabled", false);
						$.each(data, function (index, value){
							$("#brandlist").append('<option value="'+ index +'">'+ value +'</option>');
						});
					}
					else
					{
						$("#error p").html('Sorry ! No Brands available for this Category.');
						$("#brandlist").attr("disabled", true);
						$("#brandlist").html('');
						$("#error").show();
					}
				}
			});
			// getBrand(CSRF_TOKEN, category_select_id);	
		}
		else
		{
			$("#brandlist").attr("disabled", true);
			$("#brandlist").html('');
			$("#error p").html('Please Select Valid Category to show available Brands.');
			$("#error").show();
		}
	});

	$( '#categorylist' ).ready(function() {
	    var category_select_id = $('#categorylist').val();
	    var brand_id = $('#brandlist').val();
	    var CSRF_TOKEN = $('input[name="_token"]').val();
	    if(category_select_id != '')
		{
			$.ajax({
				url: 'http://localhost/laravelpro/public/admin/product/brandlist',
				type: "POST",
				data: {_token: CSRF_TOKEN, 'categoryid': category_select_id},
				dataType:'json',
				success: function(data)
				{
					if(data != 0)
					{
						$("#brandlist").html('');
						$("#brandlist").attr("disabled", false);
						$.each(data, function (index, value){
							if(index == brand_id){
								$("#brandlist").append('<option value="'+ index +'" selected="selected">'+ value +'</option>');
							}else{
								$("#brandlist").append('<option value="'+ index +'">'+ value +'</option>');
							}
						});
					}
					else
					{
						$("#error p").html('Sorry ! No Brands available for this Category.');
						$("#brandlist").attr("disabled", true);
						$("#brandlist").html('');
						$("#error").show();
					}
				}
			});
		}
		// else
		// {
		// 	$("#brandlist").attr("disabled", true);
		// 	$("#brandlist").html('');
		// 	$("#error p").html('Please Select Valid Category to show available Brands.');
		// 	$("#error").show();
		// }
	});
});