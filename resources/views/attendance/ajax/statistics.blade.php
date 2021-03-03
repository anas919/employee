<div class="card element-box" style="padding: 0;">
	<div class="card-body">
		<h5 class="card-title">Statistics</h5>
		<div class="stats-list">
			@if(count($schedule))
			<div class="stats-info">
				<div class="punch-det" id="first_punch_in">
					<h6>Today's shift</h6>
					<p><small>From @if($schedule[0]->start_time>12) {{$schedule[0]->start_time-12}} pm @else {{$schedule[0]->start_time}} am @endif To @if($schedule[0]->end_time>12) {{$schedule[0]->end_time-12}} pm @else {{$schedule[0]->end_time}} am @endif</small></p>
				</div>
				<p>Today <strong>{{$worked}} <small>/ {{$schedule[0]->min_hours}} hrs</small></strong></p>
				<div class="progress">
					<div class="progress-bar bg-primary" role="progressbar" style="width: {{floatval($worked)*100/floatval($schedule[0]->min_hours)}}%" aria-valuenow="31" aria-valuemin="0" aria-valuemax="100"></div>
				</div>
			</div>
			@else
			<div class="stats-info">
				<div class="punch-det" id="first_punch_in">
					<h6>No shift today</h6>
				</div>
				<p>Today <strong>{{$worked}} hrs{{--  <small>/ {{$schedule[0]->min_hours}} hrs</small> --}}</strong></p>
				<div class="progress">
					<div class="progress-bar bg-primary" role="progressbar" style="width: @if($worked!=0){{floatval($worked)*100/7}}% @else 1% @endif" aria-valuenow="31" aria-valuemin="0" aria-valuemax="100"></div>
				</div>
			</div>
			@endif
		</div>
	</div>
</div>