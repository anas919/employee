@extends('layouts.app')

@section('title')
 Screenshots
@endsection
@section('content')
<div class="content-box">
	<div class="row">
		<div class="col-sm-12">
			<div class="element-wrapper">
				<div class="text-center">
					<img src="new-res/track-members.svg" alt="" width="420" height="360">
					<h2 class="display-4">
						No recent activity to show
					</h2>
					<h5>
						<small class="text-muted">To track time you the member must use one of our <a href="">apps</a></small>
					</h5>
				</div>
				<h6 class="element-header">
					Screenshots
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
				<div class="element-box-tp">
					<div class="activity-boxes-w">
						<div class="activity-box-w">
							<div class="activity-time">
								11:00 pm  12:00 am
							</div>
							<div class="activity-box">
								<div class="col-md-2 col-sm-4 col-xs-6">
									<div class="container">
										<img src="new-res/screenshot1.png" alt="" class="screenshot-activity" />
										<div class="row">
											<div class="col-sm-6" style="padding-left: 0px;">
												<div class="screenshots-select">
													<div class="form-check" style="">
														<label>
															<input type="checkbox" name="monday">
														</label>
													</div>
												</div>
											</div>
											<div class="col-sm-6 text-right" style="padding-right: 0px;">
												<div class="screenshots-actions">
													<a href="#" style="color: #fff;"><i class="os-icon os-icon-ui-49"></i></a>
													<a href="#" style="color: #fff;"><i class="os-icon os-icon-ui-15"></i></a>
												</div>
											</div>
										</div>
										<div class="overlay"></div>
										<div class="button btn-sm btn btn-outline-white">View</div>
									</div>
									<div class="meta">
										<div class="meta-head">
											<div class="meta-interval"><small><button class="btn btn-white"><i class="os-icon os-icon-arrow-left4" style="font-size: 60%;"></button></i>10:20 pm - 11:00 pm<button class="btn btn-white"><i class="os-icon os-icon-arrow-right4" style="font-size: 60%;"></i></button></small></div>
											<div class="meta-icons">

											</div>
										</div>
									</div>
								</div>
								<div class="col-md-2 col-sm-4 col-xs-6">
									<div class="container">
										<img src="new-res/screenshot1.png" alt="" class="screenshot-activity" />
										<div class="row">
											<div class="col-sm-6" style="padding-left: 0px;">
												<div class="screenshots-select">
														<input class="form-control" type="checkbox">
												</div>
											</div>
											<div class="col-sm-6 text-right" style="padding-right: 0px;">
												<div class="screenshots-actions">
													<a href="#" style="color: #fff;"><i class="os-icon os-icon-ui-49"></i></a>
													<a href="#" style="color: #fff;"><i class="os-icon os-icon-ui-15"></i></a>
												</div>
											</div>
										</div>
										<div class="overlay"></div>
										<div class="button btn-sm btn btn-outline-white">View</div>
									</div>
									<div class="meta">
										<div class="meta-head">
											<div class="meta-interval"><small><button class="btn btn-white"><i class="os-icon os-icon-arrow-left4" style="font-size: 60%;"></button></i>10:20 pm - 11:00 pm<button class="btn btn-white"><i class="os-icon os-icon-arrow-right4" style="font-size: 60%;"></i></button></small></div>
											<div class="meta-icons">

											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="activity-box-w">
							<div class="activity-time">
								11:00 pm  12:00 am
							</div>
							<div class="activity-box">
								<div class="col-md-2 col-sm-4 col-xs-6">
									<div class="container">
										<img src="new-res/screenshot1.png" alt="" class="screenshot-activity" />
										<div class="row">
											<div class="col-sm-6" style="padding-left: 0px;">
												<div class="screenshots-select">
														<input class="form-control" type="checkbox">
												</div>
											</div>
											<div class="col-sm-6 text-right" style="padding-right: 0px;">
												<div class="screenshots-actions">
													<a href="#" style="color: #fff;"><i class="os-icon os-icon-ui-49"></i></a>
													<a href="#" style="color: #fff;"><i class="os-icon os-icon-ui-15"></i></a>
												</div>
											</div>
										</div>
										<div class="overlay"></div>
										<div class="button btn-sm btn btn-outline-white">View</div>
									</div>
									<div class="meta">
										<div class="meta-head">
											<div class="meta-interval"><small><button class="btn btn-white"><i class="os-icon os-icon-arrow-left4" style="font-size: 60%;"></button></i>10:20 pm - 11:00 pm<button class="btn btn-white"><i class="os-icon os-icon-arrow-right4" style="font-size: 60%;"></i></button></small></div>
											<div class="meta-icons">

											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Floated Action -->
	<div class="floated-actions">
		<div class="floated-actions-right">
			<span>1 Item Selected <a class="separate" href="#"><i class="os-icon os-icon-ui-15"></i></a></span>
		</div>
		<div class="floated-actions-left">
			<a style="margin-left: 0px;" href="#">Select All&nbsp;</a>
			<button class="close" type="button"><span class="os-icon os-icon-close"></span></button>
		</div>
	</div>
</div>
@endsection
@section('scripts')
<style>
	.container {
	  position: relative;
	  margin-top: 10px;
	  width: 100%;
	  height: 100px;
	}
	.overlay {
	  position: absolute;
	  top: 0;
	  left: 0;
	  width: 100%;
	  height: 100%;
	  background: rgba(0, 0, 0, 0);
	  transition: background 0.5s ease;
	}
	.container:hover .overlay {
	  display: block;
	  background: rgba(0, 0, 0, .3);
	}
	.screenshot-activity {
	  position: absolute;
	  width: 100%;
	  height: 100px;
	  left: 0;
	}
	.screenshots-select, .screenshots-actions  {
	  position: relative;
	  font-weight: 70;
	  font-size: 10px;
	  text-transform: uppercase;
	  color: white;
	  z-index: 1;
	  transition: top .5s ease;
	  opacity: 0;
	}
	.container:hover .screenshots-select {
		opacity: 1;
		top: 0px;
	}
	.container:hover .screenshots-actions {
		opacity: 1;
		top: 0px;
	}
	.button {
	  position: relative;
	  left:0;
	  top: 30%;
	  text-align: center;
	  opacity: 0;
	  transition: opacity .35s ease;
	}
	.btn{
		display: inherit;
	}
	.container:hover .button {
	  opacity: 1;
	}
	.meta {
		border: 1px solid #e4e9ef;
		border-top: none;
		border-radius: 0 0 3px 3px;
		padding: 15px 10px;
	}
	.meta-head {
		display: -webkit-box;
		display: -webkit-flex;
		display: -moz-flex;
		display: -ms-flexbox;
		display: flex;
		-webkit-flex-wrap: wrap;
		-moz-flex-wrap: wrap;
		-ms-flex-wrap: wrap;
		flex-wrap: wrap;
	}
	.meta-interval {
		text-align: left;
		font-size: 12px;
		color: #3e4956;
		margin-right: 10px;
	}
	.meta-icons {
		-webkit-box-flex: 1;
		-webkit-flex: 1;
		-moz-box-flex: 1;
		-moz-flex: 1;
		-ms-flex: 1;
		flex: 1;
		display: -webkit-box;
		display: -webkit-flex;
		display: -moz-flex;
		display: -ms-flexbox;
		display: flex;
		-webkit-box-pack: justify;
		-ms-flex-pack: justify;
		-webkit-justify-content: space-between;
		-moz-justify-content: space-between;
		justify-content: space-between;
		-webkit-flex-wrap: nowrap;
		-moz-flex-wrap: nowrap;
		-ms-flex-wrap: none;
		flex-wrap: nowrap;
	}
	.activity {
		color: #3e4956;
		font-size: 11px;
	}
</style>
@endsection
