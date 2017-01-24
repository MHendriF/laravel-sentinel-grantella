<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use Activation;
use App\Users;
use Mail;

class RegisterController extends Controller
{
	public function register()
	{
		return view('auth.register');
	}    

	public function postRegister(Request $request)
	{
		$this->validate($request, [
			'name'                  => 'required',
			'username'              => 'required',
			'nrp'                   => 'required',
			'phone'                 => 'required',
			'email'                 => 'required',
			'password'              => 'confirmed|required|min:5|max:10',
			'password_confirmation' => 'required|min:5|max:10'
    		]);

		$user = Sentinel::register($request->all());
		//set default activation to 0
		$activation = Activation::create($user);

		//set default slug by manager
		$role = Sentinel::findRoleBySlug('manager');
		$role->users()->attach($user);

		//send mail notification to active their account
		$this->sendEmail($user, $activation->code);

		return redirect('/login');
	}

	private function sendEmail($user, $code)
	{
		Mail::send('emails.activation' , [
			'user' => $user,
			'code' => $code
			], function($message) use ($user) {
				$message->to($user->email);

				$message->subject("Hello $user->name, 
					activate your account.");
			});
	}
}
