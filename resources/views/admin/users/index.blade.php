@extends('layouts.admin')

@section('content')
    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                <li class="breadcrumb-item active">Users</li>
            </ol>
        </nav>
        <h1>Users</h1>
    </div>


    <div class="card">
        <div class="card-body">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation"> <button class="nav-link active" id="home-tab"
                        data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home"
                        aria-selected="true">Customers</button></li>
                <li class="nav-item" role="presentation"> <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                        data-bs-target="#profile" type="button" role="tab" aria-controls="profile"
                        aria-selected="false">Authorized</button></li>
            </ul>
            <div class="tab-content pt-2" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($registereds as $registered)
                                <tr>
                                    <th scope="row">1</th>
                                    <td>{{ $registered->name }}</td>
                                    <td>{{ $registered->email }}</td>
                                    <td><button class="btn btn-success btn-sm">Status</button></td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>

                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($authorizeds as $authorized)
                                <tr>
                                    <th scope="row">1</th>
                                    <td>{{ $authorized->name }}</td>
                                    <td>{{ $authorized->email }}</td>
                                    <td><button class="btn btn-success btn-sm">Status</button></td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
