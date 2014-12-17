<?php

class SbadminContorller extends \BaseController 
{

	public function index()
	{
		if(Auth::check())
		{
			return View::make('sbadmin.index');
		}
		else
		{
			return Redirect::route('login');
		}		
	}

	public function blank()
	{
		return View::make('sbadmin.blank');
	}	

	public function buttons()
	{
		return View::make('sbadmin.buttons');
	}

	public function flot()
	{
		return View::make('sbadmin.flot');
	}

	public function forms()
	{
		return View::make('sbadmin.forms');
	}

	public function grid()
	{
		return View::make('sbadmin.grid');
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

	public function morris()
	{
		return View::make('sbadmin.morris');
	}

	public function notifications()
	{
		return View::make('sbadmin.notifications');
	}

	public function panelswells()
	{
		return View::make('sbadmin.panelswells');
	}

	public function tables()
	{
		return View::make('sbadmin.tables');
	}

	public function typography()
	{
		return View::make('sbadmin.typography');
	}

	public function logout()
	{
		Auth::logout();
		return View::make('sbadmin.login');
	} 
}
