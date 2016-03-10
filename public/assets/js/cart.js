$( document ).ready(function() {
	// $('.item').prop('disabled', true);
	$('#alert-block').hide();
});

function update_cart(id, p_id, p_price)
{
	id = id.id;
	if (id.indexOf("item") >= 0)
	{
		var CSRF_TOKEN = $('input[name=_token]').val();
		$('#input-item-'+p_id).prop('disabled', false);
		$('#input-item-'+p_id).focus();
		old_item = $('#input-item-'+p_id).val();
		rowid = $('#rowid-'+p_id).html();
		$('#'+id).removeClass('btn-primary').addClass('btn-success');
		$('#'+id+' i').removeClass('fa fa-pencil').addClass('fa fa-floppy-o');
		$('#'+id).attr('data-original-title', 'Update Cart');
		$('#'+id).prop('id', 'save-'+p_id);
	}
	else if(id.indexOf("save-") >= 0)
	{
		var inputbox = $('#input-item-'+p_id);
		var item_val = inputbox.val();
		var max_val = inputbox.attr('max');
		if($.isNumeric(item_val))
		{
			if(parseInt(item_val) > parseInt(max_val))
			{
				$('#alert-block').addClass('alert alert-danger alert-dismissable');
				$('#alert-block strong').html('You Can not enter more than '+max_val+' item.');
				$('#alert-block').show();
				inputbox.val(max_val);
				subtotal = (parseInt(max_val)*parseInt(p_price));
				$('#subtotal-'+id).html(subtotal);
				return false;
			}
			else if(parseInt(item_val) <= parseInt(max_val))
			{
				subtotal = (parseInt(item_val)*parseInt(p_price));
				old_subtotal = $('#subtotal-'+id).html();
				$('#subtotal-'+id).html(subtotal);
				update_cart_item(rowid, item_val, p_id, old_subtotal, CSRF_TOKEN);
			}
		}
		else
		{
			$('#alert-block').addClass('alert alert-danger alert-dismissable');
			$('#alert-block strong').html('Only Numbers Can Input.');
			$('#alert-block').show();
			inputbox.val(1);
			return false;
		}

	}
}

function update_cart_item(rowid, qty, p_id, old_subtotal, CSRF_TOKEN)
{
	$.ajax({
		url: 'http://localhost/laravelpro/public/cart/update/',
		data: {'rowid': rowid, 'qty':qty, '_token':CSRF_TOKEN},
		type: 'POST',
		success: function(data)
		{
			if($.trim(data) != 0)
			{
				$('#save-'+p_id).removeClass('btn-success').addClass('btn-primary');
				$('#save-'+p_id+' i').removeClass('fa fa-floppy-o').addClass('fa fa-pencil');
				$('#save-'+p_id).attr('data-original-title', 'Edit Cart');
				$('#save-'+p_id).prop('id', 'item-'+p_id);
				$('#input-item-'+p_id).prop('disabled', true);
				price = $('#price-item-'+p_id).html();
				new_product_subtotal = (parseInt(price)*qty);

				final_subtotal = $('#subtotal').html();
				final_subtotal -= parseInt(old_subtotal);
				final_subtotal += parseInt(new_product_subtotal);
				$('#subtotal').html(final_subtotal);
				$('#final-total').html(final_subtotal);
				
			}
			else
			{
				
			}
		}
	});
}

function delete_items(p_id)
{
	rowid = $('#rowid-'+p_id).html();
	$.ajax({
		url: 'delete_item',
		data: {'rowid': rowid},
		type: "post",
		success: function(data)
		{
			if($.trim(data) != 0)
			{
				old_subtotal = $('#subtotal-save-'+p_id).html();
				alert(old_subtotal);
				final_subtotal = $('#subtotal').html();
				alert(final_subtotal);
				final_subtotal -= parseInt(old_subtotal);
				$('#subtotal').html(final_subtotal);
				$('#final-total').html(final_subtotal);
				$('table tr#item-tr-'+p_id).remove();
			}else{
				
			}
		}
	});
}