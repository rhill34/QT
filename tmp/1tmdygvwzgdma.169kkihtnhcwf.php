<!DOCTYPE html>
<html lang="en">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<head>
    <meta charset="UTF-8">
    <title>Tourist Form</title>
</head>
<body>

<nav class="navbar navbar-light bg-light">
    <a href="./" span class="navbar-brand mb-0 h1">QuickTrip Website</span></a>
</nav>
<div class="p-2 border rounded m-5">
    <form method="post" action="basic-info">
        <div class="form-row">
            <h1 class="border-bottom col">Tourist Information</h1>
        </div>
        <div class="form-row">
            <div class="col-md-8 h-100">
                <!--String Fields -->
                <div class="form-group">
                    <label class="font-weight-bold" for="fname">First Name</label>
                    <input type="text" class="form-control" id="fname" name="fname"
                           placeholder="Enter First Name Here"
                    <?php if (isset($POST['fname'])): ?>
                        value="<?= ($POST['fname']) ?>"
                    <?php endif; ?>
                    >
                    <!--*******Error Span*************** -->
                    <span class="text-danger"><?= ($errors['fnameErr']) ?></span>
                </div>

                <div class="form-group">
                    <label class="font-weight-bold" for="lname">Last Name</label>
                    <input type="text" class="form-control" id="lname"  name="lname"
                           placeholder= "Enter Last Name Here"
                    <?php if (isset($POST['lname'])): ?>
                        value="<?= ($POST['lname']) ?>"
                    <?php endif; ?>
                    >
                    <!--*******Error Span*************** -->
                    <span class="text-danger"><?= ($errors['lnameErr']) ?></span>
                </div>

                <!-- Phone number -->
                <div class="form-group mt-1">
                    <label class="font-weight-bold"  for="phone">Phone Number</label>
                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="222-333-4444"
                    <?php if (isset($POST['phone'])): ?>
                        value="<?= ($POST['phone']) ?>"
                    <?php endif; ?>
                    >
                    <!--*******Error Span*************** -->
                    <span class="text-danger"><?= ($errors['phoneErr']) ?></span>
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label class="font-weight-bold" for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email Here"
                    <?php if (isset($POST['email'])): ?>
                        value="<?= ($POST['email']) ?>"
                    <?php endif; ?>
                    >
                    <!--*******Error Span*************** -->
                    <span class="text-danger"><?= ($errors['emailErr']) ?></span>
                </div>


                <!-- Password -->
                <div class="form-group">
                    <label class="font-weight-bold" for="pass">Password</label>
                    <input type="password" class="form-control" id="pass" name="pass" placeholder="Enter a new password"
                    <?php if (isset($POST['pass'])): ?>
                        value="<?= ($POST['pass']) ?>"
                    <?php endif; ?>
                    >
                    <!--*******Error Span*************** -->
                    <span class="text-danger"><?= ($errors['passErr']) ?></span>
                </div>

                <div class="form-group">
                    <label class="font-weight-bold" for="pass1">Confirm Password</label>
                    <input type="password" class="form-control" id="pass1" name="pass1" placeholder="Confirm password"
                    <?php if (isset($POST['pass1'])): ?>
                        value="<?= ($POST['pass1']) ?>"
                    <?php endif; ?>
                    >
                    <!--*******Error Span*************** -->
                    <span class="text-danger"><?= ($errors['passErr']) ?></span>
                </div>

                <!--Checks if wants to be a driver-->
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
            </div>

            <div class="col-md-4 h-100 border rounded mt-4 bg-light">
                <p class="p-1"><a class="font-weight-bold">Note:</a> All information entered is protectedby our
                    <a href="">privacy policy</a>. Profile
                    information can only be viewed by others with your permission.</p>
            </div>
        </div>
        <div class="text-right">
            <button id="next" type="submit" class="btn btn-primary mt-1">Next</button>
        </div>
    </form>
</div>


<!--Modal diplays password requirement!-->
<div class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
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
                <button type="button" class="btn btn-primary">Save changes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
</body>
</html>