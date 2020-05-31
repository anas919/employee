@extends('layouts.app')

@section('title')
 Time Off
@endsection
@section('content')
<div class="content-box">
	<div class="row">
		<div class="col-sm-12">
	      	<!--START - Recent Ticket Comments-->
	      	<div class="element-wrapper">
	      		@if(!count($policies))
	            <div class="text-center">
					<img src="{{ asset('new-res/respect-steps.svg') }}" alt="" width="420" height="360">
					<h2 class="display-4">
			        	No Time-Off Policy
				    </h2>
				    <h5>
				        <small class="text-muted">To let members request a time off you must specify a policy (you can add more than one policy).</small>
				    </h5>
				    <button class="btn btn-sm btn-primary btn-upper" data-target="#addPolicyModal" data-toggle="modal" type="button"><i class="os-icon os-icon-ui-22"></i><span>Add Policy</span></button>
	            </div>
	            @endif
	            @if(count($policies))
	            @if(Auth::user()->hasPermission('request_timeoffs'))
	      		<div class="element-actions">
	      			<div class="form-inline justify-content-sm-end">
	      				<button class="btn btn-sm btn-primary btn-upper" data-target="#requestTimeOffModal" data-toggle="modal" type="button"><i class="os-icon os-icon-ui-22"></i><span>Request Time Off</span></button>
	      			</div>
	      		</div>
	      		@endif
	            <h6 class="element-header">
	              	Time Off Requests
	            </h6>
	            <div class="control-header">
	                <div class="row align-items-center">
	              		<div class="form-group col-4 col-lg-4">
					        <select class="form-control">
					              <option>
					                All (0)
					              </option>
					              <option>
					                Submitted (0)
					              </option>
					              <option>
					                Approved (0)
					              </option>
					              <option>
					                Denied (0)
					              </option>
					        </select>
	              		</div>
	              		<div class="form-group col-4 col-lg-4">
	                		<select class="form-control members-filter-select" multiple="true"></select>
	              		</div>
	                  	<div class="col-4 col-lg-4 text-right">
	                    	<a class="btn btn-sm btn-primary btn-upper" href="#"><i class="os-icon os-icon-ui-37"></i><span>Filter</span></a>
	                  	</div>
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
										Member
									</th>
									<th>
										Policy
									</th>
									<th>
										Start
									</th>
									<th>
										End
									</th>
									<th>
										Days Requested
									</th>
									<th>
										Requested On
									</th>
									<th>
										Status
									</th>
									<th>
										Actions
									</th>
								</tr>
							</thead>
							<tbody>
								@forelse($timeoffs as $timeoff)
								<tr>
									<td class="text-center" style="display: inline-flex;">
										<div class="form-check" style="margin-top: auto;">
											<label>
												<input type="checkbox" name="check"> <span class="label-text"></span>
											</label>
										</div>
									</td>
									<td>
										<div class="cell-image-list">
											@if($timeoff->member->media_id)
												<div class="cell-img">
													<div class="user-with-avatar">
														<img alt="" src="{{ asset('storage/'.$timeoff->member->media->reference) }}">
													</div>
												</div>
											@else
												<div class="cell-img avatar">
													{{ substr($timeoff->member->first_name, 0, 1).substr($timeoff->member->last_name, 0, 1)}}
												</div>
											@endif
										</div>
									</td>
									<td>
										<div class="smaller lighter">
										  	{{ $timeoff->policy->name }}
										</div>
									</td>
									<td>
										<span class="smaller lighter">{{ (new DateTime($timeoff->start_date))->format('M d,Y') }}</span>
									</td>
									<td>
										<span class="smaller lighter">{{ (new DateTime($timeoff->end_date))->format('M d,Y') }}</span>
									</td>
									<td>
										{{ (new DateTime($timeoff->end_date))->diff((new DateTime($timeoff->start_date)))->format("%a") }}
									</td>
									<td>
										<span class="smaller lighter">{{ (new DateTime($timeoff->created_at))->format('M d,Y') }}</span>
									</td>
									<td class="nowrap">
										@if($timeoff->status == 'approved') <i class="badge badge-success-inverted">Approved</i> @elseif($timeoff->status == 'submitted') <i class="badge badge-warning-inverted">Submitted</i> @else <i class="badge badge-danger-inverted">Denied</i> @endif
									</td>
									<td class="row-actions">
										<div class="btn-group mr-1 mb-1">
											<button aria-expanded="false" aria-haspopup="true" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" id="dropdownMenuButton1" type="button">Actions</button>
											<div aria-labelledby="dropdownMenuButton1" class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 30px, 0px); top: 0px; left: 0px; will-change: transform;">
												<button class="dropdown-item"><i class="os-icon os-icon-ui-15"></i> Delete</button>
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
				@endif
			</div>
			<!--END - Recent Ticket Comments-->
		</div>
	</div>
</div>
<div aria-hidden="true" aria-labelledby="requestTimeOffModal" class="modal fade" id="requestTimeOffModal" role="dialog" tabindex="-1">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">
				  	Request Time Off
				</h5>
				<button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> &times;</span></button>
			</div>
			<div class="modal-body">
				<form action="{{ route('add-timeoff', Auth::user()->subdomain) }}" method="POST">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
						        <div for="">
						        	<div class="row">
						        		<div class="col-6">
						        			Members
						        		</div>
						        		<div class="col-6 text-right">
						        			<a href="">Select All</a>
						        		</div>
						        	</div>
						       	</div>
					          	<select class="form-control timeoff-members-select" multiple="true" name="timeoff_members[]"></select>
						    </div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
						        <label for="">
						        	Policy
						       	</label>
					          	<select class="form-control timeoff-policies-select" multiple="true" name="policy"></select>
						    </div>
						</div>
						<div class="col-sm-6">
	            			<div class="form-group">
			                  	<label for="">Start Date</label>
			                  	<div class="date-input">
			                    	<input class="single-daterange form-control" placeholder="dd/mm/yyy" type="text" value="" name="start_date">
			                  	</div>
				            </div>
	          			</div>
	          			<div class="col-sm-6">
	            			<div class="form-group">
			                  	<label for="">End Date</label>
			                  	<div class="date-input">
			                    	<input class="single-daterange form-control" placeholder="dd/mm/yyy" type="text" value="" name="end_date">
			                  	</div>
				            </div>
	          			</div>
						<div class="col-sm-12">
							<div class="form-group">
	              				<label for="">Reason</label>
	              				<textarea class="form-control" name="reason"></textarea>
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
<div aria-hidden="true" aria-labelledby="addPolicyModal" class="modal fade" id="addPolicyModal" role="dialog" tabindex="-1">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">
				  	Create Time Off Policy
				</h5>
				<button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> &times;</span></button>
			</div>
			<div class="modal-body">
				<form action="{{ route('add-policy', Auth::user()->subdomain) }}" method="POST">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="row">
						<div class="col-sm-12">
						  	<div class="form-group">
						    	<label for=""> Policy Name</label>
						    	<input class="form-control" placeholder="Policy Name" type="text" name="name">
						  	</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
						        <div for="">
						        	<div class="row">
						        		<div class="col-6">
						        			Members
						        		</div>
						        		<div class="col-6 text-right">
						        			<a href="">Select All</a>
						        		</div>
						        	</div>
						       	</div>
					          	<select class="form-control policy-members-select" multiple="true" name="policy_members[]"></select>
						    </div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
	              				<label for="">Amount Accrued</label>
	              				<div class="input-group">
									<input class="form-control" type="number" value="0" name="amount">
									<div class="input-group-append">
										<div class="input-group-text">
											Days per year
										</div>
									</div>
								</div>
	            			</div>
						</div>
						<div class="col-sm-6">

						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<div class="form-check">
									<label>
										<input type="checkbox" name="approval" checked="checked"> <span class="label-text">Requires approval</span>
									</label>
								</div>
						    </div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<div class="form-check">
									<label>
										<input type="checkbox" name="timeoff_paid" checked="checked"> <span class="label-text">Time Off Paid</span>
									</label>
								</div>
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
@endsection
@section('scripts')
<style>
	.select2 {
		width: 100% !important;
	}
</style>
<script>
	var members = [];
	var policies = [];
	@forelse($members as $member)
		members.push({ id: {{ $member->id }}, text: '<div> @if ($member->media_id)<img src="{{ asset('storage/'.$member->media->reference) }}" width="30px" height="30px">{{ $member->first_name }} {{ $member->last_name }} @else <div class="avatar" style="border-radius: 50%;">{{ substr($member->first_name, 0, 1).substr($member->last_name, 0, 1) }}</div>{{ $member->first_name }} {{ $member->last_name }} @endif </div>' });
	@empty
	@endforelse
	@forelse($policies as $policy)
		policies.push({ id: {{ $policy->id }}, text: '<div>{{ $policy->name }}</div>' });
	@empty
	@endforelse
	$(".policy-members-select").select2({
		maximumSelectionLength: 1,
		data: members,
		templateResult: function (d) { return $(d.text); },
		templateSelection: function (d) { return $(d.text); },
	});
	$(".timeoff-members-select").select2({
		data: members,
		templateResult: function (d) { return $(d.text); },
		templateSelection: function (d) { return $(d.text); },
	});
	$(".timeoff-policies-select").select2({
		data: policies,
		templateResult: function (d) { return $(d.text); },
		templateSelection: function (d) { return $(d.text); },
	});
	$(".members-filter-select").select2({
		data: members,
		templateResult: function (d) { return $(d.text); },
		templateSelection: function (d) { return $(d.text); },
	});
</script>
@endsection
