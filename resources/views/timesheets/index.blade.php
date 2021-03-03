@extends('layouts.app')

@section('title')
 Timesheets
@endsection

@section('content')
<div class="content-box">
	<div class="row">
		<div class="col-sm-12">
			<div class="element-wrapper">
				<h6 class="element-header">
					Timesheets
				</h6>
				<div class="control-header">
					<form method="POST" action="{{ route('search-timesheet',Auth::user()->subdomain) }}">
						<div class="row align-items-center">
							<div class="col-10 col-lg-10 row">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<div class="form-group col-sm-5 row">
									<label for="" class="col-sm-3 col-form-label">From:</label>
									<div class="col-sm-9">
										<div class="date-input">
											<input class="start-time form-control" placeholder="From" type="text" name="start_date" @if($start_date) value="{{$start_date}}" @endif>
										</div>
									</div>
								</div>
								<div class="form-group col-sm-5 row">
									<label for="" class="col-sm-2 col-form-label">To:</label>
									<div class="col-sm-10">
										<div class="date-input">
											<input class="end-time form-control" placeholder="To" type="text" name="end_date" @if($end_date) value="{{$end_date}}" @endif>
										</div>
									</div>
								</div>
							</div>
							<div class="col-2 col-lg-2 text-right">
								<button class="btn btn-sm btn-primary btn-upper" type="submit"><i class="os-icon os-icon-ui-37"></i><span>Filter</span></button>
							</div>
						</div>
					</form>
				</div>
				<div class="element-box">
					<div class="table-responsive">
						<table id="timesheets" width="100%" class="table table-striped table-lightfont">
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
										Date
									</th>
									<th>
										Punch In
									</th>
									<th>
										Punch Out
									</th>
									<th>
										Hours worked
									</th>
									<th>
										Breaks
									</th>
									<th>
										Actions(permission)
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
											@if($member->member->media_id)
										  		<img alt="" src="{{ asset('storage/'.$member->member->media->reference) }}">
										  	@else
										  		<div class="avatar" style="border-radius: 50%;">{{ substr($member->member->first_name, 0, 1).substr($member->member->last_name, 0, 1)}}</div>
										  	@endif
										</div>
									</td>
									<td>
									  	<div>
									  		<span>{{ $member->member->first_name }} {{$member->member->last_name }}</span>
									  	</div>
									  	<div class="smaller">
									  		{{ $member->member->email }}
									  	</div>
									</td>
									{{-- <td id="date">
										{{(new DateTime($start_date))->format('M d,Y')}}-{{(new DateTime($end_date))->format('M d,Y')}}
									</td> --}}
									<td>
										@if($member->first_punch)
										{{(new DateTime($member->first_punch))->format('g:ia')}}
										@endif
									</td>
									<td>
										@if($member->last_punch)
										{{(new DateTime($member->last_punch))->format('g:ia')}}
										@endif
									</td>
									<td>
										{{$member->worked}} hrs
									</td>
									<td>
										{{$member->breaks}} hrs
									</td>
									 <td>
										<div class="btn-group mr-1 mb-1">
											<button aria-expanded="false" aria-haspopup="true" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" id="dropdownMenuButton1" type="button">Actions</button>
											<div aria-labelledby="dropdownMenuButton1" class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 30px, 0px); top: 0px; left: 0px; will-change: transform;">
												<button class="dropdown-item" onclick="deleteTimesheet({{$member->timesheet_id}})"><i class="os-icon os-icon-ui-15"></i> Delete</button>
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
@endsection
@section('scripts')
<script type="text/javascript">
	if ($('#timesheets').length) {
	    $('#timesheets').DataTable();
	}
	$('input.start-time').daterangepicker({
        "singleDatePicker": true,
        "showDropdowns": true,
        "locale": {
          format: 'DD-MM-YYYY'
        }
    });
    $('input.end-time').daterangepicker({
        "singleDatePicker": true,
        "showDropdowns": true,
        "locale": {
          format: 'DD-MM-YYYY'
        }
    });
</script>
@endsection