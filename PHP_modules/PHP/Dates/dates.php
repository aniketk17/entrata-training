<?php
/*

PHP provides built-in functions to handle date and time.

IMPORTANT FUNCTIONS:
- date()         Format current date/time
- time()         Current timestamp
- strtotime()    Convert string to timestamp
- mktime()       Create custom timestamp
- date_default_timezone_set() Set timezone
*/


echo "<h2>PHP Date & Time Examples</h2>";


// 1. CURRENT DATE & TIME
echo "<h3>1. Current Date & Time</h3>";

echo "Date (Y-m-d): " . date("Y-m-d") . "<br>";
echo "Time (H:i:s): " . date("H:i:s") . "<br>";
echo "Full: " . date("Y-m-d H:i:s") . "<br><br>";


// 2. TIMESTAMP
echo "<h3>2. Timestamp</h3>";

$timestamp = time();
echo "Current Timestamp: " . $timestamp . "<br>";
echo "Readable: " . date("Y-m-d H:i:s", $timestamp) . "<br><br>";


// 3. SET TIMEZONE
echo "<h3>3. Timezone</h3>";

date_default_timezone_set("Asia/Kolkata");
echo "Indian Time: " . date("Y-m-d H:i:s") . "<br><br>";


// 4. STRING TO DATE (strtotime)
echo "<h3>4. strtotime()</h3>";

echo "Tomorrow: " . date("Y-m-d", strtotime("tomorrow")) . "<br>";
echo "Next Sunday: " . date("Y-m-d", strtotime("next sunday")) . "<br>";
echo "After 10 days: " . date("Y-m-d", strtotime("+10 days")) . "<br><br>";



// 5. CUSTOM DATE (mktime)
echo "<h3>5. mktime()</h3>";

// mktime(hour, minute, second, month, day, year)
$custom = mktime(10, 30, 0, 12, 25, 2025);
echo "Custom Date: " . date("Y-m-d H:i:s", $custom) . "<br><br>";



// 6. DATE DIFFERENCE
echo "<h3>6. Date Difference</h3>";

$date1 = strtotime("2025-01-01");
$date2 = strtotime("2025-01-10");

$diff = ($date2 - $date1) / (60 * 60 * 24);
echo "Difference in days: " . $diff . "<br><br>";



// 7. FORMAT OPTIONS
echo "<h3>7. Date Formats</h3>";

echo date("d/m/Y") . "<br>";
echo date("l") . " (Day)<br>";
echo date("F") . " (Month)<br>";
echo date("Y") . " (Year)<br><br>";



// 8. SIMPLE AGE CALCULATOR
echo "<h3>8. Age Calculator</h3>";

$birthdate = "2003-05-15";
$age = floor((time() - strtotime($birthdate)) / (60 * 60 * 24 * 365));

echo "Birthdate: $birthdate<br>";
echo "Age: $age years<br><br>";


// 9. COUNTDOWN TIMER
echo "<h3>9. Countdown Example</h3>";

$event = strtotime("2026-01-01");
$remaining = $event - time();

$days = floor($remaining / (60 * 60 * 24));
echo "Days until New Year: $days<br><br>";



/*
IMPORTANT NOTES:
1. date() formats timestamp into readable form
2. time() gives current timestamp
3. strtotime() converts text -> timestamp
4. Always set timezone
5. Use timestamps for calculations

COMMON FORMAT SYMBOLS:
- Y -> Year (2026)
- m -> Month (01-12)
- d -> Day (01-31)
- H -> Hour (00-23)
- i -> Minutes
- s -> Seconds
*/
?>