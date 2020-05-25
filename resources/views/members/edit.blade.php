@extends('layouts.app')

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
					                    <input class="single-daterange form-control" placeholder="dd/mm/yyy" type="text" name="birth_date" value="@if($member->birth_date) {{ (new DateTime($member->birth_date))->format('d/m/Y') }} @endif">
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
                      					<select class="form-control countries-select" name="country">
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
	                  					<label for="">Department</label>
	                  					<select class="form-control" name="department">
				                            @if($departments && $member->department)
								                @foreach($departments as $department)
								                <option value="{{ $department->id }}" @if($member->department->id == $department->id)selected="selected"@endif>{{ $department->name }}</option>
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
												<label class="form-check-label"><input @if($member->self_service_access == 'y') checked="" @endif class="form-check-input" name="self_service_access" type="radio" value="y">On</label>
											</div>
											<div class="form-check">
												<label class="form-check-label"><input @if($member->self_service_access == 'n') checked="" @endif class="form-check-input" name="self_service_access" type="radio" value="n">Off</label>
											</div>
	                      				</div>
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
	                  				<a href="#"><span style="display: inline-block;vertical-align: middle;border-bottom: 1px solid #047bf8;">Add Education</span></a>
	                  			</div>
	                  			<div class="col-sm-12 text-center">
	                  				<a href="#"><span style="display: inline-block;vertical-align: middle;border-bottom: 1px solid #047bf8;">Add Emergency Contact</span></a>
	                  			</div>
	                  			<div class="col-sm-12 text-center">
	                  				<a href="#"><span style="display: inline-block;vertical-align: middle;border-bottom: 1px solid #047bf8;">Add Visa Information</span></a>
	                  			</div>
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
@endsection
