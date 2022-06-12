<?php
if(isset($_POST['submit'])){
    $email = $_POST['email'];  //complete this;
    $newpassword = $_POST['password'];//complete this;

    resetPassword($email, $password);
}

function resetPassword($email, $password){
    //open file and check if the username exist inside
    //if it does, replace the password
    $success = false;
    $myfile = '../storage/users.csv';

    if (($handle1 = fopen($myfile, "r")) !== FALSE) {
            while (($data = fgetcsv($handle1, 1000, ",")) !== FALSE) {
               // Alter your data
             if(  $data[1] == $email){
                $data[1] = $email;
                $data[2] = $password;
             } else{
                echo "user does not exist";
             }        
               // Write back to CSV format
               
            } if (($handle2 = fopen($myfile, "w")) !== FALSE) {
                  $data = array($data[0],$data[1],$password);
                  fputcsv($handle1, $data);
                }
            fclose($handle2);
        }
        
    }
  

// echo "HANDLE THIS PAGE";


