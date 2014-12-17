<?php

class LeaveType extends Eloquent
{
	protected $table = 'leaveType';

	protected $fillable = array('leave_type','status','added_by');

	public static $leave_type_rules = array(
		'leaveType'=>'required|min:2'
		);
}