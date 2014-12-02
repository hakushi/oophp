<?php 

class CCalendarDay
{
    public $date;
    
    public $day = array();

    function __construct()
    {
    }

    public function getDay($date_string)
    {
        
        $moon = new moonPhase();
        $moon->setDate(strtotime($date_string));
        $date = new DateTime($date_string);
        $day = $date->format('j');
        $weekday = $date->format('l');
        $weekday_number = $date->format('w');
        $week = $date->format('W');
        $this->day = [
            'date' => $day,
            'weekday' => $weekday,
            'weekday_number' => $weekday_number,
            'week' => $week,
            'flagday' => flag_dag(
                date('Y', strtotime($date_string)),
                date('m', strtotime($date_string)),
                date('d', strtotime($date_string))
            ),
            'holiday' => helgdag(
                date('Y', strtotime($date_string)),
                date('m', strtotime($date_string)),
                date('d', strtotime($date_string))
            ),
            'names' => dagensNamnsdag(
                date('d', strtotime($date_string)) . "-" .
                date('m', strtotime($date_string))
            ),
            'moon_phase_id' => $moon->getPhaseID()
        ];

        return $this->day;
    }
}