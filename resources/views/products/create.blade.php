@extends('master')

@section('content')

<h1>Add new product</h1>

<form action="/products/store" method="post">

	{{-- Put this in each form you create --}}
	{!! csrf_field() !!}

	<div>
	{{-- name inputs the same as in the database --}}
		<label for="name">Name: </label>
		{{-- {{ old('name')}} - grabs the old value - holds users input, makes form 'sticky' --}}
		<input type="text" id="name" name="name" placeholder="Smart Watch" value="{{ old('name') }}">
		@if($errors->first('name'))
			<p>{{ $errors->first('name') }}</p>
		@endif
	</div>

	<div>
		<label for="description">Description: </label>
		<textarea name="description" id="description" cols="30" rows="10">{{ old('description') }}</textarea>
		@if($errors->first('description'))
			<p>{{ $errors->first('description') }}</p>
		@endif
	</div>

	<div>
		<label for="price">Price: $</label>
		{{-- step="" - can have numbers the increment in cents --}}
		<input type="number" name="price" id="price" value="{{ old('price') }}" step=".01">
		@if($errors->first('price'))
			<p>{{ $errors->first('price') }}</p>
		@endif
	</div>

	<div>
		<label for="stock">Stock: </label>
		<input type="number" name="stock" stock id="stock" value="{{ old('stock') }}">
		@if($errors->first('stock'))
			<p>{{ $errors->first('stock') }}</p>
		@endif
	</div>

	<input type="submit" value="Add new Product">

</form>

@endsection