@extends('layouts.app')

@section('title')
 Invoices
@endsection
@section('content')
<div class="content-box">
	<div class="row">
	  	<div class="col-sm-12">
		    <!--START - Recent Ticket Comments-->
		    <div class="element-wrapper">
	      		<div class="element-actions">
	        		<div class="form-inline justify-content-sm-end">
	          			<a class="btn btn-sm btn-primary btn-upper" href="{{ route('create-invoice', Auth::user()->subdomain) }}"><i class="os-icon os-icon-ui-22"></i><span>New Invoice</span></a>
	        		</div>
	      		</div>
	      		<h6 class="element-header">
	          		Invoices
	      		</h6>
	      		<div class="control-header">
	        		<div class="row align-items-center">
	          			<div class="col-8 col-lg-7">
				            <div class="form-group">
				              	<label for=""> Dates</label>
				              	<div class="input-group">
				                	<div class="input-group-prepend">
				                  		<div class="input-group-text">
				                    		<i class="os-icon os-icon-ui-83"></i>
				                  		</div>
				                	</div>
				                	<input class="form-control date-range-picker" type="text" value="">
				              	</div>
				            </div>
	          			</div>
	          		</div>
	          		<hr>
	          		<div class="row">
          				<!-- <div class="col-12 col-lg-12"> -->
	            			<div class="form-group col-4 col-lg-4">
				              	<select class="form-control clients-select" name="client"></select>
	            			</div>
	            			<div class="form-group col-4 col-lg-4">
				              	<select class="form-control">
					                <option>
					                  	Status
					                </option>
					                <option>
					                  	Open
					                </option>
					                <option>
					                  	Closed
					                </option>
				              	</select>
	            			</div>
							<div class="col-4 col-lg-4 text-right">
								<a class="btn btn-sm btn-primary btn-upper" href="#"><i class="os-icon os-icon-ui-37"></i><span>Filter</span></a>
							</div>
	          			<!-- </div> -->
	        		</div>
	      		</div>
	      		<div class="element-box">
	        		<div class="table-responsive">
			          	<table id="dataTable1" width="100%" class="table table-striped table-lightfont">
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
										Invoice
									</th>
									<th>
										Client
									</th>
									<th>
										Issue Date - Due Date
									</th>
									<th>
										Total
									</th>
									<th>
										Paid
									</th>
									<th>
										Status
									</th>
									<th>
										Action
									</th>
								</tr>
				            </thead>
				            <tbody>
				            	@forelse($invoices as $invoice)
								<tr>
									<td>
										<div class="form-check" style="margin-top: auto;">
											<label>
												<input type="checkbox" name="check"> <span class="label-text"></span>
											</label>
										</div>
									</td>
									<td>
										<a href="{{ route('edit-invoice',  ['account' => Auth::user()->subdomain, 'invoice_id' => $invoice->id]) }}">{{ $invoice->invoice_number }}</a>
									</td>
									<td>
										<div class="smaller lighter">
											<span>{{ $invoice->client->name }}</span>
										</div>
									</td>
									<td>
										<span class="smaller lighter">{{ date_format(date_create($invoice->issue_date),'d/m/Y') }}</span>-<span class="smaller lighter">{{ date_format(date_create($invoice->due_date),'d/m/Y') }}</span>
									</td>
									<td>
										<a class="badge badge-success-inverted" href="">$300.00</a>
									</td>
									<td class="nowrap">
										<span>$0.00</span>
									</td>
									<td class="nowrap">
										<span class="status-pill smaller green"></span><span>Sent</span>
									</td>
									<td class="row-actions">
										<div class="btn-group mr-1 mb-1">
											<button aria-expanded="false" aria-haspopup="true" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" id="dropdownMenuButton1" type="button">Actions</button>
											<div aria-labelledby="dropdownMenuButton1" class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 30px, 0px); top: 0px; left: 0px; will-change: transform;">
												<a class="dropdown-item" href="#"><i class="os-icon os-icon-ui-15"></i> Action</a><a class="dropdown-item" href="#"><i class="os-icon os-icon-ui-15"></i> Another action</a><a class="dropdown-item" href="#"><i class="os-icon os-icon-ui-15"></i> Delete</a>
											</div>
										</div>
									</td>
								</tr>
								@empty
								@endforelse
				            </tbody>
			          	</table>
	        		</div>
	      		</div>
	    	</div>
	    	<!--END - Recent Ticket Comments-->
	  	</div>
	</div>
</div>
@endsection
@section('scripts')
	<script src="{{ asset('js/main_rentals.js?version=4.4.0') }}"></script>
	<style>
	 .select2 {
	  width: 100% !important;
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
@endsection
