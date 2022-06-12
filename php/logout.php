<?php
session_start();
// unset($_SESSION["username"]);
// unset($_SESSION["email"]);
// header("Location:login.php");
function logout(){
    /*
Check if the existing user has a session
if it does
destroy the session and redirect to login page
*/
unset($_SESSION["username"]);
unset($_SESSION["email"]);
header("Location:login.php");

}

echo "HANDLE THIS PAGE";
