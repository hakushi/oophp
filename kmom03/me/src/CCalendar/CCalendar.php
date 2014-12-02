<?php

require_once('flagdays.php');
require_once('namnsdag.php');
require_once('moonPhase.php');
require_once('CCalendarDay.php');
require_once('CCalendarMonth.php');

class CCalendar extends CCalendarMonth
{
    public $year = null;
    public $images = array();

    function __construct()
    {
        // define('CAL_IMG_PATH', 'img/calendar/'); // for production

        $this->year = '2014';
        $this->images = [
            '01' => 'img/calendar/01.jpg', 
            '02' => 'img/calendar/02.jpg',
            '03' => 'img/calendar/03.jpg',
            '04' => 'img/calendar/04.jpg',
            '05' => 'img/calendar/05.jpg',
            '06' => 'img/calendar/06.jpg',
            '07' => 'img/calendar/07.jpg',
            '08' => 'img/calendar/08.jpg',
            '09' => 'img/calendar/09.jpg',
            '10' => 'img/calendar/10.jpg',
            '11' => 'img/calendar/11.jpg',
            '12' => 'img/calendar/12.jpg'
        ];
    }

    public function printCalendar($month, $year = '2014')
    {
        $monthObj = $this->getMonth($year, $month);
        
        // ställer in navigationen
        if ($month == '01'){
            $lastMonthObj = $this->getMonth($year-1, '12');
            $prevMonth = DateTime::createFromFormat('!m', '12');
            $prev_link = '?y=' . ($year-1) . '&m=12';
        } else {
            $lastMonthObj = $this->getMonth($year, $month-1);
            $prevMonth = DateTime::createFromFormat('!m', $month-1);
            $prev_link = '?y=' . $year . '&m='. $prevMonth->format('m');
        }
        if ($month == '12'){
            $nextMonthObj = $this->getMonth($year+1, '01');
            $nextMonth = DateTime::createFromFormat('!m', '01');
            $next_link = '?y=' . ($year+1) . '&m=01';
        } else {
            $nextMonthObj = $this->getMonth($year, $month+1);
            $nextMonth = DateTime::createFromFormat('!m', $month+1);
            $next_link = '?y=' . $year . '&m='. $nextMonth->format('m');
        }
        $dt = DateTime::createFromFormat('!m', $month);
        $calendar = "<table class='calendar_wrapper' cellspacing='0' cellpadding='0' border='0'>
                     <tr><td class='nav_left'>
                     <a href='$prev_link'><</a>
                     </td><td>";

        $calendar .= "<table class='calendar_table' cellspacing='01'>";
        $calendar .= "<tr class='calendar_header'><th colspan='9'>" . strftime($dt->format('F')) . " &ndash; " . $monthObj['year'] . "<br>";
        $calendar .= "<img class='calendar_image' src='".$this->images[$month]."' alt='kalenderbild'></th></tr>";
        $calendar .= "<tr class='subheader'><th class='week'><th>Måndag</th><th>Tisdag</th><th>Onsdag</th>
                     <th>Torsdag</th><th>Fredag</th><th>Lördag</th><th>Söndag</th></tr>";

        $calendar .= "</tr>";
        foreach ($monthObj['days'] as $day) {

            $weekday_no = $day['weekday_number'];

            // Skriver ut vecka
            if ($day['weekday_number'] == 1 || $day['date'] == '01') {
                $calendar .= "<tr><td class='week_td'>v." . $day['week'] . "</td>";
            }


            

            // Skriver ut föregående månads veckodagar
            if ($day['date'] == '01') {
                if ($day['weekday_number'] == '0') {
                    $weekday_no = 7;
                }
                for ($i = 0; $i < $weekday_no -1; $i++) {
                    $val = $lastMonthObj['no_of_days'] - ($weekday_no-2)+$i;
                    $calendar .= "<td class='prev_or_next_month_td'>" .
                    "<span class='day_number'>" . $lastMonthObj['days'][$val]['date'] .
                    "</span><br><span class='day_name'>" .
                    $lastMonthObj['days'][$val]['weekday'] . "</span></td>";
                }
            }

            // Röd eller ordinarie veckodag?
            if ($day['weekday_number'] == '0' || $day['holiday'] == true) {
                $calendar .= "<td class='red_day'>";
            } else {
                $calendar .= "<td>";
            }
        
            if ($day['moon_phase_id'] == 4) {
                $calendar .= "<img src='img/calendar/full_moon.png' class='moon_icon'>";
            } elseif ($day['moon_phase_id'] == 2) {
                $calendar .= "<img src='img/calendar/half_moon_1.png' class='moon_icon'>";
            } elseif ($day['moon_phase_id'] == 6) {
                $calendar .= "<img src='img/calendar/half_moon_2.png' class='moon_icon'>";
            }
            if ($day['flagday'] == true) {
                $calendar .= "<img src='img/calendar/flag.png' class='flag_icon'>";
            }

            $calendar .= "<span class='day_number'>" . $day['date'] . "</span><br>" .
                         "<span class='day_name'>" . $day['weekday'] . "</span><br>";
            // flaggdag?
            if ($day['flagday'] == true) {
                $calendar .= "<span class='flag'>" . $day['flagday'] . "</span><br>";
            } elseif ($day['holiday'] == true) {
                $calendar .= "<span class='holiday'>" . $day['holiday'] . "</span><br>";
            }

            // Namnsdagar
            $calendar .= "<span class='name'>";
            foreach ($day['names'] as $name) {
                $calendar .=  $name . "<br>";
            }
            $calendar .= "</span>";
            
            $calendar .= "</td>";
            // Skriver ut nästa månads dagar
            if ($day['date'] == $monthObj['no_of_days'] && $day['weekday_number'] != 0) {
                $date = 1;
                for ($i = 6; $i >= $day['weekday_number']; $i--) {
                    
                    // dd($nextMonthObj);  
                    $calendar .= "<td class='prev_or_next_month_td'>" .
                    "<span class='day_number'>" . $nextMonthObj['days']['0' . $date]['date'] .
                    "</span><br><span class='day_name'>" .
                    $nextMonthObj['days']['0' . $date]['weekday'] . "</span></td>";
                    $date++;
                }
            }
        }
        
        $calendar .= "</tr></table></td>
                    <td class='nav_right'>
                    <a href='$next_link'>></a>
                    </td>
                    </table>";

        return $calendar;
    }

    // minifierad kalender
    public function printTinyCalendar($month, $year = '2014')
    {
        $monthObj = $this->getMonth($year, $month);
        
        // ställer in navigationen
        if ($month == '01'){
            $lastMonthObj = $this->getMonth($year-1, '12');
            $prevMonth = DateTime::createFromFormat('!m', '12');
            $prev_link = '?y=' . ($year-1) . '&m=12';
        } else {
            $lastMonthObj = $this->getMonth($year, $month-1);
            $prevMonth = DateTime::createFromFormat('!m', $month-1);
            $prev_link = '?y=' . $year . '&m='. $prevMonth->format('m');
        }
        if ($month == '12'){
            $nextMonthObj = $this->getMonth($year+1, '01');
            $nextMonth = DateTime::createFromFormat('!m', '01');
            $next_link = '?y=' . ($year+1) . '&m=01';
        } else {
            $nextMonthObj = $this->getMonth($year, $month+1);
            $nextMonth = DateTime::createFromFormat('!m', $month+1);
            $next_link = '?y=' . $year . '&m='. $nextMonth->format('m');
        }
        $dt = DateTime::createFromFormat('!m', $month);
        $calendar = "<table class='calendar_wrapper' cellspacing='0' cellpadding='0' border='0'>
                     <tr><td class='nav_left'>
                     <a href='$prev_link'><</a>
                     </td><td>";

        $calendar .= "<table class='calendar_table' cellspacing='01'>";
        $calendar .= "<tr class='calendar_header'><th></th><th colspan='8'>" . strftime($dt->format('F')) . " &ndash; " . $monthObj['year'] . "<br>";
        $calendar .= "<tr class='subheader'><th class='week'><th>Må</th><th>Ti</th><th>On</th>
                     <th>To</th><th>Fr</th><th>Lö</th><th>Sö</th></tr>";

        $calendar .= "</tr>";
        foreach ($monthObj['days'] as $day) {

            $weekday_no = $day['weekday_number'];

            // Skriver ut vecka
            if ($day['weekday_number'] == 1 || $day['date'] == '01') {
                $calendar .= "<tr><td class='week_td'>v." . $day['week'] . "</td>";
            }


            

            // Skriver ut föregående månads veckodagar
            if ($day['date'] == '01') {
                if ($day['weekday_number'] == '0') {
                    $weekday_no = 7;
                }
                for ($i = 0; $i < $weekday_no -1; $i++) {
                    $val = $lastMonthObj['no_of_days'] - ($weekday_no-2)+$i;
                    $calendar .= "<td class='prev_or_next_month_td'>" .
                    "<span class='day_number'>" . $lastMonthObj['days'][$val]['date'] .
                    "</span></td>";
                }
            }

            // Röd eller ordinarie veckodag?
            if ($day['weekday_number'] == '0' || $day['holiday'] == true) {
                $calendar .= "<td class='red_day'>";
            } else {
                $calendar .= "<td>";
            }
        
            $calendar .= "<span class='day_number'>" . $day['date'] . "</span><br>";
            $calendar .= "</span>";
            
            $calendar .= "</td>";
            // Skriver ut nästa månads dagar
            if ($day['date'] == $monthObj['no_of_days'] && $day['weekday_number'] != 0) {
                $date = 1;
                for ($i = 6; $i >= $day['weekday_number']; $i--) {
                    
                    // dd($nextMonthObj);  
                    $calendar .= "<td class='prev_or_next_month_td'>" .
                    "<span class='day_number'>" . $nextMonthObj['days']['0' . $date]['date'] .
                    "</span></td>";
                    $date++;
                }
            }
        }
        
        $calendar .= "</tr></table></td>
                    <td class='nav_right'>
                    <a href='$next_link'>></a>
                    </td>
                    </table>";

        return $calendar;
    }
}
