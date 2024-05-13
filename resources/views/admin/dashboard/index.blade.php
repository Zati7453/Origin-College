@extends('admin.layouts.main')
@section('Content')
@section('Title', 'Dashboard | ORIGIN INTERNATIONAL COLLEGE')
@section('Styles')
<style>

</style>
@endsection
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-sm-6">
            <div class="page-title-box">
                <h4>Dashboard</h4>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Welcome</a></li>
                    <li class="breadcrumb-item"><a
                            href="javascript: void(0);">{{ \Illuminate\Support\Facades\Auth::user()->name }}</a></li>

                </ol>
            </div>
        </div>
        {{-- <div class="col-sm-6">
            <div class="state-information d-none d-sm-block">
                <div class="state-graph">
                    <div id="header-chart-1"></div>
                    <div class="info">Balance $ 2,317</div>
                </div>
                <div class="state-graph">
                    <div id="header-chart-2"></div>
                    <div class="info">Item Sold 1230</div>
                </div>
            </div>
        </div> --}}
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card mini-stat bg-primary">
                <div class="card-body mini-stat-img">
                    <div class="mini-stat-icon">
                        <i class="mdi mdi-file-multiple-outline float-right"></i>
                    </div>
                    <div class="text-white">
                        <h6 class="text-uppercase mb-3 font-size-16">Total Applications</h6>
                        <h2 class="mb-4">{{str_pad($dashboard['total'], 2, '0', STR_PAD_LEFT)}}</h2>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card mini-stat bg-primary">
                <div class="card-body mini-stat-img">
                    <div class="mini-stat-icon">
                        <i class="mdi mdi-file-question-outline float-right"></i>
                    </div>
                    <div class="text-white">
                        <h6 class="text-uppercase mb-3 font-size-16">Pending Applications</h6>
                        <h2 class="mb-4">{{str_pad($dashboard['pending'], 2, '0', STR_PAD_LEFT)}}</h2>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card mini-stat bg-primary">
                <div class="card-body mini-stat-img">
                    <div class="mini-stat-icon">
                        <i class="mdi mdi-file-check-outline float-right"></i>
                    </div>
                    <div class="text-white">
                        <h6 class="text-uppercase mb-3 font-size-16">Accepted Applications</h6>
                        <h2 class="mb-4">{{str_pad($dashboard['accepted'], 2, '0', STR_PAD_LEFT)}}</h2>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card mini-stat bg-primary">
                <div class="card-body mini-stat-img">
                    <div class="mini-stat-icon">
                        <i class="mdi mdi-file-remove-outline float-right"></i>
                    </div>
                    <div class="text-white">
                        <h6 class="text-uppercase mb-3 font-size-16">Rejected Applications</h6>
                        <h2 class="mb-4">{{str_pad($dashboard['rejected'], 2, '0', STR_PAD_LEFT)}}</h2>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
    <div class="row">
        <div class=" col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Recent Activity Feed</h4>
                    @if(!empty($dashboard['activities']['data']))
                    @if(!empty($dashboard['activities']))
                    <ol class="activity-feed mb-0">
                        @foreach($dashboard['activities']['data'] as $key => $notification)
                        <li class="feed-item" style="padding-bottom: 15px !important;">
                            <div class="feed-item-list" style="padding: 12px 20px 8px 20px !important;">
                                <span class="date">{{$notification['date']}}</span>
                                <span class="activity-text">
                                    <strong>{{$notification['heading']}}</strong><br>
                                    {{$notification['detail']}}
                                </span>
                            </div>
                        </li>
                        @endforeach
                    </ol>

                    @if(count($dashboard['activities']['data']) == 7)
                    <a href="{{route('admin.activity_feeds')}}" class="btn btn-primary d-block w-100">View All</a>
                    @endif
                    @endif
                    @endif
                </div>
            </div>

        </div>
    </div>

</div>


@endsection
