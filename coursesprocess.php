<?php
session_start();
    if(isset($_POST['addcourses'])) {

        foreach($_POST['courses'] as $x) {

        }

        //Insert sql into database
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

        $sql = "INSERT INTO college_enrollment (studentId, courseId)
        VALUES ('{$_SESSION['usersId']}', '{$x}')";

        if ($conn->query($sql) === TRUE) {

        header("Location: dashboard.php");
        $_SESSION['message'] = 'courseregistration';

        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();

    } else {
        echo 'Authorized staff only';
    }

?>