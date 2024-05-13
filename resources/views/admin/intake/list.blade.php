@extends('admin.layouts.main')
@section('Content')
@section('Title','Intake List | Brittany Universite')
@section('Styles')
<style>

</style>
@endsection
<div class="container-fluid">

    <div class="row">
        <div class="col-sm-6">
            <div class="page-title-box">
                <h4>Intake List</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="mb-4" style="justify-content: space-between; display:flex;align-items:center">
                        <h4 class="card-title">Intake List</h4>
                        <button type="button"
                            class="btn btn-dark waves-effect waves-light text-white add_department">Create
                            Intake</button>
                    </div>
                    <div class="table-responsive mb-0">
                        <table id="investment" class="table table-bordered dt-responsive nowrap "
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>Department Name</th>
                                    <th>Programme Name</th>
                                    <th>Intake</th>
                                    <th>Action</th>
                                    <th>Created At</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($intakes as $list)
                                <tr class="text-center">
                                    <td>{{$list->sr}}</td>
                                    <td>{{$list->department}}</td>
                                    <td>{{$list->programme}}</td>
                                    <td>{{$list->intake}}</td>
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
                    <h5 class="modal-title mt-0">Create Intake</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form action="{{route('admin.store_intake')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="">Department</label>
                                <select name="department" class="form-control department" required>
                                    <option value="">Select</option>
                                    @foreach ($departments as $dep)
                                    <option value="{{$dep->id}}">{{$dep->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-12 mt-3">
                                <label for="">Programme</label>
                                <select name="programme" class="form-control programme_list" required>
                                
                                </select>
                            </div>
                            <div class="col-lg-12 mt-3">
                                <label for="">Intake</label>
                                <input type="text" class="form-control" name="intake" required>
                            </div>

                            <div class="col-lg-12 mt-3">
                                <button class="btn btn-dark">Create Intake</button>
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
                    <h5 class="modal-title mt-0">Update Intake</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form action="{{route('admin.update_intake')}}" method="post">
                        @csrf
                        <div class="row">
                            <input type="hidden" name="intake_id" class="intake_id" value="">
                            <div class="col-lg-12">
                                <label for="">Department</label>
                                <select name="department" class="form-control department dep_list"  required>
                                    {{-- <option value="">Select</option>
                                    @foreach ($departments as $dep)
                                    
                                    <option value="{{$dep->id}}">{{$dep->name}}</option>
                                    @endforeach --}}
                                </select>
                            </div>
                            <div class="col-lg-12 mt-3">
                                <label for="">Programme</label>
                                <select name="programme" class="form-control programme_list" required>
                                    {{-- <option value="">Select</option>
                                    @foreach ($programmes as $pro)
                                    <option value="{{$pro->id}}">{{$pro->pro_name}}</option>
                                    @endforeach --}}
                                </select>
                            </div>
                            <div class="col-lg-12 mt-3">
                                <label for="">Intake</label>
                                <input type="text" class="form-control intake" name="intake" required>
                            </div>

                            <div class="col-lg-12 mt-3">
                                <button class="btn btn-dark">Update Intake</button>
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

        //dependent programmes base on department
        $('.department').on('change', function () {
            
            var department_id = $(this).val();
            $('.programme_list').empty();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{route('admin.get_programme_by_department')}}',
                type: 'post',
                data: {
                    'depid': department_id
                },
                success: function (response) {
                    $('.programme_list').append('<option value="">Select</option>');
                    $.each(response, function(i, v) {
                       
                        $('.programme_list').append('<option value="'+v.id+'">'+v.name+'</option>');
                    });
                }
            });

        });
        //update department

        $('.view_department').on('click', function () {
          
            var intake_id = $(this).data('id');
            $('.dep_list').empty();
            $('.programme_list').empty();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: '{{route('admin.get_intake_by_id')}}',
                type: 'post',
                data: {
                    'id': intake_id
                },
                success: function (response) {
                    $('.intake').val(response.intake);
                    $('.intake_id').val(response.id);
                    $.each(response.department, function(i, v) {
                        if(response.dep_id == v.id){
                            $('.dep_list').append('<option value="'+v.id+'" selected>'+v.name+'</option>');
                        } else{

                            $('.dep_list').append('<option value="'+v.id+'">'+v.name+'</option>');
                        }
                    });
                    $.each(response.programme, function(i, v) {
                        if(response.pro_id == v.id){
                            $('.programme_list').append('<option value="'+v.id+'" selected>'+v.name+'</option>');
                        } else{

                            $('.programme_list').append('<option value="'+v.id+'">'+v.name+'</option>');
                        }
                    });
                    $('#update_department_modal').modal();
                }
            });

        });

    });

</script>
@endsection
