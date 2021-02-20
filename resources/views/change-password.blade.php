@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">


                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Cell</th>
                                <th>Username</th>
                                <th>Photo</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $loop -> index + 1 }}</td>
                            <td>{{ $user -> name}}</td>
                            <td>{{ $user -> email}}</td>
                            <td>{{ $user -> cell}}</td>
                            <td>{{ $user -> uname}}</td>
                            <td><img style="width: 70px; height:70px;" src="{{ URL::to('')  }}/media/users/{{ $user -> photo }}" alt=""></td>
                            <td><a href="#">Show</a></td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
