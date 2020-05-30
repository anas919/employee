@extends('layouts.app')

@section('title')
 Members
@endsection
@section('content')
<div class="content-box">
	<div class="row">
		<div class="col-sm-12">
          	<!--START - Recent Ticket Comments-->
          	<div class="element-wrapper">
          		<div class="element-actions">
          			<div class="form-inline justify-content-sm-end">
          				<button class="btn btn-sm btn-primary btn-upper" data-target="#inviteEmpModal" data-toggle="modal" type="button"><i class="os-icon os-icon-ui-22"></i><span>Invite Emlpoyee</span></button>
          				<button class="btn btn-sm btn-primary btn-upper" data-target="#addEmpModal" data-toggle="modal" type="button"><i class="os-icon os-icon-ui-22"></i><span>Add Emlpoyee</span></button>
          			</div>
          		</div>
                <h6 class="element-header">
                  	Members
                </h6>
                <div class="control-header">
	                <form action="{{ route('search',Auth::user()->subdomain) }}" method="GET" class="row align-items-center" id="searchForm">
	                	<!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
	                  	<div class="col-8 col-lg-7">
	                    	<div class="form-inline">
	                      		<div class="form-group mr-4">
							        <select class="form-control-sm" name="role" id="role">
										<option selected="" value="">
											Search by Role
										</option>
										@foreach($roles as $role)
											<option @if(isset($roleFilter) && $roleFilter==$role->id) selected="" @endif value="{{ $role->id }}">
								            	{{ $role->name }}
											</option>
										@endforeach
							        </select>
	                      		</div>
	                      		<div class="form-group d-none d-md-flex">
	                        		<select class="form-control-sm" name="status" id="status">
	                        			<option selected="" value="">
											Search by Status
										</option>
	                          			<option @if(isset($statusFilter) && $statusFilter=='full_time') selected="" @endif value="full_time">
	                            			Full Time
	                          			</option>
	                          			<option @if(isset($statusFilter) && $statusFilter=='part_time') selected="" @endif value="part_time">
	                          				Part Time
	                          			</option>
	                          			<option @if(isset($statusFilter) && $statusFilter=='contractor') selected="" @endif value="contractor">
	                          				Contractor
	                          			</option>
	                        		</select>
	                      		</div>
	                    	</div>
	                  	</div>
	                  	<div class="col-4 col-lg-5 text-right">
	                    	<button type="submit" class="btn btn-sm btn-primary btn-upper"><i class="os-icon os-icon-ui-37"></i><span>Filter</span></button>
	                  	</div>
	                </form>
	            </div>
				<div class="element-box">
					<div class="table-responsive">
    					<table id="members" width="100%" class="table table-striped table-lightfont">
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
										Teams
									</th>
									<th>
										Tracking
									</th>
									<th>
										Status
									</th>
									<th>
										Actions
									</th>
								</tr>
							</thead>
							<tbody id="body-members">
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
										@if(count($member->memberteams))
										<div class="cell-image-list">
											@foreach($member->memberteams as $team)
											<div class="cell-img avatar" style=";border-radius: 50%;">
												{{ substr($team->name, 0, 3) }}
											</div>
											@endforeach
											{{-- <div class="cell-img-more">
											+ 5 more
											<a class="danger" href="#"><i class="os-icon os-icon-pencil-2"></i></a>
											</div> --}}
										</div>
										@else
										No Teams
										@endif
										@if(count($member->leaderteams))
										<div class="cell-image-list">
											@foreach($member->leaderteams as $team)
											<div class="cell-img avatar" style=";border-radius: 50%;">
												{{ substr($team->name, 0, 3) }}
											</div>
											@endforeach
											{{-- <div class="cell-img-more">
											+ 5 more
											<a class="danger" href="#"><i class="os-icon os-icon-pencil-2"></i></a>
											</div> --}}
										</div>
										@endif
									</td>
									<td class="text-center">
										<a class="badge badge-success-inverted" href="">Enabled</a>
									</td>
									<td class="nowrap">
										<span class="status-pill smaller green"></span><span>Active</span>
									</td>
									<td class="row-actions">
										<div class="btn-group mr-1 mb-1">
											<button aria-expanded="false" aria-haspopup="true" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" id="dropdownMenuButton1" type="button">Actions</button>
											<div aria-labelledby="dropdownMenuButton1" class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 30px, 0px); top: 0px; left: 0px; will-change: transform;">
												<a class="dropdown-item" href="{{route('view-activities',['account'=>Auth::user()->subdomain,'member_id'=>$member->id])}}"><i class="os-icon os-icon-documents-03"></i> View Activities</a><a class="dropdown-item" href="#"><i class="os-icon os-icon-ui-15"></i> Another action</a><a class="dropdown-item" href="#"><i class="os-icon os-icon-ui-15"></i> Delete</a>
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
<div aria-hidden="true" class="onboarding-modal modal fade animated" id="addEmpModal" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-centered" role="document">
      	<div class="modal-content text-center">
      		<form action="{{ route('add', Auth::user()->subdomain) }}" enctype="multipart/form-data" method="POST">
	      		<input type="hidden" name="_token" value="{{ csrf_token() }}">
	        	<button aria-label="Close" class="close" data-dismiss="modal" type="button">
	        		<span class="close-label">Cancel</span>
	        		<span class="os-icon os-icon-close"></span>
	        	</button>
	        	<div class="onboarding-slider-w">
	          		<div class="onboarding-slide">
	            		<div class="onboarding-media">
	              			<img alt="" src="img/bigicon5.png" width="150px">
	            		</div>
	            		<div class="onboarding-content with-gradient">
	              			<h4 class="onboarding-title">
	                			Personal Information
	         		 		</h4>
	              			<div class="onboarding-text">
	                			General information about the employee.
	              			</div>
                			<div class="row">
                  				<div class="col-sm-4">
                    				<div class="form-group">
                      					<label for="">Employee N°</label>
                      					<input class="form-control" type="text" name="number" value="" required>
                    				</div>
                  				</div>
                  				<div class="col-sm-4">
                    				<div class="form-group">
                      					<label for="">First Name</label>
                      					<input class="form-control" type="text" name="first_name" value="" required="">
                    				</div>
                  				</div>
                  				<div class="col-sm-4">
                    				<div class="form-group">
                      					<label for="">Last Name</label>
                      					<input class="form-control" type="text" name="last_name" value="" required="">
                    				</div>
                  				</div>
                      			<div class="col-sm-6">
                        			<div class="form-group">
                          				<label for="">Email</label>
                          				<input class="form-control" type="text" name="email" value="">
                        			</div>
                      			</div>
                  				<div class="col-sm-6">
                    				<div class="form-group">
					                  <label for="">Birth Date</label>
					                  <div class="date-input">
					                    <input class="single-daterange form-control" placeholder="dd/mm/yyy" type="text" name="birth_date" value="04/12/1978">
					                  </div>
					                </div>
                  				</div>
                  				<div class="col-sm-6">
                    				<div class="form-group">
                      					<label for="">Gender</label>
                      					<select class="form-control" name="gender">
				                            <option value="m">
				                              	Male
				                            </option>
				                            <option value="f">
				                              	Female
				                            </option>
                      					</select>
                    				</div>
                  				</div>
                  				<div class="col-sm-6">
                    				<div class="form-group">
                      					<label for="">Marital Status</label>
                      					<select class="form-control" name="marital_status">
				                            <option value="single">
				                              	Single
				                            </option>
				                            <option value="married">
				                              	Married
				                            </option>
                      					</select>
                    				</div>
                  				</div>
                			</div>
	            		</div>
	          		</div>
	          		<div class="onboarding-slide">
	            		<div class="onboarding-media">
	              			<img alt="" src="img/bigicon6.png" width="150px">
	            		</div>
		                <div class="onboarding-content with-gradient">
	              			<h4 class="onboarding-title">
	                			Contact
	              			</h4>
	          				<div class="onboarding-text">
	                			Contact Information on Employee.
	              			</div>
                  			<div class="row">
                    			<div class="col-sm-12">
                        			<div class="form-group">
                          				<label for="">Address</label>
                          				<textarea class="form-control" name="address"></textarea>
                        			</div>
                      			</div>
                      			<div class="col-sm-4">
                        			<div class="form-group">
                          				<label for="">City</label>
                          				<input class="form-control" type="text" name="city" value="">
                        			</div>
                      			</div>
                      			<div class="col-sm-4">
                        			<div class="form-group">
                          				<label for="">Province</label>
                          				<input class="form-control" type="text" name="province" value="">
                        			</div>
                      			</div>
                      			<div class="col-sm-4">
                        			<div class="form-group">
                          				<label for="">Postal Code</label>
                          				<input class="form-control" type="text" name="postal_code" value="">
                        			</div>
                      			</div>
                      			<div class="col-sm-6">
                        			<div class="form-group">
                      					<label for="">Country</label>
                      					<select class="form-control" name="country">
                      						@if($countries && $user->country)
								                @foreach($countries as $country)
								                <option value="{{ $country->id }}" @if($user->country->id == $country->id)selected="selected"@endif>{{ ucfirst($country->country) }} ({{ strtoupper($country->code) }})</option>
								                @endforeach
								            @elseif($countries)
								                @foreach($countries as $country)
								                <option value="{{ $country->id }}">{{ ucfirst($country->country) }} ({{ strtoupper($country->code) }})</option>
								                @endforeach
								            @endif
                      					</select>
                    				</div>
                      			</div>
                      			<div class="col-sm-6">
                        			<div class="form-group">
                          				<label for="">Phone Number</label>
                          				<input class="form-control" type="text" name="phone" value="">
                        			</div>
                      			</div>
                  			</div>
	            		</div>
	          		</div>
	          		<div class="onboarding-slide">
	            		<div class="onboarding-media">
	              			<img alt="" src="img/bigicon6.png" width="150px">
	            		</div>
		                <div class="onboarding-content with-gradient">
	              			<h4 class="onboarding-title">
								Payment
							</h4>
							<div class="onboarding-text">
								Here you can specify compensation and payment details.
							</div>
	                  			<div class="row">
	                  				<div class="col-sm-6">
	                        			<div class="form-group">
	                      					<label for="">Pay Schedule</label>
	                      					<select class="form-control" name="paymentschedule">
					                            @if($paymentschedules && $user->paymentschedule)
									                @foreach($paymentschedules as $paymentschedule)
									                <option value="{{ $paymentschedule->id }}" @if($user->paymentschedule->id == $paymentschedule->id)selected="selected"@endif>{{ ucfirst($paymentschedule->pay_schedule) }}</option>
									                @endforeach
									            @elseif($paymentschedules)
									                @foreach($paymentschedules as $paymentschedule)
									                <option value="{{ $paymentschedule->id }}">{{ ucfirst($paymentschedule->pay_schedule) }}</option>
									                @endforeach
									            @endif
	                      					</select>
	                    				</div>
	                      			</div>
	                      			<div class="col-sm-6">
	                        			<div class="form-group">
	                      					<label for="">Pay based on </label>
	                      					<select class="form-control" name="paymentrate">
	                      						@if($paymentrates && $user->paymentrate)
									                @foreach($paymentrates as $paymentrate)
									                <option value="{{ $paymentrate->id }}" @if($user->paymentrate->id == $paymentrate->id)selected="selected"@endif>{{ ucfirst($paymentrate->pay_rate) }}</option>
									                @endforeach
									            @elseif($paymentrates)
									                @foreach($paymentrates as $paymentrate)
									                <option value="{{ $paymentrate->id }}">{{ ucfirst($paymentrate->pay_rate) }}</option>
									                @endforeach
									            @endif
	                      					</select>
	                    				</div>
	                      			</div>
	                    			<div class="col-sm-5">
	                        			<div class="form-group">
	                          				<label for="">Pay Rate(js work)</label>
	                          				<div class="input-group mb-2 mr-sm-2 mb-sm-0">
												<input class="form-control" placeholder="Enter Amount..." type="text" value="0">
												<div class="input-group-append">
													<div class="input-group-text">
													USD
													</div>
												</div>
											</div>
	                        			</div>
	                      			</div>
	                      			<div class="col-sm-2">
	                      				<button style="padding-bottom: 17px" class="slick-next slick-arrow" aria-label="Next" type="button"></button>
	                      			</div>
	                      			<div class="col-sm-5">
	                        			<div class="form-group">
	                          				<label for="">Annual Salary</label>
	                          				<div class="input-group mb-2 mr-sm-2 mb-sm-0">
												<input class="form-control" placeholder="Enter Amount..." type="text" value="0">
												<div class="input-group-append">
													<div class="input-group-text">
													USD
													</div>
												</div>
											</div>
	                        			</div>
	                      			</div>
	                      			<div class="col-sm-12">
	                        			<div class="form-group">
	                      					<label for="">Payment method </label>
	                      					<select class="form-control" name="paymentmethod">
					                            @if($paymentmethods && $user->paymentmethod)
									                @foreach($paymentmethods as $paymentmethod)
									                <option value="{{ $paymentmethod->id }}" @if($user->paymentmethod->id == $paymentmethod->id)selected="selected"@endif>{{ ucfirst($paymentmethod->pay_method) }}</option>
									                @endforeach
									            @elseif($paymentmethods)
									                @foreach($paymentmethods as $paymentmethod)
									                <option value="{{ $paymentmethod->id }}">{{ ucfirst($paymentmethod->pay_method) }}</option>
									                @endforeach
									            @endif
	                      					</select>
	                    				</div>
	                      			</div>
	                  			</div>
	            		</div>
	          		</div>
	          		<div class="onboarding-slide">
		                <div class="onboarding-media">
		                  	<img alt="" src="img/bigicon2.png" width="150px">
		                </div>
		                <div class="onboarding-content with-gradient">
							<h4 class="onboarding-title">
								Detail
							</h4>
							<div class="onboarding-text">
								Here you can enter the employee details.
							</div>
							<div class="row">
								<div class="col-sm-6">
	                    			<div class="form-group">
					                  	<label for="">Hire Date</label>
					                  	<div class="date-input">
					                    	<input class="single-daterange form-control" placeholder="dd/mm/yyy" type="text" name="hire_date" value="04/12/1978">
					                  	</div>
						            </div>
	                  			</div>
	                  			<div class="col-sm-6">
	                    			<div class="form-group">
	                  					<label for="">Employee Status</label>
	                  					<select class="form-control" name="status">
				                            <option value="full_time">
				                              	Full-Time
				                            </option>
				                            <option value="part_time">
				                              	Part-Time
				                            </option>
				                            <option value="contractor">
				                              	Contractor
				                            </option>
	                  					</select>
	                				</div>
	                  			</div>
	                  			<div class="col-sm-6">
	                    			<div class="form-group">
	                  					<label for="">Job Title</label>
	                  					<select class="form-control" name="job">
	                  						@if($jobs && $user->job)
								                @foreach($jobs as $job)
								                <option value="{{ $job->id }}" @if($user->job->id == $job->id)selected="selected"@endif>{{ $job->title }}</option>
								                @endforeach
								            @elseif($jobs)
								                @foreach($jobs as $job)
								                <option value="{{ $job->id }}">{{ $job->title }}</option>
								                @endforeach
								            @endif
	                  					</select>
	                  					<button class="btn btn-link " data-target="#addJobModal" data-toggle="modal" type="button"></i>Add Job</button>
	                				</div>
	                  			</div>
	                  			<div class="col-sm-6">
	                    			<div class="form-group">
	                  					<label for="">Department</label>
	                  					<select class="form-control" name="department">
				                            @if($departments && $user->department)
								                @foreach($departments as $department)
								                <option value="{{ $department->id }}" @if($user->department->id == $department->id)selected="selected"@endif>{{ $department->name }}</option>
								                @endforeach
								            @elseif($departments)
								                @foreach($departments as $department)
								                <option value="{{ $department->id }}">{{ $department->name }}</option>
								                @endforeach
								            @endif
	                  					</select>
	                				</div>
	                  			</div>
	                  			<div class="col-sm-12">
	                      			<div class="form-group row">
									    <label class="col-sm-4 col-form-label">Self Service
									    	<button class="mr-2 mb-2 btn btn-link btn-sm btn-rounded" data-container="body" data-content="Enable access to employee self service means allow employee access to do things like request time off..." data-placement="right" data-toggle="popover" title="What self service mean" type="button"><i class="os-icon os-icon-info"></i></button>
									    </label>
									    <div class="col-sm-8">
											<div class="form-check">
												<label class="form-check-label"><input checked="" class="form-check-input" name="self_service_access" type="radio" value="y">On</label>
											</div>
											<div class="form-check">
												<label class="form-check-label"><input class="form-check-input" name="self_service_access" type="radio" value="n">Off</label>
											</div>
	                      				</div>
	                      			</div>
	                      		</div>
	                      		<div class="col-sm-6">
                        			<div class="form-group">
                          				<label for="">Picture</label>
                          				<input class="form-control" type="file" name="image">
                        			</div>
                      			</div>
	                      		<div class="col-sm-12">
	                    			<div class="form-group">
	                      				<label for="">Notes</label>
	                      				<textarea class="form-control" name="notes"></textarea>
	                    			</div>
	                  			</div>
	                  			<!-- <div class="col-sm-12 text-center">
	                  				<a href="#"><span style="display: inline-block;vertical-align: middle;border-bottom: 1px solid #047bf8;">Add Education</span></a>
	                  			</div>
	                  			<div class="col-sm-12 text-center">
	                  				<a href="#"><span style="display: inline-block;vertical-align: middle;border-bottom: 1px solid #047bf8;">Add Emergency Contact</span></a>
	                  			</div>
	                  			<div class="col-sm-12 text-center">
	                  				<a href="#"><span style="display: inline-block;vertical-align: middle;border-bottom: 1px solid #047bf8;">Add Visa Information</span></a>
	                  			</div> -->
	                			<button class="save-btn slick-arrow" type="submit" aria-label="Save" style="" aria-disabled="false">Save</button>
	                  		</div>
		                </div>
	          		</div>
	        	</div>
        	</form>
      	</div>
    </div>
</div>
<div aria-hidden="true" aria-labelledby="inviteEmpModal" class="modal fade" id="inviteEmpModal" role="dialog" tabindex="-1">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">
				  	Invite Employees
				</h5>
				<button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> &times;</span></button>
			</div>
			<div class="modal-body">
				<form action="{{ route('invite', Auth::user()->subdomain) }}" enctype="multipart/form-data" method="POST" id="inviteForm">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
						        <label for=""> Email (Each mail in separate line)</label>
								<textarea class="form-control" name="email" id="emails"></textarea>
						    </div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
						        <select class="form-control" name="role">
									@foreach($roles as $role)
										<option value="{{ $role->id }}">
							            	{{ $role->name }}
										</option>
									@endforeach
						        </select>
                      		</div>
						</div>
						<div class="col-sm-12">
				         	<div class="form-group">
				                <label for=""> Projects</label>
				              	<select class="form-control projects-select" multiple="true" name="projects[]"></select>
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
<style>
	.save-btn {
		right: 50px;
		border: none;
	    background-color: transparent;
	    font-weight: 500;
	    font-size: 0.9rem;
	    color: #046fdf;
	    bottom: 25px;
	    position: absolute;
	    z-index: 999;
	    cursor: pointer;
	    letter-spacing: 1px;
	}
	.edit-btn {
		background: none;
		color: #0356ad;
		border: none;
		padding: 0;
		font: inherit;
		cursor: pointer;
		outline: inherit;
		font-size: 0.63rem;
	}
	.edit-btn:hover {
		text-decoration: underline;
	}
	.select2 {
  		width: 100% !important;
 	}
</style>
@endsection
@section('scripts')
<script>
jQuery(document).ready(function(){
	var nextCounter=0;
	$('.slick-next').click(function() {
		nextCounter++;
		if($('.slick-next').hasClass("slick-disabled") && $('.slick-next').text() == 'Next' && nextCounter==3) {
			$('.slick-next').css('display','none');
		} else {
			$('.slick-next').css('display','block');
		}
	});
	$('.slick-prev').click(function() {
		nextCounter--;
		$('.slick-next').css('display','block');
	});
});
</script>
<script type="text/javascript">
    var projects = [];
	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
	@forelse($projects as $project)
		projects.push({id: {{$project->id}},text: '<div>{{$project->name}}</div>'});
	@empty
	@endforelse
	$(".projects-select").select2({
		data: projects,
		templateResult: function (d) { return $(d.text); },
		templateSelection: function (d) { return $(d.text); },
	});
    $('#inviteForm').submit(function () {
		// Check if user enter valid emails.
	    var lines = $('#emails').val().split('\n');
		for(var i = 0;i < lines.length;i++){
		    if(!validateEmail(lines[i])) {
		    	alert('Mail '+lines[i]+' invalid.');
		    	return false;
		    }
		}
	});
	function validateEmail($email) {
	  	var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
	  	return emailReg.test( $email );
	}
	if ($('#members').length) {
		$('#members').DataTable({
			'columnDefs':[
                { 
                    'searchable'    : false, 
                    'targets'       : [0,5] 
                },
            ]
		});
	}
</script>
@endsection
