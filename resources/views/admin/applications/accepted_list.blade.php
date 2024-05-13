@extends('admin.layouts.main')
@section('Content')
@section('Title','Accepted Applications List | ORIGIN INTERNATIONAL COLLEGE')
@section('Styles')
<style>
    .user_label{
        background-color: #7A6FBE;
        color: #fff;
        font-size: 11px;
        padding: 3px 8px;
        border-radius: 3px;
        display: block;
        text-align: center;
    }
</style>
@endsection
<div class="container-fluid">

    <div class="row">
        <div class="col-sm-6">
            <div class="page-title-box">
                <h4>Accepted Applications List</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="mb-4">
                        <h4 class="card-title">Accepted Applications List</h4>
                       
                    </div>
                    <div class="table-responsive mb-0">
                        <table id="investment" class="table table-bordered dt-responsive nowrap "
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>Surname</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Nationality Country</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($applications as $list)
                                <tr class="text-center">
                                    <td>{{$list->sr}}</td>
                                    <td><span class="user_label">{{$list->surname}}</span></td>
                                    <td><span class="user_label">{{$list->name}}</span></td>
                                    <td><span class="user_label">{{$list->email}}</span></td>
                                    <td style="font-weight: 600">{{$list->nationality}}</td>
                                    <td><a href="{{route('admin.view_application',$list->id)}}"><button class="btn btn-primary"
                                        >View</button></a></td>
                                   
                                    <td>{{$list->created_at}}</td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->

@endsection
@section('Scripts')
<script>
    $(document).ready(function () {
        $('#investment').dataTable({
            order: [
                [0, "desc"]
            ]
        });
        $('#investment').dataTable()

        //add department

       

    });

</script>
@endsection
