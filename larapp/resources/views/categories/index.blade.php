@extends('layouts.app')

@section('title', 'Module Categories')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <h1> <i class="fas fa-list-alt"></i> Module Categories</h1>
                <hr>
                <a href="{{ route('categories.create') }}" class="btn btn-success"> 
                    <i class="fas fa-plus"></i> Add Categories 
                </a>
                <input type="hidden" id="tmodel" value="categories">
                <input type="text" id="qsearch" name="qsearch" class="form-search" autocomplete="off" placeholder="Search">
                <br>
                <div class="loader d-none text-center mt-5">
                    <img src="{{ asset('imgs/rings.svg') }}" width="120px" alt="">
                </div>
                
                <br><br>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="content">
                        @foreach ($catgs as $catg)
                            <tr>
                                <td>{{ $catg->name }}</td>
                                <td><img src="{{ asset($catg->image) }}" width="36px" class="img-thumbnail rounded-circle"></td>
                                <td>
                                    <a href="{{ url('categories/'.$catg->id) }}" class="btn btn-sm btn-larapp">
                                        <i class="fas fa-search"></i>
                                    </a>
                                    <a href="{{ url('categories/'.$catg->id.'/edit') }}" class="btn btn-sm btn-larapp">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    <form action="{{ url('categories/'.$catg->id) }}" class="d-inline" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="button" class="btn btn-sm btn-danger btn-delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $catgs->links() }}
            </div>
        </div>
    </div>
@endsection