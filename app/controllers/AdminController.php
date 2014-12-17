<?php


class AdminController extends \BaseController 
{

	public function adduser()
	{
		$dept = Department::all();
		$groups = AclGroup::all();

		return View::make('admin.adduser')
				->with('departments', $dept)
				->with('groups', $groups);
	}

	public function postAdduser()
	{
		$validation = Validator::make(Input::all(), User::$add_user_rules);

		if($validation->fails())
		{
			return Redirect::to('/admin/adduser')
					->withInput()
					->with('error', 'There are few errors in this form');
		}
		else
		{
			$user = new User();

			$user->email = Input::get("email");
			$user->password = Hash::make(Input::get("password"));
			$user->name = Input::get("fullname");
			$user->department_id = Input::get("dept");
			$user->user_status_id = 1;
			$user->save();
			
			$userID = $user->id;

			$groups = Input::get("groups");

			if(is_array($groups))
			{
				foreach($groups as $group)
				{
					DB::insert('INSERT INTO acl_user_groups (user_id,group_id) VALUES (?,?)',
								array($userID, $group));
				}
			}
			else
			{
				return Redirect::to('/admin/addaclgroup')
				->with('error','You must add a permission for this group');
			}			

			return Redirect::to('/admin/adduser')
					->with('success', 'User Added');

		}
	}

	public function adddept()
	{
		$dept = Department::all();

		return View::make('admin.adddept')
				->with('departments', $dept);
	}

	public function postAdddept()
	{
		$validation = Validator::make(Input::all(), Department::$add_dept_rules);

		if($validation->fails())
		{
			return Redirect::to('/admin/adddept')
				->with('error','Error with Department Name');
		}
		else
		{
			$dept = new Department();

			$dept->name = Input::get("department");
			$dept->status = 1;
			//$leaveType->added_by = Auth::user()->id;
			$dept->save();

			return Redirect::route('adminadddept');		
		}
	}

	public function deleteDepartment($id)
	{
		$leaveType = Department::whereId($id)->first();
		$leaveType->status = 0;
		$leaveType->save();

		return Redirect::route('adminadddept');
	}

	public function addgroup()
	{
		$permissions = AclPermission::all();
		
		return View::make('admin.addgroups')
				->with('permissions', $permissions);
	}

	public function postAddgroup()
	{
		$validation = Validator::make(Input::all(), AclGroup::$add_group_rules);

		if($validation->fails())
		{
			return Redirect::to('/admin/addaclgroup')
				->with('error','Error with Group Name');
		}
		else
		{
			$group = new AclGroup();


			$group->name = Input::get("group");
			$group->description = Input::get("groupdesc");
			//$leaveType->added_by = Auth::user()->id;
			$group->save();

			$groupID = $group->id;

			$permissions = Input::get('permissions');

			if(is_array($permissions))
			{
				foreach($permissions as $permission)
				{
					DB::insert('INSERT INTO acl_group_permissions (group_id,permission_id) VALUES (?,?)',
								array($groupID, $permission));
				}
			}
			else
			{
				return Redirect::to('/admin/addaclgroup')
				->with('error','You must add a permission for this group');
			}

			return Redirect::route('adminaddaclgroup');		
		}
	}

	public function manageUsers()
	{
		$users = User::all();
		$groups = AclGroup::all();
		$statuses = Status::all();
		$dept = Department::all();

		return View::make('admin.manageusers')
					->with('users', $users)
					->with('groups', $groups)
					->with('statuses', $statuses)
					->with('departments', $dept);
	}

	public function postUpdateuser()
	{
		$userid = Input::get("userid");
		$groups = Input::get("groups");

		if(is_array($groups))
		{
			foreach($groups as $group)
			{
				$groupExists = DB::select('SELECT 1 FROM acl_user_groups WHERE user_id=? AND group_id=?', 
								array($userid, $group));

				if(!$groupExists)
				{
					DB::insert('INSERT INTO acl_user_groups (user_id,group_id) VALUES (?,?)',
							array($userid, $group));
				}
			}
		}
		$user = User::find($userid);
		$user->department_id = Input::get("dept");
		$user->user_status_id = Input::get("userstatus");
		$user->save();

		return Redirect::route('adminmanageusers');
	}	

	public function userDenied()
	{
		return View::make('userdenied');
	}
}

