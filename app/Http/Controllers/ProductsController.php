<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
// brings all the code from this file. Makes our code tidier
use App\Product;

class ProductsController extends Controller
{
	// In charge of showing the default products page
   public function index() {

// find the Product class and run its method all (grab everything). \ - go to root and look for class
   	// $products = \App\Product::all();

// writing sql but with php. Created a model for table Product.
   	$products = \App\Product::where('price', '>', '1.50')->get();
   	$popularProducts = [];

   		return view('products', compact('products', 'popularProducts'));

   }
   public function create() {

// go to views folder/products folder/ create.blade.php
   	return view('products.create');

   }
   // $request is data from form
   public function store(Request $request) {

   	// Validation. $this referrring to Controller class and a function called validate.
   	$this->validate($request, [
   		// name is the key - what the name="" is in the form.'required' - a rule. Most important rule first
   		'name'=>'required|min:2|max:10',
   		'description'=>'required|between:20,1000',
   		'price'=>'required|numeric|min:.01|max:9999.99',
   		'stock'=>'required|integer|min:0|max:65535'

	]);


	// Create new product. $request->all() 'mass assign' - grabs all the data in the form. A user can manipulate form this way.
	// In Product.php we write code so people can't manipulate the form when we grab all().
   	$newProduct = new Product($request->all());

   	// Populate the product with form data
   	// $newProduct->name    		= $request->name;
   	// $newProduct->description    = $request->description;
   	// $newProduct->price 			= $request->price;
   	// $newProduct->stock 			= $request->stock;


   	// Save the new product into database
   	$newProduct->save();

   	// Redirect to Products page when form is submitted
   	return redirect('products');

   	// return $request->all();

   }
   public function show( $productID ) {

   	// Find the product with that id. Save the product that has been clicked in $product
   	// findOrFail only returns products that exists. You can't edit the url. It will return a error 404 file that we will create
   	$product = Product::findOrFail($productID);

   	// compact sends $product to the view
   	return view('products.show', compact('product'));
   }
   public function edit( $id ) {

   		// Get info about the product
		$product = Product::findOrFail($id);	

		return view('products.edit', compact('product'));	

   }
   public function update( $id, Request $request ) {

   		$this->validate($request, [
   			'name'=>'required|min:2'
		]);


		// Find the product that we are editing (inside databse). Grabs product from url?
		$product = Product::findOrFail($id);

		// Modify name with what is n the form
		$product->name = $request->name;

		$product->save();

		return redirect('products/'.$id);


   }
}
