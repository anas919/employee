@extends('layouts.app')

@section('title')
 Role & Permissions
@endsection
@section('content')
<style>
.table td {
    vertical-align: top;
}
.table td {
    border-top: none;
}
.module {
	text-transform: capitalize;
}
.form-check {
	padding:0;
}
</style>
<div class="content-box">
	<div class="row pt-4">
		<div class="col-sm-12">
			<!--START - Recent Ticket Comments-->
			<div class="element-wrapper">
				<h6 class="element-header">
					Users
				</h6>
				<div class="element-box-tp">
					<div class="table-responsive">
						<table class="table element-box">
							<tr>
								<td style="width: 20%;">
									<table style="width: 100%;">
										<div id="roles">
											@foreach($roles as $role)
										    	<tr><td onclick="selectRole({{$role->id}},'dashboard')" id="role-{{$role->id}}" class="role">{{$role->name}} <span class="float-right"><i class="os-icon os-icon-arrow-right2"></i></span></td></tr>
											@endforeach
										</div>
										<tr><td><button class="btn btn-sm btn-primary btn-upper" data-target="#addRoleModal" data-toggle="modal" type="button"><i class="os-icon os-icon-ui-22"></i><span>Add Role</span></button></td></tr>
								    </table>
								</td>
								<td>
									<table style="width: 100%;">
										<tr>
											<td style="width: 20%;">
												<table style="width: 100%;">
													<tr><td onclick="selectModule('dashboard')" class="module" id="dashboard">Home <span class="float-right"><i class="os-icon os-icon-arrow-right2"></i></span></td></tr>
													<tr><td onclick="selectModule('members')" class="module" id="members">Employees <span class="float-right"><i class="os-icon os-icon-arrow-right2"></i></span></td></tr>
													<tr><td onclick="selectModule('offers')" class="module" id="offers">Offers <span class="float-right"><i class="os-icon os-icon-arrow-right2"></i></span></td></tr>
													<tr><td onclick="selectModule('candidates')" class="module" id="candidates">Candidates <span class="float-right"><i class="os-icon os-icon-arrow-right2"></i></span></td></tr>
													<tr><td onclick="selectModule('payroll')" class="module" id="payroll">Payroll <span class="float-right"><i class="os-icon os-icon-arrow-right2"></i></span></td></tr>
													<tr><td onclick="selectModule('projects')" class="module" id="projects">Projects <span class="float-right"><i class="os-icon os-icon-arrow-right2"></i></span></td></tr>
													<tr><td onclick="selectModule('teams')" class="module" id="teams">Teams <span class="float-right"><i class="os-icon os-icon-arrow-right2"></i></span></td></tr>
													<tr><td onclick="selectModule('timeoffs')" class="module" id="timeoffs">Time-Offs <span class="float-right"><i class="os-icon os-icon-arrow-right2"></i></span></td></tr>
													<tr><td onclick="selectModule('schedules')" class="module" id="schedules">Schedules <span class="float-right"><i class="os-icon os-icon-arrow-right2"></i></span></td></tr>
													<tr><td onclick="selectModule('tasks')" class="module" id="tasks">Tasks <span class="float-right"><i class="os-icon os-icon-arrow-right2"></i></span></td></tr>
													<tr><td onclick="selectModule('invoices')" class="module" id="invoices">Invoices <span class="float-right"><i class="os-icon os-icon-arrow-right2"></i></span></td></tr>
													<tr><td onclick="selectModule('screenshots')" class="module" id="screenshots">Screenshots <span class="float-right"><i class="os-icon os-icon-arrow-right2"></i></span></td></tr>
													<tr><td onclick="selectModule('apps')" class="module" id="apps">Apps <span class="float-right"><i class="os-icon os-icon-arrow-right2"></i></span></td></tr>
													<tr><td onclick="selectModule('urls')" class="module" id="urls">Urls <span class="float-right"><i class="os-icon os-icon-arrow-right2"></i></span></td></tr>
													<tr><td onclick="selectModule('clients')" class="module" id="clients">Clients <span class="float-right"><i class="os-icon os-icon-arrow-right2"></i></span></td></tr>
												</table>
											</td>
											<td>
											    <table style="width: 100%;">
												    <tr>
														<td>
															<div id="permissions"></div>
														</td>
													</tr>
											    </table>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</div>
				</div>
			</div>
			<!--END - Recent Ticket Comments-->
		</div>
	</div>
</div>
<div aria-hidden="true" aria-labelledby="addRoleModal" class="modal fade" id="addRoleModal" role="dialog" tabindex="-1">
   	<div class="modal-dialog" role="document">
    	<div class="modal-content">
     		<div class="modal-header">
		      	<h5 class="modal-title">
		        	Add Role
		      	</h5>
      			<button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> &times;</span></button>
     		</div>
     		<div class="modal-body">
      			<form>
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
						    	<label for=""> Role Name</label>
						    	<input class="form-control" placeholder="Role Name" type="text" id="role">
						  	</div>
				        </div>
    				</div>
    				<div class="modal-footer">
				      	<button class="btn btn-secondary" data-dismiss="modal" type="button" id="role-close"> Close</button>
				      	<button class="btn btn-primary" type="button" id="role-save"> Save</button>
				    </div>
      			</form>
     		</div>
	    </div>
   	</div>
</div>
@endsection
@section('scripts')
<style>
	.role {
		cursor: pointer;
	}
	.selected-role {
		background-color: #323c58;
		color: #fff;
	}
	.selected-module {
		background-color: #323c58;
		color: #fff;
	}
	.module {
		cursor: pointer;
	}
	.role:hover {
		background-color: #323c58;
		color: #fff;
	}
</style>
<script type="text/javascript">
	var selectedRole = 1;
	var selectedModule = 'dashboard';
	let assign_permissions = [];
	let detach_permissions = [];
	Array.prototype.remove = function() {
	    var what, a = arguments, L = a.length, ax;
	    while (L && this.length) {
	        what = a[--L];
	        while ((ax = this.indexOf(what)) !== -1) {
	            this.splice(ax, 1);
	        }
	    }
	    return this;
	};
	function selectRole(role_id, module){
		selectedRole = role_id;
		selectedModule = module;
		assign_permissions = [];
		detach_permissions = [];
		$('#loading').css('display','block');
		$.ajax({
			type:'GET',
			url:'{{ url('/') }}/permissions/select-role/'+role_id+'/'+module,
			success:function(data){
				$('#loading').css('display','none');
				var permissions = '';
				for(let i = 0; i < data.permissions.length; i++){
					if (data.permissions[i]['has_permission']) {
						permissions += '<div class="form-check"><label><input type="checkbox" onclick="checkPermission('+data.permissions[i]['id']+')" checked="checked"> <span class="label-text">'+data.permissions[i]['description']+'</span></label></div>';
						assign_permissions.push(data.permissions[i]['id']);
					}else{
						permissions += '<div class="form-check"><label><input type="checkbox" onclick="checkPermission('+data.permissions[i]['id']+')"> <span class="label-text">'+data.permissions[i]['description']+'</span></label></div>';
					}
				}
				permissions += '<button onclick="assignPermissions()" class="btn btn-sm btn-primary" type="button">Save</button>';
				$('.module').removeClass('selected-module');
				$('#'+module).addClass('selected-module');
				$('#permissions').html(permissions);
				$('.role').removeClass('selected-role');
				$('#role-'+role_id).addClass('selected-role');
			},
			error:function(error){
				console.log(error);
			}
		});
	}
	function selectModule(module){
		selectRole(selectedRole, module);
	}
	$('#role-save').on('click', function(){
		$('#loading').css('display','block');
		var roleName = $('#role').val();
		$.ajax({
			type:'POST',
			url:'{{ route('add-role', Auth::user()->subdomain) }}',
			data: {
				name:roleName,
			},
			success:function(data){
				$('#loading').css('display','none');
				$('#roles').append('<tr><td onclick="selectRole('+data.role.id+')" id="role-'+data.role.id+'" class="role">'+data.role.name+' <span class="float-right"><i class="os-icon os-icon-arrow-right2"></i></span></td></tr>')
				$('#role-close').trigger("click");
			},
			error:function(error){
				console.log(error);
			}
		});
	});
	function checkPermission(permission){
		if(!assign_permissions.includes(permission)){
			assign_permissions.push(permission);
		}else{
			assign_permissions.remove(permission);
			detach_permissions.push(permission);
		}
	}
	function assignPermissions(){
		$('#loading').css('display','block');
		$.ajax({
			type:'POST',
			url:'{{ route('assign-permissions', Auth::user()->subdomain) }}',
			data: {
				role: selectedRole,
				module: selectedModule,
				assignedPermissions: assign_permissions,
				detachedPermissions: detach_permissions,
			},
			success:function(data){
				$('#loading').css('display','none');
				console.log(data);
			},
			error:function(error){
				console.log(error);
			}
		});
	}
</script>
@endsection
