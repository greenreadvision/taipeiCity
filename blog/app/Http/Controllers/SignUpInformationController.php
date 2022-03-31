<?php

namespace App\Http\Controllers;

use App\SignUpInformation;
use Illuminate\Http\Request;

class SignUpInformationController extends Controller
{
    //

    public function index()
    {
        $temp = SignUpInformation::orderby('number')->distinct()->get();
        $cn = [];
        $en = [];
        foreach ($temp as $data) {
            if ($data->type == 'cn') {
                array_push($cn, $data);
            } else if ($data->type == 'en') {
                array_push($en, $data);
            }
        }
        return view('layouts.signUpInformation.index', ['cn' => $cn,'en'=>$en]);
    }

    public function createCN(Request $request)
    {
        $request->validate([
            'content' =>  'required|string|min:0|max:500'
        ]);
        $signUp = SignUpInformation::all();
        $i = 0;
        foreach ($signUp as $data) {
            if ($data->type == 'cn') {
                $i++;
            }
        }
        $post = SignUpInformation::create([
            'number' => $i + 1,
            'type' => 'cn',
            'content' => $request->input('content'),
        ]);
        return redirect()->route('signUpInformation.index');
    }

    public function createEN(Request $request)
    {
        $request->validate([
            'content' =>  'required|string|min:0|max:500'
        ]);
        $signUp = SignUpInformation::all();
        $i = 0;
        foreach ($signUp as $data) {
            if ($data->type == 'en') {
                $i++;
            }
        }
        $post = SignUpInformation::create([
            'number' => $i + 1,
            'type' => 'en',
            'content' => $request->input('content'),
        ]);
        return redirect()->route('signUpInformation.index');
    }
    public function update(Request $request, String $id)
    {

        $SignUpInformation_ = SignUpInformation::find($id);

        $SignUpInformation = SignUpInformation::where('id', $id)->update($request->except('_method', '_token'));

        return redirect()->route('signUpInformation.index');
    }

    public function destroy(String $id)
    {
        $SignUpInformation_ = SignUpInformation::find($id);

        $SignUpInformation_->delete();

        return redirect()->route('signUpInformation.index');
    }
}
