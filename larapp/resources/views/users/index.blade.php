@extends('layouts.app')

@section('title', 'Module Users')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <h1> <i class="fas fa-users"></i> Module Users</h1>
                <hr>
                <a href="{{ route('users.create') }}" class="btn btn-success"> 
                    <i class="fas fa-plus"></i> Add Users 
                </a>
                <a href="{{ url('export/users/pdf') }}" class="btn btn-larapp"> 
                    <i class="fas fa-file-pdf"></i> Export PDF 
                </a>
                <a href="{{ url('export/users/excel') }}" class="btn btn-larapp"> 
                    <i class="fas fa-file-excel"></i> Export Excel 
                </a>
                <form action="{{ url('import/users/excel') }}" class="d-inline" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="file" id="file" class="d-none" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
                    <button type="button" class="btn btn-larapp btn-file">
                        <i class="fas fa-file-upload"></i>  Import Excel
                    </button>
                </form>
                <input type="hidden" id="tmodel" value="users">
                <input type="text" id="qsearch" name="qsearch" class="form-search" autocomplete="off" placeholder="Search">
                <br>
                <div class="loader d-none text-center mt-5">
                    <img src="{{ asset('imgs/rings.svg') }}" width="120px" alt="">
                </div>
                
                <br><br>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Fullname</th>
                            <th class="d-none d-md-table-cell">Email</th>
                            <th>Photo</th>
                            <th class="d-none d-md-table-cell">Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="content">
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->fullname }}</td>
                                <td class="d-none d-md-table-cell">{{ $user->email }}</td>
                                <td><img src="{{ asset($user->photo) }}" width="36px" class="img-thumbnail rounded-circle"></td>
                                <td class="d-none d-md-table-cell">{{ $user->role }}</td>
                                <td>
                                    <a href="{{ url('users/'.$user->id) }}" class="btn btn-sm btn-larapp">
                                        <i class="fas fa-search"></i>
                                    </a>
                                    <a href="{{ url('users/'.$user->id.'/edit') }}" class="btn btn-sm btn-larapp">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    <form action="{{ url('users/'.$user->id) }}" class="d-inline" method="POST">
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
                {{ $users->links() }}
            </div>
        </div>
    </div>
@endsection