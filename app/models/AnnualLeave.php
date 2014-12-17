<?php

class AnnualLeave extends Eloquent
{
	protected $table = 'annualLeave';

	protected $fillable = array('user_id','start_date','end_date','total_days','added_by');

	public static $annual_leave_rules = array(
		'userid'=>'required',
		'startDate'=>'required',
		'endDate'=>'required',
		'noofDays'=>'required'
		);
}