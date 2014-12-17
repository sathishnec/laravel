
<?php


class MainController extends \BaseController 
{
	public function index()
	{
		if(Auth::check())
		{
			return View::make('index');
		}
		else
		{
			return Redirect::route('login');
		}		
	}

	public function login()
	{
		return View::make('login');
	}

	public function postLogin()
	{		
		if(Auth::attempt(array('email'=>Input::get('email'), 'password'=>Input::get('password'))))
		{
			return Redirect::route('index');
		}
		else
		{
			return Redirect::route('login');
		}		
	}

	public function logout()
	{
		if(Auth::check())
		{
			Auth::logout();
			return Redirect::route('login');
		}
		else
		{
			return Redirect::route('login');
		}
	}
}