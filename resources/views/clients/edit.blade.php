@extends('layouts.app')

@section('content')
<div class="content-box">
    <div class="row">
	  	<div class="col-sm-12">
	    	<div class="element-wrapper">
	      		<div class="element-box">
	        		<form action="{{ route('update-client', Auth::user()->subdomain) }}"  enctype="multipart/form-data" method="POST">
	        			<input type="hidden" name="_token" value="{{ csrf_token() }}">
	        			<input type="hidden" name="id" value="{{ $client->id }}">
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
	            			<legend><span>General information</span></legend>
		          			<div class="form-group">
		            			<label for=""> Email address</label><input class="form-control" data-error="Email required" placeholder="Enter email" required="required" name="email" type="email" value="{{ $client->email }}">
		            			<div class="help-block form-text with-errors form-control-feedback"></div>
		          			</div>
		          			<div class="row">
		            			<div class="col-sm-6">
                    				<div class="form-group">
                      					<label for="">Client N°</label>
                      					<input class="form-control" type="text" name="number" value="@if($client->number) {{ $client->number }} @endif" required>
                    				</div>
                  				</div>
                  				<div class="col-sm-6">
                    				<div class="form-group">
                      					<label for="">Name</label>
                      					<input class="form-control" type="text" name="name" value="{{ $client->name }}" required="">
                    				</div>
                  				</div>
                  				<div class="col-sm-6">
                    				<div class="form-group">
                      					<label for="">Phone</label>
                      					<input class="form-control" type="text" name="phone" value="{{ $client->phone }}" required="">
                    				</div>
                  				</div>
                  				<div class="col-sm-6">
                    				<div class="form-group">
                      					<label for="">Status</label>
                      					<select class="form-control" name="status">
				                            <option value="active" @if($client->status and $client->status == 'active') selected="" @endif>
				                              	Active
				                            </option>
				                            <option value="inactive" @if($client->status and $client->status == 'inactive') selected="" @endif>
				                              	Inactive
				                            </option>
                      					</select>
                    				</div>
                  				</div>
                  				<div class="col-sm-6">
                    				<div class="form-group">
                      					<label for="">Company name</label>
                      					<input class="form-control" type="text" name="company_name" value="{{ $client->company_name }}" required="">
                    				</div>
                  				</div>
                  				<div class="col-sm-6">
	                      			@if($client->media_id)
								  		<img alt="" height="50px" height="50px" src="{{ asset('storage/'.$client->media->reference) }}">
								  	@endif
                        			<div class="form-group">
                          				<label for="">Change Logo</label>
                          				<input class="form-control" type="file" name="company_logo">
                        			</div>
                      			</div>
                      			<div class="col-sm-12">
	                    			<div class="form-group">
	                      				<label for="">Description</label>
	                      				<textarea class="form-control" name="description">@if($client->description) {{ $client->description }} @endif</textarea>
	                    			</div>
	                  			</div>
		          			</div>
	          			</fieldset>
	          			<div class="form-buttons-w">
	            			<button class="btn btn-primary" type="submit"> Save changes</button>
	          			</div>
	        		</form>
	      		</div>
	    	</div>
	  	</div>
	</div>
</div>
@endsection
