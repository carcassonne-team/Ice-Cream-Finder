<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(Request $request): \Illuminate\Http\RedirectResponse
    {
        return redirect()->route('shops.index');
    }
}
