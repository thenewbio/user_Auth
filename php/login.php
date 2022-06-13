<?php
//get user input
$email = $_POST['email'];
$password = $_POST['password'];

$path = "../storage/users.csv"; //file path
$open = fopen($path, "r");
$file = file_get_contents("../storage/users.csv");

session_start();
$csv = array_map('str_getcsv', file('../storage/users.csv'));
$column_name = array_column($csv, 0);
$column_email = array_column($csv, 1);
$column_password = array_column($csv, 2);
$search = array_search($email, $column_email);
$search_password = array_search($password, $column_password);

//save the row where the user is present in the variable
$row = ($csv[$search]);
//extract only the name and stored in a session variable
$_SESSION['user'] = ($row[0]);
//extract only the email
$db_email = ($row[1]);
//extract only the password
$db_password = ($row[2]);

if ($db_email == $email and $db_password == $password) {
    echo '<script>alert("Welcome ' . $_SESSION['user'] . ' ");
              window.location="../dashboard.php";
              </script>';
} else {
    echo '<script>alert("Invalid Username or Password");
              window.location="../forms/login.html";
              </script>';

}