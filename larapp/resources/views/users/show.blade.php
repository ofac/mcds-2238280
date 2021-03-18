@extends('layouts.app')

@section('title', 'Show User')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url('home') }}"><i class="fas fa-clipboard-list"></i> Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ url('users') }}"><i class="fas fa-users"></i> Module Users</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-user-tag"></i> Show User</li>
            </ol>
            </nav>
            <div class="card">
                <div class="card-header text-uppercase text-center">
                    <h5>
                        <i class="fa fa-user-tag"></i> 
                        Show User
                    </h5>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-striped">
                        <tr>
                            <td colspan="2" class="text-center">
                                <img src="{{ asset($user->photo) }}" width="180px" class="img-thumbnail rounded-circle">
                            </td>
                        </tr>
                        <tr>
                            <th>Full Name:</th>
                            <td>{{ $user->fullname }}</td>
                        </tr>
                        <tr>
                            <th>Email:</th>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th>Phone Number:</th>
                            <td>{{ $user->phone }}</td>
                        </tr>
                        <tr>
                            <th>Birthdate:</th>
                            <td>{{ $user->birthdate }}</td>
                        </tr>
                        <tr>
                            <th>Age:</th>
                            @php use Carbon\Carbon; @endphp
                            <td>{{ Carbon::createFromDate($user->birthdate)->diff()->format('%y years old') }}</td>
                        </tr>
                        <tr>
                            <th>Gender:</th>
                            <td>
                                @if ($user->gender == 'Female')
                                    <i class="fas fa-venus"></i> 
                                @else
                                    <i class="fas fa-mars"></i>
                                @endif
                                    {{ $user->gender }}
                            </td>
                        </tr>
                        <tr>
                            <th>Address:</th>
                            <td>{{ $user->address }}</td>
                        </tr>
                        <tr>
                            <th>Role:</th>
                            <td>
                                @if ($user->role == 'Admin')
                                    <i class="fas fa-user-cog"></i> 
                                @else
                                    <i class="fas fa-user-edit"></i>
                                @endif
                                    {{ $user->role }}
                            </td>
                        </tr>
                        <tr>
                            <th>Status:</th>
                            <td>
                                @if ($user->active == 1)
                                    <button class="btn btn-success"> Active </button>
                                @else
                                    <button class="btn btn-danger"> Inactive </button>
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection