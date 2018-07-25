<?php
date_default_timezone_set("Asia/Jakarta");
$dates = date("Y-m-d H:i:s");
$dates = date_create($dates);
date_add($dates,date_interval_create_from_date_string('-2 days -12hours'));
echo $date_point= date_format($dates, 'Y-m-d H:i:s');