<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Client\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Log;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function test()
    {
        return 'for Test';
    }

    function test2()
    {
        return 'for Test2';
    }

    function storeUserInformation()
    {

        return view('dashboard');
    }

    function getUserId()
    {
        return auth()->user();
    }
}
