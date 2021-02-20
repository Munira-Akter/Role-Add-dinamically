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
                        <a id="add_user_btn" class="btn btn-primary mb-3" href="#">Add new user</a>

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">All users</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Role</th>
                                            <th>Email</th>
                                            <th>Cell</th>
                                            <th>Username</th>
                                            <th>Gender</th>
                                            <th>Education</th>
                                            <th>Photo</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody id="allUserTable">






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






    <div id="add_user_modal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Add new role</h4>
                </div>
                <div class="modal-body">
                    <form id="add_user_form" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Full Name</label>
                            <input name="fname" class="form-control" type="text">
                        </div>

                        <div class="form-group">
                            <label for="">Select Role</label>

                            <select class="form-control" name="role_id" id="">
                                <option value="">-select-</option>

                                @foreach( $roles as $role )
                                <option value="{{ $role -> id }}">{{ $role -> name }}</option>
                                @endforeach



                            </select>

                        </div>

                        <div class="form-group">
                            <label for="">Email</label>
                            <input name="email" class="form-control" type="text">
                        </div>

                        <div class="form-group">
                            <label for="">Cell</label>
                            <input name="cell" class="form-control" type="text">
                        </div>

                        <div class="form-group">
                            <label for="">Username</label>
                            <input name="uname" class="form-control" type="text">
                        </div>


                        <div class="form-group">
                            <label for="" class="d-block">Gender</label>
                            <input name="gender" class="" value="Male" type="radio" id="Male"> <label for="Male">Male</label>
                            <input name="gender" class="" value="Female" type="radio" id="Female"> <label for="Female">Female</label>
                        </div>

                        <div class="form-group">
                            <label for="">Education</label>

                            <select class="form-control" name="edu" id="">
                                <option value="">-select-</option>
                                <option value="JSC">JSC</option>
                                <option value="SSC">SSC</option>
                                <option value="HSC">HSC</option>
                                <option value="SSC">SSC</option>
                                <option value="Auto">Auto</option>
                            </select>

                        </div>

                        <div class="form-group">
                            <input class="btn btn-primary btn-block" type="submit" value="add">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>










    <div id="edit_user_modal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Add new User</h4>
                </div>
                <div class="modal-body">
                    <form id="add_user_form" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Full Name</label>
                            <input name="fname" class="form-control" type="text">
                        </div>

                        <div class="form-group">
                            <label for="">Select Role</label>

                            <select class="form-control" name="role_id" id="">
                                <option value="">-select-</option>

                                @foreach( $roles as $role )
                                    <option value="{{ $role -> id }}">{{ $role -> name }}</option>
                                @endforeach



                            </select>

                        </div>

                        <div class="form-group">
                            <label for="">Email</label>
                            <input name="email" class="form-control" type="text">
                        </div>

                        <div class="form-group">
                            <label for="">Cell</label>
                            <input name="cell" class="form-control" type="text">
                        </div>

                        <div class="form-group">
                            <label for="">Username</label>
                            <input name="uname" class="form-control" type="text">
                        </div>


                        <div class="form-group user-gender">

                        </div>

                        <div class="form-group">
                            <label for="">Education</label>

                            <select class="form-control" name="edu" id="edu-user">

                            </select>

                        </div>

                        <div class="form-group">
                            <input class="btn btn-primary btn-block" type="submit" value="add">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>



@endsection

