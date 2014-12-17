<?php

class Department extends Eloquent
{
	protected $table = 'department';

	protected $fillable = array('name','status','head');

	public static $add_dept_rules = array(
		'department'=>'required|min:2'
		);

	public function user()
	{
		return $this->hasMany('User');
	}
}