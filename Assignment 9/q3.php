<?php
$emails = [
    "chidvi@example.com",
    "wrong-email@",
    "me@site",
    "user123@gmail.com",
    "hello.world@domain.org",
    "invalid@domain,com"
];

$pattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";

echo "<b>Valid Email Addresses:</b><br>";

foreach ($emails as $email) {
    if (preg_match($pattern, $email)) {
        echo $email . "<br>";
    }
}
?>
