<?php
session_start();
    if(isset($_POST['signup'])) {

    echo $_POST['usersFirst'].'<br>';
    echo $_POST['usersLast'].'<br>';
    echo $_POST['usersEmail'].'<br>';
    echo $_POST['phone'].'<br>';    
    echo $_POST['street1'].'<br>';
    echo $_POST['street2'].'<br>';
    echo $_POST['city'].'<br>';
    echo $_POST['states'].'<br>';
    echo $_POST['zip'].'<br>';
    echo $_POST['gender'].'<br>';
    echo $_POST['agree'].'<br>';

    $userPass = rand();
    $encryptPass = md5($userPass);
    // echo $userPass.'<br>';
    // echo $encryptPass;




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

        
        $sql = "INSERT INTO college (usersFirst, usersLast, usersEmail, usersPassword, phone, street1, street2, city, states, zip, gender, agree)
        VALUES ('{$_POST['usersFirst']}', '{$_POST['usersLast']}', '{$_POST['usersEmail']}', '{$encryptPass}', '{$_POST['phone']}', '{$_POST['street1']}', '{$_POST['street2']}', '{$_POST['city']}', '{$_POST['states']}', '{$_POST['zip']}', '{$_POST['gender']}', '{$_POST['agree']}')";

        if ($conn->query($sql) === TRUE) {
            $_SESSION['message'] = 'newusercreated';

            //send email

            $to = $_POST['usersEmail'];
            $subject = "New Registration";

            $message = "
            <html>
            <head>
            <title>Welcome!</title>
            </head>
            <body>
            <p>Thank you for registering. 
            Your username is ".$_POST['usersEmail']."
            Your password is ".$userPass."
            You can login here: http://jca.ctyrholm.opalstacked.com/projects/college/login.php;
            </p>
            </body>
            </html>
            ";

            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            // More headers
            $headers .= 'From: <webmaster@example.com>' . "\r\n";

            mail($to,$subject,$message,$headers);

            header("Location: login.php");

        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();

    } else {
        echo 'Authorized staff only';
    }
    

?>