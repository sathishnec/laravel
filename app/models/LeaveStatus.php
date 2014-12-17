<?php

class LeaveStatus extends Eloquent
{
	protected $table = 'leaveStatus';

	protected $fillable = array('leave_status','status','added_by');

	public static $leave_status_rules = array(
		'leaveStatus'=>'required|min:2'
		);
}