@extends('share.layout-admin')


@section('content')

<h1>Create</h1>

<form action="{{ $action }}" enctype="multipart/form-data" method="post">
	@csrf

	@foreach ($columns as $column)
      	@if ($column != 'id' && $column != 'created_at' && $column != 'updated_at')
      	 	@if ($column == 'image')
      	 		image: <input type="file" name="image" />
      	 	@else
	      		{{ $column }}: <input type="text" name="{{ $column }}" />
      		@endif
	      	<br/>
      	@endif
    @endforeach

	<button type="submit">Create</button>
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