<?php
/* date settings */
$month = (int) ($_GET['month'] ? $_GET['month'] : date('m'));
$year = (int)  ($_GET['year'] ? $_GET['year'] : date('Y'));

/* select month control */
$select_month_control = '';
for($x = 1; $x <= 12; $x++) {
    $select_month_control.= ''.date('F',mktime(0,0,0,$x,1,$year)).'';
}
$select_month_control.= '';

/* select year control */
$year_range = 7;
$select_year_control = '';
for($x = ($year-floor($year_range/2)); $x <= ($year+floor($year_range/2)); $x++) {
    $select_year_control.= ''.$x.'';
}
$select_year_control.= '';

/* "next month" control */
$next_month_link = '<a href="$year + 1).'" rel="nofollow">Next Month >></a>';

/* "current month" control */
$current_month_link = '<a href="?month&year" rel="nofollow">Current</a>';

/* "previous month" control */
$previous_month_link = '<a href="$year - 1).'" rel="nofollow"><<   Previous Month</a>';

/* bringing the controls together */
$controls = ''.$select_month_control.$select_year_control.'       '.$previous_month_link.'     '.$current_month_link.'     '.$next_month_link.' ';


$db_link = mysql_connect("my_host", "my_username", "my_pw") or die('Cannot connect to the DB');
mysql_select_db("my_db",$db_link) or die('Cannot select the DB');

$appts = array();
$query = "SELECT patientprofiles.lastname, appointments.appt_time, appointments.appt_date FROM patientprofiles INNER JOIN appointments ON patientprofiles.patient_id = appointments.patient_id WHERE appt_date LIKE '$year-$month%' ORDER BY appt_time";
$result = mysql_query($query,$db_link) or die('cannot get results!');
while($row = mysql_fetch_assoc($result)) {
    $appts[$row['appt_date']][] = $row;
}


/* draws a calendar */
function draw_calendar($month,$year,$appts){

    /* draw table */
    $calendar = '';

    /* table headings */
    $headings = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
    $calendar.= ''.implode('',$headings).'';

    /* days and weeks vars now ... */
    $running_day = date('w',mktime(0,0,0,$month,1,$year));
    $days_in_month = date('t',mktime(0,0,0,$month,1,$year));
    $days_in_this_week = 1;
    $day_counter = 0;
    $dates_array = array();

    /* row for week one */
    $calendar.= '';

    /* print "blank" days until the first of the current week */
    for($x = 0; $x < $running_day; $x++):
        $calendar.= ' ';
        $days_in_this_week++;
    endfor;
    /* keep going with days.... */
    for($list_day = 1; $list_day <= $days_in_month; $list_day++):
        $calendar.= '';
        if ($list_day == date('j') && $month == date('m'))
            $calendar.= ''.$list_day.'';
        else
            /* add in the day number */
            $calendar.= ''.$list_day.'';

        $appt_day = $year.'-'.$month.'-'.$list_day;
        if(isset($appts[$appt_day])) {
            foreach($appts[$appt_day] as $appt) {
                $calendar.=''.$appt['appt_date'].'';
            }
        }

        else {
            /** QUERY THE DATABASE FOR AN ENTRY FOR THIS DAY !!  IF MATCHES FOUND, PRINT THEM !! **/
            $calendar.= str_repeat(' ',2);
        }
        $calendar.= '';
        if($running_day == 6):
            $calendar.= '';
            if(($day_counter+1) != $days_in_month):
                $calendar.= '';
            endif;
            $running_day = -1;
            $days_in_this_week = 0;
        endif;
        $days_in_this_week++; $running_day++; $day_counter++;
    endfor;

    /* finish the rest of the days in the week */
    if($days_in_this_week < 8):
        for($x = 1; $x <= (8 - $days_in_this_week); $x++):
            $calendar.= ' ';
        endfor;
    endif;

    /* final row */
    $calendar.= '';

    /* end the table */
    $calendar.= '';

    /* all done, return result */
    return $calendar;
}

?>
