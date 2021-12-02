@extends('layouts.main')

@section('header')
    <!-- Page header start -->
    <div class="page-header">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">App</li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>

        <ul class="app-actions">
            <li>
                <a href="#" id="reportrange">
                    <span class="range-text"></span>
                    <i class="icon-chevron-down"></i>
                </a>
            </li>

            <li>
                <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Download CSV">
                    <i class="icon-cloud_download"></i>
                </a>
            </li>
        </ul>
    </div>
    <!-- Page header end -->
@endsection

@section('content')
    <div id="vueInstance">
        <!-- Row starts -->
        <div class="row gutters">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Tickets Status</div>
                    </div>
                    <div class="card-body">

                        <!-- Row starts -->
                        <div class="row gutters">
                            <div class="col-xl-2 col-lg-4 col-md-4 col-sm-4 col-12">
                                <div class="ticket-status-card">
                                    <h6>Unresolved</h6>
                                    <h3>5290</h3>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-4 col-md-4 col-sm-4 col-12">
                                <div class="ticket-status-card">
                                    <h6>Overdue</h6>
                                    <h3>770</h3>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-4 col-md-4 col-sm-4 col-12">
                                <div class="ticket-status-card">
                                    <h6>Due Today</h6>
                                    <h3>25</h3>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-4 col-md-4 col-sm-4 col-12">
                                <div class="ticket-status-card">
                                    <h6>Open</h6>
                                    <h3>1800</h3>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-4 col-md-4 col-sm-4 col-12">
                                <div class="ticket-status-card">
                                    <h6>On Hold</h6>
                                    <h3>450</h3>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-4 col-md-4 col-sm-4 col-12">
                                <div class="ticket-status-card">
                                    <h6>Unassigned</h6>
                                    <h3>275</h3>
                                </div>
                            </div>
                        </div>
                        <!-- Row ends -->

                    </div>
                </div>
            </div>
        </div>
        <!-- Row ends -->

        <!-- Row starts -->
        <div class="row gutters">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Tickets</div>
                    </div>
                    <div class="card-body">
                        <div class="custom-btn-group" role="group">
                            <button type="button" class="btn btn-outline-primary btn-sm btn-rounded">Today</button>
                            <button type="button" class="btn btn-outline-primary btn-sm btn-rounded">Yesterday</button>
                            <button type="button" class="btn btn-outline-primary btn-sm btn-rounded">Last Week</button>
                            <button type="button" class="btn btn-outline-secondary btn-sm btn-rounded">Month</button>
                        </div>
                        <div id="tickets"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Row ends -->

        <!-- Row starts -->
        <div class="row gutters">
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="card h-250">
                    <div class="card-header">
                        <div class="card-title">Support Requests</div>
                    </div>
                    <div class="card-body pt-0">
                        <div id="support-requests"></div>
                        <p class="text-center">
                            <small class="text-success">*Received highest number of requests on Saturday.</small>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="card h-250">
                    <div class="card-header">
                        <div class="card-title">Complaints</div>
                    </div>
                    <div class="card-body pt-0">
                        <div id="complaints"></div>
                        <p class="text-center">
                            <small class="text-danger">*Received highest number of complaints on Saturday.</small>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="overview-box2 h-250">
                    <i class="icon-alarm_on"></i>
                    <h5>Time to resolve complaint</h5>
                    <h4>7m:30s</h4>
                    <p>(Goal: 7m:0s)</p>
                </div>
            </div>
            <div class="col-xl-2 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="overview-box2 orange h-250">
                    <i class="icon-av_timer"></i>
                    <h5>Average speed of answer</h5>
                    <h4>0m:15s</h4>
                </div>
            </div>
        </div>
        <!-- Row ends -->

        <notifications group="notification" position="bottom left"/>
    </div>
@endsection


