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
													$24,000
												</div>
												<div class="label">
													Spent this week
												</div>
												<div class="trending trending-up-basic">
													<span>12%</span><i class="os-icon os-icon-arrow-up2"></i>
												</div>
											</a>
										</div>
										<div class="col-sm-6">
											<a class="element-box el-tablo centered trend-in-corner padded bold-label" href="apps_support_index.html">
												<div class="value">
													$34,050
												</div>
												<div class="label">
													Earned this week
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
													Tasks achived
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
													Pending tasks
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
		<!--Go to index ativities to get inspired-->
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
				Recent activities
			</h6>
			<div class="element-box-tp">
				<div class="activity-boxes-w">
					<div class="activity-box-w">
						<div class="activity-time">
							13 seconds ago
						</div>
						<div class="activity-box">
							<div class="activity-avatar">
								<div class="user-with-avatar">
									<div class="avatar" style="border-radius: 50%;">AF</div>
								</div>
							</div>
							<div class="activity-info">
								<div class="activity-role">
									Anas Farih
								</div>
								<strong class="activity-title">Create Offer under title "Software developer"</strong>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="element-box-tp">
				<div class="activity-boxes-w">
					<div class="activity-box-w">
						<div class="activity-time">
							13 seconds ago
						</div>
						<div class="activity-box">
							<div class="activity-avatar">
								<div class="user-with-avatar">
									<div class="avatar" style="border-radius: 50%;">AF</div>
								</div>
							</div>
							<div class="activity-info">
								<div class="activity-role">
									Anas Farih
								</div>
								<strong class="activity-title">Create Offer under title "Software developer"</strong>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="element-box-tp">
				<div class="activity-boxes-w">
					<div class="activity-box-w">
						<div class="activity-time">
							13 seconds ago
						</div>
						<div class="activity-box">
							<div class="activity-avatar">
								<div class="user-with-avatar">
									<div class="avatar" style="border-radius: 50%;">AF</div>
								</div>
							</div>
							<div class="activity-info">
								<div class="activity-role">
									Anas Farih
								</div>
								<strong class="activity-title">Create Offer under title "Software developer"</strong>
							</div>
						</div>
					</div>
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
							<span class="bigger">Project 1</span>
						</div>
						<div class="bar-label-right">
							<span class="info">25 Tasks / 10 Pending</span>
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
							<span class="info">18 Tasks / 7 Pending</span>
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
							<span class="info">15 Tasks / 12 Pending</span>
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
							<span class="info">12 Tasks / 4 Pending</span>
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
