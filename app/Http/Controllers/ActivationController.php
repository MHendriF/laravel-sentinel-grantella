<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use Activation;
//use Sentinel;

class ActivationController extends Controller
{
    public function activate($email, $activationCode)
    {
    	$user = Users::whereEmail($email)->first();
  
    	if(Activation::complete($user, $activationCode))
    	{
    		return redirect('/login')->with([
                'success' => 'Your account is activated.'
                ]);;
    	}
    	else
    	{
            return redirect('/');
    	}
    }
}
