<form action="{{route('musicians.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('POST')
    @if($errors->any())
{{--        @dd($errors)--}}
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name">
    </div>
    <div class="mb-3">
        <label for="profile_picture" class="form-label">Picture</label>
        <input type="file" class="form-control" id="profile_picture" name="profile_picture">
    </div>
    <div class="mb-3">
        <label for="birth_date" class="form-label">Birthday</label>
        <input type="date" class="form-control" id="birth_date" name="birth_date">
    </div>
    <div class="mb-3">
        <label for="instrument" class="form-label">Instrument</label>
        <input type="text" class="form-control" id="instrument" name="instrument">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
