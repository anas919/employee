@extends('layouts.app')

@section('title')
Dashboard
@endsection
@section('content')
<div class="content-box">
	<div class="row pt-4">
		<div class="col-sm-12">
			<!--START - Grid of tablo statistics-->
			<div class="element-wrapper">
				<div class="element-actions">
					<form class="form-inline justify-content-sm-end">
						<select class="form-control form-control-sm rounded">
							<option value="Pending">
								Today
							</option>
							<option value="Active">
								Last Week
							</option>
							<option value="Cancelled">
								Last 30 Days
							</option>
						</select>
					</form>
				</div>
				<h6 class="element-header">
					Support Service Dashboard
				</h6>
				<div class="element-content">
					<div class="tablo-with-chart">
						<div class="row">
							<div class="col-sm-5 col-xxl-4">
								<div class="tablos">
									<div class="row mb-xl-2 mb-xxl-3">
										<div class="col-sm-6">
											<a class="element-box el-tablo centered trend-in-corner padded bold-label" href="apps_support_index.html">
												<div class="value">
													24
												</div>
												<div class="label">
													New Tickets
												</div>
												<div class="trending trending-up-basic">
													<span>12%</span><i class="os-icon os-icon-arrow-up2"></i>
												</div>
											</a>
										</div>
										<div class="col-sm-6">
											<a class="element-box el-tablo centered trend-in-corner padded bold-label" href="apps_support_index.html">
												<div class="value">
													12
												</div>
												<div class="label">
													Closed Today
												</div>
												<div class="trending trending-down-basic">
													<span>12%</span><i class="os-icon os-icon-arrow-down"></i>
												</div>
											</a>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-6">
											<a class="element-box el-tablo centered trend-in-corner padded bold-label" href="apps_support_index.html">
												<div class="value">
													52
												</div>
												<div class="label">
													Agent Replies
												</div>
												<div class="trending trending-up-basic">
													<span>12%</span><i class="os-icon os-icon-arrow-up2"></i>
												</div>
											</a>
										</div>
										<div class="col-sm-6">
											<a class="element-box el-tablo centered trend-in-corner padded bold-label" href="apps_support_index.html">
												<div class="value">
													7
												</div>
												<div class="label">
													New Replies
												</div>
												<div class="trending trending-down-basic">
													<span>12%</span><i class="os-icon os-icon-arrow-down"></i>
												</div>
											</a>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-7 col-xxl-8">
								<!--START - Chart Box-->
								<div class="element-box pl-xxl-5 pr-xxl-5">
									<div class="el-tablo bigger highlight bold-label">
										<div class="value">
											12,537
										</div>
										<div class="label">
											Unique Visitors
										</div>
									</div>
									<div class="el-chart-w"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
									<canvas height="149" id="lineChart" width="526" class="chartjs-render-monitor" style="display: block; width: 526px; height: 149px;"></canvas>
								</div>
							</div>
							<!--END - Chart Box-->
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--END - Grid of tablo statistics-->
	</div>
</div>
<div class="row">
	<div class="col-sm-7 col-xxl-6">
		<!--START - Customers with most tickets-->
		<div class="element-wrapper">
			<div class="element-actions">
				<form class="form-inline justify-content-sm-end">
					<select class="form-control form-control-sm rounded">
						<option value="Pending">
							Today
						</option>
						<option value="Active">
							Last Week
						</option>
						<option value="Cancelled">
							Last 30 Days
						</option>
					</select>
				</form>
			</div>
			<h6 class="element-header">
				Customers with most tickets
			</h6>
			<div class="element-box">
				<div class="table-responsive">
					<table class="table table-lightborder">
						<thead>
							<tr>
								<th>
									Customer Name
								</th>
								<th>
									Tickets
								</th>
								<th>
									Location
								</th>
								<th class="text-center">
									Status
								</th>
								<th class="text-right">
									Last Reply
								</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<div class="user-with-avatar">
										<img alt="" src="img/avatar1.jpg"><span class="d-none d-xl-inline-block">John Mayers</span>
									</div>
								</td>
								<td class="text-center">
									15
								</td>
								<td class="text-center">
									<img alt="" src="img/flags-icons/us.png" width="25px">
								</td>
								<td class="text-center">
									<div class="status-pill green" data-title="Complete" data-toggle="tooltip" data-original-title="" title=""></div>
								</td>
								<td class="text-right">
									<span>Today </span><span class="smaller lighter">1:52pm</span>
								</td>
							</tr>
							<tr>
								<td>
									<div class="user-with-avatar">
										<img alt="" src="img/avatar2.jpg"><span class="d-none d-xl-inline-block">Kelly Brans</span>
									</div>
								</td>
								<td class="text-center">
									12
								</td>
								<td class="text-center">
									<img alt="" src="img/flags-icons/ca.png" width="25px">
								</td>
								<td class="text-center">
									<div class="status-pill red" data-title="Cancelled" data-toggle="tooltip" data-original-title="" title=""></div>
								</td>
								<td class="text-right">
									<span>Yesterday </span><span class="smaller lighter">5:34pm</span>
								</td>
							</tr>
							<tr>
								<td>
									<div class="user-with-avatar">
										<img alt="" src="img/avatar3.jpg"><span class="d-none d-xl-inline-block">Tim Howard</span>
									</div>
								</td>
								<td class="text-center">
									8
								</td>
								<td class="text-center">
									<img alt="" src="img/flags-icons/uk.png" width="25px">
								</td>
								<td class="text-center">
									<div class="status-pill green" data-title="Complete" data-toggle="tooltip" data-original-title="" title=""></div>
								</td>
								<td class="text-right">
									<span>Jan 15th </span><span class="smaller lighter">3:14pm</span>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<!--END - Customers with most tickets-->
	</div>
	<div class="col-sm-5 col-xxl-6">
		<!--START - Questions per Product-->
		<div class="element-wrapper">
			<div class="element-actions">
				<form class="form-inline justify-content-sm-end">
					<select class="form-control form-control-sm rounded">
						<option value="Pending">
							Today
						</option>
						<option value="Active">
							Last Week
						</option>
						<option value="Cancelled">
							Last 30 Days
						</option>
					</select>
				</form>
			</div>
			<h6 class="element-header">
				Questions per Product
			</h6>
			<div class="element-box">
				<div class="os-progress-bar primary">
					<div class="bar-labels">
						<div class="bar-label-left">
							<span class="bigger">MailGun</span>
						</div>
						<div class="bar-label-right">
							<span class="info">25 Tickets / 10 Pending</span>
						</div>
					</div>
					<div class="bar-level-1" style="width: 100%">
						<div class="bar-level-2" style="width: 70%">
							<div class="bar-level-3" style="width: 40%"></div>
						</div>
					</div>
				</div>
				<div class="os-progress-bar primary">
					<div class="bar-labels">
						<div class="bar-label-left">
							<span class="bigger">PhotoBook</span>
						</div>
						<div class="bar-label-right">
							<span class="info">18 Tickets / 7 Pending</span>
						</div>
					</div>
					<div class="bar-level-1" style="width: 100%">
						<div class="bar-level-2" style="width: 40%">
							<div class="bar-level-3" style="width: 20%"></div>
						</div>
					</div>
				</div>
				<div class="os-progress-bar primary">
					<div class="bar-labels">
						<div class="bar-label-left">
							<span class="bigger">Transferra</span>
						</div>
						<div class="bar-label-right">
							<span class="info">15 Tickets / 12 Pending</span>
						</div>
					</div>
					<div class="bar-level-1" style="width: 100%">
						<div class="bar-level-2" style="width: 60%">
							<div class="bar-level-3" style="width: 30%"></div>
						</div>
					</div>
				</div>
				<div class="os-progress-bar primary">
					<div class="bar-labels">
						<div class="bar-label-left">
							<span class="bigger">Versioner</span>
						</div>
						<div class="bar-label-right">
							<span class="info">12 Tickets / 4 Pending</span>
						</div>
					</div>
					<div class="bar-level-1" style="width: 100%">
						<div class="bar-level-2" style="width: 30%">
							<div class="bar-level-3" style="width: 10%"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--END - Questions per product-->
	</div>
</div>
<div class="row pt-4">
	<div class="col-sm-12">
		<!--START - Recent Ticket Comments-->
		<div class="element-wrapper">
			<h6 class="element-header">
				Recent Ticket Comments
			</h6>
			<div class="element-box-tp">
				<div class="table-responsive">
					<table class="table table-padded">
						<thead>
							<tr>
								<th></th>
								<th>
									Assigned Agent
								</th>
								<th>
									Last Comment
								</th>
								<th class="text-center">
									Ticket Category
								</th>
								<th>
									Last Reply Date
								</th>
								<th>
									Ticket Status
								</th>
								<th>
									Actions
								</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="text-center">
									<input class="form-control" type="checkbox">
								</td>
								<td>
									<div class="user-with-avatar">
										<img alt="" src="img/avatar1.jpg"><span>John Mayers</span>
									</div>
								</td>
								<td>
									<div class="smaller lighter">
										I have enabled the software for you, you can try now...
									</div>
								</td>
								<td>
									<span>Today</span><span class="smaller lighter">1:52am</span>
								</td>
								<td class="text-center">
									<a class="badge badge-success-inverted" href="">Shopping</a>
								</td>
								<td class="nowrap">
									<span class="status-pill smaller green"></span><span>Active</span>
								</td>
								<td class="row-actions">
									<a href="#"><i class="os-icon os-icon-grid-10"></i></a><a href="#"><i class="os-icon os-icon-ui-44"></i></a><a class="danger" href="#"><i class="os-icon os-icon-ui-15"></i></a>
								</td>
							</tr>
							<tr>
								<td class="text-center">
									<input class="form-control" type="checkbox">
								</td>
								<td>
									<div class="user-with-avatar">
										<img alt="" src="img/avatar2.jpg"><span>Mike Bishop</span>
									</div>
								</td>
								<td>
									<div class="smaller lighter">
										Please approve this request so we can move...
									</div>
								</td>
								<td>
									<span>Jan 19th</span><span class="smaller lighter">3:22pm</span>
								</td>
								<td class="text-center">
									<a class="badge badge-danger-inverted" href="">Cafe</a>
								</td>
								<td class="nowrap">
									<span class="status-pill smaller red"></span><span>Closed</span>
								</td>
								<td class="row-actions">
									<a href="#"><i class="os-icon os-icon-grid-10"></i></a><a href="#"><i class="os-icon os-icon-ui-44"></i></a><a class="danger" href="#"><i class="os-icon os-icon-ui-15"></i></a>
								</td>
							</tr>
							<tr>
								<td class="text-center">
									<input class="form-control" type="checkbox">
								</td>
								<td>
									<div class="user-with-avatar">
										<img alt="" src="img/avatar3.jpg"><span>Terry Crews</span>
									</div>
								</td>
								<td>
									<div class="smaller lighter">
										We will need some login credentials to make...
									</div>
								</td>
								<td>
									<span>Yesterday</span><span class="smaller lighter">7:45am</span>
								</td>
								<td class="text-center">
									<a class="badge badge-warning-inverted" href="">Restaurants</a>
								</td>
								<td class="nowrap">
									<span class="status-pill smaller yellow"></span><span>Pending</span>
								</td>
								<td class="row-actions">
									<a href="#"><i class="os-icon os-icon-grid-10"></i></a><a href="#"><i class="os-icon os-icon-ui-44"></i></a><a class="danger" href="#"><i class="os-icon os-icon-ui-15"></i></a>
								</td>
							</tr>
							<tr>
								<td class="text-center">
									<input class="form-control" type="checkbox">
								</td>
								<td>
									<div class="user-with-avatar">
										<img alt="" src="img/avatar1.jpg"><span>Phil Collins</span>
									</div>
								</td>
								<td>
									<div class="smaller lighter">
										I have enabled the software for you, you can try now...
									</div>
								</td>
								<td>
									<span>Jan 23rd</span><span class="smaller lighter">2:12pm</span>
								</td>
								<td class="text-center">
									<a class="badge badge-primary-inverted" href="">Shopping</a>
								</td>
								<td class="nowrap">
									<span class="status-pill smaller yellow"></span><span>Pending</span>
								</td>
								<td class="row-actions">
									<a href="#"><i class="os-icon os-icon-grid-10"></i></a><a href="#"><i class="os-icon os-icon-ui-44"></i></a><a class="danger" href="#"><i class="os-icon os-icon-ui-15"></i></a>
								</td>
							</tr>
							<tr>
								<td class="text-center">
									<input class="form-control" type="checkbox">
								</td>
								<td>
									<div class="user-with-avatar">
										<img alt="" src="img/avatar4.jpg"><span>Katy Pilsner</span>
									</div>
								</td>
								<td>
									<div class="smaller lighter">
										I have tried this solution but it does not open...
									</div>
								</td>
								<td>
									<span>Jan 12th</span><span class="smaller lighter">9:51am</span>
								</td>
								<td class="text-center">
									<a class="badge badge-danger-inverted" href="">Groceries</a>
								</td>
								<td class="nowrap">
									<span class="status-pill smaller green"></span><span>Active</span>
								</td>
								<td class="row-actions">
									<a href="#"><i class="os-icon os-icon-grid-10"></i></a><a href="#"><i class="os-icon os-icon-ui-44"></i></a><a class="danger" href="#"><i class="os-icon os-icon-ui-15"></i></a>
								</td>
							</tr>
							<tr>
								<td class="text-center">
									<input class="form-control" type="checkbox">
								</td>
								<td>
									<div class="user-with-avatar">
										<img alt="" src="img/avatar2.jpg"><span>Wes Morgan</span>
									</div>
								</td>
								<td>
									<div class="smaller lighter">
										I have enabled the software for you, you can try now...
									</div>
								</td>
								<td>
									<span>Jan 9th</span><span class="smaller lighter">12:45pm</span>
								</td>
								<td class="text-center">
									<a class="badge badge-primary-inverted" href="">Business</a>
								</td>
								<td class="nowrap">
									<span class="status-pill smaller yellow"></span><span>Pending</span>
								</td>
								<td class="row-actions">
									<a href="#"><i class="os-icon os-icon-grid-10"></i></a><a href="#"><i class="os-icon os-icon-ui-44"></i></a><a class="danger" href="#"><i class="os-icon os-icon-ui-15"></i></a>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<!--END - Recent Ticket Comments-->
	</div>
</div>
</div>
@endsection
@section('scripts')

@endsection
