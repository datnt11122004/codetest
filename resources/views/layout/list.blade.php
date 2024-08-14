<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Picture</th>
            <th scope="col">Birthday</th>
            <th scope="col">Intrusment</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
        <tr>
            <th scope="row">{{ $item->id }}</th>
            <td>{{ $item->name }}</td>
            <td><img src="{{env('APP_URL').'storage/app/public/'.$item->profile_picture}}" alt="no image" width="100px" height="100px"></td>
            <td>{{ $item->birth_date }}</td>
            <td>{{ $item->instrument }}</td>
            <td>
                <a href="{{ route('musicians.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('musicians.destroy', $item->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Do you want to delete')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@dd(Storage::url($item->profile_picture))
