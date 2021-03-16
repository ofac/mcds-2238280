@extends('layouts.app')

@section('title', 'Add User')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header text-uppercase text-center">
                    <h5>
                        <i class="fa fa-user-plus"></i> 
                        Add User
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
                    <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                                <input id="fullname" type="text" class="form-control @error('fullname') is-invalid @enderror" name="fullname" value="{{ old('fullname') }}" placeholder="@lang('general.label-fullname')" autofocus>

                                @error('fullname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="@lang('general.label-email')">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                                <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="@lang('general.label-phone')">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                                <input id="birthdate" type="date" class="form-control @error('birthdate') is-invalid @enderror" name="birthdate" value="{{ old('birthdate') }}" placeholder="@lang('general.label-birthdate')">

                                @error('birthdate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                                <select name="gender" id="gender" class="form-control @error('gender') is-invalid @enderror">
                                    <option value="">Select Gender...</option>
                                    <option value="Female" @if(old('gender') == 'Female') selected @endif>@lang('general.select-female')</option>
                                    <option value="Male" @if(old('gender') == 'Male') selected @endif>@lang('general.select-male')</option>
                                </select>

                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" placeholder="@lang('general.label-address')">

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                                <div class="text-center my-3">
                                    <img src="{{ asset('imgs/no-photo.png') }}" width="120px" id="preview" class="img-thumbnail rounded-circle">
                                </div>
                                <button type="button" class="btn btn-block btn-secondary btn-upload"> 
                                    <i class="fas fa-upload"></i>
                                    Upload Photo 
                                </button>
                                <input id="photo" type="file" class="form-control d-none @error('photo') is-invalid @enderror" name="photo" accept="image/*">
                                @error('photo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                                <select name="role" id="role" class="form-control @error('role') is-invalid @enderror">
                                    <option value="">Select Role...</option>
                                    <option value="Admin" @if(old('role') == 'Admin') selected @endif>Admin</option>
                                    <option value="Editor" @if(old('role') == 'Editor') selected @endif>Editor</option>
                                </select>

                                @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="@lang('general.label-password')">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="@lang('general.label-confirm')">
                        </div>

                        <div class="form-group">
                                <button type="submit" class="btn btn-success btn-block text-uppercase">
                                    <i class="fas fa-save"></i> 
                                    Add
                                </button>
                                <a href="{{ route('users.index') }}" class="btn btn-block btn-secondary text-uppercase">
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