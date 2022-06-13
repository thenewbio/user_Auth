<?php

$email = $_POST['email'];
$password = $_POST['password'];

//converting csv into multidimentional array
$csv = array_map('str_getcsv', file('../storage/users.csv'));

$column_email = array_column($csv, 1);
//search the array row using the email in the email column, return the key
$search = array_search($email, $column_email);
//save the row where the user is present in the variable
$row = ($csv[$search]);
//extract only the password and replace with new password
$row[2] = $password;
//new user data in array data type
$new = $row;
// replace the array using the key(i.e $search)
$csv[$search] = $new;

// $new_csv = implode(",", $csv);

$path = "../storage/users.csv"; //file path
$open = fopen($path, "w");
foreach ($csv as $insert) {
    $confirm = fputcsv($open, $insert);
}
if ($confirm) {
    echo " <script>alert('Password Reset successful');
        window.location='../forms/login.html';
    </script>";
} else {
    echo " <script>alert('User does not exist');
        window.location='../forms/login.html';
    </script>";
}
fclose($open);
?>