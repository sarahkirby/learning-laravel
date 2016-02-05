<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //List of things that can be assigned in mass. So users can't mess with your form when you grab 'all()' the data.
    protected $fillable = ['name', 'description', 'price', 'stock'];

}
