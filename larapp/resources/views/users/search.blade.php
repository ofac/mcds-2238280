@forelse ($users as $user)
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
@empty
    <tr>
        <td colspan="5" class="text-center">
            No users found by FullName and Email!
        </td>
    </tr>
@endforelse