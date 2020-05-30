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
									<select class="form-control">
										<option value="">
											--Project--
										</option>
										<option value="">
											Project 1
										</option>
										<option value="">
											Project 2
										</option>
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
												{{ (new DateTime($task->start_time))->format('H:i') }} - {{ (new DateTime($task->end_time))->format('H:i') }}<span class="smaller lighter"> ({{$task->duration}})</span>
											</td>
											<td class="row-actions">
												<div class="btn-group mr-1 mb-1">
													<button aria-expanded="false" aria-haspopup="true" class="btn dropdown-toggle icon-feather-more-vertical" data-toggle="dropdown" id="dropdownMenuButton1" type="button"></button>
													<div aria-labelledby="dropdownMenuButton1" class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 30px, 0px); top: 0px; left: 0px; will-change: transform;">
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
<link rel="stylesheet" type="text/css" href="{{asset('icon_fonts_assets/feather/style.css')}}">
@endsection
@section('scripts')
	<script type="text/javascript" src="{{asset('js/easytimer.min.js')}}"></script>
	<script type="text/javascript">
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
			if($('#task').val()!=''){
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
						    	console.log(i);
						    	$('#tasks').prepend('<tr id="task-'+data.task.id+'"><td><span>'+data.task.title+'</span></td><td><div class="input-group"><textarea class="description-task form-control smaller" task="'+data.task.id+'" rows="1">'+description+'</textarea><span class="input-group-btn"><i onclick="updateDescription('+data.task.id+');" class="icon-feather-save" style="font-size: 1rem;cursor: pointer;"></i></span></div></td><td>'+moment(data.task.start_time).format('HH:mm')+'- '+moment(data.task.end_time).format('HH:mm')+'<span class="smaller lighter"> ('+data.task.duration+')</span></td><td class="row-actions"><div class="btn-group mr-1 mb-1"><button aria-expanded="false" aria-haspopup="true" class="btn dropdown-toggle icon-feather-more-vertical" data-toggle="dropdown" id="dropdownMenuButton1" type="button"></button><div aria-labelledby="dropdownMenuButton1" class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 30px, 0px); top: 0px; left: 0px; will-change: transform;"><button class="dropdown-item" onclick="deleteTask('+data.task.id+');"><i class="os-icon os-icon-ui-15"></i> Delete</button></div></div></td></tr>');
						    }
						});
						if(i==0){
							$('#days-groups').prepend('<div class="element-wrapper"><h6 class="element-header">'+moment(data.task.created_at).format('MMMM DD,YYYY')+'<input type="hidden" class="task-day" value="'+moment(data.task.created_at).format('YYYY-MM-DD')+'"></h6><div class="element-box-tp"><div class="table-responsive"><table class="table table-padded"><thead><tr><th>Title</th><th>Description</th><th>Duration</th><th>Actions</th></tr></thead><tbody id="tasks"><tr id="task-'+data.task.id+'"><td><span>'+data.task.title+'</span></td><td><div class="input-group"><textarea class="description-task form-control smaller" task="'+data.task.id+'" rows="1">'+description+'</textarea><span class="input-group-btn"><i onclick="updateDescription('+data.task.id+');" class="icon-feather-save" style="font-size: 1rem;cursor: pointer;"></i> </span></div></td><td>'+moment(data.task.start_time).format('HH:mm')+'- '+moment(data.task.end_time).format('HH:mm')+'<span class="smaller lighter"> ('+data.task.duration+')</span></td><td class="row-actions"><div class="btn-group mr-1 mb-1"><button aria-expanded="false" aria-haspopup="true" class="btn dropdown-toggle icon-feather-more-vertical" data-toggle="dropdown" id="dropdownMenuButton1" type="button"></button><div aria-labelledby="dropdownMenuButton1" class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 30px, 0px); top: 0px; left: 0px; will-change: transform;"><button class="dropdown-item" onclick="deleteTask('+data.task.id+');"><i class="os-icon os-icon-ui-15"></i> Delete</button></div></div></td></tr></tbody></table></div></div></div>');
						}
					},
					error:function(error){
						console.log(error);
					}
				});
			}else{
				alert('Enter task title first');
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
					console.log(error);
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
					console.log(error);
				}
			});
		}
	</script>
@endsection