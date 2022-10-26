<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Courses</title>
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
    <section class="vh-50 gradient-custom">
        <div class="container py-5 h-200">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-12">

                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5">
                            <div class="mb-md-5 mt-md-4 pb-5">

                                <h1>Course Registration</h1>
                                <p class="text-white-50 mb-5">Select your courses:</p>
                                <form action = "coursesprocess.php" method = "POST">
                                <table class = "text-white table">
                                <tr>
                                    <th></th>
                                    <th>Course Code</th>
                                    <th>Course Name</th>
                                    <th>Course Details</th>
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

                                    $sql = "SELECT * FROM college_courses WHERE published = '1'";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {

                                    //check if already registered to disable checkbox
                                        $sql2 = "SELECT * FROM college_enrollment WHERE studentId = '{$_SESSION['usersId']}' AND courseId = '$row[courseId]'";
                                        $result2 = $conn->query($sql2);

                                        $alreadyenrolled = "";
                                        if ($result2->num_rows > 0) {
                                        // output data of each row
                                        while($row2 = $result2->fetch_assoc()) {
                                            $alreadyenrolled = 'disabled';
                                            $alreadyenrolledmessage = '<span style = "color:orange"><br>Already enrolled</span>';
                                        }
                                        } 
                                ?>

                                <tr>
                                    <td><input type = "checkbox" name = "courses[]" value = "<?=$row['courseId']?>" 
                                    <?php 
                                    if($alreadyenrolled == 'disabled') { echo $alreadyenrolled; }
                                    ?>
                                    >
                                    <?php 
                                    if($alreadyenrolled == 'disabled') { echo $alreadyenrolledmessage; }
                                    ?>

                                    </td>
                                    <td><?=$row['courseCode']?><?=$row['courseNumber']?></td>
                                    <td><strong><?=$row['courseName']?></strong></td>
                                    <td>Instructor: <?=$row['instructor']?><br>
                                    Level: <?=$row['courseLevel']?><br>
                                    Tuition: <?=$row['tuition']?><br>
                                    Credits: <?=$row['credits']?><br>
                                    Days: <?=$row['days']?><br>
                                    Time: <?=$row['startTime']?>-<?=$row['endTime']?><br><br>
                                    Description: <?=$row['courseDesc']?></td>

                                </tr>

                                <?php
                                }
                                } else {
                                echo "0 results";
                                }
                                $conn->close();
                                ?>
                                </table>
                                <button class = "btn btn-light" type = "submit" name = "addcourses">Add courses</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>