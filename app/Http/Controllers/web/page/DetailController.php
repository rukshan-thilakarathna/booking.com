<?php

namespace App\Http\Controllers\web\page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function index($id)
    {
        return view('web.detail');
    }
}
