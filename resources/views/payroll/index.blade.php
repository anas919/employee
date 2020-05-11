@extends('layouts.app')

@section('title')
 Payroll
@endsection
@section('content')
<div class="content-box">
	<div class="row">
		<div class="col-sm-12">
			<div class="element-wrapper">
				<div class="element-actions">
					<div class="form-inline justify-content-sm-end">
						<a class="btn btn-sm btn-primary btn-upper" href="#"><i class="os-icon os-icon-ui-22"></i><span>Add Salary</span></a>
					</div>
				</div>
				<h6 class="element-header">
					Employee Salary <strong style="font-weight: bolder !important;">(Month 1: Ending 31 Friday January 2020)</strong>
				</h6>
				<div class="control-header">
					<div class="row align-items-center">
						<div class="col-10 col-lg-10">
							<form action="">
								<div class="row">
									<div class="form-group col-sm-3">
										<div class="input-search-w">
											<input class="form-control rounded bright" placeholder="Search team members..." type="search">
										</div>
									</div>
									<div class="form-group col-sm-3">
										<select class="form-control">
											  <option>
												Search by Role
											  </option>
											  <option>
												Super Admin
											  </option>
											  <option>
												User
											  </option>
											  <option>
												Viewer
											  </option>
										</select>
									</div>
									<div class="form-group col-sm-3 row">
										<label for="" class="col-sm-3 col-form-label">From:</label>
										<div class="col-sm-9">
											<div class="date-input">
												<input class="single-daterange form-control" placeholder="From" type="text">
											</div>
										</div>
									</div>
									<div class="form-group col-sm-3 row">
										<label for="" class="col-sm-2 col-form-label">To:</label>
										<div class="col-sm-10">
											<div class="date-input">
												<input class="single-daterange form-control" placeholder="To" type="text">
											</div>
										</div>
									</div>
								</div>
							</form>
						</div>
						<div class="col-2 col-lg-2 text-right">
							<a class="btn btn-sm btn-primary btn-upper" href="#"><i class="os-icon os-icon-ui-37"></i><span>Filter</span></a>
						</div>
					</div>
				</div>
				<div class="element-box">
					<div class="row">
						<small>Week&nbsp;</small>
						<div class="week-column week-width week-first week-active" onclick="week(1)"></div>
						<div class="week-column week-width" onclick="week(2)"></div>
						<div class="week-column week-width" onclick="week(3)"></div>
						<div class="week-column week-width" onclick="week(4)"></div>
						<div class="week-column week-width" onclick="week(5)"></div>
						<div class="week-column week-width" onclick="week(6)"></div>
						<div class="week-column week-width" onclick="week(7)"></div>
						<div class="week-column week-width" onclick="week(8)"></div>
						<div class="week-column week-width" onclick="week(9)"></div>
						<div class="week-column week-width" onclick="week(10)"></div>
						<div class="week-column week-width" onclick="week(11)"></div>
						<div class="week-column week-width" onclick="week(12)"></div>
						<div class="week-column week-width" onclick="week(13)"></div>
						<div class="week-column week-width" onclick="week(14)"></div>
						<div class="week-column week-width" onclick="week(15)"></div>
						<div class="week-column week-width" onclick="week(16)"></div>
						<div class="week-column week-width" onclick="week(17)"></div>
						<div class="week-column week-width" onclick="week(18)"></div>
						<div class="week-column week-width" onclick="week(19)"></div>
						<div class="week-column week-width" onclick="week(20)"></div>
						<div class="week-column week-width" onclick="week(21)"></div>
						<div class="week-column week-width" onclick="week(22)"></div>
						<div class="week-column week-width" onclick="week(23)"></div>
						<div class="week-column week-width" onclick="week(24)"></div>
						<div class="week-column week-width" onclick="week(25)"></div>
						<div class="week-column week-width" onclick="week(26)"></div>
						<div class="week-column week-width" onclick="week(27)"></div>
						<div class="week-column week-width" onclick="week(28)"></div>
						<div class="week-column week-width" onclick="week(29)"></div>
						<div class="week-column week-width" onclick="week(30)"></div>
						<div class="week-column week-width" onclick="week(31)"></div>
						<div class="week-column week-width" onclick="week(32)"></div>
						<div class="week-column week-width" onclick="week(33"></div>
						<div class="week-column week-width" onclick="week(34)"></div>
						<div class="week-column week-width" onclick="week(35)"></div>
						<div class="week-column week-width" onclick="week(36)"></div>
						<div class="week-column week-width" onclick="week(37)"></div>
						<div class="week-column week-width" onclick="week(38)"></div>
						<div class="week-column week-width" onclick="week(39)"></div>
						<div class="week-column week-width" onclick="week(40)"></div>
						<div class="week-column week-width" onclick="week(41)"></div>
						<div class="week-column week-width" onclick="week(42)"></div>
						<div class="week-column week-width" onclick="week(43)"></div>
						<div class="week-column week-width" onclick="week(44)"></div>
						<div class="week-column week-width" onclick="week(45)"></div>
						<div class="week-column week-width" onclick="week(46)"></div>
						<div class="week-column week-width" onclick="week(47)"></div>
						<div class="week-column week-width" onclick="week(48)"></div>
						<div class="week-column week-width" onclick="week(49)"></div>
						<div class="week-column week-width" onclick="week(50)"></div>
						<div class="week-column week-width" onclick="week(51)"></div>
						<div class="week-column week-width week-last" onclick="week(52)"></div>
					</div>
					<div class="row">
						<small>Month&nbsp;</small>
						<div class="month-column month-width month-first month-active" onclick="month(1)"></div>
						<div class="month-column month-width" onclick="month(2)"></div>
						<div class="month-column month-width"  onclick="month(3)"></div>
						<div class="month-column month-width"  onclick="month(4)"></div>
						<div class="month-column month-width"  onclick="month(5)"></div>
						<div class="month-column month-width"  onclick="month(6)"></div>
						<div class="month-column month-width"  onclick="month(7)"></div>
						<div class="month-column month-width"  onclick="month(8)"></div>
						<div class="month-column month-width"  onclick="month(9)"></div>
						<div class="month-column month-width"  onclick="month(10)"></div>
						<div class="month-column month-width"  onclick="month(11)"></div>
						<div class="month-column month-width month-last"  onclick="month(12)"></div>
					</div>
					<div class="table-responsive">
						<table id="dataTable1" width="100%" class="table table-striped table-lightfont">
							<thead>
								<tr>
									<th></th>
									<th>
										Employee
									</th>
									<th>
										Gross Pay
									</th>
									<th>
										Tax
									</th>
									<th>
										Earnings
									</th>
									<th>
										Deductions
									</th>
									<th>
										Net Pay
									</th>
									<th>
										Payslip
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
										<span>300$</span>
									</td>
									<td>
										<span>3$</span>
									</td>
									<td>
										<span>300$</span>
									</td>
									<td>
										<span>15$</span>
									</td>
									<td>
										<span>282$</span>
									</td>
									<td>
										<button aria-expanded="false" aria-haspopup="true" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" id="payslipMenuButton1" type="button">Payslip</button>
										<div aria-labelledby="payslipMenuButton1" class="dropdown-menu">
											<a class="dropdown-item" href="#"> PDF</a>
											<a class="dropdown-item" href="payroll-payslip.html"> View</a>
											<a class="dropdown-item" href="#"> Print</a>
											<a class="dropdown-item" href="#"> Send</a>
										</div>
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
		</div>
	</div>
</div>
@endsection
@section('scripts')
<style>
	.week-column {
		padding: 8px 7px;
		background: #EEF5FF;
		border: 1px solid #AEC8FF;
		margin-bottom: 15px;
	}
	.week-width {
		max-width: 1px;
	}
	.week-active {
		background: #0064d5;
	}
	.week-first {
		border-top-left-radius: 5px;
		border-bottom-left-radius: 5px;
	}
	.week-last {
		border-top-right-radius: 5px;
		border-bottom-right-radius: 5px;
	}
	.month-column {
		padding: 8px 34px;
		background: #EEF5FF;
		border: 1px solid #AEC8FF;
		margin-bottom: 15px;
	}
	.month-width {
		max-width: 1px;
	}
	.month-active {
		background: #0064d5;
	}
	.month-first {
		border-top-left-radius: 5px;
		border-bottom-left-radius: 5px;
	}
	.month-last {
		border-top-right-radius: 5px;
		border-bottom-right-radius: 5px;
	}
</style>
<script>
	function week(weekNumber) {
		var currentDate = new Date();
		var currentYear = currentDate.getFullYear();

		var date = new Date("Jan 01, " + currentYear + " 01:00:00");
		var week = date.getTime() + 604800000 * (weekNumber - 1);
		var weekFirstDay = new Date(week);
		var weekLastDay = new Date(week + 518400000);
	}
	function month(monthNumber) {
		var currentDate = new Date();
		var monthFirstDay = new Date(currentDate.getFullYear(), monthNumber - 1, 1);
		var monthLastDay = new Date(currentDate.getFullYear(), monthNumber, 0);
	}
</script>
@endsection
