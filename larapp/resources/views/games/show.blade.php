@extends('layouts.app')

@section('title', 'Show Game')

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
                    <a href="{{ url('games') }}"><i class="fas fa-list-alt"></i> Module Games</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-search"></i> Show Game</li>
            </ol>
            </nav>
            <div class="card">
                <div class="card-header text-uppercase text-center">
                    <h5>
                        <i class="fa fa-search"></i> 
                        Show Game
                    </h5>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-striped">
                        <tr>
                            <td colspan="2" class="text-center">
                                <img src="{{ asset($game->image) }}" width="240px" class="img-thumbnail">
                            </td>
                        </tr>
                        <tr>
                            <th>Name:</th>
                            <td>{{ $game->name }}</td>
                        </tr>
                        <tr>
                            <th>Description:</th>
                            <td>{{ $game->description }}</td>
                        </tr>
                        <tr>
                            <th>User:</th>
                            <td>
                                <img src="{{ asset($game->user->photo) }}" width="40px" class="img-thumbnail rounded-circle d-inline-flex"> 
                                <p class="d-inline-flex">{{ $game->user->fullname }}</p>
                            </td>
                        </tr>
                        <tr>
                            <th>Category:</th>
                            <td>
                                <img src="{{ asset($game->category->image) }}" width="40px" class="img-thumbnail rounded-circle d-inline-flex"> 
                                <p class="d-inline-flex">{{ $game->category->name }}</p>
                            </td>
                        </tr>
                        <tr>
                            <th>Important:</th>
                            <td>
                                @if($game->slider == 1 || $game->slider == 0)
                                    <button class="btn btn-sm btn-dark">
                                        <i class="fas fa-eye-slash"></i>
                                    </button>
                                @else
                                        <button class="btn  btn-sm btn-success">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Price:</th>
                            <td>
                                <i class="fas fa-dollar-sign"></i>
                                {{ $game->price }}
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection