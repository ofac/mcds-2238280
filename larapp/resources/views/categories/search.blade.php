@forelse ($catgs as $catg)
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
@empty
    <tr>
        <td colspan="3" class="text-center">
            No categories found by Name and Description!
        </td>
    </tr>
@endforelse