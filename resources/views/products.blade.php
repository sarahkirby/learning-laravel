@extends('master')

@section('content')

<h1>Products</h1>

<a href="/products/create">Add new Product</a>

	<h2>Popular Products right now</h2>

	@foreach($popularProducts as $product)
		<p>{{$product}}</p>
	@endforeach



	<h2>Latest Products</h2>

	@foreach($products as $product)
	{{-- Go to individual product page --}}
		<p><a href="/products/{{ $product->id }}">{{ $product->name }}</a></p>

	@endforeach



@endsection