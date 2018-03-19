<?php
date_default_timezone_set("Asia/Dubai");
$Currenttime = time();
$Datetime = strftime("Date:- %B - %d, %Y Time:- %H : %M : %S", $Currenttime);
echo $Datetime;
?>
