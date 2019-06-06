<!--
Title:GRC/IT328/Dating App/home.html
Author: Robert Hill, III
Date: 04.18.2019
Code Version: V1.0
Availability: http://rhill.greenriverdev.com/328/datingB/
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
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
<!-- The Heading -->
<nav class="navbar navbar-light bg-light">
    <a href="./" span class="navbar-brand mb-0 h1">QuickTrip Website</span></a>
</nav>
<br>
<!-- Cards Side by Side-->
<div class="container">
    <div class="col-sm-12">
        <div class="card" style="width: 100% ;height: 50%; padding: 1%">
            <div class="row">
                <div class="col-sm-6" style="width: 100%; height: 100%;">
                    <h1 class="text-center">QuickTrip Website</h1>
                    <p style="padding: 1%;" class="lead">Welcome to the Best On-Demand Tour-Dating App. The <span class="font-weight-bold">QuickTripIn Website (QTI)</span> is connecting travelers with guides that provide authentic experiences</p>
                    <h3 class="text-center"><small>What users are saying about QTI.</small></h3>
                    <hr>
                    <div class="text-center" style="margin: 1px;">
                        <p class="font-italic"><small>"When I went to Texas...I found out what Come and Take it means!"</small> - PaperMag</p>
                        <p class="font-italic"><small>"I was able to share my community and not just on social media."
                        </small>- Reddit
                        </p>
                        <p class="font-italic"><small>"Up Till Now, I'd been traveling and touring all wrong."</small> - Pinterest</p>
                    </div>
                    <hr>
                    <div class="col-sm-6 mx-auto">
                        <div style="text-align: center;">
                            <a href="basic-info" role="button" type="button" class="btn btn-primary text-nowrap">Create a Profile!</a>
                        </div>
                        <br>
                        <h6 class="text-center text-success">Already a member login.</h6>
                        <div class="text-center"><button class="btn btn-primary text-nowrap">Login</button></div>
                        <div style="..."></div>
                    </div>
                    <br>
                </div>
                <div class="col-sm-6" style="width: 100% ; height: 100%;">
                    <div style="height: 100%; width: 100%;">
                        <div class="mh-100" style="width: 100%; height: 100%;">
                            <div>
                                <div id="demo" class="carousel slide" data-ride="carousel">
                                    <ul class="carousel-indicators">
                                        <li data-target="#demo" data-slide-to="0" class="active"></li>
                                        <li data-target="#demo" data-slide-to="1"></li>
                                        <li data-target="#demo" data-slide-to="2"></li>
                                    </ul>
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="./img/home-page/offThePlane.jpg" alt="Los Angeles" width="600" height="500">
                                            <div class="carousel-caption" id="cap1" style="top: 20px;">
                                                <h3>Los Angeles</h3>
                                                <p>We had such a great time in LA!</p>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <img src="img/home-page/quickCity.jpg" alt="Chicago" width="1100" height="500">
                                            <div class="carousel-caption" id="cap2" style="top: 50%;">
                                                <h3>Chicago</h3>
                                                <p>Thank you, Chicago!</p>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <img src="img/home-page/landmarkCity.jpg" alt="New York" width="650" height="500">
                                            <div class="carousel-caption" id="cap3" style="color: black;">
                                                <h3>New York</h3>
                                                <p>We love the Big Apple!</p>
                                            </div>
                                        </div>
                                    </div>
                                    <a class="carousel-control-prev" href="#demo" data-slide="prev">
                                        <span class="carousel-control-prev-icon"></span>
                                    </a>
                                    <a class="carousel-control-next" href="#demo" data-slide="next">
                                        <span class="carousel-control-next-icon"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>