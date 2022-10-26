<?php
session_start();

if(isset($_POST['login'])) {


$usersEmail = $_POST['usersEmail'];
$usersPassword = $_POST['usersPassword'];
$epassword = md5($_POST['usersPassword']);

echo $usersEmail;
echo '<br>';
echo $usersPassword;
echo '<br>';
echo '$epassword';

} else {
    header("location: Login.php");
}

//check for matching password
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

    $sql = "SELECT * FROM college WHERE usersEmail = '{$_POST['usersEmail']}' LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

    // output data of each row
    while($row = $result->fetch_assoc()) {

        if($row['usersPassword'] == $epassword) {

            //set session variables
            $_SESSION['usersId'] = $row['usersId'];
            $_SESSION['usersFirst'] = $row['usersFirst'];
            $_SESSION['usersLast'] = $row['usersLast'];
            $_SESSION['usersEmail'] = $row['usersEmail'];

            //send them to a dashboard page
            header("location: dashboard.php");

        } else {
            //send back to login form
            echo 'Invalid login';
        }
    }
    echo "</table>";
    } else {
    echo "0 results";
    }
    $conn->close();


?>