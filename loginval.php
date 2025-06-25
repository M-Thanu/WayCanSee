<?php
session_start();  

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user"; 


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$user = $_POST['username'];
$pass = $_POST['password'];


$stmt = $conn->prepare("SELECT * FROM Reg_User WHERE username = ? AND password = ?");
$stmt->bind_param("ss", $user, $pass);
$stmt->execute();
$result = $stmt->get_result();


if ($result->num_rows > 0) {
    
    $jobPage = isset($_POST['jobPage']) ? $_POST['jobPage'] : 'jobs.html';
    
    
    echo "<script>window.location.href = '$jobPage';</script>";
} else {
    echo "<script>alert('Invalid username or password'); window.location.href='logIn.html';</script>";
}

$stmt->close();
$conn->close();
?>
