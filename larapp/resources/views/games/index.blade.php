@extends('layouts.app')

@section('title', 'Module Games')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <h1> <i class="fas fa-gamepad"></i> Module Games</h1>
                <hr>
                <a href="{{ route('games.create') }}" class="btn btn-success"> 
                    <i class="fas fa-plus"></i> Add Games 
                </a>
                <input type="hidden" id="tmodel" value="games">
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
                            <th>Category</th>
                            <th>Important</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="content">
                        @foreach ($games as $game)
                            <tr>
                                <td>{{ $game->name }}</td>
                                <td><img src="{{ asset($game->category->image) }}" width="36px" class="img-thumbnail rounded-circle"></td>
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

                                <td>
                                    <a href="{{ url('games/'.$game->id) }}" class="btn btn-sm btn-larapp">
                                        <i class="fas fa-search"></i>
                                    </a>
                                    <a href="{{ url('games/'.$game->id.'/edit') }}" class="btn btn-sm btn-larapp">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    <form action="{{ url('games/'.$game->id) }}" class="d-inline" method="POST">
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
                {{ $games->links() }}
            </div>
        </div>
    </div>
@endsection