<?php
$students = [
    "Rahul" => 85,
    "Prasad" => 92,
    "Arun"  => 78,
    "Lokesh" => 95,
    "Neethu" => 88,
    "Chidvi" => 90
];

arsort($students);

echo "<table border='1' cellpadding='8' cellspacing='0' style='border-collapse: collapse; text-align: center;'>";
echo "<tr><th>Rank</th><th>Name</th><th>Marks</th></tr>";

$rank = 1;
foreach ($students as $name => $marks) {
    if ($rank > 3) break;  
    echo "<tr><td>$rank</td><td>$name</td><td>$marks</td></tr>";
    $rank++;
}

echo "</table>";
?>
