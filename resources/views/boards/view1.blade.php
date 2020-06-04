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
	      		<div class="board-list">
			        <div class="list-title">
			        	<div class="title-left">
			        		<h5 class="editable-text" data-tasklist="{{ $tasklist->id }}"><span>{{ $tasklist->title }}</span><i class="icon-feather-edit-2" style="display: none;"></i></h5>
			        	</div>
			        	<div class="title-right">
			        		<div class="dropdown">
								<button onclick="dropDown(this);" class="icon-feather-plus dropbtn"></button>
								<div class="dropdown-content">
									<span>Home</span>
									<span>About</span>
									<span>Contact</span>
								</div>
							</div>
			        		<div class="dropdown">
							  	<button onclick="dropDown(this);" class="icon-feather-more-vertical dropbtn"></button>
							  	<div id="myDropdown1" class="dropdown-content">
								    <span onclick="createCard({{ $tasklist->id }})"><i class="os-icon os-icon-ui-22"></i>Add Card</span>
								    <span onclick="duplicateList({{ $tasklist->id }})"><i class="os-icon os-icon-grid-10"></i>Duplicate List</span>
								    <span onclick="archiveList({{ $tasklist->id }})"><i class="os-icon os-icon-ui-44"></i>Contact</span>
							  	</div>
							</div>
			        	</div>
			        </div>
			        <div class="pipeline-body" id="pipeline-{{ $tasklist->id }}">
	        			@forelse($tasklist->cards->sortByDesc('order') as $card)
	          			<div class="pipeline-item" data-tasklist="{{ $tasklist->id }}" data-card="{{ $card->id }}" onclick="editCard({{ $card->id }})">
	            			<div class="pi-controls">
	              				<div class="pi-settings">
	                				<i class="os-icon os-icon-ui-46"></i>
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

			        <div class="add-card" onclick="createCard(this,{{ $tasklist->id }})">
			          	+ Add another card
			        </div>
	      		</div>
	      		@empty
	      		@endforelse
	      		<div onclick="createList()" class="board-list" id="addListBtn">
	      			<span>+ Add list</span>
		    	</div>
	    	</div>
	  	</div>
	</div>
</div>
@endsection
@section('scripts')
<link rel="stylesheet" type="text/css" href="{{asset('icon_fonts_assets/feather/style.css')}}">
<script src="{{ asset('bower_components/dragula.js/dist/dragula.min.js') }}"></script>
<link href="{{ asset('bower_components/dragula.js/dist/dragula.min.css') }}" rel="stylesheet">
<script type="text/javascript">
	function createList(){
		if($('#listCreate').length){
			alert('You already creating a list, Finish the list you\'re creating first');
		}else{
			$('#addListBtn').before('<div class="board-list" id="listCreate"><div class="list-title"><div class="title-left"><input type="text" class="form-control" size="4"><i class="icon-feather-edit-2" style="display: none;"></i></div><div class="title-right"></div></div></div>');
		}
	}
	function closeList(){
		$('#listCreate').remove();
	}
	var uploadedFiles = {
    	files : {}
	};
	var uniqId=0;
	Dropzone.autoDiscover = false;
	// "myAwesomeDropzone" is the camelized version of the HTML element's ID
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
$(document).ready(function(){
	$('.editable-text').mouseenter(function(event) {
		$(this).find('i').css('display','block');
	});
	$('.editable-text').mouseleave(function(event) {
		$(this).find('i').css('display','none');
	});
	$('.editable-text').click(function(event) {
		$(this).find('i').css('display','none');
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
function dropDown(element) {
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
</script>
<style type="text/css">
	/**/
	#addListBtn:hover{
		background-color: #047bf8;
		color: #fff;
		cursor: pointer;
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
	.dropbtn {
		background: none;
		border: none;
		cursor: pointer;
	}

	.dropbtn:hover,
	.dropbtn:focus {
		background-color: #ddd;
		border: none;
	  /*background-color: #2980B9;*/
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
		z-index: 1;
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
	}

	.board-list {
	  background-color: rgb(202, 205, 210);
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

	.add-card {
	  padding-top: 10px;
	  padding-bottom: 5px;
	}
</style>
@endsection