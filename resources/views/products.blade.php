@extends('master')

@section('content')

<h1>Products</h1>

	<h2>Popular Products right now</h2>

	@foreach($popularProducts as $product)
		<p>{{$product}}</p>
	@endforeach

	<h2>Latest Products</h2>

	@foreach($products as $product)
		<p>{{ $product->name }} at {{ $product->price}}
		 each and there are {{$product->stock}} in stock.</p>
	@endforeach



@endsection