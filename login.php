<?php
session_start();

require 'app/app.php';

if (isUserAuthenticated()) {
    redirect('admin/');
}

if (isPost()) {
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = sanitize($_POST['password']);
}

// compare with data store
if (authenticateUser($email, $password)) {
    $_SESSION['email'] = $email;
    redirect('admin/');
} else {
    $viewBag['status'] = 'The provided credentials are incorrect';
}

if ($email == false) {
    $viewBag['status'] = 'Please enter a valid email address';
}

view('login');
