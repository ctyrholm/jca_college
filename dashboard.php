<?php
session_start();
if(!isset($_SESSION['usersId'])) {
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">


    <title>Dashboard</title>
    <style>
        .gradient-custom {
            /* fallback for old browsers */
            background: #6a11cb;

            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));

            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1))
            }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="http://jca.ctyrholm.opalstacked.com/projects/college/index.php">College Website</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mynavbar">
        <ul class="navbar-nav me-auto">

            <li class="nav-item">
            <a class="nav-link" href="http://jca.ctyrholm.opalstacked.com/projects/college/dashboard.php">Dashboard</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="http://jca.ctyrholm.opalstacked.com/projects/college/courses.php">Courses</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="http://jca.ctyrholm.opalstacked.com/projects/college/logout.php">Logout</a>
            </li>

        </ul>
        <span class="text-white nav-item">Welcome, <?=$_SESSION['usersFirst']?>&nbsp&nbsp&nbsp&nbsp&nbsp</span>

        <form class="d-flex">
            <input class="form-control me-2" type="text" placeholder="Search">
            <button class="btn btn-primary" type="button">Search</button>
        </form>
        </div>
    </div>
    </nav>
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-12">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5">
                            <div class="mb-md-5 mt-md-4 pb-5">
                            <h1>Welcome, <?=$_SESSION['usersFirst']?></h1>
                            <?php
                            if(isset($_SESSION['message'])) {
                                if($_SESSION['message'] == 'courseregistration') {
                                    echo '<div class="alert alert-success">
                                    <strong>Success!</strong> You have registered for courses.
                                    </div>';

                                } elseif ($_SESSION['message'] == 'deletecourse') {
                                    echo '<div class="alert alert-warning">
                                    <strong>Success!</strong> Class dropped.
                                    </div>';
                                  }
                                  unset($_SESSION['message']);
                            } 
                            ?>
                            </div>
                        </div>
                    </div>
                    <div>
                        <br>
                    </div>

                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5">
                            <div class="mb-md-5 mt-md-4 pb-5">
                            <h4>My Courses</h4>
                            <table class = "text-white table">
                            <tr>
                                        <th>Course Code</th>
                                        <th>Course Name</th>
                                        <th>Tuition</th>
                                        <th>Credits</th>
                                        <th>Drop course</th>
                        </tr>
                            <?php
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

                            $sql = "SELECT * FROM college_enrollment WHERE studentId = '{$_SESSION['usersId']}'";
                            $result = $conn->query($sql);
                            
                            if ($result->num_rows > 0) {
                              // output data of each row
                              while($row = $result->fetch_assoc()) {

                                //select from courses table using courseID of the enrollemnt table
                                        $sql2 = "SELECT * FROM college_courses WHERE courseId = '{$row['courseId']}'";
                                        $result2 = $conn->query($sql2);
                                        
                                        if ($result->num_rows > 0) {
                                        // output data of each row

                                        while($row2 = $result2->fetch_assoc()) {
                                            echo '<tr>';
                                            echo '<td>'.$row2['courseCode'].$row2['courseNumber'].'</td>';
                                            echo '<td>'.$row2['courseName'].'</td>';
                                            echo '<td>'.$row2['tuition'].'</td>';
                                            echo '<td>'.$row2['credits'].'</td>';
                                            echo '<td><button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#dropclass'.$row['courseId'].'">
                                            Drop
                                          </button></td>
                                          <!-- The Modal -->
                                                <div class="modal text-black" id="dropclass'.$row['courseId'].'">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">

                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Drop Course</h4>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                        </div>

                                                        <!-- Modal body -->
                                                        <div class="modal-body">
                                                            Are you sure?<br><br>
                                                            <form action = "dropprocess.php" method = "POST">
                                                                <input type = "hidden" name = "courseId" value = "'.$row['courseId'].'">
                                                                <input class="btn btn-primary btn-sm" type = "submit" name = "dropthisclass" value = "Yes, drop class">
                                                            </form>
                                                        </div>

                                                        <!-- Modal footer -->
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Cancel</button>
                                                        </div>

                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>';
                                            echo '</tr>';
                                        }
                                        } else {
                                        echo "0 results";
                                        }
                            }
                            } else {
                              echo "You are not enrolled in any classes.  <a href = 'http://jca.ctyrholm.opalstacked.com/projects/college/courses.php' style = 'color: orange; text-decoration: none;'>Enroll</a>";
                            }
                            $conn->close();

                            ?>
                            </table>
                            
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>