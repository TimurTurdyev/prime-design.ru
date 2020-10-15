<?php

namespace App\Http\Controllers;

use App\Model\Album;

class PortfolioController extends Controller
{
    public function index()
    {
        $albums = Album::with('Photos')->get();
//        dd($albums);
        return view('portfolio.index', compact('albums'));
    }
}
