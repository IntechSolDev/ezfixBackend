@extends('admin.layouts.layouts')
@section('title')
All Users
@endsection
@section('content')
<!-- Main Content -->

<section class="content">
    <div class="">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Users</h2>
                    <!-- <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Aero</a></li>
                        <li class="breadcrumb-item active">HOm</li>
                    </ul> -->
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i
                            class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th>Date of Birth</th>
                                            <th>Occupation</th>
                                            <th>Lastseen</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $user)
                                        <tr>
                                            <td>
                                                @if($user->image == null)
                                                    <img src="{{asset('public/images/logo.png')}}" alt="" width="50" height="auto">
                                                @else
                                                    <img src="{{$user->image}}" alt="" width="70" height="auto">
                                                @endif
                                            </td>
                                            <td>{{$user->firstname}} {{$user->lastname}}</td>
                                            <td><a href="mailto:{{$user->email}}" style="color:black;"><strong>{{$user->email}}</strong></a></td>
                                            <td>{{$user->dob}}</td>
                                            <td>{{$user->occupation}}</td>
                                            <td>{{ Carbon\Carbon::parse($user->last_seen)->diffForHumans() }}</td>
                                            <td>
                                                @if(Cache::has('user-is-online' . $user->id))
                                                    <span class="badge badge-success">Online</span>
                                                @else
                                                    <span class="badge badge-danger">Offline</span>
                                                @endif
                                            </td>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection