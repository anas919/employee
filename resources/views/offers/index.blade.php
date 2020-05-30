@extends('layouts.app')

@section('title')
 Offers
@endsection
@section('content')
<div class="content-box">
  	<div class="row">
		<div class="col-sm-12">
          	<!--START - Recent Ticket Comments-->
          	<div class="element-wrapper">
          		<div class="element-actions">
          			<div class="form-inline justify-content-sm-end">
          				<button class="btn btn-sm btn-primary btn-upper" data-target="#addOfferModal" data-toggle="modal" type="button"><i class="os-icon os-icon-ui-22"></i><span>Add Job Opportunity</span></button>
          			</div>
          		</div>
                <h6 class="element-header">
                  	Offers
                </h6>
                <div class="control-header">
	                <div class="row align-items-center">
	                  	<div class="col-8 col-lg-7">
	                    	<form action="" class="form-inline">
	                    		<div class="form-group mr-4">
						          	<div class="input-search-w">
					                    <input class="form-control rounded bright" placeholder="Search candidates members..." type="search">
					                </div>
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
									<th>
										<div class="form-check" style="margin-top: auto;">
											<label>
												<input type="checkbox" name="check"> <span class="label-text"></span>
											</label>
										</div>
									</th>
									<th>
										Candidates
									</th>
									<th>
										Job Title
									</th>
									<th>
										Status
									</th>
									<th>
										Responsible
									</th>
									<th>
										Actions
									</th>
								</tr>
							</thead>
							<tbody>
								@forelse($offers as $offer)
								<tr>
									<td class="text-center" style="display: inline-flex;">
										<div class="form-check" style="margin-top: auto;">
											<label>
												<input type="checkbox" name="check"> <span class="label-text"></span>
											</label>
										</div>
									</td>
									<td>
										@if(count($offer->candidates))
											@foreach($offer->candidates as $candidate)
											<div class="cell-image-list">
													@if($candidate->media_id)
														<div class="cell-img">
															<div class="user-with-avatar">
																<img alt="{{ $candidate->id }}" src="{{ asset('storage/'.$candidate->media->reference) }}">
															</div>
														</div>
													@else
														<div class="cell-img avatar">
															{{ substr($candidate->first_name, 0, 1).substr($candidate->last_name, 0, 1)}}
														</div>
													@endif
											</div>
											@endforeach
										@else
										No Candidates
										@endif
									</td>
									<td>
										<span>{{ $offer->title }}</span>
									</td>
									<td>
										<span class="badge badge-success-inverted">{{ $offer->status }}</span>
									</td>
									<td>
										<div class="cell-image-list">
											@if($offer->responsible->media_id)
												<div class="cell-img">
													<div class="user-with-avatar">
														<img alt="" src="{{ asset('storage/'.$offer->responsible->media->reference) }}">
													</div>
												</div>
											@else
												<div class="cell-img avatar">
													{{ substr($offer->responsible->first_name, 0, 1).substr($offer->responsible->last_name, 0, 1)}}
												</div>
											@endif
										</div>
									</td>
									<td class="row-actions">
										<div class="btn-group mr-1 mb-1">
											<button aria-expanded="false" aria-haspopup="true" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" id="dropdownMenuButton1" type="button">Actions</button>
											<div aria-labelledby="dropdownMenuButton1" class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 30px, 0px); top: 0px; left: 0px; will-change: transform;">
												<button class="dropdown-item" onclick="getShareableLink({{ $offer->id }});"><i class="os-icon os-icon-link-3"></i> Get shareable link</button> @if($offer->status == 'opened') <button class="dropdown-item" onclick="markAsClosed({{ $offer->id }});" id="offer-status-{{ $offer->id }}"><i class="os-icon os-icon-cancel-square"></i> Mark as closed</button> @else <button class="dropdown-item" onclick="markAsOpened({{ $offer->id }});" id="offer-status-{{ $offer->id }}"><i class="os-icon os-icon-cv-2"></i> Mark as opened</button> @endif<button class="dropdown-item" onclick="deleteOffer({{ $offer->id }});" id="offer-delete-{{ $offer->id }}"><i class="os-icon os-icon-ui-15"></i> Delete</button>
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
<div aria-hidden="true" aria-labelledby="addOfferModal" class="modal fade" id="addOfferModal" role="dialog" tabindex="-1">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="addOfferModal">
				  	Add Offer
				</h5>
				<button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> &times;</span></button>
			</div>
			<div class="modal-body">
				<form action="{{ route('add-offer', Auth::user()->subdomain) }}" method="POST">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="row">
						<div class="col-sm-12">
						  	<div class="form-group">
						    	<label for=""> Post Title *</label>
						    	<input class="form-control" placeholder="Enter post title" type="text" name="title" required>
						  	</div>
						</div>
						<div class="col-sm-12">
				         	<div class="form-group">
				                <label for=""> Responsible (Who is in charge of this offer) *</label>
				                <select class="form-control responsible-select" multiple="false" name="responsible" required=""></select>
				            </div>
				        </div>
						<div class="col-sm-12">
						  	<div class="form-group">
						    	<label for=""> Status</label>
              					<select class="form-control" name="status">
		                            <option value="draft">
		                              	Draft
		                            </option>
		                            <option value="opened">
		                              	Opened
		                            </option>
              					</select>
						  	</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
						        <div for="">
						        	<div class="row">
						        		<div class="col-6">
						        			Departments
						        		</div>
						        		<div class="col-6 text-right">
						        			<button class="small-edit" data-target="#addDepartmentModal" data-toggle="modal" type="button">Add department</button>
						        		</div>
						        	</div>
						       	</div>
								<select class="form-control" name="department" id="departments">
					                @forelse($departments as $department)
					                <option value="{{ $department->id }}">{{ $department->name }}</option>
					                @empty
					                <option disabled="" id="departments-empty">No departments</option>
					                @endforelse
              					</select>
							</div>
						</div>
						<div class="col-sm-12">
						  	<div class="form-group">
						    	<label for=""> Type</label>
              					<select class="form-control" name="type">
		                            <option value="contractor">
		                              	Contractor
		                            </option>
		                            <option value="full_time">
		                              	Full Time
		                            </option>
		                            <option value="intern">
		                              	Intern
		                            </option>
		                            <option value="part_time">
		                              	Part Time
		                            </option>
              					</select>
						  	</div>
						</div>
						<div class="col-sm-12">
						  	<div class="form-group">
						    	<label for=""> Experience</label>
              					<select class="form-control" name="experience">
		                            <option value="executive">
		                              	Executive
		                            </option>
		                            <option value="supervisor">
		                              	Supervisor
		                            </option>
		                            <option value="senior">
		                              	Senior
		                            </option>
		                            <option value="junior">
		                              	Junior
		                            </option>
		                            <option value="mid_level">
		                              	Mid Level
		                            </option>
              					</select>
						  	</div>
						</div>
						<div class="col-sm-6">
						  	<div class="form-group">
						    	<label for=""> Location</label>
              					<select class="form-control" name="country">
					                @forelse($countries as $country)
					                <option value="{{ $country->id }}">{{ ucfirst($country->country) }} ({{ strtoupper($country->code) }})</option>
					                @empty
					                <option disabled="">No Countries</option>
						            @endforelse
              					</select>
						  	</div>
						</div>
						<div class="col-sm-6">
						  	<div class="form-group">
						    	<label for=""> City *</label>
						    	<input class="form-control" type="text" name="city" required>
						  	</div>
						</div>
						<div class="col-sm-12">
						  	<div class="form-group">
						    	<label for=""> Compentation (Ex: 10$/1h)</label>
						    	<input class="form-control" placeholder="" type="text" name="compentation">
						  	</div>
						</div>
						<div class="col-sm-12">
						  	<div class="form-group">
						        <label for=""> Description *</label>
								<textarea cols="80" id="description" name="description" rows="10" required></textarea>
						    </div>
						</div>
						<div class="col-sm-12">
						  	<div class="form-group">
						        <label for=""> Applicant Qualifications *</label>
								<textarea cols="80" id="qualifications" name="qualifications" rows="10" required></textarea>
						    </div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<div class="form-check">
									<label>
										<input type="checkbox" name="resume" checked="checked"> <span class="label-text">Resume</span>
									</label>
								</div>
						    </div>
						</div>
						<div class="col-sm-6 form-group row">
				            <label class="col-sm-4 col-form-label">Required</label>
				            <div class="col-sm-8">
				              	<div class="form-check">
				                	<label><input type="radio" name="resume_required" value="y" checked> <span class="label-text">Yes</span></label>
				              	</div>
				              	<div class="form-check">
				                	<label><input type="radio" name="resume_required" value="n"> <span class="label-text">No</span></label>
				              	</div>
				            </div>
			          	</div>
						<div class="col-sm-6">
							<div class="form-group">
						        <div class="form-check">
									<label>
										<input type="checkbox" name="cover_letter"> <span class="label-text">Cover letter</span>
									</label>
								</div>
						    </div>
						</div>
						<div class="col-sm-6 form-group row">
				            <label class="col-sm-4 col-form-label">Required</label>
				            <div class="col-sm-8">
				              	<div class="form-check">
				                	<label><input type="radio" name="cover_letter_required"> <span class="label-text">Yes</span></label>
				              	</div>
				              	<div class="form-check">
				                	<label><input type="radio" name="cover_letter_required" checked> <span class="label-text">No</span></label>
				              	</div>
				            </div>
			          	</div>
						<div class="col-sm-6">
							<div class="form-group">
								<div class="form-check">
									<label>
										<input type="checkbox" name="portfolio"> <span class="label-text">Portfolio</span>
									</label>
								</div>
						    </div>
						</div>
						<div class="col-sm-6 form-group row">
				            <label class="col-sm-4 col-form-label">Required</label>
				            <div class="col-sm-8">
				              	<div class="form-check">
				                	<label><input type="radio" name="portfolio_required"> <span class="label-text">Yes</span></label>
				              	</div>
				              	<div class="form-check">
				                	<label><input type="radio" name="portfolio_required" checked> <span class="label-text">No</span></label>
				              	</div>
				            </div>
			          	</div>
						<div class="col-sm-6">
							<div class="form-group">
					          	<div class="form-check">
									<label>
										<input type="checkbox" name="desired_salary"> <span class="label-text">Desired Salary</span>
									</label>
								</div>
						    </div>
						</div>
						<div class="col-sm-6 form-group row">
				            <label class="col-sm-4 col-form-label">Required</label>
				            <div class="col-sm-8">
				              	<div class="form-check">
				                	<label><input type="radio" name="desired_salary_required"> <span class="label-text">Yes</span></label>
				              	</div>
				              	<div class="form-check">
				                	<label><input type="radio" name="desired_salary_required" checked> <span class="label-text">No</span></label>
				              	</div>
				            </div>
			          	</div>
						<div class="col-sm-12" id="add-question">
              				<button class="btn btn-sm btn-primary btn-upper" style="margin: 15px;" data-target="#addQuestionModal" data-toggle="modal" type="button"><span style=""><i class="os-icon os-icon-ui-22"></i> Add Question</span></button>
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
<div aria-hidden="true" aria-labelledby="addQuestionModal" class="modal fade" id="addQuestionModal" role="dialog" tabindex="-1">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="addOfferModal">
				  	Add Question to Offer
				</h5>
				<button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> &times;</span></button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-sm-12">
					  	<div class="form-group">
					    	<label for=""> Question</label>
					    	<input class="form-control" placeholder="Question here" type="text" id="question">
					  	</div>
					</div>
					<div class="col-sm-6 form-group row">
			            <label class="col-sm-4 col-form-label">Required</label>
			            <div class="col-sm-8">
			              	<div class="form-check">
			                	<label><input type="radio" name="question_required" value="y" checked="" id="question_required"> <span class="label-text">Yes</span></label>
			              	</div>
			              	<div class="form-check">
			                	<label><input type="radio" name="question_required" value="n" id="question_optional"> <span class="label-text">No</span></label>
			              	</div>
			            </div>
		          	</div>
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" data-dismiss="modal" type="button" id="close-question"> Close</button>
				<button class="btn btn-primary" type="button" onclick="addQuestion()"> Save</button>
			</div>
		</div>
	</div>
</div>
<div aria-hidden="true" aria-labelledby="linkModal" class="modal fade" id="linkModal" role="dialog" tabindex="-1">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="linkModal">
				  	Any one with this link can apply to offer
				</h5>
				<button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> &times;</span></button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
		                  	<label for="">Url</label>
							<div class="input-group">
								<div class="input-group-prepend" onclick="copyToClipboard()">
									<div class="input-group-text">
										<i class="os-icon os-icon-ui-55"></i>
									</div>
								</div>
								<input class="form-control" type="text" id="link">
							</div>
		                </div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" data-dismiss="modal" type="button" id="close-link-modal"> Close</button>
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
@endsection
@section('scripts')
<style>
.select2 {
	width: 100% !important;
}
.input-group-prepend {
	cursor: pointer;
}
</style>
<script>
	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
	var responsibles = [];
	@forelse($members as $member)
		responsibles.push({ id: {{ $member->id }}, text: '<div> @if ($member->media_id)<img src="{{ asset('storage/'.$member->media->reference) }}" width="30px" height="30px">{{ $member->first_name }} {{ $member->last_name }} @else <div class="avatar" style="border-radius: 50%;">{{ substr($member->first_name, 0, 1).substr($member->last_name, 0, 1) }}</div>{{ $member->first_name }} {{ $member->last_name }} @endif </div>' });
	@empty
	@endforelse
	$(".responsible-select").select2({
		maximumSelectionLength: 1,
		data: responsibles,
		templateResult: function (d) { return $(d.text); },
		templateSelection: function (d) { return $(d.text); },
	});
	function addQuestion(){
		if($('#question_required').is(':checked'))
			$('#add-question').after('<div class="col-sm-12"><div class="form-group"><label> Question</label><input class="form-control" placeholder="Enter question" type="text" name="req_questions[]" value="'+$('#question').val()+'"></div></div>');
		else
			$('#add-question').after('<div class="col-sm-12"><div class="form-group"><label> Question</label><input class="form-control" placeholder="Enter question" type="text" name="opt_questions[]" value="'+$('#question').val()+'"></div></div>');
		$('#close-question').trigger("click");
		$('#question').val('');
	}
	function getShareableLink(offer_id){
		console.log('{{ url('/') }}'+offer_id);
		$.ajax({
			type:'GET',
			url:'{{ url('/') }}/offers/getlink/'+offer_id,
			success:function(data){
				$('#link').val('{{ url('/') }}/offers/view/'+data.url);
				$('#linkModal').modal('show');
			},
			error:function(error){
				console.log(error);
			}
		});
	}
	function markAsClosed(offer_id){
		$.ajax({
			type:'GET',
			url:'{{ url('/') }}/offers/close/'+offer_id,
			success:function(data){
				$('#offer-status-'+offer_id).attr('onclick','markAsOpened('+offer_id+')');
				$('#offer-status-'+offer_id).html('<i class="os-icon os-icon-cv-2"></i> Mark as opened');
				alert(data.success);
			},
			error:function(error){
				console.log(error);
			}
		});
	}
	function markAsOpened(offer_id){
		$.ajax({
			type:'GET',
			url:'{{ url('/') }}/offers/open/'+offer_id,
			success:function(data){
				$('#offer-status-'+offer_id).attr('onclick','markAsClosed('+offer_id+')');
				$('#offer-status-'+offer_id).html('<i class="os-icon os-icon-cancel-square"></i> Mark as closed');
				alert(data.success);
			},
			error:function(error){
				console.log(error);
			}
		});
	}
	function deleteOffer(offer_id) {
		$.ajax({
			type:'GET',
			url:'{{ url('/') }}/offers/delete/'+offer_id,
			success:function(data){
				$('#offer-delete-'+offer_id).closest('tr').remove();
				alert(data.success);
			},
			error:function(error){
				console.log(error);
			}
		});
	}
	if ($('#description').length) {
    	CKEDITOR.replace('description').on( 'required', function( evt ) {
		    alert( 'Offer description is required.' );
		    evt.cancel();
		} );
  	}
	if ($('#qualifications').length) {
    	CKEDITOR.replace('qualifications').on( 'required', function( evt ) {
		    alert( 'Applicant Qualifications is required.' );
		    evt.cancel();
		} );
  	}

	$("#link").click(function() {
		$(this).select();
		document.execCommand("copy");
	});
	function copyToClipboard() {
		$("#link").select();
		document.execCommand("copy");
		alert('Copied to clipboard')
	}
	function addDepartment() {
		$('#loading').css('display','block');
		var name = $('#department').val();
		$.ajax({
			type:'POST',
			url:'{{ url('/') }}/departments/add/',
			data:{name:name},
			success:function(data){
				var o = new Option(data.department.name, data.department.id);
				$(o).html(data.department.name);/// jquerify the DOM object 'o'
				$("#departments").append(o);
				$('#departments-empty').remove();
				$('#loading').css('display','none');
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
