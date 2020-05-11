@extends('layouts.app')

@section('title')
 Apps
@endsection
@section('content')
<div class="content-box">
	<div class="row">
		<div class="col-sm-12">
			<div class="element-wrapper">
				<div class="text-center">
					<img src="new-res/track-activity.svg" alt="" width="420" height="360">
					<h2 class="display-4">
						No recent apps to show
					</h2>
					<h5>
						<small class="text-muted">To track apps members must use one of our <a href="">apps</a></small>
					</h5>
				</div>
				<h6 class="element-header">
					Apps
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
						<!-- <div class="col-12 col-lg-12"> -->
							<div class="form-group col-3 col-lg-3">
								<label for=""> Project</label>
								<select class="form-control">
									<option>
									  Project 1
									</option>
									<option>
									  Project 2
									</option>
									<option>
									  Project 3
									</option>
								</select>
							</div>
							<div class="form-group col-3 col-lg-3">
								<label for=""> Member</label>
								<select class="form-control">
									<option>
									  John Mayers
									</option>
									<option>
									  Michael Coffman
									</option>
								</select>
							</div>
							<div class="form-group col-3 col-lg-3">
								<label for=""> Device</label>
								<select class="form-control">
									<option>
									  Mobile
									</option>
									<option>
									  Pc
									</option>
								</select>
							</div>
							<div class="col-3 col-lg-3 text-right">
								<a class="btn btn-sm btn-primary btn-upper" href="#"><i class="os-icon os-icon-ui-37"></i><span>Filter</span></a>
							</div>
						<!-- </div> -->
					</div>
				</div>
				<div class="element-box">
					<div class="table-responsive">
    					<table id="apps" width="100%" class="table table-striped table-lightfont">
							<thead>
								<tr>
									<th>
										Project Name
									</th>
									<th>
										App Name
									</th>
									<th>
										Time Spent
									</th>
									<th class="text-center">
										Actions
									</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td colspan="4">Wed, Jan 8, 2020 10:00 pm CET</td>
									<td style="display: none;"></td>
									<td style="display: none;"></td>
									<td style="display: none;"></td>
								</tr>
								<tr>
									<td class="nowrap">
										Android Redesign
									</td>
									<td>
										Chrome
									</td>
									<td>
										00:20:17
									</td>
									<td class="text-center">
										<a href="#"><i class="os-icon os-icon-ui-49"></i></a>
										<a class="danger" href="#"><i class="os-icon os-icon-ui-15"></i></a>
									</td>
								</tr>
								<tr>
									<td class="nowrap">
										Android Redesign
									</td>
									<td>
										Sublime Text
									</td>
									<td>
										00:32:15
									</td>
									<td class="text-center">
										<a href="#"><i class="os-icon os-icon-ui-49"></i></a>
										<a class="danger" href="#"><i class="os-icon os-icon-ui-15"></i></a>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
	if ($('#apps').length) {
	  $('#apps').DataTable({
		  "ordering": false
	  });
	}
</script>
@endsection
