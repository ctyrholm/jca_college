<?php
session_start();
echo $_POST['courseId'].'<br>';
echo $_SESSION['usersId'];

//delete from database
$servername = "localhost";
$username = "ctyrholm";
$password = "I2N1qlfUtljZ9ZUH";
$dbname = "ctyrholm";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to delete a record
$sql = "DELETE FROM college_enrollment WHERE courseId = '{$_POST['courseId']}' AND studentId = '{$_SESSION['usersId']}'";

if ($conn->query($sql) === TRUE) {
    $_SESSION['message'] = 'deletecourse';
    header("Location: dashboard.php");

} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();


?>