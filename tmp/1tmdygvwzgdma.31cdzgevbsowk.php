<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet"  type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="stylesheets/profile.css">
    <title>Profile</title>
</head>
<body>
<nav class="navbar navbar-light bg-light">
    <a href="profile"><span class="navbar-brand mb-0 h1">QuickTrip Profile</span></a>
    <a href="logout"><span class="navbar-brand mb-0 h1">Logout</span></a>
</nav>

<div class="card m-5">
    <!-- User Page -->
    <div class="p-2 border rounded m-5">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="#" id="trav">Traveler Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" id="driver">Driver Profile</a>
            </li>
            </li>
        </ul>
        <div class="text-center">
            <a href="appointment" class="btn btn-primary mt-1 traveler">Book A QuickTrip</a>
        </div>
        <div class="form-row ml-2 mt-2">



            <!--Driver Information--------------------------------------------------------------------------------->
            <?php if ($SESSION['member'] instanceof User_Driver): ?>
                

                    <!--Left Side -->
                    <div class="col-md-6  border rounded p-2 d-none driver border-bottom-0">
                        <h2 class="border-bottom col">Driver Information <span id="proSuccess" class="text-success"></span></h2>
                        <hr>
                        <p id="city">City : <?= ($SESSION['member']->getCity()) ?></p>
                        <hr>
                        <p id="state">State : <?= ($SESSION['member']->getState()) ?></p>
                        <hr>
                        <p>Driver Rating: <?= ($SESSION['member']->echoRating($SESSION['member']->getRating())) ?></p>
                        <hr>
                        <p id="bio">Bio: <?= ($SESSION['member']->getBio()) ?></p>
                        <div class="text-center">
                        <img src="<?= ($SESSION['member']->getProfilePic()) ?>" alt="Profile Pic" height="200" width="200">
                        </div>
                    </div>


                    <!--Right Side -->
                    <div class="col-md-6  border rounded p-2 d-none driver border-bottom-0">
                        <h2 class="border-bottom col">Car Information <span id="carSuccess" class="text-success"></span></h2>
                        <hr>
                        <p id="make">Car Make: <?= ($SESSION['member']->getCarMake()) ?></p>
                        <hr>
                        <p id="model">Car Model: <?= ($SESSION['member']->getCarModel()) ?></p>
                        <hr>
                        <p id="years">Car Year: <?= ($SESSION['member']->getCarYear()) ?></p>
                        <hr>
                        <div class="text-center">
                           <img src="<?= ($SESSION['member']->getCarPic()) ?>" alt="Car Pic" height="200" width="200">
                        </div>
                    </div>

                    <!--Buttons Left-->
                    <div class="col-md-6  border rounded p-2 d-none driver border-top-0">
                        <div class="text-center">
                            <br>
                            <a id="proButton" class="btn btn-primary btn-lg btn-lg text-white" role="button"
                               data-toggle="modal" data-target="#modalLoginForm1">Edit Driver Information</a>
                        </div>
                    </div>

                    <!--Buttons Right-->
                    <div class="col-md-6  border rounded p-2 d-none driver border-top-0">
                        <div class="text-center">
                            <br>
                            <a id="carButton" class="btn btn-primary btn-lg btn-lg text-white" role="button"
                               data-toggle="modal" data-target="#modalLoginForm">Edit Car Information</a>
                        </div>
                    </div>

                
                <?php else: ?>
                    <div class="col-md-12 border rounded p-2 driver text-center d-none">
                        <a  class="btn btn-primary" href="/driver">Become A Driver</a>
                    </div>
                
            <?php endif; ?>


            <!--Traveler----------------------------------------------------------------------->
            <div class="col-md border rounded p-2 traveler">
                <div class="form-row">
                    <p id="Names">Name: <?= ($SESSION['member']->getFname()) ?> <?= ($SESSION['member']->getLname()) ?></p>
                    <a class="pl-1 pr-1 text-primary pointer" role="button"
                            data-toggle="modal" data-target="#modalLoginForm2">Edit</a>
                </div>
                <a class="text-success" id="nameSuccess"></a>
                <hr>
                <div class="form-row">
                    <p id="emails">Email: <?= ($SESSION['member']->getEmail()) ?></p>
                    <a id="email" class="pl-1 pr-1 text-primary pointer" role="button"
                       data-toggle="modal" data-target="#modalLoginForm3">Edit</a>
                </div>
                <a class="text-success" id="emailSuccess"></a>
                <hr>
                <div class="form-row">
                    <p id="interests">Interests:
                        <?php if ($SESSION['member']->getInterests()!=null): ?>
                            <?= (implode(",",$SESSION['member']->getInterests()))."
" ?>
                        <?php endif; ?>
                    </p>
                </div>
                <hr>
                <p>User Rating: <?= ($SESSION['member']->echoRating($SESSION['member']->getUserRating())) ?></p>
                <hr>
                <button id="passUpdate" class="btn btn-primary" role="button"
                        data-toggle="modal" data-target="#modalLoginForm4">Update Password</button>
            </div>
        </div>


        <!--Driver Appointments TODO-->
        <div class="col-md  border rounded p-2 d-none driver"></div>
    </div>
    </div>

<!--Car Edit Modal-->
<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Car Information</h4>
                <button type="button" id="closeCar" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                <div class="md-form mb-5">
                    <input type="text" id="carMake" class="form-control validate" value="<?= ($SESSION['member']->getCarMake()) ?>">
                    <label data-error="wrong" data-success="right" for="carMake">Car Make</label>
                </div>
                <div class="md-form mb-5">
                    <input type="text" id="carModel" class="form-control validate" value="<?= ($SESSION['member']->getCarModel()) ?>">
                    <label data-error="wrong" data-success="right" for="carModel">Car Model</label>
                </div>
                <div class="md-form mb-5">
                    <select class="form-control" id="year" name="year" value="<?= ($SESSION['member']->getCarYear()) ?>">
                        <?php foreach (($years?:[]) as $key=>$value): ?>
                            <option value='<?= ($value) ?>'
                            <?php if ($SESSION['member']->getCarYear() == $value): ?>
                                selected
                            <?php endif; ?>
                            ><?= ($value) ?></option>
                        <?php endforeach; ?>
                    </select>
                    <label data-error="wrong" data-success="right" for="carMake">Car Year</label>
                </div>
                <span id="carErr" class="text-danger"></span>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button id="btn" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</div>



<!--Driver Edit Modal-->
<div class="modal fade" id="modalLoginForm1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Driver Information</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="proClose">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!--Start of form-->
            <div class="modal-body mx-3">
                <div class="md-form mb-5">
                    <strong><label for="countryId">Choose a Country</label></strong>
                    <select name="country" class="custom-select countries order-alpha include-US presel-byip  group-continents group-order-alpha"
                            id="countryId">
                        <option value="">
                            <?php if (isset($POST['country'])): ?>
                                Select Counry
                                <?php else: ?><?= ($POST['country']) ?>
                            <?php endif; ?>
                        </option>
                    </select>
                </div>

                <div class="md-form mb-5">
                    <strong><label for="stateId">Choose a State</label></strong>
                    <select name="state" class="custom-select states order-alpha" id="stateId">
                        <option value="">Select State</option>
                    </select>
                </div>

                <div class="md-form mb-5">
                    <strong><label for="cityId">Choose a City</label></strong>
                    <select name="city" class="custom-select cities order-alpha" id="cityId">
                        <option value="">Select City</option>
                    </select>
                </div>

                <div class="md-form mb-5">
                    <label class="font-weight-bold" for="bios">Biography</label>
                    <textarea class="form-control" id="bios" name="bio" rows="6"><?= ($SESSION['member']->getBio()) ?></textarea>
                    <span id="proErr" class="text-danger"></span>
                </div>
            </div>

            <div class="modal-footer d-flex justify-content-center">
                <button id="btn1" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</div>



<!--Name Edit Modal-->
<div class="modal fade" id="modalLoginForm2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Update Name</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="firstClose">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!--Start of form-->
            <div class="modal-body mx-3">
                <!--Get the First Name-->
                <div class="md-form mb-5">
                    <label class="font-weight-bold" for="fname">First Name</label>
                    <input type="text" class="form-control" id="fname" name="fname"
                           placeholder="Enter First Name Here" value="<?= ($SESSION['member']->getFName()) ?>">
                </div>
                <div class="md-form mb-5">
                    <label class="font-weight-bold" for="lname">Last Name</label>
                    <input type="text" class="form-control" id="lname"  name="lname"
                           placeholder= "Enter Last Name Here" value="<?= ($SESSION['member']->getLName()) ?>">
                    <span id="nameErr" class="text-danger"></span>
                </div>
            </div>

            <div class="modal-footer d-flex justify-content-center">
                <button id="btn2" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</div>


<!--Email Edit Modal-->
<div class="modal fade" id="modalLoginForm3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Update Email</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="emailClose">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!--Start of form-->
            <div class="modal-body mx-3">
                <div class="md-form mb-5">
                    <!--Get the Email-->
                    <label class="font-weight-bold" for="email">Email</label>
                    <input type="email" class="form-control" id="formEmail" name="email" placeholder="Enter Email Here"
                           value="<?= ($SESSION['member']->getEmail()) ?>">
                    <!--*******Error Span*************** -->
                    <span id="emailErr" class="text-danger"></span>
                </div>
            </div>

            <div class="modal-footer d-flex justify-content-center">
                <button id="btn3" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</div>

<!--Email Edit Modal-->
<div class="modal fade" id="modalLoginForm4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Update Password</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="passClose">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!--Start of form-->
            <div class="modal-body mx-3">
                <div class="md-form mb-5">
                    <label class="font-weight-bold" for="confirmPass">Confirm Original Password</label>
                    <input type="password" class="form-control" id="confirmPass" name="pass" placeholder="Enter a original password"
                    value="<?= ($POST['confirm']) ?>">
                </div>
                <div class="md-form mb-5">
                    <label class="font-weight-bold" for="newPass">New Password</label>
                    <input type="password" class="form-control" id="newPass" name="pass1" placeholder="Enter a new password"
                           value="<?= ($POST['pass']) ?>">
                </div>
                <div class="md-form mb-5">
                    <label class="font-weight-bold" for="newPass2">Confirm New Password</label>
                    <input type="password" class="form-control" id="newPass2" name="pass2" placeholder="Confirm new password"
                           value="<?= ($POST['pass2']) ?>">
                    <span id="passErr" class="text-danger"></span>
                </div>
            </div>

            <div class="modal-footer d-flex justify-content-center">
                <button id="btn4" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="models/js/profile.js"></script>
<script src="//geodata.solutions/includes/countrystatecity.js"></script>
</body>
</html>