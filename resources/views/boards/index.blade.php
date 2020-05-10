@extends('layouts.app-panel')

@section('title')
 Boards
@endsection
@section('content')
<style>
	.select2 {
  		width: 100% !important;
 	}
	.os-icon-basic-2-259-calendar:before {
	    content: "\e926";
	    color: #0073ff;
	}
	.support-index .support-tickets {
	    /* -webkit-box-flex: 0; */
	    -ms-flex: auto;
	     flex: auto;
	}
	@media (max-width: 1400px){
		.support-index .support-tickets {
		    -webkit-box-flex: 0;
		    -ms-flex: auto;
		     flex: auto;
		}
	}
	.support-index .st-body .avatar{
		padding: 0;
	}
</style>
<div class="content-i">
	<div class="content-box">
		<div class="row">
			<div class="col-sm-12">
              	<!--START - Recent Ticket Comments-->
              	<div class="element-wrapper">
              		@include('layouts.flash')
              		<div class="element-actions">
              			<div class="form-inline justify-content-sm-end">
              				<button class="btn btn-sm btn-primary btn-upper" data-target="#addBoardModal" data-toggle="modal" type="button"><i class="os-icon os-icon-ui-22"></i><span>Add Board</span></button>
              			</div>
              		</div>
                    <h6 class="element-header">
                      	Boards
                	</h6>
					<div class="support-index">
						<div class="support-tickets" style="width: 100%">
							<div class="support-tickets-header">
								<div class="tickets-control">
		                      		<h5>
		                        		Boards
		                      		</h5>
			                      	<div class="element-search">
			                        	<input placeholder="Type to filter boards..." type="text">
			                      	</div>
								</div>
								<div class="tickets-filter">
  									<div class="form-group mr-3">
    									<label class="d-none d-md-inline-block mr-2">Status</label>
    									<select class="form-control-sm">
											<option>
												Closed
											</option>
											<option>
												Open
											</option>
											<option>
												Pending
											</option>
    									</select>
  									</div>
									<div class="form-group mr-1">
			                        	<label class="d-none d-md-inline-block mr-2">Head</label>
			                        	<select class="form-control-sm">
				                          	<option>
				                            	John Mayers
				                          	</option>
				                          	<option>
				                            	Phil Collins
				                          	</option>
				                          	<option>
				                            	Ray Donovan
				                          	</option>
				                        </select>
									</div>
								</div>
							</div>
							@forelse($boards as $board)
							<div class="support-ticket" onclick="openBoardTab({{ $board->id }})">
								<div class="st-meta">
  									<div class="badge badge-success-inverted">
    									Run Well
									</div>
  									<i class="os-icon os-icon-ui-09"></i>
									<div class="status-pill green"></div>
								</div>
								<div class="st-body">
									<div class="cell-image-list" style="padding-right: 15px;">
										<div class="cell-img avatar" style="width: 35px;height: 35px;">
											{{ substr($board->project->name, 0, 2) }}
										</div>
									</div>
  									<div class="ticket-content">
										<h6 class="ticket-title">
											{{ $board->title }}
										</h6>
    									<div class="ticket-description">
      										Small Optional description on the project...
    									</div>
  									</div>
								</div>
								<div class="st-foot row">
									<div class="text-left col-6">
										@if(count($board->project->teams))
		  									<span class="label">Members:</span>
		  									@php
												$ids = [];
											@endphp
											<div class="cell-image-list">
												@foreach($board->project->teams as $team)
													@if(count($team->members))
														@foreach($team->members as $member)
															@if(!in_array($member->id, $ids))
																@if($member->media_id)
																	<div class="cell-img">
																		<div class="user-with-avatar">
																			<img alt="{{ $member->id }}" src="{{ asset('storage/'.$member->media->reference) }}">
																		</div>
																	</div>
																@else
																	<div class="cell-img avatar">
																		{{ substr($member->first_name, 0, 1).substr($member->last_name, 0, 1)}}
																	</div>
																@endif
																@php
																	$ids[] = $member->id;
																@endphp
															@endif
														@endforeach
													@else
													No Members
													@endif
												@endforeach
											</div>
										@else
										<span class="label">No Members</span>
										@endif
									</div>
									<div class="text-right col-6">
										<span class="label">Last Activity:</span><span class="value">Today 10:00am</span>
									</div>
								</div>
							</div>
							@empty
							No boards found
							@endforelse
							<div class="support-ticket">
								<div class="st-meta">
			                      	<div class="badge badge-danger-inverted">
			                        	Require Attention
			                      	</div>
			                      	<i class="os-icon os-icon-ui-09"></i>
			                      	<i class="os-icon os-icon-ui-49"></i>
			                      	<div class="status-pill red"></div>
			                    </div>
			                    <div class="st-body">
			                      	<div class="avatar">
			                        	<img alt="" src="{{ asset('img/avatar2.jpg') }}">
			                      	</div>
			                      	<div class="ticket-content">
			                        	<h6 class="ticket-title">
			                          		Projects 2 tasks
			                        	</h6>
			                        	<div class="ticket-description">
			                          		Small Optional description on the project...
			                        	</div>
			                      	</div>
			                    </div>
			                    <div class="st-foot row">
									<div class="text-left col-6">
				                      	<span class="label">Members:</span>
	  									<div class="cell-image-list">
										    <div class="cell-img" style="background-image: url({{ asset('img/portfolio9.jpg') }});border-radius: 50%;"></div>
										    <div class="cell-img" style="background-image: url({{ asset('img/portfolio2.jpg') }});border-radius: 50%;"></div>
										    <div class="cell-img" style="background-image: url({{ asset('img/portfolio12.jpg') }});border-radius: 50%;"></div>
										    <div class="cell-img-more">
										      + 5 more
										    </div>
										</div>
									</div>
									<div class="text-right col-6">
			                      		<span class="label">Last Activity:</span><span class="value">Jan 24th 8:14am</span>
			                      	</div>
			                    </div>
			                </div>
							<div class="load-more-tickets">
								<a href="#"><span>Load More Boards...</span></a>
							</div>
						</div>
					</div>
  				</div>
  				<!--END - Recent Ticket Comments-->
			</div>
		</div>
	</div>
	<div class="content-panel">
		<div class="content-panel-close">
			<i class="os-icon os-icon-close"></i>
		</div>
		<!--------------------
		START - Recent Tasks
		-------------------->
	  	<div class="element-wrapper">
		    <h6 class="element-header">
		      	Recent Tasks
		    </h6>
		    <div class="element-box-tp">
				<div class="activity-boxes-w">
					<div class="activity-box-w">
						<div class="activity-time">
							10 Min
						</div>
						<div class="activity-box">
							<div class="activity-avatar">
								<img alt="" src="{{ asset('img/avatar1.jpg') }}">
							</div>
							<div class="activity-info">
								<div class="activity-role">
									John Mayers
								</div>
								<strong class="activity-title">Update Design</strong>
							</div>
						</div>
					</div>
					<div class="activity-box-w">
						<div class="activity-time">
							2 Hours
						</div>
						<div class="activity-box">
							<div class="activity-avatar">
								<img alt="" src="{{ asset('img/avatar2.jpg') }}">
							</div>
							<div class="activity-info">
								<div class="activity-role">
									Ben Gossman
								</div>
								<strong class="activity-title">Make First Version</strong>
							</div>
						</div>
					</div>
				</div>
		    </div>
		</div>
		<!--------------------
		END - Recent Tasks
		-------------------->
	</div>
</div>
<div aria-hidden="true" aria-labelledby="addBoardModal" class="modal fade" id="addBoardModal" role="dialog" tabindex="-1">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">
				  	Create Board
				</h5>
				<button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> &times;</span></button>
			</div>
			<div class="modal-body">
				<form action="{{ route('add-board', Auth::user()->subdomain) }}" enctype="multipart/form-data" method="POST">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="row">
						<div class="col-sm-12">
						  	<div class="form-group">
						    	<label for=""> Board Title</label>
						    	<input class="form-control" placeholder="Board title" type="text" name="title">
						  	</div>
						</div>
						<div class="col-sm-12">
				         	<div class="form-group">
				                <label for=""> Projects</label>
				              	<select class="form-control projects-select" name="project"></select>
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
	.user-with-avatar img {
	     width: 32px;
	     height: 32px;
	}
</style>
<script>
	var projects = [];
	@forelse($projects as $project)
		projects.push({id: {{$project->id}},text: '<div> <div class="avatar" style="border-radius: 50%;">{{ substr($project->name, 0, 2) }}</div>{{ $project->name }} </div>'});
	@empty
	@endforelse
	$(".projects-select").select2({
		data: projects,
		templateResult: function (d) { return $(d.text); },
		templateSelection: function (d) { return $(d.text); },
	});
	function openBoardTab(board_id) {
		window.open(
		  	'{{ url('/') }}'+'/boards/'+board_id,
		  	'_blank'
		);
	}
</script>
@endsection
