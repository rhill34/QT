<!Doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="stylesheets/profile.css">
    <title>Interests</title>
</head>
<body>
<nav class="navbar navbar-light bg-light">
    <a href="./" span class="navbar-brand mb-0 h1">QuickTrip Website</span></a>
</nav>

<div class="card m-5">
    <div class=" p-2 border rounded m-5">
        <h1 class="aTitle">Traveler Information</h1>
        <hr>
        <!--First Fields-->
        <div class="form-row">
            <h5 class="border-bottom col">Interests: <a class="font-italic text-danger">Must select 3</a></h5>
        </div>
        <div class="form-row ml-2 mt-2">
            <!--POST user Inputs from Route-->
            <form action="#" method="post"
                  id="interForm" name="interestTypes"
                  value="Personal Information"
                  enctype="multipart/form-data">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="interests[]" id="animal" value="Animal Excursion">
                    <label class="form-check-label" for="animal">
                        Animal Excursion
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="interests[]" id="local" value="Local Landmarks">
                    <label class="form-check-label" for="local">
                        Local Landmarks
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="interests[]" id="water" value="Waterfront Views">
                    <label class="form-check-label" for="water">
                        Waterfront Views
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="interests[]" id="club" value="Club Scene">
                    <label class="form-check-label" for="club">
                        Club Scene
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="interests[]" id="wine" value="Wineries">
                    <label class="form-check-label" for="wine">
                        Wineries
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="interests[]" id="historical" value="Historical Places">
                    <label class="form-check-label" for="historical">
                        Historical Places
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="interests[]" id="bar" value="Bar Hoping">
                    <label class="form-check-label" for="bar">
                        Bar Hoping
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="interests[]" id="TvFamous" value="Locations From Tv">
                    <label class="form-check-label" for="TvFamous">
                        Locations From Tv
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="interests[]" id="food" value="Local Cuisine">
                    <label class="form-check-label" for="food">
                        Local Cuisine
                    </label>
                </div>
                <span class="text-danger"><?= ($error) ?></span>
        </div>
        <div class="text-right">
            <button type="submit" class="btn btn-primary mt-1">
                <?php if ($SESSION['member'] instanceof User_Driver): ?>
                    Next
                    <?php else: ?>Submit
                <?php endif; ?>

            </button>
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
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</body>
</html>