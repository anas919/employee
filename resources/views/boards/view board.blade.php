@extends('layouts.app')

@section('title')
 {{ $board->title }}
@endsection
@section('content')
<div class="content-box">
  	<div class="control-header">
	  	<div class="row align-items-center">
	    	<div class="col-8 col-lg-7">
	      	  <form action="" class="form-inline">
	        		<div class="form-group mr-4">
	          			<label class="mr-2" for="">Category</label>
	          			<select class="form-control-sm">
				            <option>
				              Management
				            </option>
				            <option>
				              Sales Team
				            </option>
	          			</select>
	        		</div>
	        		<div class="form-group d-none d-md-flex">
	          			<label class="mr-2" for="">Order By</label>
	          			<select class="form-control-sm">
				            <option>
				              Date
				            </option>
				            <option>
				              Lead Count
				            </option>
	          			</select>
	        		</div>
	      		</form>
	    	</div>
	    	<div class="col-4 col-lg-5 text-right">
	    		<div class="cell-image-list" style="margin-right: 13%;">
				  	<div class="cell-img" style="background-image: url({{ asset('img/portfolio9.jpg') }});border-radius: 50%;"></div>
				  	<div class="cell-img" style="background-image: url({{ asset('img/portfolio2.jpg') }});border-radius: 50%;"></div>
				  	<div class="cell-img" style="background-image: url({{ asset('img/portfolio12.jpg') }});border-radius: 50%;"></div>
				  	<div class="cell-img-more">
				    	+ 5 more
				  	</div>
				</div>
	      		<a class="btn btn-sm btn-primary btn-upper" href="#"><i class="os-icon os-icon-ui-22"></i><span>Invite Employee</span></a>
	    	</div>
	  	</div>
	</div>
	<div class="pipelines-w">
	  	<div class="row" id="tasklists">
	  		@forelse($board->tasklists->sortBy('order') as $tasklist)
			<div class="col-lg-4 col-xxl-3">
				<div class="pipeline white lined-primary">
	        		<div class="pipeline-header">
			          	<h5 class="editable-text" data-tasklist="{{ $tasklist->id }}">
			          		<i class="icon-cursor-move"></i>
			          		<span>{{ $tasklist->title }}</span>
			          	</h5>
			          	<div class="pipeline-header-numbers">
							<div class="pipeline-value">
								{{-- $0.00 --}}
							</div>
							<div class="pipeline-count">
								0 members
							</div>
						</div>
						<div class="pipeline-settings os-dropdown-trigger">
							<i class="os-icon os-icon-hamburger-menu-1"></i>
							<div class="os-dropdown">
								<div class="icon-w">
									<i class="os-icon os-icon-ui-46"></i>
								</div>
								<ul>
									<li>
										<button onclick="createCard({{ $tasklist->id }})" class="small-edit" type="button"><i class="os-icon os-icon-ui-22"></i><span>Add Card</span></button>
									</li>
									<li>
										<button onclick="duplicateList({{ $tasklist->id }})" class="small-edit" type="button"><i class="os-icon os-icon-grid-10"></i><span>Duplicate List</span></button>
									</li>
									<li>
										<button onclick="archiveList({{ $tasklist->id }})" class="small-edit" type="button"><i class="os-icon os-icon-ui-44"></i><span>Archive List</span></button>
									</li>
								</ul>
							</div>
						</div>
					</div>
	        		<div class="pipeline-body" id="pipeline-{{ $tasklist->id }}">
	        			@forelse($tasklist->cards->sortByDesc('order') as $card)
	          			<div class="pipeline-item" data-tasklist="{{ $tasklist->id }}" data-card="{{ $card->id }}">
	            			<div class="pi-controls">
	              				<div class="pi-settings os-dropdown-trigger">
	                				<i class="os-icon os-icon-ui-46"></i>
                					<div class="os-dropdown">
                  						<div class="icon-w">
                    						<i class="os-icon os-icon-ui-46"></i>
                  						</div>
                  						<ul>
                  							<li>
                      							<button onclick="assignMembers({{ $card->id }})" class="small-edit" type="button"><i class="os-icon os-icon-users"></i><span>Assign Members</span></button>
											</li>
                    						<li>
                      							<button onclick="editCard({{ $card->id }})" class="small-edit" type="button"><i class="os-icon os-icon-ui-49"></i><span>Edit Card</span></button>
											</li>
						                    <li>
						                      	<button onclick="duplicateCard({{ $card->id }})" class="small-edit" type="button"><i class="os-icon os-icon-grid-10"></i><span>Duplicate Card</span></button>
						                    </li>
						                    <li>
						                      	<button onclick="removeCard({{ $card->id }})" class="small-edit" type="button"><i class="os-icon os-icon-ui-15"></i><span>Remove Card</span></button>
						                    </li>
						                    <li>
						                      	<button onclick="archiveCard({{ $card->id }})" class="small-edit" type="button"><i class="os-icon os-icon-ui-44"></i><span>Archive Card</span></button>
						                    </li>
      									</ul>
						            </div>
						        </div>
	              				<div class="status status-green" data-placement="top" data-toggle="tooltip" title="Active Status"></div>
				            </div>
				            <div class="pi-body">
								<div class="pi-info">
									<div class="h6 pi-name" id="card-title-{{ $card->id }}">
									  	{{ $card->title }}
									</div>
								</div>
				            </div>
				            <div class="pi-foot">
				              	<div class="tags">
				                	<button class="btn btn-outline-primary badge badge-primary-inverted">Details</button>
				                	<button class="btn btn-outline-danger badge badge-danger-inverted" id="card-due_date-{{ $card->id }}">@if($card->due_date){{ (new DateTime($card->due_date))->format('M d,Y') }}@endif</button>
				              	</div>
				              	<div class="cell-image-list" id="card-members-{{ $card->id }}">
									@if(count($card->members))
										@foreach($card->members as $member)
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
										@endforeach
									@else
									<small>No Members</small>
									@endif
								</div>
				            </div>
	          			</div>
	          			@empty
	          			@endforelse
	        		</div>
	      		</div>
	      	</div>
	  		@empty
	  		@endforelse
	    	<div class="col-lg-4 col-xxl-3" id="addListBtn">
	    		<button onclick="createList()" class="btn btn-primary" type="button"><i class="os-icon os-icon-ui-22"></i><span>Add List</span></button>
	    	</div>
	  	</div>
	</div>
</div>
<div aria-hidden="true" aria-labelledby="assignMembersModal" class="modal fade" id="assignMembersModal" role="dialog" tabindex="-1">
   	<div class="modal-dialog" role="document">
    	<div class="modal-content">
     		<div class="modal-header">
		      	<h5 class="modal-title" id="exampleModalLabel">
		        	Edit Card
		      	</h5>
      			<button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> &times;</span></button>
     		</div>
     		<div class="modal-body">
      			<form>
					{{-- <input type="hidden" name="_token" value="{{  }}"> --}}
       				<div class="row">
						<div class="col-sm-12">
				         	<div class="form-group">
				                <label for=""> Members</label>
				                <select class="form-control assign-members-select" multiple="true" name="cardMembers[]" id="cardMembers"></select>
				            </div>
				        </div>
    				</div>
    				<div class="modal-footer">
				      	<button class="btn btn-secondary" data-dismiss="modal" type="button" id="assign-members-close"> Close</button>
				      	<button class="btn btn-primary" type="button" id="assign-members-save"> Save</button>
				    </div>
      			</form>
     		</div>
	    </div>
   	</div>
</div>
<div aria-hidden="true" class="modal fade" id="editCardModal" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          	<div class="modal-header faded smaller">
            	<div class="modal-title">
              		<span id="assignedMembers" class="cell-image-list">Assigned to:</span><span> Due Date: </span><strong>Sep 12th, 2017</strong>
            	</div>
            	<button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> &times;</span></button>
          	</div>
          	<div class="modal-body">
	            <form>

	              	<div class="row">
		              	<div class="col-sm-12">
			                <label for="">Task name</label><input class="form-control" placeholder="Enter task name" type="text" id="cardTitle">
		              	</div>
		              	<div class="col-sm-12">
							<div class="form-group">
						        <label for=""> Description</label>
								<textarea cols="80" id="ckeditor2" name="cardCkeditor1" rows="10"></textarea>
						    </div>
						</div>
	                	<div class="col-sm-6">
	                  		<div class="form-group">
	                    		<label for=""> Due Date</label>
	                    		<div class="date-input">
	                      			<input class="single-daterange form-control" placeholder="Due Date" type="text" value="" id="cardDueDate">
	                    		</div>
	                  		</div>
	                	</div>
	            		<div class="col-sm-6">
	                  		<div class="form-group">
	                    		<label for="">Priority</label>
	                    		<select class="form-control" id="cardPriority">
	                      			<option value="high">
	                        			High Priority
	                      			</option>
	                      			<option value="normal">
	                        			Normal Priority
	                      			</option>
	                      			<option value="low">
	                        			Low Priority
	                      			</option>
	                    		</select>
	                  		</div>
	                	</div>
	              	</div>
		         	<div class="form-group">
		                <label for=""> Members</label>
		                <select class="form-control edit-members-select" multiple="true" name="editcardMembers[]" id="editcardMembers"></select>
		            </div>
	              	<div class="form-group">
	                	<label for="">Media Attached</label>
	                	<div class="attached-media-w">
	                  		<img src="{{ asset('img/portfolio9.jpg') }}"><img src="{{ asset('img/portfolio2.jpg') }}"><img src="{{ asset('img/portfolio12.jpg') }}"><a class="attach-media-btn" href="#"><i class="os-icon os-icon-ui-22"></i><span>Add Attached Files</span></a>
	                	</div>
	              	</div>
	        	</form>
      		</div>
	        <div class="modal-footer buttons-on-left">
	            <button class="btn btn-teal" type="button" id="edit-members-save"> Save changes</button><button class="btn btn-link" data-dismiss="modal" type="button" id="edit-members-close"> Cancel</button>
	      	</div>
    	</div>
	</div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('bower_components/dragula.js/dist/dragula.min.js') }}"></script>
<link href="{{ asset('bower_components/dragula.js/dist/dragula.min.css') }}" rel="stylesheet">
<script>
	var members_data = [];
	@forelse($members as $member)
		members_data.push({ id: {{ $member->id }}, text: '<div> @if ($member->media_id)<img src="{{ asset('storage/'.$member->media->reference) }}" width="30px" height="30px">{{ $member->first_name }} {{ $member->last_name }} @else <div class="avatar" style="border-radius: 50%;">{{ substr($member->first_name, 0, 1).substr($member->last_name, 0, 1) }}</div>{{ $member->first_name }} {{ $member->last_name }} @endif </div>' });
	@empty
	@endforelse
	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
	function createList() {
		if($('#listCreate').length){
			alert('You already creating a list, Finish the list you\'re creating first');
		}else{
			$('#addListBtn').remove();
			$('#tasklists').append('<div class="col-lg-4 col-xxl-3" id="listCreate"><div class="pipeline white lined-danger" style="padding-top: 2px;"><button onclick="closeList()" class="close" type="button">×</button><div class="pipeline-body"><input class="form-control" placeholder="List title" type="text" id="nameList"><button class="mr-2 mb-2 btn btn-primary btn-sm" type="button" style="width: 100%;margin-top: 10px;" onclick="addList()"> Create list</button></div></div></div><div class="col-lg-4 col-xxl-3" id="addListBtn"><button onclick="createList()" class="btn btn-primary" type="button"><i class="os-icon os-icon-ui-22"></i><span>Add List</span></button></div>');
		}
	}
	function closeList(){
		$('#listCreate').remove();
	}
	function addList() {
		var name = $('#nameList').val();
		$.ajax({
			type:'POST',
			url:'{{ url('/') }}/org/'+{{ Auth::user()->organization_id }}+'/tasklists/add',
			data:{ name: name, board_id: {{$board->id}} },
			success:function(data){
			  	$('#listCreate').remove();
				$('#addListBtn').before('<div class="col-lg-4 col-xxl-3"><div class="pipeline white lined-primary"><div class="pipeline-header"><h5>'+data.tasklist.title+'</h5><div class="pipeline-header-numbers"><div class="pipeline-value"></div><div class="pipeline-count">0 members</div></div><div class="pipeline-settings os-dropdown-trigger"><i class="os-icon os-icon-hamburger-menu-1"></i><div class="os-dropdown"><div class="icon-w"><i class="os-icon os-icon-ui-46"></i></div><ul><li><button onclick="createCard('+data.tasklist.id+')" class="small-edit" type="button"><i class="os-icon os-icon-ui-22"></i><span>Add Card</span></button></li><li><button onclick="duplicateList('+data.tasklist.id+')" class="small-edit" type="button"><i class="os-icon os-icon-grid-10"></i><span>Duplicate List</span></button></li><li><button onclick="archiveList('+data.tasklist.id+')" class="small-edit" type="button"><i class="os-icon os-icon-ui-44"></i><span>Archive List</span></button></li></ul></div></div></div><div class="pipeline-body" id="pipeline-'+data.tasklist.id+'"></div></div></div>');
			},
			error:function(error){
				console.log(error);
			}
		});
	}
	function duplicateList(tasklist_id){

	}
	function archiveList(tasklist_id){

	}
	function createCard(tasklist_id){
		if($('#card-'+tasklist_id).length){

		}else{
			$('#pipeline-'+tasklist_id).prepend('<div id="card-section-'+tasklist_id+'"><button onclick="closeCard('+tasklist_id+')" class="close" type="button">×</button><input class="form-control" placeholder="Card title" type="text" id="card-'+tasklist_id+'"><button class="mr-2 mb-2 btn btn-primary btn-sm" type="button" style="width: 100%;margin-top: 10px;" onclick="addCard('+tasklist_id+')"> Create board</button></div>');
		}
	}
	function closeCard(tasklist_id){
		$('#card-section-'+tasklist_id).remove();
	}
	function addCard(tasklist_id) {
		title = $('#card-'+tasklist_id).val();
		$.ajax({
			type:'POST',
			url:'{{ url('/') }}/org/'+{{ Auth::user()->organization_id }}+'/cards/add',
			data:{ tasklist_id: tasklist_id, title: title},
			success:function(data){
			  	$('#card-section-'+tasklist_id).remove();
			  	$('#pipeline-'+tasklist_id).prepend('<div class="pipeline-item"><div class="pi-controls"><div class="pi-settings os-dropdown-trigger"><i class="os-icon os-icon-ui-46"></i><div class="os-dropdown"><div class="icon-w"><i class="os-icon os-icon-ui-46"></i></div><ul><li><button onclick="assignMembers('+data.card.id+')" class="small-edit" type="button"><i class="os-icon os-icon-users"></i><span>Assign Members</span></button></li><li><button onclick="editCard('+data.card.id+')" class="small-edit" type="button"><i class="os-icon os-icon-ui-49"></i><span>Edit Card</span></button></li><li><button onclick="duplicateCard('+data.card.id+')" class="small-edit" type="button"><i class="os-icon os-icon-grid-10"></i><span>Duplicate Card</span></button></li><li><button onclick="removeCard('+data.card.id+')" class="small-edit" type="button"><i class="os-icon os-icon-ui-15"></i><span>Remove Card</span></button></li><li><button onclick="archiveCard('+data.card.id+')" class="small-edit" type="button"><i class="os-icon os-icon-ui-44"></i><span>Archive Card</span></button></li></ul></div></div><div class="status status-green" data-placement="top" data-toggle="tooltip" title="Active Status"></div></div><div class="pi-body"><div class="pi-info"><div class="h6 pi-name" id="card-title-'+data.card.id+'">'+data.card.title+'</div></div></div><div class="pi-foot"><div class="tags"><button class="btn btn-outline-primary badge badge-primary-inverted">Details</button><button class="btn btn-outline-danger badge badge-danger-inverted"  id="card-due_date-'+data.card.id+'"></button></div><div class="cell-image-list" id="card-members-'+data.card.id+'"><small>No Members</small></div></div></div>');
			},
			error:function(error){
				console.log(error);
			}
		});
	}
	function editCard(card_id){
		c_edit_card_id = card_id;
		selected_edit_card_members = [];
		$.ajax({
			type:'GET',
			url:'{{ url('/') }}/org/'+{{ Auth::user()->organization_id }}+'/cards/edit/'+card_id,
			success:function(data){
				$('#assignedMembers').text('Assigned to: ');
				$('#cardTitle').val(data.card.title);
				$('#cardPriority').val(data.card.priority);
				if(data.card.description)
					CKEDITOR.instances['ckeditor2'].setData(data.card.description);
				if(data.card.due_date){
					var due_date = data.card.due_date.split("-");
					$('#cardDueDate').val(due_date[2]+'/'+due_date[1]+'/'+due_date[0])
				}
				for(let i = 0; i < data.members.length; i++){
					selected_edit_card_members.push(data.members[i]['id']);
					if(data.members[i]['reference']){
						$('#assignedMembers').append('<div class="cell-img"><div class="user-with-avatar"><img alt="'+data.members[i]['id']+'" src="{{ url('/') }}/storage/'+data.members[i]['reference']+'"></div></div>');
					}else{
						$('#assignedMembers').append('<div class="cell-img avatar">'+data.members[i]['name']+'</div>');
					}
				}
				$(".edit-members-select").select2({
					// maximumSelectionLength: 1,
					data: members_data,
					templateResult: function (d) { return $(d.text); },
					templateSelection: function (d) { return $(d.text); },
				});
				$(".edit-members-select").val(selected_edit_card_members).trigger('change');
				$('#editCardModal').modal('show');
			},
			error:function(error){
				console.log(error);
			}
		});
	}
	$("#edit-members-save").click(function(){
		var cardTitle = $("#cardTitle").val();
		var cardDueDate = $("#cardDueDate").val();
		var editcardMembers = $("#editcardMembers").select2("val");
		var cardDescription = CKEDITOR.instances['ckeditor2'].getData();
		var cardPriority = $('#cardPriority :selected').val();
		console.log(cardPriority);
		$.ajax({
			type:'POST',
			url:'{{ route('update-card', Auth::user()->organization_id) }}',
			data: {
				id:c_edit_card_id,
				title:cardTitle,
				description:cardDescription,
				priority:cardPriority,
				due_date: cardDueDate,
				members:editcardMembers
			},
			success:function(data){
				$('#card-members-'+c_edit_card_id).empty();
				$('#card-title-'+c_edit_card_id).empty();
				$('#card-due_date-'+c_edit_card_id).empty();
				$('#card-title-'+c_edit_card_id).append(data.card.title);
				var d = new Date(data.card.due_date)
				var ye = new Intl.DateTimeFormat('en', { year: 'numeric' }).format(d)
				var mo = new Intl.DateTimeFormat('en', { month: 'short' }).format(d)
				var da = new Intl.DateTimeFormat('en', { day: '2-digit' }).format(d)
				$('#card-due_date-'+c_edit_card_id).append(mo+' '+da+','+ye);
				for(let i = 0; i < data.members.length; i++){
					if(data.members[i]['reference']){
						$('#card-members-'+c_edit_card_id).append('<div class="cell-img"><div class="user-with-avatar"><img alt="'+data.members[i]['id']+'" src="{{ url('/') }}/storage/'+data.members[i]['reference']+'"></div></div>');
					}else{
						$('#card-members-'+c_edit_card_id).append('<div class="cell-img avatar">'+data.members[i]['name']+'</div>');
					}
				}
				$('#edit-members-close').trigger("click");
				//location.reload(true);
			},
			error:function(error){

			}
		});
	});
	if ($('#ckeditor2').length) {
	    CKEDITOR.replace('ckeditor2');
	}
	function duplicateCard(card_id){

	}
	function removeCard(card_id){

	}
	function archiveCard(card_id){

	}
	function assignMembers(card_id){
		c_card_id = card_id;
		selected_card_members = [];
		$.ajax({
			type:'GET',
			url:'{{ url('/') }}/org/'+{{ Auth::user()->organization_id }}+'/cards/fetch-members/'+card_id,
			success:function(data){
				for(let i = 0; i < data.members.length; i++){
					selected_card_members.push(data.members[i]['id']);
				}
				$(".assign-members-select").select2({
					// maximumSelectionLength: 1,
					data: members_data,
					templateResult: function (d) { return $(d.text); },
					templateSelection: function (d) { return $(d.text); },
				});
				$(".assign-members-select").val(selected_card_members).trigger('change');
				$('#assignMembersModal').modal('show');
			},
			error:function(error){
				console.log(error);
			}
		});
	}
	$("#assign-members-save").click(function(){
		var cardMembers = $("#cardMembers").select2("val");
		$.ajax({
			type:'POST',
			url:'{{ route('assign-members', Auth::user()->organization_id) }}',
			data: {
				id:c_card_id,
				members:cardMembers
			},
			success:function(data){
				$('#card-members-'+c_card_id).empty();
				for(let i = 0; i < data.members.length; i++){
					if(data.members[i]['reference']){
						$('#card-members-'+c_card_id).append('<div class="cell-img"><div class="user-with-avatar"><img alt="'+data.members[i]['id']+'" src="{{ url('/') }}/storage/'+data.members[i]['reference']+'"></div></div>');
					}else{
						$('#card-members-'+c_card_id).append('<div class="cell-img avatar">'+data.members[i]['name']+'</div>');
					}
				}
				$('#assign-members-close').trigger("click");
				//location.reload(true);
			},
			error:function(error){

			}
		});
	});
	$('body').on('mouseenter' ,'.os-dropdown-trigger', function(e) {
	    $(this).addClass('over');
	    var rt = ($(window).width() - ($(this).offset().left + $(this).outerWidth()));
	    if(rt < 90){
	    	$(this).children(".os-dropdown").css("transform", "translate3d(0%, 100%, 0)")
	    }
	});
	$('body').on('mouseleave' ,'.os-dropdown-trigger', function(e) {
	    $(this).removeClass('over');
	});
	  // #15. CRM PIPELINE
	if ($('.pipeline').length) {
		var tasklist_id;
		var card_id;
		var source_pipeline;
		var target_pipeline;
		// INIT DRAG AND DROP FOR PIPELINE ITEMS
		var dragulaObj = dragula($('.pipeline-body').toArray(), {})
			.on('drag', function (el) {
				// console.log(el);//Result :[object HTMLDivElement] on drag
			})
			.on('drop', function (el) {
				// console.log(el);//Result :[object HTMLDivElement] on drop
				console.log('tasklist_id : '+tasklist_id);
				console.log('card_id : '+card_id);
				console.log('source_pipeline : '+source_pipeline);
				console.log('target_pipeline : '+target_pipeline);
				//Here I will do the ajax logic
				$.ajax({
					type:'GET',
					url:'{{ route('drag-drop-card', Auth::user()->organization_id) }}',
					data:{
						card_id: card_id,
						source_tasklist: source_pipeline,
						target_tasklist: target_pipeline
					},
					success:function(data){
						console.log(data)
						// location.reload(true);
					},
					error:function(error){
						console.log(error);
					}
				});
			})
			.on('over', function (el, container) {
				// console.log(el);//Result :<div class="pipeline-item"...>...</div>
				// tasklist_id = $('.gu-transit').attr('data-tasklist');
				// card_id = $('.gu-transit').attr('data-card');
				// source_pipeline = ($('.gu-transit').closest('.pipeline-body')[0].id).slice(9);//show pipeline-1
				// console.log(tasklist_id+'-'+card_id+'-'+source_pipeline);
		  		$(container).closest('.pipeline-body').addClass('over');
			}).on('out', function (el, container, source) {
				// console.log(el);//Result :<div class="pipeline-item"...>...</div>
				// target_pipeline = ($('.gu-transit').closest('.pipeline-body')[0].id).slice(9);
				var new_pipeline_body = $(container).closest('.pipeline-body');
				new_pipeline_body.removeClass('over');
				var old_pipeline_body = $(source).closest('.pipeline-body');
		});
	}

  	if ($('.pipelines-w').length) {
    	// INIT DRAG AND DROP FOR PIPELINE ITEMS
    	var dragulaObj1 = dragula($('#tasklists').toArray(), { moves: function (el, container, handle) { return handle.classList.contains('icon-cursor-move'); }})
				.on('drag', function (el) {
					console.log(el);
				})
				.on('drop', function (el) {
					console.log(el);
				})
				.on('over', function (el, container) {
					console.log(el);
  					$(container).closest('#tasklists').addClass('over');
				}).on('out', function (el, container, source) {
					console.log(el);
					var new_task_body = $(container).closest('#tasklists');
					new_task_body.removeClass('over');
					var old_task_body = $(source).closest('#tasklists');
				});
  	}
</script>
<script>
jQuery(document).ready(function(){
	$('.editable-text').click(function(event) {
		var tasklistId = $(this).attr('data-tasklist');
        var span, input, text;

        // Get the event (handle MS difference)
        event = event || window.event;

        // Get the root element of the event (handle MS difference)
        span = event.target || event.srcElement;

        // If it's a span...
        if (span && span.tagName.toUpperCase() === "SPAN") {
            // Hide it
            span.style.display = "none";

            // Get its text
            text = span.innerHTML;

            // Create an input
            input = document.createElement("input");
            input.type = "text";
            input.value = text;
            input.className = "form-control";
            input.size = Math.max(text.length / 4 * 3, 4);
            span.parentNode.insertBefore(input, span);

            // Focus it, hook blur to undo
            input.focus();
            input.onblur = function() {
                // Remove the input
                span.parentNode.removeChild(input);

                // Update the span
                span.innerHTML = input.value == "" ? "&nbsp;" : input.value;
                $.ajax({
					type:'POST',
					url:'{{ route('update-tasklist', Auth::user()->organization_id) }}',
					data: {
						id:tasklistId,
						title:input.value
					},
					success:function(data){
						// console.log(data);
					},
					error:function(error){
						console.log(error);
					}
				});

                // Show the span again
                span.style.display = "";
            };
        }
    });
});
</script>
<style>
.select2 {
	width: 100% !important;
}
.os-dropdown ul li button {
  display: block;
  white-space: nowrap;
  padding: 10px 10px 10px 10px;
  line-height: 1;
  color: #fff;
  font-size: 0.9rem;
}

.os-dropdown ul li button:hover {
  text-decoration: none;
}

.os-dropdown ul li button i {
  color: #fff;
  display: inline-block;
  vertical-align: middle;
  margin-right: 15px;
  font-size: 22px;
  -webkit-transition: all 0.2s ease;
  transition: all 0.2s ease;
}

.os-dropdown ul li button span {
  display: inline-block;
  vertical-align: middle;
  color: #fff;
  font-size: 0.9rem;
  -webkit-transition: all 0.2s ease;
  transition: all 0.2s ease;
}

.os-dropdown ul li button i + span {
  padding-right: 10px;
}

.os-dropdown ul li button:hover i {
  color: #fff;
  -webkit-transform: scale(1.2);
          transform: scale(1.2);
}

.os-dropdown ul li button:hover span {
  -webkit-transform: translateX(3px);
          transform: translateX(3px);
}
.small-edit {
	font-size: 1rem;
	/*width: 100%;*/
}
.small-edit:hover{
	box-shadow: none;
}
.icon-cursor-move:hover{
	cursor: pointer;
}
.modal-header .avatar{
	width: 35px;
}
</style>
@endsection
