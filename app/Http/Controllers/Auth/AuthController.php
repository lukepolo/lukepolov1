<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
	use AuthenticatesAndRegistersUsers;

	public function __construct(Guard $auth, Registrar $registrar)
	{
        parent::__construct();

		$this->auth = $auth;
		$this->registrar = $registrar;
        $this->redirectPath = action('\App\Http\Controllers\AdminController@getIndex');

		$this->middleware('guest', ['except' => 'getLogout']);
	}
}
