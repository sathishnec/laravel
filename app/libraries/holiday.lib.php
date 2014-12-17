<?php

class HolidayLib
{
	
	public static function getTotalHolidays($startDate, $endDate, $disabledDates, $ampm=null, $ignoreWeekends=true)
	{
		if($startDate == $endDate)
		{
			return '0.5';
		}
		else
		{
			$start_date = new DateTime($startDate);
			$end_date = new DateTime($endDate);

			$diff = $end_date->diff($start_date)->format("%a");

			if($ampm)
			{
				return $diff+'0.5';
			}
		}
	}

	public static function getDatesBetweenRange($startDate, $endDate, $step="+1 day", $format="d m Y")
	{
		$dates = array();
		$current = strtotime($startDate);
		$last  = strtotime($endDate);

		while($current <= $last)
		{
			$dates[] = date($format, $current);
			$current = strtotime($step, $current);
		}

		return $dates;
	}
}