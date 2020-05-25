@extends('layouts.app')

@section('title')
 Settings
@endsection
@section('content')
<div class="content-box">
	<div class="row">
		<div class="col-sm-12">
          	<!--START - Recent Ticket Comments-->
          	<div class="element-wrapper">
          		<div class="element-actions">
          			<div class="form-inline justify-content-sm-end">
          				<!-- <a class="btn btn-sm btn-primary btn-upper" href="#"><i class="os-icon os-icon-ui-22"></i><span>Invite Member</span></a> -->
          			</div>
          		</div>
                <h6 class="element-header">
                  	General Settings
                </h6>
		        <div class="element-box-tp row">
                  	<div class="post-box col-4 col-sm-5 col-xxl-5" style="margin: 0 30px 10px 30px;">
                    	<div class="post-media" style="background-image: url({{ asset('new-res/setting-organization.svg') }})"></div>
                    	<div class="post-content">
                      		<h6 class="post-title">
                        		Organization
                      		</h6>
                      		<div class="post-text">
                        		Edit your company's name, address, time zone, and more 
                      		</div>
                      		<div class="post-foot">
                        		<div class="post-tags">
                          
                        		</div>
                        		<a class="post-link" href="#"><span>Take Action</span><i class="os-icon os-icon-arrow-right7"></i></a>
                      		</div>
                   		</div>
                  	</div>
                  	<div class="post-box col-4 col-sm-5 col-xxl-5" style="margin: 0 30px 10px 30px;">
                    	<div class="post-media" style="background-image: url({{ asset('new-res/setting-invoice.svg') }})"></div>
                    	<div class="post-content">
                      		<h6 class="post-title">
                        		Invoices
                      		</h6>
                      		<div class="post-text">
                        		Set up invoices with your tax ID, terms, and a payment button
                      		</div>
                      		<div class="post-foot">
                        		<div class="post-tags">
                          			<div class="badge badge-primary">
                            			New
                          			</div>
                        		</div>
                        		<a class="post-link" href="#"><span>Take Action</span><i class="os-icon os-icon-arrow-right7"></i></a>
                      		</div>
                    	</div>
                  	</div>
                  	<div class="post-box col-4 col-sm-5 col-xxl-5" style="margin: 0 30px 10px 30px;">
                    	<div class="post-media" style="background-image: url({{ asset('new-res/setting-employee.svg') }})"></div>
                    	<div class="post-content">
                      		<h6 class="post-title">
                        		Employees
                      		</h6>
                      		<div class="post-text">
                        		Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quia quam assumenda.
                      		</div>
                      		<div class="post-foot">
                        		<div class="post-tags">
                          			<div class="badge badge-primary">
                            			New
                          			</div>
                        		</div>
                        		<a class="post-link" href="#"><span>Take Action</span><i class="os-icon os-icon-arrow-right7"></i></a>
                      		</div>
                    	</div>
                  	</div>
                  	<div class="post-box col-4 col-sm-5 col-xxl-5" style="margin: 0 30px 10px 30px;">
                    	<div class="post-media" style="background-image: url({{ asset('new-res/setting-payroll.svg') }})"></div>
                    	<div class="post-content">
                      		<h6 class="post-title">
                        		Payroll
                      		</h6>
                      		<div class="post-text">
                        		Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt, fuga et cum!
                      		</div>
                      		<div class="post-foot">
                        		<div class="post-tags">
                          			<div class="badge badge-primary">
                            			New
                          			</div>
                        		</div>
                        		<a class="post-link" href="#"><span>Take Action</span><i class="os-icon os-icon-arrow-right7"></i></a>
                      		</div>
                    	</div>
                  	</div>
                  	<div class="post-box col-4 col-sm-5 col-xxl-5" style="margin: 0 30px 10px 30px;">
                    	<div class="post-media" style="background-image: url({{ asset('new-res/setting-project.svg') }})"></div>
                    	<div class="post-content">
                      		<h6 class="post-title">
                        		Projects
                      		</h6>
                      		<div class="post-text">
                        		Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae ipsa, praesentium! Harum.
                      		</div>
                      		<div class="post-foot">
                        		<div class="post-tags">
                          			<div class="badge badge-primary">
                            			New
                          			</div>
                        		</div>
                        		<a class="post-link" href="#"><span>Take Action</span><i class="os-icon os-icon-arrow-right7"></i></a>
                      		</div>
                    	</div>
                  	</div>
                  	<div class="post-box col-4 col-sm-5 col-xxl-5" style="margin: 0 30px 10px 30px;">
                    	<div class="post-media" style="background-image: url({{ asset('new-res/setting-team.svg') }})"></div>
                    	<div class="post-content">
                      		<h6 class="post-title">
                        		Teams
                      		</h6>
                      		<div class="post-text">
                        		Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum impedit at, veritatis?
                      		</div>
                      		<div class="post-foot">
                        		<div class="post-tags">
                          			<div class="badge badge-primary">
                            			New
                          			</div>
                        		</div>
                        		<a class="post-link" href="#"><span>Take Action</span><i class="os-icon os-icon-arrow-right7"></i></a>
                      		</div>
                    	</div>
                  	</div>
                  	<div class="post-box col-4 col-sm-5 col-xxl-5" style="margin: 0 30px 10px 30px;">
                    	<div class="post-media" style="background-image: url({{ asset('new-res/setting-time-off.svg') }})"></div>
                    	<div class="post-content">
                      		<h6 class="post-title">
                        		Time Off
                      		</h6>
                      		<div class="post-text">
                        		Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero repudiandae fugiat labore.
                      		</div>
                      		<div class="post-foot">
                        		<div class="post-tags">
                          			<div class="badge badge-primary">
                            			New
                          			</div>
                        		</div>
                        		<a class="post-link" href="#"><span>Take Action</span><i class="os-icon os-icon-arrow-right7"></i></a>
                      		</div>
                    	</div>
                  	</div>
                  	<div class="post-box col-4 col-sm-5 col-xxl-5" style="margin: 0 30px 10px 30px;">
                    	<div class="post-media" style="background-image: url({{ asset('new-res/setting-schedule.svg') }})"></div>
                    	<div class="post-content">
                      		<h6 class="post-title">
                        		Schedules
                      		</h6>
                      		<div class="post-text">
                        		Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora, vero.
                      		</div>
                      		<div class="post-foot">
                        		<div class="post-tags">
                          			<div class="badge badge-primary">
                            			New
                          			</div>
                        		</div>
                        		<a class="post-link" href="#"><span>Take Action</span><i class="os-icon os-icon-arrow-right7"></i></a>
                      		</div>
                    	</div>
                  	</div>
                  	<div class="post-box col-4 col-sm-5 col-xxl-5" style="margin: 0 30px 10px 30px;">
                    	<div class="post-media" style="background-image: url({{ asset('new-res/setting-monitoring.svg') }})"></div>
                    	<div class="post-content">
                      		<h6 class="post-title">
                        		Monitoring
                      		</h6>
                      		<div class="post-text">
                        		Lorem ipsum dolor sit amet, consectetur adipisicing elit. At autem soluta laudantium beatae itaque.
                      		</div>
                      		<div class="post-foot">
                        		<div class="post-tags">
                          			<div class="badge badge-primary">
                            			New
                          			</div>
                        		</div>
                        		<a class="post-link" href="#"><span>Take Action</span><i class="os-icon os-icon-arrow-right7"></i></a>
                      		</div>
                    	</div>
                  	</div>
                  	<div class="post-box col-4 col-sm-5 col-xxl-5" style="margin: 0 30px 10px 30px;">
                    	<div class="post-media" style="background-image: url({{ asset('new-res/setting-client.svg') }})"></div>
                    	<div class="post-content">
                      		<h6 class="post-title">
                        		Clients
                      		</h6>
                      		<div class="post-text">
                        		Lorem ipsum dolor sit amet, consectetur adipisicing elit. At autem soluta laudantium beatae itaque.
                      		</div>
                      		<div class="post-foot">
                        		<div class="post-tags">
                          			<div class="badge badge-primary">
                            			New
                          			</div>
                        		</div>
                        		<a class="post-link" href="#"><span>Take Action</span><i class="os-icon os-icon-arrow-right7"></i></a>
                      		</div>
                    	</div>
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