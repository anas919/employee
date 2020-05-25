@extends('layouts.app')

@section('title')
 Payslip ({{$payslip->number}})
@endsection
@section('content')
<div class="content-box">
	<div class="row">
		<div class="col-sm-12">
			<!--START - Recent Ticket Comments-->
			<div class="element-wrapper">
				<div class="invoice-w">
					<div class="infos">
						<div class="info-1">
							<div class="invoice-logo-w">
								<img alt="" src="img/logo2.png">
							</div>
							<div class="company-name">
								{{$organization->name}}
							</div>
							<div class="company-address">
								{{$organization->address}}<br/>{{$organization->country->country}}
							</div>
							<div class="company-extra">
								tel. {{$organization->phone}}
							</div>
						</div>
						<div class="info-2" style="padding-top: 0px;">
							<div class="company-name">
								PAYSLIP #{{$payslip->number}}
							</div>
							<div class="company-address">
								Salary Month: {{(new DateTime($payslip->end_date))->format("M, Y")}}
							</div>
						</div>
					</div>
					<div class="invoice-heading row" style="margin-top: 3rem;">
						<div class="user-w with-status status-green">
							<div class="user-avatar-w">
							  <div class="user-avatar">
								<img alt="" src="img/avatar1.jpg">
							  </div>
							</div>
							<div class="user-name">
							  <h3 class="user-title">
								{{$payslip->user->first_name.$payslip->user->last_name}}
							  </h3>
							  <div class="user-role">
								@if($payslip->user->job){{$payslip->user->job->title}}@endif<br><span>@if($payslip->user->number)Employee ID: {{$payslip->user->number}}@endif</span>
							  </div>
							</div>
						</div>
					</div>
					<div class="invoice-body row">
						@if(count($payslip->earnings))
						<div class="earnings-table col-md-6">
							<table class="table table-compact smaller text-faded mb-0">
								<thead>
								  <tr>
									<th>
									  Earning
									</th>
									<th class="text-right">
									  Amount
									</th>
								  </tr>
								</thead>
								<tbody>
									@foreach($payslip->earnings as $earning)
									<tr>
										<td>
											{{$earning->description}}
										</td>
										<td class="text-right">
											${{$earning->amount}}
										</td>
									</tr>
									@endforeach
								</tbody>
								<tfoot>
									<tr>
										<td style="border-top: 3px solid #333;font-weight: bolder;">
											Total Earnings
										</td>
										<td class="text-right" colspan="2" style="border-top: 3px solid #333;font-weight: bolder;">
											${{ $payslip->earnings->sum('amount') }}
										</td>
									</tr>
								</tfoot>
							</table>
						</div>
						@endif
						@if(count($payslip->deductions))
						<div class="deductions-table col-md-6">
							<table class="table table-compact smaller text-faded mb-0">
								<thead>
								  <tr>
									<th>
									  Deduction
									</th>
									<th class="text-right">
									  Amount
									</th>
								  </tr>
								</thead>
								<tbody>
									@foreach($payslip->deductions as $deduction)
									<tr>
										<td>
											{{$deduction->description}}
										</td>
										<td class="text-right">
											${{$deduction->amount}}
										</td>
									</tr>
									@endforeach
								</tbody>
								<tfoot>
									<tr>
										<td style="border-top: 3px solid #333;font-weight: bolder;">
											Total Deductions
										</td>
										<td class="text-right" colspan="2" style="border-top: 3px solid #333;font-weight: bolder;">
											${{ $payslip->deductions->sum('amount') }}
										</td>
									</tr>
								</tfoot>
							</table>
						</div>
						@endif
						<div class="total-payslip text-right col-md-12" style="margin-top: 20px; font-weight: bolder;">
							<div class="">
								Total Earnings: ${{ $payslip->earnings->sum('amount') }} <br> Total Deductions: ${{ $payslip->deductions->sum('amount') }}
							</div>
							<div class="">
								Net Salary ${{ $payslip->amount + ($payslip->earnings->sum('amount')-$payslip->deductions->sum('amount')) }}
							</div>
						</div>
					</div>
					<div class="invoice-footer">
						<div class="invoice-logo">
							<img alt="" src="img/logo.png"><span>{{$organization->name}}</span>
						</div>
						<div class="invoice-info">
							<span>hello@paper.inc</span><span>{{$organization->phone}}</span>
						</div>
					</div>
				</div>
			</div>
			<!--END - Recent Ticket Comments-->
		</div>
	</div>
</div>
@endsection
@section('scripts')

@endsection
