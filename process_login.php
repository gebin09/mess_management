<?php
// Simulate checking username and password
$validUsername = "admin";
$validPassword = "admin";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === $validUsername && $password === $validPassword) {
        // Successful login
        header("Location: page1.html"); // Redirect to the next page
        exit();
    } else {
        // Invalid login
        header("Location: index.html"); // Redirect back to login page
        echo('user name or password is wrong');
        exit();
    }
}
?>
