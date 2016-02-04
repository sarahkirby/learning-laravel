<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
	// In charge of showing the default products page
   public function index() {

// find the Product class and run its method all (grab everything). \ - go to root and look for class
   	// $products = \App\Product::all();

// writing sql but with php
   	$products = \App\Product::where('price', '>', '1.50')->get();
   	$popularProducts = [];

   		return view('products', compact('products', 'popularProducts'));

   }
}
