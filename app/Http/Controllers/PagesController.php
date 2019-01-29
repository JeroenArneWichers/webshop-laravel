<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class PagesController extends Controller
{
    public function thankyou()
    {
        return view('thankyou');
    }
}
