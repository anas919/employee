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
								<td>
									<table style="width: 100%;">
										@foreach($roles as $role)
									    	<tr><td onclick="selectRole({{$role->id}})" id="role-{{$role->id}}" class="role">{{$role->name}} <span class="float-right"><i class="os-icon os-icon-arrow-right2"></i></span></td></tr>
										@endforeach
										<tr><td><button class="btn btn-sm btn-primary btn-upper" data-target="#addRoleModal" data-toggle="modal" type="button"><i class="os-icon os-icon-ui-22"></i><span>Add Role</span></button></td></tr>
								    </table>
								</td>
								<td>
									<table style="width: 100%;">
										<tr>
											<td>
												<table style="width: 100%;">
													<tr><td onclick="selectModule('employees')" class="module" id="employees">Employees</td></tr>
													<tr><td onclick="selectModule('offers')" class="module" id="offers">Offers</td></tr>
													<tr><td onclick="selectModule('candidates')" class="module" id="candidates">Candidates</td></tr>
													<tr><td onclick="selectModule('payroll')" class="module" id="payroll">Payroll</td></tr>
													<tr><td onclick="selectModule('schedules')" class="module" id="schedules">Schedules</td></tr>
											    </table>
											</td>
											<td>
											    <table style="width: 100%;">
												    <tr>
														<td>
															<div class="form-check">
																<label>
																	<input type="checkbox" name="resume" checked="checked"> <span class="label-text">view_members</span>
																</label>
															</div>
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
						    	<input class="form-control" placeholder="Role Name" type="text" name="role" id="role">
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
	.role{
		cursor: pointer;
	}
	.role:hover{
		background-color: #323c58;
		color: #fff;
	}
	.table {
		/* background-color: #fff; */
	}
</style>
<script type="text/javascript">
	function selectRole(role_id){
		$('#loading').css('display','block');
		$.ajax({
			type:'GET',
			url:'{{ url('/') }}/permissions/select-role/'+role_id,
			success:function(data){
				$('#loading').css('display','none');
				console.log(data)
			},
			error:function(error){
				console.log(error);
			}
		});
		var roleName = 'Owner';
		$('#role-'+role_id).html(roleName+' <span class="float-right"><i class="os-icon os-icon-arrow-right2"></i></span>');
	}
	function selectModule(module){
		$('#'+module).html(module+' <span class="float-right"><i class="os-icon os-icon-arrow-right2"></i></span>');
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
				console.log(data);
				$('#role-close').trigger("click");
			},
			error:function(error){
				console.log(error);
			}
		});
	});
</script>
@endsection
