@extends('layouts.app')

@section('title')
 Tasks
@endsection
@section('content')
<style type="text/css">
	.dropdown-toggle::after{
		display: none;
	}
	.element-wrapper{
		padding-bottom: 0;
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
</style>
<div class="content-box">
	<div class="row">
		<div class="col-sm-12">
			<div class="element-wrapper">
			    <h6 class="element-header">
			      	Tasks
			    </h6>
				<div class="element-box">
					<form id="frmTask">
						<div class="row">
							<div class="col-sm-10">
								<div class="form-group">
									<div class="input-group mb-2 mr-sm-2 mb-sm-0">
										<input class="form-control" placeholder="Working on..." type="text" value="" id="task">
									</div>
								</div>
							</div>
							<div class="col-sm-2">
								<div class="form-group">
									<select class="form-control" id="project">
										<option value="">
											--Project--
										</option>
										@forelse($projects as $project)
											<option value="{{$project->id}}">
												{{$project->name}}
											</option>
										@empty
										@endforelse
									</select>
								</div>
							</div>
						</div>
						<div class="form-buttons-w text-center compact">
							<div id="chrono">
								<div class="values">00:00:00</div>
								<div>
									<span><i style="font-size: 2rem;cursor: pointer;" class="icon-feather-play-circle startButton"></i></span>
									<span><i style="font-size: 2rem;cursor: pointer;display: none;" class="icon-feather-pause-circle pauseButton"></i></span>
									<span><i style="font-size: 2rem;cursor: pointer;display: none;" class="icon-feather-stop-circle stopButton"></i></span>
									<span><i style="font-size: 2rem;cursor: pointer;" class="icon-feather-refresh-cw resetButton"></i></span>
								</div>
							</div>
						</div>
					</form>
				</div>
				<div id="days-groups">
				@if(count($collection))
					@foreach ($collection as $day => $tasks)
					<div class="element-wrapper">
						<h6 class="element-header">
							{{(new DateTime($day))->format('M d,Y')}}<input type="hidden" class="task-day" value="{{$day}}">
						</h6>
						<div class="element-box-tp">
							<div class="table-responsive">
								<table class="table table-padded">
									<thead>
										<tr>
											<th>
												Title
											</th>
											<th>
												Description
											</th>
											<th>
												Duration
											</th>
											<th>
												Actions
											</th>
										</tr>
									</thead>
									<tbody id="tasks">
										@foreach($tasks as $task)
										<tr id="task-{{$task->id}}">
											<td>
												<span>{{$task->title}}</span>
											</td>
											<td>
												<div class="input-group">
													<textarea class="description-task form-control smaller" task="{{$task->id}}" rows="1">{{$task->description}}</textarea>
												   <span class="input-group-btn">
												        <i onclick="updateDescription({{$task->id}});" class="icon-feather-save" style="font-size: 1rem;cursor: pointer;"></i>
												   </span>
												</div>
											</td>
											<td>
												@if($task->start_time && $task->end_time)
													<small>{{ (new DateTime($task->start_time))->format('M d,Y g:ia') }} - {{ (new DateTime($task->end_time))->format('M d,Y g:ia') }}</small>
												@else
													-
												@endif<span class="smaller lighter"> ({{$task->duration}})</span>
                                                <button class="danger small-edit" type="button" onclick="editCard(this,event,{{ $task->id }});"><i class="os-icon os-icon-pencil-2"></i></button>
											</td>
											<td class="row-actions">
												<div class="btn-group mr-1 mb-1">
													<button aria-expanded="false" aria-haspopup="true" class="btn dropdown-toggle icon-feather-more-vertical" data-toggle="dropdown" id="dropdownMenuButton1" type="button"></button>
													<div aria-labelledby="dropdownMenuButton1" class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 30px, 0px); top: 0px; left: 0px; will-change: transform;">
														<button class="dropdown-item" onclick="dropDown(this,event,{{ $task->id }});"><i class="os-icon os-icon-tasks-checked"></i> Assign to list...</button>
														<div class="dropdown-content">
                                                            @if($task->project)
                                                                @forelse($task->project->board->tasklists as $list)
                                                                    @if($task->tasklist_id == $list->id)
                                                                        <span onclick="assignToList({{ $list->id }},{{$task->id}})"><i class="icon-feather-check"></i>{{$list->title}}</span>
                                                                    @else
                                                                        <span onclick="assignToList({{ $list->id }},{{$task->id}})">{{$list->title}}</span>
                                                                    @endif
                                                                @empty
                                                                    <span>No lists found on project {{$task->project->name}}</span>
                                                                @endforelse
                                                            @endif
					    							  	</div>
                                                        <button class="dropdown-item"><i class="os-icon os-icon-edit-1"></i> Edit</button>
														<button class="dropdown-item" onclick="deleteTask({{ $task->id }});"><i class="os-icon os-icon-ui-15"></i> Delete</button>
													</div>
												</div>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
					@endforeach
				@endif
				</div>
			</div>
		</div>
	</div>
</div>
<div aria-hidden="true" class="modal fade" id="editCardModal" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          	<div class="modal-header faded smaller">
            	<div class="modal-title">
              		Edit Task
            	</div>
            	<button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> &times;</span></button>
          	</div>
          	<div class="modal-body">
                <div class="row">
                    <div class="col-sm-6">
                  		<div class="form-group">
                    		<label for=""> Start time</label>
                    		<div class="date-input input-group">
                      			<input class="start_time-daterange form-control" placeholder="Start time" type="text" value="" id="taskStartTime">
                                <div class="input-group-append start-time">
                                    <div class="input-group-text">
                                        <i class="icon-feather-trash-2"></i>
                                    </div>
                                </div>
                            </div>
                  		</div>
                	</div>
                    <div class="col-sm-6">
                  		<div class="form-group">
                    		<label for=""> End time</label>
                    		<div class="date-input input-group">
                      			<input class="end_time-daterange form-control" placeholder="End time" type="text" value="" id="taskEndTime">
                                <div class="input-group-append end-time">
                                    <div class="input-group-text">
                                        <i class="icon-feather-trash-2"></i>
                                    </div>
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
<link rel="stylesheet" type="text/css" href="{{asset('icon_fonts_assets/feather/style.css')}}">
@endsection
@section('scripts')
<script type="text/javascript" src="{{asset('js/easytimer.min.js')}}"></script>
<script type="text/javascript">
    $('.input-group-append').on('click',function(){
        if($(this).hasClass('start-time'))
            $('input.start_time-daterange').val('');
        else if($(this).hasClass('end-time'))
            $('input.end_time-daterange').val('');
    });
    $('input.start_time-daterange').on('apply.daterangepicker', function (ev, picker) {
        $(this).val(picker.startDate.format('DD-MM-YYYY HH:mm:ss'));
    });
    $('input.end_time-daterange').on('apply.daterangepicker', function (ev, picker) {
        $(this).val(picker.startDate.format('DD-MM-YYYY HH:mm:ss'));
    });
    $('input.start_time-daterange').on('cancel.daterangepicker', function (ev, picker) {
        $(this).val('');
    });
    $('input.end_time-daterange').on('cancel.daterangepicker', function (ev, picker) {
        $(this).val('');
    });
    $('input.start_time-daterange').daterangepicker({
        "singleDatePicker": true,
        "timePicker": true,
        // "startDate": moment().startOf('hour'),
        "showDropdowns": true,
        "locale": {
          format: 'DD-MM-YYYY HH:mm:ss'
        }
    });
    $('input.end_time-daterange').daterangepicker({
        "singleDatePicker": true,
        "timePicker": true,
        // "startDate": moment().startOf('hour'),
        "showDropdowns": true,
        "locale": {
          format: 'DD-MM-YYYY HH:mm:ss'
        }
    });
    // $("input.start_time-daterange").daterangepicker({
    //     singleDatePicker: true,
    //     timePicker: true,
    //     showDropdowns: true,
    //     minYear: parseInt(moment().subtract(10, 'years').format('YYYY'),10),
    //     maxYear: parseInt(moment().add(10, 'years').format('YYYY'), 10),
    //     autoUpdateInput: false,
    //     singleClasses: "",
    //     locale: {
	//       format: 'YYYY-MM-DD hh:mm A'
	//     }
    // });
    // $("input.end_time-daterange").daterangepicker({
    //     singleDatePicker: true,
    //     timePicker: true,
    //     showDropdowns: true,
    //     minYear: parseInt(moment().subtract(10, 'years').format('YYYY'),10),
    //     maxYear: parseInt(moment().add(10, 'years').format('YYYY'), 10),
    //     autoUpdateInput: false,
    //     singleClasses: "",
    //     locale: {
	//       format: 'YYYY-MM-DD hh:mm A'
	//     }
    // });
    function editCard(element,event,task_id){
        $('#loading').css('display','block');
        c_edit_task_id = task_id;
        $.ajax({
			type:'GET',
			url:'{{ url('/') }}/tasks/edit/'+task_id,
            success:function(data){
                $('#loading').css('display','none');

                if(data.task.start_time){
                    var start_date = new Date(data.task.start_time);
                    var ye = new Intl.DateTimeFormat('en', { year: 'numeric' }).format(start_date);
                    var mo = new Intl.DateTimeFormat('en', { month: '2-digit' }).format(start_date);
                    var da = new Intl.DateTimeFormat('en', { day: '2-digit' }).format(start_date);
                    var h = new Intl.DateTimeFormat('en', { hour: 'numeric' ,hour12: false  }).format(start_date);
                    var m = new Intl.DateTimeFormat('en', { minute: '2-digit' }).format(start_date);
                    var s = new Intl.DateTimeFormat('en', { second: '2-digit' }).format(start_date);
                    var date =	da+'-'+mo+'-'+ye+' '+h+':'+m+':'+s;
                    $('#taskStartTime').data('daterangepicker').setStartDate(date);
                    $('#taskStartTime').data('daterangepicker').setEndDate(date);
                }else{
					$('input.start_time-daterange').val('');
				}
                if(data.task.end_time){
                    var end_date = new Date(data.task.end_time);
                    var ye = new Intl.DateTimeFormat('en', { year: 'numeric' }).format(end_date);
                    var mo = new Intl.DateTimeFormat('en', { month: '2-digit' }).format(end_date);
                    var da = new Intl.DateTimeFormat('en', { day: '2-digit' }).format(end_date);
                    var h = new Intl.DateTimeFormat('en', { hour: 'numeric' ,hour12: false  }).format(end_date);
                    var m = new Intl.DateTimeFormat('en', { minute: '2-digit' }).format(end_date);
                    var s = new Intl.DateTimeFormat('en', { second: '2-digit' }).format(end_date);
                    var date =	da+'-'+mo+'-'+ye+' '+h+':'+m+':'+s;
                    // console.log('start'+date);
                    $('#taskEndTime').data('daterangepicker').setStartDate(date);
                    $('#taskEndTime').data('daterangepicker').setEndDate(date);
                }else{
					$('input.end_time-daterange').val('');
				}
                $('#editCardModal').modal('show');
            },
			error:function(error){
				console.log(error);
			}
		});
	}
    $("#edit-members-save").click(function(){
    var taskStartTime = $("#taskStartTime").val();
    var taskEndTime = $("#taskEndTime").val();
        if(moment(taskEndTime, 'DD-MM-YYYY HH:mm:ss')<moment(taskStartTime, 'DD-MM-YYYY HH:mm:ss')){
            alert('End time must be greater than Start time');
        }else{
            $('#loading').css('display','block');
            $.ajax({
    			type:'POST',
    			url:'{{ url('/') }}/tasks/update/',
    			data: {
                    id:c_edit_task_id,
                    start_time: taskStartTime,
                    end_time: taskEndTime
                },
    			success:function(data){
    				$('#loading').css('display','none');
                    $('#edit-members-close').trigger("click");
    				location.reload(true);
    			},
    			error:function(error){

    			}
    		});
        }
	});
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
	function assignToList(list_id, task_id){
        $('#loading').css('display','block');
        $.ajax({
            type:'POST',
            url:'{{ route('assign-lists', Auth::user()->subdomain) }}',
            data: {
                list_id:list_id,
                task_id:task_id
            },
            success:function(data){
                $('#loading').css('display','none');
            },
            error:function(error){
                // console.log(error);
            }
        });
	}
	$(document).ready(function(){
		$('#frmTask').keydown(function(event){
			if(event.keyCode == 13 && $('#task').is(":focus") && $('#task').val()!='') {
				event.preventDefault();
				$('#chrono .stopButton').trigger("click");
				return false;
			}else if(event.keyCode == 13 && $('#task').is(":focus")){
				event.preventDefault();
				alert('Enter a name for task to save it');
			}
		});
	})
	var timer = new easytimer.Timer();
	var start_time;
	$('#chrono .startButton').click(function () {
		if($('#task').val()!=''){
			timer.start();
			start_time = moment().format("YYYY-MM-DD HH:mm:ss");
		    $('.pauseButton').show();
		    $('.stopButton').show();
		    $(this).hide();
		}else{
			alert('Enter task title first');
		}
	});
	$('#chrono .pauseButton').click(function () {
	    timer.pause();
	    $('.startButton').show();
	    $(this).hide();
	});
	$('#chrono .stopButton').click(function () {
		if($('#task').val()!='' && $('#project').val()!=''){
    		seconds = timer.getTotalTimeValues().seconds;
		    timer.stop();
		    $('.pauseButton').hide();
		    $('.stopButton').hide();
    		$('.startButton').show();
			$('#loading').css('display','block');
    		$.ajax({
				type:'POST',
				url:'{{ url('/') }}/tasks/add/',
				data:{
					title: $('#task').val(),
					project: $('#project').val(),
					start_time: start_time,
					seconds: seconds,
				},
				success:function(data){
					$('#loading').css('display','none');
					$('#message-success').text(data.success);
					$("#alert-success").show();
					setTimeout(function() { $("#alert-success").hide(); }, 3000);
					var i=0;
					var description='';
					if(data.task.description)
						description = data.task.description;
					$(".element-header .task-day").each(function() {
					    if($(this).val() == moment(data.task.created_at).format('YYYY-MM-DD')){
					    	i = i+1;
					    	$('#tasks').prepend('<tr id="task-'+data.task.id+'"><td><span>'+data.task.title+'</span></td><td><div class="input-group"><textarea class="description-task form-control smaller" task="'+data.task.id+'" rows="1">'+description+'</textarea><span class="input-group-btn"><i onclick="updateDescription('+data.task.id+');" class="icon-feather-save" style="font-size: 1rem;cursor: pointer;"></i></span></div></td><td>'+moment(data.task.start_time).format('HH:mm')+'- '+moment(data.task.end_time).format('HH:mm')+'<span class="smaller lighter"> ('+data.task.duration+')</span></td><td class="row-actions"><div class="btn-group mr-1 mb-1"><button aria-expanded="false" aria-haspopup="true" class="btn dropdown-toggle icon-feather-more-vertical" data-toggle="dropdown" id="dropdownMenuButton1" type="button"></button><div aria-labelledby="dropdownMenuButton1" class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 30px, 0px); top: 0px; left: 0px; will-change: transform;"><button class="dropdown-item" onclick="deleteTask('+data.task.id+');"><i class="os-icon os-icon-ui-15"></i> Delete</button></div></div></td></tr>');
					    }
					});
					if(i==0){
						$('#days-groups').prepend('<div class="element-wrapper"><h6 class="element-header">'+moment(data.task.created_at).format('MMMM DD,YYYY')+'<input type="hidden" class="task-day" value="'+moment(data.task.created_at).format('YYYY-MM-DD')+'"></h6><div class="element-box-tp"><div class="table-responsive"><table class="table table-padded"><thead><tr><th>Title</th><th>Description</th><th>Duration</th><th>Actions</th></tr></thead><tbody id="tasks"><tr id="task-'+data.task.id+'"><td><span>'+data.task.title+'</span></td><td><div class="input-group"><textarea class="description-task form-control smaller" task="'+data.task.id+'" rows="1">'+description+'</textarea><span class="input-group-btn"><i onclick="updateDescription('+data.task.id+');" class="icon-feather-save" style="font-size: 1rem;cursor: pointer;"></i> </span></div></td><td>'+moment(data.task.start_time).format('HH:mm')+'- '+moment(data.task.end_time).format('HH:mm')+'<span class="smaller lighter"> ('+data.task.duration+')</span></td><td class="row-actions"><div class="btn-group mr-1 mb-1"><button aria-expanded="false" aria-haspopup="true" class="btn dropdown-toggle icon-feather-more-vertical" data-toggle="dropdown" id="dropdownMenuButton1" type="button"></button><div aria-labelledby="dropdownMenuButton1" class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 30px, 0px); top: 0px; left: 0px; will-change: transform;"><button class="dropdown-item" onclick="deleteTask('+data.task.id+');"><i class="os-icon os-icon-ui-15"></i> Delete</button></div></div></td></tr></tbody></table></div></div></div>');
					}
				},
				error:function(error){

				}
			});
		}else if($('#task').val()==''){
			alert('Enter task title first');
		}else if($('#project').val()==''){
            alert('Select project');
        }
	});
	$('#chrono .resetButton').click(function () {
	    timer.reset();
		timer.stop();
		$('.pauseButton').hide();
		$('.stopButton').hide();
		$('.startButton').show();
	});
	timer.addEventListener('secondsUpdated', function (e) {
	    $('#chrono .values').html(timer.getTimeValues().toString());
	});
	timer.addEventListener('started', function (e) {
	    $('#chrono .values').html(timer.getTimeValues().toString());
	});
	timer.addEventListener('reset', function (e) {
	    $('#chrono .values').html(timer.getTimeValues().toString());
	});
	function updateDescription(task_id){
		$('#loading').css('display','block');
		var desc = $('textarea[task='+task_id+']').val();
		$.ajax({
			type:'POST',
			data: {
				task_id: task_id,
				description: desc,
			},
			url:'{{ url('/') }}/tasks/update/',
			success:function(data){
				$('#loading').css('display','none');
				$('textarea[task='+task_id+']').text(data.task.description);
				$('#message-success').text(data.success);
				$("#alert-success").show();
				setTimeout(function() { $("#alert-success").hide(); }, 3000);
			},
			error:function(error){

			}
		});
	}
	function deleteTask(task_id){
		$('#loading').css('display','block');
		$.ajax({
			type:'POST',
			data: {
				task_id: task_id
			},
			url:'{{ url('/') }}/tasks/delete/',
			success:function(data){
				$('#loading').css('display','none');
				$('#task-'+task_id).remove();
				$('#message-success').text(data.success);
				$("#alert-success").show();
				setTimeout(function() { $("#alert-success").hide(); }, 3000);
			},
			error:function(error){

			}
		});
	}
</script>
@endsection
