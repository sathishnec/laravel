<?php

class HolidayController extends \BaseController 
{
	public function index()
	{
		return View::make('holiday.index');
	}

	// Book a Holiday
	public function book()
	{
		$leaveType = LeaveType::where('status','1')->get();

		$disabled_dates = LeaveHistory::where('user_id', Auth::user()->id)->get();

		foreach($disabled_dates as $dates)
		{			
			$arrDisabledDates[] = implode(",",HolidayLib::getDatesBetweenRange($dates['start_date'], $dates['end_date']));
		}

		$disabledDates = json_encode(implode(",",$arrDisabledDates));

		JavaScript::put([
	        'disabledDates' => $disabledDates
	    ]);

		return View::make('holiday.book')
				->with('leaveTypes', $leaveType);
	}

	public function postBook()
	{
		$validation = Validator::make(Input::all(), LeaveHistory::$add_holiday_rules);

		if($validation->fails())
		{
			return Redirect::to('/holiday/book')
				->with('error','Errors with some fields')
				->withInput();
		}
		else
		{
			$bookHoliday = new LeaveHistory();

			$bookHoliday->user_id = Auth::user()->id;
			$bookHoliday->start_date = Input::get("startDate");
			$bookHoliday->end_date = Input::get("endDate");
			$bookHoliday->am_pm = Input::get("am_pm");
			$bookHoliday->no_of_days = Input::get("noofDays");
			$bookHoliday->leaveType_id = Input::get("leaveType");
			$bookHoliday->leaveStatus_id = 1;
			$bookHoliday->reason = Input::get("reason");
			$bookHoliday->user_declared = Input::get("tandc");

			$bookHoliday->save();

			return Redirect::route('holbook');		
		}
	}

	//View a Holiday
	public function viewHoliday()
	{
		$hols = LeaveHistory::where('user_id', Auth::user()->id)->get();

		if(!$hols->isEmpty())
		{
			return View::make('holiday.viewhols')
					->with('hols', $hols);
		}
	}


	/*  Administrator Section */

	public function addLeaveType()
	{
		$leaveType = LeaveType::where('status','1')->get();

		return View::make('holiday.addleave')
				->with('leaveTypes', $leaveType);
	}

	public function postAddLeaveType()
	{
		/*
		if ( Session::token() !== Input::get( '_token' ) ) {
            return Response::json( array(
                'msg' => 'Unauthorized attempt to create option'
            ) );
        }*/
		$validation = Validator::make(Input::all(), LeaveType::$leave_type_rules);


		if($validation->fails())
		{
			return Response::json( array(
                'msg' => 'Error with leave type'
            ) );
			//return View::make('holiday.addleave')
				//->with('error','Error with Leave Type');
		}
		else
		{
			$leaveType = new LeaveType();

			$leaveType->leave_type = Input::get("leaveType");
			$leaveType->status = 1;
			$leaveType->added_by = Auth::user()->id;
			$leaveType->save();

			//return Redirect::route('holadminaddtype');		
			return Response::json( array(
                'msg' => 'Success'
            ) );
		}
	}

	public function deleteLeaveType($id)
	{
		$leaveType = LeaveType::whereId($id)->first();
		$leaveType->status = 0;
		$leaveType->save();

		return Redirect::route('holadminaddtype');
	}

	public function addLeaveStatus()
	{
		$leaveStatus = LeaveStatus::where('status','1')->get();

		return View::make('holiday.addstatus')
				->with('leaveStatuses', $leaveStatus);
	}

	public function postAddLeaveStatus()
	{
		$validation = Validator::make(Input::all(), LeaveStatus::$leave_status_rules);

		if($validation->fails())
		{
			return View::make('holiday.addstatus')
				->with('error','Error with Leave Status');
		}
		else
		{
			$leaveStatus = new LeaveStatus();

			$leaveStatus->leave_status = Input::get("leaveStatus");
			$leaveStatus->status = 1;
			$leaveStatus->added_by = Auth::user()->id;
			$leaveStatus->save();

			return Redirect::route('holadminaddstatus');
		}
	}

	public function deleteLeaveStatus($id)
	{
		$leaveType = LeaveStatus::whereId($id)->first();
		$leaveType->status = 0;
		$leaveType->save();

		return Redirect::route('holadminaddstatus');
	}

	public function addAnnualHoliday()
	{
		$leaveType = LeaveType::where('status','1')->get();
		$users = User::where('department_id',Auth::user()->department_id)->get();

		return View::make('holiday.annualleave')
				->with('leaveTypes', $leaveType)
				->with('users', $users);
	}

	public function postAddAnnualHoliday()
	{
		$validation = Validator::make(Input::all(), AnnualLeave::$annual_leave_rules);

		if($validation->fails())
		{
			return Redirect::to('holiday/admin/addannhol')
					->with('error','There are errors in this form');
		}
		else
		{
			$annualleave = new AnnualLeave();

			$annualleave->user_id = Input::get("userid");
			$annualleave->start_date = Input::get("startDate");
			$annualleave->end_date = Input::get("endDate");
			$annualleave->total_days = Input::get("noofDays");
			$annualleave->added_by = Auth::user()->id;
			$annualleave->save();

			return Redirect::route('holadminaddannholi');		
		}
	}
}