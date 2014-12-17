<?php

class AclPermittedFilter 
{
	public function filter($route, $request)
	{
		$user = Auth::user();
		$user->load('groups', 'groups.permissions');
		$permitted = false;
		
		foreach($user->groups as $group)
		{
			
			if ( $group->permissions->contains($route->getName()) )
			{
				$permitted = true;
				break;
			}
		}

		if (!$permitted && Request::segment(2) !== 'userdenied') 
		{
			return Redirect::route('userdenied');
		}
	}

	public static function checkPermission($route)
	{
		$user = Auth::user();
		$user->load('groups', 'groups.permissions');
		$permitted = false;

		foreach($user->groups as $group)
		{
			if ( $group->permissions->contains($route) )
			{
				$permitted = true;
				break;
			}
		}
		return $permitted;
	}
}