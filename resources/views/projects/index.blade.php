@extends('layouts.app')

@section('title')
	Projects
@endsection
@section('content')
<div class="content-box">
	<div class="row">
		<div class="col-sm-12">
          	<!--START - Recent Ticket Comments-->
          	<div class="element-wrapper">
          		<div class="element-actions">
          			<div class="form-inline justify-content-sm-end">
          				<button class="btn btn-sm btn-primary btn-upper" data-target="#addProjectModal" data-toggle="modal" type="button"><i class="os-icon os-icon-ui-22"></i><span>Add Project</span></button>
          			</div>
          		</div>
                <h6 class="element-header">
                  	Projects
                </h6>
                <div class="control-header">
	                <div class="row align-items-center">
	                  	<div class="col-10 col-lg-10">
	                    	<form action="">
	                    		<div class="row">
		                    		<div class="form-group col-sm-3">
							          	<div class="input-search-w">
						                    <input class="form-control rounded bright" placeholder="Employee Name..." type="search">
						                </div>
							        </div>
							        <div class="form-group col-sm-3">
							          	<div class="input-search-w">
						                    <input class="form-control rounded bright" placeholder="Project Name..." type="search">
						                </div>
							        </div>
		                      		<div class="form-group col-sm-3">
								        <select class="form-control">
								              <option>
								                Search by Role
								              </option>
								              <option>
								                Web Developer
								              </option>
								              <option>
								                Mobile Developer
								              </option>
								              <option>
								                Desktop Developer
								              </option>
								        </select>
		                      		</div>
  								</div>
	                    	</form>
	                  	</div>
	                  	<div class="col-2 col-lg-2 text-right">
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
										Project Name
									</th>
									<th>
										Teams
									</th>
									<th>
										Members
									</th>
									<th>
										Clients
									</th>
									<th>
										Budget
									</th>
									<th>
										Status
									</th>
									<th>
										Progress
									</th>
									<th class="text-center">
										Actions
									</th>
	                            </tr>
                          	</thead>
	                        <tbody id="body-projects">
	                        	@forelse($projects as $project)
	                            <tr>
	                            	<td width="58px">
										<div class="form-check" style="margin-top: auto;">
											<label>
												<input type="checkbox" name="check"> <span class="label-text"></span>
											</label>
										</div>
									</td>
									<td class="nowrap">
										{{ $project->name }}<button onclick="editProject({{ $project->id }})" class="danger small-edit"><i class="os-icon os-icon-pencil-2"></i></button>
									</td>
									<td>
										@if(count($project->teams))
										<div class="cell-image-list">
											@foreach($project->teams  as $team)
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
									</td>
									<td>
										@if(count($project->teams))
										@php
											$ids = [];
										@endphp
										<div class="cell-image-list">
											@foreach($project->teams as $team)
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
										No Members
										@endif
									</td>
									<td>
										@if($project->client)
											{{ $project->client->name }}
										@endif
									</td>
									<td>
										$01.00
									</td>
									<td>
										<span class="status-pill smaller green"></span><span>Active</span>
									</td>
									<td>
										<div class="os-progress-bar primary">
								            <div class="bar-labels">
								              	<div class="bar-label-left">
								                	<span>Progress</span><span class="positive">+12</span>
								              	</div>
								              	<div class="bar-label-right">
								                	<span class="info">72/100</span>
								              	</div>
								            </div>
								            <div class="bar-level-1" style="width: 100%">
								              	<div class="bar-level-2" style="width: 72%">
								                	<div class="bar-level-3" style="width: 25%"></div>
								              	</div>
								            </div>
								        </div>
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
<div aria-hidden="true" aria-labelledby="addProjectModal" class="modal fade" id="addProjectModal" role="dialog" tabindex="-1">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">
				  	Create Project
				</h5>
				<button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> &times;</span></button>
			</div>
			<div class="modal-body">
				<form action="{{ route('add-project', Auth::user()->subdomain) }}" enctype="multipart/form-data" method="POST">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="row">
						<div class="col-sm-6">
						  	<div class="form-group">
						    	<label for=""> Project Name *</label>
						    	<input class="form-control" placeholder="Project Name" type="text" name="name">
						  	</div>
						</div>
						<div class="col-sm-6">
						  	<div class="form-group">
						    	<label for=""> Client</label>
              					<select class="form-control clients-select" name="client"></select>
						  	</div>
						</div>
						<div class="col-sm-6">
            				<div class="form-group">
			                  <label for="">Start Date</label>
			                  <div class="date-input">
			                    <input class="single-daterange form-control" placeholder="dd/mm/yyy" type="text" name="start_date" value="">
			                  </div>
			                </div>
          				</div>
						<div class="col-sm-6">
            				<div class="form-group">
			                  <label for="">End Date</label>
			                  <div class="date-input">
			                    <input class="single-daterange form-control" placeholder="dd/mm/yyy" type="text" name="end_date" value="">
			                  </div>
			                </div>
          				</div>
						<style>
							.select2 {
								width: 100% !important;
							}
						</style>
						<div class="col-sm-6">
				         	<div class="form-group">
				                <label for=""> Teams</label>
				                <select class="form-control teams-select" multiple="true" name="teams[]"></select>
				            </div>
				        </div>
						<div class="col-sm-12">
							<div class="form-group">
						        <label for=""> Description</label>
								<textarea cols="80" id="ckeditor1" name="ckeditor1" rows="10"></textarea>
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
<div aria-hidden="true" aria-labelledby="editProjectModal" class="modal fade" id="editProjectModal" role="dialog" tabindex="-1">
   	<div class="modal-dialog" role="document">
    	<div class="modal-content">
     		<div class="modal-header">
		      	<h5 class="modal-title" id="exampleModalLabel">
		        	Edit Project
		      	</h5>
      			<button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> &times;</span></button>
     		</div>
     		<div class="modal-body">
      			<form>
					{{-- <input type="hidden" name="_token" value="{{  }}"> --}}
       				<div class="row">
				        <div class="col-sm-6">
						  	<div class="form-group">
						    	<label for=""> Project Name *</label>
						    	<input class="form-control" placeholder="Project Name" type="text" id="projectName">
						  	</div>
						</div>
						<div class="col-sm-6">
						  	<div class="form-group">
						    	<label for=""> Client</label>
              					<select class="form-control edit-clients-select" id="projectClient"></select>
						  	</div>
						</div>
						<div class="col-sm-6">
            				<div class="form-group">
			                  <label for="">Start Date</label>
			                  <div class="date-input">
			                    <input class="single-daterange form-control" placeholder="dd/mm/yyy" type="text" id="projectStartDate" value="">
			                  </div>
			                </div>
          				</div>
						<div class="col-sm-6">
            				<div class="form-group">
			                  <label for="">End Date</label>
			                  <div class="date-input">
			                    <input class="single-daterange form-control" placeholder="dd/mm/yyy" type="text" id="projectEndDate" value="">
			                  </div>
			                </div>
          				</div>
						<style>
							.select2 {
								width: 100% !important;
							}
						</style>
						<div class="col-sm-6">
				         	<div class="form-group">
				                <label for=""> Teams</label>
				                <select class="form-control edit-teams-select" multiple="true" name="projectTeams[]" id="projectTeams"></select>
				            </div>
				        </div>
						<div class="col-sm-12">
							<div class="form-group">
						        <label for=""> Description</label>
								<textarea cols="80" id="ckeditor2" name="projectCkeditor1" rows="10"></textarea>
						    </div>
						</div>
    				</div>
    				<div class="modal-footer">
				      	<button class="btn btn-secondary" data-dismiss="modal" type="button" id="edit-close"> Close</button>
				      	<button class="btn btn-primary" type="button" id="edit-save"> Save</button>
				    </div>
      			</form>
     		</div>
	    </div>
   	</div>
</div>
@endsection
@section('scripts')
<style>
	.table .user-with-avatar img {
	     width: 32px;
	     height: 32px;
	}
</style>
{{-- Projects --}}
<script>
	var clients_data = [];
	@forelse($clients as $client)
		clients_data.push({ id: {{ $client->id }}, text: '<div> @if ($client->media_id)<img src="{{ asset('storage/'.$client->media->reference) }}" width="30px" height="30px">{{ $client->name }} @else <div class="avatar" style="border-radius: 50%;">{{ substr($client->name, 0, 2) }}</div>{{ $client->name }} @endif </div>' });
	@empty
	@endforelse
	$(".clients-select").select2({
		data: clients_data,
		templateResult: function (d) { return $(d.text); },
		templateSelection: function (d) { return $(d.text); },
	});

	var teams_data = [];
	@forelse($teams as $team)
		teams_data.push({ id: {{ $team->id }}, text: '<div> <div class="avatar" style="border-radius: 50%;">{{ substr($team->name, 0, 2) }}</div>{{ $team->name }} </div>' });
	@empty
	@endforelse
	$(".teams-select").select2({
		data: teams_data,
		templateResult: function (d) { return $(d.text); },
		templateSelection: function (d) { return $(d.text); },
	});
</script>
<script type="text/javascript">
	//Choosed team to edit
	var c_team_id;
	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
	function editProject(projectId) {
		c_project_id = projectId;
		selected_project_teams = [];

		$.ajax({
			type:'GET',
			url:'{{ url('/') }}/projects/edit/'+projectId,
			success:function(data){
				$('#projectName').val(data.project.name);
				if(data.project.end_date){
					var end_date = data.project.end_date.split("-");
					$('#projectEndDate').val(end_date[1]+'/'+end_date[2]+'/'+end_date[0])
				}
				if(data.project.start_date){
					var start_date = data.project.start_date.split("-");
					$('#projectStartDate').val(start_date[1]+'/'+start_date[2]+'/'+start_date[0])
				}
				// $('.projectCkeditor1').val(data.project.description)
				CKEDITOR.instances['ckeditor2'].setData(data.project.description);
				// CKEDITOR.instances.projectCkeditor1.insertText(data.project.description);
				//Those are project leaders of this project
				for(let i = 0; i < data.teams.length; i++){
					selected_project_teams.push(data.teams[i]['id']);
				}
				$(".edit-teams-select").select2({
					// maximumSelectionLength: 1,
					data: teams_data,
					templateResult: function (d) { return $(d.text); },
					templateSelection: function (d) { return $(d.text); },
				});
				$(".edit-teams-select").val(selected_project_teams).trigger('change');
				$(".edit-clients-select").select2({
					data: clients_data,
					templateResult: function (d) { return $(d.text); },
					templateSelection: function (d) { return $(d.text); },
				});
				$(".edit-clients-select").val(data.client['id']).trigger('change');

				$('#editProjectModal').modal('show');
			},
			error:function(error){

			}
		});
	}
	$("#edit-save").click(function(){
		var projectName = $("#projectName").val();
		if(projectName != ''){
			var projectClient = $('#projectClient').select2("val");
			var projectDescription = CKEDITOR.instances['ckeditor2'].getData();
			var projectStartDate = $('#projectStartDate').val();
			var projectEndDate = $('#projectEndDate').val();
			var projectTeams = $("#projectTeams").select2("val");

			$.ajax({
				type:'POST',
				url:'{{ route('update-project', Auth::user()->subdomain) }}',
				data: {
					id:c_project_id,
					name:projectName,
					client:projectClient,
					description:projectDescription,
					start_date:projectStartDate,
					end_date:projectEndDate,
					teams:projectTeams
				},
				success:function(data){
					$('#edit-close').trigger( "click" );
					location.reload(true);
				},
				error:function(error){

				}
			});
		}else{
			alert('Project name information is required');
		}
	});
	if ($('#ckeditor2').length) {
	    CKEDITOR.replace('ckeditor2');
	}
</script>
@endsection
