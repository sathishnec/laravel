<?php

class AclGroup extends Eloquent {
	
	protected $table = 'acl_groups';
	protected $fillable = array('name', 'description');
	public $timestamps = false;

	public function users() 
	{
		return $this->belongsToMany('User', 'acl_user_groups', 'group_id', 'user_id');
	}

	public function permissions() 
	{
		return $this->belongsToMany('AclPermission', 'acl_group_permissions', 'group_id', 'permission_id');
	}

	public static $add_group_rules = array(
		'group'=>'required|min:2'
	);
}