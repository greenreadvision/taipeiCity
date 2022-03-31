<?php

namespace App\Http\Controllers;

use App\Status;
use App\Functions\RandomId;

use Illuminate\Http\Request;

class StatusController extends Controller
{
    //


    public function create(Request $request)
    {
     
        $post = Status::create([
    
           'status' => 1
        ]);

        return redirect()->route('home.index');
    }


    public function update(Request $request)
    {
        $status = Status::find('1')->update($request->except('_method', '_token'));

        return redirect()->route('home.index');
    }

   
}
