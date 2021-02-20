@extends('layouts.app')

@section('main-part')



    <!-- Main Wrapper -->
    <div class="main-wrapper">

    @include('layouts.header')

    @include('layouts.menu')

    <!-- Page Wrapper -->
        <div class="page-wrapper">

            <div class="content container-fluid">

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">Welcome {{ Auth::user() -> name }}!</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->








                <div class="row">

                    <div class="col-lg-12">
                        @include('validate')
                        <a id="add_btn_role" class="btn btn-primary mb-3" href="#">Add new Role</a>

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">All Roles</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Slug</th>
                                            <th>Permission</th>
                                            <th>Time</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody id="roles_body">



                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>





                </div>






            </div>
        </div>
        <!-- /Page Wrapper -->

    </div>
    <!-- /Main Wrapper -->



    <div id="add_modal_role" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Add new role</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('role.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Role Name</label>
                            <input name="name" class="form-control" type="text">
                        </div>

                        <div class="form-group">
                            <label for="">Set Permission</label>
                            <hr>
                            <input name="per[]" value="Teacher" type="checkbox" id="Teacher"> <label for="Teacher">Teacher</label> <br>
                            <input name="per[]" value="Student" type="checkbox" id="Student"> <label for="Student">Student</label> <br>
                            <input name="per[]" value="Slider" type="checkbox" id="Slider"> <label for="Slider">Slider</label> <br>
                            <input name="per[]" value="Users" type="checkbox" id="Users"> <label for="Users">Users</label><br>
                            <input name="per[]" value="Accounts" type="checkbox" id="Accounts"> <label for="Accounts">Accounts</label><br>
                            <input name="per[]" value="Settings" type="checkbox" id="Settings"> <label for="Settings">Settings</label> <br>
                        </div>

                        <div class="form-group">
                            <input class="btn btn-primary btn-block" type="submit" value="add">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>












    <div id="edit_modal_role" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Add new role</h4>
                </div>
                <div class="modal-body">

                    <form  id="role_update_form"  method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">Role Name</label>
                            <input name="name" class="form-control" type="text">
                            <input name="update_id" value="" type="hidden">
                        </div>

                        <div class="form-group">
                            <label for="">Set Permission</label>
                            <hr>
                           <div class="role-box">

                           </div>
                        </div>

                        <div class="form-group">
                            <input class="btn btn-primary btn-block" type="submit" value="Update">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection

