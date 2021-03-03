<div class="table-responsive">
	<table id="dataTable1" width="100%" class="table table-striped table-lightfont">
		<thead>
			<tr>
				<td data-target="#schedulePaymentModal" data-toggle="modal" class="schedule-payment" colspan="8">
					Click here to schedule payment on <span id="month"></span>
				</td>
			</tr>
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