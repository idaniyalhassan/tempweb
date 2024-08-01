<!-- process_signup.php -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    if (empty($username) || empty($password)) {
        header("Location: signup.php?error=emptyfields");
        exit();
    }

    $file = fopen("users.txt", "a");
    fwrite($file, $username . ":" . password_hash($password, PASSWORD_DEFAULT) . "\n");
    fclose($file);

    header("Location: index.php?signup=success");
    exit();
}
?>
