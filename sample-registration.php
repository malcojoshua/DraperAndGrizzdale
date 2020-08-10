<?php
include("header.php");
?>

<div class="registration">
    <div class="container">
        <form action="register2.php" class="registration-form" id="regForm" method="post">
        <input hidden name='EventCode' value='PD-100-1'>
            <div class="row">
                <div class="col-12">
                    <img src="img/personal-development-planning.jpg" alt="Register Banner" class="img-fluid banner">
                </div>
            </div>
            <div class="tab">
                <div class="registration-form-header">
                    <h1>Registration</h1>
                    <hr class="horizontal-bar">
                </div>
                <div class="registration-form-body">
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label>First Name</label>
                            <input type="text" class="form-control" name="Fname" placeholder="e.g. Juan" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label>Middle Name</label>
                            <input type="text" class="form-control" name="Mname" placeholder="e.g. Pedro" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label>Last Name</label>
                            <input type="text" class="form-control" name="Lname" placeholder="Dela Cruz" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3 mb-3">
                            <label for="validationDefault03">Email Address</label>
                            <input type="email" class="form-control" id="validationDefault03" name="Email" placeholder="e.g. juan.delacruz@example.com" required>
                        </div>
                        <div class="form-group col-md-6 mb-3">
                            <label for="validationDefault04">Organization / Company / Employer</label>
                            <input type="text" class="form-control" id="validationDefault03" name="Company" placeholder="e.g. The Company Inc." required>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label>Role</label>
                            <input type="text" class="form-control" name="Role" placeholder="e.g. Admin Staff" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4 mb-3">
                            <label for="inputState">Date:</label>
                            <select id="inputState" class="form-control">
                                <option selected>Aug 8 - 9:00 to 10:30am</option>
                                <option>Aug 20 - 9:00 to 10:30am</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label>Mobile Number</label>
                            <input type="tel" class="form-control" name="Mobile" placeholder="e.g. 0912 345 6789" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label>Name to appear on Certificate</label>
                            <input type="text" class="form-control" name="CertName" placeholder="e.g. Juan Dela Cruz" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab">
                <div class="registration-form-header">
                    <h1>Your learning needs and desired outcomes</h1>
                    <hr class="horizontal-bar">
                </div>
                <div class="registration-form-body">
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label>What learning needs do you expect the program to address for you?</label>
                            <textarea class="form-control" name="Learning" required></textarea>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Any other expectation?</label>
                            <textarea class="form-control" name="Expectation" required></textarea>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Who is funding your course registration?</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="FundSource" id="exampleRadios1" value="Myself" checked>
                                <label class="form-check-label" for="exampleRadios1">Myself</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="FundSource" id="exampleRadios2" value="Company">
                                <label class="form-check-label" for="exampleRadios2">My Company / Organization</label>
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="alert alert-dark" role="alert">
                                Thanks For that!
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="form-check consent">
                                <input class="form-check-input" type="checkbox" name="Accept1" value="Y" id="defaultCheck1">
                                <label class="form-check-label justified" for="defaultCheck1">
                                    <span>By clicking “I accept” you confirm your agreement to our Data Privacy Statement.</span>
                                </label>
                                <label class="form-check-label justified" for="defaultCheck1">
                                    <span>In compliance with Republic Act 10173 – Data Privacy Act of 2012, Draper and GrizzDale is committed to protecting the personal information that you share with us in the course of your business relationship with us.  This information includes your name, email address, mobile phone number and related information that goes with your registration, including those required to process your payment.</span>
                                </label>
                                <label class="form-check-label justified" for="defaultCheck1">
                                    <span>We commit to the use of such information solely for the purpose of delivering the  services that you have engaged us for.</span>
                                </label>
                            </div>
                            <div class="form-check consent">
                                <input class="form-check-input" type="checkbox" name="Accept2" value="Y" id="defaultCheck2">
                                <label class="form-check-label justified" for="defaultCheck2">
                                    <span>I hereby give my consent to receive information on Upcoming Programs via email from Draper and GrizzDale, until December 31, 2020.</span>
                                </label>
                                <label class="form-check-label justified" for="defaultCheck2">
                                    <span>I also agree to discontinuing receipt of such information via email by sending an email to: <strong>claire@draperandgrizzdale.com</strong> any time.</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="float-right">
                <button class="btn btn-successful" type="button" id="prevBtn" onclick="nextPrev(-1)">Back</button>
                <button class="btn btn-successful" type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
            </div>
            <div style="text-align:center;margin-top:40px;">
                <span class="step"></span>
                <span class="step"></span>
                <span class="step"></span>
                <span class="step"></span>
            </div>
        </form>
    </div>
</div>

<?php
include("functions.php");
include("footer.php");
?>