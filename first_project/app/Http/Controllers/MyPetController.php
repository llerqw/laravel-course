<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyPetController extends Controller
{
    public function index() {
        return 'my pet is cat';
    }
}
