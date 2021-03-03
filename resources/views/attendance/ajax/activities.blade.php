<div class="card recent-activity element-box" style="padding: 0;">
	<div class="card-body">
		<h5 class="card-title">Today Activity</h5>
		<ul class="res-activity-list">
			@forelse($timesheets as $timesheet)
			<li>
				<p class="mb-0">Punch In at</p>
				<p class="res-activity-time">
					<i class="fa fa-clock-o"></i>
					{{(new DateTime($timesheet->start_time))->format('M d,Y g:ia')}}
				</p>
			</li>
			<li>
				<p class="mb-0">Punch Out at</p>
				<p class="res-activity-time">
					<i class="fa fa-clock-o"></i>
					{{(new DateTime($timesheet->end_time))->format('M d,Y g:ia')}}
				</p>
			</li>
			@empty
			<li>
				<p class="mb-0">No activity</p>
			</li>
			@endforelse
		</ul>
	</div>
</div>