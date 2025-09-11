<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyFavBookController extends Controller
{
    public function index() {
        return 'my favorite book is Haruki Murakami Norwegian Forest';
    }
}
