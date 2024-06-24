<?php

namespace App\Http\Controllers\web\page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ListController extends Controller
{
    public function Index()
    {
        return view('web.list');
    }
}
