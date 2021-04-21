@forelse ($games as $game)
    <tr>
        <td>{{ $game->name }}</td>
        <td><img src="{{ asset($game->category->image) }}" width="36px" class="img-thumbnail rounded-circle"></td>
        <td>
            @if($game->slider == 1 || $game->slider == 0)
                <button class="btn btn-sm btn-danger">No</button>
            @else
                    <button class="btn  btn-sm btn-dark">Yes</button>
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
@empty
    <tr>
        <td colspan="3" class="text-center">
            No games found by Name and Description!
        </td>
    </tr>
@endforelse