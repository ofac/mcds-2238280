@extends('layouts.app')

@section('title', 'Show Category')

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
                    <a href="{{ url('categories') }}"><i class="fas fa-list-alt"></i> Module Categories</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-search"></i> Show Category</li>
            </ol>
            </nav>
            <div class="card">
                <div class="card-header text-uppercase text-center">
                    <h5>
                        <i class="fa fa-search"></i> 
                        Show Category
                    </h5>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-striped">
                        <tr>
                            <td colspan="2" class="text-center">
                                <img src="{{ asset($category->image) }}" width="180px" class="img-thumbnail rounded-circle">
                            </td>
                        </tr>
                        <tr>
                            <th>Name:</th>
                            <td>{{ $category->name }}</td>
                        </tr>
                        <tr>
                            <th>Description:</th>
                            <td>{{ $category->description }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection