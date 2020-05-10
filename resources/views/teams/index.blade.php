@extends('layouts.app')

@section('title')
 Teams
@endsection
@section('content')
<div class="content-box">
    <div class="row">
		<div class="col-sm-12">
	        <!--START - Recent Ticket Comments-->
	        <div class="element-wrapper">
				<div class="element-actions">
					<div class="form-inline justify-content-sm-end">
						<button class="btn btn-sm btn-primary btn-upper" data-target="#addTeamModal" data-toggle="modal" type="button"><i class="os-icon os-icon-ui-22"></i><span>Add Team</span></button>
					</div>
				</div>
                <h6 class="element-header">
                   	Teams
                </h6>
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
										Team Name
									</th>
									<th>
										Projects
									</th>
									<th>
										Team leaders
									</th>
									<th>
										Members
									</th>
									<th class="text-center">
										Actions
									</th>
                                </tr>
                           	</thead>
                          	<tbody>
                          		@forelse($teams as $team)
                              	<tr>
                              		<th width="58px">
										<div class="form-check" style="margin-top: auto;">
											<label>
												<input type="checkbox" name="check"> <span class="label-text"></span>
											</label>
										</div>
									</th>
									<td>
										{{ $team->name }}<button onclick="editTeam({{ $team->id }})" class="danger small-edit"><i class="os-icon os-icon-pencil-2"></i></button>
									</td>
									<td>
										@if(count($team->projects))
										<div class="cell-image-list">
											@foreach($team->projects as $project)
											<div class="cell-img avatar" style=";border-radius: 50%;">
												{{ substr($project->name, 0, 3) }}
											</div>
											@endforeach
											{{-- <div class="cell-img-more">
											+ 5 more
											<a class="danger" href="#"><i class="os-icon os-icon-pencil-2"></i></a>
											</div> --}}
										</div>
										@else
										No Projects
										@endif
									</td>
									<td>
										@if(count($team->leads))
										<div class="cell-image-list">
											@foreach($team->leads as $leader)
												@if($leader->media_id)
													<div class="cell-img">
														<div class="user-with-avatar">
															<img alt="" src="{{ asset('storage/'.$leader->media->reference) }}">
														</div>
													</div>
												@else
													<div class="cell-img avatar">
														{{ substr($leader->first_name, 0, 1).substr($leader->last_name, 0, 1)}}
													</div>
												@endif
											@endforeach
										</div>
										@else
										No Leaders
										@endif
									</td>
									<td>
										@if(count($team->members))
										<div class="cell-image-list">
											@foreach($team->members as $member)
												@if($member->media_id)
													<div class="cell-img">
														<div class="user-with-avatar">
															<img alt="" src="{{ asset('storage/'.$member->media->reference) }}">
														</div>
													</div>
												@else
													<div class="cell-img avatar">
														{{ substr($member->first_name, 0, 1).substr($member->last_name, 0, 1)}}
													</div>
												@endif
											@endforeach
										</div>
										@else
										No Members
										@endif
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
<div aria-hidden="true" aria-labelledby="addTeamModal" class="modal fade" id="addTeamModal" role="dialog" tabindex="-1">
   	<div class="modal-dialog" role="document">
    	<div class="modal-content">
     		<div class="modal-header">
		      	<h5 class="modal-title" id="exampleModalLabel">
		        	Create Team
		      	</h5>
      			<button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> &times;</span></button>
     		</div>
     		<div class="modal-body">
      			<form action="{{ route('add-team', Auth::user()->subdomain) }}" enctype="multipart/form-data" method="POST">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
       				<div class="row">
				        <div class="col-sm-12">
				           	<div class="form-group">
				             	<label for=""> Team Name</label>
				             	<input class="form-control" placeholder="Enter a name" type="text" name="name" required="">
				           </div>
				        </div>
				        <div class="col-sm-6">
				         	<div class="form-group">
				                <label for=""> Team Leaders</label>
				                <select class="form-control team-leaders-select" multiple="true" name="team_leaders[]"></select>
				            </div>
				        </div>
				        <div class="col-sm-6">
				         	<div class="form-group">
				                <label for=""> Team Members</label>
				                <select class="form-control team-members-select" multiple="true" name="team_members[]"></select>
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
<div aria-hidden="true" aria-labelledby="editTeamModal" class="modal fade" id="editTeamModal" role="dialog" tabindex="-1">
   	<div class="modal-dialog" role="document">
    	<div class="modal-content">
     		<div class="modal-header">
		      	<h5 class="modal-title" id="exampleModalLabel">
		        	Edit Team
		      	</h5>
      			<button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> &times;</span></button>
     		</div>
     		<div class="modal-body">
      			<form>
					{{-- <input type="hidden" name="_token" value="{{  }}"> --}}
       				<div class="row">
				        <div class="col-sm-12">
				           	<div class="form-group">
				             	<label for=""> Team Name</label>
				             	<input class="form-control" placeholder="Enter a name" type="text" id="teamName" required="">
				           </div>
				        </div>
				        <div class="col-sm-6">
				         	<div class="form-group">
				                <label for=""> Team Leaders</label>
				                <select class="form-control edit-team-leaders" multiple="true" name="teamLeaders[]" id="teamLeaders"></select>
				            </div>
				        </div>
				        <div class="col-sm-6">
				         	<div class="form-group">
				                <label for=""> Team Members</label>
				                <select class="form-control edit-team-members" multiple="true" name="teamMembers[]" id="teamMembers"></select>
				            </div>
				        </div>
				        <div class="col-sm-12">
				         	<div class="form-group">
				                <label for=""> Projects</label>
				              	<select class="form-control edit-projects" multiple="true" name="teamProjects[]" id="teamProjects"></select>
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
	.select2 {
  		width: 100% !important;
 	}
</style>
<script>
	var team_leaders = [];
	var team_members = [];
	var projects = [];
	@forelse($members as $member)
		team_leaders.push({ id: {{ $member->id }}, text: '<div> @if ($member->media_id)<img src="{{ asset('storage/'.$member->media->reference) }}" width="30px" height="30px">{{ $member->first_name }} {{ $member->last_name }} @else <div class="avatar" style="border-radius: 50%;">{{ substr($member->first_name, 0, 1).substr($member->last_name, 0, 1) }}</div>{{ $member->first_name }} {{ $member->last_name }} @endif </div>' });
		team_members.push({ id: {{ $member->id }}, text: '<div> @if ($member->media_id)<img src="{{ asset('storage/'.$member->media->reference) }}" width="30px" height="30px">{{ $member->first_name }} {{ $member->last_name }} @else <div class="avatar" style="border-radius: 50%;">{{ substr($member->first_name, 0, 1).substr($member->last_name, 0, 1) }}</div>{{ $member->first_name }} {{ $member->last_name }} @endif </div>' });
	@empty
	@endforelse
	@forelse($projects as $project)
		projects.push({id: {{$project->id}},text: '<div>{{$project->name}}</div>'});
	@empty
	@endforelse
	$(".team-leaders-select").select2({
		data: team_leaders,
		templateResult: function (d) { return $(d.text); },
		templateSelection: function (d) { return $(d.text); },
	});
	$(".team-members-select").select2({
		data: team_members,
		templateResult: function (d) { return $(d.text); },
		templateSelection: function (d) { return $(d.text); },
	});
	$(".projects-select").select2({
		data: projects,
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
	function editTeam(teamId) {
		c_team_id = teamId;
		selected_team_leads = [];
		selected_team_members = [];
		selected_team_projects = [];
		$.ajax({
			type:'GET',
			url:'{{ url('/') }}/teams/edit/'+teamId,
			success:function(data){
				$('#teamName').val(data.team.name)
				//Those are team leaders of this team
				for(let i = 0; i < data.leads.length; i++){
					selected_team_leads.push(data.leads[i]['id']);
				}
				for(let i = 0; i < data.members.length; i++){
					selected_team_members.push(data.members[i]['id']);
				}
				for(let i = 0; i < data.projects.length; i++){
					selected_team_projects.push(data.projects[i]['id']);
				}
				$(".edit-team-leaders").select2({
					// maximumSelectionLength: 1,
					data: team_leaders,
					templateResult: function (d) { return $(d.text); },
					templateSelection: function (d) { return $(d.text); },
				});
				$(".edit-team-leaders").val(selected_team_leads).trigger('change');
				$(".edit-team-members").select2({
					data: team_members,
					templateResult: function (d) { return $(d.text); },
					templateSelection: function (d) { return $(d.text); },
				});
				$(".edit-team-members").val(selected_team_members).trigger('change');
				$(".edit-projects").select2({
					data: projects,
					templateResult: function (d) { return $(d.text); },
					templateSelection: function (d) { return $(d.text); },
				});
				$(".edit-projects").val(selected_team_projects).trigger('change');
				$('#editTeamModal').modal('show');
			},
			error:function(error){

			}
		});
	}
	$("#edit-save").click(function(){
		var teamName = $("#teamName").val();
		var teamLeads = $("#teamLeaders").select2("val");
		var teamMembers = $("#teamMembers").select2("val");
		var teamProjects = $("#teamProjects").select2("val");
		$.ajax({
			type:'POST',
			url:'{{ route('update-team', Auth::user()->subdomain) }}',
			data: {
				id:c_team_id,
				name:teamName,
				leads:teamLeads,
				members:teamMembers,
				projects:teamProjects
			},
			success:function(data){
				$('#edit-close').trigger( "click" );
				location.reload(true);
			},
			error:function(error){

			}
		});
	})
</script>
@endsection
