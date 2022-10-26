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

    <title>Login</title>

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
            <a class="nav-link" href="http://jca.ctyrholm.opalstacked.com/projects/college/login.php">Login</a>
            </li>
        </ul>
        <form class="d-flex">
            <input class="form-control me-2" type="text" placeholder="Search">
            <button class="btn btn-primary" type="button">Search</button>
        </form>
        </div>
    </div>
    </nav>

    <section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <div class="mb-md-5 mt-md-4 pb-5">
                            <?php
                            if(isset($_SESSION['message'])) {
                            echo '<div class="alert alert-success">
                            <strong>Success!</strong> You have created a new account. Check your email for details and login.
                            </div>';
                            unset($_SESSION['message']);
                            }
                            ?>

                            <h1 class="fw-bold mb-2 text-uppercase">Login</h1>
                            <p class="text-white-50 mb-5">Please enter your login and password!</p>

                            <form action = "loginprocess.php" method = "POST">
                                <div class="form-outline form-white mb-4">
                                    <label for="usersEmail" class="form-label">Email Address/Username:</label>
                                    <input type="text" class="form-control form-control-lg" placeholder="Enter Email" id="usersEmail" name = "usersEmail" required>
                                </div>
                                <div class="form-outline form-white mb-4">
                                    <label for="usersPassword" class="form-label">Password:</label>
                                    <input type="text" class="form-control form-control-lg" placeholder="Enter Password" id="usersPassword" name = "usersPassword" required>
                                </div>
                                <div class="form-group form-check">
                                    <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox"> Remember me
                                    </label>
                                </div>
                                    <button class="btn btn-outline-light btn-lg px-5" type = "submit" name = "login">Login</button>

                                </div>
                                <p class="mb-0">Don't have an account? <a href="http://jca.ctyrholm.opalstacked.com/projects/signup/" class="text-white-50 fw-bold">Sign Up</a>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>