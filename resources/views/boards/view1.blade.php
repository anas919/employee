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
	      		<!-- Button trigger modal-->
	    	</div>
	  	</div>
	</div>
	<div class="base">
	  	<div class="board">
	    	<div class="board-lists">
	    		@forelse($board->tasklists->sortBy('order') as $tasklist)
	      		<div class="board-list draggable-list" data-tasklist="{{ $tasklist->id }}">
			        <div class="list-title">
			        	<div class="title-left">
			        		<h5 class="editable-text"><span class="draggable-list">{{ $tasklist->title }}</span><i class="icon-feather-edit-2" style="display: none;"></i></h5>
			        	</div>
			        	<div class="title-right">
			        		<div class="dropdown">
								<button onclick="createCard({{ $tasklist->id }})" class="icon-feather-plus dropbtn-list draggable-list" data-placement="top" data-toggle="tooltip" title="" type="button" data-original-title="Add a task"></button>
							</div>
			        		<div class="dropdown">
							  	<button onclick="dropDown(this,event);" class="icon-feather-more-vertical dropbtn-list draggable-list"></button>
							  	<div class="dropdown-content">
								    <span onclick="duplicateList({{ $tasklist->id }})">Duplicate list</span>
								    <span onclick="archiveList({{ $tasklist->id }})">Archive list</span>
								    <span onclick="deleteList(this,{{ $tasklist->id }})">Delete list</span>
							  	</div>
							</div>
			        	</div>
			        </div>
			        <div class="pipeline-body draggable-list" id="pipeline-{{ $tasklist->id }}">
	        			@forelse($tasklist->cards->sortByDesc('order') as $card)
	          			<div class="pipeline-item" data-tasklist="{{ $tasklist->id }}" data-card="{{ $card->id }}" onclick="editCard(this,event,{{ $card->id }})">
	            			<div class="pi-controls">
                            <div class="status status-green" data-placement="top" data-toggle="tooltip" title="Active Status" style="display:inline-block"></div>
                                <div class="dropdown">
    							  	<button onclick="dropDown(this,event);" class="icon-feather-more-vertical dropbtn"></button>
    							  	<div class="dropdown-content">
    								    <span onclick="assignMembers(event,{{ $card->id }})">Assign members</span>
    								    <span onclick="duplicateCard(event,{{ $card->id }})">Duplicate task</span>
    								    <span onclick="archiveCard(event,{{ $card->id }})">Archive task</span>
    								    <span onclick="removeCard(event,{{ $card->id }})">Remove task</span>
    							  	</div>
    							</div>
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
	      		@empty
	      		@endforelse
	      		<div onclick="createList()" class="add-list" id="addListBtn">
	      			<span>+ Add list</span>
		    	</div>
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
              		<div class="form-check" style="margin-top: auto;">
						<label>
							<input id="mark" type="checkbox" name="check"> <span id="task_info" class="label-text"></span>
						</label><span id="assignedMembers" class="cell-image-list">Assigned to:</span><span> Due Date: </span><strong>Sep 12th, 2017</strong>
					</div>
            	</div>
            	<button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> &times;</span></button>
          	</div>
          	<div class="modal-body">
          		<div class="os-tabs-controls os-tabs-complex">
					<ul class="nav nav-tabs">
						<li class="nav-item">
							<a aria-expanded="false" class="nav-link active show" data-toggle="tab" href="#general"><span class="tab-label">General</span></a>
						</li>
						<li class="nav-item">
							<a aria-expanded="false" class="nav-link" data-toggle="tab" href="#details"><span class="tab-label">Details</span></a>
						</li>
						<li class="nav-item">
							<a aria-expanded="false" class="nav-link" data-toggle="tab" href="#attached"><span class="tab-label">Files & resources</span><span class="badge badge-success"></i><span>1</span></span></a>
						</li>
					</ul>
                </div>
              	<div class="tab-content">
              		<div id="general" class="tab-pane fade in active col-sm-12">
              			<div class="row">
			              	<div class="col-sm-12">
				                <label for="">Task name</label><input class="form-control" placeholder="Enter task name" type="text" id="cardTitle">
			              	</div>
			              	<div class="col-sm-6">
					         	<div class="form-group">
					                <label for=""> Members</label>
					                <select class="form-control edit-members-select" multiple="true" name="editcardMembers[]" id="editcardMembers"></select>
					            </div>
					        </div>
				            <div class="col-sm-6">
		                  		<div class="form-group">
		                    		<label for=""> Due Date</label>
		                    		<div class="date-input input-group">
		                      			<input class="due_date-daterange form-control" placeholder="Due Date" type="text" value="" id="cardDueDate">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <i class="icon-feather-trash-2"></i><span>Clear</span>
                                            </div>
                                        </div>
                                    </div>
		                  		</div>
		                	</div>
	                		<div class="col-sm-12">
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
					</div>
					<div id="details" class="tab-pane fade in">
	                	<div class="col-sm-12">
							<div class="form-group">
						        <label for=""> Description</label>
								<textarea id="ckeditor2" name="cardCkeditor1"></textarea>
						    </div>
						</div>
	                </div>
	                <div id="attached" class="tab-pane fade in">
	            		<div class="form-group">
		                	<label for="">Media Attached</label>
		                	<div class="attached-media-w" id="cardFiles">
		                  		{{-- <img src="{{ asset('img/portfolio9.jpg') }}"><img src="{{ asset('img/portfolio2.jpg') }}"><img src="{{ asset('img/portfolio12.jpg') }}"> --}}
		                	</div>
		              	</div>
			            <div id="my-awesome-dropzone" class="dropzone">
			            	<div class="dz-message">
		                      <div>
		                        <h4>Drop attached images or files here or click to upload.</h4><div class="text-muted">5MB max size allowed</div>
		                      </div>
		                    </div>
			            </div>
	                </div>
              	</div>
      		</div>
	        <div class="modal-footer buttons-on-left">
	            <button class="btn btn-primary" type="button" id="edit-members-save"> Save changes</button><button class="btn btn-link" data-dismiss="modal" type="button" id="edit-members-close"> Cancel</button>
	      	</div>
    	</div>
	</div>
</div>
<div class="modal fade" id="previewPicture" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header faded smaller">
				<div class="modal-title">
					<span id="preview-img-name"></span>
				</div>
				<button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> &times;</span></button>
			</div>
			<div class="modal-body mb-0 p-0">
				<div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
					    <img class="embed-responsive-item" id="preview-img" src=""></iframe>
				</div>
			</div>
		</div>
  	</div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('bower_components/dragula.js/dist/dragula.min.js') }}"></script>
<link href="{{ asset('bower_components/dragula.js/dist/dragula.min.css') }}" rel="stylesheet">
<script type="text/javascript">
    /*Dragula*/
    if ($('.board-lists').length) {
        // var tasklist_id;
        var task_source;
        var task_target;
        // INIT DRAG AND DROP FOR PIPELINE ITEMS
        var dragulaObj1 = dragula($('.board-lists').toArray(), {
    				moves: function (el, container, handle, sibling) {
                        console.log(handle.classList.contains('board-list'));
                        return handle.classList.contains('draggable-list');
    				}
    			})
            .on('drag', function (el, container) {
            	$('#addListBtn').hide();
                task_source = $(el)[0].attributes['data-tasklist'].nodeValue;
                console.log(container);
            })
            .on('drop', function (el, container) {
            	$('#addListBtn').show();
                if(typeof $(el).prev()[0] == 'undefined')
                    task_target = 'no_previous';
                else {
                    task_target = $(el).prev()[0].attributes['data-tasklist'].nodeValue;
                }
                $.ajax({
                    type:'GET',
                    url:'{{ route('drag-drop-tasklist', Auth::user()->subdomain) }}',
                    data:{
                        source_tasklist: task_source,
                        target_tasklist: task_target,
                    },
                    success:function(data){
                        // console.log(data)
                    },
                    error:function(error){
                        console.log(error);
                    }
                });
            })
            .on('dragend', function (el, container) {
            	$('#addListBtn').show();
                // console.log(el);
                //     $(container).closest('#tasklists').addClass('over');
            })
            .on('over', function (el, container) {
                // console.log(el);
                //     $(container).closest('#tasklists').addClass('over');
            }).on('out', function (el, container, source) {
                // console.log(el);
                // var new_task_body = $(container).closest('#tasklists');
                // new_task_body.removeClass('over');
                // var old_task_body = $(source).closest('#tasklists');
            });
    }
    if ($('.pipeline-body').length) {
        var card_id;
		var source_pipeline;
		var target_pipeline;
		var prev_card;
		// INIT DRAG AND DROP FOR PIPELINE ITEMS
		var dragulaObj = dragula($('.pipeline-body').toArray(), {})
			.on('drag', function (el, container) {
				source_pipeline = $(container).closest('.pipeline-body')[0].id.slice(9);//Result :[object HTMLDivElement] on drag
			})
			.on('drop', function (el, container) {
				target_pipeline = $(container).closest('.pipeline-body')[0].id.slice(9);//Result :[object HTMLDivElement] on drop
				// console.log('card_id : '+card_id+', source : '+source_pipeline+', target : '+target_pipeline);
				if($(el).prev().length == 0){
					prev_card = 0;
				}else {
					prev_card = $(el).prev()[0].attributes['data-card']['nodeValue'];
				}
				//ajax logic
				// console.log(prev_card);
				$.ajax({
					type:'GET',
					url:'{{ route('drag-drop-card', Auth::user()->subdomain) }}',
					data:{
						card_id: card_id,
						source_tasklist: source_pipeline,
						target_tasklist: target_pipeline,
						previous_card: prev_card
					},
					success:function(data){
						// console.log(data)
					},
					error:function(error){
						console.log(error);
					}
				});
			})
			.on('over', function (el, container) {
				//Event triggered when you move from list to another list
				card_id = $('.gu-transit').attr('data-card');
		  		$(container).closest('.pipeline-body').addClass('over');
			}).on('out', function (el, container, source) {
				var new_pipeline_body = $(container).closest('.pipeline-body');
				new_pipeline_body.removeClass('over');
				var old_pipeline_body = $(source).closest('.pipeline-body');
		});
    }
    /*Dragula*/
	$('#mark').change(function () {
		if($(this).is(':checked')) {
			$('#message-success').text('Marked as done');
			$("#alert-success").show();
			setTimeout(function() { $("#alert-success").hide(); }, 2000);
		}else{
			$('#message-success').text('Marked as undone');
			$("#alert-success").show();
			setTimeout(function() { $("#alert-success").hide(); }, 2000);
		}
    });
</script>
<link rel="stylesheet" type="text/css" href="{{asset('icon_fonts_assets/feather/style.css')}}">
<script src="{{ asset('bower_components/dragula.js/dist/dragula.min.js') }}"></script>
<link href="{{ asset('bower_components/dragula.js/dist/dragula.min.css') }}" rel="stylesheet">
<style type="text/css">
	/*mark task*/
	#task_info:hover{
		cursor: pointer;
	}
	/*ckeditor*/
	#cke_1_contents{
		height: 20vh !important;
	}
	/**/
	#listCreate > .list-title > .title-right > i{
		-webkit-box-flex: 1;
	    -ms-flex: 1 1 auto;
	    flex: 1 1 auto;
	    display: block;
	    overflow: hidden;
	    text-overflow: ellipsis;
	    white-space: nowrap;
	    margin-left: 10px;
	}
	#listCreate > .list-title > .title-right > i:hover{
		-webkit-box-flex: 1;
	    -ms-flex: 1 1 auto;
	    flex: 1 1 auto;
	    display: block;
	    overflow: hidden;
	    text-overflow: ellipsis;
	    white-space: nowrap;
	    margin-left: 10px;
	    background-color: #ddd;
	    cursor: pointer;
	}
	#listCreate > .list-title > .title-left{
		display: -webkit-box;
	    display: -ms-flexbox;
	    display: flex;
	    -webkit-box-pack: justify;
	    -ms-flex-pack: justify;
	    justify-content: space-between;
	    -webkit-box-align: center;
	    -ms-flex-align: center;
	    align-items: center;
	    word-break: break-word;
	}
</style>
<script type="text/javascript">
	//Uploads
	var uploadedFiles = {
    	files : {}
	};
	var uniqId=0;
	Dropzone.autoDiscover = false;
	Dropzone.options.myAwesomeDropzone = {
	  	paramName: "attachedFile", // The name that will be used to transfer the file
	  	maxFilesize: 5, // MB
		dictDefaultMessage: "Drag your images",
		uploadMultiple: false,
		addRemoveLinks: true,
	  	accept: function(file, done) {
	  		done();
		},
		success: function(file, response) {
			file.UniqueIID = uniqId;
			uniqId++;
			uploadedFiles.files[file.UniqueIID] = response.serverFileName;
	  		console.log(file);
		},
		error: function(file, response) {
			file.previewElement.remove();
			alert("There was an error during uploading file, Maybe the file is too big");
		},
		removedfile: function(file) {
			$('#loading').css('display','block');
			var Id = file['UniqueIID'];
			uploadedFiles.files['fileToRemove'] = Id;
			var files = JSON.stringify(uploadedFiles.files);
			$.ajax({
				type:'POST',
				url:"{{ url('/') }}/cards/delete-file/",
				dataType: "JSON",
				data: files,
				success:function(data){
					$('#loading').css('display','none');
					// uploadedFiles.files.pop();
					var k = Object.keys(uploadedFiles.files);
					delete uploadedFiles.files[k[k.length-1]];
					// console.log(uploadedFiles.files)
					file.previewElement.remove();
				},
				error:function(error){
					console.log(error);
				}
			});
		}
	};
    function initDropzones() {
	    $('.dropzone').each(function () {

	        let dropzoneControl = $(this)[0].dropzone;
	        if (dropzoneControl) {
	            dropzoneControl.destroy();
	        }
	        $('.dz-preview').remove();
	    	$('#my-awesome-dropzone').css('display','block');
	    	$('.dz-message').css('display','block');
	    });
	}
	var members_data = [];
	@forelse($members as $member)
		members_data.push({ id: {{ $member->id }}, text: '<div> @if ($member->media_id)<img src="{{ asset('storage/'.$member->media->reference) }}" width="30px" height="30px">{{ $member->first_name }} {{ $member->last_name }} @else <div class="avatar" style="border-radius: 50%;">{{ substr($member->first_name, 0, 1).substr($member->last_name, 0, 1) }}</div>{{ $member->first_name }} {{ $member->last_name }} @endif </div>' });
	@empty
	@endforelse
	function dropDown(element,event) {
        if(event)
            event.stopPropagation();
        var elements = ".dropdown-content";
        $(elements).removeClass('show-elem');
        $(element).next(elements).toggleClass("show-elem");
	}
	window.onclick = function(event) {
	  if (!event.target.matches('.dropbtn')) {
	    var dropdowns = document.getElementsByClassName("dropdown-content");
	    var i;
	    for (i = 0; i < dropdowns.length; i++) {
	      var openDropdown = dropdowns[i];
	      if (openDropdown.classList.contains('show-elem')) {
	        openDropdown.classList.remove('show-elem');
	      }
	    }
	  }
	}
	//Edit card
	if ($('#ckeditor2').length) {
	    CKEDITOR.replace('ckeditor2');
	}
    $('.input-group-append').on('click',function(){
        $('input.due_date-daterange').val('');
    });
    function validateText(){
        if($('.txtarea').val()!=''){
            $('.txtarea-create-btn').prop("disabled", false);
        }else{
            $('.txtarea-create-btn').prop("disabled", true);
        }
    }
	function previewImg(src, name) {
		$('#preview-img').attr('src',src);
		$('#preview-img-name').text(name);
		$('#previewPicture').modal('show');
	}
	function createCard(tasklist_id){
		if(!$('#card-'+tasklist_id).length){
            $('#pipeline-'+tasklist_id).prepend('<div id="card-section-'+tasklist_id+'"><button onclick="closeCard('+tasklist_id+')" class="close txtarea-close-btn" type="button">×</button><textarea rows="4" class="form-control txtarea" onkeyup="validateText()" placeholder="Card title" type="text" id="card-'+tasklist_id+'"></textarea><button class="mr-2 mb-2 btn btn-primary btn-sm txtarea-create-btn" type="button" onclick="addCard('+tasklist_id+')" disabled> Create task</button></div>');
            $('#card-'+tasklist_id).focus();
        }
	}
	function closeCard(tasklist_id){
		$('#card-section-'+tasklist_id).remove();
	}
	function addCard(tasklist_id) {
		title = $('#card-'+tasklist_id).val();
		$('#loading').css('display','block');
		$.ajax({
			type:'POST',
			url:'{{ url('/') }}/cards/add',
			data:{ tasklist_id: tasklist_id, title: title},
			success:function(data){
				$('#loading').css('display','none');
			  	$('#card-section-'+tasklist_id).remove();
			  	$('#pipeline-'+tasklist_id).prepend('<div class="pipeline-item" data-tasklist="'+tasklist_id+'" data-card="'+data.card.id+'" onclick="editCard(this,event,'+data.card.id+')"><div class="pi-controls"><div class="status status-green" data-placement="top" data-toggle="tooltip" title="Active Status" style="display:inline-block"></div><div class="dropdown"><button onclick="dropDown(this,event);" class="icon-feather-more-vertical dropbtn"></button><div class="dropdown-content"><span onclick="assignMembers(event,'+data.card.id+')">Assign members</span><span onclick="duplicateCard(event,'+data.card.id+')">Duplicate task</span><span onclick="archiveCard(event,'+data.card.id+')">Archive task</span><span onclick="removeCard(event,'+data.card.id+')">Remove task</span></div></div></div><div class="pi-body"><div class="pi-info"><div class="h6 pi-name" id="card-title-'+data.card.id+'">'+data.card.title+'</div></div></div><div class="pi-foot"><div class="tags"><button class="btn btn-outline-primary badge badge-primary-inverted">Details</button><button class="btn btn-outline-danger badge badge-danger-inverted" id="card-due_date-'+data.card.id+'"></button></div><div class="cell-image-list" id="card-members-'+data.card.id+'"><small>No Members</small></div></div></div>');
            },
			error:function(error){
				console.log(error);
			}
		});
	}
	$('input.due_date-daterange').on('apply.daterangepicker', function (ev, picker) {
            $(this).val(picker.startDate.format('L'));
    });

    $('input.due_date-daterange').on('cancel.daterangepicker', function (ev, picker) {
        $(this).val('');
    });
    $("input.due_date-daterange").daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        minYear: parseInt(moment().subtract(10, 'years').format('YYYY'),10),
        maxYear: parseInt(moment().add(10, 'years').format('YYYY'), 10),
        autoUpdateInput: false,
        singleClasses: "",
    });
    $('#editCardModal').on('hidden.bs.modal', function () {
        $('.pipeline-item').removeAttr('style');
    })
	function editCard(element,event,card_id){
        var screenHalfSize=$(window).width()/2;
        if(event.pageX<screenHalfSize){
            $('.modal-dialog').removeClass('ml-0');
            $('.modal-dialog').addClass('mr-0');
        }else{
            $('.modal-dialog').removeClass('mr-0');
            $('.modal-dialog').addClass('ml-0');
        }
		$(element).css('z-index','1042');
        $('#loading').css('display','block');
		c_edit_card_id = card_id;
		selected_edit_card_members = [];
		$.ajax({
			type:'GET',
			url:'{{ url('/') }}/cards/edit/'+card_id,
			success:function(data){
				$('#loading').css('display','none');
				$('#assignedMembers').text('Assigned to: ');
				$('#cardTitle').val(data.card.title);
				$('#cardPriority').val(data.card.priority);
				if(data.card.description)
					CKEDITOR.instances['ckeditor2'].setData(data.card.description);
				if(data.card.due_date){
					var due_date = data.card.due_date.split("-");
					$('#cardDueDate').val(due_date[1]+'/'+due_date[2]+'/'+due_date[0]);
				}else{
					$('input.due_date-daterange').val('');
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
				$("#cardFiles").html('');
				for(let i = 0; i < data.card.attachedFiles.length; i++){
					var d = new Date(data.card.created_at);
					var ye = new Intl.DateTimeFormat('en', { year: 'numeric' }).format(d);
					var mo = new Intl.DateTimeFormat('en', { month: 'short' }).format(d);
					var da = new Intl.DateTimeFormat('en', { day: '2-digit' }).format(d);
					var upload_date =	mo+' '+da+','+ye;
					if(data.card.attachedFiles[i]['mime_type'] == 'image/jpeg' || data.card.attachedFiles[i]['mime_type'] == 'image/png') {
						$("#cardFiles").append('<div onclick="previewImg(\'{{ url('/') }}/storage/'+data.card.attachedFiles[i]['reference']+'\',\''+data.card.attachedFiles[i]['name']+'\');" class="attachment"><div class="attachment-preview" style="background-image: url({{ url('/') }}/storage/'+data.card.attachedFiles[i]['reference']+');background-color: #0b1319;"></div><div class="attachment-details"><div class="attachment-name"><span>'+data.card.attachedFiles[i]['name']+'</span></div><div class="attachment-info">Uploaded in '+upload_date+' <a href="#"><i class="os-icon os-icon-ui-49"></i></a><a class="danger" href="#"><i class="os-icon os-icon-ui-15"></i></a></div></div></div>');
					}else if(data.card.attachedFiles[i]['mime_type'] == 'text/html'){
						$("#cardFiles").append('<div class="attachment"><div class="attachment-preview" style="background-color: #0b1319;"></div><div class="attachment-details"><div class="attachment-name"><a class="attachment" href="{{ url('/') }}/storage/'+data.card.attachedFiles[i]['reference']+'" download="'+data.card.attachedFiles[i]['name']+'"><span> '+data.card.attachedFiles[i]['name']+'</span></a></div><div class="attachment-info">Uploaded '+upload_date+' <a href="#"><i class="os-icon os-icon-ui-49"></i></a><a class="danger" href="#"><i class="os-icon os-icon-ui-15"></i></a></div></div></div>');
					}else if(data.card.attachedFiles[i]['mime_type'] == 'text/plain'){
						$("#cardFiles").append('<div class="attachment"><div class="attachment-preview" style="background-color: #0b1319;"></div><div class="attachment-details"><div class="attachment-name"><a class="attachment" href="{{ url('/') }}/storage/'+data.card.attachedFiles[i]['reference']+'" download="'+data.card.attachedFiles[i]['name']+'"><span> '+data.card.attachedFiles[i]['name']+'</span></a></div><div class="attachment-info">Uploaded in '+upload_date+' <a href="#"><i class="os-icon os-icon-ui-49"></i></a><a class="danger" href="#"><i class="os-icon os-icon-ui-15"></i></a></div></div></div>');
					}else if(data.card.attachedFiles[i]['mime_type'] == 'application/pdf'){
						$("#cardFiles").append('<div class="attachment"><div class="attachment-preview" style="background-color: #0b1319;"></div><div class="attachment-details"><div class="attachment-name"><a class="attachment" href="{{ url('/') }}/storage/'+data.card.attachedFiles[i]['reference']+'" download="'+data.card.attachedFiles[i]['name']+'"><span> '+data.card.attachedFiles[i]['name']+'</span></a></div><div class="attachment-info">Uploaded in '+upload_date+' <a href="#"><i class="os-icon os-icon-ui-49"></i></a><a class="danger" href="#"><i class="os-icon os-icon-ui-15"></i></a></div></div></div>');
					}else if(data.card.attachedFiles[i]['mime_type'] == 'application/zip' || data.card.attachedFiles[i]['mime_type'] == 'application/x-rar'){
						$("#cardFiles").append('<div class="attachment"><div class="attachment-preview" style="background-color: #0b1319;"></div><div class="attachment-details"><div class="attachment-name"><a class="attachment" href="{{ url('/') }}/storage/'+data.card.attachedFiles[i]['reference']+'" download="'+data.card.attachedFiles[i]['name']+'"><span> '+data.card.attachedFiles[i]['name']+'</span></a></div><div class="attachment-info">Uploaded in '+upload_date+' <a href="#"><i class="os-icon os-icon-ui-49"></i></a><a class="danger" href="#"><i class="os-icon os-icon-ui-15"></i></a></div></div></div>');
					}else if(data.card.attachedFiles[i]['mime_type'] == 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'){
						$("#cardFiles").append('<div class="attachment"><div class="attachment-preview" style="background-color: #0b1319;"></div><div class="attachment-details"><div class="attachment-name"><a class="attachment" href="{{ url('/') }}/storage/'+data.card.attachedFiles[i]['reference']+'" download="'+data.card.attachedFiles[i]['name']+'"><span> '+data.card.attachedFiles[i]['name']+'</span></a></div><div class="attachment-info">Uploaded in '+upload_date+' <a href="#"><i class="os-icon os-icon-ui-49"></i></a><a class="danger" href="#"><i class="os-icon os-icon-ui-15"></i></a></div></div></div>');
					}else if(data.card.attachedFiles[i]['mime_type'] == 'application/vnd.openxmlformats-officedocument.presentationml.presentation'){
						$("#cardFiles").append('<div class="attachment"><div class="attachment-preview" style="background-color: #0b1319;"></div><div class="attachment-details"><div class="attachment-name"><a class="attachment" href="{{ url('/') }}/storage/'+data.card.attachedFiles[i]['reference']+'" download="'+data.card.attachedFiles[i]['name']+'"><span> '+data.card.attachedFiles[i]['name']+'</span></a></div><div class="attachment-info">Uploaded in '+upload_date+' <a href="#"><i class="os-icon os-icon-ui-49"></i></a><a class="danger" href="#"><i class="os-icon os-icon-ui-15"></i></a></div></div></div>');
					}else if(data.card.attachedFiles[i]['mime_type'] == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'){
						$("#cardFiles").append('<div class="attachment"><div class="attachment-preview" style="background-color: #0b1319;"></div><div class="attachment-details"><div class="attachment-name"><a class="attachment" href="{{ url('/') }}/storage/'+data.card.attachedFiles[i]['reference']+'" download="'+data.card.attachedFiles[i]['name']+'"><span> '+data.card.attachedFiles[i]['name']+'</span></a></div><div class="attachment-info">Uploaded in '+upload_date+' <a href="#"><i class="os-icon os-icon-ui-49"></i></a><a class="danger" href="#"><i class="os-icon os-icon-ui-15"></i></a></div></div></div>');
					}else{
						$("#cardFiles").append('<div class="attachment"><div class="attachment-preview" style="background-color: #0b1319;"></div><div class="attachment-details"><div class="attachment-name"><a class="attachment" href="{{ url('/') }}/storage/'+data.card.attachedFiles[i]['reference']+'" download="'+data.card.attachedFiles[i]['name']+'"><span> '+data.card.attachedFiles[i]['name']+'</span></a></div><div class="attachment-info">Uploaded in '+upload_date+' <a href="#"><i class="os-icon os-icon-ui-49"></i></a><a class="danger" href="#"><i class="os-icon os-icon-ui-15"></i></a></div></div></div>');
					}
				}
				initDropzones();
				$("#my-awesome-dropzone").dropzone({
					url: "{{ url('/') }}/cards/attach-file/"+card_id,
					// acceptedFiles: 'image/jpeg,image/gif,image/png,application/pdf,.eps,.csv,.xls,.xlsx/.doc,.docx/.ppt/.pptx/text/plain,text/html,video/*,audio/*,.zip,.rar',
					headers: {
                    	'x-csrf-token': $('meta[name="csrf-token"]').attr('content'),
                	},
				});
				$('#editCardModal').modal('show');
			},
			error:function(error){
				console.log(error);
			}
		});
	}
	$("#edit-members-save").click(function(){
		$('#loading').css('display','block');
		var cardTitle = $("#cardTitle").val();
		var cardDueDate = $("#cardDueDate").val();
		var editcardMembers = $("#editcardMembers").select2("val");
		var cardDescription = CKEDITOR.instances['ckeditor2'].getData();
		var cardPriority = $('#cardPriority :selected').val();
		// console.log(cardPriority);
		$.ajax({
			type:'POST',
			url:'{{ route('update-card', Auth::user()->subdomain) }}',
			data: {
				id:c_edit_card_id,
				title:cardTitle,
				description:cardDescription,
				priority:cardPriority,
				due_date: cardDueDate,
				members:editcardMembers
			},
			success:function(data){
				$('#loading').css('display','none');
				$('#card-members-'+c_edit_card_id).empty();
				$('#card-title-'+c_edit_card_id).empty();
				$('#card-due_date-'+c_edit_card_id).empty();
				$('#card-title-'+c_edit_card_id).append(data.card.title);
                if(data.card.due_date){
    				var d = new Date(data.card.due_date);
    				var ye = new Intl.DateTimeFormat('en', { year: 'numeric' }).format(d);
    				var mo = new Intl.DateTimeFormat('en', { month: 'short' }).format(d);
    				var da = new Intl.DateTimeFormat('en', { day: '2-digit' }).format(d);
    				$('#card-due_date-'+c_edit_card_id).append(mo+' '+da+','+ye);
                }else{
                    // $('#card-due_date-'+c_edit_card_id).append(mo+' '+da+','+ye);
                }
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
    function duplicateCard(event,card_id){
        if(event)
            event.stopPropagation();
        $('#loading').css('display','block');
        $.ajax({
            type:'GET',
            url:'{{ url('/') }}/cards/duplicate/'+card_id,
            success:function(data){
                $('#loading').css('display','none');
                html = '<div class="pipeline-item"><div class="pi-controls"><div class="pi-settings os-dropdown-trigger"><i class="os-icon os-icon-ui-46"></i><div class="os-dropdown"><div class="icon-w"><i class="os-icon os-icon-ui-46"></i></div><ul><li><button onclick="assignMembers(event,'+data.card.id+')" class="small-edit" type="button"><i class="os-icon os-icon-users"></i><span>Assign Members</span></button></li><li><button onclick="editCard('+data.card.id+')" class="small-edit" type="button"><i class="os-icon os-icon-ui-49"></i><span>Edit Card</span></button></li><li><button onclick="duplicateCard(event,'+data.card.id+')" class="small-edit" type="button"><i class="os-icon os-icon-grid-10"></i><span>Duplicate Card</span></button></li><li><button onclick="removeCard(event,'+data.card.id+')" class="small-edit" type="button"><i class="os-icon os-icon-ui-15"></i><span>Remove Card</span></button></li><li><button onclick="archiveCard('+data.card.id+')" class="small-edit" type="button"><i class="os-icon os-icon-ui-44"></i><span>Archive Card</span></button></li></ul></div></div><div class="status status-green" data-placement="top" data-toggle="tooltip" title="Active Status" style="display:inline-block"></div></div><div class="pi-body"><div class="pi-info"><div class="h6 pi-name" id="card-title-'+data.card.id+'">'+data.card.title+'</div></div></div><div class="pi-foot"><div class="tags"><button class="btn btn-outline-primary badge badge-primary-inverted">Details</button><button class="btn btn-outline-danger badge badge-danger-inverted"  id="card-due_date-'+data.card.id+'">';
                if(data.card.due_date){
                    var d = new Date(data.card.due_date);
                    var ye = new Intl.DateTimeFormat('en', { year: 'numeric' }).format(d);
                    var mo = new Intl.DateTimeFormat('en', { month: 'short' }).format(d);
                    var da = new Intl.DateTimeFormat('en', { day: '2-digit' }).format(d);
                    html += mo+' '+da+','+ye;
                }
                html += '</button></div><div class="cell-image-list" id="card-members-'+data.card.id+'"><small>';
                for(let i = 0; i < data.members.length; i++){
                    if(data.members[i]['reference']){
                        html += '<div class="cell-img"><div class="user-with-avatar"><img alt="'+data.members[i]['id']+'" src="{{ url('/') }}/storage/'+data.members[i]['reference']+'"></div></div>';
                    }else{
                        html += '<div class="cell-img avatar">'+data.members[i]['name']+'</div>';
                    }
                }
                html += '</small></div></div></div>';
                $('.pipeline-item[data-card="'+card_id+'"]').before(html);
            },
            error:function(error){
                console.log(error);
            }
        });
    }
    function removeCard(event,card_id){
        if(event)
            event.stopPropagation();
        $('#loading').css('display','block');
        $.ajax({
            type:'GET',
            url:'{{ url('/') }}/cards/delete/'+card_id,
            success:function(data){
                $('#loading').css('display','none');
                $('.pipeline-item[data-card="'+card_id+'"]').remove();
            },
            error:function(error){
                console.log(error);
            }
        });
    }
    function archiveCard(card_id){

    }
    function assignMembers(event,card_id){
        if(event)
            event.stopPropagation();
        $('#loading').css('display','block');
        c_card_id = card_id;
        selected_card_members = [];
        $.ajax({
            type:'GET',
            url:'{{ url('/') }}/cards/fetch-members/'+card_id,
            success:function(data){
                $('#loading').css('display','none');
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
        $('#loading').css('display','block');
        var cardMembers = $("#cardMembers").select2("val");
        $.ajax({
            type:'POST',
            url:'{{ route('assign-members', Auth::user()->subdomain) }}',
            data: {
                id:c_card_id,
                members:cardMembers
            },
            success:function(data){
                $('#loading').css('display','none');
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
	$(document).ready(function(){
		$('.editable-text').mouseenter(function(event) {
			$(this).find('i').css('display','block');
		});
		$('.editable-text').mouseleave(function(event) {
			$(this).find('i').css('display','none');
		});
		$('.editable-text').click(function(event) {
			$(this).find('i').css('display','none');
			var tasklistId = $(this).closest('.board-list').attr('data-tasklist');
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
                input.id = "listName";
	            span.parentNode.insertBefore(input, span);

	            // Focus it, hook blur to undo
	            input.focus();
	            input.onblur = function() {
	                // Remove the input
	                span.parentNode.removeChild(input);

	                // Update the span
                    if(input.value == "")
                        alert('Unspecified Title for list')
	                span.innerHTML = input.value == "" ? "No title" : input.value;
	                $.ajax({
						type:'POST',
						url:'{{ route('update-tasklist', Auth::user()->subdomain) }}',
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
	//Lists
	function createList(){
		if($('#listCreate').length){
			alert('You already creating a list, Finish the list you\'re creating first');
		}else{
			$('#addListBtn').before('<div class="board-list" id="listCreate"><div class="list-title"><div class="title-left"><input type="text" class="form-control" size="4" id="nameList" placeholder="List title here"></div><div class="title-right"><i class="icon-feather-save" onclick="addList()"></i><i class="icon-feather-x" onclick="closeList()"></i></div></div></div>');
		}
	}
	function addList() {
		var name = $('#nameList').val();
		if(name!=''){
			$('#loading').css('display','block');
			$.ajax({
				type:'POST',
				url:'{{ url('/') }}/tasklists/add',
				data:{ name: name, board_id: {{$board->id}} },
				success:function(data){
					$('#loading').css('display','none');
				  	$('#listCreate').remove();
					$('#addListBtn').before('<div class="board-list draggable-list" data-tasklist="'+data.tasklist.id+'"><div class="list-title"><div class="title-left"><h5 class="editable-text"><span class="draggable-list">'+data.tasklist.title+'</span><i class="icon-feather-edit-2" style="display: none;"></i></h5></div><div class="title-right"><div class="dropdown"><button onclick="createCard('+data.tasklist.id+')" class="icon-feather-plus dropbtn draggable-list" data-placement="top" data-toggle="tooltip" title="" type="button" data-original-title="Add a task"></button></div><div class="dropdown"><button onclick="dropDown(this,event);" class="icon-feather-more-vertical dropbtn draggable-list"></button><div class="dropdown-content"><span onclick="duplicateList('+data.tasklist.id+')">Duplicate list</span><span onclick="archiveList('+data.tasklist.id+')">Archive list</span><span onclick="deleteList(this,'+data.tasklist.id+')">Delete list</span></div></div></div></div><div class="pipeline-body draggable-list" id="pipeline-'+data.tasklist.id+'"></div></div>');
                },
				error:function(error){
					console.log(error);
				}
			});
		}
	}
	$(document).on("keypress", "#nameList", function(e){
        if(e.which == 13){
            addList();
        }
    });
	function closeList(){
		$('#listCreate').remove();
	}
	function duplicateList(tasklist_id){
		$('#loading').css('display','block');
		$.ajax({
			type:'GET',
			url:'{{ url('/') }}/tasklists/duplicate/'+tasklist_id,
			success:function(data){
				$('#loading').css('display','none');
				location.reload(true);
			},
			error:function(error){
				console.log(error);
			}
		});
	}
	function archiveList(tasklist_id){

	}
	function deleteList(element,tasklist_id){
        $('#loading').css('display','block');
        $.ajax({
            type:'GET',
            url:'{{ url('/') }}/tasklists/delete/'+tasklist_id,
            success:function(data){
                $(element).closest('.board-list').remove();
                $('#loading').css('display','none');
                // location.reload(true);
            },
            error:function(error){
                console.log(error);
            }
        });
	}
</script>
<style type="text/css">
    /*Textarea Btn*/
    .txtarea{
        border-color: #047bf8;
    }
    .txtarea-create-btn{
        position: relative;
        left: 138px !important;
        top: -40px;
        width: 40%;
        margin-top: 10px;
    }
    .txtarea-close-btn{
        position: relative;
        left: -2%;
        top: 20px;
        margin-top: 10px;
    }
    /*Date input*/
    .input-group>.input-group-append span{
        display:none;
        display: inline-block;
        position: absolute;
        background-color: #047bf8;
        color: #fff;
        padding: 4px 7px;
        border-radius: 4px;
        font-size: 0.81rem;
        white-space: nowrap;
        top: -30px;
        -webkit-transform: translateX(-50%);
        transform: translateX(-50%);
        display: none;
    }
    .input-group>.input-group-append:hover span{
        display:block;
    }
    .date-input:before{
        z-index: 10;
    }
    .input-group-append{
        cursor: pointer;
    }
	/*edit Modal*/
	.os-tabs-controls.os-tabs-complex .nav-tabs{
		width: 100%
	}
	.os-tabs-controls.os-tabs-complex .nav-item{
		width: 32%;
	}
	/**/
	#addListBtn:hover{
		background-color: #047bf8;
		color: #fff;
		cursor: pointer;
	}
	#addListBtn{
		background-color: rgb(55, 134, 216);
		border-radius: 3px;
		display: grid;
		grid-auto-rows: max-content;
		grid-gap: 10px;
		height: max-content;
		padding: 10px;
	}
	.editable-text{
		display: -webkit-box;
	    display: -ms-flexbox;
	    display: flex;
	    -webkit-box-pack: justify;
	    -ms-flex-pack: justify;
	    justify-content: space-between;
	    -webkit-box-align: center;
	    -ms-flex-align: center;
	    align-items: center;
	    word-break: break-word;
	}
	.editable-text span{
		-webkit-box-flex: 1;
	    -ms-flex: 1 1 auto;
	    flex: 1 1 auto;
	    display: block;
	    overflow: hidden;
	    text-overflow: ellipsis;
	    white-space: nowrap;
	}
	.editable-text i{
		font-size: 0.6rem;
	}


	/**/
	.dropbtn-list {
		background: none;
		border: none;
		cursor: pointer;
	}

	.dropbtn-list:hover,
	.dropbtn-list:focus {
		background-color: #6c92e8;
		border: none;
        border-radius: 3px;
        padding: 3px;
	}
    .dropbtn {
		background: none;
		border: none;
		cursor: pointer;
	}

	.dropbtn:hover,
	.dropbtn:focus {
		background-color: #ddd;
		border: none;
        border-radius: 3px;
        padding: 3px;
	}

	.dropdown {
		position: relative;
		display: inline-block;
	}

	.dropdown-content {
		display: none;
		position: absolute;
		background-color: #f1f1f1;
		min-width: 160px;
		overflow: auto;
		box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
		z-index: 10;
	}

	.dropdown-content span  {
		cursor: pointer;
		color: black;
		padding: 12px 16px;
		text-decoration: none;
		display: block;
	}

	.dropdown span:hover {
		background-color: #ddd;
	}

	.show-elem {
	  	display: block;
	}
	.base {
	  /*background-color: #448fff;*/
	  font-size: 14px;
	  display: grid;
	  grid-template-rows: max-content auto;
	  grid-gap: 10px;
	  height: 100%;
	  padding: 5px;
	}

	.board {
	  display: grid;
	  grid-gap: 10px;
	  grid-template-rows: max-content auto;
	}

	.board-lists {
		height: 100vh;
	  display: grid;
	  grid-auto-columns: 272px;
	  grid-auto-flow: column;
	  grid-gap: 8px;
	  overflow: scroll;
      cursor: move;
	}

	.board-list {
	  background-color: rgb(55, 134, 216);;
	  border-radius: 3px;
	  display: grid;
	  grid-auto-rows: max-content;
	  grid-gap: 10px;
	  height: max-content;
	  padding: 10px;
	}

	.list-title {
		font-weight: bold;
		display: -webkit-box;
		display: -ms-flexbox;
		display: flex;
		-webkit-box-orient: horizontal;
		-webkit-box-direction: normal;
		-ms-flex-direction: row;
		flex-direction: row;
		-ms-flex-wrap: nowrap;
		flex-wrap: nowrap;
		-webkit-box-align: center;
		-ms-flex-align: center;
		align-items: center;
		-webkit-box-pack: justify;
		-ms-flex-pack: justify;
		justify-content: space-between;
		user-select: none;
		-webkit-touch-callout: none!important;
		-webkit-user-select: none;
		-moz-user-select: none;
		-ms-user-select: none;
		-webkit-user-drag: none;
	}
	.list-title .title-left{
		-webkit-box-flex: 1;
		-ms-flex: 1 1;
		flex: 1 1;
		overflow: hidden;
		padding-right: 0;
		text-overflow: ellipsis;
		white-space: nowrap;
		cursor: move;
	}
	.list-title .title-right{
		display: -webkit-box;
	    display: -ms-flexbox;
	    display: flex;
	    -webkit-box-pack: end;
	    -ms-flex-pack: end;
	    justify-content: flex-end;
	    -webkit-box-align: center;
	    -ms-flex-align: center;
	    align-items: center;
	    margin-left: 5px;
	}
	/*.card {
	  background-color: white;
	  border-radius: 3px;
	  box-shadow: 0 1px 0 rgba(9,30,66,.25);
	  padding: 10px;
	}*/
	/*Preview view*/

.attachment {
	border-radius: 3px;
	min-height: 80px;
	margin: 0 0 8px;
	overflow: hidden;
	position: relative;
}
.attachment .attachment-preview {
	background-color: rgba(9,30,66,.04);
	background-position: 50%;
	background-size: contain;
	background-repeat: no-repeat;
	border-radius: 3px;
	height: 80px;
	margin-top: -40px;
	position: absolute;
	top: 50%;
	left: 0;
	text-align: center;
	text-decoration: none;
	z-index: 1;
	width: 112px;
	cursor: pointer;
}
.attachment .attachment-details {
	box-sizing: border-box;
	cursor: pointer;
	padding: 8px 8px 8px 128px;
	min-height: 80px;
	margin: 0;
	z-index: 0;
}
.attachment .attachment-name {
	font-weight: 700;
	word-wrap: break-word;
	color: #047bf8;
	background-color: transparent;
	text-decoration: underline;
}
.attachment .attachment-info {
	margin-bottom: 8px;
}
a {
    color: #047bf8;
    text-decoration: none;
    background-color: transparent;
    -webkit-text-decoration-skip: objects;
}
</style>
@endsection
