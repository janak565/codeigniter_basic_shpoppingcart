<table class="table"> 
	<tr>
		<td class="text-left" colspan="4">
			<div class="form-inline">
				<div class="form-group">
					<div class="col-xs-12 col-md-12">
						<div class="col-xs-7 col-md-6">
							<label for="billing_number">Billing Number *:</label>
						</div>
						<div class="col-xs-5 .col-md-6">
							<input type="text" name="billing_number" id="billing_number" class="form-control" required>
						</div>
					</div>	
				</div>
			</div>
		</td>
	</tr>
	<tr>
		<td class="text-left" colspan="4">
			<div class="form-inline">
				<div class="form-group">
					<div class="col-xs-12 col-md-12">
						<div class="col-xs-7 col-md-6">
							<label for="billing_cust_name">Customer Name *:</label>
						</div>
						<div class="col-xs-5 .col-md-6">
							<input type="text" name="billing_cust_name" id="billing_cust_name" class="form-control" required>
						</div>
					</div>
				</div>
			</div>
		</td>	
	</tr>
	<tr>
		<td class="text-left" colspan="4">
			<div class="form-inline">
				<div class="form-group">
					<div class="col-xs-12 col-md-12">
						<div class="col-xs-7 col-md-6">
							<label for="billing_cust_phone">Phone Number *:</label>
						</div>
						<div class="col-xs-5 .col-md-6">
							<input type="text" name="billing_cust_phone" id="billing_cust_phone" class="form-control" required>
						</div>
					</div>
				</div>
			</div>
		</td>
	</tr>
	<tr>
		<td colspan="4">
			<table class="table"> 
				<tr>
					<td class="text-center"><strong>Product Name</strong></td>
					<td class="text-center"><strong>Qty</strong></td>
					<td class="text-center"><strong>Price</strong></td>
					<td class="text-center"><strong>Amount</strong></td>
				</tr>
				<tr>
					<td>
						<select  class="form-control shopping_product_prodct_name" id="product_name" name="product_name" required>
					    	<option value="">Select</option>
					    	<option value="1" data-product-name="Product0001" data-price="10">Product0001</option>
					    	<option value="2" data-product-name="Product0002" data-price="20">Product0002</option>
					    	<option value="3" data-product-name="Product0003" data-price="30">Product0003</option>
					    	<option value="4" data-product-name="Product0004" data-price="40">Product0004</option>
					    	<option value="5" data-product-name="Product0005" data-price="50">Product0005</option>
						</select>
					</td>
					<td><input type="text" name="qty" id="qty" class="form-control shopping_product_qty"  required maxlength="3"></td>
					<td><input type="text" name="price" id="price" class="form-control shopping_product_price" readonly=""></td>
					<td><input type="text" name="amount" id="amount" class="form-control shopping_product_amount" readonly></td>
				</tr>
				<tr>
					<td class="text-right" colspan="4">
						<input type="button" class="btn shopping_product_add" name="add" value="Add"/>
						<input type="button" class="btn shopping_product_clear" name="clear" value="Clear"/>
					</td>

				</tr>
			</table>	
		</td>
	</tr>
	<tr>
		<td colspan="4">
			<table class="table"> 
				<tr>
					<td class="text-left"><strong>Product Name</strong></td>
					<td class="text-left"><strong>Qty</strong></td>
					<td class="text-left"><strong>Price</strong></td>
					<td class="text-left"><strong>Amount</strong></td>
				</tr>
				<tr>
					<td>1</td>
					<td>Name1</td>
					<td>name2 kanai</td>
					<td>test@aaaa.com</td>
				</tr>
				<tr>
					<td>1</td>
					<td>Name1</td>
					<td>name2 kanai</td>
					<td>test@aaaa.com</td>
				</tr>
				<tr>
					<td>1</td>
					<td>Name1</td>
					<td>name2 kanai</td>
					<td>test@aaaa.com</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td class="text-right" colspan="4">
			<input type="button" class="btn shopping_billing_save" name="Save" value="Save"/>
			<input type="button" class="btn shopping_billing_clear" name="Clear" value="Clear"/>
		</td>
	</tr>			
</table>
<script type="text/javascript">
$(document).ready(function(){
	/**
	*	price automatimacally fill when change price
	*/
	$('.shopping_product_prodct_name').change(function(){
		
		//get prodct price from prodct name
		var product_price = $(this).find(':selected').data('price');

		//fill price in price textbox
		$('.shopping_product_price').val(product_price);
		var qty = $('.shopping_product_qty').val();
		if(qty!="")
		{
			var amount = 0;
			amount = qty * product_price;

			//fill amount on qty and product price
			$('.shopping_product_amount').val(amount);	
		}	
	});
	/**
	* amount atomaticall fill when enter qty
	*/
	$('.shopping_product_qty').blur(function(){

		var amount = 0;
		var qty = $(this).val();

		//get product price 
		var product_price = $('.shopping_product_price').val();
		
		//calculation of qty and price 
		amount = qty * product_price;
		
		//fill amount in amount textbox
		$('.shopping_product_amount').val(amount);
	});
	/**
	* 	added products information	
	*/
	$('.shopping_product_add').click(function(){
	
		//get product id
		var product_id = $('.shopping_product_prodct_name').val();
		if(product_id==''){
			alert('Please selet product');
			return false;
		}
		//get qty
		var qty = $('.shopping_product_qty').val();

		if(qty=='' || qty==0){
			alert('Please enter quantity');
			return false;
		}
		//get product price
		var product_price = $('.shopping_product_price').val();
		//get amount
		var amount = $('.shopping_product_amount').val();
		var data = {product_id:product_id,qty:qty,product_price:product_price,amount:amount}
		
		//call proudct_add request
		$.ajax({
			url  : SITE_URL+'orders/add_product',
			data : data,
			type : 'POST',
			sucess : function(data)
			{

			},
			error : function(xhr,status,error)
			{

			}
		});
	});
});	
</script>