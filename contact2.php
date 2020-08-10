<?php
include("utils.php");
include("incMailHtml.php");

$Fname = SQLs($_POST[Fname]);
$Lname = SQLs($_POST[Lname]);
$Email = SQLs($_POST[Email]);
$Mobile = SQLs($_POST[Mobile]);
$Message = SQLs($_POST[Message]);

if ($Message != 'NULL' && $Email  != 'NULL') {
    DBOpen();
    $id = DBExecute("INSERT INTO msg(Fname, Lname, Email, Mobile, Message, Created) VALUES($Fname, $Lname, $Email, $Mobile, $Message, '$manilanow')");
    DBClose();

    $vars = [
     unquote($Fname),
     unquote($Lname),
     unquote($Email),
     unquote($Mobile),
     unquote($Message)
    ];
    SendEmailHtml('Website', 'claire@draperandgrizzdale.com', "[draperandgrizzdale.com] Contact #$id", 'email/msg.htm', $vars);
}

include("header.php");
?>

<div class="contact-us">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-7">
                <h1>Thank you!</h1>
                <hr class="horizontal-bar">
                <p>We will contact you soon.</p>
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