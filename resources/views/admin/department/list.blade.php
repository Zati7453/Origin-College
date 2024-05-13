@extends('admin.layouts.main')
@section('Content')
@section('Title','Department List | Brittany Universite')
@section('Styles')
<style>

</style>
@endsection
<div class="container-fluid">

    <div class="row">
        <div class="col-sm-6">
            <div class="page-title-box">
                <h4>Department List</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="mb-4" style="justify-content: space-between; display:flex;align-items:center">
                        <h4 class="card-title">Department List</h4>
                        <button type="button"
                            class="btn btn-dark waves-effect waves-light text-white add_department">Create
                            Department</button>
                    </div>
                    <div class="table-responsive mb-0">
                        <table id="investment" class="table table-bordered dt-responsive nowrap "
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>Department Name</th>
                                    <th>Action</th>
                                    <th>Created At</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($departments as $list)
                                <tr class="text-center">
                                    <td>{{$list->sr}}</td>
                                    <td>{{$list->name}}</td>
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
                    <h5 class="modal-title mt-0">Create Department</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form action="{{route('admin.store_department')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="">Department Name</label>
                                <input type="text" class="form-control rechargeamount" name="dep_name" required>
                            </div>

                            <div class="col-lg-12 mt-3">
                                <button class="btn btn-dark">Create Department</button>
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
                    <h5 class="modal-title mt-0">Update Department</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form action="{{route('admin.update_dpepartment')}}" method="post">
                        @csrf
                        <div class="row">
                            <input type="hidden" name="dep_id" class="dep_id" value="">
                            <div class="col-lg-12">
                                <label for="">Department Name</label>
                                <input type="text" class="form-control department_name" name="dep_name" required>
                            </div>

                            <div class="col-lg-12 mt-3">
                                <button class="btn btn-dark">Update Department</button>
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
            var department_id = $(this).data('id');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: '{{route('admin.get_dpepartment_by_id')}}',
                type: 'post',
                data: {
                    'id': department_id
                },
                success: function (response) {
                    $('.department_name').val(response.name);
                    $('.dep_id').val(response.id);
                    $('#update_department_modal').modal();
                }
            });

        });

    });

</script>
@endsection
