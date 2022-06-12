<?php
if(isset($_POST['submit'])){
    $username = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

registerUser($username , $email , $password);

}

function registerUser($username, $email, $password){
    //save data into the file
    
$open_file = fopen("../storage/users.csv ", "a");
$str = strtolower($email);
$data = array(
    "fullname" => $username ,
    "email" => $str ,
    "password" => $password
);
// $data = implode(",\n ", $userdata);
fputcsv($open_file , $data );
    echo "User Successfully registered";
}
// echo "HANDLE THIS PAGE";


