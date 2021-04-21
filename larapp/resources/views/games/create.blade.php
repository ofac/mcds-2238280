@extends('layouts.app')

@section('title', 'Add Game')

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
                    <a href="{{ url('games') }}"><i class="fas fa-gamepad"></i> Module Games</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-plus"></i> Add Game</li>
            </ol>
            </nav>
            <div class="card">
                <div class="card-header text-uppercase text-center">
                    <h5>
                        <i class="fa fa-plus"></i> 
                        Add Game
                    </h5>
                </div>

                {{-- <div class="row mt-4">
                    <div class="col-md-8 offset-md-2">
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                              @foreach ($errors->all() as $message)
                                    <li>{{ $message }}</li>
                            @endforeach
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                        @endif
                    </div>
                </div> --}}
            
                <div class="card-body">
                    <form method="POST" action="{{ route('games.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                                <div class="text-center my-3">
                                    <img src="{{ asset('imgs/no-game.png') }}" width="120px" id="preview" class="img-thumbnail">
                                </div>
                                <button type="button" class="btn btn-block btn-secondary btn-upload"> 
                                    <i class="fas fa-upload"></i>
                                    Upload Game Image 
                                </button>
                                <input id="photo" type="file" class="form-control d-none @error('image') is-invalid @enderror" name="image" accept="image/*">
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                                <textarea name="description" id="description" cols="30" rows="4" class="form-control @error('description') is-invalid @enderror" placeholder="Description">{{ old('description') }}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                                <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
                                    <option value="">Select Category...</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" @if(old('category_id') == $category->id) selected @endif>{{ $category->name }}</option>
                                    @endforeach
                                </select>

                                @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                                <select name="slider" id="slider" class="form-control @error('slider') is-invalid @enderror">
                                    <option value="">Select Important Game...</option>
                                    <option value="1" @if(old('slider') == 1) selected @endif>No</option>
                                    <option value="2" @if(old('slider') == 2) selected @endif>Yes</option>
                                </select>

                                @error('slider')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                                <input id="price" type="number" min="1" max="99" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" placeholder="Price" autofocus>

                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                                <button type="submit" class="btn btn-success btn-block text-uppercase">
                                    <i class="fas fa-save"></i> 
                                    Add
                                </button>
                                <a href="{{ route('games.index') }}" class="btn btn-block btn-secondary text-uppercase">
                                    <i class="fas fa-arrow-left"></i> 
                                    Cancel
                                </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection