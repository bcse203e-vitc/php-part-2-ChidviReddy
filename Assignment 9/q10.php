<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$inputFile = __DIR__ . "/students.txt";
$errorFile = __DIR__ . "/errors.log";

if (!file_exists($inputFile)) {
    die("students.txt not found.");
}

$lines = file($inputFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

echo "<h3>Valid Student Records</h3>";
echo "<table border='1' cellpadding='8' cellspacing='0' style='border-collapse: collapse; text-align:left;'>";
echo "<tr><th>Name</th><th>Email</th><th>Age</th></tr>";

$invalidRecords = [];

foreach ($lines as $line) {
    $parts = explode(",", $line);

    if (count($parts) != 3) {
        $invalidRecords[] = $line;
        continue;
    }

    $name = trim($parts[0]);
    $email = trim($parts[1]);
    $dob = trim($parts[2]);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $invalidRecords[] = $line;
        continue;
    }

    $dobDate = DateTime::createFromFormat("Y-m-d", $dob);
    if (!$dobDate) {
        $invalidRecords[] = $line;
        continue;
    }

    $today = new DateTime();
    $age = $today->diff($dobDate)->y;

    echo "<tr>";
    echo "<td>" . htmlspecialchars($name) . "</td>";
    echo "<td>" . htmlspecialchars($email) . "</td>";
    echo "<td>" . $age . "</td>";
    echo "</tr>";
}

if (!empty($invalidRecords)) {
    file_put_contents($errorFile, implode(PHP_EOL, $invalidRecords) . PHP_EOL);
}

echo "</table>";

if (!empty($invalidRecords)) {
    echo "<br>Invalid records saved to errors.log";
} else {
    echo "<br>No invalid records found.";
}
?>
