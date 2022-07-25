@extends('share.layout-admin')


@section('content')

<a href="{{ $url_create }}">Create</a>

<!-- <button class="delete">Reload</button> -->
<form method="post" action="{{ route('products.delete') }}" class="form-delete">
  @csrf
  <input type="hidden" name="id">
  <button type="button" class="delete">Delete</button>
</form>

<table class="table">
  <thead>
    <tr>
      <th scope="col"></th>
    	<th scope="col">id</th>
      @foreach ($columns as $column)
      	@if ($column != 'id' && 
             $column != 'created_at' && 
             $column != 'updated_at' &&
             !in_array($column, $hidden ?? []))
      		<th scope="col">{{ $column }}</th>
      	@endif
      @endforeach
      <th scope="col">created_at</th>
      <th scope="col">updated_at</th>
    </tr>
  </thead>
  <tbody>
  	@foreach ($items as $item)
	    <tr>
        <td>
          <input type="checkbox" data="{{ $item->id }}" />
        </td>
	      <th scope="row">{{ $item->id }}</th>
	      @foreach ($columns as $column)
      		@if ($column != 'id' && 
                 $column != 'created_at' && 
                 $column != 'updated_at' &&
                 !in_array($column, $hidden ?? []))
      			<td>{{ $item[$column] }}</td>
      		@endif
      	@endforeach
        <td>{{ $item->created_at }}</td>
        <td>{{ $item->updated_at }}</td>
        <td>
          <a href="{{ route('products.edit', ['product' => $item->id]) }}">Edit</a>
        </td>
	    </tr>
	 @endforeach
  </tbody>
</table>

<script>
  var button = document.querySelector('.delete')
  var form = document.querySelector('.form-delete')

  button.onclick = function (e) {
    // e.preventDefault()

    var items = document.querySelectorAll('input[type=checkbox]:checked')
    var input = document.querySelector('input[name=id]')

    var value = ''

    items.forEach((e) => {    
        value += e.getAttribute('data') + '&'            
      })

    input.value = value.slice(0, -1)

    form.submit()
    // console.log(input)
    // this.style.display = 'none'
  }

</script>

@endsection