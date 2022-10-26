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

    <title>Registration</title>
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
    <section class="vh-200 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <div class="mb-md-5 mt-md-4 pb-5">
                                <h1>Registration</h1>
                                <p class="text-white-50 mb-5">Sign up today!</p>

                                <form action = "signupprocess.php" method = "POST">
                                    <div class="form-outline form-white mb-4">
                                        <!--<label for="firstname" class="form-label" >First Name:</label>-->
                                        <input type="text" class="form-control form-control-lg" placeholder="Enter first name" id="firstname" name = "usersFirst" required>
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <!--<label for="lastname" class="form-label" >Last Name:</label>-->
                                        <input type="text" class="form-control form-control-lg" placeholder="Enter last name" id="lastname" name = "usersLast" required>
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <!--<label for="email" class="form-label" >Email:</label>-->
                                        <input type="email" class="form-control form-control-lg" placeholder="Enter email" id="usersEmail" name = "usersEmail" required>
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <!--<label for="street">Home Address:</label>-->
                                        <input type="text" class="form-control form-control-lg" placeholder="Street address 1" id="street" name = "street1" required>
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <!--<label for="unit">Unit number, if any:</label>-->
                                        <input type="text" class="form-control form-control-lg" placeholder="Street address 2" id="unit" name = "street2">
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <!--<label for="city">City:</label>-->
                                        <input type="text" class="form-control form-control-lg" placeholder="City" id="city" name = "city" required>
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <!--<label for="states">State:</label>-->

                                        <select name = "states" class = "form-control-lg" id = "states">
                                            <?php
                                            //dropdowns with php arrays
                                            $states = array('Alabama', 'Alaska', 'Arizona', 'Arkansas', 'California', 'Colorado', 'Connecticut', 'Delaware', 'Florida', 'Georgia', 'Hawaii', 'Idaho', 'Illinois', 'Indiana', 'Iowa', 'Kansas', 'Kentucky', 'Louisiana', 'Maine', 'Maryland', 'Massachusetts', 'Michigan', 'Minnesota', 'Mississippi', 'Missouri', 'Montana','Nebraska','Nevada','New Hampshire','New Jersey','New Mexico','New York','North Carolina','North Dakota','Ohio', 'Oklahoma', 'Oregon', 'Pennsylvania', 'Rhode Island', 'South Carolina', 'South Dakota','Tennessee', 'Texas', 'Utah', 'Vermont', 'Virginia', 'Washington', 'West Virginia', 'Wisconsin', 'Wyoming');

                                            foreach($states as $state) {
                                            if($state == 'Florida') {
                                                echo '<option value = "'.$state.'" selected>'.$state.'</option><br>';
                                                } else {
                                                echo '<option value = "'.$state.'">'.$state.'</option><br>';
                                            }
                                        }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <!--<label for="zip">Zip Code:</label>-->
                                        <input type="number" class="form-control form-control-lg" placeholder="Zip Code" id="zip" name = "zip" required>
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <!--<label for="phone">Phone Number:</label>-->
                                        <input type="number" class="form-control form-control-lg" placeholder="Phone Number" id="phone" name = "phone" required>
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <label for="gender">Gender:</label><br>
                                        <input type = "radio" id = "male" name = "gender" value = "male"><label for = "male">Male</label>&nbsp;&nbsp;&nbsp;
                                        <input type = "radio" id = "female" name = "gender" value = "female"><label for = "female">Female</label>&nbsp;&nbsp;&nbsp;
                                        <input type = "radio" id = "other" name = "gender" value = "other"><label for = "other">Other</label>
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <label for="gender">Do you agree to the terms? |&nbsp;</label><a href = "#">Terms amd Conditions</a><br>
                                        <input type = "radio" id = "yes" name = "agree" value = "yes"><label for = "male" required>Yes</label>&nbsp;&nbsp;&nbsp;
                                        <input type = "radio" id = "no" name = "agree" value = "no"><label for = "female">No</label>&nbsp;&nbsp;&nbsp;
                                    </div>

                                    <button class="btn btn-outline-light btn-lg px-5" type = "submit" name = "signup">Sign Up</button><br>
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