@extends('layouts.app')

@section('title')
 Clients
@endsection
@section('content')
<div class="content-box">
	<div class="row">
		<div class="col-sm-12">
          	<!--START - Recent Ticket Comments-->
          	<div class="element-wrapper">
          		<div class="element-actions">
          			<div class="form-inline justify-content-sm-end">
          				<button class="btn btn-sm btn-primary btn-upper" data-target="#addClientModal" data-toggle="modal" type="button"><i class="os-icon os-icon-ui-22"></i><span>Add Client</span></button>
          			</div>
          		</div>
                <h6 class="element-header">
                  	Clients
                </h6>
                <div class="control-header">
	                <div class="row align-items-center">
	                  	<div class="col-8 col-lg-7">
	                    	<form action="" class="form-inline">
	                    		<div class="form-group mr-4">
						          	<div class="input-search-w">
					                    <input class="form-control rounded bright" placeholder="Search by names..." type="search">
					                </div>
						        </div>
	                      		<div class="form-group mr-4">
							        <select class="form-control-sm">
							              <option>
							                Client Status
							              </option>
							              <option>
							                Active
							              </option>
							              <option>
							                Inactive
							              </option>
							        </select>
	                      		</div>
	                      		<div class="form-group d-none d-md-flex">
	                        		<select class="form-control-sm">
	                          			<option>
	                            			Contract Type
	                          			</option>
	                          			<option>
	                          				Employee
	                          			</option>
	                          			<option>
	                          				Freelancer
	                          			</option>
	                        		</select>
	                      		</div>
	                    	</form>
	                  	</div>
	                  	<div class="col-4 col-lg-5 text-right">
	                    	<a class="btn btn-sm btn-primary btn-upper" href="#"><i class="os-icon os-icon-ui-37"></i><span>Filter</span></a>
	                  	</div>
	                </div>
	            </div>
				<div class="element-box">
					<div class="table-responsive">
    					<table id="dataTable1" width="100%" class="table table-striped table-lightfont">
							<thead>
								<tr>
									<th width="58px">
										<div class="form-check" style="margin-top: auto;">
											<label>
												<input type="checkbox" name="check"> <span class="label-text"></span>
											</label>
										</div>
									</th>
									<th>
										Name
									</th>
									<th>
										Budget
									</th>
									<th>
										Spent
									</th>
									<th>
										Billed
									</th>
									<th>
										Status
									</th>
									<th>
										Actions
									</th>
								</tr>
							</thead>
							<tbody id="body-clients">
								@forelse($clients as $client)
								<tr>
									<td class="text-center" style="display: inline-flex;">
										<div class="form-check" style="margin-top: auto;">
											<label>
												<input type="checkbox" name="check"> <span class="label-text"></span>
											</label>
										</div>
										<div class="user-with-avatar">
											@if($client->media_id)
										  		<img alt="" src="{{ asset('storage/'.$client->media->reference) }}">
										  	@else
										  		<div class="avatar" style="border-radius: 50%;">{{ substr($client->name, 0, 2) }}</div>
										  	@endif
										</div>
									</td>
									<td>
										<div>
									  		<span>{{ $client->name }}</span><a class="danger" href="{{ route('edit-client',  ['account' => Auth::user()->subdomain, 'client_id' => $client->id]) }}"><i class="os-icon os-icon-pencil-2"></i></a>
									  	</div>
									</td>
									<td>
										<span>$0.00</span>
									</td>
									<td>
										<span>$0.00</span>
									</td>
									<td>
										<span>$0.00</span>
									</td>
									<td class="nowrap">
										<span class="status-pill smaller green"></span><span>{{ $client->status }}</span>
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
							</tbody>
						</table>
						</div>
				</div>
			</div>
			<!--END - Recent Ticket Comments-->
		</div>
	</div>
</div>
<div aria-hidden="true" aria-labelledby="addClientModal" class="modal fade" id="addClientModal" role="dialog" tabindex="-1">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">
				  	Create Client
				</h5>
				<button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> &times;</span></button>
			</div>
			<div class="modal-body">
				<form action="{{ route('add-client', Auth::user()->subdomain) }}" enctype="multipart/form-data" method="POST">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="row">
						<div class="col-sm-12">
						  	<div class="form-group">
						    	<label for=""> Client #</label>
						    	<input class="form-control" placeholder="" type="text" name="number">
						  	</div>
						</div>
						<div class="col-sm-12">
						  	<div class="form-group">
						    	<label for=""> Client Name</label>
						    	<input class="form-control" placeholder="Project Name" type="text" name="name">
						  	</div>
						</div>
						<div class="col-sm-12">
						  	<div class="form-group">
						    	<label for=""> Email</label>
						    	<input class="form-control" placeholder="" type="email" name="email">
						  	</div>
						</div>
						<div class="col-sm-12">
						  	<div class="form-group">
						    	<label for=""> Phone</label>
						    	<input class="form-control" placeholder="" type="text" name="phone">
						  	</div>
						</div>
						<div class="col-sm-12">
						  	<div class="form-group">
						    	<label for=""> Company Name</label>
						    	<input class="form-control" placeholder="" type="text" name="company_name">
						  	</div>
						</div>
						<div class="col-sm-12">
						  	<div class="form-group">
						    	<label for=""> Company Logo</label>
						    	<input class="form-control" placeholder="Choose an image" type="file" name="company_logo">
						  	</div>
						</div>
						<div class="col-sm-12">
						  	<div class="form-group">
						    	<label for=""> Description</label>
						    	<textarea class="form-control" name="description"></textarea>
						  	</div>
						</div>
					</div>
					<div class="modal-footer">
						<button class="btn btn-secondary" data-dismiss="modal" type="button"> Close</button>
						<button class="btn btn-primary" type="submit"> Save</button>
					</div>
				</form>
				{{-- <label>
                    Attach Files
                </label>
				<form action="index.html" class="dropzone" id="my-awesome-dropzone">
                    <div class="dz-message">
                      	<div>
                        	<h4>Drop files here or click to upload attached files to this client.</h4>
                      	</div>
                    </div>
                </form> --}}
			</div>
		</div>
	</div>
</div>
@endsection
