@extends('user.layouts.main')
@section('Content')
<div class="container-fluid">

    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card mini-stat bg-primary">
                <div class="card-body mini-stat-img">
                    <div class="mini-stat-icon">
                        <i class="mdi mdi-cube-outline float-right"></i>
                    </div>
                    <div class="text-white">
                        <h6 class="text-uppercase mb-3 font-size-16">Today Income</h6>
                        <h2 class="mb-4">1,587</h2>
                        <span class="badge badge-info"> +11% </span> <span class="ml-2">From previous
                            period</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card mini-stat bg-primary">
                <div class="card-body mini-stat-img">
                    <div class="mini-stat-icon">
                        <i class="mdi mdi-buffer float-right"></i>
                    </div>
                    <div class="text-white">
                        <h6 class="text-uppercase mb-3 font-size-16">Total Income</h6>
                        <h2 class="mb-4">$46,782</h2>
                        <span class="badge badge-danger"> -29% </span> <span class="ml-2">From previous
                            period</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card mini-stat bg-primary">
                <div class="card-body mini-stat-img">
                    <div class="mini-stat-icon">
                        <i class="mdi mdi-tag-text-outline float-right"></i>
                    </div>
                    <div class="text-white">
                        <h6 class="text-uppercase mb-3 font-size-16">Withdraw</h6>
                        <h2 class="mb-4">$15.9</h2>
                        <span class="badge badge-warning"> 0% </span> <span class="ml-2">From previous
                            period</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card mini-stat bg-primary">
                <div class="card-body mini-stat-img">
                    <div class="mini-stat-icon">
                        <i class="mdi mdi-briefcase-check float-right"></i>
                    </div>
                    <div class="text-white">
                        <h6 class="text-uppercase mb-3 font-size-16">Pending Withdraw</h6>
                        <h2 class="mb-4">1890</h2>
                        <span class="badge badge-info"> +89% </span> <span class="ml-2">From previous
                            period</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

    
@endsection