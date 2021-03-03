<div class="row">
	<div class="col-sm-12">
		<div class="element-wrapper">
			<h6 class="element-header">
				Timesheets (Admin)
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
			</div>
			<div class="element-box">
				<div class="table-responsive">
					<table id="timesheets" width="100%" class="table table-striped table-lightfont">
						<thead>
							<tr>
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
								{{-- <th>
									Status(permission)
								</th>
								<th>
									Actions(permission)
								</th> --}}
							</tr>
						</thead>
						<tbody>
							@if(count($timesheets)>1)
							<tr>
								<td>
									{{(new DateTime($first_timesheet->start_time))->format('M d,Y')}}
								</td>
								<td>
									{{(new DateTime($first_timesheet->start_time))->format('g:ia')}}
								</td>
								<td>
									{{(new DateTime($last_timesheet->end_time))->format('g:ia')}}
								</td>
								<td>
									{{$worked}} hrs
								</td>
								<td>
									{{$breaks}} hrs
								</td>
								{{-- <td>
									@if($first_timesheet->status == 'approved') <i class="badge badge-success-inverted">Approved</i> @elseif($first_timesheet->status == 'sent') <i class="badge badge-warning-inverted">Sent</i>@endif
								</td>
								 <td>
									<div class="btn-group mr-1 mb-1">
										<button aria-expanded="false" aria-haspopup="true" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" id="dropdownMenuButton1" type="button">Actions</button>
										<div aria-labelledby="dropdownMenuButton1" class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 30px, 0px); top: 0px; left: 0px; will-change: transform;">
											// <button class="dropdown-item" onclick="deleteTimesheet({{$first_timesheet->id}})"><i class="os-icon os-icon-ui-15"></i> Delete</button>
										</div>
									</div>
								</td> --}}
							</tr>
							@endif
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>