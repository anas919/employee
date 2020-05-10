@extends('layouts.app')

@section('title')
 Schedules
@endsection
@section('content')
<div class="content-box">
	<div class="row">
		<div class="col-sm-12">
			<!--START - Recent Ticket Comments-->
			<div class="element-wrapper">
				<div class="element-actions">
					<div class="form-inline justify-content-sm-end">
						<button class="btn btn-sm btn-primary btn-upper" data-target="#addShiftModal" data-toggle="modal" type="button"><i class="os-icon os-icon-ui-22"></i><span>Add Schedule</span></button>
					</div>
				</div>
				<h6 class="element-header">
					Schedules
				</h6>
				<div class="control-header">
					<div class="row align-items-center">
						<div class="col-8 col-lg-7">
							<div class="form-group">
								<label for=""> Dates</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<div class="input-group-text">
											<i class="os-icon os-icon-ui-83"></i>
										</div>
									</div>
									<input class="form-control date-range-picker" type="text" value="">
								</div>
							</div>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="form-group col-4 col-lg-4">
							<select class="form-control">
								<option>
									Time Zone
								</option>
								<option>
									Morocco - Casablanca (GMT+00:00)
								</option>
								<option>
									Amesterdam - Netherlands (GMT+01:00)
								</option>
							</select>
						</div>
						<div class="form-group col-4 col-lg-4">
							<select class="form-control members-select" multiple="true"></select>
						</div>
						<div class="col-4 col-lg-4 text-right">
							<a class="btn btn-sm btn-primary btn-upper" href="#"><i class="os-icon os-icon-ui-37"></i><span>Filter</span></a>
						</div>
					</div>
				</div>
				<div class="element-box">
					<div id="shifts"></div>
					<div id='calendar'></div>
				</div>
			</div>
			<!--END - Recent Ticket Comments-->
		</div>
	</div>
</div>
<div aria-hidden="true" aria-labelledby="addShiftModal" class="modal fade" id="addShiftModal" role="dialog" tabindex="-1">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">
				 	Add Schedule
				</h5>
				<button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> &times;</span></button>
			</div>
			<div class="modal-body">
				<form action="{{ route('add-schedule', Auth::user()->subdomain) }}" enctype="multipart/form-data" method="POST" id="addSchedule">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<div for="">
									<div class="row">
										<div class="col-6">
											Members
										</div>
										<div class="col-6 text-right">
											<button class="small-edit">Select All</button>
										</div>
									</div>
								</div>
								<select class="form-control members-select" multiple="true" name="members[]"></select>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="">Start Date</label>
								<div class="date-input">
									<input class="single-daterange form-control" placeholder="dd/mm/yyy" type="text" value="" name="start_date" id="start_date">
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="">End Date</label>
								<div class="date-input">
									<input class="single-daterange form-control" placeholder="dd/mm/yyy" type="text" value="" name="end_date" id="end_date">
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label for="">Start time</label>
								<select class="form-control" name="start_time" id="start_time">
									<option value="00">00</option><option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option><option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option><option value="09">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option>
								</select>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label for="">End time</label>
								<select class="form-control" name="end_time" id="end_time">
									<option value="00">00</option><option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option><option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option><option value="09">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option>
								</select>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label for="">Minimum Hours</label>
								<input class="form-control" type="number" value="7" name="min_hours">
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<div class="form-check" style="margin-left: 5px;float: left;">
									<label>
										<input type="checkbox" name="monday"> <span class="label-text">Monday</span>
									</label>
								</div>
								<div class="form-check" style="margin-left: 5px;float: left;">
									<label>
										<input type="checkbox" name="tuesday"> <span class="label-text">Tuesday</span>
									</label>
								</div>
								<div class="form-check" style="margin-left: 5px;float: left;">
									<label>
										<input type="checkbox" name="wednesday"> <span class="label-text">Wednesday</span>
									</label>
								</div>
								<div class="form-check" style="margin-left: 5px;float: left;">
									<label>
										<input type="checkbox" name="thursday"> <span class="label-text">Thursday</span>
									</label>
								</div>
								<div class="form-check" style="margin-left: 5px;float: left;">
									<label>
										<input type="checkbox" name="friday"> <span class="label-text">Friday</span>
									</label>
								</div>
								<div class="form-check" style="margin-left: 5px;float: left;">
									<label>
										<input type="checkbox" name="saturday"> <span class="label-text">Saturday</span>
									</label>
								</div><div class="form-check" style="margin-left: 5px;float: left;">
									<label>
										<input type="checkbox" name="sunday"> <span class="label-text">Sunday</span>
									</label>
								</div>
							</div>
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
@endsection
@section('scripts')
	<script src="{{ asset('js/main_rentals.js?version=4.4.0') }}"></script>
	<style>
	 .select2 {
	  width: 100% !important;
	 }
	</style>
	<script>
		var members = [];
		@forelse($members as $member)
			members.push({ id: {{ $member->id }}, text: '<div> @if ($member->media_id)<img src="{{ asset('storage/'.$member->media->reference) }}" width="30px" height="30px">{{ $member->first_name }} {{ $member->last_name }} @else <div class="avatar" style="border-radius: 50%;">{{ substr($member->first_name, 0, 1).substr($member->last_name, 0, 1) }}</div>{{ $member->first_name }} {{ $member->last_name }} @endif </div>' });
		@empty
		@endforelse
		$(".members-select").select2({
			// maximumSelectionLength: 1,
			data: members,
			templateResult: function (d) { return $(d.text); },
			templateSelection: function (d) { return $(d.text); },
		});
   	</script>
   	<script>
	   	if ($("#shifts").length) {
		    var calendar;

		    schedules = [];
			@foreach ($schedules as $schedule)
				var start_date = '{{ $schedule->start_date }}'.split("-");
				var end_date = '{{ $schedule->end_date }}'.split("-");
				schedules.push({
					title: '{{ $schedule->member->first_name }}{{ $schedule->member->last_name }}',
					start: new Date(start_date[0], parseInt(start_date[1])-1, parseInt(start_date[2]), {{ $schedule->start_time }}, 0),
					end: new Date(end_date[0], parseInt(end_date[1])-1, parseInt(end_date[2]), {{ $schedule->end_time }}, 0),
					backgroundColor : @if($schedule->attendance == 'missed') '#F5424C' @elseif($schedule->attendance == 'coming') '#0064d5' @elseif($schedule->attendance == 'late') '#f59942' @elseif($schedule->attendance == 'attended') '#03bd9e' @else '#03bd9e' @endif,
					extendedProps: {
				        title: 'Title Event',
				        description: 'Retard or something like that'
				    }
				});
			@endforeach

		    calendar = $("#shifts").fullCalendar({
		      	header: {
		        	left: "prev,next today",
		        	center: "title",
		        	right: "month,agendaWeek,agendaDay"
		      	},
		      	selectable: true,
		      	selectHelper: true,
				displayEventEnd: true,
    			weekends:true,
    			hiddenDays: [6,0],
		      	select: function select(start, end, allDay) {
			      	var d = new Date(end._i);
	 				d.setDate(d.getDate()-1);
			      	$('#end_date').val(d.toLocaleDateString("en-US"));
			      	$('#start_date').val(new Date(start._i).toLocaleDateString("en-US"));
			      	$('#addShiftModal').modal('show');

			        return calendar.fullCalendar("unselect");
		      	},
		      	editable: false,
		      	events: schedules,
		      	eventRender: function(eventObj, $el) {
					$el.popover({
						html: true,
						toggle: 'popover',
						placement: 'top',
						container: 'body',
						title: '<span><strong>'+eventObj.extendedProps.title+'</strong></span><button type="button" id="close" class="close" onclick="$(this).popover(&quot;hide&quot;);">&times;</button>',
						content: '<!--<img src="http://localhost:8000/img/avatar2.jpg">-->'+eventObj.extendedProps.description,
					});
			    }
		    });
		}

		$('#addSchedule').submit(function () {
			// Check if empty of not
			if($("#start_time").val() > $("#end_time").val()){
				alert("End time must be greater than Start time");
				return false;
			}
		});
		$("html").on("mouseup", function (e) {
		    var l = $(e.target);
		    if (l[0].className.indexOf("popover") == -1) {
		        $(".popover").each(function () {
		            $(this).popover("hide");
		        });
		    }
		});
   </script>
@endsection
