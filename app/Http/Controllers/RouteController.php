<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class RouteController extends Controller
{
    //



    public function index()
    {
        $allRoutes = Route::getRoutes();
        $apiRoutes = [];
        $homeUrl = url('/');
        foreach ($allRoutes as $route) {
            $uri = $route->uri();
            $segments = explode('/', $uri);

            if (!empty($segments) && $segments[0] === 'api') {
                $apiRoutes[] = $route;
            }
        }
        return view('route.index', compact('homeUrl','apiRoutes'));
    }
}
