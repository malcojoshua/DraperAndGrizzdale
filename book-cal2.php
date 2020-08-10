<?php
include('utils.php');

$month = right('0' . $_POST[month], 2);
$year = $_POST[year];
$PatientID = SQLs($_POST[PatientID]);

$firstDayOfMonth = mktime(0,0,0,$month,1,$year);
$numberDays = date('t',$firstDayOfMonth);
$dateComponents = getdate($firstDayOfMonth);
$monthName = $dateComponents['month'];
$dayOfWeek = $dateComponents['wday'];
$currentDay = 1;
wr("<tr>");
if ($dayOfWeek > 0) wr("<td class='past' colspan='$dayOfWeek'>&nbsp;</td>");
$month = str_pad($month, 2, "0", STR_PAD_LEFT);


$minBookDate = left(dateadd($maniladate, '2 days'), 10);


while ($currentDay <= $numberDays) {
 if ($dayOfWeek == 7) {
  $dayOfWeek = 0;
  wr("</tr><tr>");
 }
 $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);
 $date = "$year-$month-$currentDayRel";
 $today = ($date == $minBookDate) ? 'today' : '';
 $past = ($date < $minBookDate) ? 'past' : '';
 if ($dayOfWeek == 0 || $dayOfWeek == 6){
  wr("<td class='$past $today'>$currentDay</td>");
 } else {
  wr("<td class='$past $today'>$currentDay
   <div class='d-flex flex-column'>
   <div class='slot border-top' onclick='pick(\"$date 09:00:00\", this)'>9:00am</div>
   <div class='slot border-top' onclick='pick(\"$date 11:00:00\", this)'>11:00am</div>
   <div class='slot border-top' onclick='pick(\"$date 14:00:00\", this)'>2:00pm</div>
   <div class='slot border-top' onclick='pick(\"$date 16:00:00\", this)'>4:00pm</div>
   </div>
   </td>");
 }
 $currentDay++;
 $dayOfWeek++;
}

if ($dayOfWeek != 7) { 
 $remainingDays = 7 - $dayOfWeek;
 wr("<td class='past' colspan='$remainingDays'>&nbsp;</td>"); 
}
wr("</tr>");
?>