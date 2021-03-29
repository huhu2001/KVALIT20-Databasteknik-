<!DOCTYPE html>
<html>
<body>

<?php


//prints the week
echo "Vecka"." ".date("W")."-";

date_default_timezone_set("Europe/Stockholm");


//prints the date och time
$svweekday = "";
$svmonth = "";

$arr = getdate();

//convert to Swedish.
switch ($arr['weekday']) {
    case "Monday":
        $svweekday = "Måndag";
        break;
    case "Tuesday":
        $svweekday = "Tisdag";
        break;
    case "Wednesday":
        $svweekday = "Onsdag";
        break;
    case "Thursday":
        $svweekday = "Torsdag";
        break;
    case "Friday":
        $svweekday = "Fredag";
        break;
    case "Saturday":
        $svweekday = "Lördag";
        break;
    case "Sunday":
        $svweekday = "Söndag";
        break;
}

switch ($arr['month']) {
    case "January":
        $svmonth = "Januari";
        break;
    case "February":
        $svmonth = "Februari";
        break;
    case "March":
        $svmonth = "Mars";
        break;
    case "April":
        $svmonth = "April";
        break;
    case "May":
        $svmonth = "Maj";
        break;
    case "June":
        $svmonth = "Juni";
        break;
    case "July":
        $svmonth = "Juli";
        break;
    case "August":
        $svmonth = "Augusti";
        break;
    case "September":
        $svmonth = "September";
        break;
    case "October":
        $svmonth = "Oktober";
        break;
    case "November":
        $svmonth = "November";
        break; 
    case "December":
        $svmonth = "December";
        break;          
}





echo   $svweekday." "."den". " " .$arr['mday'] . " ".$svmonth." " . $arr['year']." ";
//Array about date
echo  "Kl."." ".$arr['hours'] . ":". $arr['minutes'];





?>

</body>
</html> 