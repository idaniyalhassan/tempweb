<!-- process_login.php -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    if (empty($username) || empty($password)) {
        header("Location: index.php?error=emptyfields");
        exit();
    }

    $users = file("users.txt");
    $login_success = false;

    foreach ($users as $user) {
        list($stored_username, $stored_password_hash) = explode(":", trim($user));
        if ($username === $stored_username && password_verify($password, $stored_password_hash)) {
            $login_success = true;
            break;
        }
    }

    if ($login_success) {
        echo "Login successful!";
        // You might redirect to a user dashboard or a home page here.
    } else {
        header("Location: index.php?error=invalidcredentials");
    }
    exit();
}
?>
