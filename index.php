<?php
include("header.php");
?>
    <!-- Front Page -->
    <div class="top-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-7">
                    <div class="welcome">
                        <h1>Welcome</h1>
                        <hr class="horizontal-bar">
                        <p>Thanks for your interest in our skills training and consulting services.</p>
                        <p>We’d love to start showing you how we can work with you for greater success!</p>
                        <a href="#featuredCourses" class="btn btn-successful">Featured Courses &nbsp;<i class="fas fa-level-down-alt"></i></a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-5">
                    <div class="upcoming">
                        <h3>This August</h3>
                        <p>
                        <a href="programs.php">Personal Development Planning (PD-100)<br>
                        Live Online via Zoom</a><br>
                        Aug 21, Friday - 10:00 to 11:30 AM<br>
                        Course Fee: Pesos 500<br>
                        Rainy Day Special:</p>
                        <h3>Pesos 350</h3>
                        <p>
                        You can register until Aug 20, 2020
                        </p>
                        <a href="register.php" class="btn btn-register">Register</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="what-we-do">
        <div class="cover"></div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-12">
                    <div class="what-we-do-content">
                        <h1>Our Purpose</h1>
                        <hr class="horizontal-bar">
                        <p>Relevant, easy-to-buy and easy-to-apply learning and enablement experiences.</p>
                        <a href="our-purpose.php" class="btn btn-green">Learn more</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="booking-area" id="featuredCourses">
        <div class="container">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="train-sched">
                            <h4>Personal Development Planning - Sales Manager (PD-102)</h4>
                            <br>
                            <a href="programs.php" class="btn btn-register">Check Schedule</a>
                            <a alt="Whatsapp" href="https://wa.me/send?text=http://draperandgrizzdale.com/programs.php" target="_blank"><i class="fab fa-whatsapp"></i></a>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="register-session">
                            <h4>Personal Development Planning - Field Seller (PD-101)</h4>
                            <br>
                            <a href="programs.php" class="btn btn-register">Check Schedule</a>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="booking-session">
                            <h4>Introduction to The Sales Process (S-100)</h4>
                            <br>
                            <a href="programs.php" class="btn btn-register">Check Schedule</a>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="booking-session">
                            <h4>Introduction to The Sales Process For Technical Sellers (S-101)</h4>
                            <br>
                            <a href="programs.php" class="btn btn-register">Check Schedule</a>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="booking-session">
                            <h4>Introduction to The Sales Process For Customer Support/Implementation/Delivery Teams (S-102)</h4>
                            <br>
                            <a href="programs.php" class="btn btn-register">Check Schedule</a>
                            <a href="programs.php" class="btn btn-register">Share </a>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>

<?php
include("before-footer.php");
include("footer.php");
?>