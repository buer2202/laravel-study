<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Cache;

class ScanLoginController extends Controller
{
    private $_cacheKey = 'longlink';

    public function index()
    {
        Cache::put($this->_cacheKey, 0, 0);

        return view('test.index');
    }

    public function login(Request $request)
    {
        $i = 0;
        while ($i < 250) {
            $fp = Cache::get($this->_cacheKey);
            if($fp == 1) {
                return ['status' => 1];
            }

            $i++;

            usleep(100000);
        }

        return ['status' => 0];
    }

    public function confirm()
    {
        Cache::put($this->_cacheKey, 1, 0);

        dump(Cache::get($this->_cacheKey));
    }
}
