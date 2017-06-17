<?php

session_start(); // Starting Session
$error=''; // Variable To Store Error Message

require 'database.php';

$username=$_POST['user-txt'];
$password=sha1($_POST['pass-txt']);


$sql = "SELECT * FROM users WHERE (email='$username') AND (pass='$password');";
$result = $conn->query($sql);


if ($result->num_rows > 0)
{
//    $_SESSION['login_user']=$username; // Initializing Session
    header("Location:http://localhost/project-calendar/calendar-page.html");
}

else
{
        echo "something went wrong <br><br>";
        var_dump($password);

}

$conn->close();

//if ($result->num_rows > 0) {
//    // output data of each row
//    while($row = $result->fetch_assoc()) {
//        echo "id: " . $row["id"]. " - Name: " . $row["username"]. " " . $row["password"]. "<br>";
//    }
//} else {
//    echo "0 results";
//}
//
