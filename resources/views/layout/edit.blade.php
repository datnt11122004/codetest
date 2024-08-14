<form action="{{route('musicians.update', $data->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
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
        <input type="text" class="form-control" id="name" name="name" value="{{$data->name}}">
    </div>
    <div class="mb-3">
        <label for="profile_picture" class="form-label">Picture</label>
        <input type="file" class="form-control" id="profile_picture" name="profile_picture" >
        <img src="{{env('APP_URL').'storage/app/public/'.$data->profile_picture}}">
    </div>
    <div class="mb-3">
        <label for="birth_date" class="form-label">Birthday</label>
        <input type="date" class="form-control" id="birth_date" name="birth_date" value="{{$data->birth_date}}">
    </div>
    <div class="mb-3">
        <label for="instrument" class="form-label">Instrument</label>
        <input type="text" class="form-control" id="instrument" name="instrument" value="{{$data->instrument}}">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
