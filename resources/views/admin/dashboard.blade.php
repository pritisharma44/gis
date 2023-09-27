@extends('layout.master')
@section('content')
    <div class="title_left">
        <h2>Dashboard</h2>
    </div>

          <div class="content-wrapper">
            <div class="content">
                <!-- Top Statistics -->
                <div class="row">
                    <div class="col-xl-3 col-sm-6">
                        <div class="card card-default card-mini">
                            <div class="card-header">
                                <h2>Engineers</h2>
                               
                                <div class="sub-title">
                                    <span class="mr-1">Total Engineers</span> |
                                    <span class="mx-1">45</span>
                                    <i class="mdi mdi-arrow-up-bold text-success"></i>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart-wrapper">
                                    <div>
                                        <div id="spline-area-1"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6">
                        <div class="card card-default card-mini">
                            <div class="card-header">
                                <h2>Customers</h2>
                                <div class="sub-title">
                                    <span class="mr-1">Total Customers</span> |
                                    <span class="mx-1">50</span>
                                    <i class="mdi mdi-arrow-down-bold text-danger"></i>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart-wrapper">
                                    <div>
                                        <div id="spline-area-2"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6">
                        <div class="card card-default card-mini">
                            <div class="card-header">
                                <h2>Admins</h2>
                                <div class="sub-title">
                                    <span class="mr-1">Total Admins</span> |
                                    <span class="mx-1">20</span>
                                    <i class="mdi mdi-arrow-down-bold text-danger"></i>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart-wrapper">
                                    <div>
                                        <div id="spline-area-3"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6">
                        <div class="card card-default card-mini">
                            <div class="card-header">
                                <h2>Jobs</h2>
                                <div class="sub-title">
                                    <span class="mr-1">Total Jobs</span> |
                                    <span class="mx-1">35</span>
                                    <i class="mdi mdi-arrow-up-bold text-success"></i>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart-wrapper">
                                    <div>
                                        <div id="spline-area-4"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>
    @endsection
