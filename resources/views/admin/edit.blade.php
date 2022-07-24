@extends('share.layout-admin')


@section('content')

<h1>Create</h1>

<form method="post" action="{{ $action }}" enctype="multipart/form-data">
    @method('PUT')
	@csrf

	@foreach ($columns as $column)
      	@if ($column != 'id' && $column != 'created_at' && $column != 'updated_at')
            @if ($column == 'image')
                image: <input type="file" name="image">
            @else
      		    {{ $column }}: <input type="text" name="{{ $column }}" value="{{ $item[$column] }}">
            @endif
            <br/>
      	@endif
    @endforeach

	<button type="submit">Edit</button>
</form>

 
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@endsection