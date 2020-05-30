@extends('layouts.app')

@section('title')
 Activities
@endsection
@section('content')
<div class="content-box">
	<div class="row">
		<div class="col-sm-12">
			<div class="element-wrapper">
			    <h6 class="element-header">
			      	Activities
			    </h6>
			    <div class="element-box-tp">
					<div class="activity-boxes-w">
						@foreach($activities->sortByDesc('created_at') as $activity)
						<div class="activity-box-w">
							<div class="activity-time">
								{{$activity->date}}
							</div>
							<div class="activity-box">
								<div class="activity-avatar">
									<div class="user-with-avatar">
										@if($activity->user->media_id)
									  		<img alt="" src="{{ asset('storage/'.$activity->user->media->reference) }}">
									  	@else
									  		<div class="avatar" style="border-radius: 50%;">{{ substr($activity->user->first_name, 0, 1).substr($activity->user->last_name, 0, 1)}}</div>
									  	@endif
									</div>
								</div>
								<div class="activity-info">
									<div class="activity-role">
										{{$activity->user->first_name}} {{$activity->user->last_name}}
									</div>
									<strong class="activity-title">{{$activity->activity}}</strong>
								</div>
							</div>
						</div>
						@endforeach
					</div>
			    </div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('scripts')

@endsection