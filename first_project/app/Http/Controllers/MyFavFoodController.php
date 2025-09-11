<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyFavFoodController extends Controller
{
    public function index() {
        return 'my favorite food is pizza';
    }
}
