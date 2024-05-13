@extends('admin.layouts.main')
@section('Content')
@section('Title','Activity Feeds List | ORIGIN INTERNATIONAL COLLEGE')
@section('Styles')
<style>

</style>
@endsection
<div class="container-fluid">

    <div class="row">
        <div class="col-sm-6">
            <div class="page-title-box">
                <h4>Activity Feeds List</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="mb-4">
                        <h4 class="card-title">Activity Feeds List</h4>
                        
                    </div>
                    <div class="table-responsive mb-0">
                        <table id="investment" class="table table-bordered dt-responsive nowrap "
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr class="text-center">
                                    <th><u>#</u></th>
                                    <th><u>Heading</u></th>
                                    <th><u>Details</u></th>
                                    <th><u>Activity Date</u></th>
                                </tr>
                            </thead>

                            <tbody>
                                
                                @foreach($feeds['data'] as $key => $feed)
                                <tr>
                                    <td>{{$key +1}}</td>
                                    <td>{{$feed['heading']}}</td>
                                    <td>{{$feed['detail']}}</td>
                                    <td>{{$feed['date']}}</td>
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
                [0, "asc"]
            ]
        });
     $('#investment').dataTable()

    });

</script>
@endsection
