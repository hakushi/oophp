<?php 
class CCalendarMonth extends CCalendarDay
{
    public $days = array();
    public $month = array();
    function __construct()
    {

    }

    public function getMonth($year, $month)
    {
        $first_day_timestamp = $year . "-" . $month . "-01";
        $days_in_month = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        $last_day_timestamp = $year . "-" . $month . "-" . $days_in_month;
        
        $month_string = DateTime::createFromFormat('!m', $month);
        $month_name = $month_string->format('F');
        $first_day = $this->getDay($first_day_timestamp);

        $begin = new DateTime($first_day_timestamp);
        $end = new DateTime($last_day_timestamp);
        $end = $end->modify('+1 day');

        $interval = new DateInterval('P1D');
        $daterange = new DatePeriod($begin, $interval , $end);

        foreach ($daterange as $date){
            $days[$date->format("d")] = $this->getDay($date->format("Y-m-d"));
        }

        $monthObj = [
            'year' => $year,
            'month' => $month,
            'month_name' => $month_name,
            'no_of_days' => $days_in_month,
            'first_day' => $first_day,
            'days' => $days
            ];

        return $monthObj;
    }

    public function getCurrentMonth()
    {

    }
}
