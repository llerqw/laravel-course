<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class MainController extends Controller
{

    public function index()
    {
        return view('main');
    }

    /*
     * Чтение всех данных: all();
     * Чтение данных с условием: where('условие', значение)->get();
     * Чтение данных с условием только первой записи: where('условие', значение)->first();
     * Возвращается коллекция, поэтому вывод через foreach.
     */

}
