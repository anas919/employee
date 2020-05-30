@extends('layouts.app')
@section('title')
	Edit Member
@endsection
@section('content')
<div class="content-box">
    <div class="row">
  		<div class="col-sm-4">
    		<div class="user-profile compact">
      			<div class="up-head-w" @if($member->media_id) style="background-image:url({{ asset('storage/'.$member->media->reference) }})" @endif>
        			<div class="up-social">
        				<a href="{{ $member->linkedin }}"><i class="os-icon os-icon-linkedin"></i></a>
        				<a href="{{ $member->twitter }}"><i class="os-icon os-icon-twitter"></i></a>
        				<a href="{{ $member->facebook }}"><i class="os-icon os-icon-facebook"></i></a>
        			</div>
        			<div class="up-main-info">
        				<h2 class="up-header">{{ $member->first_name }} {{ $member->last_name }}</h2>
        				@if($member->job)<h6 class="up-sub-header">{{ $member->job->name }}</h6>@endif
        			</div>
        			<svg class="decor" width="842px" height="219px" viewBox="0 0 842 219" preserveAspectRatio="xMaxYMax meet" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g transform="translate(-381.000000, -362.000000)" fill="#FFFFFF"><path class="decor-path" d="M1223,362 L1223,581 L381,581 C868.912802,575.666667 1149.57947,502.666667 1223,362 Z"></path></g></svg>
        		</div>
    			<div class="up-controls">
					<div class="row">
						<div class="col-sm-6">
							<div class="value-pair">
								<div class="label">Status:</div>
								<div class="value badge badge-pill badge-success">{{ $member->status }}</div>
							</div>
						</div>
      				</div>
      			</div>
    			<div class="up-contents">
		      		<div class="m-b">
						<div class="member-info" style="background: linear-gradient(to bottom, #eff1f7, #f9fafc);">
						    <h5 class="info-header">Details</h5>
						    @if($member->hire_date)
						    <div class="info-section text-center">
						    	<div class="info-label">Hired:</div>
						      	<div class="info-value">{{ (new DateTime($member->hire_date))->format('F d,Y') }}</div>
						    </div>
							@endif
							@if($member->phone)
						    <div style="padding: 5px;">
						    	<i class="icon-screen-smartphone" style="padding-right: 6px"></i>{{ $member->phone }}
						    </div>
							@endif
							@if($member->department)
						    <div style="padding: 5px;">
						    	<i class="icon-organization" style="padding-right: 6px"></i>{{ $member->department->name }}
						    </div>
							@endif
							@if($member->country)
						    <div style="padding: 5px;">
								<i class="icon-map" style="padding-right: 6px"></i>{{ $member->city }}, {{ $member->country->country }}
						    </div>
							@endif
						</div>
    				</div>
  				</div>
    		</div>
  		</div>
	  	<div class="col-sm-8">
	    	<div class="element-wrapper">
	      		<div class="element-box">
	        		<form action="{{ route('update', Auth::user()->subdomain) }}"  enctype="multipart/form-data" method="POST">
	        			<input type="hidden" name="_token" value="{{ csrf_token() }}">
	        			<input type="hidden" name="id" value="{{ $member->id }}">
	          			<div class="element-info" style="border-bottom: none;">
	            			<div class="element-info-with-icon">
	              				<div class="element-info-icon">
	                				<div class="os-icon os-icon-wallet-loaded"></div>
			              		</div>
	              				<div class="element-info-text">
	                				<h5 class="element-inner-header">
	                  					Profile Settings
	                				</h5>
	                				<div class="element-inner-desc">
	                  					Validation of the form is made possible using powerful validator plugin for bootstrap. <a href="http://1000hz.github.io/bootstrap-validator/" target="_blank">Learn more about Bootstrap Validator</a>
	                				</div>
	              				</div>
	            			</div>
	          			</div>
	          			<fieldset class="form-group">
	            			<legend><span>Personal information</span></legend>
		          			<div class="form-group">
		            			<label for=""> Email address</label><input class="form-control" data-error="Your email address is invalid" placeholder="Enter email" required="required" name="email" type="email" value="{{ $member->email }}">
		            			<div class="help-block form-text with-errors form-control-feedback"></div>
		          			</div>
		          			<div class="row">
		            			<div class="col-sm-4">
                    				<div class="form-group">
                      					<label for="">Employee N°</label>
                      					<input class="form-control" type="text" name="number" value="@if($member->number) {{ $member->number }} @endif" required>
                    				</div>
                  				</div>
                  				<div class="col-sm-4">
                    				<div class="form-group">
                      					<label for="">First Name</label>
                      					<input class="form-control" type="text" name="first_name" value="{{ $member->first_name }}" required="">
                    				</div>
                  				</div>
                  				<div class="col-sm-4">
                    				<div class="form-group">
                      					<label for="">Last Name</label>
                      					<input class="form-control" type="text" name="last_name" value="{{ $member->last_name }}" required="">
                    				</div>
                  				</div>
                  				<div class="col-sm-6">
                    				<div class="form-group">
					                  <label for="">Birth Date</label>
					                  <div class="date-input">
					                    <input class="birth-daterange form-control" placeholder="Birth date here" type="text" name="birth_date" value="@if($member->birth_date) {{ (new DateTime($member->birth_date))->format('d/m/Y') }} @endif">
					                  </div>
					                </div>
                  				</div>
                  				<div class="col-sm-6">
                    				<div class="form-group">
                      					<label for="">Gender</label>
                      					<select class="form-control" name="gender">
                      						@if($member->gender)
				                            <option value="m" @if($member->gender == 'm') selected="" @endif>
				                              	Male
				                            </option>
				                            <option value="f" @if($member->gender == 'f') selected="" @endif>
				                              	Female
				                            </option>
				                            @else
				                            <option value="">--Select Gender--</option>
				                            <option value="m">
				                            	Male
				                            </option>
				                            <option value="f">
				                            	Female
				                            </option>
				                            @endif
                      					</select>
                    				</div>
                  				</div>
                  				<div class="col-sm-6">
                    				<div class="form-group">
                      					<label for="">Marital Status</label>
                      					<select class="form-control" name="marital_status">
                      						@if($member->marital_status)
				                            <option value="single" @if($member->marital_status == 'single') selected="" @endif>
				                              	Single
				                            </option>
				                            <option value="married" @if($member->marital_status == 'married') selected="" @endif>
				                              	Married
				                            </option>
				                            @else
				                            <option value="">--Select Status--</option>
				                            <option value="single">
				                            	Single
				                            </option>
				                            <option value="married">
				                            	Married
				                            </option>
				                            @endif
                      					</select>
                    				</div>
                  				</div>
		          			</div>
	          			</fieldset>
	          			<fieldset class="form-group">
	            			<legend><span>Contact</span></legend>
	            			<div class="row">
	              				<div class="col-sm-12">
                        			<div class="form-group">
                          				<label for="">Address</label>
                          				<textarea class="form-control" name="address">@if($member->address) {{ $member->address }} @endif</textarea>
                        			</div>
                      			</div>
                      			<div class="col-sm-4">
                        			<div class="form-group">
                          				<label for="">City</label>
                          				<input class="form-control" type="text" name="city" value="@if($member->city) {{ $member->city }} @endif">
                        			</div>
                      			</div>
                      			<div class="col-sm-4">
                        			<div class="form-group">
                          				<label for="">Province</label>
                          				<input class="form-control" type="text" name="province" value="@if($member->province) {{ $member->province }} @endif">
                        			</div>
                      			</div>
                      			<div class="col-sm-4">
                        			<div class="form-group">
                          				<label for="">Postal Code</label>
                          				<input class="form-control" type="text" name="postal_code" value="@if($member->postal_code) {{ $member->postal_code }} @endif">
                        			</div>
                      			</div>
                      			<div class="col-sm-6">
                        			<div class="form-group">
                      					<label for="">Country</label>
                      					<select class="form-control" name="country">
                      						@if($countries && $member->country)
								                @foreach($countries as $country)
								                <option value="{{ $country->id }}" @if($member->country->id == $country->id)selected="selected"@endif>{{ ucfirst($country->country) }} ({{ strtoupper($country->code) }})</option>
								                @endforeach
								            @elseif($countries)
								            	<option value="">--Country--</option>
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
                          				<input class="form-control" type="text" name="phone" value="@if($member->phone) {{ $member->phone }} @endif">
                        			</div>
                      			</div>
	            			</div>
	            		</fieldset>
	            		<fieldset class="form-group">
	            			<legend><span>Payment details</span></legend>
							<div class="row">
                  				<div class="col-sm-6">
                        			<div class="form-group">
                      					<label for="">Pay Schedule</label>
                      					<select class="form-control" name="paymentschedule">
				                            @if($paymentschedules && $member->paymentschedule)
								                @foreach($paymentschedules as $paymentschedule)
								                <option value="{{ $paymentschedule->id }}" @if($member->paymentschedule->id == $paymentschedule->id)selected="selected"@endif>{{ ucfirst($paymentschedule->pay_schedule) }}</option>
								                @endforeach
								            @elseif($paymentschedules)
								            	<option value="">--Payment schedule--</option>
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
                      						@if($paymentrates && $member->paymentrate)
								                @foreach($paymentrates as $paymentrate)
								                <option value="{{ $paymentrate->id }}" @if($member->paymentrate->id == $paymentrate->id)selected="selected"@endif>{{ ucfirst($paymentrate->pay_rate) }}</option>
								                @endforeach
								            @elseif($paymentrates)
								            	<option value="">--Payment rate--</option>
								                @foreach($paymentrates as $paymentrate)
								                <option value="{{ $paymentrate->id }}">{{ ucfirst($paymentrate->pay_rate) }}</option>
								                @endforeach
								            @endif
                      					</select>
                    				</div>
                      			</div>
                    			<div class="col-sm-6">
                        			<div class="form-group">
                          				<label for="">Pay Rate</label>
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
                      			<div class="col-sm-6">
                        			<div class="form-group">
                      					<label for="">Payment method </label>
                      					<select class="form-control" name="paymentmethod">
				                            @if($paymentmethods && $member->paymentmethod)
								                @foreach($paymentmethods as $paymentmethod)
								                <option value="{{ $paymentmethod->id }}" @if($member->paymentmethod->id == $paymentmethod->id)selected="selected"@endif>{{ ucfirst($paymentmethod->pay_method) }}</option>
								                @endforeach
								            @elseif($paymentmethods)
								            	<option value="">--Payment method--</option>
								                @foreach($paymentmethods as $paymentmethod)
								                <option value="{{ $paymentmethod->id }}">{{ ucfirst($paymentmethod->pay_method) }}</option>
								                @endforeach
								            @endif
                      					</select>
                    				</div>
                      			</div>
                  			</div>
	            		</fieldset>
	            		<fieldset class="form-group">
	            			<legend><span>Other details</span></legend>
							<div class="row">
								@if($member->hire_date)
								<div class="col-sm-6">
	                    			<div class="form-group">
					                  	<label for="">Hire Date</label>
					                  	<div class="date-input">
					                    	<input class="single-daterange form-control" placeholder="dd/mm/yyy" type="text" name="hire_date" value="{{ (new DateTime($member->hire_date))->format('d/m/Y') }}">
					                  	</div>
						            </div>
	                  			</div>
	                  			@endif
	                  			@if($member->status)
	                  			<div class="col-sm-6">
	                    			<div class="form-group">
	                  					<label for="">Employee Status</label>
	                  					<select class="form-control" name="status">
				                            <option value="full_time" @if($member->status == 'full_time') selected="" @endif>
				                              	Full-Time
				                            </option>
				                            <option value="part_time" @if($member->status == 'part_time') selected="" @endif>
				                              	Part-Time
				                            </option>
				                            <option value="contractor" @if($member->status == 'contractor') selected="" @endif>
				                              	Contractor
				                            </option>
	                  					</select>
	                				</div>
	                  			</div>
	                  			@endif
	                  			@if($member->job_id)
	                  			<div class="col-sm-6">
	                    			<div class="form-group">
	                  					<label for="">Job Title</label>
	                  					<select class="form-control" name="job">
	                  						@if($jobs && $member->job)
								                @foreach($jobs as $job)
								                <option value="{{ $job->id }}" @if($member->job->id == $job->id)selected="selected"@endif>{{ $job->title }}</option>
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
	                  			@endif
	                  			<div class="col-sm-6">
	                    			<div class="form-group">
		                  				<div for="">
								        	<div class="row">
								        		<div class="col-6">
								        			Departments
								        		</div>
								        		<div class="col-6 text-right">
								        			<button class="select-add" data-target="#addDepartmentModal" data-toggle="modal" type="button">Add department</button>
								        		</div>
								        	</div>
								       	</div>
	                  					<select class="form-control" name="department" id="departments">
				                            @if($departments && $member->department)
								                @foreach($departments as $department)
								                <option value="{{ $department->id }}" @if($member->department->id == $department->id)selected="selected"@endif>{{ $department->name }}</option>
								                @endforeach
								            @elseif($departments)
								            	<option value="">--Select or add department--</option>
								                @foreach($departments as $department)
								                <option value="{{ $department->id }}">{{ $department->name }}</option>
								                @endforeach
								            @endif
	                  					</select>
	                				</div>
	                  			</div>
	                      		<div class="col-sm-6">
	                      			@if($member->media_id)
								  		<img alt="" height="50px" height="50px" src="{{ asset('storage/'.$member->media->reference) }}">
								  	@endif
                        			<div class="form-group">
                          				<label for="">Change Picture</label>
                          				<input class="form-control" type="file" name="image">
                        			</div>
                      			</div>
	                      		<div class="col-sm-12">
	                    			<div class="form-group">
	                      				<label for="">Notes</label>
	                      				<textarea class="form-control" name="notes">@if($member->notes) {{ $member->notes }} @endif</textarea>
	                    			</div>
	                  			</div>
	                  			<div class="col-sm-12 text-center">
	                  				<button class="modal-add" style="display: inline-block;vertical-align: middle;" type="button"  data-target="#addEducationModal" data-toggle="modal" >Add Education</button>
	                  			</div>
	                  			<div class="col-sm-12 text-center">
	                  				<button class="modal-add" style="display: inline-block;vertical-align: middle;" type="button"  data-target="#addContactModal" data-toggle="modal" >Add Emergency Contact</button>
	                  			</div>
	                  			@if(!$member->visa)
	                  			<div class="col-sm-12 text-center">
	                  				<button class="modal-add" style="display: inline-block;vertical-align: middle;" type="button"  data-target="#addVisaModal" data-toggle="modal" >Add Visa Information</button>
	                  			</div>
	                  			@endif
							</div>
	            		</fieldset>
	          			<div class="form-buttons-w">
	            			<button class="btn btn-primary" type="submit"> Submit</button>
	          			</div>
	        		</form>
	      		</div>
	    	</div>
	  	</div>
	</div>
</div>
<div aria-hidden="true" aria-labelledby="addDepartmentModal" class="modal fade" id="addDepartmentModal" role="dialog" tabindex="-1">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">
				  	Create department
				</h5>
				<button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> &times;</span></button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-sm-12">
					  	<div class="form-group">
					    	<label for=""> Department Name</label>
					    	<input class="form-control" placeholder="Deparment Name" type="text" id="department">
					  	</div>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" data-dismiss="modal" type="button" id="close-department"> Close</button>
					<button class="btn btn-primary" type="button" onclick="addDepartment()"> Save</button>
				</div>
			</div>
		</div>
	</div>
</div>
<div aria-hidden="true" aria-labelledby="addEducationModal" class="modal fade" id="addEducationModal" role="dialog" tabindex="-1">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">
				  	Add education
				</h5>
				<button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> &times;</span></button>
			</div>
			<div class="modal-body">
				<form action="{{ route('add-education', Auth::user()->subdomain) }}" enctype="multipart/form-data" method="POST">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="user" value="{{ $member->id }}">
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
						        <label for=""> School *</label>
								<input class="form-control" name="school" placeholder="Ex: Boston University" />
						    </div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
						        <label for=""> Degree </label>
								<input class="form-control" name="degree" placeholder="Ex: Bachelor's" />
						    </div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
						        <label for=""> Field of study </label>
								<input class="form-control" name="field" placeholder="Ex: Business" />
						    </div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
						        <label for=""> Field of study </label>
								<input class="form-control" name="field" placeholder="Ex: Business" />
						    </div>
						</div>
						<div class="col-sm-6">
            				<div class="form-group">
			                  <label for="">Start Year</label>
			                  <div class="date-input">
			                    <input class="single-daterange form-control" placeholder="dd/mm/yyy" type="text" name="start_year" value="">
			                  </div>
			                </div>
          				</div>
						<div class="col-sm-6">
            				<div class="form-group">
			                  <label for="">End Year</label>
			                  <div class="date-input">
			                    <input class="single-daterange form-control" placeholder="dd/mm/yyy" type="text" name="end_year" value="">
			                  </div>
			                </div>
          				</div>
          				<div class="col-sm-12">
            				<div class="form-group">
			                  <label for="">Description</label>
			                  <textarea class="form-control" name="description"></textarea>
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
<div aria-hidden="true" aria-labelledby="addContactModal" class="modal fade" id="addContactModal" role="dialog" tabindex="-1">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">
				  	Add Emergency contact
				</h5>
				<button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> &times;</span></button>
			</div>
			<div class="modal-body">
				<form action="{{ route('add-contact', Auth::user()->subdomain) }}" enctype="multipart/form-data" method="POST">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="user" value="{{ $member->id }}">
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
						        <label for=""> Name</label>
								<input class="form-control" name="name" placeholder="Contact Name" />
						    </div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
						        <label for=""> Phone</label>
								<input class="form-control" name="phone" />
						    </div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
						        <label for=""> Email</label>
								<input class="form-control" name="email" placeholder="Email" />
						    </div>
						</div>
          				<div class="col-sm-12">
            				<div class="form-group">
			                  <label for="">Address</label>
			                  <textarea class="form-control" name="address"></textarea>
			                </div>
          				</div>
          				<div class="col-sm-6">
							<div class="form-group">
						        <label for=""> City</label>
								<input class="form-control" name="school" placeholder="Ex: Boston University" />
						    </div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="">Country</label>
								<select class="form-control" name="country">
									<option value="">--Select Country--</option>
									@foreach($countries as $country)
									<option value="{{ $country->id }}">{{ ucfirst($country->country) }} ({{ strtoupper($country->code) }})</option>
									@endforeach
								</select>
							</div>
                      	</div>
                      	<div class="col-sm-6">
							<div class="form-group">
								<label for="">Relationship</label>
								<select class="form-control" name="relationship">
									<option value="">--Select Relationship--</option>
									@foreach($relationships as $relationship)
									<option value="{{ $relationship->id }}">{{ ucfirst($relationship->name) }}</option>
									@endforeach
								</select>
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
<div aria-hidden="true" aria-labelledby="addVisaModal" class="modal fade" id="addVisaModal" role="dialog" tabindex="-1">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">
				  	Add visa informations
				</h5>
				<button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> &times;</span></button>
			</div>
			<div class="modal-body">
				<form action="{{ route('add-visa', Auth::user()->subdomain) }}" enctype="multipart/form-data" method="POST">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="user" value="{{ $member->id }}">
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
						        <label for=""> Visa(see bambooHR)</label>
								<input class="form-control" name="school" />
						    </div>
						</div>
						<div class="col-sm-6">
            				<div class="form-group">
			                  <label for="">Date</label>
			                  <div class="date-input">
			                    <input class="single-daterange form-control" placeholder="dd/mm/yyy" type="text" name="date" value="">
			                  </div>
			                </div>
          				</div>
          				<div class="col-sm-6">
            				<div class="form-group">
			                  <label for="">Issue Date</label>
			                  <div class="date-input">
			                    <input class="single-daterange form-control" placeholder="dd/mm/yyy" type="text" name="issue_date" value="">
			                  </div>
			                </div>
          				</div>
          				<div class="col-sm-6">
            				<div class="form-group">
			                  <label for="">Date Expiration</label>
			                  <div class="date-input">
			                    <input class="single-daterange form-control" placeholder="dd/mm/yyy" type="text" name="expiration_date" value="">
			                  </div>
			                </div>
          				</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="">Country</label>
								<select class="form-control" name="country">
									<option value="">--Select Country--</option>
									@foreach($countries as $country)
									<option value="{{ $country->id }}">{{ ucfirst($country->country) }} ({{ strtoupper($country->code) }})</option>
									@endforeach
								</select>
							</div>
                      	</div>
                      	<div class="col-sm-12">
            				<div class="form-group">
			                  <label for="">Note</label>
			                  <textarea class="form-control" name="note"></textarea>
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
	<script type="text/javascript">
		//Date picker input
		$("input.birth-daterange").daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,                
            //timePicker: true,
            //timePicker24Hour: true,
            //timePickerSeconds: true,
            minYear: parseInt(moment().subtract(10, 'years').format('YYYY'),10),
            maxYear: parseInt(moment().add(10, 'years').format('YYYY'), 10),
            autoUpdateInput: false,                
            singleClasses: "",
            locale: {
                //format: 'DD.MM.YYYY HH:mm:ss'
                //format: 'DD.MM.YYYY'
            }
        });

        $('input.birth-daterange').on('apply.daterangepicker', function (ev, picker) {
            $(this).val(picker.startDate.format('L'));
        });

        $('input.birth-daterange').on('cancel.daterangepicker', function (ev, picker) {
            $(this).val('');
        });
        function addDepartment() {
			var name = $('#department').val();
			$.ajax({
				type:'POST',
				url:'{{ url('/') }}/departments/add/',
				data:{name:name},
				success:function(data){
					console.log(data);
					var o = new Option(data.department.name, data.department.id);
					$(o).html(data.department.name);/// jquerify the DOM object 'o'
					$("#departments").append(o);
					$('#departments-empty').remove();
					$('#close-department').trigger('click');
					$('#department').val('');
				},
				error:function(error){
					console.log(error);
				}
			});
		}
	</script>
@endsection