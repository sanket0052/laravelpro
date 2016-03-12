
$(function(){
	$("#brandlist").attr("disabled", true);
	var brandlist = $("#brandlist").val();
	if(brandlist != ''){	
		$("#brandlist").attr("disabled", false);
	}

	$("#p_c_id").change(function(e){
		var category_select_id = $(this).val();
		
		if(category_select_id != '')
		{
			$.ajax({
				url: 'http://localhost/product_management/index.php/catalog/get_brand_by_category',
				data: {'c_id': category_select_id},
				type: "post",
				success: function(data)
				{
					if(data != 0)
					{
						var json = $.parseJSON(data);
						var newoption;
						$("#brandlist").html('');
						$.each(json, function (index, value){
							$("#brandlist").append('<option value="'+ index +'">'+ value +'</option>');
						});
						$("#brandlist").attr("disabled", false);
					}
					else
					{
						$("#error p").html('Sorry ! No Brands available in this Category.');
						$("#error").show();
					}
				}
			});
		}
		else
		{
			$("#brandlist").attr("disabled", true);
			$("#brandlist").html('');
			$("#error p").html('Please Select Valid Category to show available Brands.');
			$("#error").show();
		}
	});
});