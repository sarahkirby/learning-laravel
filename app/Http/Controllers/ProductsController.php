<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
	// In charge of showing the default products page
   public function index() {

   	$products = [
   		[
   			'name'  => 'Apple',
   			'price' => '$1',
   		],
   		[
   			'name'  => 'Banana',
   			'price' => '$4'
		]
   	];

   	$popularProducts = [];

   		return view('products', compact('products', 'popularProducts'));

   }
}
