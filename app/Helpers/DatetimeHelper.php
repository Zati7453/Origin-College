<?php

namespace App\Helpers;

use App\Models\Country;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Date;


class DatetimeHelper
{

    public static function getNow($format='Y-m-d H:i:s',$strToTime=false)
    {
        $currentNow = Carbon::now();

        if($strToTime == true) {
            return $currentNow->timestamp;
        } else {
            return $currentNow->format($format);
        }
    }

    public static function convertDatabaseDate($date)
    {
        return $date->toDateTimeString();
    }

    public static function convertDateTime($date,$format='Y-m-d H:i:s')
	{
		return Carbon::parse($date)->format($format);
	}

    public static function getNextDaysDate($date,$days,$format='Y-m-d H:i:s')
	{
		return Carbon::parse($date)->addDays($days)->format($format);
	}

	public static function getPreviousDaysDate($date,$days,$format='Y-m-d H:i:s')
	{
		return Carbon::parse($date)->subDays($days)->format($format);
	}

	public static function startDateOfPrevMonth($format='Y-m-d') {
		$startPrevDate = new Carbon('first day of last month');
		return $startPrevDate->format($format).' 00:00:00';
	}

	public static function EndDateOfPrevMonth($format='Y-m-t')
	{
		$endPrevDate = new Carbon('last day of last month');
		return $endPrevDate->format($format).' 23:59:59';
	}

	public static function startDateOfCurrentMonth($format='Y-m-d')
	{
		$startCurrentMonthDate = new Carbon('first day of this month');
		return $startCurrentMonthDate->format($format).' 00:00:00';
	}

	public static function lastDateOfCurrentMonth($format='Y-m-t')
	{
		$lastCurrentMonthDate = new Carbon('last day of this month');
		return $lastCurrentMonthDate->format($format).' 23:59:59';
	}

	public static function startPreviousMonthGivenDate($given_date,$format='Y-m-d') {
        $start = new Carbon($given_date);
        $startDate = $start->startOfMonth()->subMonth()->format($format);

        return $startDate.' 00:00:00';
    }

    public static function endPreviousMonthGivenDate($given_date,$format='Y-m-t') {
        $end = new Carbon($given_date);
        $endDate = $end->subMonth()->endOfMonth()->format($format);

        return $endDate.' 23:59:59';
    }

	public static function startToday($format = 'Y-m-d H:i:s') {
        $startToday = Carbon::today();
        return $startToday->format($format);
    }

    public static function endToday($format = 'Y-m-d H:i:s') {
        $todayDay = Carbon::now()->startOfDay();
        $endDay   = $todayDay->copy()->endOfDay();

        return $endDay->format($format);
    }

    public static function currentWeekStart($format = 'Y-m-d H:i:s',$strToTime=false) {
        $startCurrentWeek  = Carbon::now()->startOfWeek();

        if($strToTime == true) {
            return $startCurrentWeek->timestamp;
        } else {
            return $startCurrentWeek->format($format);
        }
    }

    public static function currentWeekEnd($format = 'Y-m-d H:i:s',$strToTime=false) {
        $endCurrentWeek  = Carbon::now()->endOfWeek();

        if($strToTime == true) {
            return $endCurrentWeek->timestamp;
        } else {
            return $endCurrentWeek->format($format);
        }
    }

    public static function previousWeekStart($format = 'Y-m-d H:i:s',$strToTime=false) {
        $currentDate  = Carbon::now();
        $startPreviousWeek = $currentDate->subDays(7)->startOfWeek();

        if($strToTime == true) {
            return $startPreviousWeek->timestamp;
        } else {
            return $startPreviousWeek->format($format);
        }
    }

    public static function nextWeekStart($format = 'Y-m-d H:i:s',$strToTime=false) {
        $nextWeekStart = Carbon::parse('next monday');

        if($strToTime == true) {
            return $nextWeekStart->timestamp;
        } else {
            return $nextWeekStart->format($format);
        }
    }

    public static function getDaysOfCurrentWeek($format='Y-m-d') {
        $today = self::getNow('Y-m-d');
        $startCurrentWeek  = Carbon::now()->startOfWeek();

        $weekDays = [];
        for ($i=0; $i <7 ; $i++) {
            $todayDate = $startCurrentWeek->copy()->addDay($i)->format($format);

            if($todayDate <= $today) {
                $weekDays[] = $todayDate;
            }
        }

        return $weekDays;
    }

    public static function lastWeekStart($format = 'Y-m-d H:i:s',$strToTime=false) {
        $startLastWeek  = Carbon::now()->subDays(7)->startOfWeek();

        if($strToTime == true) {
            return $startLastWeek->timestamp;
        } else {
            return $startLastWeek->format($format);
        }
    }

    public static function lastWeekEnd($format = 'Y-m-d H:i:s',$strToTime=false) {
        $endLastWeek  = Carbon::now()->subDays(7)->endOfWeek();

        if($strToTime == true) {
            return $endLastWeek->timestamp;
        } else {
            return $endLastWeek->format($format);
        }
    }

    public static function getQuartersByDays($start_date,$days,$format='Y-m-d') {
        // Get Last Date
        $last_date = Carbon::createFromFormat($format, $start_date)->addDays($days+1);
        // Set Dates
        $lastDate = Carbon::parse($last_date);
        $startDate = Carbon::parse($start_date);

        // Get Difference in years
        $yearsCount = $startDate->diffInYears($lastDate);

        // Get Quarters
        $years = 0;
        for($q=0;$q<=$yearsCount;$q++) {
            $years = $q;
        }
        $quarter = $years * 4;

        // Setting quarters by purchase date
        $quarters = array();
        $quarters = array('years'=>$yearsCount,'quarters'=>$quarter);
        $quarterly_date = '';
        for($d=0;$d<$quarter;$d++) {
            $getDays = floor($days / $quarter);

            if(empty($quarterly_date)) {
                $quarterly_date = $start_date;
            }
            $quarterlyDate = Carbon::parse($quarterly_date)->addDays($getDays);
            $quarterly_date = $quarterlyDate;

            $quarters['quarterly_date'][$d] = $quarterly_date;
        }

        return $quarters;
    }

    public static function dateStrToTime($date) {
        $dateToStr = Carbon::parse($date)->timestamp;
        return $dateToStr;
    }

    public static function getWeekStartEndDate($startMaxOut) {
        $start_week = date("W",strtotime($startMaxOut));
        $year = date("Y",strtotime($startMaxOut));
        $current_week = date("W");

        $weeks = [];
        $w = 0;
        for($i=$start_week;$i<=$current_week;$i++) {
            $dto = Carbon::now();
            $weeks[$w]['week'] = $i;
            $weeks[$w]['start'] = $dto->setISODate($year, $i, 1)->format('Y-m-d');
            $weeks[$w]['end'] = $dto->setISODate($year, $i, 7)->format('Y-m-d');
            $w++;
        }

        return $weeks;
    }

    public static function getTimeZoneOffset($timezone) {
        $current = timezone_open($timezone);

        $utcTimezone = new \DateTimeZone('UTC');
        $utcTime = new \DateTime('now', $utcTimezone);
        $offsetInSecs = timezone_offset_get($current,$utcTime);
        $hoursAndSec = gmdate('H:i', abs($offsetInSecs));

        $timeZoneOffset = stripos($offsetInSecs, '-') === false ? "+{$hoursAndSec}" : "-{$hoursAndSec}";

        return $timeZoneOffset;
    }

}
