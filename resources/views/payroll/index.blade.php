@extends('layouts.app')

@section('title')
 Payroll
@endsection
@section('content')
<div class="content-box">
	<div class="row">
		<div class="col-sm-12">
			<div class="element-wrapper">
				<div class="element-actions">
					<div class="form-inline justify-content-sm-end">

					</div>
				</div>
				<h6 class="element-header">
					Employee Salary <strong style="font-weight: bolder !important;" id="selected-range"></strong>
				</h6>
				<div class="control-header">
					<div class="row align-items-center">
						<div class="col-10 col-lg-10">
							<form action="">
								<div class="row">
									<div class="form-group col-sm-3">
										<div class="input-search-w">
											<input class="form-control rounded bright" placeholder="Search team members..." type="search">
										</div>
									</div>
									<div class="form-group col-sm-3">
										<select class="form-control">
											  <option>
												Search by Role
											  </option>
											  <option>
												Super Admin
											  </option>
											  <option>
												User
											  </option>
											  <option>
												Viewer
											  </option>
										</select>
									</div>
									<div class="form-group col-sm-3 row">
										<label for="" class="col-sm-3 col-form-label">From:</label>
										<div class="col-sm-9">
											<div class="date-input">
												<input class="single-daterange form-control" placeholder="From" type="text">
											</div>
										</div>
									</div>
									<div class="form-group col-sm-3 row">
										<label for="" class="col-sm-2 col-form-label">To:</label>
										<div class="col-sm-10">
											<div class="date-input">
												<input class="single-daterange form-control" placeholder="To" type="text">
											</div>
										</div>
									</div>
								</div>
							</form>
						</div>
						<div class="col-2 col-lg-2 text-right">
							<a class="btn btn-sm btn-primary btn-upper" href="#"><i class="os-icon os-icon-ui-37"></i><span>Filter</span></a>
						</div>
					</div>
				</div>
				<div class="element-box">
					<div class="row">
						<small>Week&nbsp;</small>
						@for ($i = 1; $i <= $weekNumber; $i++)
							@if($i==1)
								<div class="week-column week-width week-first" week="{{$i}}"></div>
							@elseif($i==$weekNumber)
								<div class="week-column week-width week-last" week="{{$i}}"></div>
							@else
								<div class="week-column week-width" week="{{$i}}"></div>
							@endif
						@endfor
					</div>
					<div class="row">
						<small>Month&nbsp;</small>
						@for ($i = 1; $i <= 12; $i++)
							@if($i==1)
								<div class="month-column month-width month-first" month="{{$i}}"></div>
							@elseif($i==12)
								<div class="month-column month-width month-last" month="{{$i}}"></div>
							@else
								<div class="month-column month-width" month="{{$i}}"></div>
							@endif
						@endfor
					</div>
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
										Member
									</th>
									<th>
										Gross Pay
									</th>
									<th>
										Tax
									</th>
									<th>
										Earnings
									</th>
									<th>
										Deductions
									</th>
									<th>
										Net Pay
									</th>
									<th>
										Payslip
									</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td data-target="#schedulePaymentModal" data-toggle="modal" class="schedule-payment" colspan="8">Click here to schedule payment on <span id="month">month 1</span></td>
									<td style="display: none;"></td>
									<td style="display: none;"></td>
									<td style="display: none;"></td>
									<td style="display: none;"></td>
									<td style="display: none;"></td>
									<td style="display: none;"></td>
									<td style="display: none;"></td>
								</tr>
								@forelse($payslips as $payslip)
								<tr>
									<td class="text-center" style="display: inline-flex;">
										<div class="form-check" style="margin-top: auto;">
											<label>
												<input type="checkbox" name="check"> <span class="label-text"></span>
											</label>
										</div>
										<div class="user-with-avatar">
											@if($payslip->user->media_id)
										  		<img alt="" src="{{ asset('storage/'.$payslip->user->media->reference) }}">
										  	@else
										  		<div class="avatar" style="border-radius: 50%;">{{ substr($payslip->user->first_name, 0, 1).substr($payslip->user->last_name, 0, 1)}}</div>
										  	@endif
										</div>
									</td>
									<td>
									  	<div>
							  		<span>{{ $payslip->user->first_name }} {{$payslip->user->last_name }}</span><span class="smaller"><strong>&nbsp;(@foreach($payslip->user->roles as $role){{$role->name}}@endforeach)</strong></span>
									  	</div>
									  	<div class="smaller">
									  		{{ $payslip->user->email }}
									  	</div>
									</td>
									<td>
										<span>{{ $payslip->amount }}$</span>
									</td>
									<td>
										<span>3$</span>
									</td>
									<td>
										<span>{{ $payslip->earnings->sum('amount') }}$</span>
									</td>
									<td>
										<span>{{ $payslip->deductions->sum('amount') }}$</span>
									</td>
									<td>
										<span>{{ $payslip->amount + ($payslip->earnings->sum('amount')-$payslip->deductions->sum('amount')) }}$</span>
									</td>
									<td class="row-actions">
										<div class="btn-group mr-1 mb-1">
											<button aria-expanded="false" aria-haspopup="true" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" id="dropdownMenuButton1" type="button">Payslip</button>
											<div aria-labelledby="dropdownMenuButton1" class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 30px, 0px); top: 0px; left: 0px; will-change: transform;">
												<a class="dropdown-item" href="#"><i class="os-icon os-icon-cv-2"></i> PDF</a>
												<a class="dropdown-item" href="{{ route('edit-payslip',['account'=>Auth::user()->subdomain, 'payslip_id'=>$payslip->id]) }}"><i class="os-icon os-icon-newspaper"></i> View</a>
												<a class="dropdown-item" href="#"><i class="os-icon os-icon-agenda-1"></i> Print</a>
												<a class="dropdown-item" href="#"><i class="os-icon os-icon-mail-18"></i> Send</a>
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
		</div>
	</div>
</div>
<div aria-hidden="true" aria-labelledby="schedulePaymentModal" class="modal fade" id="schedulePaymentModal" role="dialog" tabindex="-1">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">
				  	Schedule payment
				</h5>
				<button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> &times;</span></button>
			</div>
			<div class="modal-body">
				<form action="{{ route('add-payment', Auth::user()->subdomain) }}" enctype="multipart/form-data" method="POST">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="row">
						<div class="col-sm-12">
							<label for=""> Dates</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<div class="input-group-text">
										<i class="os-icon os-icon-ui-83"></i>
									</div>
								</div>
								<input class="form-control" name="daterange" type="text"/>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
				                <label for=""> Team Members</label>
				                <select class="form-control members-select" multiple="true" name="members[]"></select>
				            </div>
						</div>
						<div class="col-sm-12">
				           	<div class="form-group">
				             	<label for=""> Net Salary</label>
				             	<input class="form-control" type="text" required="" name="amount">
				           </div>
				        </div>
						<div class="col-sm-12">
							<div class="form-group">
						        <label for=""> Description</label>
								<textarea cols="80" id="ckeditor1" name="ckeditor1" rows="10"></textarea>
						    </div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<button data-target="#addEarningModal" data-toggle="modal" class="btn btn-link btn-underlined" type="button" id="add-earnings"><i class="os-icon os-icon-ui-22"></i><span>Add earnings</span></button>
							</div>
							<div id="earnings">

							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group text-right">
								<button data-target="#addDeductionModal" data-toggle="modal" class="btn btn-link btn-underlined" type="button" id="add-deductions"><i class="os-icon os-icon-ui-22"></i><span>Add deductions</span></button>
							</div>
							<div id="deductions">

							</div>
						</div>
					</div>
					<div class="modal-footer">
				      	<button class="btn btn-secondary" data-dismiss="modal" type="button"> Close</button>
				      	<button class="btn btn-primary" type="submit"> Save</button>
				    </div>
				</form>
			</div>
		</div>
	</div>
</div>
<div aria-hidden="true" aria-labelledby="addEarningModal" class="modal fade" id="addEarningModal" role="dialog" tabindex="-1">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="addOfferModal">
				  	Add Earning
				</h5>
				<button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> &times;</span></button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-sm-12">
					  	<div class="form-group">
					    	<label for=""> Motif</label>
					    	<input class="form-control" placeholder="Name earning" type="text" id="earning">
					  	</div>
					</div>
					<div class="col-sm-12">
					  	<div class="form-group">
					    	<label for=""> Amount</label>
					    	<input class="form-control" placeholder="amount" type="text" id="earning-amount">
					  	</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" data-dismiss="modal" type="button" id="close-earning"> Close</button>
				<button class="btn btn-primary" type="button" onclick="addEarning()"> Save</button>
			</div>
		</div>
	</div>
</div>
<div aria-hidden="true" aria-labelledby="addDeductionModal" class="modal fade" id="addDeductionModal" role="dialog" tabindex="-1">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="addOfferModal">
				  	Add Deduction
				</h5>
				<button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> &times;</span></button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-sm-12">
					  	<div class="form-group">
					    	<label for=""> Motif</label>
					    	<input class="form-control" placeholder="Name deduction" type="text" id="deduction">
					  	</div>
					</div>
					<div class="col-sm-12">
					  	<div class="form-group">
					    	<label for=""> Amount</label>
					    	<input class="form-control" placeholder="amount" type="text" id="deduction-amount">
					  	</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" data-dismiss="modal" type="button" id="close-deduction"> Close</button>
				<button class="btn btn-primary" type="button" onclick="addDeduction()"> Save</button>
			</div>
		</div>
	</div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('js/main_rentals.js?version=4.4.0') }}"></script>
<style>
	.modal {
		overflow: auto !important;
	}
	.select2 {
		width: 100% !important;
	}
	.schedule-payment{
		background-color: #EEF5FF;
		cursor: pointer;
	}
	.week-column {
		padding: 8px 7px;
		background: #EEF5FF;
		border: 1px solid #AEC8FF;
		margin-bottom: 15px;
	}
	.week-width {
		max-width: 1px;
	}
	.week-active {
		background: #0064d5;
	}
	.week-first {
		border-top-left-radius: 5px;
		border-bottom-left-radius: 5px;
	}
	.week-last {
		border-top-right-radius: 5px;
		border-bottom-right-radius: 5px;
	}
	.month-column {
		padding: 8px 34px;
		background: #EEF5FF;
		border: 1px solid #AEC8FF;
		margin-bottom: 15px;
	}
	.month-width {
		max-width: 1px;
	}
	.month-active {
		background: #0064d5;
	}
	.month-first {
		border-top-left-radius: 5px;
		border-bottom-left-radius: 5px;
	}
	.month-last {
		border-top-right-radius: 5px;
		border-bottom-right-radius: 5px;
	}
</style>
<script>
	var members = [];
	@forelse($members as $member)
		members.push({ id: {{ $member->id }}, text: '<div> @if ($member->media_id)<img src="{{ asset('storage/'.$member->media->reference) }}" width="30px" height="30px">{{ $member->first_name }} {{ $member->last_name }} @else <div class="avatar" style="border-radius: 50%;">{{ substr($member->first_name, 0, 1).substr($member->last_name, 0, 1) }}</div>{{ $member->first_name }} {{ $member->last_name }} @endif </div>' });
	@empty
	@endforelse
	$(".members-select").select2({
		data: members,
		templateResult: function (d) { return $(d.text); },
		templateSelection: function (d) { return $(d.text); },
	});
	$('#add-earnings').on('click', function(){

	});
	$('#add-deductions').on('click', function(){

	});
	function addEarning(){
		$('#earnings').append('<div class="form-group"><label> '+$('#earning').val()+'</label><input class="form-control" placeholder="Enter question" type="text" name="earnings[]" value="'+$('#earning-amount').val()+'"><input value="'+$('#earning').val()+'" type="hidden" name="motif_earnings[]"></div>')
		$('#close-earning').trigger("click");
	}
	function addDeduction(){
		$('#deductions').append('<div class="form-group"><label> '+$('#deduction').val()+'</label><input class="form-control" placeholder="Enter question" type="text" name="deductions[]" value="'+$('#deduction-amount').val()+'"><input value="'+$('#deduction').val()+'" type="hidden" name="motif_deductions[]"></div>')
		$('#close-deduction').trigger("click");
	}

	//Filter weeks and months
	$(document).ready(function(){
		$('.month-first').trigger('click');
	});
	//Return start week based on yeat and number of week in year
	function getDateOfISOWeek(week, year) {
		var simple = new Date(year, 0, 1 + (week - 1) * 7);
		var dow = simple.getDay();
		var ISOweekStart = simple;
		if (dow <= 4)
		    ISOweekStart.setDate(simple.getDate() - simple.getDay() + 1);
		else
		    ISOweekStart.setDate(simple.getDate() + 8 - simple.getDay());
		return ISOweekStart;
	}
	Date.prototype.addDays = function(days) {
	    var date = new Date(this.valueOf());
	    date.setDate(date.getDate() + days);
	    return date;
	}
	$('.month-column').on('click', function(){
		var monthNumber = $(this).attr('month');
		var currentDate = new Date();
		var year = currentDate.getFullYear();
		var date = new Date(year,monthNumber,0);
		// $('#month').text(new Date(year,monthNumber,0).getDate());
		$('#selected-range').text('(Month '+monthNumber+': Ending '+date.toLocaleString('default', { weekday: 'long' })+', '+date.getDate()+' '+date.toLocaleString('default', { month: 'long' })+', '+year+')');
		$('#month').text('month '+monthNumber);
		$('.month-column').removeClass('month-active');
		$('.week-column').removeClass('week-active');
		$(this).addClass('month-active');
		var rental_start = moment(date).startOf('month');
		var rental_end = moment(date);
		$('input[name="daterange"]').daterangepicker({
		  startDate: rental_start,
		  endDate: rental_end,
		  locale: {
			format: 'MMM D, YYYY'
		  }
		});
	});
	$('.week-column').on('click', function(){
		var weekNumber = $(this).attr('week');
		var currentDate = new Date();
		var year = currentDate.getFullYear();
		var firstDay = new Date(getDateOfISOWeek(weekNumber,year));
		var lastDay = firstDay.addDays(6);
		$('#selected-range').text(firstDay+','+lastDay);
		$('.week-column').removeClass('week-active');
		$('.month-column').removeClass('month-active');
		$('#selected-range').text('(Week '+weekNumber+': Starting '+firstDay.toLocaleString('default', { weekday: 'long' })+', '+firstDay.getDate()+' '+firstDay.toLocaleString('default', { month: 'long' })+', '+year+' | Ending '+lastDay.toLocaleString('default', { weekday: 'long' })+', '+lastDay.getDate()+' '+lastDay.toLocaleString('default', { month: 'long' })+', '+year+')');
		$(this).addClass('week-active');
	})
</script>
@endsection
