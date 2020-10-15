<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Artisan;

class ClearCacheController extends Controller
{
    public function index()
    {
        dd(1);
        Artisan::call('config:cache');
        Artisan::call('view:clear');
        Artisan::call('cache:clear');
        Artisan::call('migration');

        return redirect()->back()->with('status', 'Cache Cleared!');
    }
}
