<!--
Title:GRC/IT328/Dating App/personal.html
Author: Robert Hill, III
Date: 04.18.2019
Code Version: V1.0
Availability: http://rhill.greenriverdev.com/328/datingB/cap
-->
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>QuickTrip App</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles/styles.css" type="text/css" lang="en">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="stylesheets/profile.css">
</head>
<body>
<!-- The Heading -->
<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand mb-0 h1" href="./"><span>QuickTrip Website</span></a>
</nav>
<br>
<!-- Cards Side by Side-->
<div class="container">
    <div class="col-sm-12">
        <div class="card" id="personalInfoCard" style="padding: 5%;">
            <h1 class="aTitle">Traveler Information</h1>
            <hr>
            <div class="row">
                <!--First Fields-->
                <div class="col-sm-8" id="personFields">
                    <!--POST user Inputs from Route-->
                    <form action="#" method="post"
                          id="perForm" name="formName"
                          value="Personal Information"
                          enctype="multipart/form-data">

                        <!--Get the First Name-->
                        <div class="form-group">
                            <label class="font-weight-bold" for="fname">First Name</label>
                            <input type="text" class="form-control" id="fname" name="fname"
                                   placeholder="Enter First Name Here" value="<?= ($POST['fname']) ?>">
                            <!--*******Error Span*************** -->
                            <span class="text-danger"><?= ($errors['fnameErr']) ?></span>
                        </div>

                        <!--Get the Last Name-->
                        <div class="form-group">
                            <label class="font-weight-bold" for="lname">Last Name</label>
                            <input type="text" class="form-control" id="lname"  name="lname"
                                   placeholder= "Enter Last Name Here" value="<?= ($POST['lname']) ?>">
                            <!--*******Error Span*************** -->
                            <span class="text-danger"><?= ($errors['lnameErr']) ?></span>
                        </div>

                        <!--Get user Phone#-->
                        <div class="form-group mt-1">
                            <label class="font-weight-bold"  for="phone">Phone Number</label>
                            <input type="tel" class="form-control" id="phone" name="phone" placeholder="222-333-4444"
                            value="<?= ($POST['phone']) ?>">
                            <!--*******Error Span*************** -->
                            <span class="text-danger"><?= ($errors['phoneErr']) ?></span>
                        </div>

                        <!--Get user Email-->
                        <div class="form-group">
                            <label class="font-weight-bold" for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email Here"
                            value="<?= ($POST['email']) ?>">
                            <!--*******Error Span*************** -->
                            <span class="text-danger"><?= ($errors['emailErr']) ?></span>
                        </div>

                        <!-- Create Password -->
                        <div class="form-group">
                            <label class="font-weight-bold" for="pass">Password</label>
                                <a class="pl-1 pr-1 text-primary pointer" data-toggle="modal" data-target="#exampleModal">
                                     View Password Requirements
                                </a></label>
                            <input type="password" class="form-control" id="pass" name="pass" placeholder="Enter a new password"
                            value="<?= ($POST['pass']) ?>">
                            <!--*******Error Span*************** -->
                            <span class="text-danger"><?= ($errors['passErr']) ?></span>
                        </div>

                        <!--Confirm Password-->
                        <div class="form-group">
                            <label class="font-weight-bold" for="pass1">Confirm Password</label>
                            <input type="password" class="form-control" id="pass1" name="pass1" placeholder="Confirm password"
                            value="<?= ($POST['pass1']) ?>">
                            <!--*******Error Span*************** -->
                            <span class="text-danger"><?= ($errors['pass1Err']) ?></span>
                        </div>

                        <!--Checks if user wants to be a driver-->
                        <label class="font-weight-bold" for="premium">Become A Driver</label>
                        <div class="form-check" id="premium">
                            <input class="form-check-input" type="checkbox" value="" id="driver" name="driver"
                            <?php if (isset($POST['driver'])): ?>
                                checked
                            <?php endif; ?>
                            >
                            <label class="form-check-label" for="driver">
                                I want to apply to be a driver!
                            </label>
                        </div>
                    </form>
                </div>

                <!--Second Fields-->
                <div class="col-sm-4" id="postPerForm">
                    <!--EULA -->
                    <div class="alert alert-secondary" role="alert">
                        <p class="text-center">
                            <strong>Note:</strong> All information entered is protected by our <a href="#" class="alert-link">privacy policy</a>. Profile information can only be viewed by others with your permission.
                        </p>
                        <p><strong>Users must be at least 21 years of age to use the QuickTrip service.</strong>
                            <label class="font-weight-bold" for="eula"></label>
                        <div class="form-check" id="eula">
                            <input class="form-check-input" type="checkbox" value="" id="consent" name="consent" required
                                   form="perForm"
                            <?php if (isset($POST['consent'])): ?>
                                checked
                            <?php endif; ?>
                            >
                            <label class="form-check-label" for="consent">
                                I have read the Quick Trip user, (travelers, and drivers) agreements, and I am
                                at least 21 years old.
                            </label>
                        </div>
                        </p>
                    </div>
                    <br>
                    <br>
                    <!--SUBMIT POST to Route button-->
                    <div class="container text-right" style="position: absolute; bottom: 0px; padding-right: 10%;">
                        <button type="submit" class="btn btn-primary btn-lg" form="perForm">Next></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Password Requirements</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h6>Password Must Contain:</h6>
                <p>One UpperCase Letter</p>
                <p>One LowerCase Letter</p>
                <p>One Special Character</p>
                <p>One number</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
</body>
</html>