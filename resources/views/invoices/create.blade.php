@extends('layouts.app')

@section('title')
 Create invoice
@endsection
@section('content')
<div class="content-box">
	<form action="{{ route('add-invoice', Auth::user()->subdomain) }}" enctype="multipart/form-data" method="POST">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="row">
			<div class="col-lg-6">
				<div class="element-wrapper">
					<h6 class="element-header">
					General Information
					</h6>
					<div class="element-box">
						<h5 class="form-header">
							General Information
						</h5>
				 		<div class="form-desc">
							Discharge best employed your phase each the of shine. Be met even reason consider logbook redesigns. Never a turned interfaces among asking
						</div>
						<div class="form-group">
							<label for=""> From</label>
							<input class="form-control" type="text" value="{{ Auth::user()->subdomain }}" disabled="disabled">
						</div>
						<div class="form-group">
							<label for=""> Clients</label>
							<select class="form-control clients-select" name="client" required></select>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="element-wrapper">
					<h6 class="element-header">
						Date
					</h6>
					<div class="element-box">
						<h5 class="form-header">
							Date
						</h5>
						<div class="form-desc">
							Discharge best employed your phase each the of shine. Be met even reason consider logbook redesigns. Never a turned interfaces among asking
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for=""> Date Issue</label>
									<div class="date-input">
										<input class="issue-date form-control" placeholder="Date Issue" type="text" value="" name="issue_date" required>
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for=""> Date Due</label>
									<div class="date-input">
										<input class="due-date form-control" placeholder="Date Due" type="text" value="" name="due_date" required>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for=""> Invoice Number</label>
									<input class="form-control" placeholder="Invoice Number" type="text" name="invoice_number" required>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="">Po Number</label>
									<input class="form-control" placeholder="Po Number" type="text" name="po_number">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
	          	<!--START - Recent Ticket Comments-->
	          	<div class="element-wrapper">
	          		<div class="element-actions">
	          			<div class="form-inline justify-content-sm-end">
	          				<button class="btn btn-sm btn-primary btn-upper" type="button" id="add-item"><i class="os-icon os-icon-ui-22"></i><span>Add Item</span></button>
	          			</div>
	          		</div>
	                <h6 class="element-header">
	                  	Invoice Details
	                </h6>
	                <div class="element-box-tp">
						<div class="table-responsive">
							<table class="table table-padded">
								<thead>
									<tr>
										<th>
											<div class="form-check" style="margin-top: auto;">
												<label>
													<input type="checkbox" name="check"> <span class="label-text"></span>
												</label>
											</div>
										</th>
									  	<th>
									    	Descreption
									  	</th>
									  	<th>
									    	Quantity
									  	</th>
									  	<th>
									    	Unit Price
									  	</th>
									  	<th class="text-center">
									    	Amount
									  	</th>
									  	<th class="text-right">
									    	Tax
									  	</th>
									  	<th class="text-right">
									    	Discount
									  	</th>
									  	<th class="text-center">

									  	</th>
									</tr>
								</thead>
								<tbody id="items">
									<tr id="item-0">
										<td width="58px">
											<div class="form-check" style="margin-top: auto;">
												<label>
													<input type="checkbox" name="check[0]"> <span class="label-text" id="item_check-0"></span>
												</label>
											</div>
										</td>
										<td class="text-center">
											<input class="form-control" placeholder="Description" type="text" name="description[0]" id="item_description-0">
										</td>
										<td class="nowrap">
											<input class="form-control" placeholder="Quantity" type="number" name="quantity[0]" id="item_quantity-0" oninput="calc('0')">
										</td>
										<td>
											<div class="input-group">
	        									<input class="form-control" type="number" value="01.00" name="unit_price[0]" id="item_unit_price-0" oninput="calc('0')">
	        									<div class="input-group-append">
	          										<div class="input-group-text">
	            										USD
	          										</div>
	        									</div>
	      									</div>
										</td>
										<td class="text-center">
											<span id="item_amount-0">$0.00</span>
										</td>
										<td>
											<div class="form-check" style="margin-top: auto;">
												<label>
													<input type="checkbox" name="tax[0]" id="item_tax-0" onchange="calcGrandTotal()"> <span class="label-text"></span>
												</label>
											</div>
										</td>
										<td>
											<div class="form-check" style="margin-top: auto;">
												<label>
													<input type="checkbox" name="discount[0]" id="item_discount-0" onchange="calcGrandTotal()"> <span class="label-text"></span>
												</label>
											</div>
										</td>
										<td>
											<button class="danger small-edit" type="button" onclick="deleteItem('0')"><i class="os-icon os-icon-ui-15"></i></button>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<!--END - Recent Ticket Comments-->
			</div>
		</div>
		<div class="element-box row">
			<div class="col-sm-6">
				<div class="form-group">
	              	<label> Notes to Client</label>
	              	<textarea class="form-control" rows="3" name="notes"></textarea>
	            </div>
			</div>
			<div class="col-sm-6">
	  			<div class="invoice-table">
	          		<table class="table">
	            		<thead>
							<tr>
								<th>
									Total
								</th>
								<th>
									<span id="totalBefore">$00.00</span>
								</th>
							</tr>
	           			</thead>
	            		<tbody>
							<tr>
								<td>
									Tax %
								</td>
								<td>
									<input class="form-control" type="number" oninput="calcGrandTotal()" id="tax1" name="invoice_tax">
								</td>
							</tr>
							<tr>
								<td>
									Discount %
								</td>
								<td>
									<input class="form-control" type="number" oninput="calcGrandTotal()" id="discount" name="invoice_discount">
								</td>
							</tr>
	            		</tbody>
	            		<tfoot>
							<tr>
								<td>
									Grang Total
								</td>
								<td class="text-right" colspan="2">
									<span id="totalAfter">$00.00</span>
								</td>
							</tr>
	            		</tfoot>
	          		</table>
	  			</div>
	  		</div>
	  		<input type="hidden" name="sub_total" value="0.0" />
	  		<input type="hidden" name="grand_total" value="0.0" />
	  		<input type="hidden" name="organization"/>
			<div class="col-md-12 text-right">
				<button class="btn btn-sm btn-primary btn-upper" type="submit" value="opened" name="status"><span>Save</span></button>
				<button class="btn btn-sm btn-info btn-upper" type="submit" value="draft" name="status"><span>Save as Draft</span></button>
				<button class="btn btn-sm btn-secondary btn-upper"><span>Cancel</span></button>
			</div>
		</div>
	</form>
</div>
@endsection
@section('scripts')
	<style>
	 .select2 {
	  width: 100% !important;
	 }
	 .small-edit {
	 	font-size: 1rem;
	 }
	</style>
	<script>
		var clients = [];
		@forelse($clients as $client)
			clients.push({ id: {{ $client->id }}, text: '<div> @if ($client->media_id)<img src="{{ asset('storage/'.$client->media->reference) }}" width="30px" height="30px">{{ $client->company_name }} @else <div class="avatar" style="border-radius: 50%;">{{ substr($client->company_name, 0, 3) }}</div>{{ $client->company_name }} @endif </div>' });
		@empty
		@endforelse
		$(".clients-select").select2({
			// maximumSelectionLength: 1,
			data: clients,
			templateResult: function (d) { return $(d.text); },
			templateSelection: function (d) { return $(d.text); },
		});
	</script>
	<script>
		var itemRows = [0];
		var itemIncrement = 0;
		var totalAfter = 0;
		var totalBefore = 0;
		$('#add-item').click(function(){
			itemIncrement = itemIncrement + 1;
			var html = '';
      		html += '<tr id="item-'+itemIncrement+'">';
      		html += '<td width="58px"><div class="form-check" style="margin-top: auto;"><label><input type="checkbox" name="check['+itemIncrement+']"> <span class="label-text" id="item_check-'+itemIncrement+'"></span></label></div></td>';
      		html += '<td class="text-center"><input class="form-control" placeholder="Description" type="text" name="description['+itemIncrement+']" id="item_description-'+itemIncrement+'"></td>';
      		html += '<td class="nowrap"><input class="form-control" placeholder="Quantity" type="number" name="quantity['+itemIncrement+']" id="item_quantity-'+itemIncrement+'" oninput="calc('+itemIncrement+')"></td>';
      		html += '<td><div class="input-group"><input class="form-control" type="number" value="01.00" name="unit_price['+itemIncrement+']" id="item_unit_price-'+itemIncrement+'" oninput="calc('+itemIncrement+')"><div class="input-group-append"><div class="input-group-text">USD</div></div></div></td>';
      		html += '<td class="text-center"><span id="item_amount-'+itemIncrement+'">$0.00</span></td>';
      		html += '<td><div class="form-check" style="margin-top: auto;"><label><input type="checkbox" name="tax['+itemIncrement+']" id="item_tax-'+itemIncrement+'" onchange="calcGrandTotal()"> <span class="label-text"></span></label></div></td>';
      		html += '<td><div class="form-check" style="margin-top: auto;"><label><input type="checkbox" name="discount['+itemIncrement+']" id="item_discount-'+itemIncrement+'"  onchange="calcGrandTotal()"> <span class="label-text"></span></label></div></td>';
      		html += '<td><button class="danger small-edit" type="button" onclick="deleteItem('+itemIncrement+')"><i class="os-icon os-icon-ui-15"></i></button></td></tr>';
      		$('#items').append(html);
			itemRows.push(parseFloat(itemIncrement));
		});
		function deleteItem(item){
			$('#item-'+item).remove();
			const index = itemRows.indexOf(parseFloat(item));
			if (index > -1) {
			  	itemRows.splice(index, 1);
			}
		}
		function calc(item){
			var amount;
			if($('#item_unit_price-'+item).val() != '' && $('#item_quantity-'+item).val() != '') {
				amount = Math.round((parseFloat($('#item_unit_price-'+item).val()) * parseFloat($('#item_quantity-'+item).val())+ Number.EPSILON) * 100) / 100;
				$('#item_amount-'+item).text('$'+amount);
			} else {
				$('#item_amount-'+item).text('$0.00');
			}
			totalBefore = 0;
			itemRows.forEach(function(value){
				totalBefore += parseFloat($('#item_amount-'+value).text().substr(1));
			});
			$('#totalBefore').text('$'+totalBefore);
			totalAfter = totalBefore;
			calcGrandTotal();
		}
		function calcGrandTotal() {
			var tax = 0;
			var discount = 0;
			itemRows.forEach(function(item){
		        if ($('#item_tax-'+item+':checkbox:checked').length > 0 && $('#tax1').val() != '') {
		        	tax += parseFloat($('#item_amount-'+item).text().substr(1)) * parseFloat($('#tax1').val()) / 100;
				}
				if ($('#item_discount-'+item+':checkbox:checked').length > 0 && $('#discount').val() != '') {
		        	discount -= parseFloat($('#item_amount-'+item).text().substr(1)) * parseFloat($('#discount').val()) / 100;
				}
		    });
		    totalAfter = discount + tax + totalBefore;
		    $('#totalAfter').text('$'+totalAfter);
		}
		$('form').submit(function () {
			var sub_total=totalBefore;
			var grand_total=totalAfter;
			var organization={{Auth::user()->subdomain}};
			// or var hiddenData=jQuery('#rout_markers').val();
			$("input[type=hidden][name=sub_total]").val(sub_total);
			$("input[type=hidden][name=grand_total]").val(grand_total);
			$("input[type=hidden][name=organization]").val(organization);
		});
		$(document).ready(function() {
			calc(0);
			calcGrandTotal();
		});
		$("input.issue-date").daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            minYear: parseInt(moment().subtract(10, 'years').format('YYYY'),10),
            maxYear: parseInt(moment().add(10, 'years').format('YYYY'), 10),
            autoUpdateInput: false,
            singleClasses: "",
        });

        $('input.issue-date').on('apply.daterangepicker', function (ev, picker) {
            $(this).val(picker.startDate.format('L'));
        });

        $('input.issue-date').on('cancel.daterangepicker', function (ev, picker) {
            $(this).val('');
        });
        $("input.due-date").daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            minYear: parseInt(moment().subtract(10, 'years').format('YYYY'),10),
            maxYear: parseInt(moment().add(10, 'years').format('YYYY'), 10),
            autoUpdateInput: false,
            singleClasses: "",
        });

        $('input.due-date').on('apply.daterangepicker', function (ev, picker) {
            $(this).val(picker.startDate.format('L'));
        });

        $('input.due-date').on('cancel.daterangepicker', function (ev, picker) {
            $(this).val('');
        });
	</script>
@endsection
