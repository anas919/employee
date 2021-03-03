@extends('layouts.app')

@section('title')
 Candidates
@endsection
@section('content')
<div class="content-box">
  	<div class="row">
    	<div class="col-sm-12">
            <!--START - Recent Ticket Comments-->
          	<div class="element-wrapper">
          		<div class="element-actions">

          		</div>
                <h6 class="element-header">
                  	Candidates
                </h6>
                <div class="control-header">
	                <div class="row align-items-center">
	                  	<div class="col-8 col-lg-7">
	                    	<form action="" class="form-inline">
	                    		<div class="form-group mr-4">
						          	<div class="input-search-w">
					                    <input class="form-control rounded bright" placeholder="Search candidates members..." type="search">
					                </div>
						        </div>
	                    	</form>
	                  	</div>
	                  	<div class="col-4 col-lg-5 text-right">
	                    	<a class="btn btn-sm btn-primary btn-upper" href="#"><i class="os-icon os-icon-ui-37"></i><span>Filter</span></a>
	                  	</div>
	                </div>
	            </div>
				<div class="element-box">
					<div class="table-responsive">
    					<table id="dataTable1" width="100%" class="table table-striped table-lightfont">
							<thead>
								<tr>
									<th>
										<div class="form-check" style="margin-top: auto;">
											<label>
												<input type="checkbox" name="check"> <span class="label-text"></span>
											</label>
										</div>
									</th>
									<th>
										Candidates
									</th>
									<th>
										Job Title
									</th>
									<th>
										Created On
									</th>
									<th>
										Status
									</th>
									<th>
										Responsible
									</th>
									<th>
										Actions
									</th>
								</tr>
							</thead>
							<tbody>
								@forelse($candidates as $candidate)
								<tr>
									<td class="text-center" style="display: inline-flex;">
										<div class="form-check" style="margin-top: auto;">
											<label>
												<input type="checkbox" name="check"> <span class="label-text"></span>
											</label>
										</div>
									</td>
									<td>
										<div class="cell-image-list">
											@if($candidate->media_id)
												<div class="cell-img">
													<div class="user-with-avatar">
														<img alt="{{ $candidate->id }}" src="{{ asset('storage/'.$candidate->media->reference) }}">
													</div>
												</div>
											@else
												<div class="cell-img avatar">
													{{ substr($candidate->first_name, 0, 1).substr($candidate->last_name, 0, 1)}}
												</div>
											@endif
											<span class="ml-2">{{$candidate->first_name}} {{$candidate->last_name}}
												<a class="danger small-edit" href="#"><i class="os-icon os-icon-ui-07"></i></a>
											</span>
										</div>
									</td>
									<td>
										<span>{{ $candidate->offer->title }}</span>
									</td>
									<td>
										<span>{{ (new DateTime($candidate->created_at))->format('M d,Y') }}</span>
									</td>
									<td>
										<span class="badge badge-success-inverted">{{ $candidate->offer->status }}</span>
									</td>
									<td>
										<div class="cell-image-list">
											@if($candidate->offer->responsible->media_id)
												<div class="cell-img">
													<div class="user-with-avatar">
														<img alt="" src="{{ asset('storage/'.$candidate->offer->responsible->media->reference) }}">
													</div>
												</div>
											@else
												<div class="cell-img avatar">
													{{ substr($candidate->offer->responsible->first_name, 0, 1).substr($candidate->offer->responsible->last_name, 0, 1)}}
												</div>
											@endif
										</div>
									</td>
									<td class="row-actions">
										<div class="btn-group mr-1 mb-1">
											<button aria-expanded="false" aria-haspopup="true" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" id="dropdownMenuButton1" type="button">Actions</button>
											<div aria-labelledby="dropdownMenuButton1" class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 30px, 0px); top: 0px; left: 0px; will-change: transform;">
												<button class="dropdown-item" onclick="setupInterview({{ $candidate->id }})"><i class="os-icon os-icon-basic-2-259-calendar"></i> Interviews</button><a class="dropdown-item" href="{{ asset('storage/'.$candidate->resume->reference) }}"><i class="os-icon os-icon-cv-2"></i> View resume</a><button class="dropdown-item"><i class="os-icon os-icon-ui-15"></i> Delete</button>
											</div>
										</div>
									</td>
								</tr>
								@empty
								@endforelse
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!--END - Recent Ticket Comments-->
		</div>
	</div>
</div>
<div aria-hidden="true" aria-labelledby="setupInterviewModal" class="modal fade" id="setupInterviewModal" role="dialog" tabindex="-1">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">
				 	Setup Interview
				</h5>
				<button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> &times;</span></button>
			</div>
			<div class="modal-body">
				<div class="element-wrapper compact">
	                <div class="element-actions actions-only">
	                  	<a class="element-action element-action-fold" href="#"><i class="os-icon os-icon-minus-circle"></i></a>
	                </div>
	                <h6 class="element-header">
	                  	Interviews History
	                </h6>
	                <div class="element-box-tp">
						<table class="table table-compact smaller text-faded mb-0">
							<thead>
								<tr>
									<th>
										Interviewer
									</th>
									<th>
										Date
									</th>
									<th>
										Note
									</th>
								</tr>
							</thead>
							<tbody id="interviews"></tbody>
						</table>
	                </div>
              	</div>
				<form action="{{ route('add-interview', Auth::user()->subdomain) }}" enctype="multipart/form-data" method="POST" id="addSchedule">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="candidate" value="" id="candidate">
					<div class="row">
						<div class="col-sm-12">
            				<div class="form-group">
			                  <label for="">Start time(If firefox: Enter time manually)</label>
			                  <div class="date-input">
			                    <input class="start-daterange form-control" type="text" name="date" value="">
			                  </div>
			                </div>
          				</div>
						<div class="col-sm-12">
				         	<div class="form-group">
				                <label for=""> Interviewer</label>
				                <select class="form-control members-select" multiple="false" name="interviewer"></select>
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
<!-- <link href="{{ asset('bower_components/bootstrap-datetime/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
{{-- <link rel="stylesheet" href="{{ asset('http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css') }}"> --}}
<script src="{{ asset('bower_components/bootstrap-datetime/bootstrap-datetimepicker.min.js') }}"></script> -->
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
		maximumSelectionLength: 1,
		data: members,
		templateResult: function (d) { return $(d.text); },
		templateSelection: function (d) { return $(d.text); },
	});
	// $(function () {
 //        $('#datetimepicker1').datetimepicker();
 //    });
	function setupInterview(candidate_id) {
		$.ajax({
			type:'GET',
			url:'{{ url('/') }}/interviews/history/'+candidate_id,
			success:function(data){
				$('#interviews').empty();
				if(data.interviews.length > 0){
					for(let i = 0; i < data.interviews.length; i++){
						var d = new Date(data.interviews[i]['date']);
						var ye = new Intl.DateTimeFormat('en', { year: 'numeric' }).format(d);
						var mo = new Intl.DateTimeFormat('en', { month: 'short' }).format(d);
						var da = new Intl.DateTimeFormat('en', { day: '2-digit' }).format(d);
						var h = new Intl.DateTimeFormat('en', { hour: 'numeric' }).format(d);
						var m = new Intl.DateTimeFormat('en', { minute: 'numeric' }).format(d);
						var date =	mo+' '+da+','+ye+' '+h+':'+m;
						if(data.interviews[i]['note'] == null)
							var note = '';
						else
							var note = data.interviews[i]['note'];
						if(data.interviews[i]['reference']){
							var user = '<div class="cell-img"><div class="user-with-avatar"><img alt="" src="{{ url('/') }}/storage/'+data.interviews[i]['reference']+'"></div></div>';
						}else{
							var user = '<div class="cell-img avatar">'+data.interviews[i]['name']+'</div>';
						}
						$('#interviews').append('<tr><td>'+user+'</td><td>'+date+'</td><td class="text-bright">'+note+'</td></tr>');
					}
				}else{
					$('#interviews').append('<tr><td colspan="3">No interview in history</td></tr>');
				}
			},
			error:function(error){
				console.log(error);
			}
		});
		$('#candidate').val(candidate_id);
		$('#setupInterviewModal').modal('show');
	}
	$('input.start-daterange').daterangepicker({ 
		"singleDatePicker": true,
		"timePicker": true,
		// "startDate": moment().startOf('hour'),
		"showDropdowns": true,
		"locale": {
	      format: 'DD-MM-YYYY HH:mm:ss'
	    }
	});
</script>
@endsection
