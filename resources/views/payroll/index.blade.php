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
						<a class="btn btn-sm btn-primary btn-upper" href="#"><i class="os-icon os-icon-ui-22"></i><span>Add Salary</span></a>
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
									<th>
										Actions
									</th>
								</tr>
							</thead>
							<tbody>
								@forelse($members as $member)
								<tr>
									<td class="text-center" style="display: inline-flex;">
										<div class="form-check" style="margin-top: auto;">
											<label>
												<input type="checkbox" name="check"> <span class="label-text"></span>
											</label>
										</div>
										<div class="user-with-avatar">
											@if($member->media_id)
										  		<img alt="" src="{{ asset('storage/'.$member->media->reference) }}">
										  	@else
										  		<div class="avatar" style="border-radius: 50%;">{{ substr($member->first_name, 0, 1).substr($member->last_name, 0, 1)}}</div>
										  	@endif
										</div>
									</td>
									<td>
									  	<div>
									  		<span>{{ $member->first_name }} {{$member->last_name }}</span><span class="smaller"><strong>&nbsp;(User)</strong></span><a class="danger small-edit" href="{{ route('edit',  ['account' => Auth::user()->subdomain, 'member_id' => $member->id]) }}"><i class="os-icon os-icon-pencil-2"></i></a>
									  	</div>
									  	<div class="smaller">
									  		{{ $member->email }}
									  	</div>
									</td>
									<td>
										<span>300$</span>
									</td>
									<td>
										<span>3$</span>
									</td>
									<td>
										<span>300$</span>
									</td>
									<td>
										<span>15$</span>
									</td>
									<td>
										<span>282$</span>
									</td>
									<td>
										<button aria-expanded="false" aria-haspopup="true" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" id="payslipMenuButton1" type="button">Payslip</button>
										<div aria-labelledby="payslipMenuButton1" class="dropdown-menu">
											<a class="dropdown-item" href="#"> PDF</a>
											<a class="dropdown-item" href="payroll-payslip.html"> View</a>
											<a class="dropdown-item" href="#"> Print</a>
											<a class="dropdown-item" href="#"> Send</a>
										</div>
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
								<tr>
									<td class="schedule-payment" colspan="9">Click here to schedule payment</td>
									<td style="display: none;"></td>
									<td style="display: none;"></td>
									<td style="display: none;"></td>
									<td style="display: none;"></td>
									<td style="display: none;"></td>
									<td style="display: none;"></td>
									<td style="display: none;"></td>
									<td style="display: none;"></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('scripts')
<style>
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
		$('.month-column').removeClass('month-active');
		$('.week-column').removeClass('week-active');
		$(this).addClass('month-active');
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
