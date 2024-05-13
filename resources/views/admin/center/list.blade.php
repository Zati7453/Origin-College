@extends('admin.layouts.main')
@section('Content')
@section('Title','Learning Centre List | Brittany Universite')
@section('Styles')
<style>

</style>
@endsection
<div class="container-fluid">

    <div class="row">
        <div class="col-sm-6">
            <div class="page-title-box">
                <h4>Learning Centre List</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="mb-4" style="justify-content: space-between; display:flex;align-items:center">
                        <h4 class="card-title">Learning Centre List</h4>
                        <button type="button"
                            class="btn btn-dark waves-effect waves-light text-white add_department">Create
                            Learning Centre</button>
                    </div>
                    <div class="table-responsive mb-0">
                        <table id="investment" class="table table-bordered dt-responsive nowrap "
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>Learning Centre Name</th>
                                    <th>Learning Centre Email</th>
                                    <th>Learning Centre Contact</th>
                                    <th>Action</th>
                                    <th>Created At</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($centers as $list)
                                <tr class="text-center">
                                    <td>{{$list->sr}}</td>
                                    <td>{{$list->name}}</td>
                                    <td>{{$list->email}}</td>
                                    <td>{{$list->contact}}</td>
                                    <td><button class="btn btn-primary view_department"
                                            data-id="{{$list->id}}">View</button></td>
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


    {{-- add department --}}
    <div class="modal fade bs-example-modal-center " id="department_modal" tabindex="-1" role="dialog"
        aria-labelledby="mySmallModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0">Create Learning Centre</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form action="{{route('admin.store_center')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="">Learning Centre Name</label>
                                <input type="text" class="form-control " name="name" required>
                            </div>
                            <div class="col-lg-12 mt-3">
                                <label for="">Learning Centre Email</label>
                                <input type="text" class="form-control " name="email" required>
                            </div>
                            <div class="col-lg-12 mt-3">
                                <label for="">Learning Centre Contact</label>
                                <input type="text" class="form-control " name="contact" required>
                            </div>

                            <div class="col-lg-12 mt-3">
                                <button class="btn btn-dark">Create Learning Centre</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    {{-- update department --}}
    <div class="modal fade bs-example-modal-center " id="update_department_modal" tabindex="-1" role="dialog"
        aria-labelledby="mySmallModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0">Update Learning Centre</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form action="{{route('admin.update_center')}}" method="post">
                        @csrf
                        <div class="row">
                            <input type="hidden" name="center_id" class="center_id" value="">
                            <div class="col-lg-12">
                                <label for="">Learning Centre Name</label>
                                <input type="text" class="form-control center_name" name="name" required>
                            </div>
                            <div class="col-lg-12 mt-3">
                                <label for="">Learning Centre Email</label>
                                <input type="text" class="form-control center_email" name="email" required>
                            </div>
                            <div class="col-lg-12 mt-3">
                                <label for="">Learning Centre Contact</label>
                                <input type="text" class="form-control center_contact" name="contact" required>
                            </div>

                            <div class="col-lg-12 mt-3">
                                <button class="btn btn-dark">Update Learning Centre</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>
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

        $('.add_department').on('click', function () {
            $('#department_modal').modal();
        });

        //update department

        $('.view_department').on('click', function () {
            var center_id = $(this).data('id');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: '{{route('admin.get_center_by_id')}}',
                type: 'post',
                data: {
                    'id': center_id
                },
                success: function (response) {
                    $('.center_id').val(response.id);
                    $('.center_name').val(response.name);
                    $('.center_email').val(response.email);
                    $('.center_contact').val(response.contact);
                    
                    $('#update_department_modal').modal();
                }
            });

        });

    });

</script>
@endsection
