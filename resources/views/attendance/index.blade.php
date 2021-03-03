@extends('layouts.app')

@section('title')
 Attendance
@endsection

@section('content')
<style type="text/css">
.card {
    border: 1px solid #ededed;
    box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.2);
    margin-bottom: 30px;
}

.card {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(0,0,0,.125);
    border-radius: .25rem;
}
.card-body {
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    padding: 1.25rem;
}
.card-title {
    color: #1f1f1f;
    font-size: 20px;
    font-weight: 500;
    margin-bottom: 20px;
}
.card-title {
    margin-bottom: .75rem;
}
.punch-det {
    background-color: #f9f9f9;
    border: 1px solid #e3e3e3;
    border-radius: 4px;
    margin-bottom: 20px;
    padding: 10px 15px;
}
.punch-info {
    margin-bottom: 20px;
}
.punch-hours {
    align-items: center;
    background-color: #f9f9f9;
    border: 5px solid #e3e3e3;
    border-radius: 50%;
    display: flex;
    font-size: 18px;
    height: 120px;
    justify-content: center;
    margin: 0 auto;
    width: 120px;
}
.punch-btn-section {
    margin-bottom: 20px;
    text-align: center;
}
.punch-status .stats-box {
    margin-bottom: 0;
}
.stats-box {
    background-color: #f9f9f9;
    border: 1px solid #e3e3e3;
    margin-bottom: 15px;
    padding: 5px;
}
/**/
.stats-list {
    height: 331px;
    overflow-y: auto;
}
.stats-info {
    margin-bottom: 5px;
}
.stats-info p {
    display: flex;
    font-size: 12px;
    justify-content: space-between;
    margin-bottom: 5px;
}
.progress {
    height: 4px;
}
.progress {
    display: -ms-flexbox;
    display: flex;
    height: 1rem;
    overflow: hidden;
    font-size: .75rem;
    background-color: #e9ecef;
    border-radius: .25rem;
}
/**/
.res-activity-list {
    height: 328px;
    list-style-type: none;
    margin-bottom: 0;
    overflow-y: auto;
    padding-left: 30px;
    position: relative;
}
.res-activity-list li {
    margin-bottom: 15px;
    position: relative;
}
.recent-activity p {
    font-size: 13px;
    margin-bottom: 0;
}
.res-activity-time {
    color: #bbb;
    font-size: 12px;
}
.res-activity-time > .fa {
    display: inline-block;
    font: normal normal normal 14px/1 FontAwesome;
    font-size: inherit;
    text-rendering: auto;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}
</style>
<div class="content-box">
	<div class="row">
		<div class="col-sm-12">
			<div class="element-wrapper">
				<h6 class="element-header">
					Attendance
				</h6>
				<div class="row">
					<div class="col-md-4">
						<div class="card element-box" style="padding: 0;">
							<div class="card-body">
								<h5 class="card-title">Attendance <small class="text-muted" id="date"></small></h5>
								@if($first_punch_in)
								<div class="punch-det" id="first_punch_in">
									<h6>Punch In at</h6>
									<p><small>{{(new DateTime($first_punch_in->start_time))->format('M d,Y g:ia')}}</small></p>
								</div>
								@else
								<div class="punch-det" style="display: none" id="punch_in"></div>
								@endif
								<div class="punch-info" id="chrono">
									<div class="punch-hours values">
										<span>00:00:00</span>
									</div>
								</div>
								<div class="punch-btn-section">
									<button type="button" class="btn btn-success btn-rounded startButton">Punch In</button>
									<button type="button" class="btn btn-danger btn-rounded pauseButton" style="display: none;">Punch Out</button>
								</div>
								<div class="statistics">
									<div class="row">
										<div class="col-md-6 col-6 text-center">
											<div class="stats-box">
												<p>Worked</p>
												<h6 id="worked">{{$worked}} hrs</h6>
											</div>
										</div>
										<div class="col-md-6 col-6 text-center">
											<div class="stats-box">
												<p>Breaks</p>
												<h6 id="breaks">{{$breaks}} hrs</h6>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4" id="ajx-statistics">
						@include('attendance.ajax.statistics')
					</div>
					<div class="col-md-4" id="ajx-activities">
						@include('attendance.ajax.activities')
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('scripts')
<script type="text/javascript" src="{{asset('js/easytimer.min.js')}}"></script>
<script type="text/javascript">
	var timer = new easytimer.Timer();
	var start_time;
	$('.startButton').click(function () {
		timer.start();
		start_time = moment().format("YYYY-MM-DD HH:mm:ss");
		$('.pauseButton').show();
		$(this).hide();
		if(!$('#first_punch_in').length){
			$('#punch_in').css('display','block')
			$('#punch_in').html('<h6>Punch In at</h6><p><small>'+moment(start_time).format('MMM DD,YYYY hh:mm A')+'</small></p>');
		}
		var punch = moment(start_time).format('MMM DD,YYYY hh:mm A');
		$('.res-activity-list').append('<li><p class="mb-0">Punch In at</p><p class="res-activity-time"><i class="fa fa-clock-o"></i> '+punch+'</p></li>');
	});
	$('.pauseButton').click(function () {
		timer.pause();
		seconds = timer.getTotalTimeValues().seconds;
		$('#loading').css('display','block');
		$.ajax({
			type:'POST',
			url:'{{ url('/') }}/attendance/add/',
			data:{
				start_time: start_time,
				seconds: seconds,
			},
			success:function(data){
				$('#loading').css('display','none');
				$('.startButton').show();
				$('.pauseButton').hide();
				timer.reset();
				timer.stop();
				console.log(data);
				$('#ajx-activities').html(data.activities);
				$('#ajx-statistics').html(data.statistics);
			},
			error:function(error){
				console.log(error);
			}
		});
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
</script>
<script type="text/javascript">
	$('#date').text(moment().format('MMM DD,YYYY'));
	$(window).bind('beforeunload', function(){
		if(timer.isRunning()){
			return 'Are you sure you want to leave?';
		}
	});
</script>
@endsection
