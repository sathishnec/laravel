<?php

class LeaveHistory extends Eloquent
{
	protected $table = 'leaveHistory';

	protected $fillable = array('name','start_date','end_date','am_pm','no_of_days','leaveStatus_id','leaveType_id','user_declared', 'reduce_leave_count','authorized_by','reason');

	public static $add_holiday_rules = array(
		'startDate'=>'required|date',
		'endDate'=>'required|date',
		'noofDays'=>'required',
		'tandc'=>'required|integer'
		);

	public function leaveStatus()
	{
		return $this->hasMany('LeaveStatus','id','leaveStatus');
	}
}