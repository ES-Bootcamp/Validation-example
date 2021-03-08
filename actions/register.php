<?php 
session_start();
$firstname = $_POST['firstname']; 
$lastname = $_POST['lastname'];
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL); // string --> sanitization (remove special characters)
$address = $_POST['address'];
// $receive_updates = $_POST['receive_updates'] ?? false;
$_SESSION['old'] = $_POST;

$errors = [];

// verify firstname
if(!isset($firstname)) {
    $errors['firstname'] = [];
    $errors['firstname'][] = "Please provide a valid name!";
}
if(strlen($firstname) < 3) {
    $errors['firstname'][] = "The firstname must be at least 3 characters!<br>";
}
// verify lastname
if(!isset($lastname)) {
    $errors['lastname'] = [];
    $errors['lastname'][] = "Please provide a valid lastname!<br>";
}
if(strlen($lastname) < 3) {
    $errors['lastname'][] = "The lastname must be at least 3 characters!<br>";
}

// verify email
if(filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    $errors['email'] = [];
    $errors['email'][] = "Please provide a valid email address<br>";
}

// validate address
if(!isset($address)) {
    $errors['address'] = [];
    $errors['address'][] = "Please enter your address<br>";
}
if(strlen($address) < 5) {
    $errors['address'][] = "Please provide a valid address<br>";
}

if(count($errors) > 0) {
    $_SESSION['errors'] = $errors;
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}else{
    // write your registration login here !
    echo "No errors. you should all be set!";
}