<?php
session_start();

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

  loginUser($email, $password);

}

function loginUser($email, $password){
    $success = false;
    
    $handle = fopen('../storage/users.csv', 'r');
    
    while (($data = fgetcsv($handle)) !== FALSE) {
        $str = strtolower($email);
        if ($data[1] == $str && $data[2] == $password) {
            $success = true;
            break;
        }
    }
    fclose($handle);
    
    if ($success) {
        // they logged in ok
      $_SESSION["email"] = $str;
      header("Location: dashboard.php");
    } else {
        // login failed
        header("Location: login.html");
    }


}

// echo "HANDLE THIS PAGE";

