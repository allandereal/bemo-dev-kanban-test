<?php

namespace App\Http\Controllers;

use App\Models\BoardColumn;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }
}
