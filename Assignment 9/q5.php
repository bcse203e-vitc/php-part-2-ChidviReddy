<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$logFile = "access.log";

function writeLog($username, $action, $logFile) {
    $timestamp = date("Y-m-d H:i:s"); 
    $entry = "$username - $timestamp - $action" . PHP_EOL;
    file_put_contents($logFile, $entry, FILE_APPEND);
}

writeLog("admin", "Logged In", $logFile);
writeLog("chidvi", "Viewed Dashboard", $logFile);
writeLog("neethu", "Logged Out", $logFile);
writeLog("lokesh", "Changed Password", $logFile);
writeLog("prasad", "Uploaded File", $logFile);

$lines = file($logFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
if ($lines === false) {
    $lines = []; 
}

$lastFive = array_slice($lines, -5);

echo "<h3>Last 5 Log Entries</h3>";
echo "<table border='1' cellpadding='8' cellspacing='0' style='border-collapse: collapse; text-align:left;'>";
echo "<tr><th>Username</th><th>Date & Time</th><th>Action</th></tr>";

foreach ($lastFive as $log) {
    $parts = explode(" - ", $log, 3);
    echo "<tr>";
    echo "<td>" . htmlspecialchars($parts[0]) . "</td>";
    echo "<td>" . htmlspecialchars($parts[1]) . "</td>";
    echo "<td>" . htmlspecialchars($parts[2]) . "</td>";
    echo "</tr>";
}

echo "</table>";
?>
