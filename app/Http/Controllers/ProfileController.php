<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use \Auth;
use \Validator;

class ProfileController extends Controller
{
    public function edit()
    {
    	$user = Auth::user();
    	
    	return view('admin.profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
    	
    	$validator = Validator::make($request->all(),
		[
			'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::user()->id,
            'password' => 'nullable|string|min:6|confirmed',
		]);

		if($validator->fails())
		{
			return redirect()
						->back()
						->withErrors($validator)
						->withInput();
		}
		dd($request->all());
    }
}
