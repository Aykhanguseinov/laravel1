<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function phpInfo()
    {
        return response()->json(['php_info' => phpversion()]);
    }

    public function clientInfo(Request $request)
    {
        $ip = $request->ip();
        $userAgent = $request->header('User-Agent');

        return response()->json(['ip' => $ip, 'user_agent' => $userAgent]);
    }

    public function databaseInfo()
    {
        $databaseInfo = [
            'driver' => config('database.default'),
            'host' => config('database.connections.' . config('database.default') . '.host'),
        ];

        return response()->json(['database_info' => $databaseInfo]);
    }
}