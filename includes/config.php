<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "nkhn";
$enckey = "LKAJShdliw9euq0p2523!-0-098";

function encrypt_decrypt($action, $string, $key) {
    $output = false;
    $iv = '1234567890123456'; // Fixed IV

    if($action == 'encrypt') {
        $output = openssl_encrypt($string, 'AES-256-CBC', $key, 0, $iv);
        $output = base64_encode($output);
    }
    else if($action == 'decrypt') {
        $string = base64_decode($string);
        $output = openssl_decrypt($string, 'AES-256-CBC', $key, 0, $iv);
    }
    return $output;
}


$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
