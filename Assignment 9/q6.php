<?php
echo "Current Date and Time: " . date("d-m-Y H:i:s") . "<br><br>";

if (isset($_POST['dob']) && !empty($_POST['dob'])) {
    $dob = $_POST['dob'];
    $now = new DateTime();

    $dobParts = explode("-", $dob); 
    $birthMonth = $dobParts[1];
    $birthDay = $dobParts[2];

    $currentYear = (int)$now->format("Y");
    $nextBirthday = DateTime::createFromFormat("Y-m-d", "$currentYear-$birthMonth-$birthDay");

    if ($nextBirthday < $now) {
        $nextBirthday->modify('+1 year');
    }

    $interval = $now->diff($nextBirthday);
    echo "Days left until next birthday: " . $interval->days;
} else {
    echo '<form method="post">
            Enter your Date of Birth: <input type="date" name="dob" required>
            <input type="submit" value="Calculate">
          </form>';
}
?>
