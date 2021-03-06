<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="stylesheets/profile.css">
    <title>Profile Info</title>
</head>
<body>
<nav class="navbar navbar-light bg-light">
    <a href="./" span class="navbar-brand mb-0 h1">QuickTrip Website</span></a>
</nav>
<span class="text-danger"><?= ($errors['emailErr']) ?></span>
<div class="card m-5">
    <div class=" p-2 border rounded m-5">
        <!--Start of form -->
        <form method="post" action="#" enctype="multipart/form-data">
            <!--String fields -->
            <div class="form-row">
                <h1 class="border-bottom col">Profile</h1>
            </div>
            <!--Left side-->
            <div class="form-row">
                <div class="col-md-6 h-100">

                    <strong><label for="countryId">Chose a Country</label></strong>
                    <select name="country" class="custom-select countries order-alpha include-US presel-byip  group-continents group-order-alpha"
                            id="countryId">
                        <option value="">
                            <?php if (isset($POST['country'])): ?>
                                Select Counry
                                <?php else: ?><?= ($POST['country']) ?>
                            <?php endif; ?>
                        </option>
                    </select>
                    <br>
                    <strong><label for="stateId">Chose a State</label></strong>
                    <select name="state" class="custom-select states order-alpha" id="stateId">
                        <option value="">Select State</option>
                    </select>
                    <span class="text-danger"><?= ($errors['stateErr']) ?></span>
                    <br>
                    <strong><label for="cityId">Chose a City</label></strong>
                    <select name="city" class="custom-select cities order-alpha" id="cityId">
                        <option value="">Select City</option>
                    </select>
                    <span class="text-danger"><?= ($errors['cityErr']) ?></span>
                    <br>
                    <!--Profile Pic-->
                    <label class="font-weight-bold" for="propic">Profile Pic</label>
                    <div class="custom-file" id="propic">
                        <input type="file" class="custom-file-input" id="customFile1" name="proPic">
                        <label class="custom-file-label" for="customFile1">Choose file</label>
                    </div>
                    <span class="text-danger"><?= ($errors['proPicErr']) ?></span>

                </div>


                <!--Right Side -->
                <div class="col-md-6 h-100">
                    <div class="form-group">
                        <label class="font-weight-bold" for="bio">Biography</label>
                        <textarea class="form-control" id="bio" name="bio" rows="6"><?= ($POST['bio']) ?></textarea>
                    </div>
                    <span class="text-danger"><?= ($errors['bioErr']) ?></span>
                </div>
                <!--End of right Side-->
            </div>
            <!--********************End of Profile From************-->

            <br>
            <div class="form-row">
                <h2 class="border-bottom col">Car Information</h2>
            </div>
            <!--Car form -->
            <div class="form-row mt-2">
                <!--Left Side-->
                <div class="col-md-6 h-100">
                    <!--Car Make-->
                    <div class="form-group">
                        <label class="font-weight-bold" for="make">Car Make</label>
                        <input type="text" class="form-control" id="make" name="make" placeholder="Enter Car Make"
                        <?php if (isset($POST['make'])): ?>
                            value="<?= ($POST['make']) ?>"
                        <?php endif; ?>
                        >
                        <!--*******Error Span*************** -->
                        <span class="text-danger"><?= ($errors['makeErr']) ?></span>
                    </div>

                    <!--Years-->
                    <div class="form-group">
                        <label class="font-weight-bold" for="year">Car Year</label>
                        <select class="form-control" id="year" name="year">
                            <?php foreach (($years?:[]) as $key=>$value): ?>
                                <option value='<?= ($value) ?>'
                                <?php if ($POST['year'] == $value): ?>
                                    selected
                                <?php endif; ?>
                                ><?= ($value) ?></option>
                            <?php endforeach; ?>
                        </select>
                        <!--*******Error Span*************** -->
                        <span class="text-danger"><?= ($errors['yearErr']) ?></span>
                    </div>

                </div>

                <!--Right Side -->
                <div class="col-md-6 h-100">

                    <!--Car Model-->
                    <div class="form-group">
                        <label class="font-weight-bold" for="model">Car Model</label>
                        <input type="text" class="form-control" id="model" name="model" placeholder="Enter Car Model"
                        <?php if (isset($POST['model'])): ?>
                            value="<?= ($POST['model']) ?>"
                        <?php endif; ?>
                        >
                        <!--*******Error Span*************** -->
                        <span class="text-danger"><?= ($errors['modelErr']) ?></span>
                    </div>
                    <!--Car Pic-->
                    <label class="font-weight-bold" for="carpic">Car Pic</label>
                    <div class="custom-file" id="carpic">
                        <input type="file" class="custom-file-input" id="customFile" name="carPic">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                    <span class="text-danger"><?= ($errors['carPicErr']) ?></span>
                </div>
            </div>

            <div class="text-right">
                <button type="submit" class="btn btn-primary mt-1">Next</button>
            </div>

            </div>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

<script>
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//geodata.solutions/includes/countrystatecity.js"></script>
</body>
</html>