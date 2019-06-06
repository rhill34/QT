<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Appointments</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet"  type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="stylesheets/profile.css">
</head>
<body>

    <nav class="navbar navbar-light bg-light">
        <a href="profile"><span class="navbar-brand mb-0 h1">QuickTrip Profile</span></a>
        <a href="logout"><span class="navbar-brand mb-0 h1">Logout</span></a>
    </nav>

    <div class="bg-light rounded m-5 p-2">
        <div class="col-md h-100">
            <!-- City State Region API inputs-->
            <strong><label for="countryId">Chose a Country</label></strong>
            <select name="country" class="custom-select countries order-alpha include-US presel-byip  group-continents group-order-alpha"
                    id="countryId">
                <option value="">
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

            <button class="btn btn-primary mt-2" id="search">Search</button>
        </div>
    </div>
        <div class="card-group" id="results"></div>
</body>


<!--Appointment  Modal-->
<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Book A Quicktrip</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="emailClose">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="text-center">
                Driver
            </div>
            <div class="text-center">
                <img id="proPic" src="" class="img-thumbnail rounded-circle w-25 h-25">
             </div>
            <!--Start of form-->
            <div class="modal-body mx-3">
                <div class="md-form mb-5">
                    <div class="form-group row">
                        <label for="date" class="col-2 col-form-label">Date</label>
                        <div class="col-10">
                            <input class="form-control" type="date" value="2011-08-19" id="date">
                        </div>
                    </div>
                </div>

                <div class="md-form mb-5">
                    <div class="form-group row">
                        <label for="timeIn" class="col-2 col-form-label">Check In</label>
                        <div class="col-10">
                            <input class="form-control" type="time" value="13:45:00" id="timeIn">
                        </div>
                    </div>
                </div>
                <div class="md-form mb-5">
                    <div class="form-group row">
                        <label for="timeOut" class="col-2 col-form-label">Check Out</label>
                        <div class="col-10">
                            <input class="form-control" type="time" value="13:45:00" id="timeOut">
                        </div>
                    </div>
                </div>
                <div id="driverIndex"></div>
            </div>

            <div class="modal-footer d-flex justify-content-center">
                <button id="submitAppt" class="btn btn-primary">Submit</button>
            </div>
        </div>
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

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//geodata.solutions/includes/countrystatecity.js"></script>
<script src="models/js/appointments.js"></script>

</html>