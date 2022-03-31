<?php

namespace App\Http\Controllers;

use App\Logs;
use App\ActivityInformation;
use App\Functions\RandomId;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class ActivityController extends Controller
{
    //

    public function index()
    {
        $activity = Logs::orderby('id')->get();
        return view('layouts.activity.activity', ['data' => $activity]);
    }

}
