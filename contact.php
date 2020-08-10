<?php
include("header.php");
?>

<div class="contact-us">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-7">
                <h1>Say Hello!</h1>
                <hr class="horizontal-bar">
                <p>We'd love to hear from you.</p>
                <form action="contact2.php" class="contact-form" method='post'>
                    <div class="form-row">
                        <div class="form-group col-6 col-xs-12">
                            <label for="firstname">First Name</label>
                            <input type="text" class="form-control" id="firstname" name="Fname" placeholder="e.g. Juan">
                        </div>
                        <div class="form-group col-6 col-xs-12">
                            <label for="lastname">Last Name</label>
                            <input type="text" class="form-control" id="lastname" name="Lname" placeholder="e.g. Dela Cruz">
                        </div>
                        <div class="form-group col-6 col-xs-12">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="Email" placeholder="e.g. juan.delacruz@example.com">
                        </div>
                        <div class="form-group col-6 col-xs-12">
                            <label for="contactnumber">Contact Number</label>
                            <input type="" class="form-control" id="contactnumber" name="Mobile" placeholder="e.g. 09123456789">
                        </div>
                        <div class="form-group col-12">
                            <label for="textarea">How can we help you?</label>
                            <textarea id="textarea" name="Message" class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-successful">Submit</button>
                    </div>
                </form>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-5">
                <img src="img/illustration/contact-us.png" alt="Teacher" class="illustration">
            </div>
        </div>
    </div>
</div>

<?php
include("footer.php");
?>
<script>
$(()=>{
 $('.btn-successful').click(function(){
  $(this).html("<div class='spinner-border'></div>");
 });
});
</script>